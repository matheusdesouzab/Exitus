<?php

namespace App\Models\GeneralManagement;

use MF\Model\Model;

class Unity extends Model
{

    private $unityId;


    public function __get($att)
    {
        return $this->$att;
    }


    public function __set($att, $newValue)
    {
        return $this->$att = $newValue;
    }

    /**
     * Retorna as unidades disponíveis para uso, com base na configurações definidas
     * 
     * @return void
     */
    public function readOpenUnits()
    {

        $query = "SET @controle_unidade = (SELECT configuracao.fk_id_controle_unidade FROM configuracao)";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $this->speedingUp(

            "SELECT unidade.id_unidade AS option_value , unidade.unidade AS option_text
            
            FROM unidade 
            
            WHERE 
            
            CASE 
            
            WHEN @controle_unidade = 1 THEN unidade.id_unidade = 1  
            WHEN @controle_unidade = 2 THEN unidade.id_unidade BETWEEN 1 AND 2
            ELSE unidade.id_unidade <> 0 END;"
        );
    }


    /**
     * Retorna uma única unidade pelo id
     * 
     * @return void
     */
    public function searchSpecificUniy()
    {

        $query =

            "SELECT unidade.id_unidade AS option_value , unidade.unidade AS option_text
                
            FROM unidade 
            
            WHERE 
            
            CASE WHEN :unityId = 0 THEN unidade.id_unidade <> 0 ELSE unidade.id_unidade = :unityId END
            
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':unityId', $this->__get('unityId'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}
