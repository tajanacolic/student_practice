<?php 

require_once __DIR__.'/../vendor/autoload.php';
use app\Router;

$router = new Router();

$data = array();
$result = $router -> db -> getEvents();
foreach($result as $i => $row)
{
    $output = preg_replace('/(\d{4}[\.\/\-][01]\d[\.\/\-][0-3]\d)/', '', $row['start_event']);
    $output1 = preg_replace('/(\d{4}[\.\/\-][01]\d[\.\/\-][0-3]\d)/', '', $row['end_event']);
    $data[] = array(
        'id' => $row['calendar_id'],
        'start' => $row['start_event'],
        'end' => $row['end_event'],
        'title' => $row['title'],
        'color' => $row['color'],
        'description' => $row['title'] ." ". $output ." ". $output1
    );
}

echo json_encode($data);