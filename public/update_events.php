<?php 

require_once __DIR__.'/../vendor/autoload.php';

use app\Router;

$router = new Router();

$start = $_POST['start'];
$end = $_POST['end'];
$id = $_POST['id'];

$router -> db -> updateEvent($id, $start, $end);