<?php

namespace App\Models\TeacherStudent;

use MF\Model\Model;

class Observation extends Model
{

    private $observationDescription;
    private $sendDate;
    private $fk_id_discipline_class;
    private $fk_id_unity;
    private $fk_id_enrollment;


    public function __get($att)
    {
        return $this->$att;
    }


    public function __set($att, $newValue)
    {
        return $this->$att = $newValue;
    }


    /**
     * Criar observação
     * 
     * @return void
     */
    public function insert()
    {

        $query =

            "INSERT INTO observacao_aluno 
            
                (fk_id_turma_disciplina_observacao , fk_id_unidade , fk_id_matricula_observacao , descricao)

            VALUES 
            
                (:fk_id_discipline_class , :fk_id_unity , :fk_id_enrollment , :observationDescription)     
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_discipline_class', $this->__get('fk_id_discipline_class'));
        $stmt->bindValue(':fk_id_unity', $this->__get('fk_id_unity'));
        $stmt->bindValue(':fk_id_enrollment', $this->__get('fk_id_enrollment'));
        $stmt->bindValue(':observationDescription', $this->__get('observationDescription'));

        $stmt->execute();
    }


    /**
     * Retorna todas as observações de um aluno
     * 
     * @return array
     */
    public function readByIdStudent()
    {

        $query =

            "SELECT  
            
            observacao_aluno.id_observacao AS observation_id ,
            observacao_aluno.descricao AS observation_description ,
            observacao_aluno.data_postagem AS post_date ,
            professor.nome_professor AS teacher_name ,
            professor.foto_perfil_professor AS teacher_profile_photo ,
            unidade.unidade AS unity ,
            disciplina.nome_disciplina AS discipline_name ,
            observacao_aluno.fk_id_matricula_observacao AS enrollment_id ,
            serie.sigla AS series_acronym , 
            cedula_turma.cedula AS ballot , 
            curso.sigla AS course , 
            turno.nome_turno AS shift ,  
            periodo_disponivel.ano_letivo AS school_term ,
            aluno.foto_perfil_aluno AS student_profile_photo ,
            aluno.nome_aluno AS student_name

            FROM observacao_aluno

            INNER JOIN turma_disciplina ON(observacao_aluno.fk_id_turma_disciplina_observacao = turma_disciplina.id_turma_disciplina)
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)
            INNER JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor)
            INNER JOIN unidade ON(observacao_aluno.fk_id_unidade = unidade.id_unidade)
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            INNER JOIN cedula_turma ON(turma.fk_id_cedula = cedula_turma.id_cedula_turma) 
            INNER JOIN curso ON(turma.fk_id_curso = curso.id_curso) 
            INNER JOIN serie ON(turma.fk_id_serie = serie.id_serie) 
            INNER JOIN turno ON(turma.fk_id_turno = turno.id_turno)
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo) 
            INNER JOIN periodo_disponivel ON(periodo_letivo.fk_id_ano_letivo = periodo_disponivel.id_periodo_disponivel) 
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)
            INNER JOIN matricula ON(observacao_aluno.fk_id_matricula_observacao = matricula.id_matricula) 
            INNER JOIN aluno ON(matricula.fk_id_aluno = aluno.id_aluno)

            WHERE observacao_aluno.fk_id_matricula_observacao = :fk_id_enrollment

            ORDER BY observacao_aluno.data_postagem DESC
   
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':fk_id_enrollment', $this->__get('fk_id_enrollment'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna todas as observações de um aluno com base no id do docente
     * 
     * @return array
     */
    public function readByIdTeacher($teacher)
    {

        $query =

            "SELECT  
            
            observacao_aluno.id_observacao AS observation_id ,
            observacao_aluno.descricao AS observation_description ,
            observacao_aluno.data_postagem AS post_date ,
            professor.nome_professor AS teacher_name ,
            professor.foto_perfil_professor AS teacher_profile_photo ,
            unidade.unidade AS unity ,
            disciplina.nome_disciplina AS discipline_name ,
            observacao_aluno.fk_id_matricula_observacao AS enrollment_id ,
            serie.sigla AS series_acronym , 
            cedula_turma.cedula AS ballot , 
            curso.sigla AS course , 
            turno.nome_turno AS shift ,  
            periodo_disponivel.ano_letivo AS school_term ,
            aluno.foto_perfil_aluno AS student_profile_photo ,
            aluno.nome_aluno AS student_name

            FROM observacao_aluno

            INNER JOIN turma_disciplina ON(observacao_aluno.fk_id_turma_disciplina_observacao = turma_disciplina.id_turma_disciplina)
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)
            INNER JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor)
            INNER JOIN unidade ON(observacao_aluno.fk_id_unidade = unidade.id_unidade)
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            INNER JOIN cedula_turma ON(turma.fk_id_cedula = cedula_turma.id_cedula_turma) 
            INNER JOIN curso ON(turma.fk_id_curso = curso.id_curso) 
            INNER JOIN serie ON(turma.fk_id_serie = serie.id_serie) 
            INNER JOIN turno ON(turma.fk_id_turno = turno.id_turno)
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo) 
            INNER JOIN periodo_disponivel ON(periodo_letivo.fk_id_ano_letivo = periodo_disponivel.id_periodo_disponivel) 
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)
            INNER JOIN matricula ON(observacao_aluno.fk_id_matricula_observacao = matricula.id_matricula) 
            INNER JOIN aluno ON(matricula.fk_id_aluno = aluno.id_aluno)

            WHERE professor.id_professor = :fk_id_teacher

            AND observacao_aluno.fk_id_matricula_observacao = :fk_id_enrollment     

            ORDER BY observacao_aluno.data_postagem DESC
   
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':fk_id_teacher', $teacher->__get('teacherId'));
        $stmt->bindValue(':fk_id_enrollment', $this->__get('fk_id_enrollment'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna todas as observações dos alunos no período letivo
     * 
     * @return array
     */
    public function readAll()
    {

        return $this->speedingUp(

            "SELECT  
            
            observacao_aluno.id_observacao AS observation_id ,
            observacao_aluno.descricao AS observation_description ,
            observacao_aluno.data_postagem AS post_date ,
            professor.nome_professor AS teacher_name ,
            professor.foto_perfil_professor AS teacher_profile_photo ,
            unidade.unidade AS unity ,
            disciplina.nome_disciplina AS discipline_name ,
            observacao_aluno.fk_id_matricula_observacao AS enrollment_id ,
            serie.sigla AS series_acronym , 
            cedula_turma.cedula AS ballot , 
            curso.sigla AS course , 
            turno.nome_turno AS shift ,  
            periodo_disponivel.ano_letivo AS school_term ,
            aluno.foto_perfil_aluno AS student_profile_photo ,
            aluno.nome_aluno AS student_name

            FROM observacao_aluno

            INNER JOIN turma_disciplina ON(observacao_aluno.fk_id_turma_disciplina_observacao = turma_disciplina.id_turma_disciplina)
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)
            INNER JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor)
            INNER JOIN unidade ON(observacao_aluno.fk_id_unidade = unidade.id_unidade)
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            INNER JOIN cedula_turma ON(turma.fk_id_cedula = cedula_turma.id_cedula_turma) 
            INNER JOIN curso ON(turma.fk_id_curso = curso.id_curso) 
            INNER JOIN serie ON(turma.fk_id_serie = serie.id_serie) 
            INNER JOIN turno ON(turma.fk_id_turno = turno.id_turno)
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo) 
            INNER JOIN periodo_disponivel ON(periodo_letivo.fk_id_ano_letivo = periodo_disponivel.id_periodo_disponivel) 
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)
            INNER JOIN matricula ON(observacao_aluno.fk_id_matricula_observacao = matricula.id_matricula) 
            INNER JOIN aluno ON(matricula.fk_id_aluno = aluno.id_aluno)

            WHERE situacao_periodo_letivo.id_situacao_periodo_letivo = 1

            ORDER BY observacao_aluno.data_postagem DESC"

        );
    }


    /**
     * Atualizar dados da observação
     * 
     * @return void
     */
    public function update()
    {

        $query = "UPDATE observacao_aluno SET descricao = :observationDescription WHERE observacao_aluno.id_observacao = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->bindValue(':observationDescription', $this->__get('observationDescription'));

        $stmt->execute();
    }


    /**
     * Deletar observação
     * 
     * @return void
     */
    public function delete()
    {

        $query = "DELETE FROM observacao_aluno WHERE observacao_aluno.id_observacao = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();
    }
}
