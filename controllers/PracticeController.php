<?php

namespace app\controllers;

use app\models\Practice;
use app\Router;

class PracticeController
{
    public static function index(Router $router) 
    {
        if($_SESSION['name'] === 'admin')
        {
            $practices = $router->db->getPractice();
            $router -> renderView('practice/practicesview',[
                'practices' => $practices
            ]);
        }
        else
        {
            $errors = [];
            $practiceData = [
                'practice_name' => '',
                'practice_surname' => '',
                'practice_email' => '',
                'practice_phone' => '',
                'practice_education' => '',
                'practice_type' => '',
                'practice_activity' => true,
            ];
            if($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                $practiceData['practice_name'] = $_POST['practice_name'];
                $practiceData['practice_surname'] = $_POST['practice_surname'];
                $practiceData['practice_email'] = $_POST['practice_email'];
                $practiceData['practice_phone'] = $_POST['practice_phone'];
                $practiceData['practice_education'] = $_POST['practice_education'];
                $practiceData['practice_type'] = $_POST['practice_type'];
                $practiceData['practice_activity'] = $_POST['practice_activity'];
                $practice = new Practice();
                $practice->load($practiceData);
                $errors = $practice->save();

                if(empty($errors))
                {
                    $_SESSION['activity'] = 'applied';
                    $_SESSION['applied'] = true;
                    header('Location:/practice/view');
                    exit;
                }
                $router->renderView('practice',[
                    'practice' => $practiceData,
                    'errors' => $errors
                ]);
            }
        }
    }
}