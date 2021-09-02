<?php

namespace App\Models\Student;

use MF\Model\Model;

class StudentRematrug extends Model
{

    private $fk_id_rematrug_situation;
    private $fk_id_enrollment;


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

        $query = "INSERT INTO rematricula(fk_id_rematricula_aluno, fk_id_situacao_rematricula) VALUES (:enrollmentId, :rematrugSituation)";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':enrollmentId', $this->__get('fk_id_enrollment'));
        $stmt->bindValue(':rematrugSituation', $this->__get('fk_id_rematrug_situation'));

        $stmt->execute();
    }

    public function rematrugSituation()
    {

        return $this->speedingUp("SELECT situacao_rematricula.id_situacao_rematricula AS option_value , situacao_rematricula.situacao AS option_text FROM situacao_rematricula");
    }


    public function checkForRegistration()
    {

        $query = "SELECT rematricula.id_rematricula FROM rematricula WHERE rematricula.fk_id_rematricula_aluno = :enrollmentId;";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':enrollmentId', $this->__get('fk_id_enrollment'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

}
