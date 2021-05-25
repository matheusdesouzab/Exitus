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
    

    public function listTeachersClass()
    {

        $query = "SELECT professor.id_professor AS teacher_id , professor.nome_professor AS teacher_name , professor.foto_perfil_professor AS profilePhoto , professor.cpf_professor AS teacher_cpf , sexo.sexo AS teacher_sex , disciplina.nome_disciplina AS discipline_name , disciplina.id_disciplina AS discipline_id , turma_disciplina.fk_id_turma as class_id , turma_disciplina.id_turma_disciplina AS discipline_class_id FROM professor LEFT JOIN sexo ON(sexo.id_sexo = professor.fk_id_sexo_professor) LEFT JOIN turma_disciplina ON(professor.id_professor = turma_disciplina.fk_id_professor) LEFT JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina) WHERE disciplina.nome_disciplina IS NOT NULL AND turma_disciplina.fk_id_turma = :id;";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':id', $this->__get('fk_id_class'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}
