<?php

namespace App\Models\TeacherStudent;

use MF\Model\Model;

class Exam extends Model
{

    private $examId;
    private $examDescription;
    private $examValue;
    private $realizeDate;
    private $fk_id_exam_unity;
    private $fk_id_discipline_class;
    private $fk_id_class;
    private $fk_id_teacher;

    public function __get($att)
    {
        return $this->$att;
    }

    public function __set($att, $newValue)
    {
        $this->$att = $newValue;
    }


    /**
     * Criar avaliação
     * 
     * @return void
     */
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


    /**
     * Retorna o total de pontos já atribuidos em uma unidade de uma disciplina
     * 
     * @return array
     */
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


    /**
     * Retorna os dados gerais de uma avaliação
     * 
     * @return array
     */
    public function dataGeneral()
    {

        $query =

            "SELECT 
            
            avaliacoes.id_avaliacao AS exam_id, 
            avaliacoes.descricao_avaliacao AS exam_description , 
            disciplina.nome_disciplina AS discipline_name, 
            avaliacoes.data_postagem AS post_date, 
            avaliacoes.data_realizada AS realize_date, 
            avaliacoes.valor_avaliacao AS exam_value, 
            unidade.unidade AS unity,
            avaliacoes.fk_id_unidade_avaliacao AS fk_id_exam_unity,
            turma_disciplina.id_turma_disciplina AS fk_id_discipline_class ,
            professor.nome_professor AS teacher_name ,
            turma.id_turma AS class_id ,
            serie.sigla AS acronym_series , 
            cedula_turma.cedula AS ballot , 
            curso.sigla AS course , 
            turno.nome_turno AS shift ,
            professor.foto_perfil_professor AS profile_photo
            
            FROM avaliacoes 
            
            INNER JOIN turma_disciplina ON(avaliacoes.fk_id_turma_disciplina_avaliacao = turma_disciplina.id_turma_disciplina) 
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            INNER JOIN serie ON(turma.fk_id_serie = serie.id_serie) 
            INNER JOIN curso ON(turma.fk_id_curso = curso.id_curso) 
            INNER JOIN cedula_turma ON(turma.fk_id_cedula = cedula_turma.id_cedula_turma) 
            INNER JOIN turno ON(turma.fk_id_turno = turno.id_turno) 
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina) 
            INNER JOIN unidade ON(avaliacoes.fk_id_unidade_avaliacao = unidade.id_unidade) 
            INNER JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor) 
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo)     
            
            WHERE avaliacoes.id_avaliacao = :examId 

            ORDER BY avaliacoes.id_avaliacao ASC
            
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':examId', $this->__get('examId'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Atualizar os dados de uma avaliação
     * 
     * @return void
     */
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


    /**
     * Deletar avaliação
     * 
     * @return void
     */
    public function delete()
    {

        $query = "DELETE FROM avaliacoes WHERE avaliacoes.id_avaliacao = :examId";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':examId', $this->__get('examId'));
        $stmt->execute();
    }

    /**
     * Buscar avaliação
     * 
     * @return array
     */
    public function seek($classe, $teacher)
    {

        $query =

            "SELECT 
                
            avaliacoes.id_avaliacao AS exam_id, 
            avaliacoes.descricao_avaliacao AS exam_description , 
            disciplina.nome_disciplina AS discipline_name, 
            avaliacoes.data_postagem AS post_date, 
            avaliacoes.data_realizada AS realize_date, 
            avaliacoes.valor_avaliacao AS exam_value, 
            unidade.unidade AS unity,
            avaliacoes.fk_id_unidade_avaliacao AS fk_id_exam_unity,
            turma_disciplina.id_turma_disciplina AS fk_id_discipline_class ,
            professor.nome_professor AS teacher_name ,
            turma.id_turma AS class_id ,
            serie.sigla AS acronym_series , 
            cedula_turma.cedula AS ballot , 
            curso.sigla AS course , 
            turno.nome_turno AS shift ,
            professor.foto_perfil_professor AS profile_photo       
            
            FROM avaliacoes 
            
            INNER JOIN turma_disciplina ON(avaliacoes.fk_id_turma_disciplina_avaliacao = turma_disciplina.id_turma_disciplina) 
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            INNER JOIN serie ON(turma.fk_id_serie = serie.id_serie) 
            INNER JOIN curso ON(turma.fk_id_curso = curso.id_curso) 
            INNER JOIN cedula_turma ON(turma.fk_id_cedula = cedula_turma.id_cedula_turma) 
            INNER JOIN turno ON(turma.fk_id_turno = turno.id_turno) 
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina) 
            INNER JOIN unidade ON(avaliacoes.fk_id_unidade_avaliacao = unidade.id_unidade) 
            INNER JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor) 
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo)
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo) 

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
        $stmt->bindValue(':fk_id_class', $classe->__get('classId'));
        $stmt->bindValue(':fk_id_discipline_class', $this->__get('fk_id_discipline_class'));
        $stmt->bindValue(':fk_id_teacher', $teacher->__get('teacherId'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Verifica se já foi adicionada alguma avaliação com o mesmo nome em uma unidade da disciplina
     * 
     * @return array
     */
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


    /**
     * Retorna as avaliações já adicionadas em uma determinada unidade da disciplina
     * 
     * @return array
     */
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


    /**
     * Retorna todas as avaliações que foram adicionadas no período letivo
     * 
     * @return array
     */
    public function readAll()
    {

        return $this->speedingUp(

            "SELECT 
            
            avaliacoes.id_avaliacao AS exam_id, 
            avaliacoes.descricao_avaliacao AS exam_description , 
            disciplina.nome_disciplina AS discipline_name, 
            avaliacoes.data_postagem AS post_date, 
            avaliacoes.data_realizada AS realize_date, 
            avaliacoes.valor_avaliacao AS exam_value, 
            unidade.unidade AS unity,
            avaliacoes.fk_id_unidade_avaliacao AS fk_id_exam_unity,
            turma_disciplina.id_turma_disciplina AS fk_id_discipline_class ,
            professor.nome_professor AS teacher_name ,
            turma.id_turma AS class_id ,
            serie.sigla AS acronym_series , 
            cedula_turma.cedula AS ballot , 
            curso.sigla AS course , 
            turno.nome_turno AS shift ,
            professor.foto_perfil_professor AS profile_photo
            
            FROM avaliacoes 
            
            INNER JOIN turma_disciplina ON(avaliacoes.fk_id_turma_disciplina_avaliacao = turma_disciplina.id_turma_disciplina) 
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            INNER JOIN serie ON(turma.fk_id_serie = serie.id_serie) 
            INNER JOIN curso ON(turma.fk_id_curso = curso.id_curso) 
            INNER JOIN cedula_turma ON(turma.fk_id_cedula = cedula_turma.id_cedula_turma) 
            INNER JOIN turno ON(turma.fk_id_turno = turno.id_turno) 
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina) 
            INNER JOIN unidade ON(avaliacoes.fk_id_unidade_avaliacao = unidade.id_unidade) 
            INNER JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor) 
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo)
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)      
            
            WHERE 
         
            situacao_periodo_letivo.id_situacao_periodo_letivo = 1 

            ORDER BY avaliacoes.id_avaliacao ASC"

        );
    }


    /**
     * Retorna as avaliações vínculadas a uma turma
     * 
     * @return array
     */
    public function readExamByIdClass($classe)
    {

        $query =

            "SELECT 
            
            avaliacoes.id_avaliacao AS exam_id, 
            avaliacoes.descricao_avaliacao AS exam_description , 
            disciplina.nome_disciplina AS discipline_name, 
            avaliacoes.data_postagem AS post_date, 
            avaliacoes.data_realizada AS realize_date, 
            avaliacoes.valor_avaliacao AS exam_value, 
            unidade.unidade AS unity,
            avaliacoes.fk_id_unidade_avaliacao AS fk_id_exam_unity,
            turma_disciplina.id_turma_disciplina AS fk_id_discipline_class ,
            professor.nome_professor AS teacher_name ,
            turma.id_turma AS class_id ,
            serie.sigla AS acronym_series , 
            cedula_turma.cedula AS ballot , 
            curso.sigla AS course , 
            turno.nome_turno AS shift ,
            professor.foto_perfil_professor AS profile_photo
            
            FROM avaliacoes 
            
            INNER JOIN turma_disciplina ON(avaliacoes.fk_id_turma_disciplina_avaliacao = turma_disciplina.id_turma_disciplina) 
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            INNER JOIN serie ON(turma.fk_id_serie = serie.id_serie) 
            INNER JOIN curso ON(turma.fk_id_curso = curso.id_curso) 
            INNER JOIN cedula_turma ON(turma.fk_id_cedula = cedula_turma.id_cedula_turma) 
            INNER JOIN turno ON(turma.fk_id_turno = turno.id_turno) 
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina) 
            INNER JOIN unidade ON(avaliacoes.fk_id_unidade_avaliacao = unidade.id_unidade) 
            INNER JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor) 
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo)
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)      
            
            WHERE turma.id_turma = :classId 

            ORDER BY avaliacoes.id_avaliacao ASC
            
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':classId', $classe->__get('classId'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna as avaliações vínculadas a um professor
     * 
     * @return array
     */
    public function readExamByIdTeacher($teacher)
    {


        $query =

            "SELECT 
            
            avaliacoes.id_avaliacao AS exam_id, 
            avaliacoes.descricao_avaliacao AS exam_description , 
            disciplina.nome_disciplina AS discipline_name, 
            avaliacoes.data_postagem AS post_date, 
            avaliacoes.data_realizada AS realize_date, 
            avaliacoes.valor_avaliacao AS exam_value, 
            unidade.unidade AS unity,
            avaliacoes.fk_id_unidade_avaliacao AS fk_id_exam_unity,
            turma_disciplina.id_turma_disciplina AS fk_id_discipline_class ,
            professor.nome_professor AS teacher_name ,
            turma.id_turma AS class_id ,
            serie.sigla AS acronym_series , 
            cedula_turma.cedula AS ballot , 
            curso.sigla AS course , 
            turno.nome_turno AS shift ,
            professor.foto_perfil_professor AS profile_photo
            
            FROM avaliacoes 
            
            INNER JOIN turma_disciplina ON(avaliacoes.fk_id_turma_disciplina_avaliacao = turma_disciplina.id_turma_disciplina) 
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            INNER JOIN serie ON(turma.fk_id_serie = serie.id_serie) 
            INNER JOIN curso ON(turma.fk_id_curso = curso.id_curso) 
            INNER JOIN cedula_turma ON(turma.fk_id_cedula = cedula_turma.id_cedula_turma) 
            INNER JOIN turno ON(turma.fk_id_turno = turno.id_turno) 
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina) 
            INNER JOIN unidade ON(avaliacoes.fk_id_unidade_avaliacao = unidade.id_unidade) 
            INNER JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor) 
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo)
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)      
            
            WHERE professor.id_professor = :teacherId AND situacao_periodo_letivo.id_situacao_periodo_letivo = 1 

            ORDER BY avaliacoes.id_avaliacao ASC
            
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':teacherId', $teacher->__get('teacherId'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}
