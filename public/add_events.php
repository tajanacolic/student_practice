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
    $event_start = new DateTime($event['start_event']);
    $event_end = new DateTime($event['end_event']);
    $event_start = $event_start->format(DateTime::ATOM);
    $event_end = $event_end->format(DateTime::ATOM);
    if($start == $event_start)
    $counter += 1;
    else if($start <$event_start && $event_start < $end)
    $counter += 1;
    else if($event_start < $start && $start < $event_end)
    $counter += 1;
}
setcookie('counter', json_encode($counter), time()+3600);
if($counter < 11){
$practiceData = json_decode($_COOKIE['practice'], true);
$title = $practiceData['practice_name'];
$id = json_decode($_COOKIE['practice_id']);

$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
$color = '#'.$rand[rand(0,9)].$rand[rand(0,9)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];

$router -> db -> addEvent($start, $end, $id, $title);
$router -> db -> addEventColor($id, $color);
}

header("Refresh:0");