<?php

namespace App\Models\Management;

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


    public function insert()
    {

        $query =

            "INSERT INTO disciplina

            (nome_disciplina, sigla_disciplina, fk_id_modalidade_disciplina) 
            
            VALUES 
            
            (:disciplineName, :acronym, :fk_id_modality)
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':disciplineName', $this->__get('disciplineName'));
        $stmt->bindValue(':acronym', $this->__get('acronym'));
        $stmt->bindValue(':fk_id_modality', $this->__get('fk_id_modality'));

        $stmt->execute();
    }


    public function list()
    {

        return $this->speedingUp(

            "SELECT 
            
            disciplina.id_disciplina AS discipline_id , 
            disciplina.nome_disciplina AS discipline_name , 
            modalidade_disciplina.modalidade_disciplina AS discipline_modality , 
            disciplina.sigla_disciplina AS acronym 
            
            FROM disciplina 
            
            INNER JOIN modalidade_disciplina ON(disciplina.fk_id_modalidade_disciplina = modalidade_disciplina.id_modalidade_disciplina)"

        );
    }


    public function disciplineData()
    {

        $query =

            'SELECT 
            
            disciplina.id_disciplina AS discipline_id , 
            disciplina.nome_disciplina AS discipline_name , 
            modalidade_disciplina.modalidade_disciplina AS discipline_modality , 
            disciplina.fk_id_modalidade_disciplina AS modality_id , 
            disciplina.sigla_disciplina AS acronym  
            
            FROM disciplina 
            
            INNER JOIN modalidade_disciplina ON(disciplina.fk_id_modalidade_disciplina = modalidade_disciplina.id_modalidade_disciplina) 
            
            WHERE disciplina.id_disciplina = :disciplineId
            
        ';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':disciplineId', $this->__get('disciplineId'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function listDisciplineModality()
    {

        return $this->speedingUp(

            "SELECT
            
            modalidade_disciplina.id_modalidade_disciplina AS option_value , 
            modalidade_disciplina.modalidade_disciplina AS option_text 

            FROM modalidade_disciplina"

        );
    }


    public function update()
    {

        $query = 
        
            'UPDATE disciplina SET 
            
            nome_disciplina = :disciplineName , 
            sigla_disciplina = :acronym , 
            fk_id_modalidade_disciplina = :fk_id_modality 
            
            WHERE disciplina.id_disciplina = :disciplineId'
            
        ;

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':disciplineId', $this->__get('disciplineId'));
        $stmt->bindValue(':disciplineName', $this->__get('disciplineName'));
        $stmt->bindValue(':acronym', $this->__get('acronym'));
        $stmt->bindValue(':fk_id_modality', $this->__get('fk_id_modality'));

        $stmt->execute();
    }


    public function seekDiscipline()
    {

        $this->__get('fk_id_modality') == 0 ? $operation = '<>' : $operation = '=';

        $query = 
        
            "SELECT 
            
            disciplina.id_disciplina AS discipline_id , 
            disciplina.nome_disciplina AS discipline_name , 
            modalidade_disciplina.modalidade_disciplina AS discipline_modality , 
            disciplina.sigla_disciplina AS acronym 
            
            FROM disciplina 
            
            INNER JOIN modalidade_disciplina on(disciplina.fk_id_modalidade_disciplina = modalidade_disciplina.id_modalidade_disciplina) 
            
            WHERE disciplina.nome_disciplina LIKE :disciplineName 
            
            AND disciplina.fk_id_modalidade_disciplina $operation :fk_id_modality
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':disciplineName', "%" . $this->__get('disciplineName') . "%", \PDO::PARAM_STR);
        $stmt->bindValue(':fk_id_modality', $this->__get('fk_id_modality'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function delete()
    {

        $query = 'DELETE FROM disciplina WHERE disciplina.id_disciplina = :disciplineId';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':disciplineId', $this->__get('disciplineId'));

        $stmt->execute();
    }


    public function disciplineAll()
    {

        return $this->speedingUp(
            "SELECT disciplina.id_disciplina AS option_value , disciplina.nome_disciplina AS option_text FROM disciplina;"
        );
        
    }
}
