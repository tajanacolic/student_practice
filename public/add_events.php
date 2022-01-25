<?php 


require_once __DIR__.'/../vendor/autoload.php';

use app\Router;

$router = new Router();

$start = $_POST['start'];
$end = $_POST['end'];
$events = $router -> db -> getEvents();
$counter = 0;
foreach($events as $event)
{
    if($start === $event['start_event'])
    $counter ++;
    else if($start < $event['start_event'] && $event['start_event'] < $end)
    $counter ++;
    else if($event['start_event'] < $start && $start < $event['end_event'])
    $counter ++;
}
if($counter < 10){
$practiceData = json_decode($_COOKIE['practice'], true);
$title = $practiceData['practice_name'];
$id = json_decode($_COOKIE['practice_id']);

$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
$color = '#'.$rand[rand(0,9)].$rand[rand(0,9)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];

$router -> db -> addEvent($start, $end, $id, $title);
$router -> db -> addEventColor($id, $color);
}