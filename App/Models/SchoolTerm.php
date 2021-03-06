<?php

namespace App\Models;

use MF\Model\Model;

class SchoolTerm extends Model
{

    private $idSchoolYear;
    private $schoolYear;
    private $startDate;
    private $endDate;
    private $fk_id_school_term_situation;

    public function __get($att)
    {
        return $this->$att;
    }

    public function __set($att, $newValue)
    {
        return $att = $newValue;
    }

    public function addSchoolTerm()
    {

        $query = 'insert into periodo_letivo (ano_letivo,data_inicio,data_fim,fk_id_situacao_periodo_letivo) 
        values (:schoolYear,:startDate,:endDate,:fk_id_school_term_situation);';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':schoolYear', $this->__get('schoolYear'));
        $stmt->bindValue(':startDate', $this->__get('startDate'));
        $stmt->bindValue(':endDate', $this->__get('endDate'));
        $stmt->bindValue(':fk_id_school_term_situation', $this->__get('fk_id_school_term_situation'));

        $stmt->execute();
    }

    public function updateSchoolTerm()
    {

        $query = 'update periodo_letivo set 
        ano_letivo = :schoolYear , data_inicio = :startDate , data_fim = :endDate , fk_id_situacao_periodo_letivo = fk_id_school_term_situation;
        where id_ano_letivo = :idSchoolYear;';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':schoolYear', $this->__get('schoolYear'));
        $stmt->bindValue(':startDate', $this->__get('startDate'));
        $stmt->bindValue(':endDate', $this->__get('endDate'));
        $stmt->bindValue(':fk_id_school_term_situation', $this->__get('fk_id_school_term_situation'));
        $stmt->bindValue(':idSchoolYear', $this->__get('idSchoolYear'));

        $stmt->execute();
    }

    public function listSchoolTerm()
    {

        $query = 'select periodo_letivo.ano_letivo , periodo_letivo.data_inicio , periodo_letivo.data_fim , situacao_periodo_letivo.situacao_periodo_letivo from periodo_letivo left join situacao_periodo_letivo on(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.situacao_periodo_letivo);';

        $stmt = $this->db->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function deleteSchoolTerm()
    {

        $query = 'delete from periodo_letivo where id_ano_letivo = :idSchoolYear;';

        $stmt = $this->db->prepare($query);

        $stmt->execute();
    }
}
