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


    public function update()
    {

        $query = "UPDATE configuracao SET fk_id_controle_unidade = :fk_id_control_unity , fk_id_controle_rematricula = :fk_id_control_rematrug WHERE id_configuracao = 2";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_control_unity', $this->__get('fk_id_control_unity'));
        $stmt->bindValue(':fk_id_control_rematrug', $this->__get('fk_id_control_rematrug'));

        $stmt->execute();
    }


    public function unitControlList()
    {

        return $this->speedingUp("SELECT id_controle_unidade AS option_value , situacao AS option_text FROM controle_unidade");
    }


    public function unitControlCurrent()
    {

        return $this->speedingUp("SELECT id_controle_unidade AS option_value , situacao AS option_text FROM configuracao LEFT JOIN controle_unidade ON(configuracao.fk_id_controle_unidade = controle_unidade.id_controle_unidade)");
    }


    public function currentStatusRematrium()
    {

        return $this->speedingUp("SELECT controle_rematricula.situacao AS option_text , configuracao.fk_id_controle_rematricula AS option_value FROM configuracao LEFT JOIN controle_rematricula ON(configuracao.fk_id_controle_rematricula = controle_rematricula.id_situacao_abertura_rematricula)");
    }


    public function registrationControlOptions()
    {

        return $this->speedingUp("SELECT controle_rematricula.id_situacao_abertura_rematricula AS option_value , controle_rematricula.situacao AS option_text FROM controle_rematricula;");

    }
}
