<?php
/*
	Файл настройки и старта сессии
	Роман Сергеевич Гринько
	rsgrinko@gmail.com
	https://it-stories.ru
*/
ini_set('session.cookie_domain', '.'.$_SERVER['SERVER_NAME']);
ini_set('session.gc_maxlifetime', 3600*24*30);
ini_set('session.cookie_lifetime', 3600*24*30);
session_set_cookie_params(3600*24*30, '/', '.'.$_SERVER['SERVER_NAME'], false, false);

session_start();
