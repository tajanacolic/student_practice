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

    public function getPractice($search, $practice_activity)
    {
        if($search && $practice_activity === 1)
        {
            $statement = $this->pdo->prepare('SELECT * FROM practice WHERE practice_type LIKE :practice_type AND practice_activity LIKE 1 ORDER BY create_date DESC');
            $statement->bindValue(':practice_type', "%$search%");
        }
        else if($search)
        {
            $statement = $this->pdo->prepare('SELECT * FROM practice WHERE practice_type LIKE :practice_type ORDER BY create_date DESC');
            $statement->bindValue(':practice_type', "%$search%");
        }
        else if($practice_activity === 1)
        {
            $statement = $this->pdo->prepare('SELECT * FROM practice WHERE practice_activity LIKE 1 ORDER BY create_date DESC');
        }
        else
        {
            $statement = $this->pdo->prepare('SELECT * FROM practice ORDER BY create_date ASC');
        }
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
        
        return $this->pdo->lastInsertId();
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

    public function addEvent($start, $end, $id, $title){
        $statement = $this-> pdo -> prepare("INSERT INTO calendar (start_event, end_event, student_id, title)
                                            VALUES (:start, :end, :id, :title)");
        $statement -> bindValue(':start', $start);
        $statement -> bindValue(':end', $end);
        $statement -> bindValue(':id', $id);
        $statement -> bindValue(':title', $title);
        $statement -> execute();
    }

    public function addEventColor($student_id, $color){

        $statement = $this->pdo->prepare("UPDATE calendar SET color = :color WHERE student_id = :student_id");
        $statement->bindValue(':color', $color);
        $statement->bindValue(':student_id', $student_id);
        $statement->execute();

    }

    public function activityCalendar(Practice $practice)
    {
        $statement = $this->pdo->prepare("UPDATE calendar SET activity = :practice_activity
                                        WHERE student_id = :practice_id");
        $statement->bindValue(':practice_activity', $practice->practice_activity);
        $statement->bindValue(':practice_id', $practice->practice_id);

        $statement->execute();
    }

    public function getEvents()
    {
        $statement = $this -> pdo -> prepare('SELECT * FROM calendar WHERE activity LIKE 1 ORDER BY calendar_id DESC');
        $statement -> execute();
        return $statement -> fetchAll();
    }

    public function getEventsbyId($id){
        $statement = $this -> pdo -> prepare('SELECT * FROM calendar WHERE student_id = :id');
        $statement -> bindValue(':id', $id);
        $statement -> execute();
        return $statement -> fetchAll();
    }

    public function deleteEvent($id)
    {
        $statement = $this->pdo->prepare('DELETE FROM calendar WHERE calendar_id = :calendar_id');
        $statement->bindValue(':calendar_id', $id);
        $statement->execute();
    }

    public function updateEvent($id, $start, $end)
    {
        $statement = $this->pdo->prepare('UPDATE calendar SET start_event = :start_event, end_event = :end_event WHERE calendar_id = :calendar_id');
        $statement->bindValue(':calendar_id', $id);
        $statement->bindValue(':start_event', $start);
        $statement->bindValue(':end_event', $end);
        $statement->execute();
    }

}