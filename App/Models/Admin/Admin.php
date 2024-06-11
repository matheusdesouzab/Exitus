<?php

namespace App\Models\Admin;

use App\Models\People\People;

class Admin extends People
{
    protected $id;
    protected $name;
    protected $cpf;
    protected $birthDate;
    protected $naturalness;
    protected $profilePhoto;
    protected $nationality;
    protected $email;
    protected $accessCode;
    protected $fk_id_sex;
    protected $fk_id_blood_type;
    protected $fk_id_pcd;
    protected $fk_id_address;
    protected $fk_id_telephone;
    protected $fk_id_hierarchy_function;
    protected $fk_id_account_state;

    public function __get($att)
    {
        return $this->$att;
    }

    public function __set($att, $newValue)
    {
        $this->$att = $newValue;
    }

    /**
     * Cria a conta de um administrador
     * 
     * @return void
     */
    public function insert()
    {
        $query = "INSERT INTO administrador 
            (nome_administrador, cpf_administrador, data_nascimento_administrador, naturalidade_administrador, foto_perfil_administrador, nacionalidade_administrador, fk_id_sexo_administrador, fk_id_tipo_sanguineo_administrador, fk_id_pcd_administrador, fk_id_endereco_administrador, fk_id_telefone_administrador , codigo_acesso , fk_id_administrador_hierarquia_funcao , email_administrador, fk_id_situacao_conta_administrador) 
            VALUES 
            (:adminName, :cpf, :birthDate, :naturalness, :profilePhoto, :nationality, :fk_id_sex, :fk_id_blood_type, :fk_id_pcd, :fk_id_address, :fk_id_telephone , :accessCode , :fk_id_hierarchy_function , :email, :fk_id_account_state)";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':adminName', $this->__get('name'));
        $stmt->bindValue(':cpf', $this->__get('cpf'));
        $stmt->bindValue(':birthDate', $this->__get('birthDate'));
        $stmt->bindValue(':naturalness', $this->__get('naturalness'));
        $stmt->bindValue(':profilePhoto', $this->__get('profilePhoto'));
        $stmt->bindValue(':nationality', $this->__get('nationality'));
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':accessCode', $this->__get('accessCode'));
        $stmt->bindValue(':fk_id_sex', $this->__get('fk_id_sex'));
        $stmt->bindValue(':fk_id_blood_type', $this->__get('fk_id_blood_type'));
        $stmt->bindValue(':fk_id_pcd', $this->__get('fk_id_pcd'));
        $stmt->bindValue(':fk_id_address', $this->__get('fk_id_address'));
        $stmt->bindValue(':fk_id_telephone', $this->__get('fk_id_telephone'));
        $stmt->bindValue(':fk_id_account_state', 1);
        $stmt->bindValue(':fk_id_hierarchy_function', $this->__get('fk_id_hierarchy_function'));

        $stmt->execute();
    }


    /**
     * Verifica se os dados recebidos correspondem a conta de algum administrador
     * 
     * @return array
     */
    public function login()
    {

        $query =

            "SELECT 
            
            id_administrador AS id , 
            nome_administrador AS name , 
            foto_perfil_administrador AS profile_photo ,
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


    /**
     * Retorna os dados gerais de um administrador
     * 
     * @return array
     */
    public function dataGeneral()
    {

        $query =

            "SELECT 

            nome_administrador AS name ,
            id_administrador AS id ,
            codigo_acesso AS access_code ,
            data_nascimento_administrador AS birth_date ,
            cpf_administrador AS cpf ,
            naturalidade_administrador AS naturalness ,
            nacionalidade_administrador AS nationality ,
            foto_perfil_administrador AS profile_photo ,
            email_administrador AS email ,
            sexo.id_sexo AS sex_id ,
            sexo.sexo AS sex ,
            pcd.pcd AS pcd , 
            pcd.id_pcd AS pcd_id ,
            tipo_sanguineo.tipo_sanguineo AS blood_type , 
            tipo_sanguineo.id_tipo_sanguineo AS blood_type_id , 
            endereco.id_endereco AS address_id , 
            endereco.cep AS zip_code , 
            endereco.bairro AS district , 
            endereco.endereco AS address , 
            endereco.uf AS uf , 
            endereco.municipio AS county , 
            telefone.id_telefone AS telephone_id ,
            telefone.numero_telefone AS telephone_number ,
            hierarquia_funcao.hierarquia_funcao AS hierarchy_function ,
            hierarquia_funcao.id_hierarquia_funcao AS hierarchy_function_id ,
            situacao_conta.id_situacao_conta AS account_state_id , 
            situacao_conta.situacao_conta AS account_state 
            
            FROM administrador 
            
            INNER JOIN sexo ON(administrador.fk_id_sexo_administrador = sexo.id_sexo) 
            INNER JOIN pcd ON(administrador.fk_id_pcd_administrador = pcd.id_pcd ) 
            INNER JOIN tipo_sanguineo ON(administrador.fk_id_tipo_sanguineo_administrador = tipo_sanguineo.id_tipo_sanguineo) 
            INNER JOIN telefone ON(administrador.fk_id_telefone_administrador = telefone.id_telefone) 
            INNER JOIN endereco ON(administrador.fk_id_endereco_administrador = endereco.id_endereco)
            INNER JOIN hierarquia_funcao ON(administrador.fk_id_administrador_hierarquia_funcao = hierarquia_funcao.id_hierarquia_funcao)
            INNER JOIN situacao_conta ON(administrador.fk_id_situacao_conta_administrador = situacao_conta.id_situacao_conta)
            
            WHERE administrador.id_administrador = :id
            
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Atualiza a foto do perfil do administrador
     * 
     * @return void
     */
    public function updateProfilePicture()
    {

        $query = "UPDATE administrador SET foto_perfil_administrador = :profilePhoto WHERE id_administrador = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':profilePhoto', $this->__get('profilePhoto'));
        $stmt->bindValue(':id', $this->__get('id'));

        $stmt->execute();
    }


    /**
     * Atualiza os dados da conta de um administrador
     * 
     * @return void
     */
    public function update()
    {

        $query =

            "UPDATE administrador SET 
            
            nome_administrador = :nameAdmin , 
            cpf_administrador = :cpf  , 
            codigo_acesso = :accessCode ,
            naturalidade_administrador = :naturalness , 
            nacionalidade_administrador = :nationality , 
            fk_id_sexo_administrador = :fk_id_sex , 
            fk_id_tipo_sanguineo_administrador = :fk_id_blood_type, 
            fk_id_pcd_administrador = :fk_id_pcd , 
            data_nascimento_administrador = :birthDate ,
            email_administrador = :email ,
            fk_id_administrador_hierarquia_funcao = :fk_id_hierarchy_function ,
            fk_id_situacao_conta_administrador = :fk_id_account_state
         
            WHERE id_administrador = :id
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':nameAdmin', $this->__get('name'));
        $stmt->bindValue(':accessCode', $this->__get('accessCode'));
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
        $stmt->bindValue(':fk_id_account_state', $this->__get('fk_id_account_state'));

        $stmt->execute();
    }


    /**
     * Retorna uma lista de todos os administradores presente no sistema
     * 
     * @return array
     */
    public function list()
    {

        return $this->speedingUp(

            "SELECT 
            
            administrador.id_administrador AS id , 
            administrador.nome_administrador AS name , 
            hierarquia_funcao.hierarquia_funcao AS hierarchy_function , 
            administrador.foto_perfil_administrador AS profile_photo , 
            administrador.email_administrador AS email , 
            situacao_conta.situacao_conta AS account_status 
            
            FROM administrador 
            
            INNER JOIN hierarquia_funcao ON(administrador.fk_id_administrador_hierarquia_funcao = hierarquia_funcao.id_hierarquia_funcao) 
            INNER JOIN situacao_conta ON(administrador.fk_id_situacao_conta_administrador = situacao_conta.id_situacao_conta)

        "
        );
    }


    /**
     * Esse método verifica se a conta do administrador está ativada ou desativada
     * 
     * @return array
     */
    public function accountStatus()
    {

        $query =

            "SELECT 
            
            administrador.fk_id_situacao_conta_administrador AS account_status 
            
            FROM administrador 
            
            WHERE administrador.codigo_acesso = :accessCode AND administrador.nome_administrador = :name
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':accessCode', $this->__get('accessCode'));
        $stmt->bindValue(':name', $this->__get('name'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}
