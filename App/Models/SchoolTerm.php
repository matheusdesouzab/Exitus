<?php

namespace App\Models;

use MF\Model\Model;

class SchoolTerm extends Model
{

    protected $idSchoolTerm;
    protected $startDate;
    protected $endDate;
    protected $fk_id_school_term_situation;
    protected $fk_id_school_year;

    public function endSchoolTerm()
    {

        if ($this->__get('fk_id_school_term_situation') == 1) {
            $query = 'UPDATE periodo_letivo SET fk_id_situacao_periodo_letivo = 2 WHERE periodo_letivo.id_ano_letivo != 0';
            $stmt = $this->db->prepare($query)->execute();
        }
    }

    public function insertSchoolTerm()
    {
        $this->endSchoolTerm();

        $query = "INSERT INTO periodo_letivo (data_inicio,data_fim,fk_id_situacao_periodo_letivo,fk_id_ano_letivo) VALUES (:startDate,:endDate,:fk_id_school_term_situation,:fk_id_school_year)";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':startDate', $this->__get('startDate'));
        $stmt->bindValue(':endDate', $this->__get('endDate'));
        $stmt->bindValue(':fk_id_school_term_situation', $this->__get('fk_id_school_term_situation'));
        $stmt->bindValue(':fk_id_school_year', $this->__get('fk_id_school_year'));

        $stmt->execute();
    }

    public function listSchoolTermSituation()
    {

        return $this->speedingUp(
            "SELECT situacao_periodo_letivo.id_situacao_periodo_letivo AS option_value  , situacao_periodo_letivo.situacao_periodo_letivo AS option_text FROM situacao_periodo_letivo"
        );
    }

    public function updateSchoolTerm()
    {

        $this->endSchoolTerm();

        $query = 'UPDATE periodo_letivo SET 
        data_inicio = :startDate , data_fim = :endDate , fk_id_situacao_periodo_letivo = :fk_id_school_term_situation
        WHERE periodo_letivo.id_ano_letivo = :idSchoolTerm;';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':startDate', $this->__get('startDate'));
        $stmt->bindValue(':endDate', $this->__get('endDate'));
        $stmt->bindValue(':fk_id_school_term_situation', $this->__get('fk_id_school_term_situation'));
        $stmt->bindValue(':idSchoolTerm', $this->__get('idSchoolTerm'));


        $stmt->execute();
    }

    public function listSchoolTerm()
    {

        return $this->speedingUp(
            "SELECT periodo_letivo.id_ano_letivo AS id_school_term  , periodo_letivo.data_inicio AS start_date  , periodo_letivo.data_fim AS end_date , situacao_periodo_letivo.situacao_periodo_letivo AS situation_school_term , situacao_periodo_letivo.id_situacao_periodo_letivo AS fk_id_situation_school_term , periodo_disponivel.ano_letivo FROM periodo_letivo LEFT JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo) LEFT JOIN periodo_disponivel ON(periodo_letivo.fk_id_ano_letivo = periodo_disponivel.id_periodo_disponivel) ORDER BY periodo_disponivel.ano_letivo DESC ;"
        );
    }

    public function availableSchoolTerm()
    {

        return $this->speedingUp(
            "SELECT periodo_disponivel.id_periodo_disponivel AS option_value , periodo_disponivel.ano_letivo AS option_text FROM periodo_disponivel LEFT JOIN periodo_letivo ON(periodo_disponivel.id_periodo_disponivel = periodo_letivo.fk_id_ano_letivo) WHERE periodo_letivo.fk_id_ano_letivo IS NULL;"
        );
    }

    public function activeSchoolTerm()
    {

        return $this->speedingUp(
            "SELECT periodo_letivo.id_ano_letivo AS option_value , periodo_disponivel.ano_letivo AS option_text FROM periodo_letivo LEFT JOIN periodo_disponivel ON(periodo_letivo.fk_id_ano_letivo = periodo_disponivel.id_periodo_disponivel) LEFT JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo) WHERE situacao_periodo_letivo.id_situacao_periodo_letivo = 1"
        );
    }

    public function deleteSchoolTerm()
    {

        $query = 'DELETE FROM periodo_letivo WHERE id_ano_letivo = :idSchoolTerm;';

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':idSchoolTerm', $this->__get('idSchoolTerm'));

        $stmt->execute();
    }
}
