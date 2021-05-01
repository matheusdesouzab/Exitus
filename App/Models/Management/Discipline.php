<?php

namespace App\Models\Management;

use MF\Model\Model;

class Discipline extends Model
{

    private $idDiscipline;
    private $discipline;
    private $acronym;
    private $fk_id_modality;


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

        $query = "INSERT INTO disciplina (nome_disciplina,sigla_disciplina,fk_id_modalidade_disciplina) VALUES (:discipline,:acronym,:fk_id_modality);";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':discipline', $this->__get('discipline'));
        $stmt->bindValue(':acronym', $this->__get('acronym'));
        $stmt->bindValue(':fk_id_modality', $this->__get('fk_id_modality'));

        $stmt->execute();
    }


    public function list()
    {

        return $this->speedingUp(
            "SELECT disciplina.id_disciplina AS id_discipline , disciplina.nome_disciplina AS discipline , modalidade_disciplina.modalidade_disciplina AS discipline_modality , disciplina.sigla_disciplina AS acronym FROM disciplina LEFT JOIN modalidade_disciplina ON(disciplina.fk_id_modalidade_disciplina = modalidade_disciplina.id_modalidade_disciplina);"
        );
    }


    public function disciplineData()
    {

        $query = 'SELECT disciplina.id_disciplina AS id_discipline  , disciplina.nome_disciplina AS discipline , modalidade_disciplina.modalidade_disciplina AS discipline_modality , disciplina.fk_id_modalidade_disciplina AS id_modality , disciplina.sigla_disciplina AS acronym  FROM disciplina LEFT JOIN modalidade_disciplina ON(disciplina.fk_id_modalidade_disciplina = modalidade_disciplina.id_modalidade_disciplina) WHERE disciplina.id_disciplina = :idDiscipline;';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':idDiscipline', $this->__get('idDiscipline'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function listDisciplineModality()
    {

        return $this->speedingUp(
            "SELECT modalidade_disciplina.id_modalidade_disciplina AS option_value , modalidade_disciplina.modalidade_disciplina AS option_text 
            FROM modalidade_disciplina;"
        );
    }


    public function update()
    {

        $query = 'UPDATE disciplina SET nome_disciplina = :discipline , sigla_disciplina = :acronym , fk_id_modalidade_disciplina = :fk_id_modality 
        WHERE disciplina.id_disciplina = :idDiscipline;';

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

        $query = "SELECT disciplina.id_disciplina AS id_discipline , disciplina.nome_disciplina AS discipline , modalidade_disciplina.modalidade_disciplina AS discipline_modality , disciplina.sigla_disciplina AS acronym FROM disciplina LEFT JOIN modalidade_disciplina on(disciplina.fk_id_modalidade_disciplina = modalidade_disciplina.id_modalidade_disciplina) WHERE disciplina.nome_disciplina LIKE :discipline AND disciplina.fk_id_modalidade_disciplina $operation :fk_id_modality";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':discipline', "%" . $this->__get('discipline') . "%", \PDO::PARAM_STR);
        $stmt->bindValue(':fk_id_modality', $this->__get('fk_id_modality'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function delete()
    {

        $query = 'DELETE FROM disciplina WHERE disciplina.id_disciplina = :idDiscipline';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':idDiscipline', $this->__get('idDiscipline'));

        $stmt->execute();
    }
}
