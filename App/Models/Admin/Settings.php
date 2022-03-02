<?php

namespace App\Models\Admin;

use MF\Model\Model;

class Settings extends Model
{

    private $fk_id_control_unity;
    private $fk_id_control_rematrug;


    public function __get($att)
    {
        return $this->$att;
    }


    public function __set($att, $newValue)
    {
        return $this->$att = $newValue;
    }


    /**
     * Atualiza as configurações gerais do sistema
     * 
     * @return void
     */
    public function update()
    {

        $query =

            "UPDATE configuracao SET 
            
            fk_id_controle_unidade = :fk_id_control_unity , 
            fk_id_controle_rematricula = :fk_id_control_rematrug 
            
            WHERE id_configuracao = 1
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_control_unity', $this->__get('fk_id_control_unity'));
        $stmt->bindValue(':fk_id_control_rematrug', $this->__get('fk_id_control_rematrug'));

        $stmt->execute();
    }


    /**
     * Esse método retorna as opções de controle da unidade. Entretanto, ele deve ser usado para peencher a tag select na View.
     * 
     * @return array
     */
    public function unitControlList()
    {

        return $this->speedingUp(
            "SELECT id_controle_unidade AS option_value , situacao AS option_text FROM controle_unidade"
        );
    }


    /**
     * Retorna o estado atual da configuração de controle da unidade
     * 
     * @return array
     */
    public function unitControlCurrent()
    {

        return $this->speedingUp(

            "SELECT 
            
            id_controle_unidade AS option_value , 
            situacao AS option_text 
            
            FROM configuracao 
            
            INNER JOIN controle_unidade ON(configuracao.fk_id_controle_unidade = controle_unidade.id_controle_unidade)"

        );
    }


    /**
     * Retorna o estado atual da configuração de controle da rematrícula
     * 
     * @return array
     */
    public function currentStatusRematrium()
    {

        return $this->speedingUp(

            "SELECT 
            
            controle_rematricula.situacao AS option_text , 
            configuracao.fk_id_controle_rematricula AS option_value 
            
            FROM configuracao 
            
            INNER JOIN controle_rematricula ON(configuracao.fk_id_controle_rematricula = controle_rematricula.id_situacao_abertura_rematricula)"

        );
    }


    /**
     * Esse método retorna as opções de controle da rematrícula. Entretanto, ele deve ser usado para peencher a tag select na View.
     * 
     * @return array
     */
    public function registrationControlOptions()
    {

        return $this->speedingUp(

            "SELECT 
            
            controle_rematricula.id_situacao_abertura_rematricula AS option_value , 
            controle_rematricula.situacao AS option_text 
            
            FROM controle_rematricula"

        );
    }
}
