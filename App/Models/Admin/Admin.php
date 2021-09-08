<?php

namespace App\Models\Admin;

use App\Models\People\People;

class Admin extends People
{

    public function __get($att)
    {
        return $this->$att;
    }


    public function __set($att, $newValue)
    {
        return $this->$att = $newValue;
    }


    public function login()
    {

        $query =

            "SELECT 
            
            id_administrador AS admin_id , 
            nome_administrador AS admin_name , 
            foto_perfil_administrador AS admin_photo ,
            fk_id_administrador_hierarquia_funcao AS hierarchy_function
            
            FROM administrador 
            
            WHERE codigo_acesso = :accessCode AND nome_administrador = :adminName
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':accessCode', $this->__get('accessCode'));
        $stmt->bindValue(':adminName', $this->__get('name'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function list()
    {

        $query =

            "SELECT 

            nome_administrador AS name ,
            id_administrador AS id ,
            codigo_acesso AS accessCode ,
            data_nascimento_administrador AS birthDate ,
            cpf_administrador AS cpf ,
            naturalidade_administrador AS naturalness ,
            nacionalidade_administrador AS nationality ,
            foto_perfil_administrador AS profilePhoto ,
            email_administrador AS email ,
            sexo.id_sexo AS sexId ,
            sexo.sexo AS sex ,
            pcd.pcd AS pcd , 
            pcd.id_pcd AS pcdId ,
            tipo_sanguineo.tipo_sanguineo AS bloodType , 
            tipo_sanguineo.id_tipo_sanguineo AS bloodTypeId , 
            endereco.id_endereco AS addressId , 
            endereco.cep AS zipCode , 
            endereco.bairro AS district , 
            endereco.endereco AS address , 
            endereco.uf AS uf , 
            endereco.municipio AS county , 
            telefone.id_telefone AS telephoneId ,
            telefone.numero_telefone AS telephoneNumber ,
            hierarquia_funcao.hierarquia_funcao AS hierarchyFunction ,
            hierarquia_funcao.id_hierarquia_funcao AS hierarchyFunctionId 
            
            FROM administrador 
            
            INNER JOIN sexo ON(administrador.fk_id_sexo_administrador = sexo.id_sexo) 
            INNER JOIN pcd ON(administrador.fk_id_pcd_administrador = pcd.id_pcd ) 
            INNER JOIN tipo_sanguineo ON(administrador.fk_id_tipo_sanguineo_administrador = tipo_sanguineo.id_tipo_sanguineo) 
            INNER JOIN telefone ON(administrador.fk_id_telefone_administrador = telefone.id_telefone) 
            INNER JOIN endereco ON(administrador.fk_id_endereco_administrador = endereco.id_endereco)
            INNER JOIN hierarquia_funcao ON(administrador.fk_id_administrador_hierarquia_funcao = hierarquia_funcao.id_hierarquia_funcao)
            
            WHERE administrador.id_administrador = :id
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':id', $this->__get('id'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function updateProfilePicture()
    {

        $query = "UPDATE administrador SET foto_perfil_administrador = :profilePhoto WHERE id_administrador = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':profilePhoto', $this->__get('profilePhoto'));
        $stmt->bindValue(':id', $this->__get('id'));

        $stmt->execute();
    }


    public function update()
    {


        $query =

            "UPDATE administrador SET 
            
            nome_administrador = :nameAdmin , 
            cpf_administrador = :cpf  , 
            naturalidade_administrador = :naturalness , 
            nacionalidade_administrador = :nationality , 
            fk_id_sexo_administrador = :fk_id_sex , 
            fk_id_tipo_sanguineo_administrador = :fk_id_blood_type, 
            fk_id_pcd_administrador = :fk_id_pcd , 
            data_nascimento_administrador = :birthDate ,
            email_administrador = :email ,
            fk_id_administrador_hierarquia_funcao = :fk_id_hierarchy_function
         
            WHERE id_administrador = :id
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':nameAdmin', $this->__get('name'));
        $stmt->bindValue(':cpf', $this->__get('cpf'));
        $stmt->bindValue(':birthDate', $this->__get('birthDate'));
        $stmt->bindValue(':naturalness', $this->__get('naturalness'));
        $stmt->bindValue(':nationality', $this->__get('nationality'));
        $stmt->bindValue(':fk_id_sex', $this->__get('fk_id_sex'));
        $stmt->bindValue(':fk_id_blood_type', $this->__get('fk_id_blood_type'));
        $stmt->bindValue(':fk_id_pcd', $this->__get('fk_id_pcd'));
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':fk_id_hierarchy_function', $this->__get('fk_id_hierarchy_function'));

        $stmt->execute();
    }


    public function listHierarchyFunction()
    {

        return $this->speedingUp("SELECT hierarquia_funcao.id_hierarquia_funcao AS option_value , hierarquia_funcao.hierarquia_funcao AS option_text FROM hierarquia_funcao WHERE hierarquia_funcao.id_hierarquia_funcao BETWEEN 1 AND 2");
    }
}
