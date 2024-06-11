<?php

namespace App\Models\Student;

use MF\Model\Model;

class StudentEnrollment extends Model
{

    private $studentEnrollmentId;
    private $fk_id_student_situation;
    private $fk_id_class;
    private $fk_id_school_term;
    private $fk_id_student;


    public function __get($att)
    {
        return $this->$att;
    }


    public function __set($att, $newValue)
    {
        return $this->$att = $newValue;
    }


    /**
     * Matrícular aluno em turma
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

        $query = "UPDATE matricula SET matricula.fk_id_situacao_aluno = :fk_id_student_situation WHERE matricula.id_matricula = :studentEnrollmentId";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_student_situation', $this->__get('fk_id_student_situation'));
        $stmt->bindValue(':studentEnrollmentId', $this->__get('studentEnrollmentId'));

        $stmt->execute();
    }


    /**
     * Retorna os dados necessários para a criação do boletim do aluno
     * 
     * @return array
     */
    public function readFullBulletin()
    {

        $query =

            "SELECT 
                disciplina.nome_disciplina AS discipline_name, 
                unidade.unidade AS unity,
                SUM(nota_avaliacao.valor_nota) AS note,
                MIN(turma_disciplina.id_turma_disciplina) AS class_id
            FROM nota_avaliacao
            INNER JOIN avaliacoes ON (nota_avaliacao.fk_id_avaliacao = avaliacoes.id_avaliacao)
            INNER JOIN unidade ON (avaliacoes.fk_id_unidade_avaliacao = unidade.id_unidade)
            INNER JOIN turma_disciplina ON (avaliacoes.fk_id_turma_disciplina_avaliacao = turma_disciplina.id_turma_disciplina)
            INNER JOIN disciplina ON (turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)
            INNER JOIN matricula ON (nota_avaliacao.fk_id_matricula_aluno = matricula.id_matricula)
            INNER JOIN aluno ON (matricula.fk_id_aluno = aluno.id_aluno)
            WHERE matricula.id_matricula = :studentEnrollmentId
            GROUP BY unidade.unidade, disciplina.nome_disciplina
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':studentEnrollmentId', $this->__get('studentEnrollmentId'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna os dados necessários para a criação do boletim do aluno com filtro de disciplinas
     * 
     * @param object $teacher
     * 
     * @return array
     */
    public function readBulletinSelectedDisciplines($teacher)
    {

        $query =

            "SELECT 
 
            disciplina.nome_disciplina AS discipline_name , 
            unidade.unidade AS unity,
            SUM(nota_avaliacao.valor_nota) AS note ,
            turma_disciplina.id_turma_disciplina AS class_id
            
            FROM nota_avaliacao 
            
            LEFT JOIN avaliacoes ON(nota_avaliacao.fk_id_avaliacao = avaliacoes.id_avaliacao) 
            LEFT JOIN unidade ON(avaliacoes.fk_id_unidade_avaliacao = unidade.id_unidade) 
            LEFT JOIN turma_disciplina ON(avaliacoes.fk_id_turma_disciplina_avaliacao = turma_disciplina.id_turma_disciplina) 
            LEFT JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina) 
            LEFT JOIN matricula ON(nota_avaliacao.fk_id_matricula_aluno = matricula.id_matricula) 
            LEFT JOIN aluno ON(matricula.fk_id_aluno = aluno.id_aluno) 
            
            WHERE matricula.id_matricula = :studentEnrollmentId

            AND turma_disciplina.fk_id_professor = :fk_id_teacher 
            
            GROUP BY unidade.unidade , disciplina.nome_disciplina
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':studentEnrollmentId', $this->__get('studentEnrollmentId'));
        $stmt->bindValue(':fk_id_teacher', $teacher->__get('teacherId'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna os estados que a matrícula do aluno pode estar. Entretanto, ele deve ser usado para peencher a tag select na View.
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

            "SELECT situacao_aluno_ano_letivo.situacao_aluno AS student_status , 

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


    /**
     * Retorna os dados de um aluno com base na sua matrícula
     * 
     * @return array
     */
    public function dataGeneral()
    {

        $query =

            "SELECT 
            
            aluno.id_aluno AS id , 
            aluno.nome_aluno AS name , 
            aluno.cpf_aluno AS cpf , 
            aluno.foto_perfil_aluno AS profile_photo , 
            serie.sigla AS acronym_series , 
            serie.id_serie AS series_id , 
            cedula_turma.cedula AS ballot , 
            curso.sigla AS course , 
            curso.id_curso AS course_id , 
            curso.nome_curso AS course_name ,
            turno.nome_turno AS shift , 
            modalidade_curso.modalidade_curso AS course_modality ,
            modalidade_curso.id_modalidade_curso AS course_modality_id ,
            numero_sala_aula.numero_sala_aula AS number_classroom , 
            situacao_aluno_ano_letivo.situacao_aluno as situation , 
            situacao_aluno_ano_letivo.id_situacao_aluno as situation_id , 
            turma.id_turma AS class_id,
            matricula.id_matricula AS enrollment_id ,
            situacao_periodo_letivo.id_situacao_periodo_letivo AS school_term_situation ,
            periodo_disponivel.ano_letivo AS school_year ,
            periodo_letivo.id_ano_letivo AS school_term_id
            
            FROM aluno 
            
            INNER JOIN matricula ON(aluno.id_aluno = matricula.fk_id_aluno) 
            INNER JOIN situacao_aluno_ano_letivo ON(matricula.fk_id_situacao_aluno = situacao_aluno_ano_letivo.id_situacao_aluno) 
            INNER JOIN turma ON(matricula.fk_id_turma_matricula = turma.id_turma) 
            INNER JOIN serie ON(turma.fk_id_serie = serie.id_serie) 
            INNER JOIN curso ON(turma.fk_id_curso = curso.id_curso) 
            INNER JOIN modalidade_curso ON(curso.fk_id_modalidade_curso = modalidade_curso.id_modalidade_curso)
            INNER JOIN cedula_turma ON(turma.fk_id_cedula = cedula_turma.id_cedula_turma) 
            INNER JOIN turno ON(turma.fk_id_turno = turno.id_turno) 
            INNER JOIN sala ON(turma.fk_id_sala = sala.id_sala) 
            INNER JOIN numero_sala_aula ON(sala.fk_id_numero_sala = numero_sala_aula.id_numero_sala_aula)         
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo)
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)
            INNER JOIN periodo_disponivel ON(periodo_letivo.fk_id_ano_letivo = periodo_disponivel.id_periodo_disponivel) 

            WHERE matricula.id_matricula = :studentEnrollmentId
            
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':studentEnrollmentId', $this->__get('studentEnrollmentId'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna todas as matrículas que um aluno possui no sistema
     * 
     * @return array
     */
    public function allRegistrations()
    {

        $query =

            "SELECT 
            
            aluno.id_aluno AS id , 
            aluno.nome_aluno AS name , 
            aluno.cpf_aluno AS cpf , 
            aluno.foto_perfil_aluno AS profile_photo , 
            serie.sigla AS acronym_series , 
            serie.id_serie AS series_id , 
            cedula_turma.cedula AS ballot , 
            curso.sigla AS course , 
            curso.id_curso AS course_id , 
            curso.nome_curso AS course_name ,
            turno.nome_turno AS shift , 
            numero_sala_aula.numero_sala_aula AS number_classroom , 
            situacao_aluno_ano_letivo.situacao_aluno as situation , 
            situacao_aluno_ano_letivo.id_situacao_aluno as situation_id , 
            turma.id_turma AS class_id,
            matricula.id_matricula AS enrollment_id ,
            situacao_periodo_letivo.id_situacao_periodo_letivo AS school_term_situation ,
            periodo_disponivel.ano_letivo AS school_year ,
            periodo_letivo.id_ano_letivo AS school_term_id
            
            FROM aluno 
            
            INNER JOIN matricula ON(aluno.id_aluno = matricula.fk_id_aluno) 
            INNER JOIN situacao_aluno_ano_letivo ON(matricula.fk_id_situacao_aluno = situacao_aluno_ano_letivo.id_situacao_aluno) 
            INNER JOIN turma ON(matricula.fk_id_turma_matricula = turma.id_turma) 
            INNER JOIN serie ON(turma.fk_id_serie = serie.id_serie) 
            INNER JOIN curso ON(turma.fk_id_curso = curso.id_curso) 
            INNER JOIN cedula_turma ON(turma.fk_id_cedula = cedula_turma.id_cedula_turma) 
            INNER JOIN turno ON(turma.fk_id_turno = turno.id_turno) 
            INNER JOIN sala ON(turma.fk_id_sala = sala.id_sala) 
            INNER JOIN numero_sala_aula ON(sala.fk_id_numero_sala = numero_sala_aula.id_numero_sala_aula)         
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo)
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)
            INNER JOIN periodo_disponivel ON(periodo_letivo.fk_id_ano_letivo = periodo_disponivel.id_periodo_disponivel) 

            WHERE aluno.id_aluno = :fk_id_aluno
            
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':fk_id_aluno', $this->__get('fk_id_student'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Muda o aluno de uma turma para outra
     * 
     * @return array
     */
    public function changeStudentFromClass()
    {

        $query = "UPDATE matricula SET matricula.fk_id_situacao_aluno = :fk_id_student_situation WHERE matricula.id_matricula = :studentEnrollmentId";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_student_situation', $this->__get('fk_id_student_situation'));
        $stmt->bindValue(':studentEnrollmentId', $this->__get('studentEnrollmentId'));

        $stmt->execute();
    }
}
