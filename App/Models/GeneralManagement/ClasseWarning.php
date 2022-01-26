<?php

namespace App\Models\GeneralManagement;

use MF\Model\Model;

class ClasseWarning extends Model
{

    private $classeWarningId;
    private $warning;
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
     * Cria um aviso em uma determinada turma
     * 
     * @return void
     */
    public function insert()
    {

        $query = "INSERT INTO aviso_turma (aviso, fk_id_turma_disciplina) VALUES (:warning, :fk_id_discipline_class)";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':warning', $this->__get('warning'));
        $stmt->bindValue(':fk_id_discipline_class', $this->__get('fk_id_discipline_class'));

        $stmt->execute();
    }


    /**
     * Retorna todos os avisos vinculados a uma turma
     * 
     * @return array
     */
    public function readByIdClasse($classe)
    {

        $query =

            "SELECT 

            id_aviso_turma AS id , 
            aviso AS warning , 
            professor.nome_professor AS teacher_name , 
            professor.foto_perfil_professor AS teacher_profile_photo,
            aviso_turma.data_postagem AS post_date ,
            disciplina.nome_disciplina AS discipline_name ,
            turma.id_turma AS class_id
           
            FROM aviso_turma 
            
            INNER JOIN turma_disciplina ON(aviso_turma.fk_id_turma_disciplina = turma_disciplina.id_turma_disciplina) 
            INNER JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor) 
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)
            
            WHERE turma_disciplina.fk_id_turma = :classId
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':classId', $classe->__get('classId'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna todos os avisos vinculados a um professor de uma turma
     * 
     * @return array
     */
    public function readByIdTeacher($teacher)
    {

        $query =

            "SELECT 

            id_aviso_turma AS id , 
            aviso AS warning , 
            professor.nome_professor AS teacher_name , 
            professor.foto_perfil_professor AS teacher_profile_photo,
            aviso_turma.data_postagem AS post_date ,
            disciplina.nome_disciplina AS discipline_name,
            serie.sigla AS acronym_series , 
            cedula_turma.cedula AS ballot , 
            curso.sigla AS course , 
            turno.nome_turno AS shift ,
            turma.id_turma AS class_id
           
            FROM aviso_turma 
            
            INNER JOIN turma_disciplina ON(aviso_turma.fk_id_turma_disciplina = turma_disciplina.id_turma_disciplina) 
            INNER JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor) 
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo)
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo) 
            INNER JOIN serie ON(turma.fk_id_serie = serie.id_serie) 
            INNER JOIN curso ON(turma.fk_id_curso = curso.id_curso) 
            INNER JOIN cedula_turma ON(turma.fk_id_cedula = cedula_turma.id_cedula_turma) 
            INNER JOIN turno ON(turma.fk_id_turno = turno.id_turno) 
            
            WHERE professor.id_professor = :teacherId

            AND situacao_periodo_letivo.id_situacao_periodo_letivo = 1 
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':teacherId', $teacher->__get('teacherId'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna todos os avisos vinculados a um período letivo
     * 
     * @return array
     */
    public function readAll()
    {

        return $this->speedingUp(

            "SELECT 

            id_aviso_turma AS id , 
            aviso AS warning , 
            professor.nome_professor AS teacher_name , 
            professor.foto_perfil_professor AS teacher_profile_photo,
            aviso_turma.data_postagem AS post_date ,
            disciplina.nome_disciplina AS discipline_name,
            serie.sigla AS acronym_series , 
            cedula_turma.cedula AS ballot , 
            curso.sigla AS course , 
            turno.nome_turno AS shift ,
            turma.id_turma AS class_id
           
            FROM aviso_turma 
            
            INNER JOIN turma_disciplina ON(aviso_turma.fk_id_turma_disciplina = turma_disciplina.id_turma_disciplina) 
            INNER JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor) 
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo)
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo) 
            INNER JOIN serie ON(turma.fk_id_serie = serie.id_serie) 
            INNER JOIN curso ON(turma.fk_id_curso = curso.id_curso) 
            INNER JOIN cedula_turma ON(turma.fk_id_cedula = cedula_turma.id_cedula_turma) 
            INNER JOIN turno ON(turma.fk_id_turno = turno.id_turno) 
            
            WHERE situacao_periodo_letivo.id_situacao_periodo_letivo = 1"
        );
    }


    /**
     * Atualiza os dados de um aviso
     * 
     * @return void
     */
    public function update()
    {

        $query = "UPDATE aviso_turma SET aviso = :warning WHERE aviso_turma.id_aviso_turma = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":warning", $this->__get('warning'));
        $stmt->bindValue(":id", $this->__get('classeWarningId'));

        $stmt->execute();
    }


    /**
     * Deletar um aviso
     * 
     * @return void
     */
    public function delete()
    {

        $query = "DELETE FROM aviso_turma WHERE aviso_turma.id_aviso_turma = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $this->__get('classeWarningId'));

        $stmt->execute();
    }
}
