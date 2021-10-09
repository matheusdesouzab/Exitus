<?php

namespace App\Models\TeacherStudent;

use MF\Model\Model;

class Lack extends Model
{

    private $lackId = 0;
    private $totalLack;
    private $fk_id_discipline_class;
    private $fk_id_unity;
    private $fk_id_enrollment = 0;
    private $fk_id_teacher = 0;


    public function __get($att)
    {
        return $this->$att;
    }


    public function __set($att, $newValue)
    {
        return $this->$att = $newValue;
    }


    /**
     * Inserir o total de faltas de um aluno em uma determinada disciplina e unidade
     * 
     * @return void
     */
    public function insert()
    {

        $query =

            "INSERT INTO falta_aluno
            
                (total_faltas , fk_id_turma_disciplina_falta , fk_id_unidade_falta , fk_id_matricula_falta)

            VALUES 
            
                (:totalLack , :fk_id_discipline_class , :fk_id_unity , :fk_id_enrollment);    
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':totalLack', $this->__get('totalLack'));
        $stmt->bindValue(':fk_id_discipline_class', $this->__get('fk_id_discipline_class'));
        $stmt->bindValue(':fk_id_unity', $this->__get('fk_id_unity'));
        $stmt->bindValue(':fk_id_enrollment', $this->__get('fk_id_enrollment'));

        $stmt->execute();
    }


    /**
     * Retorna todas as faltas de um aluno
     * 
     * @param int $currentSchoolTerm
     * 
     * @return array
     */
    public function list($currentSchoolTerm = 0)
    {

        $query =

            "SELECT 
            
            falta_aluno.id_falta AS lackId , 
            falta_aluno.total_faltas AS totalLack , 
            disciplina.nome_disciplina AS disciplineName , 
            unidade.unidade AS unity,
            falta_aluno.fk_id_matricula_falta AS enrollmentId ,
            turma_disciplina.id_turma_disciplina AS classId ,
            falta_aluno.data_postagem AS post_date ,
            professor.nome_professor AS teacherName ,
            professor.foto_perfil_professor AS teacherProfilePhoto ,
            aluno.foto_perfil_aluno AS studentProfilePhoto ,
            aluno.nome_aluno AS studentName

            FROM falta_aluno
            
            INNER JOIN matricula ON(falta_aluno.fk_id_matricula_falta = matricula.id_matricula)
            INNER JOIN aluno ON(matricula.fk_id_aluno = aluno.id_aluno)
            LEFT JOIN turma_disciplina ON(falta_aluno.fk_id_turma_disciplina_falta = turma_disciplina.id_turma_disciplina)         
            LEFT JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)         
            LEFT JOIN unidade ON(falta_aluno.fk_id_unidade_falta = unidade.id_unidade)
            LEFT JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor)
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo)
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo) 

            WHERE 
            
            CASE WHEN :fk_id_enrollment >= 1 THEN falta_aluno.fk_id_matricula_falta = :fk_id_enrollment ELSE falta_aluno.fk_id_matricula_falta <> 0 END

            AND

            CASE WHEN :lackId >= 1 THEN falta_aluno.id_falta = :lackId ELSE falta_aluno.id_falta <> 0 END

            AND 
            
            CASE WHEN :fk_id_teacher >= 1 THEN turma_disciplina.fk_id_professor = :fk_id_teacher ELSE turma_disciplina.fk_id_professor <> 0 END

            AND

            CASE WHEN $currentSchoolTerm = 0 THEN situacao_periodo_letivo.id_situacao_periodo_letivo <> 0 ELSE situacao_periodo_letivo.id_situacao_periodo_letivo = 1 END

            ORDER BY falta_aluno.total_faltas DESC
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_enrollment', $this->__get('fk_id_enrollment'));
        $stmt->bindValue(':lackId', $this->__get('lackId'));
        $stmt->bindValue(':fk_id_teacher', $this->__get('fk_id_teacher'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna as disciplinas de um aluno onde as faltas totais não foram atribuidas, em uma determinada unidade.
     * 
     * @return array
     */
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


    /**
     * Atualizar faltas totais de um aluno
     * 
     * @return void
     */
    public function update()
    {

        $query = "UPDATE falta_aluno SET total_faltas = :totalLack WHERE falta_aluno.id_falta = :lackId";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':totalLack', $this->__get('totalLack'));
        $stmt->bindValue(':lackId', $this->__get('lackId'));

        $stmt->execute();
    }


    /**
     * Buscar faltas totais de um aluno
     * 
     * @param string $orderBy 
     * 
     * @return array
     */
    public function seek($orderBy = "")
    {

        $query =

            "SELECT 
            
            falta_aluno.id_falta AS lackId , 
            falta_aluno.total_faltas AS totalLack , 
            disciplina.nome_disciplina AS disciplineName , 
            unidade.unidade AS unity,
            falta_aluno.fk_id_matricula_falta AS enrollmentId

            FROM falta_aluno
            
            LEFT JOIN turma_disciplina ON(falta_aluno.fk_id_turma_disciplina_falta = turma_disciplina.id_turma_disciplina)        
            LEFT JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)        
            LEFT JOIN unidade ON(falta_aluno.fk_id_unidade_falta = unidade.id_unidade)

            WHERE falta_aluno.fk_id_matricula_falta = :fk_id_enrollment

            AND 
            
            CASE WHEN :fk_id_teacher >= 1 THEN turma_disciplina.fk_id_professor = :fk_id_teacher ELSE turma_disciplina.fk_id_professor <> 0 END

            AND

            CASE WHEN :fk_id_unity = 0 THEN unidade.id_unidade <> 0 ELSE unidade.id_unidade = :fk_id_unity END

            AND

            CASE WHEN :fk_id_discipline_class = 0 THEN turma_disciplina.id_turma_disciplina <> 0 ELSE turma_disciplina.id_turma_disciplina = :fk_id_discipline_class END

            ORDER BY falta_aluno.total_faltas $orderBy
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_enrollment', $this->__get('fk_id_enrollment'));
        $stmt->bindValue(':fk_id_unity', $this->__get('fk_id_unity'));
        $stmt->bindValue(':fk_id_teacher', $this->__get('fk_id_teacher'));
        $stmt->bindValue(':fk_id_discipline_class', $this->__get('fk_id_discipline_class'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}
