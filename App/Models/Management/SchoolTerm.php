<?php

namespace App\Models\Management;

use MF\Model\Model;

class SchoolTerm extends Model
{

    private $schoolTermId;
    private $startDate;
    private $endDate;
    private $fk_id_school_term_situation;
    private $fk_id_school_year;


    public function __get($att)
    {
        return $this->$att;
    }


    public function __set($att, $newValue)
    {
        return $this->$att = $newValue;
    }


    public function disableActiveSchoolTerm()
    {

        if ($this->__get('fk_id_school_term_situation') == 1) {

            $query =

                "UPDATE periodo_letivo SET fk_id_situacao_periodo_letivo = CASE 

                 WHEN fk_id_situacao_periodo_letivo = 1 THEN 2

                 ELSE fk_id_situacao_periodo_letivo

                 END
                
                 WHERE id_ano_letivo != 0
                
            ";

            $stmt = $this->db->prepare($query)->execute();
        }
    }


    public function insert()
    {

        $this->disableActiveSchoolTerm();

        $query =

            "INSERT INTO periodo_letivo 

                (data_inicio, data_fim, fk_id_situacao_periodo_letivo, fk_id_ano_letivo) 

            VALUES 

                (:startDate, :endDate, :fk_id_school_term_situation, :fk_id_school_year)          
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':startDate', $this->__get('startDate'));
        $stmt->bindValue(':endDate', $this->__get('endDate'));
        $stmt->bindValue(':fk_id_school_term_situation', $this->__get('fk_id_school_term_situation'));
        $stmt->bindValue(':fk_id_school_year', $this->__get('fk_id_school_year'));

        $stmt->execute();
    }


    public function listSchoolTermStates()
    {

        return $this->speedingUp(

            "SELECT 

             situacao_periodo_letivo.id_situacao_periodo_letivo AS option_value  , 
             situacao_periodo_letivo.situacao_periodo_letivo AS option_text 

             FROM situacao_periodo_letivo"

        );
    }


    public function update()
    {

        $this->disableActiveSchoolTerm();

        $query =

            "UPDATE periodo_letivo SET 

             periodo_letivo.data_inicio = :startDate ,
             periodo_letivo.data_fim = :endDate ,
            
             periodo_letivo.fk_id_situacao_periodo_letivo = CASE

             WHEN periodo_letivo.fk_id_situacao_periodo_letivo = 1 THEN 1
            
             ELSE :fk_id_school_term_situation
            
             END
        
             WHERE periodo_letivo.id_ano_letivo = :schoolTermId
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':startDate', $this->__get('startDate'));
        $stmt->bindValue(':endDate', $this->__get('endDate'));
        $stmt->bindValue(':schoolTermId', $this->__get('schoolTermId'));
        $stmt->bindValue(':fk_id_school_term_situation', $this->__get('fk_id_school_term_situation'));


        $stmt->execute();
    }


    public function delete()
    {


        $query =

            "DELETE FROM periodo_letivo 
            
            WHERE id_ano_letivo = CASE 
            
            WHEN periodo_letivo.fk_id_situacao_periodo_letivo = 1 THEN 0 
            
            ELSE :id 
            
            END
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':id', $this->__get('schoolTermId'));

        $stmt->execute();
    }


    public function list()
    {

        return $this->speedingUp(

            "SELECT 
            
            periodo_letivo.id_ano_letivo AS school_term_id  , 
            periodo_letivo.data_inicio AS start_date , 
            periodo_letivo.data_fim AS end_date , 
            situacao_periodo_letivo.situacao_periodo_letivo AS situation_school_term , 
            situacao_periodo_letivo.id_situacao_periodo_letivo AS fk_id_situation_school_term ,
            periodo_disponivel.ano_letivo AS school_year
            
            FROM periodo_letivo 
            
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo) 
            INNER JOIN periodo_disponivel ON(periodo_letivo.fk_id_ano_letivo = periodo_disponivel.id_periodo_disponivel) 
            
            ORDER BY periodo_disponivel.ano_letivo DESC "

        );
    }


    public function listAvailableYears()
    {

        return $this->speedingUp(

            "SELECT 
            
            periodo_disponivel.id_periodo_disponivel AS option_value , 
            periodo_disponivel.ano_letivo AS option_text 
            
            FROM periodo_disponivel 
            
            LEFT JOIN periodo_letivo ON(periodo_disponivel.id_periodo_disponivel = periodo_letivo.fk_id_ano_letivo) 
            
            WHERE periodo_letivo.fk_id_ano_letivo IS NULL"

        );
    }


    public function active()
    {

        return $this->speedingUp(

            "SELECT 

             periodo_letivo.id_ano_letivo AS option_value , 
             periodo_disponivel.ano_letivo AS option_text 

             FROM periodo_letivo 
             
             INNER JOIN periodo_disponivel ON(periodo_letivo.fk_id_ano_letivo = periodo_disponivel.id_periodo_disponivel) 
             INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo) 
             
             WHERE situacao_periodo_letivo.id_situacao_periodo_letivo = 1"

        );
    }
}
