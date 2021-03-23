<?php

namespace App\Models;

use MF\Model\Model;

class Course extends Model
{
    protected $idCourse;
    protected $course;
    protected $acronym;


    public function insertCourse()
    {

        $query = 'INSERT INTO curso(nome_curso,sigla) VALUES (:course,:acronym);';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':course', $this->__get('course'));
        $stmt->bindValue(':acronym', $this->__get('acronym'));

        $stmt->execute();
    }

    public function listCourse()
    {

        return $this->speedingUp(
            "SELECT curso.id_curso AS id_course , curso.nome_curso AS course , curso.sigla AS acronym FROM curso;"
        );
    }

    public function deleteCourse()
    {

        $query = 'DELETE FROM curso WHERE curso.id_curso = :idCourse';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':idCourse', $this->__get('idCourse'));

        $stmt->execute();
    }

    public function updateCourse()
    {

        $query = 'UPDATE curso SET nome_curso = :course , sigla = :acronym WHERE curso.id_curso = :idCourse;';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':course', $this->__get('course'));
        $stmt->bindValue(':acronym', $this->__get('acronym'));
        $stmt->bindValue(':idCourse', $this->__get('idCourse'));

        $stmt->execute();
    }

    public function availableCourse()
    {

        return $this->speedingUp(
            "SELECT curso.id_curso AS option_value , curso.nome_curso AS option_text FROM curso"
        );
    }
}
