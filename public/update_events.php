<?php 

require_once __DIR__.'/../vendor/autoload.php';

use app\Router;

$router = new Router();

$start = $_POST['start'];
$end = $_POST['end'];
$id = $_POST['id'];

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
echo json_encode($counter);
if($counter<11)
$router -> db -> updateEvent($id, $start, $end);