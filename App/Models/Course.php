<?php

namespace App\Models;

use MF\Model\Model;

class Course extends Model
{
    private $idCourse;
    private $course;
    private $acronym;

    public function __get($att)
    {
        return $this->$att;
    }

    public function __set($att, $newValue)
    {
        return $this->$att = $newValue;
    }
}
