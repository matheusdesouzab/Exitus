<?php

namespace App\Models\People;

use MF\Model\Model;

class Address extends Model
{

    private $idAddress;
    private $zipCode;
    private $district;
    private $address;
    private $uf;
    private $county;


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

        $query = "INSERT INTO endereco (cep,bairro,endereco,uf,municipio) VALUES (:zipCode,:district,:addresss,:uf,:county);";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':zipCode', $this->__get('zipCode'));
        $stmt->bindValue(':district', $this->__get('district'));
        $stmt->bindValue(':addresss', $this->__get('address'));
        $stmt->bindValue(':uf', $this->__get('uf'));
        $stmt->bindValue(':county', $this->__get('county'));

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
