<?php

namespace App\Models\Teacher;

use App\Models\People\People;

class Teacher extends People
{

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

        $query = "INSERT INTO professor (nome_professor,cpf_professor,data_nascimento_professor,naturalidade_funcionario,foto_perfil_professor,nacionalidade_professor,fk_id_sexo_professor,fk_id_tipo_sanguineo_professor,fk_id_professor_pcd,fk_id_endereco_professor,fk_id_telefone_professor) 
        VALUES (:teacherName,:cpf,:birthDate,:naturalness,:profilePhoto,:nationality,:fk_id_sex,:fk_id_blood_type,:fk_id_pcd,:fk_id_address,:fk_id_telephone);";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':teacherName', $this->__get('name'));
        $stmt->bindValue(':cpf', $this->__get('cpf'));
        $stmt->bindValue(':birthDate', $this->__get('birthDate'));
        $stmt->bindValue(':naturalness', $this->__get('naturalness'));
        $stmt->bindValue(':profilePhoto', $this->__get('profilePhoto'));
        $stmt->bindValue(':nationality', $this->__get('nationality'));
        $stmt->bindValue(':fk_id_sex', $this->__get('fk_id_sex'));
        $stmt->bindValue(':fk_id_blood_type', $this->__get('fk_id_blood_type'));
        $stmt->bindValue(':fk_id_pcd', $this->__get('fk_id_pcd'));
        $stmt->bindValue(':fk_id_address', $this->__get('fk_id_address'));
        $stmt->bindValue(':fk_id_telephone', $this->__get('fk_id_telephone'));

        $stmt->execute();

        return $this->db->lastInsertId();
    }


}
