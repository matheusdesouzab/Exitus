<?php

namespace App\Models\Management;

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


    public function insert()
    {

        $query = 'INSERT INTO curso(nome_curso,sigla) VALUES (:course,:acronym);';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':course', $this->__get('course'));
        $stmt->bindValue(':acronym', $this->__get('acronym'));

        $stmt->execute();
    }


    public function list()
    {

        return $this->speedingUp(
            "SELECT curso.id_curso AS id_course , curso.nome_curso AS course , curso.sigla AS acronym FROM curso;"
        );
    }


    public function delete()
    {

        $query = 'DELETE FROM curso WHERE curso.id_curso = :idCourse';
        
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':idCourse', $this->__get('idCourse'));

        $stmt->execute();
    }


    public function update()
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
