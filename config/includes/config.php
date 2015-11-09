<?php

session_start();

define("URL", "http://".$_SERVER["SERVER_NAME"].'/TesteMVC'); //DEFINO A URL DO SISTEMA


//$mysqli->set_charset("utf8");

header('Content-Type: text/html; charset=utf-8');

define("DIR_CSS", "web/_estilos/css");
define("DIR_IMG", "web/_estilos/img");
define("DIR_JS", "web/_estilos/js");

$hostname = 'localhost';
$usuario  = 'root';
$senha    = '';
$db       = 'meveana';
?>