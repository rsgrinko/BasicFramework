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
	
	public function __construct($users_table = 'users') {
		$this->users_table = $users_table;
	}
	
	
	// Получение всех полей пользователя
	public function getFields($id){
		global $DataBase;
		$result = $DataBase->getItem($this->users_table, array('id'=>$id));
		if($result) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function Authorize($id){
		global $DataBase;
		$result = $DataBase->getItem($this->users_table, array('id'=>$id));
		
		if($result) {
			setcookie('authorize', 'Y', time()+3600*24);
			setcookie('login', $result['login'], time()+3600*24);
			setcookie('password', md5($result['password']), time()+3600*24);
			
			return true;
		} else {
			return false;
		}
	}
	
	public function Logout(){
		
		setcookie('authorize', 'N', time()-3600);
		setcookie('login', '', time()-3600);
		setcookie('password', '', time()-3600);
		
		return true;
		}	

}