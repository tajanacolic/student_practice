<?php

namespace app\models;

use app\Database;

class Practice
{

    public ?int $practice_id = null;
    public ?string $practice_name = null;
    public ?string $practice_email = null;
    public ?string $practice_phone = null;
    public ?string $practice_education = null;
    public ?string $practice_type = null;
    public ?bool $practice_activity = null;

    public function load($data) {

        $this->practice_id = $data['practice_id'] ?? null;
        $this->practice_name = $data['practice_name'];
        $this->practice_email = $data['practice_email'];
        $this->practice_phone = $data['practice_phone'];
        $this->practice_education = $data['practice_education'];
        $this->practice_type = $data['practice_type'];
        $this->practice_activity = $data['practice_activity'];

    }

    public function save() {



        $errors = [];

        if (!$this->practice_name) {

            $errors[] = 'Your name is required.';

        }

        if (!$this->practice_email) {

            $errors[] = 'Your email is required.';

        }

        if (!$this->practice_phone) {

            $errors[] = 'Your phone number is required.';

        }

        if (!$this->practice_education) {

            $errors[] = 'Your level of education is required.';

        }
        if (!$this->practice_type) {

            $errors[] = 'Your practice type is required.';

        }

        if (empty($errors)) {

            $db = Database::$db;

            if ($this->practice_id) {

                $db->updatePractice($this);

            } else {

                $db->createPractice($this);

            }

        }
        return $errors;
    }

}