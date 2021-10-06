<?php

namespace App\Models\GeneralManagement;

use MF\Model\Model;

class Ballot extends Model
{
    /**
     * Esse método retorna todas as cédulas de turma. Entretanto, ele deve ser usado para peencher a tag select na View.
     * 
     * @return array
     */
    public function listForSelect()
    {

        return $this->speedingUp(
            "SELECT cedula_turma.id_cedula_turma AS option_value , cedula_turma.cedula AS option_text FROM cedula_turma"
        );
    }
}
