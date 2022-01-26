<?php

namespace App\Models\TeacherStudent;

use MF\Model\Model;

class DisciplineAverage extends Model
{

    private $disciplineAverageId;
    private $average;
    private $fk_id_subtitle;
    private $fk_id_discipline_class;
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
     * Inserir a média final do aluno em uma determinada disciplina
     * 
     * @return void
     */
    public function insert()
    {

        $query =

            "INSERT INTO media_disciplina
            
                (nota_valor, fk_id_turma_disciplina, fk_id_matricula_media, fk_id_legenda)

            VALUES

                (:average , :fk_id_discipline_class , :fk_id_enrollment , :fk_id_subtitle);              
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':average', $this->__get('average'));
        $stmt->bindValue(':fk_id_discipline_class', $this->__get('fk_id_discipline_class'));
        $stmt->bindValue(':fk_id_enrollment', $this->__get('fk_id_enrollment'));
        $stmt->bindValue(':fk_id_subtitle', $this->__get('fk_id_subtitle'));

        $stmt->execute();
    }


    /**
     * Atualizar dados da média final de uma disciplina do aluno
     * 
     * @return void
     */
    public function update()
    {

        $query =

            "UPDATE media_disciplina 
            
            SET fk_id_legenda = :fk_id_subtitle , nota_valor = :average 
            
            WHERE media_disciplina.id_media_disciplina = :disciplineAverageId
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_subtitle', $this->__get('fk_id_subtitle'));
        $stmt->bindValue(':average', $this->__get('average'));
        $stmt->bindValue(':disciplineAverageId', $this->__get('disciplineAverageId'));

        $stmt->execute();
    }


    /**
     * Retorna a soma de todas as notas do aluno , como também do total de faltas por unidade
     * 
     * @return array
     */
    public function disciplineFinalData()
    {

        $query =

            "SELECT 
            
            SUM(nota_avaliacao.valor_nota) AS note 
            
            FROM nota_avaliacao 
            
            LEFT JOIN avaliacoes ON(nota_avaliacao.fk_id_avaliacao = avaliacoes.id_avaliacao) 
            LEFT JOIN unidade ON(avaliacoes.fk_id_unidade_avaliacao = unidade.id_unidade) 
            LEFT JOIN turma_disciplina ON(avaliacoes.fk_id_turma_disciplina_avaliacao = turma_disciplina.id_turma_disciplina) 
            LEFT JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina) 
            LEFT JOIN matricula ON(nota_avaliacao.fk_id_matricula_aluno = matricula.id_matricula)  
            
            WHERE matricula.id_matricula = :fk_id_enrollment AND turma_disciplina.id_turma_disciplina = :fk_id_discipline_class

            UNION

            SELECT 
            
            SUM(falta_aluno.total_faltas) AS lack 
            
            FROM falta_aluno 
            
            LEFT JOIN turma_disciplina ON(falta_aluno.fk_id_turma_disciplina_falta = turma_disciplina.id_turma_disciplina) 
            LEFT JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina) 
            LEFT JOIN matricula ON(falta_aluno.fk_id_matricula_falta = matricula.id_matricula) 
            
            WHERE matricula.id_matricula = :fk_id_enrollment AND turma_disciplina.id_turma_disciplina = :fk_id_discipline_class
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_discipline_class', $this->__get('fk_id_discipline_class'));
        $stmt->bindValue(':fk_id_enrollment', $this->__get('fk_id_enrollment'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna as situações referente a uma média final. Entretanto, ele deve ser usado para peencher a tag select na View.
     * 
     * @return array
     */
    public function availableSubtitles()
    {

        return $this->speedingUp(
            "SELECT legenda.id_legenda AS option_value, legenda.legenda AS option_text FROM legenda"
        );
    }


    /**
     * Retorna todas as médias finais de um aluno
     * 
     * @return array
     */
    public function readByIdStudent()
    {

        $query =

            "SELECT 

            media_disciplina.id_media_disciplina AS discipline_avarage_id,
            disciplina.nome_disciplina AS discipline_name,
            media_disciplina.nota_valor AS average,
            legenda.legenda AS subtitle ,
            legenda.id_legenda AS subtitle_id ,
            turma_disciplina.id_turma_disciplina AS discipline_class ,
            matricula.id_matricula AS enrollment_id ,
            media_disciplina.data_postagem AS post_date ,
            professor.nome_professor AS teacher_name ,
            professor.foto_perfil_professor AS teacher_profile_photo ,
            aluno.foto_perfil_aluno AS student_profile_photo ,
            aluno.nome_aluno AS student_name

            FROM media_disciplina

            LEFT JOIN turma_disciplina ON(media_disciplina.fk_id_turma_disciplina = turma_disciplina.id_turma_disciplina)
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            LEFT JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)
            LEFT JOIN legenda ON(media_disciplina.fk_id_legenda = legenda.id_legenda)
            LEFT JOIN matricula ON(media_disciplina.fk_id_matricula_media = matricula.id_matricula)
            LEFT JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor)
            INNER JOIN aluno ON(matricula.fk_id_aluno = aluno.id_aluno)
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo)
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)  
        
            WHERE matricula.id_matricula = :fk_id_enrollment 

            AND

            situacao_periodo_letivo.id_situacao_periodo_letivo <> 0 

        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':fk_id_enrollment', $this->__get('fk_id_enrollment'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna todas as médias finais de um aluno com base no id do docente
     * 
     * @return array
     */
    public function readByIdTeacher($teacher)
    {

        $query =

            "SELECT 

            media_disciplina.id_media_disciplina AS discipline_avarage_id,
            disciplina.nome_disciplina AS discipline_name,
            media_disciplina.nota_valor AS average,
            legenda.legenda AS subtitle ,
            legenda.id_legenda AS subtitle_id ,
            turma_disciplina.id_turma_disciplina AS discipline_class ,
            matricula.id_matricula AS enrollment_id ,
            media_disciplina.data_postagem AS post_date ,
            professor.nome_professor AS teacher_name ,
            professor.foto_perfil_professor AS teacher_profile_photo ,
            aluno.foto_perfil_aluno AS student_profile_photo ,
            aluno.nome_aluno AS student_name

            FROM media_disciplina

            LEFT JOIN turma_disciplina ON(media_disciplina.fk_id_turma_disciplina = turma_disciplina.id_turma_disciplina)
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            LEFT JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)
            LEFT JOIN legenda ON(media_disciplina.fk_id_legenda = legenda.id_legenda)
            LEFT JOIN matricula ON(media_disciplina.fk_id_matricula_media = matricula.id_matricula)
            LEFT JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor)
            INNER JOIN aluno ON(matricula.fk_id_aluno = aluno.id_aluno)
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo)
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)  
        
            WHERE matricula.id_matricula = :fk_id_enrollment 

            AND turma_disciplina.fk_id_professor = :fk_id_teacher 

            AND

            situacao_periodo_letivo.id_situacao_periodo_letivo <> 0 
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_enrollment', $this->__get('fk_id_enrollment'));
        $stmt->bindValue(':fk_id_teacher', $teacher->__get('teacherId'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna todas as médias finais de todos os alunos
     * 
     * @return array
     */
    public function readAll()
    {

        return $this->speedingUp(

            "SELECT 

            media_disciplina.id_media_disciplina AS discipline_avarage_id,
            disciplina.nome_disciplina AS discipline_name,
            media_disciplina.nota_valor AS average,
            legenda.legenda AS subtitle ,
            legenda.id_legenda AS subtitle_id ,
            turma_disciplina.id_turma_disciplina AS discipline_class ,
            matricula.id_matricula AS enrollment_id ,
            media_disciplina.data_postagem AS post_date ,
            professor.nome_professor AS teacher_name ,
            professor.foto_perfil_professor AS teacher_profile_photo ,
            aluno.foto_perfil_aluno AS student_profile_photo ,
            aluno.nome_aluno AS student_name

            FROM media_disciplina

            LEFT JOIN turma_disciplina ON(media_disciplina.fk_id_turma_disciplina = turma_disciplina.id_turma_disciplina)
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            LEFT JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)
            LEFT JOIN legenda ON(media_disciplina.fk_id_legenda = legenda.id_legenda)
            LEFT JOIN matricula ON(media_disciplina.fk_id_matricula_media = matricula.id_matricula)
            LEFT JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor)
            INNER JOIN aluno ON(matricula.fk_id_aluno = aluno.id_aluno)
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo)
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)  
        
            WHERE situacao_periodo_letivo.id_situacao_periodo_letivo = 1"
            
        );
    }


    /**
     * Verifica se a média final de uma determinada disciplina, já foi adicionada.
     * 
     * @return array
     */
    public function disciplineMediaAlreadyAdded()
    {

        $query =

            "SELECT 
            
            id_media_disciplina AS id 
            
            FROM media_disciplina 
            
            WHERE fk_id_matricula_media = :fk_id_enrollment AND fk_id_turma_disciplina = :fk_id_discipline_class;
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_discipline_class', $this->__get('fk_id_discipline_class'));
        $stmt->bindValue(':fk_id_enrollment', $this->__get('fk_id_enrollment'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}
