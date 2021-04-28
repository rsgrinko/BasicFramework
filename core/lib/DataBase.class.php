<?php
	/*
		Класс для работы с базой данных
		Роман Сергеевич Гринько
		rsgrinko@gmail.com
		https://it-stories.ru
	*/
	
class DataBase {
	public  $db;
	public  $db_server;
	public  $db_user;
	public  $db_name;
	private $db_password;
	
	public function __construct($db_server, $db_user, $db_pass, $db_name) {
			$this->db_server = $db_server;
			$this->db_user = $db_user;
			$this->db_password = $db_pass;
			$this->db_name = $db_name;
			$this->db = new PDO('mysql:host='.$db_server.';dbname='.$db_name, $db_user, $db_pass);
	}
	
	// Вспомогательный метод, формирует WHERE из массива
	private function createWhere($where) {
		if(!is_array($where)) { return $where; }
		$where_string = '';
		foreach($where as $where_key => $where_item){
			if(stristr($where_item, '>')) {
				$symbol = '>';
				$where_item = str_replace($symbol, '', $where_item);
			} elseif(stristr($where_item, '<')) {
				$symbol = '<';
				$where_item = str_replace($symbol, '', $where_item);
			} elseif(stristr($where_item, '<=')) {
				$symbol = '<=';
				$where_item = str_replace($symbol, '', $where_item);
			} elseif(stristr($where_item, '>=')) {
				$symbol = '>=';
				$where_item = str_replace($symbol, '', $where_item);
			} else {
				$symbol = '=';
			}
			$where_string = $where_string.' ('.$where_key.$symbol.'\''.$where_item.'\') AND';
		}
		$where_string = substr($where_string, 0, -4);
		
		return $where_string;
	}
	
	// Вспомогательный метод, формирует SET из массива
	private function createSet($set) {
		if(!is_array($set)) { return $set; }
		$set_string = '';
		foreach($set as $set_key => $set_item){
			$set_string = $set_string.' '.$set_key.'=\''.$set_item.'\',';
		}
		$set_string = substr($set_string, 0, -1);
		
		return $set_string;
	}
	
	// Вспомогательный метод для создания строки сортировки
	private function createSort($sort) {
		if(is_array($sort)){
			foreach($sort as $k=>$v){
				$sort_string = ' ORDER BY '.$k.' '.$v;	
			}			
		} else {
			$sort_string = '';
		}
		
		return $sort_string;
	}

	// Метод для простого выполнения заданного SQL запроса.
	// Возвраает результат в виде массива или ложь в случае неудачи
	public function query($sql, $params = []) {
		$stmt = $this->db->prepare($sql);
		$stmt->execute($params);
		
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if($result) {
			return $result;
		} else {
			return false;
		}
	}

	// Метод для обновления записи в таблице
	// Принимает 3 аргумента: имя таблицы, массив для WHERE и массив значений для обновления (ключ-значение
	public function update($table, $where, $set) {
		$result = $this->query('UPDATE `'.$table.'` SET '.$this->createSet($set).' WHERE '.$this->createWhere($where));
		if($result) {
			return $result;
		} else {
			return false;
		}
	}
	
	// Получить элемент из базы
	public function getItem($table, $where) {
		$result = $this->query('SELECT * FROM `'.$table.'` WHERE '.$this->createWhere($where).' LIMIT 1');
		if($result) {
			return $result[0];
		} else {
			return false;
		}
	}	
	
	// Получить элементЫ из базы
	public function getItems($table, $where, $sort = '') {
		$result = $this->query('SELECT * FROM `'.$table.'` WHERE '.$this->createWhere($where).$this->createSort($sort));
		if($result) {
			return $result;
		} else {
			return false;
		}
	}	
	
	
	
	
	
/******************/	
	
	// Получить все из таблицы
	public function getAll($table, $sort = '', $params = []) {
		$result = $this->query('SELECT * FROM `'.$table.'`'.$this->createSort($sort));
		if($result){
			return $result;
		} else {
			return false;
		}		 
	}
	
	
	

	public function getRow($table, $sql = '', $params = []) {
		$result = $this->query('SELECT * FROM `'.$table.'` '.$sql.' LIMIT 1', $params);
		if($result) {
			return $result[0]; 
		} else {
			return false;
		}
	}
	
	

}