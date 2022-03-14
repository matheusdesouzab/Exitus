<?php

namespace App\Models\GeneralManagement;

use MF\Model\Model;

class Course extends Model
{

    private $courseId;
    private $courseName;
    private $acronym;
    private $fk_id_modality;


    public function __get($att)
    {
        return $this->$att;
    }


    public function __set($att, $newValue)
    {
        return $this->$att = $newValue;
    }


    /**
     * Criar curso
     * 
     * @return void
     */
    public function insert()
    {

        $query = "INSERT INTO curso(nome_curso, sigla , fk_id_modalidade_curso) VALUES (:courseName, :acronym, :fk_id_modality)";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":courseName", $this->__get("courseName"));
        $stmt->bindValue(":acronym", $this->__get("acronym"));
        $stmt->bindValue(":fk_id_modality", $this->__get("fk_id_modality"));

        $stmt->execute();
    }


    /**
     * Retorna todos os cursos
     * 
     * @return array
     */
    public function list()
    {

        return $this->speedingUp(

            "SELECT 
            
            curso.id_curso AS course_id , 
            curso.nome_curso AS course_name , 
            curso.sigla AS acronym ,
            modalidade_curso.id_modalidade_curso AS course_mode_id ,
            modalidade_curso.modalidade_curso AS course_mode 
            
            FROM curso

            INNER JOIN modalidade_curso ON(curso.fk_id_modalidade_curso = modalidade_curso.id_modalidade_curso)"

        );
    }


    /**
     * Deletar curso
     * 
     * @return void
     */
   /*  public function delete()
    {

        $query = "DELETE FROM curso WHERE curso.id_curso = :courseId";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":courseId", $this->__get("courseId"));
        $stmt->execute();
    }
 */

    /**
     * Atualizar dados do curso
     * 
     * @return void
     */
    public function update()
    {

        $query =

            "UPDATE curso SET 
            
            nome_curso = :courseName , 
            sigla = :acronym , 
            fk_id_modalidade_curso = :fk_id_modality 
            
            WHERE curso.id_curso = :courseId
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":courseName", $this->__get("courseName"));
        $stmt->bindValue(":acronym", $this->__get("acronym"));
        $stmt->bindValue(":courseId", $this->__get("courseId"));
        $stmt->bindValue(":fk_id_modality", $this->__get("fk_id_modality"));

        $stmt->execute();
    }


    /**
     * Esse método retorna todos os cursos. Entretanto, ele deve ser usado para peencher a tag select na View.
     * 
     * @return array
     */
    public function listForSelect()
    {

        return $this->speedingUp(
            "SELECT curso.id_curso AS option_value , curso.nome_curso AS option_text FROM curso"
        );
    }


    /**
     * Retorna o total de alunos por curso
     * 
     * @return array
     */
    public function totalStudentsCourse()
    {

        return $this->speedingUp(

            "SELECT curso.sigla AS course_name,

            (SELECT COUNT(matricula.id_matricula)
            
            FROM matricula 

            INNER JOIN turma ON(matricula.fk_id_turma_matricula = turma.id_turma) 
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo)
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo) 
            
            WHERE turma.fk_id_curso = curso.id_curso AND situacao_periodo_letivo.id_situacao_periodo_letivo = 1) AS total_studens_course

            FROM curso"

        );
    }


    /**
     * Retorna as modalidades do curso, que pode ser técnica ou o ensino médio normal. Entretanto, ela deve ser usado para peencher a tag select na View.
     * 
     * @return array
     */
    public function courseMode()
    {

        return $this->speedingUp(
            "SELECT id_modalidade_curso AS option_value , modalidade_curso AS option_text FROM modalidade_curso"
        );
    }
}
