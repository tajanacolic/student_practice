<?php 

require_once __DIR__.'/../vendor/autoload.php';
use app\Router;

$router = new Router();

$data = array();
$result = $router -> db -> getEvents();

foreach($result as $row)
{
    $data[] = array(
        'id' => $row['calendar_id'],
        'start' => $row['start_event'],
        'end' => $row['end_event'],
        'title' => $row['title']
    );
}