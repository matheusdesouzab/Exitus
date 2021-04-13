<?php

namespace App\Models;

use App\Models\Student;

class StudentEnrollment extends Student
{

    protected $fk_student_situation;
    protected $fk_id_class;
    protected $fk_id_school_term;


    public function insertEnrollment()
    {

        $query = "INSERT INTO matricula (fk_id_aluno,fk_id_turma_matricula,fk_id_situacao_aluno,fk_id_periodo_letivo_matricula) VALUES 
        (:id,:fk_id_class,:fk_student_situation,:fk_id_school_term)";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->bindValue(':fk_id_class', $this->__get('fk_id_class'));
        $stmt->bindValue(':fk_student_situation', $this->__get('fk_student_situation'));
        $stmt->bindValue(':fk_id_school_term', $this->__get('fk_id_school_term'));

        $stmt->execute();
    }
}
