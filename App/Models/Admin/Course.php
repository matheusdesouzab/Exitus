<?php

namespace App\Models\Admin;

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

        $query = "INSERT INTO curso(nome_curso, sigla) VALUES (:courseName, :acronym)";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":courseName", $this->__get("courseName"));
        $stmt->bindValue(":acronym", $this->__get("acronym"));

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

        $query = "DELETE FROM curso WHERE curso.id_curso = :courseId";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":courseId", $this->__get("courseId"));

        $stmt->execute();
    }


    public function update()
    {

        $query = "UPDATE curso SET nome_curso = :courseName , sigla = :acronym WHERE curso.id_curso = :courseId";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":courseName", $this->__get("courseName"));
        $stmt->bindValue(":acronym", $this->__get("acronym"));
        $stmt->bindValue(":courseId", $this->__get("courseId"));

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

    public function totalStudentsCourse()
    {

        return $this->speedingUp(

            "SELECT curso.nome_curso AS courseName,

            (SELECT COUNT(matricula.id_matricula)
            
            FROM matricula 

            INNER JOIN turma ON(matricula.fk_id_turma_matricula = turma.id_turma) 
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo)
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo) 
            
            WHERE turma.fk_id_curso = curso.id_curso AND situacao_periodo_letivo.id_situacao_periodo_letivo = 1) AS totalStudensCourse

            FROM curso
        
        ");
    }
}
