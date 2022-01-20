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

$router->get('/', [PracticeController::class, 'index']);
$router->post('/', [PracticeController::class, 'index']);
$router->get('/practice', [PracticeController::class, 'index']);
$router->post('/practice', [PracticeController::class, 'index']);
$router->get('/practice/', [PracticeController::class, 'index']);
$router->post('/practice/', [PracticeController::class, 'index']);
$router->get('/practice/index', [PracticeController::class, 'index']);
$router->post('/practice/index', [PracticeController::class, 'index']);
$router->get('/practice/practiceview', [PracticeController::class, 'practiceview']);
$router->get('/practice/view', [PracticeController::class, 'view']);
$router->post('/practice/view/delete', [PracticeController::class, 'delete']);
$router->post('/practice/view/update', [PracticeController::class, 'update']);


$router->get('/practice/signin',[AdminController::class,'signin']);
$router->post('/practice/signin',[AdminController::class,'signin']);
$router->get('/practice/signout', [AdminController::class, 'signout']);
$router->resolve();