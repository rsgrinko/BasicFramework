<?php
/*
	Стартовый файл, подключающий классы и создающий объекты классов и прочее
	Роман Сергеевич Гринько
	rsgrinko@gmail.com
	https://it-stories.ru
*/
require_once $_SERVER['DOCUMENT_ROOT'].'/core/lib/DataBase.class.php';	
require_once $_SERVER['DOCUMENT_ROOT'].'/core/lib/User.class.php';	

$DataBase = new DataBase('localhost', 'rsgrinko_iot', '2670135', 'rsgrinko_iot');
$User = new User();