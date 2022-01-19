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
            $router -> renderView('practice/adminindex',[
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
            ];
            if($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                $practiceData['practice_name'] = $_POST['practice_name'];
                $practiceData['practice_surname'] = $_POST['practice_surname'];
                $practiceData['practice_email'] = $_POST['practice_email'];
                $practiceData['practice_phone'] = $_POST['practice_phone'];
                $practiceData['practice_education'] = $_POST['practice_education'];
                $practiceData['practice_type'] = $_POST['practice_type'];
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
            }
            $router->renderView('practice',[
                'practice' => $practiceData,
                'errors' => $errors
            ]);
        }
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

        $adData = $router->db->getPracticeById($practice_id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $adData['job_title'] = $_POST['job_title'];
            $adData['job_type'] = $_POST['job_type'];
            $adData['job_location'] = $_POST['job_location'];
            $adData['job_requirements'] = $_POST['job_requirements'];
            $adData['job_description'] = $_POST['job_description'];
            $adData['job_imageFile'] = $_FILES['job_image'] ?? null;

            $job = new Job();
            $job->load($adData);
            $errors = $job->save();

            if (empty($errors)) {

                header('Location: /jobs');
                exit;

            }

        }

        $router->renderView ('jobs/update', [
            'job' => $adData,
            'errors' => $errors
        ]);

    }

    public static function delete(Router $router) {
        if($_SESSION['name'] === "user")
        {
            header('Location: /jobs');
            exit;
        }
        $id = $_POST['id'] ?? null;

        if (!$id) {

            header('Location: /jobs');
            exit;

        }

        $router->db->deleteAd($id);
        header('Location: /jobs');

    }

    public static function view(Router $router) {

        $id = $_GET['id'] ?? null;

        if (!$id) {

            header('Location: /jobs');
            exit;

        }

        $errors = [];
        $appData = [
            'job_name' => '',
            'job_surname' => '',
            'job_email' => '',
            'job_tel' => '',
            'job_id' => '',
            'job_cvFile' => '',
            'job_cv' => ''
        ];
        $adData = $router->db->getAdById($id);

        $router->renderView('jobs/view',
            ['job' => $adData, 'errors' => $errors, 'application' =>$appData]);

    }
}