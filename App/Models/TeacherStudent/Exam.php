<?php

namespace App\Models\TeacherStudent;

use MF\Model\Model;

class Exam extends Model
{

    private $examId = 0;
    private $examDescription;
    private $examValue;
    private $realizeDate;
    private $fk_id_exam_unity = 0;
    private $fk_id_discipline_class = 0;
    private $fk_id_class = 0;
    private $fk_id_teacher = 0;


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

            "INSERT INTO avaliacoes 

            (descricao_avaliacao , valor_avaliacao	, data_realizada , fk_id_unidade_avaliacao , fk_id_turma_disciplina_avaliacao)

            VALUES

            (:examDescription , :examValue , :realizeDate , :fk_id_exam_unity , :fk_id_discipline_class)
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':examDescription', $this->__get('examDescription'));
        $stmt->bindValue(':examValue', $this->__get('examValue'));
        $stmt->bindValue(':realizeDate', $this->__get('realizeDate'));
        $stmt->bindValue(':fk_id_exam_unity', $this->__get('fk_id_exam_unity'));
        $stmt->bindValue(':fk_id_discipline_class', $this->__get('fk_id_discipline_class'));

        $stmt->execute();
    }


    public function unity()
    {

        $query = "SET @controle_unidade = (SELECT configuracao.fk_id_controle_unidade FROM configuracao)";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $this->speedingUp(

            "SELECT unidade.id_unidade AS option_value , unidade.unidade AS option_text
            
            FROM unidade 
            
            WHERE 
            
            CASE 
            
            WHEN @controle_unidade = 1 THEN unidade.id_unidade = 1  
            WHEN @controle_unidade = 2 THEN unidade.id_unidade BETWEEN 1 AND 2
            ELSE unidade.id_unidade <> 0 END;"
        );
    }


    public function sumUnitGrades()
    {

        $query =

            "SELECT SUM(avaliacoes.valor_avaliacao) AS sum_notes

            FROM avaliacoes 
            
            WHERE avaliacoes.fk_id_unidade_avaliacao = :fk_id_exam_unity

            AND avaliacoes.fk_id_turma_disciplina_avaliacao = :fk_id_discipline_class
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_exam_unity', $this->__get('fk_id_exam_unity'));
        $stmt->bindValue(':fk_id_discipline_class', $this->__get('fk_id_discipline_class'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function list()
    {

        $query =

            "SELECT 
            
            avaliacoes.id_avaliacao AS exam_id, 
            avaliacoes.descricao_avaliacao AS exam_description , 
            disciplina.nome_disciplina AS discipline_name, 
            avaliacoes.data_realizada AS realize_date, 
            avaliacoes.valor_avaliacao AS exam_value, 
            unidade.unidade AS unity,
            avaliacoes.fk_id_unidade_avaliacao AS fk_id_exam_unity,
            turma_disciplina.id_turma_disciplina AS fk_id_discipline_class ,
            professor.nome_professor AS teacher_name ,
            turma.id_turma AS class_id ,
            professor.foto_perfil_professor AS profilePhoto
            
            FROM avaliacoes 
            
            INNER JOIN turma_disciplina ON(avaliacoes.fk_id_turma_disciplina_avaliacao = turma_disciplina.id_turma_disciplina) 
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina) 
            INNER JOIN unidade ON(avaliacoes.fk_id_unidade_avaliacao = unidade.id_unidade) 
            INNER JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor)       
            
            WHERE 
            
            CASE WHEN :examId = 0 THEN avaliacoes.id_avaliacao <> 0 ELSE avaliacoes.id_avaliacao = :examId END

            AND

            CASE WHEN :fk_id_teacher = 0 THEN professor.id_professor <> 0 ELSE professor.id_professor = :fk_id_teacher END

            AND

            CASE WHEN :fk_id_class = 0 THEN turma.id_turma <> 0 ELSE turma.id_turma = :fk_id_class END
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':examId', $this->__get('examId'));
        $stmt->bindValue(':fk_id_teacher', $this->__get('fk_id_teacher'));
        $stmt->bindValue(':fk_id_class', $this->__get('fk_id_class'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function update()
    {

        $query =

            "UPDATE avaliacoes SET

            avaliacoes.data_realizada = :realizeDate ,
            avaliacoes.valor_avaliacao = :examValue ,
            avaliacoes.descricao_avaliacao = :examDescription 

            WHERE avaliacoes.id_avaliacao = :examId          
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':examDescription', $this->__get('examDescription'));
        $stmt->bindValue(':examValue', $this->__get('examValue'));
        $stmt->bindValue(':realizeDate', $this->__get('realizeDate'));
        $stmt->bindValue(':examId', $this->__get('examId'));

        $stmt->execute();
    }


    public function delete()
    {

        $query = "DELETE FROM avaliacoes WHERE avaliacoes.id_avaliacao = :examId";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':examId', $this->__get('examId'));

        $stmt->execute();
    }


    public function seek()
    {

        $query =

            "SELECT 
                
            avaliacoes.id_avaliacao AS exam_id, 
            avaliacoes.descricao_avaliacao AS exam_description , 
            disciplina.nome_disciplina AS discipline_name, 
            avaliacoes.data_realizada AS realize_date, 
            avaliacoes.valor_avaliacao AS exam_value, 
            unidade.unidade AS unity ,
            turma.id_turma AS class_id         
            
            FROM avaliacoes 
            
            INNER JOIN turma_disciplina ON(avaliacoes.fk_id_turma_disciplina_avaliacao = turma_disciplina.id_turma_disciplina) 
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina) 
            INNER JOIN unidade ON(avaliacoes.fk_id_unidade_avaliacao = unidade.id_unidade)

            WHERE avaliacoes.descricao_avaliacao LIKE :examDescription 

            AND

            CASE WHEN :fk_id_discipline_class = 0 THEN turma.id_turma = :fk_id_class ELSE avaliacoes.fk_id_turma_disciplina_avaliacao = :fk_id_discipline_class END

            AND

            CASE WHEN :fk_id_exam_unity = 0 THEN avaliacoes.fk_id_unidade_avaliacao <> :fk_id_exam_unity ELSE avaliacoes.fk_id_unidade_avaliacao = :fk_id_exam_unity END

            AND

            CASE WHEN :fk_id_teacher = 0 THEN turma_disciplina.fk_id_professor <> :fk_id_teacher ELSE turma_disciplina.fk_id_professor = :fk_id_teacher END
                 
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_exam_unity', $this->__get('fk_id_exam_unity'));
        $stmt->bindValue(':examDescription', "%" . $this->__get('examDescription') . "%", \PDO::PARAM_STR);
        $stmt->bindValue(':fk_id_class', $this->__get('fk_id_class'));
        $stmt->bindValue(':fk_id_discipline_class', $this->__get('fk_id_discipline_class'));
        $stmt->bindValue(':fk_id_teacher', $this->__get('fk_id_teacher'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function checkName()
    {

        $query =

            "SELECT 

            avaliacoes.descricao_avaliacao 
            
            FROM avaliacoes 
            
            LEFT JOIN turma_disciplina ON(avaliacoes.fk_id_turma_disciplina_avaliacao = turma_disciplina.id_turma_disciplina)
            
            WHERE turma_disciplina.id_turma_disciplina = :fk_id_discipline_class
            
            AND avaliacoes.fk_id_unidade_avaliacao = :fk_id_exam_unity
            
            AND avaliacoes.descricao_avaliacao = :exam_description

        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_exam_unity', $this->__get('fk_id_exam_unity'));
        $stmt->bindValue(':fk_id_discipline_class', $this->__get('fk_id_discipline_class'));
        $stmt->bindValue(':exam_description', $this->__get('examDescription'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function recents()
    {

        $query =

            "SELECT 

            avaliacoes.id_avaliacao AS exam_id,
            avaliacoes.descricao_avaliacao AS exam_description , 
            disciplina.nome_disciplina AS discipline_name,  
            avaliacoes.valor_avaliacao AS exam_value, 
            unidade.unidade AS unity       
            
            FROM avaliacoes 
            
            INNER JOIN turma_disciplina ON(avaliacoes.fk_id_turma_disciplina_avaliacao = turma_disciplina.id_turma_disciplina) 
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina) 
            INNER JOIN unidade ON(avaliacoes.fk_id_unidade_avaliacao = unidade.id_unidade)

            WHERE unidade.id_unidade = :fk_id_exam_unity

            AND

            turma_disciplina.id_turma_disciplina = :fk_id_discipline_class
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_exam_unity', $this->__get('fk_id_exam_unity'));
        $stmt->bindValue(':fk_id_discipline_class', $this->__get('fk_id_discipline_class'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}
