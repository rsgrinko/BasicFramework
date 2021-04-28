<?php
/*
	Стартовый файл, подключающий классы и создающий объекты классов и прочее
	Роман Сергеевич Гринько
	rsgrinko@gmail.com
	https://it-stories.ru
*/
require_once $_SERVER['DOCUMENT_ROOT'].'/core/lib/DataBase.class.php';	
require_once $_SERVER['DOCUMENT_ROOT'].'/core/lib/User.class.php';	

$DataBase = new DataBase('localhost', 'db_user', 'password', 'db_name');
$User = new User();