<?php 

require_once __DIR__.'/../vendor/autoload.php';
use app\Router;

$router = new Router();

$data = array();
$id = json_decode($_COOKIE['practice_id']);
$result = $router -> db -> getEventsbyId($id);

foreach($result as $row)
{
    $data[] = array(
        'id' => $row['calendar_id'],
        'start' => $row['start_event'],
        'end' => $row['end_event'],
        'color' => $row['color']
    );
}