<?php

namespace App\Models\GeneralManagement;

use MF\Model\Model;

class Discipline extends Model
{

    private $disciplineId;
    private $disciplineName;
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
     * Criar disciplina
     * 
     * @return void
     */
    public function insert()
    {

        $query =

            "INSERT INTO disciplina

                (nome_disciplina, sigla_disciplina, fk_id_modalidade_disciplina) 
            
            VALUES 
            
                (:disciplineName, :acronym, :fk_id_modality)
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":disciplineName", $this->__get("disciplineName"));
        $stmt->bindValue(":acronym", $this->__get("acronym"));
        $stmt->bindValue(":fk_id_modality", $this->__get("fk_id_modality"));

        $stmt->execute();
    }


    /**
     * Retorna todas as disciplinas
     * 
     * @return array
     */
    public function readAll()
    {

        return $this->speedingUp(

            "SELECT 
            
            disciplina.id_disciplina AS discipline_id , 
            disciplina.nome_disciplina AS discipline_name , 
            modalidade_disciplina.modalidade_disciplina AS discipline_modality , 
            disciplina.sigla_disciplina AS acronym ,
            modalidade_disciplina.id_modalidade_disciplina AS modality_id
            
            FROM disciplina 
            
            INNER JOIN modalidade_disciplina ON(disciplina.fk_id_modalidade_disciplina = modalidade_disciplina.id_modalidade_disciplina)

            ORDER BY disciplina.nome_disciplina ASC"

        );
    }


    /**
     * Retorna os dados gerais de uma disciplina
     * 
     * @return array
     */
    public function dataGeneral()
    {

        $query =

            "SELECT 
            
            disciplina.id_disciplina AS discipline_id , 
            disciplina.nome_disciplina AS discipline_name , 
            modalidade_disciplina.modalidade_disciplina AS discipline_modality , 
            disciplina.sigla_disciplina AS acronym ,
            modalidade_disciplina.id_modalidade_disciplina AS modality_id
            
            FROM disciplina 
            
            INNER JOIN modalidade_disciplina ON(disciplina.fk_id_modalidade_disciplina = modalidade_disciplina.id_modalidade_disciplina)

            WHERE disciplina.id_disciplina = :disciplineId 
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":disciplineId", $this->__get("disciplineId"));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Esse método retorna todos as modalidades que uma disciplina pode ter. Entretanto, ele deve ser usado para peencher a tag select na View.
     * 
     * @return array
     */
    public function disciplineModality()
    {

        return $this->speedingUp(

            "SELECT
            
            modalidade_disciplina.id_modalidade_disciplina AS option_value , 
            modalidade_disciplina.modalidade_disciplina AS option_text 

            FROM modalidade_disciplina"

        );
    }


    /**
     * Atualizar dados de uma disciplina
     * 
     * @return void
     */
    public function update()
    {

        $query =

            "UPDATE disciplina SET 
            
            nome_disciplina = :disciplineName , 
            sigla_disciplina = :acronym , 
            fk_id_modalidade_disciplina = :fk_id_modality 
            
            WHERE disciplina.id_disciplina = :disciplineId
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":disciplineId", $this->__get("disciplineId"));
        $stmt->bindValue(":disciplineName", $this->__get("disciplineName"));
        $stmt->bindValue(":acronym", $this->__get("acronym"));
        $stmt->bindValue(":fk_id_modality", $this->__get("fk_id_modality"));

        $stmt->execute();
    }


    /**
     * Buscar disciplina
     * 
     * @return array
     */
    public function seek()
    {

        $query =

            "SELECT 
            
            disciplina.id_disciplina AS discipline_id , 
            disciplina.nome_disciplina AS discipline_name , 
            modalidade_disciplina.modalidade_disciplina AS discipline_modality , 
            disciplina.sigla_disciplina AS acronym 
            
            FROM disciplina 
            
            INNER JOIN modalidade_disciplina on(disciplina.fk_id_modalidade_disciplina = modalidade_disciplina.id_modalidade_disciplina) 
            
            WHERE disciplina.nome_disciplina LIKE :disciplineName 
            
            AND

            CASE WHEN :fk_id_modality = 0 THEN disciplina.fk_id_modalidade_disciplina <> :fk_id_modality ELSE disciplina.fk_id_modalidade_disciplina = :fk_id_modality END
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":disciplineName", "%" . $this->__get("disciplineName") . "%", \PDO::PARAM_STR);
        $stmt->bindValue(":fk_id_modality", $this->__get("fk_id_modality"));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Deletar disciplina
     * 
     * @return void
     */
    public function delete()
    {

        $query = "DELETE FROM disciplina WHERE disciplina.id_disciplina = :disciplineId";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":disciplineId", $this->__get("disciplineId"));
        $stmt->execute();
    }
}
