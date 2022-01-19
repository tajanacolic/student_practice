<?php
session_start();
$_SESSION['name'] = $_SESSION['name'] ?? 'practice';
$_SESSION['activity'] = $_SESSION['activity'] ?? '';
$_SESSION['applied'] = $_SESSION['applied'] ?? false;
require_once __DIR__.'/../vendor/autoload.php';

use app\Router;
use app\controllers\AdminController;
use app\controllers\PracticeController;

$router = new Router();


$router->get('/practice/signin',[AdminController::class,'signin']);
$router->post('/practice/signin',[AdminController::class,'signin']);
$router->get('/practice/signout', [AdminController::class, 'signout']);
$router->resolve();