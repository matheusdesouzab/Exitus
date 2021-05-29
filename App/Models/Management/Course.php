<?php

namespace App\Models\Management;

use MF\Model\Model;

class Course extends Model
{

    private $courseId;
    private $courseName;
    private $acronym;


    public function __get($att)
    {
        return $this->$att;
    }


    public function __set($att, $newValue)
    {
        return $this->$att = $newValue;
    }


    public function insert()
    {

        $query = 'INSERT INTO curso(nome_curso, sigla) VALUES (:courseName, :acronym);';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':courseName', $this->__get('courseName'));
        $stmt->bindValue(':acronym', $this->__get('acronym'));

        $stmt->execute();
    }


    public function list()
    {

        return $this->speedingUp(

            "SELECT 
            
            curso.id_curso AS course_id , 
            curso.nome_curso AS course_name , 
            curso.sigla AS acronym 
            
            FROM curso"

        );
    }


    public function delete()
    {

        $query = 'DELETE FROM curso WHERE curso.id_curso = :courseId';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':courseId', $this->__get('courseId'));

        $stmt->execute();
    }


    public function update()
    {

        $query = 'UPDATE curso SET nome_curso = :courseName , sigla = :acronym WHERE curso.id_curso = :courseId';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':courseName', $this->__get('courseName'));
        $stmt->bindValue(':acronym', $this->__get('acronym'));
        $stmt->bindValue(':courseId', $this->__get('courseId'));

        $stmt->execute();
    }


    public function availableCourse()
    {

        return $this->speedingUp(

            "SELECT 
            
            curso.id_curso AS option_value , 
            curso.nome_curso AS option_text 
            
            FROM curso"

        );
    }
}
