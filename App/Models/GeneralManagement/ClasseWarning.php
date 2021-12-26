<?php

namespace App\Models\GeneralManagement;

use MF\Model\Model;

class ClasseWarning extends Model
{

    private $classeWarningId;
    private $warning;
    private $fk_id_discipline_class;


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

        $query = "INSERT INTO aviso_turma (aviso, fk_id_turma_disciplina) VALUES (:warning, :fk_id_discipline_class)";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':warning', $this->__get('warning'));
        $stmt->bindValue(':fk_id_discipline_class', $this->__get('fk_id_discipline_class'));

        $stmt->execute();
    }


    public function list($classe)
    {

        $query =

            "SELECT 

            id_aviso_turma AS id , 
            aviso AS warning , 
            professor.nome_professor AS teacher_name , 
            professor.foto_perfil_professor AS teacher_profile_photo,
            aviso_turma.data_postagem AS post_date ,
            disciplina.nome_disciplina AS discipline_name
           
            FROM aviso_turma 
            
            INNER JOIN turma_disciplina ON(aviso_turma.fk_id_turma_disciplina = turma_disciplina.id_turma_disciplina) 
            INNER JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor) 
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)
            
            WHERE turma_disciplina.fk_id_turma = :classId
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':classId', $classe->__get('classId'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}
