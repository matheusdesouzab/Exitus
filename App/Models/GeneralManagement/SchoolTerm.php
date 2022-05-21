<?php

namespace App\Models\GeneralManagement;

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


    /**
     * Esse método deve ser chamado antes do insert e update.
     * 
     * É permitido somente a existência de um único período letivo ativo e agendado.
     * Desse modo, essa função finaliza o período letivo anterior, que se encrontrava ativo ou agendado, para que não exista redundância.
     * 
     * PL - Período letivo
     * 
     * @return void
     */
    public function disableActiveScheduledPeriod()
    {

        $schoolTermSituation = $this->__get('fk_id_school_term_situation'); # Variável com nome mais curto

        if ($schoolTermSituation == 1 || $schoolTermSituation == 3) { # Caso a situacao do PL seja 1-Ativo ou 3-Agendado, a função prosseguirá.

            $state = ($schoolTermSituation == 1 ? 1 : 3);

            $query =

                "UPDATE periodo_letivo 
                
                SET fk_id_situacao_periodo_letivo = 2 
                
                WHERE fk_id_situacao_periodo_letivo = $state
            
            ";

            $this->db->prepare($query)->execute();
        }
    }


    /**
     * Criar um período letivo 
     * 
     * @return void
     */
    public function insert()
    {
        
        $this->disableActiveScheduledPeriod();

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


    /**
     * Atualizar dados do período letivo
     * 
     * @return void
     */
    public function update()
    {

        $this->disableActiveScheduledPeriod();

        $query =

            "UPDATE periodo_letivo SET

             periodo_letivo.data_inicio = :startDate ,
             periodo_letivo.data_fim = :endDate ,
            
             periodo_letivo.fk_id_situacao_periodo_letivo = CASE

             WHEN periodo_letivo.fk_id_situacao_periodo_letivo = 1 THEN 1
             WHEN periodo_letivo.fk_id_situacao_periodo_letivo = 3 THEN 3
            
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


    /**
     * Retorna todos os estados de um período letivo
     * 
     * @return array
     */
    public function schoolTermStates()
    {

        return $this->speedingUp(

            "SELECT 

             situacao_periodo_letivo.id_situacao_periodo_letivo AS option_value , 
             situacao_periodo_letivo.situacao_periodo_letivo AS option_text 

             FROM situacao_periodo_letivo"

        );
    }


    /**
     * Deletar período letivo 
     * 
     * @return void
     */
    /* public function delete()
    {

        $query =

            "DELETE FROM periodo_letivo 
            
            WHERE id_ano_letivo = CASE 
            
            WHEN periodo_letivo.fk_id_situacao_periodo_letivo = 1 THEN 0 
            WHEN periodo_letivo.fk_id_situacao_periodo_letivo = 3 THEN 0 
            
            ELSE :id 
            
            END
        
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('schoolTermId'));
        $stmt->execute();
    } */


    /**
     * Retorna todos os períodos letivos
     * 
     * @return array
     */
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
            
            ORDER BY periodo_disponivel.ano_letivo DESC"

        );
    }


    /**
     * Retorna os anos letivos que ainda não foram vinculados a um período letivo 
     * 
     * @return array
     */
    public function availableYears()
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


    /**
     * Retorna o período letivo ativo e o agendado
     * 
     * @return array
     */
    public function activeScheduledSchoolTerm()
    {

        return $this->speedingUp(

            "SELECT 

             periodo_letivo.id_ano_letivo AS option_value , 
             periodo_disponivel.ano_letivo AS option_text ,
             situacao_periodo_letivo.situacao_periodo_letivo AS situation

             FROM periodo_letivo 
             
             INNER JOIN periodo_disponivel ON(periodo_letivo.fk_id_ano_letivo = periodo_disponivel.id_periodo_disponivel) 
             INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo) 
             
             WHERE situacao_periodo_letivo.id_situacao_periodo_letivo = 1 OR situacao_periodo_letivo.id_situacao_periodo_letivo = 3

             ORDER BY situacao_periodo_letivo.id_situacao_periodo_letivo ASC"

        );
    }


    public function allSchoolTerm()
    {

        return $this->speedingUp(

            "SELECT 

             periodo_letivo.id_ano_letivo AS option_value , 
             periodo_disponivel.ano_letivo AS option_text ,
             situacao_periodo_letivo.situacao_periodo_letivo AS situation

             FROM periodo_letivo 
             
             INNER JOIN periodo_disponivel ON(periodo_letivo.fk_id_ano_letivo = periodo_disponivel.id_periodo_disponivel) 
             INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo) 

             ORDER BY situacao_periodo_letivo.id_situacao_periodo_letivo ASC"

        );
    }


    /**
     * Retorna somente o período letivo ativo
     * 
     * @return array
     */
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
