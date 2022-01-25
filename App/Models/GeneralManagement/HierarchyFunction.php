<?php

namespace App\Models\GeneralManagement;

use MF\Model\Model;

class HierarchyFunction extends Model
{

    /**
     * Esse método retorna os estados que uma conta de administrador pode ser configurada. Entretanto, ele deve ser usado para peencher a tag select na View.
     * 
     * @return array
     */
    public function listStateAdmin()
    {

        return $this->speedingUp(

            "SELECT 
            
            id_hierarquia_funcao AS option_value , 
            hierarquia_funcao AS option_text 
            
            FROM hierarquia_funcao 
            
            WHERE id_hierarquia_funcao BETWEEN 1 AND 2"

        );
    }
}
