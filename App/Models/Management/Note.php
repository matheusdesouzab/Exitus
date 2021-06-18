<?php

namespace App\Models\Management;

use App\Models\Management\Exam;

class Note extends Exam
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




    public function list($operation = "")
    {

        $query =

            "SELECT 

            avaliacoes.descricao_avaliacao AS exam_description , 
            disciplina.nome_disciplina AS discipline_name , 
            avaliacoes.valor_avaliacao AS exam_value , 
            nota_avaliacao.valor_nota AS note_value ,
            unidade.unidade AS unity ,
            nota_avaliacao.id_nota AS note_id ,
            avaliacoes.id_avaliacao AS exam_id ,
            avaliacoes.data_realizada AS realize_date ,
            professor.nome_professor AS teacher_name
      
            FROM avaliacoes
            
            INNER JOIN turma_disciplina ON(avaliacoes.fk_turma_disciplina_avaliacao = turma_disciplina.id_turma_disciplina)
            INNER JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor)
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)
            INNER JOIN nota_avaliacao ON(avaliacoes.id_avaliacao = nota_avaliacao.fk_id_avaliacao)
            INNER JOIN matricula ON(nota_avaliacao.fk_id_matricula_aluno = matricula.id_matricula)
            INNER JOIN unidade ON(avaliacoes.fk_id_unidade_avaliacao = unidade.id_unidade)
            
            $operation
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_student_enrollment', $this->__get('fk_id_student_enrollment'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function examsPerformed($operation = '')
    {

        $query =

            "SELECT avaliacoes.id_avaliacao AS exam_id , avaliacoes.descricao_avaliacao AS exam_description , aluno.nome_aluno AS student_id , avaliacoes.valor_avaliacao AS exam_value , nota_avaliacao.valor_nota AS note_value 
            FROM aluno 
            
            LEFT JOIN matricula ON(aluno.id_aluno = matricula.fk_id_aluno) 
            LEFT JOIN nota_avaliacao ON(matricula.id_matricula = nota_avaliacao.fk_id_matricula_aluno) 
            LEFT JOIN avaliacoes ON(nota_avaliacao.fk_id_avaliacao = avaliacoes.id_avaliacao)
            
            $operation 
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_student_enrollment', $this->__get('fk_id_student_enrollment'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function seek()
    {


        $unityOperation = $this->__get('fk_id_exam_unity') == 0 ? '<>' : '=';

        $disciplineClassSituation = $this->__get('fk_id_discipline_class') == 0 ? 'AND turma.id_turma = :fk_id_class AND' : ' AND avaliacoes.fk_turma_disciplina_avaliacao = :fk_id_discipline_class AND ';

        $query =

            "SELECT 

            avaliacoes.descricao_avaliacao AS exam_description , 
            disciplina.nome_disciplina AS discipline_name , 
            avaliacoes.valor_avaliacao AS exam_value , 
            nota_avaliacao.valor_nota AS note_value ,
            unidade.unidade AS unity ,
            nota_avaliacao.id_nota AS note_id ,
            avaliacoes.id_avaliacao AS exam_id 
      
            FROM avaliacoes
            
            INNER JOIN turma_disciplina ON(avaliacoes.fk_turma_disciplina_avaliacao = turma_disciplina.id_turma_disciplina)
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)
            INNER JOIN nota_avaliacao ON(avaliacoes.id_avaliacao = nota_avaliacao.fk_id_avaliacao)
            INNER JOIN matricula ON(nota_avaliacao.fk_id_matricula_aluno = matricula.id_matricula)
            INNER JOIN unidade ON(avaliacoes.fk_id_unidade_avaliacao = unidade.id_unidade)
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)

            WHERE avaliacoes.descricao_avaliacao LIKE :examDescription $disciplineClassSituation
            
            avaliacoes.fk_id_unidade_avaliacao $unityOperation :fk_id_exam_unity 

            AND matricula.id_matricula = :fk_id_student_enrollment
                  
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_student_enrollment', $this->__get('fk_id_student_enrollment'));
        $stmt->bindValue(':examDescription', "%" . $this->__get('examDescription') . "%", \PDO::PARAM_STR);
        $stmt->bindValue(':fk_id_exam_unity', $this->__get('fk_id_exam_unity'));

        $this->__get('fk_id_discipline_class') == 0 ? $stmt->bindValue(':fk_id_class', $this->__get('fk_id_class'))  :

            $stmt->bindValue(':fk_id_discipline_class', $this->__get('fk_id_discipline_class'));
        

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}
