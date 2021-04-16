<?php

namespace App\Models\People;

use MF\Model\Model;

class Address extends Model
{

    protected $idAddress;
    protected $zipCode;
    protected $district;
    protected $address;
    protected $uf;
    protected $county;


    public function insert()
    {

        $query = "INSERT INTO endereco (cep,bairro,endereco,uf,municipio) VALUES (1,2,3,4,5);";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(1, $this->__get('zipCode'));
        $stmt->bindValue(2, $this->__get('district'));
        $stmt->bindValue(3, $this->__get('address'));
        $stmt->bindValue(4, $this->__get('uf'));
        $stmt->bindValue(5, $this->__get('county'));

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
