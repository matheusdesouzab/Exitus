<?php

namespace App\Models\Admin;

use App\Models\People\People;

class Admin extends People
{

    public function login()
    {

        $query =

            "SELECT 
            
            id_administrador AS admin_id , 
            nome_administrador AS admin_name , 
            foto_perfil_administrador AS admin_photo ,
            fk_id_administrador_hierarquia_funcao AS hierarchy_function
            
            FROM administrador 
            
            WHERE codigo_acesso = :accessCode AND nome_administrador = :adminName
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':accessCode', $this->__get('accessCode'));
        $stmt->bindValue(':adminName', $this->__get('name'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}
