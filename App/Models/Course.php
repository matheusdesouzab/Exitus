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

    public function addCourse()
    {

        $query = 'insert into curso(nome_curso,sigla) values (:course,:acronym);';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':course', $this->__get('course'));
        $stmt->bindValue(':acronym', $this->__get('acronym'));

        $stmt->execute();
    }

    public function listCourse()
    {

        $query = 'select curso.id_curso as id_course , curso.nome_curso as course , curso.sigla as acronym from curso;';

        $stmt = $this->db->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function deleteCourse()
    {

        $query = 'delete from curso where curso.id_curso = :idCourse';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':idCourse', $this->__get('idCourse'));

        $stmt->execute();
    }

    public function updateCourse()
    {

        $query = 'update curso set nome_curso = :course , sigla = :acronym where curso.id_curso = :idCourse;';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':course', $this->__get('course'));
        $stmt->bindValue(':acronym', $this->__get('acronym'));
        $stmt->bindValue(':idCourse', $this->__get('idCourse'));

        $stmt->execute();
    }
}
