<?php

namespace App\Models\People;

use MF\Model\Model;

class Telephone extends Model

{

    private $idTelephone;
    private $telephoneNumber;


    public function __get($att)
	{
		return $this->$att;
	}


	public function __set($att, $newValue)
	{
		return $this->$att = $newValue;
	}


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
