<?php
/*
	Стартовый файл, подключающий классы и создающий объекты классов и прочее
	Роман Сергеевич Гринько
	rsgrinko@gmail.com
	https://it-stories.ru
*/
require_once $_SERVER['DOCUMENT_ROOT'].'/core/session.php';	
require_once $_SERVER['DOCUMENT_ROOT'].'/core/lib/DataBase.class.php';	
require_once $_SERVER['DOCUMENT_ROOT'].'/core/lib/User.class.php';	

$DataBase = new DataBase('localhost', 'db__user', 'db_pass', 'db_name');
$User = new User();
