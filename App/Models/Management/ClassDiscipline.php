<?php

namespace App\Models\Management;

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


    public function listTeachersClass()
    {

        $query = 
        
            "SELECT 

            professor.id_professor AS teacher_id , 
            professor.nome_professor AS teacher_name , 
            professor.foto_perfil_professor AS profilePhoto , 
            professor.cpf_professor AS teacher_cpf , 
            sexo.sexo AS teacher_sex , 
            disciplina.nome_disciplina AS discipline_name , 
            disciplina.id_disciplina AS discipline_id , 
            turma_disciplina.fk_id_turma as class_id , 
            turma_disciplina.id_turma_disciplina AS discipline_class_id

            FROM professor 

            INNER JOIN sexo ON(sexo.id_sexo = professor.fk_id_sexo_professor) 
            INNER JOIN turma_disciplina ON(professor.id_professor = turma_disciplina.fk_id_professor) 
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)

            WHERE disciplina.nome_disciplina IS NOT NULL 
            
            AND turma_disciplina.fk_id_turma = :id
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':id', $this->__get('fk_id_class'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function update()
    {

        $query = 
        
            "UPDATE turma_disciplina SET 

            fk_id_professor = :fk_id_teacher, 
            fk_id_disciplina = :fk_id_discipline 

            WHERE turma_disciplina.id_turma_disciplina = :classDisciplineId"
        
        ;

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_teacher', $this->__get('fk_id_teacher'));
        $stmt->bindValue(':fk_id_discipline', $this->__get('fk_id_discipline'));
        $stmt->bindValue(':classDisciplineId', $this->__get('classDisciplineId'));

        $stmt->execute();
    }


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
            numero_sala_aula.numero_sala_aula AS classroom_number , 

            (SELECT COUNT(turma_disciplina.id_turma_disciplina) 

            FROM turma_disciplina           
                   
            LEFT JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma) 
            LEFT JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo) 
            LEFT JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)         
            LEFT JOIN disciplina ON(disciplina.id_disciplina = turma_disciplina.fk_id_disciplina)

            WHERE turma_disciplina.fk_id_professor = professor.id_professor AND situacao_periodo_letivo.id_situacao_periodo_letivo = 1) AS total_discipline
            
            FROM professor 

            LEFT JOIN turma_disciplina ON(professor.id_professor = turma_disciplina.fk_id_professor)  
            LEFT JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            LEFT JOIN cedula_turma ON(turma.fk_id_cedula = cedula_turma.id_cedula_turma) 
            LEFT JOIN curso ON(turma.fk_id_curso = curso.id_curso) 
            LEFT JOIN serie ON(turma.fk_id_serie = serie.id_serie) 
            LEFT JOIN turno ON(turma.fk_id_turno = turno.id_turno)
            LEFT JOIN sala ON(turma.fk_id_sala = sala.fk_id_numero_sala) 
            LEFT JOIN numero_sala_aula ON(sala.fk_id_numero_sala = numero_sala_aula.id_numero_sala_aula) 
            LEFT JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo) 
            LEFT JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)         
            LEFT JOIN disciplina ON(disciplina.id_disciplina = turma_disciplina.fk_id_disciplina)
            LEFT JOIN periodo_disponivel ON(periodo_letivo.fk_id_ano_letivo = periodo_disponivel.id_periodo_disponivel)
            

            WHERE professor.id_professor = :id AND situacao_periodo_letivo.id_situacao_periodo_letivo = 1
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':id' , $this->__get('fk_id_teacher'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);

    }


    public function disciplinesNotYetAdded()
    {

        $query = 
        
            "SELECT 
            
            disciplina.id_disciplina AS option_value , 
            disciplina.nome_disciplina AS option_text 
            
            FROM disciplina

            LEFT JOIN turma_disciplina ON(disciplina.id_disciplina = turma_disciplina.fk_id_disciplina) 
            LEFT JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)

            WHERE turma.id_turma = :fk_id_class 
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_class', $this->__get('fk_id_class'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);

    }


    public function disciplinesClassAlreadyAdded()
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


    public function delete()
    {

        $query = "DELETE FROM turma_disciplina WHERE turma_disciplina.id_turma_disciplina = :id ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':id', $this->__get('classDisciplineId'));

        $stmt->execute();

    }


    





}
