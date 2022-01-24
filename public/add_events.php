<?php 


require_once __DIR__.'/../vendor/autoload.php';

use app\Router;

$router = new Router();

$start = $_POST['start'];
$end = $_POST['end'];
$id = json_decode($_COOKIE['practice_id']);

$router -> db -> addEvent($start, $end, $id);
