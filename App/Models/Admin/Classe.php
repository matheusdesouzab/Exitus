<?php

namespace App\Models\Admin;

use MF\Model\Model;

class Classe extends Model
{

    private $classId = 0;
    private $fk_id_shift;
    private $fk_id_classroom;
    private $fk_id_course;
    private $fk_id_school_term;
    private $fk_id_ballot;
    private $fk_id_series;


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

            "INSERT INTO 

            turma (fk_id_turno, fk_id_sala, fk_id_periodo_letivo, fk_id_cedula, fk_id_curso, fk_id_serie) 

            VALUES 

            (:fk_id_shift, :fk_id_classroom, :fk_id_school_term, :fk_id_ballot, :fk_id_course , :fk_id_series)
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":fk_id_shift", $this->__get("fk_id_shift"));
        $stmt->bindValue(":fk_id_classroom", $this->__get("fk_id_classroom"));
        $stmt->bindValue(":fk_id_course", $this->__get("fk_id_course"));
        $stmt->bindValue(":fk_id_school_term", $this->__get("fk_id_school_term"));
        $stmt->bindValue(":fk_id_ballot", $this->__get("fk_id_ballot"));
        $stmt->bindValue(":fk_id_series", $this->__get("fk_id_series"));

        $stmt->execute();
    }


    public function update()
    {

        $query =

            "UPDATE turma SET 

            fk_id_turno = :fk_id_shift , 
            fk_id_sala = :fk_id_classroom , 
            fk_id_curso = :fk_id_course , 
            fk_id_periodo_letivo = :fk_id_school_term , 
            fk_id_cedula = :fk_id_ballot , 
            fk_id_serie = :fk_id_series 

            WHERE id_turma = :classId
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":fk_id_shift", $this->__get("fk_id_shift"));
        $stmt->bindValue(":fk_id_classroom", $this->__get("fk_id_classroom"));
        $stmt->bindValue(":fk_id_course", $this->__get("fk_id_course"));
        $stmt->bindValue(":fk_id_school_term", $this->__get("fk_id_school_term"));
        $stmt->bindValue(":fk_id_ballot", $this->__get("fk_id_ballot"));
        $stmt->bindValue(":fk_id_series", $this->__get("fk_id_series"));
        $stmt->bindValue(":classId", $this->__get("classId"));

        $stmt->execute();
    }


    public function availableShift()
    {

        return $this->speedingUp(
            "SELECT turno.id_turno AS option_value , turno.nome_turno AS option_text FROM turno"
        );
    }


    public function availableBallot()
    {

        return $this->speedingUp(
            "SELECT cedula_turma.id_cedula_turma AS option_value , cedula_turma.cedula AS option_text FROM cedula_turma"
        );
    }


    public function availableSeries()
    {

        return $this->speedingUp(
            "SELECT serie.id_serie AS option_value , serie.sigla AS option_text FROM serie"
        );
    }


    public function checkClass()
    {

        $query =

            "SELECT COUNT(*) AS result

            FROM turma 

            WHERE turma.fk_id_sala = :fk_id_classroom 

            AND turma.fk_id_turno = :fk_id_shift 

            AND turma.fk_id_periodo_letivo = :fk_id_school_term

            UNION

            SELECT COUNT(*) AS result

            FROM turma 

            WHERE turma.fk_id_serie = :fk_id_series

            AND turma.fk_id_cedula = :fk_id_ballot 

            AND turma.fk_id_curso = :fk_id_course 

            AND turma.fk_id_periodo_letivo = :fk_id_school_term
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":fk_id_classroom", $this->__get("fk_id_classroom"));
        $stmt->bindValue(":fk_id_shift", $this->__get("fk_id_shift"));
        $stmt->bindValue(":fk_id_school_term", $this->__get("fk_id_school_term"));
        $stmt->bindValue(":fk_id_series", $this->__get("fk_id_series"));
        $stmt->bindValue(":fk_id_ballot", $this->__get("fk_id_ballot"));
        $stmt->bindValue(":fk_id_course", $this->__get("fk_id_course"));
        $stmt->bindValue(":fk_id_school_term", $this->__get("fk_id_school_term"));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function seekClass()
    {

        $query =

            "SELECT 

            turma.id_turma AS class_id , 
            serie.sigla AS series_acronym , 
            cedula_turma.cedula AS ballot , 
            curso.sigla AS course , 
            turno.nome_turno AS shift , 
            numero_sala_aula.numero_sala_aula AS classroom_number , 
            periodo_disponivel.ano_letivo AS school_term,

            (SELECT COUNT(matricula.id_matricula) FROM matricula WHERE matricula.fk_id_turma_matricula = turma.id_turma ) as student_total
            
            FROM turma 
            
            INNER JOIN cedula_turma ON(turma.fk_id_cedula = cedula_turma.id_cedula_turma) 
            INNER JOIN curso ON(turma.fk_id_curso = curso.id_curso) 
            INNER JOIN serie ON(turma.fk_id_serie = serie.id_serie) 
            INNER JOIN turno ON(turma.fk_id_turno = turno.id_turno)
            INNER JOIN sala ON(turma.fk_id_sala = sala.id_sala) 
            INNER JOIN numero_sala_aula ON(sala.id_sala = numero_sala_aula.id_numero_sala_aula) 
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo) 
            INNER JOIN periodo_disponivel ON(periodo_letivo.fk_id_ano_letivo = periodo_disponivel.id_periodo_disponivel) 
            INNER JOIN situacao_periodo_letivo on(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo) 
            
            WHERE 
            
            CASE WHEN :fk_id_course = 0 THEN turma.fk_id_curso <> :fk_id_course ELSE turma.fk_id_curso = :fk_id_course END 
            
            AND
            
            CASE WHEN :fk_id_series = 0 THEN turma.fk_id_serie <> :fk_id_series ELSE turma.fk_id_serie = :fk_id_series END 
            
            AND

            CASE WHEN :fk_id_shift = 0 THEN turma.fk_id_turno <> :fk_id_shift ELSE turma.fk_id_turno = :fk_id_shift END 

            AND

            CASE WHEN :fk_id_school_term = 0 THEN  periodo_letivo.id_ano_letivo <> :fk_id_school_term ELSE periodo_letivo.id_ano_letivo = :fk_id_school_term END
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":fk_id_course", $this->__get("fk_id_course"));
        $stmt->bindValue(":fk_id_series", $this->__get("fk_id_series"));
        $stmt->bindValue(":fk_id_shift", $this->__get("fk_id_shift"));
        $stmt->bindValue(":fk_id_school_term", $this->__get("fk_id_school_term"));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function list($scholTermSituation = '= 1')
    {

        $query =

            "SELECT 

            turma.id_turma as class_id , 
            serie.sigla AS series_acronym , 
            serie.id_serie AS seriesId ,
            cedula_turma.cedula AS ballot , 
            cedula_turma.id_cedula_turma AS ballotId ,
            curso.sigla AS course , 
            curso.id_curso AS courseId,
            turno.nome_turno AS shift , 
            turno.id_turno AS shiftId ,
            numero_sala_aula.numero_sala_aula AS classroom_number , 
            sala.id_sala AS classroomId ,
            periodo_disponivel.ano_letivo AS school_term ,

            (SELECT COUNT(matricula.id_matricula) FROM matricula WHERE matricula.fk_id_turma_matricula = turma.id_turma ) as student_total
            
            FROM turma 

            INNER JOIN cedula_turma ON(turma.fk_id_cedula = cedula_turma.id_cedula_turma) 
            INNER JOIN curso ON(turma.fk_id_curso = curso.id_curso) 
            INNER JOIN serie ON(turma.fk_id_serie = serie.id_serie) 
            INNER JOIN turno ON(turma.fk_id_turno = turno.id_turno)
            INNER JOIN sala ON(turma.fk_id_sala = sala.id_sala) 
            INNER JOIN numero_sala_aula ON(sala.id_sala = numero_sala_aula.id_numero_sala_aula) 
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo) 
            INNER JOIN periodo_disponivel ON(periodo_letivo.fk_id_ano_letivo = periodo_disponivel.id_periodo_disponivel) 
            INNER JOIN situacao_periodo_letivo on(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)
            
            WHERE situacao_periodo_letivo.id_situacao_periodo_letivo $scholTermSituation 

            AND

            CASE WHEN :classId = 0 THEN turma.id_turma <> :classId ELSE turma.id_turma = :classId END
       
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":classId", $this->__get("classId"));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function availableListClass()
    {

        return $this->speedingUp(

            "SELECT 

            turma.id_turma as class_id , 
            serie.sigla AS series_acronym , 
            cedula_turma.cedula AS ballot , 
            curso.nome_curso AS course , 
            curso.sigla as course_acronym , 
            turno.nome_turno AS shift , 
            numero_sala_aula.numero_sala_aula AS classroom_number , 
            periodo_disponivel.ano_letivo AS school_term , 
            sala.capacidade_alunos as class_capacity ,

            (SELECT COUNT(matricula.fk_id_aluno) FROM matricula WHERE matricula.fk_id_turma_matricula = turma.id_turma  ) as student_total            
            
            FROM turma 
            
            INNER JOIN cedula_turma ON(turma.fk_id_cedula = cedula_turma.id_cedula_turma) 
            INNER JOIN curso ON(turma.fk_id_curso = curso.id_curso) 
            INNER JOIN serie ON(turma.fk_id_serie = serie.id_serie) 
            INNER JOIN turno ON(turma.fk_id_turno = turno.id_turno)
            INNER JOIN sala ON(turma.fk_id_sala = sala.id_sala) 
            INNER JOIN numero_sala_aula ON(sala.fk_id_numero_sala = numero_sala_aula.id_numero_sala_aula) 
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo) 
            INNER JOIN periodo_disponivel ON(periodo_letivo.fk_id_ano_letivo = periodo_disponivel.id_periodo_disponivel) 
            INNER JOIN situacao_periodo_letivo on(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)
            
            WHERE situacao_periodo_letivo.id_situacao_periodo_letivo = 1 AND turma.fk_id_serie = 1"

        );
    }


    public function listRematrugRequests()
    {

        $query =

            "SELECT 

            aluno.nome_aluno AS studentName , 
            aluno.foto_perfil_aluno AS profilePhoto , 
            aluno.id_aluno AS studentId,
            situacao_rematricula.situacao AS rematrungSituation , 
            situacao_aluno_ano_letivo.situacao_aluno AS studentSituationSchoolYear , 
            situacao_geral_aluno.situacao_geral AS generalStudentSituation ,
            (SELECT COUNT(matricula.id_matricula) FROM matricula WHERE aluno.id_aluno = matricula.fk_id_aluno) AS enrollmentTotal,
            serie.id_serie AS seriesId
        
            FROM matricula 
            
            INNER JOIN aluno ON(matricula.fk_id_aluno = aluno.id_aluno) 
            INNER JOIN rematricula ON(matricula.id_matricula = rematricula.fk_id_rematricula_aluno) 
            INNER JOIN situacao_rematricula ON(rematricula.fk_id_situacao_rematricula = situacao_rematricula.id_situacao_rematricula) 
            INNER JOIN turma ON(matricula.fk_id_turma_matricula = turma.id_turma) 
            INNER JOIN serie ON(turma.fk_id_serie = serie.id_serie)
            INNER JOIN situacao_aluno_ano_letivo ON(matricula.fk_id_periodo_letivo_matricula = situacao_aluno_ano_letivo.id_situacao_aluno) 
            INNER JOIN situacao_geral_aluno ON(aluno.fk_id_situacao_geral_aluno = situacao_geral_aluno.id_situacao_geral)

            WHERE turma.id_turma = :classId

        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":classId", $this->__get("classId"));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function nextClass()
    {

        $query =

            "SELECT 

            turma.id_turma AS classId , 
            serie.sigla AS series , 
            cedula_turma.cedula AS ballot , 
            curso.nome_curso AS course , 
            turno.nome_turno AS shift , 
            numero_sala_aula.numero_sala_aula AS classroom_number , 
            periodo_disponivel.ano_letivo AS schoolYear,
            sala.capacidade_alunos AS studentCapacity ,
            periodo_letivo.id_ano_letivo AS schoolTermId,
            (SELECT COUNT(matricula.id_matricula) FROM matricula WHERE matricula.fk_id_turma_matricula = turma.id_turma ) as studentTotal
            
            FROM turma
            
            INNER JOIN cedula_turma ON(turma.fk_id_cedula = cedula_turma.id_cedula_turma) 
            INNER JOIN curso ON(turma.fk_id_curso = curso.id_curso) 
            INNER JOIN serie ON(turma.fk_id_serie = serie.id_serie) 
            INNER JOIN turno ON(turma.fk_id_turno = turno.id_turno)
            INNER JOIN sala ON(turma.fk_id_sala = sala.id_sala) 
            INNER JOIN numero_sala_aula ON(sala.id_sala = numero_sala_aula.id_numero_sala_aula) 
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo) 
            INNER JOIN periodo_disponivel ON(periodo_letivo.fk_id_ano_letivo = periodo_disponivel.id_periodo_disponivel) 
            INNER JOIN situacao_periodo_letivo on(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)
            
            WHERE 

            turma.fk_id_curso = :fk_id_course
            
            AND CASE WHEN :fk_id_series = 1 THEN turma.fk_id_serie = 2 ELSE turma.fk_id_serie = 3 END

            AND situacao_periodo_letivo.id_situacao_periodo_letivo = 3
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":fk_id_course", $this->__get("fk_id_course"));
        $stmt->bindValue(":fk_id_series", $this->__get("fk_id_series"));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function studentsAlreadyRegisteredNextYear()
    {

        $query =

            "SELECT 

            aluno.nome_aluno AS studenName,
            aluno.id_aluno AS studentId ,
            turma.id_turma AS classId ,
            serie.sigla AS acronym_series , 
            cedula_turma.cedula AS ballot , 
            curso.sigla AS course , 
            turno.nome_turno AS shift 
            
            FROM 
            
            matricula
            
            INNER JOIN aluno ON(matricula.fk_id_aluno = aluno.id_aluno)
            INNER JOIN turma ON(matricula.fk_id_turma_matricula = turma.id_turma)
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo)
            INNER JOIN serie ON(turma.fk_id_serie = serie.id_serie) 
            INNER JOIN curso ON(turma.fk_id_curso = curso.id_curso) 
            INNER JOIN cedula_turma ON(turma.fk_id_cedula = cedula_turma.id_cedula_turma) 
            INNER JOIN turno ON(turma.fk_id_turno = turno.id_turno) 
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)
            
            WHERE situacao_periodo_letivo.id_situacao_periodo_letivo = 3
            
            AND turma.fk_id_curso = :fk_id_course
            
            AND turma.fk_id_serie = :fk_id_series
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":fk_id_course", $this->__get("fk_id_course"));
        $stmt->bindValue(":fk_id_series", $this->__get("fk_id_series"));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}
