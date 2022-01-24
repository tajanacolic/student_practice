<?php

namespace app\controllers;

use app\Router;
use app\models\Admin;

class AdminController
{
    public static function signin(Router $router)
    {
        if($_SESSION['applied'] === true && $_SESSION['calendar'] === '')
        {
            header('Location:/calendar/insert');
            exit;
        }
        if($_SESSION['name'] === 'admin')
        {
            header('Location:/practice');
            exit;
        }
        $adminData = [
            "username" => '',
            "password" => ''
        ];
        
        $errors = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $adminData['username'] = $_POST['username'];
            $adminData['password'] = $_POST['password'];

            $admin = new Admin();
            $admin -> load($adminData); 
            $errors = $admin -> check();
            if(empty($errors))
            {
                session_start();
                $_SESSION['name'] = 'admin';
                header('Location:/practice');
                exit;
            }
        }
        $router -> renderView('practice/signin', [
            "admin" => $adminData, 
            "errors" => $errors
        ]);
    }

    public static function signout() {
        $_SESSION['name'] = "practice";
        header('Location:/practice');
    }
}

#################################