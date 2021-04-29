<?php
	/*
		Класс для работы с пользователями
		Роман Сергеевич Гринько
		rsgrinko@gmail.com
		https://it-stories.ru
	*/
	
class User {
	public $id;
	public $users_table;
	public $mail_table;
	
	public function __construct($users_table = 'users', $mail_table = 'messages') {
		$this->users_table = $users_table;
		$this->mail_table = $mail_table;
	}	
	
	// Получение всех полей пользователя
	public function getFields($id = ''){
		global $DataBase;
		if(empty($id) or $id == ''){
			$id = $this->id;
		}
		
		if(is_array($id)){
			$where = $id;
		} else {
			$where = array('id'=>$id);
		}
		$result = $DataBase->getItem($this->users_table, $where);
		if($result) {
			return $result;
		} else {
			return false;
		}
	}

	// Метод выполняет регистрацию пользователя в системе
	public function Registration($login, $password, $level = 'user', $name = ''){
		global $DataBase;
		$result = $DataBase->addItem($this->users_table, array('login' => $login, 'password' => $password, 'access_level' => $level, 'name' => $name, 'last_active' => time()));
		
		if($result) {
			$this->id = $id;
			$_SESSION['authorize'] = 'Y';
			$_SESSION['login'] = $result['login'];
			$_SESSION['password'] = $result['password'];		
			return true;
		} else {
			return false;
		}
	}
	
	// Метод проеряет занятость логина в системе
	public function user_exists($login){
		global $DataBase;
		$result = $DataBase->getItem($this->users_table, array('login'=>$login));
		
		if($result) {
			return true;
		} else {
			return false;
		}
	}
		
	// Метод выполняет авторизацию пользователя в системе по ID
	public function Authorize($id){
		global $DataBase;
		$result = $DataBase->getItem($this->users_table, array('id'=>$id));
		if($result) {
			$this->id = $id;
			$_SESSION['authorize'] = 'Y';
			$_SESSION['login'] = $result['login'];
			$_SESSION['password'] = $result['password'];		
			return true;
		} else {
			return false;
		}
	}
	
	// Метод выполняет авторизацию пользователя в системе по логину и паролю
	public function SecurityAuthorize($login, $password){
		global $DataBase;
		
		$result = $DataBase->getItem($this->users_table, array('login'=>$login, 'password' => $password));
		if($result) {
			$this->id = $result['id'];
			$_SESSION['authorize'] = 'Y';
			$_SESSION['login'] = $result['login'];
			$_SESSION['password'] = $result['password'];		
			return true;
		} else {
			return false;
		}
	}
	
	//  Проверка на пользователя
	public function is_user(){
		global $DataBase;
		
		$result = $DataBase->getItem($this->users_table, array('login'=>$_SESSION['login']));
		if($result) {
				if($result['password']==$_SESSION['password']){
					$DataBase->update($this->users_table, array('id'=>$result['id']), array('last_active' => time()));
					$this->id = $result['id'];
					return true;
				} else {
					return false;
				}		
			
		} else {
			return false;
		}
	}
	
	// Метод выхода из системы
	public function Logout(){
		$_SESSION['authorize'] = '';
		$_SESSION['login'] = '';
		$_SESSION['password'] = '';
		session_unset();
		session_destroy();
		return true;
		}
	
	// Получает количество входящих писем пользователя
	public function getMailCount($user_id = '', $type = 'to', $new = ''){
		global $DataBase;
		
		if($user_id==''){
			$user_id = $this->id;
		}
		
		if($type == 'to'){
			$message_type = 'message_to';
		} else {
			$message_type = 'message_from';
		}
		
		if($new=='Y'){
			$arFilter = array($message_type => $user_id, 'new' => 'Y');
		} else{
			$arFilter = array($message_type => $user_id);
		}
		
		$result = $DataBase->getItems($this->mail_table, $arFilter);
	
		if($result){
			return count($result);
		} else {
			return 0;
		}
	}
		
	public function getMail($user_id = '', $type = 'to'){
		global $DataBase;
		
		if($user_id==''){
			$user_id = $this->id;
		}
		
		if($type == 'to'){
			$message_type = 'message_to';
		} else {
			$message_type = 'message_from';
		}
		
		$result = $DataBase->getItems($this->mail_table, array($message_type => $user_id), array('id'=>'desc'));
		
		if($result){
			return $result;
		} else {
			return false;
		}
	}	
		
	public function getNewMail(){
		
	}		

}