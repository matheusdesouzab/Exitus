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
            $query = 'update periodo_letivo set fk_id_situacao_periodo_letivo = 2 where periodo_letivo.id_ano_letivo != 0';
            $stmt = $this->db->prepare($query)->execute();
        }
    }

    public function insertSchoolTerm()
    {
        $this->endSchoolTerm();

        $query = "insert into periodo_letivo (data_inicio,data_fim,fk_id_situacao_periodo_letivo,fk_id_ano_letivo) values (:startDate,:endDate,:fk_id_school_term_situation,:fk_id_school_year)";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':startDate', $this->__get('startDate'));
        $stmt->bindValue(':endDate', $this->__get('endDate'));
        $stmt->bindValue(':fk_id_school_term_situation', $this->__get('fk_id_school_term_situation'));
        $stmt->bindValue(':fk_id_school_year', $this->__get('fk_id_school_year'));


        $stmt->execute(); 
    }

    public function listSchoolTermSituation()
    {

        $query = 'select situacao_periodo_letivo.id_situacao_periodo_letivo as option_value  , situacao_periodo_letivo.situacao_periodo_letivo as option_text from situacao_periodo_letivo;';

        return $this->speedingUp($query);
    }

    public function updateSchoolTerm()
    {

        $this->endSchoolTerm();

        $query = 'update periodo_letivo set 
        data_inicio = :startDate , data_fim = :endDate , fk_id_situacao_periodo_letivo = :fk_id_school_term_situation
        where periodo_letivo.id_ano_letivo = :idSchoolTerm;';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':startDate', $this->__get('startDate'));
        $stmt->bindValue(':endDate', $this->__get('endDate'));
        $stmt->bindValue(':fk_id_school_term_situation', $this->__get('fk_id_school_term_situation'));
        $stmt->bindValue(':idSchoolTerm', $this->__get('idSchoolTerm'));
        

        $stmt->execute();
    }

    public function listSchoolTerm()
    {

        $query = "select periodo_letivo.id_ano_letivo as id_school_term  , periodo_letivo.data_inicio as start_date  , periodo_letivo.data_fim as end_date , situacao_periodo_letivo.situacao_periodo_letivo as situation_school_term , situacao_periodo_letivo.id_situacao_periodo_letivo as fk_id_situation_school_term , periodo_disponivel.ano_letivo from periodo_letivo left join situacao_periodo_letivo on(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo) left join periodo_disponivel on(periodo_letivo.fk_id_ano_letivo = periodo_disponivel.id_periodo_disponivel) order by periodo_disponivel.ano_letivo desc ;";

        return $this->speedingUp($query);
    }

    public function availableSchoolTerm()
    {

        $query = 'select periodo_disponivel.id_periodo_disponivel as option_value , periodo_disponivel.ano_letivo as option_text from periodo_disponivel left join periodo_letivo on(periodo_disponivel.id_periodo_disponivel = periodo_letivo.fk_id_ano_letivo) where periodo_letivo.fk_id_ano_letivo is null';

        return $this->speedingUp($query);
    }

    public function deleteSchoolTerm()
    {

        $query = 'delete from periodo_letivo where id_ano_letivo = :idSchoolTerm;';

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':idSchoolTerm', $this->__get('idSchoolTerm'));

        $stmt->execute();
    }
}
