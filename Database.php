<?php

namespace app;

use app\models\Practice;
use PDO;

class Database
{

    public $pdo = null;
    public static ?Database $db = null;

    public function  __construct() {

        $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=practice_crud', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        self::$db = $this;
    }

    public function getPractice()
    {
        $statement = $this->pdo->prepare('SELECT * FROM practice ORDER BY create_date ASC');
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPracticeById($practice_id) {

        $statement = $this->pdo->prepare('SELECT * FROM practice WHERE practice_id = :practice_id');
        $statement->bindValue(':practice_id', $practice_id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);

    }

    public function updatePractice(Practice $practice)
    {
        $statement = $this->pdo->prepare("UPDATE practice SET practice_activity = :practice_activity
                                        WHERE practice_id = :practice_id");
        $statement->bindValue(':practice_activity', $practice->practice_activity);
        $statement->bindValue(':practice_id', $practice->practice_id);

        $statement->execute();
    }

    public function createPractice(Practice $practice)
    {
        $statement = $this->pdo->prepare("INSERT INTO practice (practice_name, practice_email, practice_phone, 
                      practice_education, practice_type, practice_html, practice_css, practice_bootstrap, 
                      practice_php, practice_mysql, create_date)
                VALUES (:practice_name, :practice_email, :practice_phone, :practice_education, :practice_type,
                        :practice_html, :practice_css, :practice_bootstrap, :practice_php, :practice_mysql, :date)");
        $statement->bindValue(':practice_name', $practice->practice_name);
        $statement->bindValue(':practice_email', $practice->practice_email);
        $statement->bindValue(':practice_phone', $practice->practice_phone);
        $statement->bindValue(':practice_education', $practice->practice_education);
        $statement->bindValue(':practice_type', $practice->practice_type);
        $statement->bindValue(':practice_html', $practice->practice_html);
        $statement->bindValue(':practice_css', $practice->practice_css);
        $statement->bindValue(':practice_bootstrap', $practice->practice_bootstrap);
        $statement->bindValue(':practice_php', $practice->practice_php);
        $statement->bindValue(':practice_mysql', $practice->practice_mysql);
        $statement->bindValue(':date', date('Y-m-d H:i:s'));

        $statement->execute();
    }

    public function deletePractice($practice_id) {

        $statement = $this->pdo->prepare('DELETE FROM practice WHERE practice_id = :practice_id');
        $statement->bindValue(':practice_id', $practice_id);
        $statement->execute();


    }

    public function getAdmin(){
        $statement = $this -> pdo -> prepare('SELECT * FROM admin');
        $statement -> execute();
        return $statement -> fetchAll(PDO::FETCH_ASSOC);
    }


}