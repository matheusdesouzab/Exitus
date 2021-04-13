<?php

namespace App\Models;

use MF\Model\People;

class Student extends People
{

    protected $fatherName;
    protected $motherName;


    public function insertStudent()
    {

        $query = "INSERT INTO aluno 
        (nome_aluno,cpf_aluno,data_nascimento_aluno,naturalidade_aluno,foto_perfil_aluno,nacionalidade_aluno,nome_mae,nome_pai,fk_id_sexo_aluno,fk_id_tipo_sanguineo_aluno,fk_id_aluno_pcd) VALUES
        (:studentName,:cpf,:birthDate,:naturalness,:profilePhoto,:nationality,:motherName,:fatherName,:fk_id_sex,:fk_id_blood_type,:fk_id_pcd);";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':studentName', $this->__get('name'));
        $stmt->bindValue(':cpf', $this->__get('cpf'));
        $stmt->bindValue(':birthDate', $this->__get('birthDate'));
        $stmt->bindValue(':naturalness', $this->__get('naturalness'));
        $stmt->bindValue(':profilePhoto', $this->__get('profilePhoto'));
        $stmt->bindValue(':nationality', $this->__get('nationality'));
        $stmt->bindValue(':motherName', $this->__get('motherName'));
        $stmt->bindValue(':fatherName', $this->__get('fatherName'));
        $stmt->bindValue(':fk_id_sex', $this->__get('fk_id_sex'));
        $stmt->bindValue(':fk_blood_type', $this->__get('fk_blood_type'));
        $stmt->bindValue(':fk_id_pcd', $this->__get('fk_id_pcd'));

        $stmt->execute();

        return $this->db->lastInsertId();
    }
}
