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
            $practice_activity = $_GET['practice_activity'] ?? 0;
            $practice_activity = $practice_activity % 2;
            $search = $_GET['search'] ?? '';
            $practices = $router->db->getPractice($search, $practice_activity);
            $router -> renderView('practice/adminindex',[
                'practices' => $practices,
                'search' => $search,
                'practice_activity' => $practice_activity
            ]);
        }
        else
        {
            $errors = [];
            $practiceData = [
                'practice_name' => '',
                'practice_email' => '',
                'practice_phone' => '',
                'practice_education' => '',
                'practice_type' => '',
                'practice_activity' => '',
                'practice_html' => '',
                'practice_css' => '',
                'practice_bootstrap' => '',
                'practice_php' => '',
                'practice_mysql' => ''
            ];
            if($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                $practiceData['practice_name'] = $_POST['practice_name'];
                $practiceData['practice_email'] = $_POST['practice_email'];
                $practiceData['practice_phone'] = $_POST['practice_phone'];
                $practiceData['practice_education'] = $_POST['practice_education'];
                $practiceData['practice_type'] = $_POST['practice_type'];
                $practiceData['practice_html'] = (float) $_POST['practice_html'];
                $practiceData['practice_css'] = (float) $_POST['practice_css'];
                $practiceData['practice_bootstrap'] = (float) $_POST['practice_bootstrap'];
                $practiceData['practice_php'] = (float) $_POST['practice_php'];
                $practiceData['practice_mysql'] = (float) $_POST['practice_mysql'];

                $practice = new Practice();
                $practice->load($practiceData);
                $errors = $practice->save();

                if(empty($errors))
                { 
                    setcookie('practice', json_encode($practice), time() + 3600);
                    header('Location:calendar/insert');
                    exit;
                }
            }
            $router->renderView('practice/formindex',[
                'practice' => $practiceData,
                'errors' => $errors
            ]);
        }
    }

    public static function time(Router $router){
        $router->renderView('calendar/insert',[]);
    }

    public static function update(Router $router) {

        if($_SESSION['name'] === "practice")
        {
            header('Location: /practice');
            exit;
        }

        $practice_id = $_GET['practice_id'] ?? null;

        if (!$practice_id) {

            header('Location: /practice');
            exit;

        }

        $errors = [];

        $practiceData = $router->db->getPracticeById($practice_id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if($_POST['practice_activity'] === 'on')
            $practiceData['practice_activity'] = 1;
            else
            $practiceData['practice_activity'] = 0;
            $practice = new Practice();
            $practice->load($practiceData);
            $errors = $practice->save();

            if (empty($errors)) {

                header('Location: /practice');
                exit;

            }

        }

        $router->renderView ('practice/view', [
            'practice' => $practiceData,
            'errors' => $errors
        ]);

    }

    public static function delete(Router $router) {
        if($_SESSION['name'] === "practice")
        {
            header('Location: /practice');
            exit;
        }
        $practice_id = $_POST['practice_id'] ?? null;

        if (!$practice_id) {

            header('Location: /practice');
            exit;

        }

        $router->db->deletePractice($practice_id);
        header('Location: /practice');

    }

    public static function view(Router $router) {

        $practice_id = $_GET['practice_id'] ?? null;

        if (!$practice_id) {

            header('Location: /practice');
            exit;

        }

        $errors = [];
        $practiceData = [
            'practice_name' => '',
            'practice_surname' => '',
            'practice_email' => '',
            'practice_phone' => '',
            'practice_education' => '',
            'practice_type' => '',
            'practice_html' => '',
            'practice_css' => '',
            'practice_bootstrap' => '',
            'practice_php' => '',
            'practice_mysql' => ''
        ];
        $practiceData = $router->db->getPracticeById($practice_id);

        $router->renderView('practice/view',
            ['practice' => $practiceData, 'errors' => $errors]);
    }

    public static function practiceview(Router $router) 
    {
        $practiceData = json_decode($_COOKIE['practice'], true);
        $router->renderView('practice/practiceview', [
            'practice' => $practiceData
        ]);
    }
}


############################