<?php

namespace App\Models\Student;

use MF\Model\Model;

class Observation extends Model
{

    private $observationDescription;
    private $sendDate;
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

            "INSERT INTO observacao_aluno (fk_id_turma_disciplina_observacao , fk_id_unidade , fk_id_matricula_observacao , descricao)

            VALUES (:fk_id_discipline_class , :fk_id_unity , :fk_id_enrollment , :observationDescription)
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_discipline_class', $this->__get('fk_id_discipline_class'));
        $stmt->bindValue(':fk_id_unity', $this->__get('fk_id_unity'));
        $stmt->bindValue(':fk_id_enrollment', $this->__get('fk_id_enrollment'));
        $stmt->bindValue(':observationDescription', $this->__get('observationDescription'));

        $stmt->execute();
    }


    public function list()
    {


        $query =

            "SELECT  
            
            observacao_aluno.id_observacao AS observationId ,
            observacao_aluno.descricao AS observationDescription ,
            observacao_aluno.data_envio AS sendDate ,
            professor.nome_professor AS teacherName ,
            professor.foto_perfil_professor AS teacherProfilePhoto ,
            unidade.unidade AS unity ,
            disciplina.nome_disciplina AS disciplineName ,
            observacao_aluno.fk_id_matricula_observacao AS enrollmentId

            FROM observacao_aluno

            INNER JOIN turma_disciplina ON(observacao_aluno.fk_id_turma_disciplina_observacao = turma_disciplina.id_turma_disciplina)
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)
            INNER JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor)
            INNER JOIN unidade ON(observacao_aluno.fk_id_unidade = unidade.id_unidade)

            WHERE observacao_aluno.fk_id_matricula_observacao = :fk_id_enrollment

            AND

            CASE WHEN :fk_id_teacher = 0 THEN professor.id_professor <> 0 ELSE professor.id_professor = :fk_id_teacher END
   
        ";


        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_enrollment', $this->__get('fk_id_enrollment'));
        $stmt->bindValue(':fk_id_teacher', $this->__get('fk_id_teacher'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function update()
    {

        $query = "UPDATE observacao_aluno SET descricao = :observationDescription WHERE observacao_aluno.id_observacao = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->bindValue(':observationDescription', $this->__get('observationDescription'));

        $stmt->execute();
    }


    public function delete()
    {

        $query = "DELETE FROM observacao_aluno WHERE observacao_aluno.id_observacao = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':id', $this->__get('id'));

        $stmt->execute();
    }
}
