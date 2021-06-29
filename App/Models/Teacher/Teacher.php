<?php

namespace App\Models\Teacher;

use App\Models\People\People;

class Teacher extends People
{

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

        $query = 
        
            "INSERT INTO professor 
            
            (nome_professor, cpf_professor, data_nascimento_professor, naturalidade_professor, foto_perfil_professor, nacionalidade_professor,fk_id_sexo_professor, fk_id_tipo_sanguineo_professor, fk_id_pcd_professor, fk_endereco_professor, fk_id_telefone_professor)

            VALUES 
            
            (:teacherName, :cpf, :birthDate, :naturalness, :profilePhoto, :nationality, :fk_id_sex, :fk_id_blood_type, :fk_id_pcd, :fk_id_address,:fk_id_telephone)
        
        ";

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


    public function list()
    {

        return $this->speedingUp(

            "SELECT DISTINCT

            (SELECT COUNT(turma_disciplina.id_turma_disciplina) 

            FROM turma_disciplina           
                
            LEFT JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma) 
            LEFT JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo) 
            LEFT JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)         
            LEFT JOIN disciplina ON(disciplina.id_disciplina = turma_disciplina.fk_id_disciplina)

            WHERE turma_disciplina.fk_id_professor = professor.id_professor 
            
            AND situacao_periodo_letivo.id_situacao_periodo_letivo = 1) AS total_discipline ,
                                  
            professor.id_professor AS teacher_id , 
            professor.nome_professor AS teacher_name , 
            professor.foto_perfil_professor AS profilePhoto , 
            professor.cpf_professor AS teacher_cpf , 
            sexo.sexo AS teacher_sex 
            
            FROM professor 
            
            LEFT JOIN sexo ON(sexo.id_sexo = professor.fk_id_sexo_professor)
            LEFT JOIN turma_disciplina ON(professor.id_professor = turma_disciplina.fk_id_professor)"

        );
    }


    public function profile()
    {

        $query = 
        
            "SELECT 
            
            professor.id_professor AS teacher_id , 
            professor.nome_professor AS teacher_name , 
            professor.cpf_professor AS teacher_cpf , 
            sexo.id_sexo AS teacher_sex_id , 
            sexo.sexo AS teacher_sex , 
            professor.data_nascimento_professor AS teacher_birth_date , 
            professor.naturalidade_professor AS teacher_naturalness , 
            professor.foto_perfil_professor AS teacher_profile_photo , 
            professor.nacionalidade_professor AS teacher_nacionality , 
            tipo_sanguineo.tipo_sanguineo AS blood_type_teacher , 
            tipo_sanguineo.id_tipo_sanguineo AS blood_type_id_teacher , 
            pcd.pcd AS teacher_pcd , 
            pcd.id_pcd AS teacher_pcd_id , 
            telefone.numero_telefone AS teacher_telephone_number , 
            endereco.id_endereco AS teacher_address_id , 
            endereco.cep AS teacher_zipCode , 
            endereco.bairro AS teacher_district , 
            endereco.endereco AS teacher_address , 
            endereco.uf AS teacher_uf , 
            endereco.municipio AS teacher_county , 
            endereco.id_endereco AS address_id_teacher , 
            telefone.id_telefone AS telephone_id_teacher 
            
            FROM professor 
            
            LEFT JOIN sexo ON(sexo.id_sexo = professor.fk_id_sexo_professor) 
            LEFT JOIN endereco ON(endereco.id_endereco = professor.fk_endereco_professor) 
            LEFT JOIN telefone ON(telefone.id_telefone = professor.fk_id_telefone_professor) 
            LEFT JOIN tipo_sanguineo ON(tipo_sanguineo.id_tipo_sanguineo = professor.fk_id_tipo_sanguineo_professor) 
            LEFT JOIN pcd ON(pcd.id_pcd = professor.fk_id_pcd_professor) 
            
            WHERE professor.id_professor = :id
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':id', $this->__get('id'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function update()
    {

        $query = 
        
            "UPDATE professor SET 
            
            nome_professor = :teacherName , 
            cpf_professor = :cpf  , 
            naturalidade_professor = :naturalness , 
            nacionalidade_professor = :nationality , 
            fk_id_sexo_professor = :fk_id_sex , 
            fk_id_tipo_sanguineo_professor = :fk_id_blood_type, 
            fk_id_pcd_professor = :fk_id_pcd , 
            data_nascimento_professor = :birthDate 
            
            WHERE id_professor = :id
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':teacherName', $this->__get('name'));
        $stmt->bindValue(':cpf', $this->__get('cpf'));
        $stmt->bindValue(':birthDate', $this->__get('birthDate'));
        $stmt->bindValue(':naturalness', $this->__get('naturalness'));
        $stmt->bindValue(':nationality', $this->__get('nationality'));
        $stmt->bindValue(':fk_id_sex', $this->__get('fk_id_sex'));
        $stmt->bindValue(':fk_id_blood_type', $this->__get('fk_id_blood_type'));
        $stmt->bindValue(':fk_id_pcd', $this->__get('fk_id_pcd'));
        $stmt->bindValue(':id', $this->__get('id'));

        $stmt->execute();
    }


    public function teacherAvailable()
    {

        return $this->speedingUp(
            "SELECT professor.id_professor AS option_value , professor.nome_professor AS option_text FROM professor;"
        );
    }


    public function updateProfilePicture(){

        $query = "UPDATE professor SET professor.foto_perfil_professor = :profilePhoto WHERE professor.id_professor = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':profilePhoto', $this->__get('profilePhoto'));
        $stmt->bindValue(':id', $this->__get('id'));

        $stmt->execute();
    }
    
}
