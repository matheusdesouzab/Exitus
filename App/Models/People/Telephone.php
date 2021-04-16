<?php

namespace App\Models\People;

use MF\Model\Model;

class Telephone extends Model

{

    protected $idTelephone;
    protected $telephoneNumber;


    public function insert()
    {

        $query = "INSERT INTO telefone (numero_telefone) values (:telephoneNumber);";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':telephoneNumber', $this->__get('telephoneNumber'));
        $stmt->execute();

        return $this->db->lastInsertId();
    }
    

    public function delete()
    {
        //
    }


    public function list()
    {
        //
    }


    public function update()
    {
        //
    }
}
