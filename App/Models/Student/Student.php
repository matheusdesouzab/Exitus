<?php

namespace App\Models\Student;

use App\Models\People\People;

class Student extends People
{

    private $fatherName;
    private $motherName;


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

        $query = "INSERT INTO aluno (nome_aluno,cpf_aluno,data_nascimento_aluno,naturalidade_aluno,foto_perfil_aluno,nacionalidade_aluno,nome_mae,nome_pai,fk_id_sexo_aluno,fk_id_tipo_sanguineo_aluno,fk_id_aluno_pcd,fk_id_endereco_aluno,fk_id_telefone_aluno) 
        VALUES (:studentName,:cpf,:birthDate,:naturalness,:profilePhoto,:nationality,:motherName,:fatherName,:fk_id_sex,:fk_id_blood_type,:fk_id_pcd,:fk_id_address,:fk_id_telephone);";

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
        $stmt->bindValue(':fk_id_blood_type', $this->__get('fk_id_blood_type'));
        $stmt->bindValue(':fk_id_pcd', $this->__get('fk_id_pcd'));
        $stmt->bindValue(':fk_id_address', $this->__get('fk_id_address'));
        $stmt->bindValue(':fk_id_telephone', $this->__get('fk_id_telephone'));

        $stmt->execute();

        return $this->db->lastInsertId();
    }


    public function delete(){
        //delete
    }


    public function update(){
        //update
    }


    public function list(){
        //list
    }
}
