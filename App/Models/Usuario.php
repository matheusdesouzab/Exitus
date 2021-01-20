<?php

namespace App\Models;

use MF\Model\Model;

class Usuario extends Model {

    private $email;
    private $senha;

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$novoValor){
        return $this->$atributo = $novoValor;
    }

    public function autenticar(){
        $query = "select id_usuario , nome_usuario, email_usuario, senha_usuario from tb_usuarios where email_usuario = :email and senha_usuario = :senha;";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email',$this->__get('email'));
        $stmt->bindValue(':senha',$this->__get('senha'));
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }




}