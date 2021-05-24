<?php

namespace App\Models\Management;

use MF\Model\Model;

class ClassDiscipline extends Model
{

    private $classeDisciplineId;
    private $fk_id_teacher;
    private $fk_id_discipline;
    private $fk_id_class;


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

        $query = "INSERT INTO turma_disciplina(fk_id_professor, fk_id_disciplina, fk_id_turma) VALUES (:fk_id_teacher, :fk_id_discipline, :fk_id_class);";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_teacher', $this->__get('fk_id_teacher'));
        $stmt->bindValue(':fk_id_discipline', $this->__get('fk_id_discipline'));
        $stmt->bindValue(':fk_id_class', $this->__get('fk_id_class'));

        $stmt->execute();
    }
}
