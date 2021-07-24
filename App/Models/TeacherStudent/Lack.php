<?php

namespace App\Models\TeacherStudent;

use MF\Model\Model;

class Lack extends Model
{

    private $totalLack;
    private $fk_id_discipline_class;
    private $fk_id_unity;
    private $fk_id_enrollment;
    private $fk_id_teacher;


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

            "INSERT INTO falta_aluno(total_faltas , fk_id_turma_disciplina_falta , fk_id_unidade_falta , fk_id_matricula_falta)

            VALUES (:totalLack , :fk_id_discipline_class , :fk_id_unity , :fk_id_enrollment);
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':totalLack', $this->__get('totalLack'));
        $stmt->bindValue(':fk_id_discipline_class', $this->__get('fk_id_discipline_class'));
        $stmt->bindValue(':fk_id_unity', $this->__get('fk_id_unity'));
        $stmt->bindValue(':fk_id_enrollment', $this->__get('fk_id_enrollment'));

        $stmt->execute();
    }


    public function list()
    {

        $query =

            "SELECT 
            
            falta_aluno.id_falta AS lackId , 
            falta_aluno.total_faltas AS totalLack , 
            disciplina.nome_disciplina AS disciplineName , 
            unidade.unidade AS unity

            FROM falta_aluno
            
            LEFT JOIN turma_disciplina ON(falta_aluno.fk_id_turma_disciplina_falta = turma_disciplina.id_turma_disciplina)
            
            LEFT JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)
            
            LEFT JOIN unidade ON(falta_aluno.fk_id_unidade_falta = unidade.id_unidade)

            WHERE 
            
            CASE WHEN :fk_id_enrollment >= 1 THEN falta_aluno.fk_id_matricula_falta = :fk_id_enrollment ELSE falta_aluno.fk_id_matricula_falta <> :fk_id_enrollment END

            AND

            CASE WHEN :id >= 1 THEN falta_aluno.id_falta = 1 ELSE falta_aluno.id_falta <> 0 END
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_enrollment', $this->__get('fk_id_enrollment'));
        $stmt->bindValue(':id', $this->__get('id'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function lackAvailable()
    {

        $query =

            "SELECT 
            
            falta_aluno.id_falta AS total

            FROM falta_aluno

            WHERE falta_aluno.fk_id_matricula_falta = :fk_id_enrollment 

            AND

            falta_aluno.fk_id_unidade_falta = :fk_id_unity

            AND

            falta_aluno.fk_id_turma_disciplina_falta = :fk_id_discipline_class
    
    ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_discipline_class', $this->__get('fk_id_discipline_class'));
        $stmt->bindValue(':fk_id_unity', $this->__get('fk_id_unity'));
        $stmt->bindValue(':fk_id_enrollment', $this->__get('fk_id_enrollment'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}
