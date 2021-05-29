<?php

namespace App\Models\Student;

use MF\Model\Model;

class StudentEnrollment extends Model
{

    private $fk_student_situation;
    private $fk_id_class;
    private $fk_id_school_term;
    private $fk_id_student;


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

        $query = 
        
            "INSERT INTO matricula 
            
            (fk_id_aluno, fk_id_turma_matricula, fk_id_situacao_aluno, fk_id_periodo_letivo_matricula) 
            
            VALUES 

            (:fk_id_student, :fk_id_class, :fk_student_situation, :fk_id_school_term)
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_student', $this->__get('fk_id_student'));
        $stmt->bindValue(':fk_id_class', $this->__get('fk_id_class'));
        $stmt->bindValue(':fk_student_situation', $this->__get('fk_student_situation'));
        $stmt->bindValue(':fk_id_school_term', $this->__get('fk_id_school_term'));

        $stmt->execute();
    }
    

    public function delete()
    {
        //
    }


    public function list()
    {
        //
    }


    public function update()
    {
        //
    }
}
