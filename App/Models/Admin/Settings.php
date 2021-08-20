<?php

namespace App\Models\Admin;

use MF\Model\Model;

class Settings extends Model
{

    private $fk_id_control_unity;


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

        $query = "UPDATE configuracao SET fk_id_controle_unidade = :fk_id_control_unity WHERE id_configuracao = 1";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_control_unity', $this->__get('fk_id_control_unity'));

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
}
