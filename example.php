<?php
/*
	Пример использования класса
	Роман Сергеевич Гринько
	rsgrinko@gmail.com
	https://it-stories.ru
*/
require_once $_SERVER['DOCUMENT_ROOT'].'/core/bootstrap.php';


/*
	Авторизация
*/
if($_REQUEST['act']=='login'){
	if(!$User->SecurityAuthorize($_REQUEST['login'], $_REQUEST['password'])) {
		echo 'login fail!<br>';
		}	
} 

if($_GET['act']=='logout') {
	$User->Logout();
}


if($User->is_user()):
	$user_fields = $User->getFields();
?>
	<p>Добро пожаловать, <?=$user_fields['name'];?>! <a href="example.php?act=logout">Выход</a></p>
	<pre><?=print_r($user_fields, true);?></pre>
<?php
echo 'Входящих писем: ('.$User->getMailCount($User->id, 'to', 'Y').'/'.$User->getMailCount($User->id, 'to').')<br>';
echo 'Исходящих писем: '.$User->getMailCount($User->id, 'from').'<br>';
echo 'Мои сообщения:<br>';
?>
<table border="1px" style="border-collapse: collapse;">
	<tr>
		<td>ID</td>
		<td>От кого</td>
		<td>Сообщение</td>
		<td>Не прочитано</td>
		<td>Время</td>
	</tr>
<?php
$mail = $User->getMail();
foreach($mail as $item):
$user_fields = $User->getFields($item['message_from']);
?>
	<tr>
		<td><?=$item['id'];?></td>
		<td><?=$user_fields['name'];?></td>
		<td><?=$item['message'];?></td>
		<td><?=$item['new'];?></td>
		<td><?=date("d.m.Y H:i:s", $item['time']);?></td>
	</tr>

<?php	
endforeach;
?>
</table>
<?php
else:
?>
	<form action="example.php" method="POST">
		<input type="hidden" name="act" value="login">
		<input type="text" name="login" placeholder="Enter your login"><br>
		<input type="password" name="password" placeholder="Enter your password"><br>	
		<input type="submit" value="Login"><br>
	</form>
<?php	
endif;


echo '<pre>'.session_id().'</pre>';



/*
	Регистрация
*/
/*
$new_user['login'] = 'demo';
$new_user['pass'] = '12345';
$new_user['access_level'] = 'user';
$new_user['name'] = 'Петька Тестер';

if(!$User->user_exists($new_user['login'])) {
	$User->Registration($new_user['login'], $new_user['pass'], $new_user['access_level'], $new_user['name']);
	echo 'Registration Success';
} else {
	echo 'User already exists';
}*/