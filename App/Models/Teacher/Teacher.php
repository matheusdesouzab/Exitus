<?php

namespace App\Models\Teacher;

use App\Models\People\People;

class Teacher extends People
{

    private $teacherId = 0;
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
            
            (nome_professor, cpf_professor, data_nascimento_professor, naturalidade_professor, foto_perfil_professor, nacionalidade_professor,fk_id_sexo_professor, fk_id_tipo_sanguineo_professor, fk_id_pcd_professor, fk_id_endereco_professor, fk_id_telefone_professor , codigo_acesso , email_professor , fk_id_professor_hierarquia_funcao)

            VALUES 
            
            (:teacherName, :cpf, :birthDate, :naturalness, :profilePhoto, :nationality, :fk_id_sex, :fk_id_blood_type, :fk_id_pcd, :fk_id_address,:fk_id_telephone , :accessCode , :email , :fk_id_hierarchy_function)
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':teacherName', $this->__get('name'));
        $stmt->bindValue(':cpf', $this->__get('cpf'));
        $stmt->bindValue(':birthDate', $this->__get('birthDate'));
        $stmt->bindValue(':naturalness', $this->__get('naturalness'));
        $stmt->bindValue(':profilePhoto', $this->__get('profilePhoto'));
        $stmt->bindValue(':nationality', $this->__get('nationality'));
        $stmt->bindValue(':accessCode', $this->__get('accessCode'));
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':fk_id_sex', $this->__get('fk_id_sex'));
        $stmt->bindValue(':fk_id_blood_type', $this->__get('fk_id_blood_type'));
        $stmt->bindValue(':fk_id_pcd', $this->__get('fk_id_pcd'));
        $stmt->bindValue(':fk_id_address', $this->__get('fk_id_address'));
        $stmt->bindValue(':fk_id_telephone', $this->__get('fk_id_telephone'));
        $stmt->bindValue(':fk_id_hierarchy_function', $this->__get('fk_id_hierarchy_function'));

        $stmt->execute();

        return $this->db->lastInsertId();
    }


    public function list()
    {

        $query =

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
            professor.cpf_professor AS teacher_cpf , 
            sexo.id_sexo AS teacher_sex_id , 
            sexo.sexo AS teacher_sex , 
            professor.codigo_acesso AS accessCode ,
            professor.data_nascimento_professor AS teacher_birth_date , 
            professor.naturalidade_professor AS teacher_naturalness , 
            professor.foto_perfil_professor AS profilePhoto , 
            professor.nacionalidade_professor AS teacher_nationality , 
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
            telefone.id_telefone AS telephone_id_teacher ,
            email_professor AS email ,
            professor.codigo_acesso AS accessCode ,
            hierarquia_funcao.hierarquia_funcao AS hierarchyFunction ,
            hierarquia_funcao.id_hierarquia_funcao AS hierarchyFunctionId 
            
            FROM professor 
            
            LEFT JOIN sexo ON(sexo.id_sexo = professor.fk_id_sexo_professor)
            LEFT JOIN turma_disciplina ON(professor.id_professor = turma_disciplina.fk_id_professor)
            LEFT JOIN endereco ON(endereco.id_endereco = professor.fk_id_endereco_professor) 
            LEFT JOIN telefone ON(telefone.id_telefone = professor.fk_id_telefone_professor) 
            LEFT JOIN tipo_sanguineo ON(tipo_sanguineo.id_tipo_sanguineo = professor.fk_id_tipo_sanguineo_professor) 
            LEFT JOIN pcd ON(pcd.id_pcd = professor.fk_id_pcd_professor) 
            INNER JOIN hierarquia_funcao ON(professor.fk_id_professor_hierarquia_funcao = hierarquia_funcao.id_hierarquia_funcao)

            WHERE CASE WHEN :teacherId = 0 THEN professor.id_professor <> 0 ELSE professor.id_professor = :teacherId END

        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':teacherId', $this->__get('teacherId'));

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
            data_nascimento_professor = :birthDate ,
            email_professor = :email
            
            WHERE id_professor = :teacherId
        
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
        $stmt->bindValue(':teacherId', $this->__get('teacherId'));
        $stmt->bindValue(':email', $this->__get('email'));

        $stmt->execute();
    }


    public function teacherAvailable()
    {

        return $this->speedingUp(
            "SELECT professor.id_professor AS option_value , professor.nome_professor AS option_text FROM professor;"
        );
    }


    public function updateProfilePicture()
    {

        $query = "UPDATE professor SET professor.foto_perfil_professor = :profilePhoto WHERE professor.id_professor = :teacherId";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':profilePhoto', $this->__get('profilePhoto'));
        $stmt->bindValue(':teacherId', $this->__get('teacherId'));

        $stmt->execute();
    }


    public function login()
    {

        $query =

            "SELECT 
            
            id_professor AS teacher_id , 
            nome_professor AS teacher_name , 
            professor.foto_perfil_professor AS teacher_photo ,
            fk_id_professor_hierarquia_funcao AS hierarchy_function
            
            FROM professor 
            
            WHERE codigo_acesso = :accessCode AND nome_professor = :teacherName
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':accessCode', $this->__get('accessCode'));
        $stmt->bindValue(':teacherName', $this->__get('name'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function teacherClasses()
    {

        $query =

            "SELECT DISTINCT 

            turma.id_turma AS class_id ,
            serie.sigla AS series_acronym , 
            cedula_turma.cedula AS ballot , 
            curso.sigla AS course , 
            turno.nome_turno AS shift , 
            numero_sala_aula.numero_sala_aula AS classroom_number , 
            periodo_disponivel.ano_letivo AS school_term ,
            
            (SELECT COUNT(turma_disciplina.fk_id_professor) FROM professor LEFT JOIN turma_disciplina ON(professor.id_professor = turma_disciplina.fk_id_professor) WHERE professor.id_professor = :teacherId AND turma_disciplina.fk_id_turma = turma.id_turma ) AS discipline_total ,
            
            (SELECT COUNT(matricula.id_matricula) FROM matricula WHERE matricula.fk_id_turma_matricula = turma.id_turma ) as student_total
            
            FROM turma 
            
            INNER JOIN turma_disciplina ON(turma.id_turma = turma_disciplina.fk_id_turma) 
            INNER JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor) 
            INNER JOIN cedula_turma ON(turma.fk_id_cedula = cedula_turma.id_cedula_turma) 
            INNER JOIN curso ON(turma.fk_id_curso = curso.id_curso) 
            INNER JOIN serie ON(turma.fk_id_serie = serie.id_serie) 
            INNER JOIN turno ON(turma.fk_id_turno = turno.id_turno)
            INNER JOIN sala ON(turma.fk_id_sala = sala.id_sala) 
            INNER JOIN numero_sala_aula ON(sala.id_sala = numero_sala_aula.id_numero_sala_aula) 
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo) 
            INNER JOIN periodo_disponivel ON(periodo_letivo.fk_id_ano_letivo = periodo_disponivel.id_periodo_disponivel) 
            INNER JOIN situacao_periodo_letivo on(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)
            
            WHERE professor.id_professor = :teacherId

            AND

            situacao_periodo_letivo.id_situacao_periodo_letivo = 1
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':teacherId', $this->__get('teacherId'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function seekTeacherClasses($class)
    {

        $query =

            "SELECT DISTINCT 

            turma.id_turma AS class_id ,
            serie.sigla AS series_acronym , 
            cedula_turma.cedula AS ballot , 
            curso.sigla AS course , 
            turno.nome_turno AS shift , 
            numero_sala_aula.numero_sala_aula AS classroom_number , 
            periodo_disponivel.ano_letivo AS school_term ,
            
            (SELECT COUNT(turma_disciplina.fk_id_professor) FROM professor LEFT JOIN turma_disciplina ON(professor.id_professor = turma_disciplina.fk_id_professor) WHERE professor.id_professor = :teacherId AND turma_disciplina.fk_id_turma = turma.id_turma ) AS discipline_total ,
            
            (SELECT COUNT(matricula.id_matricula) FROM matricula WHERE matricula.fk_id_turma_matricula = turma.id_turma ) as student_total
            
            FROM turma 
            
            INNER JOIN turma_disciplina ON(turma.id_turma = turma_disciplina.fk_id_turma) 
            INNER JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor) 
            INNER JOIN cedula_turma ON(turma.fk_id_cedula = cedula_turma.id_cedula_turma) 
            INNER JOIN curso ON(turma.fk_id_curso = curso.id_curso) 
            INNER JOIN serie ON(turma.fk_id_serie = serie.id_serie) 
            INNER JOIN turno ON(turma.fk_id_turno = turno.id_turno)
            INNER JOIN sala ON(turma.fk_id_sala = sala.id_sala) 
            INNER JOIN numero_sala_aula ON(sala.id_sala = numero_sala_aula.id_numero_sala_aula) 
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo) 
            INNER JOIN periodo_disponivel ON(periodo_letivo.fk_id_ano_letivo = periodo_disponivel.id_periodo_disponivel) 
            INNER JOIN situacao_periodo_letivo on(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)
            
            WHERE professor.id_professor = :teacherId AND

            CASE WHEN :fk_id_course = 0 THEN curso.id_curso <> :fk_id_course ELSE curso.id_curso = :fk_id_course END

            AND

            CASE WHEN :fk_id_series = 0 THEN serie.id_serie <> :fk_id_series ELSE serie.id_serie = :fk_id_series END

            AND

            CASE WHEN :fk_id_shift = 0 THEN turno.id_turno <> :fk_id_shift ELSE turno.id_turno = :fk_id_shift END

            AND

            situacao_periodo_letivo.id_situacao_periodo_letivo = 1

        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':teacherId', $this->__get('teacherId'));
        $stmt->bindValue(':fk_id_course', $class->__get('fk_id_course'));
        $stmt->bindValue(':fk_id_series', $class->__get('fk_id_series'));
        $stmt->bindValue(':fk_id_shift', $class->__get('fk_id_shift'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}
