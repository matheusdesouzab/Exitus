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
        return $this->$att = $newValue;
    }

    public function endSchoolTerm()
    {

        if ($this->__get('fk_id_school_term_situation') == 1) {
            $query = 'update periodo_letivo set fk_id_situacao_periodo_letivo = 2 where periodo_letivo.id_ano_letivo != 0';
            $stmt = $this->db->prepare($query)->execute();
        }
    }

    public function addSchoolTerm()
    {
        $this->endSchoolTerm();

        $query = "insert into periodo_letivo (ano_letivo,data_inicio,data_fim,fk_id_situacao_periodo_letivo) values (:schoolYear,:startDate,:endDate,:fk_id_school_term_situation);";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':schoolYear', $this->__get('schoolYear'));
        $stmt->bindValue(':startDate', $this->__get('startDate'));
        $stmt->bindValue(':endDate', $this->__get('endDate'));
        $stmt->bindValue(':fk_id_school_term_situation', $this->__get('fk_id_school_term_situation'));

        $stmt->execute();
    }

    public function listSchoolTermSituation()
    {

        $query = 'select situacao_periodo_letivo.id_situacao_periodo_letivo as id_situation  , situacao_periodo_letivo.situacao_periodo_letivo as situation from situacao_periodo_letivo;';

        $stmt = $this->db->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function updateSchoolTerm()
    {

        $this->endSchoolTerm();

        $query = 'update periodo_letivo set 
        data_inicio = :startDate , data_fim = :endDate , fk_id_situacao_periodo_letivo = :fk_id_school_term_situation
        where periodo_letivo.id_ano_letivo = :idSchoolYear;';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':startDate', $this->__get('startDate'));
        $stmt->bindValue(':endDate', $this->__get('endDate'));
        $stmt->bindValue(':fk_id_school_term_situation', $this->__get('fk_id_school_term_situation'));
        $stmt->bindValue(':idSchoolYear', $this->__get('idSchoolYear'));

        $stmt->execute();
    }

    public function listSchoolTerm($complement)
    {

        $query = "select periodo_letivo.id_ano_letivo as id_school_year , periodo_letivo.ano_letivo as school_year , periodo_letivo.data_inicio as start_date  , periodo_letivo.data_fim as end_date , situacao_periodo_letivo.situacao_periodo_letivo as situation_school_term , situacao_periodo_letivo.id_situacao_periodo_letivo as fk_id_situation_school_term from periodo_letivo left join situacao_periodo_letivo on(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo) $complement ;";

        $stmt = $this->db->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function deleteSchoolTerm()
    {

        $query = 'delete from periodo_letivo where id_ano_letivo = :idSchoolYear;';

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':idSchoolYear', $this->__get('idSchoolYear'));

        $stmt->execute();
    }
}
