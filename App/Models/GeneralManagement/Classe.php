<?php

namespace App\Models\GeneralManagement;

use MF\Model\Model;

class Classe extends Model
{

    private $classId;
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


    /**
     * Criar turma
     * 
     * @return void
     */
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


    /**
     * Atualizar dados da turma
     * 
     * @return void
     */
    public function update()
    {

        $query =

            "UPDATE turma SET 

            fk_id_turno = :fk_id_shift , 
            fk_id_sala = :fk_id_classroom ,  
            fk_id_cedula = :fk_id_ballot 

            WHERE id_turma = :classId
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":fk_id_shift", $this->__get("fk_id_shift"));
        $stmt->bindValue(":fk_id_classroom", $this->__get("fk_id_classroom"));
        $stmt->bindValue(":fk_id_ballot", $this->__get("fk_id_ballot"));
        $stmt->bindValue(":classId", $this->__get("classId"));

        $stmt->execute();
    }


    /**
     * Esse método verificar se já foi criado uma turma com os mesmos valores no período letivo selecionado.
     * 
     * No mesmo período letivo só é possivel ter uma turma por sala, no mesmo turno. Desse modo, se já existe uma turma criada
     * no turno matutino na sala 1, não será possível adicionar outra turma nesse mesmo formato, como também se por exemplo, no curso de 
     * Informática existir uma turma do 1 ano com a cédula A, não é possível criar uma turma com a mesma cédula.
     * 
     * Assim, vamos dividir essa tarefa em dois métodos, o primeiro checkShiftClassroom, verifica a redudância não que diz respeito ao turno e sala,
     * Já o método checkCourseBallot que vem logo em seguida, irá analisar a cédula, curso e séries.
     * 
     * @return array
     */
    public function checkShiftClassroom()
    {

        $query =

            "SELECT turma.id_turma AS class_id_shift_classroom

            FROM turma 

            WHERE turma.fk_id_sala = :fk_id_classroom 

            AND turma.fk_id_turno = :fk_id_shift 

            AND turma.fk_id_periodo_letivo = :fk_id_school_term
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":fk_id_classroom", $this->__get("fk_id_classroom"));
        $stmt->bindValue(":fk_id_shift", $this->__get("fk_id_shift"));
        $stmt->bindValue(":fk_id_school_term", $this->__get("fk_id_school_term"));

        $stmt->execute();

        $stmt = $stmt->fetchAll(\PDO::FETCH_OBJ);

        return count($stmt) == 0 ? 0 : $stmt[0]->class_id_shift_classroom;
    }


    public function checkCourseBallot()
    {

        $query =

            "SELECT turma.id_turma AS class_id_ballot_course

            FROM turma 

            WHERE turma.fk_id_serie = :fk_id_series

            AND turma.fk_id_cedula = :fk_id_ballot 

            AND turma.fk_id_curso = :fk_id_course 

            AND turma.fk_id_periodo_letivo = :fk_id_school_term
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":fk_id_series", $this->__get("fk_id_series"));
        $stmt->bindValue(":fk_id_ballot", $this->__get("fk_id_ballot"));
        $stmt->bindValue(":fk_id_course", $this->__get("fk_id_course"));
        $stmt->bindValue(":fk_id_school_term", $this->__get("fk_id_school_term"));

        $stmt->execute();

        $stmt = $stmt->fetchAll(\PDO::FETCH_OBJ);

        return count($stmt) == 0 ? 0 : $stmt[0]->class_id_ballot_course;
    }


    /**
     * Buscar turma
     * 
     * @return array
     */
    public function seek()
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

            CASE WHEN :fk_id_school_term = 0 THEN  periodo_letivo.id_ano_letivo <> :fk_id_school_term ELSE periodo_letivo.id_ano_letivo = :fk_id_school_term

            END      
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":fk_id_course", $this->__get("fk_id_course"));
        $stmt->bindValue(":fk_id_series", $this->__get("fk_id_series"));
        $stmt->bindValue(":fk_id_shift", $this->__get("fk_id_shift"));
        $stmt->bindValue(":fk_id_school_term", $this->__get("fk_id_school_term"));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna os dados gerais de uma única turma 
     * 
     * @return array
     */
    public function dataGeneral()
    {

        $query =

            "SELECT 

            turma.id_turma as class_id , 
            serie.sigla AS series_acronym , 
            serie.id_serie AS series_id ,
            cedula_turma.cedula AS ballot , 
            cedula_turma.id_cedula_turma AS ballot_id ,
            curso.sigla AS course , 
            curso.nome_curso AS course_name ,
            curso.id_curso AS course_id,
            turno.nome_turno AS shift , 
            turno.id_turno AS shift_id ,
            numero_sala_aula.numero_sala_aula AS classroom_number , 
            sala.id_sala AS classroom_id ,
            periodo_disponivel.ano_letivo AS school_term ,
            periodo_letivo.id_ano_letivo AS school_term_id ,
            situacao_periodo_letivo.id_situacao_periodo_letivo AS school_term_situation ,

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
            
            WHERE turma.id_turma = :classId
       
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":classId", $this->__get("classId"));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * Retorna todas as turmas
     * 
     * @param string $scholTermSituation 
     * 
     * @return array
     */
    public function readAll($scholTermSituation = '= 1')
    {

        $query =

            "SELECT 

            turma.id_turma as class_id , 
            serie.sigla AS series_acronym , 
            serie.id_serie AS series_id ,
            cedula_turma.cedula AS ballot , 
            cedula_turma.id_cedula_turma AS ballot_id ,
            curso.sigla AS course , 
            curso.nome_curso AS course_name ,
            curso.id_curso AS course_id,
            turno.nome_turno AS shift , 
            turno.id_turno AS shift_id ,
            numero_sala_aula.numero_sala_aula AS classroom_number , 
            sala.id_sala AS classroom_id ,
            periodo_disponivel.ano_letivo AS school_term ,
            periodo_letivo.id_ano_letivo AS school_term_id ,

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
       
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna todas as turmas da primeira série
     * 
     * @return array
     */
    public function firstGradeClasses()
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


    /**
     * Retorna todas as solicitações de rematrículas dos alunos, de uma determinada turma
     * 
     * @return array
     */
    public function listRematrugRequests()
    {

        $query =

            "SELECT 

            aluno.nome_aluno AS student_name , 
            aluno.foto_perfil_aluno AS profile_photo , 
            aluno.id_aluno AS student_id,
            situacao_rematricula.situacao AS rematrung_situation , 
            situacao_aluno_ano_letivo.situacao_aluno AS student_situation_school_year , 
            situacao_geral_aluno.situacao_geral AS general_student_situation ,
            turma.id_turma AS class_id ,
            (SELECT COUNT(matricula.id_matricula) FROM matricula WHERE aluno.id_aluno = matricula.fk_id_aluno) AS enrollment_total,
            serie.id_serie AS series_id
        
            FROM matricula 
            
            INNER JOIN aluno ON(matricula.fk_id_aluno = aluno.id_aluno) 
            INNER JOIN rematricula ON(matricula.id_matricula = rematricula.fk_id_rematricula_aluno) 
            INNER JOIN situacao_rematricula ON(rematricula.fk_id_situacao_rematricula = situacao_rematricula.id_situacao_rematricula) 
            INNER JOIN turma ON(matricula.fk_id_turma_matricula = turma.id_turma) 
            INNER JOIN serie ON(turma.fk_id_serie = serie.id_serie)
            INNER JOIN situacao_aluno_ano_letivo ON(matricula.fk_id_situacao_aluno = situacao_aluno_ano_letivo.id_situacao_aluno) 
            INNER JOIN situacao_geral_aluno ON(aluno.fk_id_situacao_geral_aluno = situacao_geral_aluno.id_situacao_geral)

            WHERE turma.id_turma = :classId

        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":classId", $this->__get("classId"));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna todas as turmas que o aluno pode ser rematrículado, levando em consideração o curso, e sua série.
     * 
     * @return array
     */
    public function nextClass()
    {

        $query =

            "SELECT 

            turma.id_turma AS class_id , 
            serie.sigla AS series , 
            cedula_turma.cedula AS ballot , 
            curso.nome_curso AS course , 
            turno.nome_turno AS shift , 
            numero_sala_aula.numero_sala_aula AS classroom_number , 
            periodo_disponivel.ano_letivo AS school_year,
            sala.capacidade_alunos AS student_capacity ,
            periodo_letivo.id_ano_letivo AS school_term_id,
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

            turma.fk_id_curso = :fk_id_course
            
            AND turma.fk_id_serie BETWEEN :fk_id_series AND :fk_id_series_new

            AND situacao_periodo_letivo.id_situacao_periodo_letivo = 3
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":fk_id_course", $this->__get("fk_id_course"));
        $stmt->bindValue(":fk_id_series", $this->__get("fk_id_series"));
        $stmt->bindValue(":fk_id_series_new", $this->__get("fk_id_series") + 1);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna todas as turmas onde o aluno pode ser rematrículado
     * 
     * @return array
     */
    public function classesWhereStudentEnrolledSameYear()
    {

        $query =

            "SELECT 

            turma.id_turma AS class_id , 
            serie.sigla AS series , 
            cedula_turma.cedula AS ballot , 
            curso.nome_curso AS course , 
            turno.nome_turno AS shift , 
            numero_sala_aula.numero_sala_aula AS classroom_number , 
            periodo_disponivel.ano_letivo AS school_year,
            sala.capacidade_alunos AS student_capacity ,
            periodo_letivo.id_ano_letivo AS school_term_id,
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

            turma.fk_id_curso = :fk_id_course
            
            AND turma.fk_id_serie = :fk_id_series 

            AND situacao_periodo_letivo.id_situacao_periodo_letivo = 1
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":fk_id_course", $this->__get("fk_id_course"));
        $stmt->bindValue(":fk_id_series", $this->__get("fk_id_series"));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna todos os alunos que já foram rematrículados no próximo ano
     * 
     * @return array
     */
    public function studentsAlreadyRegisteredNextYear()
    {

        $query =

            "SELECT 

            aluno.nome_aluno AS studen_name,
            aluno.id_aluno AS student_id ,
            turma.id_turma AS class_id ,
            serie.sigla AS acronym_series , 
            cedula_turma.cedula AS ballot , 
            curso.sigla AS course , 
            turno.nome_turno AS shift 
            
            FROM matricula
            
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
            
            AND ( turma.fk_id_serie = :fk_id_series OR turma.fk_id_serie = :fk_id_series + 1 )
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":fk_id_course", $this->__get("fk_id_course"));
        $stmt->bindValue(":fk_id_series", $this->__get("fk_id_series"));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}
