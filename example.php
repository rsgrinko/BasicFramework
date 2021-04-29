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

$new_user['login'] = 'demo';
$new_user['pass'] = '12345';
$new_user['access_level'] = 'user';
$new_user['name'] = 'Петька Тестер';

if(!$User->user_exists($new_user['login'])) {
	$User->Registration($new_user['login'], $new_user['pass'], $new_user['access_level'], $new_user['name']);
	echo 'Registration Success';
} else {
	echo 'User already exists';
}