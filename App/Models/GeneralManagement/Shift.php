<?php

namespace App\Models\GeneralManagement;

use MF\Model\Model;

class Shift extends Model
{

    /**
     * Esse método retorna todos os turnos. Entretanto, ele deve ser usado para peencher a tag select na View.
     * 
     * @return array
     */
    public function listForSelect()
    {
        
        return $this->speedingUp(
            "SELECT turno.id_turno AS option_value , turno.nome_turno AS option_text FROM turno"
        );
    }
}
