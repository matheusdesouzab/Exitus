<?php

namespace App\Models;

use MF\Model\Model;

class Classe extends Model
{

    protected $idClass;
    protected $fk_id_shift;
    protected $fk_id_classroom;
    protected $fk_id_course;
    protected $fk_id_school_term;
    protected $fk_id_ballot;
    protected $fk_id_series;

    public function insertClass()
    {

        $query = "INSERT INTO turma (fk_id_turno, fk_id_sala, fk_id_periodo_letivo, fk_id_cedula, fk_id_curso, fk_id_serie) 
        VALUES (:fk_id_shift, :fk_id_classroom,:fk_id_school_term, :fk_id_ballot, :fk_id_course , :fk_id_series);";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_shift', $this->__get('fk_id_shift'));
        $stmt->bindValue(':fk_id_classroom', $this->__get('fk_id_classroom'));
        $stmt->bindValue(':fk_id_course', $this->__get('fk_id_course'));
        $stmt->bindValue(':fk_id_school_term', $this->__get('fk_id_school_term'));
        $stmt->bindValue(':fk_id_ballot', $this->__get('fk_id_ballot'));
        $stmt->bindValue(':fk_id_series', $this->__get('fk_id_series'));

        $stmt->execute();
    }

    public function updateClass()
    {
        $query = 'UPDATE turma SET fk_id_turno = :fk_id_shift , fk_id_sala = :fk_id_classroom , fk_id_curso = :fk_id_course , fk_id_periodo_letivo = :fk_id_school_term , fk_id_cedula = :fk_id_ballot , fk_id_serie = :fk_id_series WHERE id_turma = :idClass;';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_shift', $this->__get('fk_id_shift'));
        $stmt->bindValue(':fk_id_classroom', $this->__get('fk_id_classroom'));
        $stmt->bindValue(':fk_id_course', $this->__get('fk_id_course'));
        $stmt->bindValue(':fk_id_school_term', $this->__get('fk_id_school_term'));
        $stmt->bindValue(':fk_id_ballot', $this->__get('fk_id_ballot'));
        $stmt->bindValue(':fk_id_series', $this->__get('fk_id_series'));
        $stmt->bindValue(':idClass', $this->__get('idClass'));

        $stmt->execute();
    }

    public function availableShift()
    {

        return $this->speedingUp(
            "SELECT turno.id_turno AS option_value , turno.nome_turno AS option_text FROM turno;"
        );
    }

    public function availableBallot()
    {

        return $this->speedingUp(
            "SELECT cedula_turma.id_cedula_turma AS option_value , cedula_turma.cedula AS option_text FROM cedula_turma;"
        );
    }

    public function availableSeries()
    {

        return $this->speedingUp(
            "SELECT serie.id_serie AS option_value , serie.sigla AS option_text FROM serie;"
        );
    }

    public function checkClass()
    {
        $stmt = $this->db->prepare("SELECT * FROM turma WHERE turma.fk_id_sala = :fk_id_classroom and turma.fk_id_turno = :fk_id_shift;");
        $stmt->bindValue(':fk_id_classroom',$this->__get('fk_id_classroom'));
        $stmt->bindValue(':fk_id_shift',$this->__get('fk_id_shift'));
        $stmt->execute();

        $stmt2 = $this->db->prepare("SELECT * FROM turma WHERE turma.fk_id_serie = :fk_id_series and turma.fk_id_cedula = :fk_id_ballot;");
        $stmt2->bindValue(':fk_id_series',$this->__get('fk_id_series'));
        $stmt2->bindValue(':fk_id_ballot',$this->__get('fk_id_ballot'));
        $stmt2->execute();      

        return $situation = [
            [count($stmt->fetchAll(\PDO::FETCH_ASSOC))],
            [count($stmt2->fetchAll(\PDO::FETCH_ASSOC))]
        ];

    }
}
