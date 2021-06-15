<?php

namespace App\Models\Management;

use MF\Model\Model;

class Note extends Model
{

    private $noteId;
    private $noteValue;
    private $fk_id_exam;
    private $fk_id_student_enrollment;


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
        
            "INSERT INTO nota_avaliacao (valor_nota , fk_id_avaliacao , fk_id_matricula_aluno) 
            
            VALUES 
            
            (:noteValue , :fk_id_exam , :fk_id_student_enrollment)
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':noteValue', $this->__get('noteValue'));
        $stmt->bindValue(':fk_id_exam', $this->__get('fk_id_exam'));
        $stmt->bindValue(':fk_id_student_enrollment', $this->__get('fk_id_student_enrollment'));

        $stmt->execute();
    }





}
