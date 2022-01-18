<?php

ini_set('display_errors', 1);
require "../vendor/autoload.php";
require "../config/config.php";

use App\App;

$page = ucfirst($_GET['page']);
//var_dump(App::getDb()->query('Select * from user'));
require "../app/".$page.'Controller.php';
$class = $page.'Controller';
$page = new $class;
$page->view();