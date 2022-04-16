<?php

namespace App\Models\TeacherStudent;

use MF\Model\Model;

class Note extends Model
{

    private $noteId;
    private $noteValue;
    private $fk_id_exam;
    private $fk_id_student_enrollment;
    private $fk_id_class;
    private $fk_id_discipline_class;


    public function __get($att)
    {
        return $this->$att;
    }


    public function __set($att, $newValue)
    {
        return $this->$att = $newValue;
    }


    /**
     * Inserir nota da avaliação 
     * 
     * @return void
     */
    public function insert()
    {

        $query =

            "INSERT INTO nota_avaliacao 
            
                (valor_nota , fk_id_avaliacao , fk_id_matricula_aluno) 
            
            VALUES 
            
                (:noteValue , :fk_id_exam , :fk_id_student_enrollment)
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':noteValue', $this->__get('noteValue'));
        $stmt->bindValue(':fk_id_exam', $this->__get('fk_id_exam'));
        $stmt->bindValue(':fk_id_student_enrollment', $this->__get('fk_id_student_enrollment'));

        $stmt->execute();
    }


    /**
     * Retorna as notas das avaliações vinculadas a um aluno
     * 
     * @return array
     */
    public function readByIdStudent()
    {

        $query =

            "SELECT 

            avaliacoes.descricao_avaliacao AS exam_description , 
            disciplina.nome_disciplina AS discipline_name , 
            disciplina.id_disciplina AS discipline_id, 
            avaliacoes.valor_avaliacao AS exam_value , 
            nota_avaliacao.valor_nota AS note_value ,
            unidade.unidade AS unity ,
            unidade.id_unidade AS unity_id ,
            nota_avaliacao.id_nota AS note_id ,
            avaliacoes.id_avaliacao AS exam_id ,
            avaliacoes.data_realizada AS realize_date ,
            matricula.id_matricula AS enrollment_id ,
            aluno.id_aluno AS student_id ,
            nota_avaliacao.data_postagem AS post_date ,
            turma_disciplina.id_turma_disciplina AS class_discipline_id ,
            professor.nome_professor AS teacher_name ,
            professor.foto_perfil_professor AS teacher_profile_photo 
      
            FROM avaliacoes
            
            INNER JOIN turma_disciplina ON(avaliacoes.fk_id_turma_disciplina_avaliacao = turma_disciplina.id_turma_disciplina)
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)
            INNER JOIN nota_avaliacao ON(avaliacoes.id_avaliacao = nota_avaliacao.fk_id_avaliacao)
            INNER JOIN matricula ON(nota_avaliacao.fk_id_matricula_aluno = matricula.id_matricula)
            INNER JOIN unidade ON(avaliacoes.fk_id_unidade_avaliacao = unidade.id_unidade)
            INNER JOIN aluno ON(matricula.fk_id_aluno = aluno.id_aluno)
            INNER JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor)
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo)
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)  
            
            WHERE matricula.id_matricula = :fk_id_student_enrollment 

            ORDER BY avaliacoes.descricao_avaliacao ASC
            
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':fk_id_student_enrollment', $this->__get('fk_id_student_enrollment'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna os dados gerais de uma nota da avaliação
     * 
     * @return array
     */
    public function dataGeneral()
    {

        $query =

            "SELECT 
            
            avaliacoes.descricao_avaliacao AS exam_description , 
            disciplina.nome_disciplina AS discipline_name , 
            disciplina.id_disciplina AS discipline_id, 
            avaliacoes.valor_avaliacao AS exam_value , 
            nota_avaliacao.valor_nota AS note_value ,
            unidade.unidade AS unity ,
            unidade.id_unidade AS unity_id ,
            nota_avaliacao.id_nota AS note_id ,
            avaliacoes.id_avaliacao AS exam_id ,
            avaliacoes.data_realizada AS realize_date ,
            professor.nome_professor AS teacher_name ,
            professor.foto_perfil_professor AS teacher_profile_photo , 
            matricula.id_matricula AS enrollment_id ,
            aluno.nome_aluno AS student_name ,
            aluno.foto_perfil_aluno AS student_profile_photo  ,
            aluno.id_aluno AS student_id ,
            nota_avaliacao.data_postagem AS post_date ,
            turma_disciplina.id_turma_disciplina AS class_discipline_id
      
            FROM avaliacoes
            
            INNER JOIN turma_disciplina ON(avaliacoes.fk_id_turma_disciplina_avaliacao = turma_disciplina.id_turma_disciplina)
            INNER JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor)
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)
            INNER JOIN nota_avaliacao ON(avaliacoes.id_avaliacao = nota_avaliacao.fk_id_avaliacao)
            INNER JOIN matricula ON(nota_avaliacao.fk_id_matricula_aluno = matricula.id_matricula)
            INNER JOIN unidade ON(avaliacoes.fk_id_unidade_avaliacao = unidade.id_unidade)
            INNER JOIN aluno ON(matricula.fk_id_aluno = aluno.id_aluno)
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo)
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)  
            
            WHERE nota_avaliacao.id_nota = :noteId

            ORDER BY nota_avaliacao.valor_nota DESC
            
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':noteId', $this->__get('noteId'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna as notas das avaliações 
     * 
     * @return array
     */
    public function readAll()
    {

        return $this->speedingUp(

            "SELECT 

            avaliacoes.descricao_avaliacao AS exam_description , 
            disciplina.nome_disciplina AS discipline_name , 
            disciplina.id_disciplina AS discipline_id, 
            avaliacoes.valor_avaliacao AS exam_value , 
            nota_avaliacao.valor_nota AS note_value ,
            unidade.unidade AS unity ,
            unidade.id_unidade AS unity_id ,
            nota_avaliacao.id_nota AS note_id ,
            avaliacoes.id_avaliacao AS exam_id ,
            avaliacoes.data_realizada AS realize_date ,
            professor.nome_professor AS teacher_name ,
            professor.foto_perfil_professor AS teacher_profile_photo , 
            matricula.id_matricula AS enrollment_id ,
            aluno.nome_aluno AS student_name ,
            aluno.foto_perfil_aluno AS student_profile_photo  ,
            aluno.id_aluno AS student_id ,
            nota_avaliacao.data_postagem AS post_date ,
            turma_disciplina.id_turma_disciplina AS class_discipline_id
      
            FROM avaliacoes
            
            INNER JOIN turma_disciplina ON(avaliacoes.fk_id_turma_disciplina_avaliacao = turma_disciplina.id_turma_disciplina)
            INNER JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor)
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)
            INNER JOIN nota_avaliacao ON(avaliacoes.id_avaliacao = nota_avaliacao.fk_id_avaliacao)
            INNER JOIN matricula ON(nota_avaliacao.fk_id_matricula_aluno = matricula.id_matricula)
            INNER JOIN unidade ON(avaliacoes.fk_id_unidade_avaliacao = unidade.id_unidade)
            INNER JOIN aluno ON(matricula.fk_id_aluno = aluno.id_aluno)
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo)
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)  
            
            WHERE
           
           situacao_periodo_letivo.id_situacao_periodo_letivo = 1 

            ORDER BY nota_avaliacao.valor_nota DESC"

        );
    }


    /**
     * Buscar nota de avaliação
     * 
     * @param object $classe
     * @param object $teacher
     * @param string $orderBy
     * 
     * @return array
     */
    public function seek($classe, $teacher, $orderBy = 'ASC')
    {

        $query =

            "SELECT 

            avaliacoes.descricao_avaliacao AS exam_description , 
            disciplina.nome_disciplina AS discipline_name , 
            disciplina.id_disciplina AS discipline_id, 
            avaliacoes.valor_avaliacao AS exam_value , 
            nota_avaliacao.valor_nota AS note_value ,
            unidade.unidade AS unity ,
            unidade.id_unidade AS unity_id ,
            nota_avaliacao.id_nota AS note_id ,
            avaliacoes.id_avaliacao AS exam_id ,
            avaliacoes.data_realizada AS realize_date ,
            professor.nome_professor AS teacher_name ,
            professor.foto_perfil_professor AS teacher_profile_photo , 
            matricula.id_matricula AS enrollment_id ,
            aluno.nome_aluno AS student_name ,
            aluno.foto_perfil_aluno AS student_profile_photo  ,
            aluno.id_aluno AS student_id ,
            nota_avaliacao.data_postagem AS post_date ,
            turma_disciplina.id_turma_disciplina AS class_discipline_id
      
            FROM avaliacoes
            
            INNER JOIN turma_disciplina ON(avaliacoes.fk_id_turma_disciplina_avaliacao = turma_disciplina.id_turma_disciplina)
            INNER JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor)
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)
            INNER JOIN nota_avaliacao ON(avaliacoes.id_avaliacao = nota_avaliacao.fk_id_avaliacao)
            INNER JOIN matricula ON(nota_avaliacao.fk_id_matricula_aluno = matricula.id_matricula)
            INNER JOIN unidade ON(avaliacoes.fk_id_unidade_avaliacao = unidade.id_unidade)
            INNER JOIN aluno ON(matricula.fk_id_aluno = aluno.id_aluno)
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo)
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)  

            WHERE avaliacoes.descricao_avaliacao LIKE :examDescription 

            AND

            CASE WHEN :fk_id_exam_unity = 0 THEN avaliacoes.fk_id_unidade_avaliacao <> :fk_id_exam_unity ELSE avaliacoes.fk_id_unidade_avaliacao = :fk_id_exam_unity END

            AND 
            
            CASE WHEN :fk_id_student_enrollment = 0 THEN matricula.id_matricula <> :fk_id_student_enrollment ELSE matricula.id_matricula = :fk_id_student_enrollment END 

            AND

            CASE WHEN :fk_id_discipline_class = 0 THEN turma.id_turma = :fk_id_class ELSE avaliacoes.fk_id_turma_disciplina_avaliacao = :fk_id_discipline_class END

            AND

            CASE WHEN :fk_id_teacher = 0 THEN turma_disciplina.fk_id_professor <> 0 ELSE turma_disciplina.fk_id_professor = :fk_id_teacher END

            ORDER BY nota_avaliacao.valor_nota $orderBy
             
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':examDescription', "%" . $this->__get('examDescription') . "%", \PDO::PARAM_STR);
        $stmt->bindValue(':fk_id_exam_unity', $this->__get('fk_id_exam_unity'));
        $stmt->bindValue(':fk_id_student_enrollment', $this->__get('fk_id_student_enrollment'));
        $stmt->bindValue(':fk_id_class', $classe->__get('classId'));
        $stmt->bindValue(':fk_id_discipline_class', $this->__get('fk_id_discipline_class'));
        $stmt->bindValue(':fk_id_teacher', $teacher->__get('teacherId'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Atualizar nota de uma avaliação do aluno
     * 
     * @return void
     */
    public function update()
    {

        $query = "UPDATE nota_avaliacao SET nota_avaliacao.valor_nota = :note_value WHERE nota_avaliacao.id_nota = :note_id ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':note_value', $this->__get('noteValue'));
        $stmt->bindValue(':note_id', $this->__get('noteId'));

        $stmt->execute();
    }

    /**
     * Deletar nota de avaliação do aluno
     * 
     * @return void
     */
    public function delete()
    {

        $query = "DELETE FROM nota_avaliacao WHERE nota_avaliacao.id_nota = :note_id ";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':note_id', $this->__get('noteId'));
        $stmt->execute();
    }


    /**
     * Retorna as avaliações que ainda não foram vinculadas ao aluno
     * 
     * @return array
     */
    public function notesNotAddedYet($teacher)
    {

        # Inicialmente em $allExamsClass, será armazenado todos os exames que foram criados na turma do aluno.

        $allExamsClass =

            "SELECT 

            avaliacoes.id_avaliacao AS exam_id, 
            avaliacoes.descricao_avaliacao AS exam_description,
            disciplina.nome_disciplina AS discipline_name, 
            avaliacoes.data_realizada AS realize_date, 
            avaliacoes.valor_avaliacao AS exam_value, 
            unidade.unidade AS unity 

            FROM avaliacoes

            LEFT JOIN turma_disciplina ON(avaliacoes.fk_id_turma_disciplina_avaliacao = turma_disciplina.id_turma_disciplina) 
            LEFT JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina) 
            LEFT JOIN unidade ON(avaliacoes.fk_id_unidade_avaliacao = unidade.id_unidade)
            
            WHERE turma_disciplina.fk_id_turma = :fk_id_class

            AND

            CASE WHEN :fk_id_teacher = 0 THEN turma_disciplina.fk_id_professor <> :fk_id_teacher ELSE turma_disciplina.fk_id_professor = :fk_id_teacher END
            
        ";

        $stmt = $this->db->prepare($allExamsClass);
        $stmt->bindValue(':fk_id_class', $this->__get('fk_id_class'));
        $stmt->bindValue(':fk_id_teacher', $teacher->__get('teacherId'));

        $stmt->execute();

        $allExamsClass = $stmt->fetchAll(\PDO::FETCH_OBJ);

        # Em seguida, em $allStudentExams será armazenado todas as avaliações que já foram vinculadas ao aluno.

        $allStudentExams =

            "SELECT 

            avaliacoes.id_avaliacao AS exam_id

            FROM avaliacoes
			
            LEFT JOIN nota_avaliacao ON(avaliacoes.id_avaliacao = nota_avaliacao.fk_id_avaliacao)
            LEFT JOIN matricula ON(nota_avaliacao.fk_id_matricula_aluno = matricula.id_matricula) 
            LEFT JOIN turma_disciplina ON(avaliacoes.fk_id_turma_disciplina_avaliacao = turma_disciplina.id_turma_disciplina)

            WHERE nota_avaliacao.fk_id_matricula_aluno = :fk_id_student_enrollment

            AND

            CASE WHEN :fk_id_teacher = 0 THEN turma_disciplina.fk_id_professor <> :fk_id_teacher ELSE turma_disciplina.fk_id_professor = :fk_id_teacher END

        ";

        $stmt = $this->db->prepare($allStudentExams);
        $stmt->bindValue(':fk_id_student_enrollment', $this->__get('fk_id_student_enrollment'));
        $stmt->bindValue(':fk_id_teacher', $teacher->__get('teacherId'));
        $stmt->execute();

        $allStudentExams = $stmt->fetchAll(\PDO::FETCH_OBJ);

        $allExamId = [];
        $availableNote = [];

        foreach ($allStudentExams as $key => $exam) {
            array_push($allExamId, $exam->exam_id); # Armazenando somente os ids das avaliações já vinculadas ao aluno
        }

        foreach ($allExamsClass as $key => $exam) {

            /** Caso o id da avaliação cadastrada na turma seja diferente do id da avaliação vinculada ao aluno, significa que a mesma ainda
             * não vinculada ao aluno. Desse modo, caso essa condição seja sastifeita vamos guardar em $availableNote os dados necessários.
             */

            if (!in_array($exam->exam_id, $allExamId)) {

                switch ($exam->exam_value) {
                    case $exam->exam_value > 1:
                        $pointsOrTenths = " pontos";
                        break;
                    case $exam->exam_value < 1:
                        $pointsOrTenths = " décimos";
                        break;
                    case $exam->exam_value == 1:
                        $pointsOrTenths = " ponto";
                        break;
                }

                $description = $exam->discipline_name . ' - ' . $exam->exam_description . ' - ' . $exam->unity . ' unidade - ' . $exam->exam_value . $pointsOrTenths;

                array_push($availableNote, array("option_value" => $exam->exam_id, "option_text" => $description));
            }
        }

        return $availableNote;
    }


    /**
     * Retorna as notas das avaliações vinculadas a um aluno
     * 
     * @return array
     */
    public function readNoteByIdTeacher($teacher)
    {

        $query =

            "SELECT 
            avaliacoes.descricao_avaliacao AS exam_description , 
            disciplina.nome_disciplina AS discipline_name , 
            disciplina.id_disciplina AS discipline_id, 
            avaliacoes.valor_avaliacao AS exam_value , 
            nota_avaliacao.valor_nota AS note_value ,
            unidade.unidade AS unity ,
            unidade.id_unidade AS unity_id ,
            nota_avaliacao.id_nota AS note_id ,
            avaliacoes.id_avaliacao AS exam_id ,
            avaliacoes.data_realizada AS realize_date ,
            professor.nome_professor AS teacher_name ,
            professor.foto_perfil_professor AS teacher_profile_photo , 
            matricula.id_matricula AS enrollment_id ,
            aluno.nome_aluno AS student_name ,
            aluno.foto_perfil_aluno AS student_profile_photo  ,
            aluno.id_aluno AS student_id ,
            nota_avaliacao.data_postagem AS post_date ,
            turma_disciplina.id_turma_disciplina AS class_discipline_id
      
            FROM avaliacoes
            
            INNER JOIN turma_disciplina ON(avaliacoes.fk_id_turma_disciplina_avaliacao = turma_disciplina.id_turma_disciplina)
            INNER JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor)
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)
            INNER JOIN nota_avaliacao ON(avaliacoes.id_avaliacao = nota_avaliacao.fk_id_avaliacao)
            INNER JOIN matricula ON(nota_avaliacao.fk_id_matricula_aluno = matricula.id_matricula)
            INNER JOIN unidade ON(avaliacoes.fk_id_unidade_avaliacao = unidade.id_unidade)
            INNER JOIN aluno ON(matricula.fk_id_aluno = aluno.id_aluno)
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo)
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)  
            
            WHERE turma_disciplina.fk_id_professor = :fk_id_teacher 

            AND matricula.id_matricula = :fk_id_student_enrollment 

            ORDER BY nota_avaliacao.valor_nota DESC
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_student_enrollment', $this->__get('fk_id_student_enrollment'));
        $stmt->bindValue(':fk_id_teacher', $teacher->__get('teacherId'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna as notas das avaliações vinculadas a uma turma
     * 
     * @return array
     */
    public function readNoteByClassId($classe)
    {

        $query =

            "SELECT 
            avaliacoes.descricao_avaliacao AS exam_description , 
            disciplina.nome_disciplina AS discipline_name , 
            disciplina.id_disciplina AS discipline_id, 
            avaliacoes.valor_avaliacao AS exam_value , 
            nota_avaliacao.valor_nota AS note_value ,
            unidade.unidade AS unity ,
            unidade.id_unidade AS unity_id ,
            nota_avaliacao.id_nota AS note_id ,
            avaliacoes.id_avaliacao AS exam_id ,
            avaliacoes.data_realizada AS realize_date ,
            professor.nome_professor AS teacher_name ,
            professor.foto_perfil_professor AS teacher_profile_photo , 
            matricula.id_matricula AS enrollment_id ,
            aluno.nome_aluno AS student_name ,
            aluno.foto_perfil_aluno AS student_profile_photo  ,
            aluno.id_aluno AS student_id ,
            nota_avaliacao.data_postagem AS post_date ,
            turma_disciplina.id_turma_disciplina AS class_discipline_id
      
            FROM avaliacoes
            
            INNER JOIN turma_disciplina ON(avaliacoes.fk_id_turma_disciplina_avaliacao = turma_disciplina.id_turma_disciplina)
            INNER JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor)
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)
            INNER JOIN nota_avaliacao ON(avaliacoes.id_avaliacao = nota_avaliacao.fk_id_avaliacao)
            INNER JOIN matricula ON(nota_avaliacao.fk_id_matricula_aluno = matricula.id_matricula)
            INNER JOIN unidade ON(avaliacoes.fk_id_unidade_avaliacao = unidade.id_unidade)
            INNER JOIN aluno ON(matricula.fk_id_aluno = aluno.id_aluno)
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo)
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)  
            
            WHERE turma_disciplina.fk_id_turma = :classId 

            ORDER BY nota_avaliacao.valor_nota DESC
            
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':classId', $classe->__get('classId'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}
