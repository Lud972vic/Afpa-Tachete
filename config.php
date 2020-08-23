<?php

//On génère une constante qui contiendra les chemins vers les repertoirs racine du site
$root = $_SERVER['DOCUMENT_ROOT'];
$host = $_SERVER['HTTP_HOST'];

define('ROOT', $root . 'tachete/');
define('HOST', $host . '/tachete/');

define('CONTROLLER', ROOT . 'controllers/');
define('VIEW', ROOT . 'views/');
define('MODEL', ROOT . 'models/');
define('ASSETS', HOST . 'assets/');
define('RACINE', 'tachete');

define('DBHOST', 'localhost');
define('DBNAME', 'bdd_tachete');
define('DBUSERNAME', 'root');
define('DBPWD', '');
