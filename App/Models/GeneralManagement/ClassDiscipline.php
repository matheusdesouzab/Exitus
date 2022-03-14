<?php

namespace App\Models\GeneralManagement;

use MF\Model\Model;

class ClassDiscipline extends Model
{

    private $classDisciplineId;
    private $fk_id_teacher;
    private $fk_id_discipline;
    private $fk_id_class;


    public function __get($att)
    {
        return $this->$att;
    }


    public function __set($att, $newValue)
    {
        return $this->$att = $newValue;
    }


    /**
     * Vincula disciplina a professor em uma turma
     * 
     * @return void
     */
    public function insert()
    {

        $query =

            "INSERT INTO turma_disciplina

                (fk_id_professor, fk_id_disciplina, fk_id_turma) 

            VALUES 

                (:fk_id_teacher, :fk_id_discipline, :fk_id_class)
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_teacher', $this->__get('fk_id_teacher'));
        $stmt->bindValue(':fk_id_discipline', $this->__get('fk_id_discipline'));
        $stmt->bindValue(':fk_id_class', $this->__get('fk_id_class'));

        $stmt->execute();
    }


    /**
     * Retorna o professor, e sua respectiva disciplina que é ministrada na turma selecionada.
     * 
     * @return array
     */
    public function listTeachersClass()
    {

        $query =

            "SELECT 

            professor.id_professor AS id , 
            professor.nome_professor AS name , 
            professor.foto_perfil_professor AS profile_photo , 
            disciplina.nome_disciplina AS discipline_name , 
            disciplina.id_disciplina AS discipline_id , 
            turma_disciplina.fk_id_turma as class_id , 
            turma_disciplina.id_turma_disciplina AS discipline_class_id ,
            email_professor AS email 

            FROM professor 

            INNER JOIN sexo ON(sexo.id_sexo = professor.fk_id_sexo_professor) 
            INNER JOIN turma_disciplina ON(professor.id_professor = turma_disciplina.fk_id_professor) 
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)

            WHERE disciplina.nome_disciplina IS NOT NULL 
            
            AND turma_disciplina.fk_id_turma = :fk_id_class

            ORDER BY disciplina.nome_disciplina ASC
        
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':fk_id_class', $this->__get('fk_id_class'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Atualiza dados da disciplina de uma turma
     * 
     * @return void
     */
    public function update()
    {

        $query =

            "UPDATE turma_disciplina SET 

            fk_id_professor = :fk_id_teacher 

            WHERE turma_disciplina.id_turma_disciplina = :classDisciplineId
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_teacher', $this->__get('fk_id_teacher'));
        $stmt->bindValue(':classDisciplineId', $this->__get('classDisciplineId'));

        $stmt->execute();
    }


    /**
     * Retorna todas as disciplinas que o professor ministra em cada turma
     * 
     * @return array
     */
    public function subjectsThatTeacherTeaches()
    {

        $query =

            "SELECT 
            
            professor.id_professor AS teacher_id , 
            professor.nome_professor AS teacher_name ,    
            serie.sigla AS series_acronym , 
            cedula_turma.cedula AS ballot , 
            curso.sigla AS course , 
            turno.nome_turno AS shift_name , 
            periodo_disponivel.ano_letivo AS school_year , 
            turma_disciplina.id_turma_disciplina AS discipline_class_id ,
            numero_sala_aula.numero_sala_aula AS classroom_number , 
            disciplina.nome_disciplina AS discipline_name ,
            turma.id_turma AS class_id ,
            turma_disciplina.fk_id_turma AS fk_id_class ,

            (SELECT COUNT(turma_disciplina.id_turma_disciplina) 

            FROM turma_disciplina           
                   
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma) 
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo) 
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)         
            INNER JOIN disciplina ON(disciplina.id_disciplina = turma_disciplina.fk_id_disciplina)

            WHERE turma_disciplina.fk_id_professor = professor.id_professor AND situacao_periodo_letivo.id_situacao_periodo_letivo = 1) AS total_discipline
            
            FROM professor 

            INNER JOIN turma_disciplina ON(professor.id_professor = turma_disciplina.fk_id_professor)  
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            INNER JOIN cedula_turma ON(turma.fk_id_cedula = cedula_turma.id_cedula_turma) 
            INNER JOIN curso ON(turma.fk_id_curso = curso.id_curso) 
            INNER JOIN serie ON(turma.fk_id_serie = serie.id_serie) 
            INNER JOIN turno ON(turma.fk_id_turno = turno.id_turno)
            INNER JOIN sala ON(turma.fk_id_sala = sala.fk_id_numero_sala) 
            INNER JOIN numero_sala_aula ON(sala.fk_id_numero_sala = numero_sala_aula.id_numero_sala_aula) 
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo) 
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)         
            INNER JOIN disciplina ON(disciplina.id_disciplina = turma_disciplina.fk_id_disciplina)
            INNER JOIN periodo_disponivel ON(periodo_letivo.fk_id_ano_letivo = periodo_disponivel.id_periodo_disponivel)       

            WHERE professor.id_professor = :fk_id_teacher AND situacao_periodo_letivo.id_situacao_periodo_letivo = 1
        
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':fk_id_teacher', $this->__get('fk_id_teacher'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna todas as disciplinas que ainda não foram vinculadas a uma determinada turma
     * 
     * @return array
     */
    public function subjectAvailableClass()
    {

        # Inicialmente em $disciplineAll, será armazenado todas as disciplinas criadas no sistema.

        $disciplineAll = $this->speedingUp(
            "SELECT disciplina.id_disciplina AS option_value , disciplina.nome_disciplina AS option_text FROM disciplina ORDER BY nome_disciplina"
        );

        # Em seguida, em  $disciplineAlreadyAdded será armazenado todas as disciplinas que já foram vinculadas a essa turma.

        $disciplineAlreadyAdded =

            "SELECT 
            
            disciplina.id_disciplina AS option_value
            
            FROM disciplina

            LEFT JOIN turma_disciplina ON(disciplina.id_disciplina = turma_disciplina.fk_id_disciplina) 
            LEFT JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)

            WHERE turma.id_turma = :fk_id_class 

            ORDER BY nome_disciplina
            
        ";

        $stmt = $this->db->prepare($disciplineAlreadyAdded);
        $stmt->bindValue(':fk_id_class', $this->__get('fk_id_class'));
        $stmt->execute();

        $allSubjectsId = [];
        $availableDiscipline = [];

        foreach ($stmt->fetchAll(\PDO::FETCH_OBJ) as $key => $discipline) {

            # Armazenando somente os ids das disciplinas já vinculadas a turma

            $allSubjectsId[] = $discipline->option_value;
        };

        foreach ($disciplineAll as $key => $discipline) {

            /** Caso o id da disciplina seja diferente do id da disciplina presente na turma, significa que a mesma ainda não foi adicionada na turma.
             *  Assim, caso essa condição seja satisfeita, o id da disciplina e seu nome, serão armazenados em $availableDiscipline.
             */

            if (!in_array($discipline->option_value, $allSubjectsId)) {

                array_push($availableDiscipline, array("option_value" => $discipline->option_value, "option_text" => $discipline->option_text));
            }
        }

        

        return $availableDiscipline;
    }


    /**
     * Retorna todas as disciplinas vinculadas a uma turma
     * 
     * @return array
     */

    public function classLinkedSubjects()
    {

        $query =

            "SELECT 
            
            turma_disciplina.id_turma_disciplina AS option_value , 
            disciplina.nome_disciplina AS option_text 
            
            FROM turma_disciplina 
            
            LEFT JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina) 
            
            WHERE turma_disciplina.fk_id_turma = :fk_id_class
            
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':fk_id_class', $this->__get('fk_id_class'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna todas as disciplinas vinculadas a um professor
     * 
     * @return array
     */

    public function teacherLinkedDisciplines()
    {

        $query =

            "SELECT 
            
            turma_disciplina.id_turma_disciplina AS option_value , 
            disciplina.nome_disciplina AS option_text 
            
            FROM turma_disciplina 
            
            LEFT JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina) 
            LEFT JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma) 
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo) 
            INNER JOIN situacao_periodo_letivo on(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)
            
            WHERE turma_disciplina.fk_id_professor = :fk_id_teacher 
            
            AND

            turma.id_turma = :fk_id_class

            AND

            situacao_periodo_letivo.id_situacao_periodo_letivo = 1;
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':fk_id_teacher', $this->__get('fk_id_teacher'));
        $stmt->bindValue(':fk_id_class', $this->__get('fk_id_class'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna as avaliações que foram adicionadas em uma turma
     * 
     * @return array
     */
    public function subjectsLinkedTeacher()
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
            
            WHERE professor.id_professor = :fk_id_teacher

            AND CASE WHEN :fk_id_class = 0 THEN turma.id_turma <> 0 ELSE turma.id_turma = :fk_id_class END

            AND situacao_periodo_letivo.id_situacao_periodo_letivo = 1 

            ORDER BY avaliacoes.id_avaliacao ASC
            
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':fk_id_teacher', $this->__get('fk_id_teacher'));
        $stmt->bindValue(':fk_id_class', $this->__get('fk_id_class'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna as notas das avaliações vinculadas somente a determinado professor da turma
     * 
     * @return array
     */
    public function notesLinkedTeacherClass()
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
            
            WHERE professor.id_professor = :fk_id_teacher

            AND CASE WHEN :fk_id_class = 0 THEN turma.id_turma <> 0 ELSE turma.id_turma = :fk_id_class END

            AND situacao_periodo_letivo.id_situacao_periodo_letivo = 1 

            ORDER BY avaliacoes.id_avaliacao ASC
            
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':fk_id_teacher', $this->__get('fk_id_teacher'));
        $stmt->bindValue(':fk_id_class', $this->__get('fk_id_class'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna as notas das avaliações vinculadas somente a determinado professor e aluno da turma
     * 
     * @return array
     */
    public function notesLinkedStudentClassTeacher($studentEnrollment)
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
            
            WHERE professor.id_professor = :fk_id_teacher

            AND matricula.id_matricula = :fk_id_enrollment

            ORDER BY avaliacoes.id_avaliacao ASC
            
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':fk_id_teacher', $this->__get('fk_id_teacher'));
        $stmt->bindValue(':fk_id_enrollment', $studentEnrollment->__get('studentEnrollmentId'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Buscar disciplina da turma
     * 
     * @return array
     */
    public function searchClassSubjects()
    {

        $query =

            "SELECT 
            
            turma_disciplina.id_turma_disciplina AS option_value , 
            disciplina.nome_disciplina AS option_text 
            
            FROM turma_disciplina 
            
            LEFT JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina) 
            
            WHERE turma_disciplina.fk_id_turma = :fk_id_class 
            
            AND

            CASE WHEN :fk_id_teacher = 0 THEN turma_disciplina.fk_id_professor <> 0 ELSE turma_disciplina.fk_id_professor = :fk_id_teacher END

            AND

            CASE WHEN :classDisciplineId = 0 THEN turma_disciplina.id_turma_disciplina <> 0 ELSE turma_disciplina.id_turma_disciplina = :classDisciplineId END
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_class', $this->__get('fk_id_class'));
        $stmt->bindValue(':fk_id_teacher', $this->__get('fk_id_teacher'));
        $stmt->bindValue(':classDisciplineId', $this->__get('classDisciplineId'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Deletar disciplina da turma
     * 
     * @return array
     */
    public function delete()
    {

        $query = "DELETE FROM turma_disciplina WHERE turma_disciplina.id_turma_disciplina = :classDisciplineId ";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':classDisciplineId', $this->__get('classDisciplineId'));
        $stmt->execute();
    }
}
