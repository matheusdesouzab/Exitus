<?php

namespace App\Models\People;

use MF\Model\Model;

abstract class People extends Model
{

    protected $id;
    protected $name;
    protected $cpf;
    protected $birthDate;
    protected $naturalness;
    protected $nationality;
    protected $profilePhoto;
    protected $fk_id_sex;
    protected $fk_id_blood_type;
    protected $fk_id_pcd;
    protected $fk_id_address;
    protected $fk_id_telephone;


    public function availableSex()
    {

        return $this->speedingUp('SELECT sexo.id_sexo as option_value , sexo.sexo as option_text FROM sexo;');
    }


    public function pcd()
    {

        return $this->speedingUp('SELECT pcd.id_pcd as option_value , pcd.pcd as option_text FROM pcd;');
    }
    

    public function bloodType()
    {

        return $this->speedingUp('SELECT tipo_sanguineo.id_tipo_sanguineo as option_value , tipo_sanguineo.tipo_sanguineo as option_text FROM tipo_sanguineo;');
    }
}
