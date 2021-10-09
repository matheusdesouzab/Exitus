<?php

namespace App\Models\Student;

use MF\Model\Model;

class StudentEnrollment extends Model
{

    private $fk_id_student_situation;
    private $fk_id_class;
    private $fk_id_school_term;
    private $fk_id_student;
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
     * Criar matrícula do aluno
     * 
     * @return void
     */
    public function insert()
    {

        $query =

            "INSERT INTO matricula 
            
                (fk_id_aluno, fk_id_turma_matricula, fk_id_situacao_aluno, fk_id_periodo_letivo_matricula) 
            
            VALUES 

                (:fk_id_student, :fk_id_class, :fk_id_student_situation, :fk_id_school_term)
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_student', $this->__get('fk_id_student'));
        $stmt->bindValue(':fk_id_class', $this->__get('fk_id_class'));
        $stmt->bindValue(':fk_id_student_situation', $this->__get('fk_id_student_situation'));
        $stmt->bindValue(':fk_id_school_term', $this->__get('fk_id_school_term'));

        $stmt->execute();
    }


    /**
     * Atualizar dados da matrícula
     * 
     * @return void
     */
    public function update()
    {

        $query = "UPDATE matricula SET matricula.fk_id_situacao_aluno = :fk_id_student_situation WHERE matricula.id_matricula = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_student_situation', $this->__get('fk_id_student_situation'));
        $stmt->bindValue(':id', $this->__get('id'));

        $stmt->execute();
    }


    /**
     * Retorna os dados necessários para a criação do boletim do aluno
     * 
     * @return array
     */
    public function bulletin()
    {

        $query =

            "SELECT 
 
            disciplina.nome_disciplina AS disciplineName , 
            unidade.unidade AS unity,
            SUM(nota_avaliacao.valor_nota) AS note ,
            turma_disciplina.id_turma_disciplina AS classId
            
            FROM nota_avaliacao 
            
            LEFT JOIN avaliacoes ON(nota_avaliacao.fk_id_avaliacao = avaliacoes.id_avaliacao) 
            LEFT JOIN unidade ON(avaliacoes.fk_id_unidade_avaliacao = unidade.id_unidade) 
            LEFT JOIN turma_disciplina ON(avaliacoes.fk_id_turma_disciplina_avaliacao = turma_disciplina.id_turma_disciplina) 
            LEFT JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina) 
            LEFT JOIN matricula ON(nota_avaliacao.fk_id_matricula_aluno = matricula.id_matricula) 
            LEFT JOIN aluno ON(matricula.fk_id_aluno = aluno.id_aluno) 
            
            WHERE matricula.id_matricula = :id

            AND CASE WHEN :fk_id_teacher = 0 THEN turma_disciplina.fk_id_professor <> 0 ELSE turma_disciplina.fk_id_professor = :fk_id_teacher END
            
            GROUP BY unidade.unidade , disciplina.nome_disciplina
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->bindValue(':fk_id_teacher', $this->__get('fk_id_teacher'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna os estados que a matrícula do aluno pode está. Entretanto, ele deve ser usado para peencher a tag select na View.
     * 
     * @return array
     */
    public function studentSituation()
    {

        return $this->speedingUp(
            "SELECT id_situacao_aluno AS option_value , situacao_aluno AS option_text FROM situacao_aluno_ano_letivo"
        );
    }


    /**
     * Esse método retorna a quantidade de alunos baseado no status de matrículas disponíveis
     * 
     * @return array
     */
    public function studentSituationSchoolYear()
    {

        return $this->speedingUp(

            "SELECT situacao_aluno_ano_letivo.situacao_aluno AS studentStatus , 

            (SELECT COUNT(matricula.id_matricula) 
             
            FROM matricula 
            
            LEFT JOIN periodo_letivo ON(matricula.fk_id_periodo_letivo_matricula = periodo_letivo.id_ano_letivo)
            LEFT JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)
             
            WHERE matricula.fk_id_situacao_aluno = situacao_aluno_ano_letivo.id_situacao_aluno 
             
            AND situacao_periodo_letivo.id_situacao_periodo_letivo = 1
            
            ) AS total 
            
            FROM situacao_aluno_ano_letivo"

        );
    }
}
