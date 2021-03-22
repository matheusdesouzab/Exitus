<?php

namespace App\Models;

use MF\Model\Model;

class Discipline extends Model
{

    protected $idDiscipline;
    protected $discipline;
    protected $acronym;
    protected $fk_id_modality;


    public function insertDiscipline()
    {

        $query = "insert into disciplina (nome_disciplina,sigla_disciplina,fk_id_modalidade_disciplina) values (:discipline,:acronym,:fk_id_modality);";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':discipline', $this->__get('discipline'));
        $stmt->bindValue(':acronym', $this->__get('acronym'));
        $stmt->bindValue(':fk_id_modality', $this->__get('fk_id_modality'));

        $stmt->execute();
    }

    public function listDiscipline()
    {

        $query = 'select disciplina.id_disciplina as id_discipline  , disciplina.nome_disciplina as discipline , modalidade_disciplina.modalidade_disciplina as discipline_modality , disciplina.sigla_disciplina as acronym  from disciplina left join modalidade_disciplina on(disciplina.fk_id_modalidade_disciplina = modalidade_disciplina.id_modalidade_disciplina);';

        return $this->speedingUp($query);
    }

    public function disciplineData()
    {

        $query = 'select disciplina.id_disciplina as id_discipline  , disciplina.nome_disciplina as discipline , modalidade_disciplina.modalidade_disciplina as discipline_modality , disciplina.fk_id_modalidade_disciplina as id_modality , disciplina.sigla_disciplina as acronym   from disciplina left join modalidade_disciplina on(disciplina.fk_id_modalidade_disciplina = modalidade_disciplina.id_modalidade_disciplina) where disciplina.id_disciplina = :idDiscipline;';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':idDiscipline', $this->__get('idDiscipline'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function listDisciplineModality()
    {

        $query = "select modalidade_disciplina.id_modalidade_disciplina as option_value , modalidade_disciplina.modalidade_disciplina as option_text from modalidade_disciplina;";

        return $this->speedingUp($query);
    }

    public function updateDiscipline()
    {

        $query = 'update disciplina set nome_disciplina = :discipline , sigla_disciplina = :acronym , fk_id_modalidade_disciplina = :fk_id_modality where disciplina.id_disciplina = :idDiscipline;';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':idDiscipline', $this->__get('idDiscipline'));
        $stmt->bindValue(':discipline', $this->__get('discipline'));
        $stmt->bindValue(':acronym', $this->__get('acronym'));
        $stmt->bindValue(':fk_id_modality', $this->__get('fk_id_modality'));

        $stmt->execute();
    }

    public function seekDiscipline()
    {

        $this->__get('fk_id_modality') == 0 ? $operation = '<>' : $operation = '=';

        $query = "select disciplina.id_disciplina as id_discipline , disciplina.nome_disciplina as discipline , modalidade_disciplina.modalidade_disciplina as discipline_modality , disciplina.sigla_disciplina as acronym from disciplina left join modalidade_disciplina on(disciplina.fk_id_modalidade_disciplina = modalidade_disciplina.id_modalidade_disciplina) where disciplina.nome_disciplina like :discipline and disciplina.fk_id_modalidade_disciplina $operation :fk_id_modality";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':discipline', "%" . $this->__get('discipline') . "%", \PDO::PARAM_STR);
        $stmt->bindValue(':fk_id_modality', $this->__get('fk_id_modality'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function deleteDiscipline()
    {

        $query = 'delete from disciplina where disciplina.id_disciplina = :idDiscipline';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':idDiscipline', $this->__get('idDiscipline'));

        $stmt->execute();
    }
}
