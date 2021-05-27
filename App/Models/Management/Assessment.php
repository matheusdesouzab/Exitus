<?php

namespace App\Models\Management;

use MF\Model\Model;

class Assessment extends Model
{

   
    private $assessmentId;
    private $evaluationDescription;
    private $evaluationValue;
    private $realizedDate;
    private $fk_id_assessment_unity;
    private $fk_id_class;



    public function __get($att)
    {
        return $this->$att;
    }


    public function __set($att, $newValue)
    {
        return $this->$att = $newValue;
    }

}

?>