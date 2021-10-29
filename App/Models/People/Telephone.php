<?php

namespace App\Models\People;

use MF\Model\Model;

class Telephone extends Model
{

    private $telephoneId;
    private $telephoneNumber;


    public function __get($att)
    {
        return $this->$att;
    }


    public function __set($att, $newValue)
    {
        return $this->$att = $newValue;
    }


    /**
     * Inserir telefone
     * 
     * @return void
     */
    public function insert()
    {

        $query = "INSERT INTO telefone (numero_telefone) values (:telephoneNumber)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':telephoneNumber', $this->__get('telephoneNumber'));
        $stmt->execute();

        return $this->db->lastInsertId();
    }


    /**
     * Atualizar dados do telefone
     * 
     * @return void
     */
    public function update()
    {

        $query = "UPDATE telefone SET numero_telefone = :telephoneNumber WHERE id_telefone = :telephoneId";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':telephoneId', $this->__get('telephoneId'));
        $stmt->bindValue(':telephoneNumber', $this->__get('telephoneNumber'));

        $stmt->execute();
    }
}
