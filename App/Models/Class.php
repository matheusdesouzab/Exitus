<?php

namespace App\Models;

use MF\Model\Model;

class Classes extends Model{

    protected $idClass;
    protected $fk_id_shift;
    protected $fk_id_classromm;
    protected $fk_id_course;
    protected $fk_id_school_term;
    protected $fk_id_ballot;

    public function insertClass()
    {
        $query = "insert turma (fk_id_turno, fk_id_sala, fk_id_periodo_letivo, fk_id_cedula, fk_id_curso) values (:fk_id_shift, :fk_id_classroom,:fk_id_school_term, :fk_id_ballot)";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_shift', $this->__get('fk_id_shift'));
        $stmt->bindValue(':fk_id_classroom', $this->__get('fk_id_classroom'));
        $stmt->bindValue(':fk_id_course', $this->__get('fk_id_course'));
        $stmt->bindValue(':fk_id_school_term', $this->__get('fk_id_school_term'));
        $stmt->bindValue(':fk_id_ballot', $this->__get('fk_id_ballot'));

        $stmt->execute();

    }

    public function updateClass()
    {
        $query = 'update turma set fk_id_turno = :fk_id_shift , fk_id_sala = :fk_id_classroom , fk_id_curso = :fk_id_course , fk_id_periodo_letivo = :fk_id_school_term , fk_id_cedula = :fk_id_ballot where id_turma = :idClass;';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_shift', $this->__get('fk_id_shift'));
        $stmt->bindValue(':fk_id_classroom', $this->__get('fk_id_classroom'));
        $stmt->bindValue(':fk_id_course', $this->__get('fk_id_course'));
        $stmt->bindValue(':fk_id_school_term', $this->__get('fk_id_school_term'));
        $stmt->bindValue(':fk_id_ballot', $this->__get('fk_id_ballot'));
        $stmt->bindValue(':idClass', $this->__get('idClass'));

        $stmt->execute();

    }

    

}


?>