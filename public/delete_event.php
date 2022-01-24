<?php 

require_once __DIR__.'/../vendor/autoload.php';

use app\Router;

$router = new Router();

$event_id = $_POST['id'];

$router -> db -> deleteEvent($event_id);