<?php

namespace App\Models\People;

use MF\Model\Model;

class People extends Model
{

    protected $name;
    protected $cpf;
    protected $birthDate;
    protected $naturalness;
    protected $nationality;
    protected $profilePhoto;
    protected $accessCode;
    protected $email;
    protected $fk_id_hierarchy_function;
    protected $fk_id_sex;
    protected $fk_id_blood_type;
    protected $fk_id_pcd;
    protected $fk_id_address;
    protected $fk_id_telephone;
    protected $fk_id_account_state;


    public function __get($att)
    {
        return $this->$att;
    }


    public function __set($att, $newValue)
    {
        return $this->$att = $newValue;
    }


    /**
     * Retorna todos os sexos cadastrados no sistema 
     * 
     * @return array
     */
    public function availableSex()
    {

        return $this->speedingUp(
            "SELECT sexo.id_sexo as option_value , sexo.sexo as option_text FROM sexo"
        );
    }


    /**
     * Retorna as opções referente a deficiência física
     * 
     * @return array
     */
    public function pcd()
    {

        return $this->speedingUp(
            "SELECT pcd.id_pcd as option_value , pcd.pcd as option_text FROM pcd"
        );
    }


    /**
     * Retorna os tipos sanguineos disponíveis
     * 
     * @return array
     */
    public function availablebloodType()
    {

        return $this->speedingUp(

            "SELECT 
            
            tipo_sanguineo.id_tipo_sanguineo AS option_value , 
            tipo_sanguineo.tipo_sanguineo AS option_text 
            
            FROM tipo_sanguineo"

        );
    }


    /**
     * Esse método verifica se o CPF inserido já estar vinculado a uma outra pessoa no sistema
     * 
     * @return array
     */
    public function checkCpf()
    {

        $query =

            "SELECT aluno.cpf_aluno FROM aluno WHERE aluno.cpf_aluno = :cpf

            UNION
            
            SELECT professor.cpf_professor FROM professor WHERE professor.cpf_professor = :cpf

            UNION

            SELECT administrador.cpf_administrador FROM administrador WHERE administrador.cpf_administrador = :cpf
        
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':cpf', $this->__get('cpf'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna todos os estados que uma conta pode se encrontar
     * 
     * @return array
     */
    public function accountStates()
    {

        return $this->speedingUp(

            "SELECT 
            
            situacao_conta.id_situacao_conta AS option_value , 
            situacao_conta.situacao_conta AS option_text
            
            FROM situacao_conta"

        );
    }
}
