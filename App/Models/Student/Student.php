<?php

namespace App\Models\Student;

use App\Models\People\People;

class Student extends People
{

    private $studentId = 0;
    private $fatherName;
    private $motherName;
    private $fk_id_class = 0;
    private $fk_id_enrollmentId = 0;
    private $fk_id_general_situation;


    public function __get($att)
    {
        return $this->$att;
    }


    public function __set($att, $newValue)
    {
        return $this->$att = $newValue;
    }


    /**
     * Cadastrar aluno
     * 
     * @return void
     */
    public function insert()
    {

        $query =

            "INSERT INTO aluno 
            
                (nome_aluno, cpf_aluno, data_nascimento_aluno, naturalidade_aluno, foto_perfil_aluno,nacionalidade_aluno, nome_mae,nome_pai, fk_id_sexo_aluno,fk_id_tipo_sanguineo_aluno, fk_id_aluno_pcd, fk_id_endereco_aluno, fk_id_telefone_aluno , codigo_acesso , fk_id_aluno_hierarquia_funcao , email_aluno, fk_id_situacao_geral_aluno) 

            VALUES 
            
                (:studentName, :cpf, :birthDate, :naturalness, :profilePhoto, :nationality, :motherName, :fatherName, :fk_id_sex, :fk_id_blood_type, :fk_id_pcd,:fk_id_address, :fk_id_telephone , :accessCode , :fk_id_hierarchy_function , :email, 1)"              
        ;

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':studentName', $this->__get('name'));
        $stmt->bindValue(':cpf', $this->__get('cpf'));
        $stmt->bindValue(':birthDate', $this->__get('birthDate'));
        $stmt->bindValue(':naturalness', $this->__get('naturalness'));
        $stmt->bindValue(':profilePhoto', $this->__get('profilePhoto'));
        $stmt->bindValue(':nationality', $this->__get('nationality'));
        $stmt->bindValue(':motherName', $this->__get('motherName'));
        $stmt->bindValue(':fatherName', $this->__get('fatherName'));
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':accessCode', $this->__get('accessCode'));
        $stmt->bindValue(':fk_id_sex', $this->__get('fk_id_sex'));
        $stmt->bindValue(':fk_id_blood_type', $this->__get('fk_id_blood_type'));
        $stmt->bindValue(':fk_id_pcd', $this->__get('fk_id_pcd'));
        $stmt->bindValue(':fk_id_address', $this->__get('fk_id_address'));
        $stmt->bindValue(':fk_id_telephone', $this->__get('fk_id_telephone'));
        $stmt->bindValue(':fk_id_hierarchy_function', $this->__get('fk_id_hierarchy_function'));

        $stmt->execute();

        return $this->db->lastInsertId();
    }


    /**
     * Atualizar dados do aluno
     * 
     * @return void
     */
    public function update()
    {

        $query =

            "UPDATE aluno SET 
            
            nome_aluno = :studentName , 
            cpf_aluno = :cpf  , 
            naturalidade_aluno = :naturalness , 
            nacionalidade_aluno = :nationality , 
            nome_mae = :motherName , 
            nome_pai = :fatherName , 
            fk_id_sexo_aluno = :fk_id_sex , 
            fk_id_tipo_sanguineo_aluno = :fk_id_blood_type, 
            fk_id_aluno_pcd = :fk_id_pcd , 
            data_nascimento_aluno = :birthDate ,
            email_aluno = :email ,
            fk_id_situacao_geral_aluno = :fk_id_general_situation
         
            WHERE id_aluno = :studentId 
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':studentName', $this->__get('name'));
        $stmt->bindValue(':cpf', $this->__get('cpf'));
        $stmt->bindValue(':birthDate', $this->__get('birthDate'));
        $stmt->bindValue(':naturalness', $this->__get('naturalness'));
        $stmt->bindValue(':nationality', $this->__get('nationality'));
        $stmt->bindValue(':motherName', $this->__get('motherName'));
        $stmt->bindValue(':fatherName', $this->__get('fatherName'));
        $stmt->bindValue(':fk_id_sex', $this->__get('fk_id_sex'));
        $stmt->bindValue(':fk_id_blood_type', $this->__get('fk_id_blood_type'));
        $stmt->bindValue(':fk_id_pcd', $this->__get('fk_id_pcd'));
        $stmt->bindValue(':studentId', $this->__get('studentId'));
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':fk_id_general_situation', $this->__get('fk_id_general_situation'));

        $stmt->execute();
    }


    /**
     * Retornar todos os alunos cadastrados
     * 
     * @param string $scholTermSituation 
     * 
     * @return array
     */
    public function list($scholTermSituation = '= 1')
    {

        $query =

            "SELECT 
            
            aluno.id_aluno AS student_id , 
            aluno.nome_aluno AS student_name , 
            aluno.cpf_aluno AS student_cpf , 
            aluno.foto_perfil_aluno AS profilePhoto , 
            serie.sigla AS acronym_series , 
            cedula_turma.cedula AS ballot , 
            curso.sigla AS course , 
            curso.nome_curso AS courseName ,
            turno.nome_turno AS shift , 
            numero_sala_aula.numero_sala_aula AS number_classroom , 
            situacao_aluno_ano_letivo.situacao_aluno as student_situation , 
            situacao_aluno_ano_letivo.id_situacao_aluno as student_situation_id , 
            turma.id_turma AS class_id,
            matricula.id_matricula AS enrollmentId ,
            situacao_periodo_letivo.id_situacao_periodo_letivo AS schoolTermSituation ,
            periodo_disponivel.ano_letivo AS schoolYear
            
            FROM aluno 

            INNER JOIN matricula ON(aluno.id_aluno = matricula.fk_id_aluno) 
            INNER JOIN situacao_aluno_ano_letivo ON(matricula.fk_id_situacao_aluno = situacao_aluno_ano_letivo.id_situacao_aluno) 
            INNER JOIN turma ON(matricula.fk_id_turma_matricula = turma.id_turma) 
            INNER JOIN serie ON(turma.fk_id_serie = serie.id_serie) 
            INNER JOIN curso ON(turma.fk_id_curso = curso.id_curso) 
            INNER JOIN cedula_turma ON(turma.fk_id_cedula = cedula_turma.id_cedula_turma) 
            INNER JOIN turno ON(turma.fk_id_turno = turno.id_turno) 
            INNER JOIN sala ON(turma.fk_id_sala = sala.id_sala) 
            INNER JOIN numero_sala_aula ON(sala.fk_id_numero_sala = numero_sala_aula.id_numero_sala_aula)         
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo)
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)
            INNER JOIN periodo_disponivel ON(periodo_letivo.fk_id_ano_letivo = periodo_disponivel.id_periodo_disponivel) 

            WHERE CASE WHEN :fk_id_class = 0 THEN turma.id_turma <> 0 ELSE turma.id_turma = :fk_id_class END

            AND

            CASE WHEN :studentId = 0 THEN aluno.id_aluno <> 0 ELSE aluno.id_aluno = :studentId END       

            AND 
            
            situacao_periodo_letivo.id_situacao_periodo_letivo $scholTermSituation

            AND 

            CASE WHEN :fk_id_enrollmentId = 0 THEN matricula.id_matricula <> 0 ELSE matricula.id_matricula = :fk_id_enrollmentId END
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_class', $this->__get('fk_id_class'));
        $stmt->bindValue(':studentId', $this->__get('studentId'));
        $stmt->bindValue(':fk_id_enrollmentId', $this->__get('fk_id_enrollmentId'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retornar todos os dados referente ao perfil do aluno
     * 
     * @return array
     */
    public function dataGeneral()
    {

        $query =

            "SELECT 
                
            aluno.id_aluno AS student_id , 
            aluno.nome_aluno AS student_name , 
            aluno.cpf_aluno AS student_cpf , 
            sexo.id_sexo AS student_sex_id , 
            sexo.sexo AS student_sex , 
            aluno.codigo_acesso AS accessCode ,
            aluno.data_nascimento_aluno AS student_birth_date , 
            aluno.naturalidade_aluno AS student_naturalness , 
            aluno.foto_perfil_aluno AS profilePhoto , 
            aluno.nacionalidade_aluno AS student_nacionality , 
            aluno.nome_mae AS student_mother , 
            aluno.nome_pai AS student_father , 
            tipo_sanguineo.tipo_sanguineo AS blood_type , 
            tipo_sanguineo.id_tipo_sanguineo AS blood_type_id , 
            pcd.pcd AS student_pcd , 
            pcd.id_pcd AS student_pcd_id , 
            telefone.numero_telefone AS telephone_number , 
            endereco.id_endereco AS student_address_id , 
            endereco.cep AS student_zipCode , 
            endereco.bairro AS student_district , 
            endereco.endereco AS student_address , 
            endereco.uf AS student_uf , 
            endereco.municipio AS student_county , 
            endereco.id_endereco as address_id , 
            telefone.id_telefone AS telephone_id ,
            email_aluno AS email ,
            situacao_geral_aluno.situacao_geral AS general_student_situation ,
            situacao_geral_aluno.id_situacao_geral AS general_student_situation_id ,
            hierarquia_funcao.hierarquia_funcao AS hierarchyFunction 
            
            FROM aluno 

            INNER JOIN sexo ON(aluno.fk_id_sexo_aluno = sexo.id_sexo) 
            INNER JOIN pcd ON(aluno.fk_id_aluno_pcd = pcd.id_pcd ) 
            INNER JOIN tipo_sanguineo ON(tipo_sanguineo.id_tipo_sanguineo = aluno.fk_id_tipo_sanguineo_aluno) 
            INNER JOIN telefone ON(aluno.fk_id_telefone_aluno = telefone.id_telefone) 
            INNER JOIN endereco ON(aluno.fk_id_endereco_aluno = endereco.id_endereco)
            INNER JOIN situacao_geral_aluno ON(aluno.fk_id_situacao_geral_aluno = situacao_geral_aluno.id_situacao_geral)
            INNER JOIN hierarquia_funcao ON(aluno.fk_id_aluno_hierarquia_funcao = hierarquia_funcao.id_hierarquia_funcao)
            
            WHERE aluno.id_aluno = :id
            
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('studentId'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Buscar alunos
     * 
     * @param object $classe
     * 
     * @return array
     */
    public function seek($classe)
    {

        $query =

            "SELECT 
            
            aluno.id_aluno AS student_id , 
            aluno.nome_aluno AS student_name , 
            aluno.foto_perfil_aluno AS profilePhoto , 
            aluno.cpf_aluno AS student_cpf , 
            serie.sigla AS acronym_series , 
            cedula_turma.cedula AS ballot , 
            curso.sigla AS course , 
            turno.nome_turno AS shift ,
            situacao_aluno_ano_letivo.situacao_aluno as student_situation , 
            situacao_aluno_ano_letivo.id_situacao_aluno as student_situation_id 
            
            FROM aluno 
            
            INNER JOIN matricula ON(aluno.id_aluno = matricula.fk_id_aluno) 
            INNER JOIN turma ON(matricula.fk_id_turma_matricula = turma.id_turma) 
            INNER JOIN serie ON(turma.fk_id_serie = serie.id_serie) 
            INNER JOIN cedula_turma ON(turma.fk_id_cedula = cedula_turma.id_cedula_turma) 
            INNER JOIN curso ON(turma.fk_id_curso = curso.id_curso) 
            INNER JOIN turno ON(turma.fk_id_turno = turno.id_turno) 
            INNER JOIN situacao_aluno_ano_letivo ON(matricula.fk_id_situacao_aluno = situacao_aluno_ano_letivo.id_situacao_aluno) 

            WHERE

            CASE WHEN :fk_id_sex = 0 THEN aluno.fk_id_sexo_aluno <> :fk_id_sex ELSE aluno.fk_id_sexo_aluno = :fk_id_sex END

            AND

            CASE WHEN :fk_id_course = 0 THEN curso.id_curso <> :fk_id_course ELSE curso.id_curso = :fk_id_course END

            AND 

            CASE WHEN :fk_id_shift = 0 THEN turno.id_turno <> :fk_id_shift ELSE turno.id_turno = :fk_id_shift END
            
            AND

            CASE WHEN :fk_id_series = 0 THEN serie.id_serie <> :fk_id_series ELSE serie.id_serie = :fk_id_series END

            AND

            aluno.nome_aluno LIKE :studentName 
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':studentName', "%" . $this->__get('name') . "%", \PDO::PARAM_STR);
        $stmt->bindValue(':fk_id_sex', $this->__get('fk_id_sex'));
        $stmt->bindValue(':fk_id_course', $classe->__get('fk_id_course'));
        $stmt->bindValue(':fk_id_shift', $classe->__get('fk_id_shift'));
        $stmt->bindValue(':fk_id_series', $classe->__get('fk_id_series'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Atualizar foto do perfil do aluno
     * 
     * @return void
     */
    public function updateProfilePicture()
    {

        $query = "UPDATE aluno SET aluno.foto_perfil_aluno = :profilePhoto WHERE aluno.id_aluno = :studentId";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':profilePhoto', $this->__get('profilePhoto'));
        $stmt->bindValue(':studentId', $this->__get('studentId'));

        $stmt->execute();
    }


    /**
     * Esse método verifica se os dados recebidos, correspondem a conta de um aluno.
     *  
     * @return array
     */
    public function login()
    {

        $query =

            "SELECT 

            id_aluno AS student_id,
            nome_aluno AS student_name,
            foto_perfil_aluno AS student_photo,
            fk_id_aluno_hierarquia_funcao AS hierarchy_function,
            matricula.id_matricula AS enrollmentId ,
            serie.sigla AS acronym_series , 
            cedula_turma.cedula AS ballot , 
            curso.nome_curso AS course , 
            turno.nome_turno AS shift ,
            turma.id_turma AS classId
            
            FROM aluno

            INNER JOIN matricula ON(aluno.id_aluno = matricula.fk_id_aluno)  
            INNER JOIN turma ON(matricula.fk_id_turma_matricula = turma.id_turma) 
            INNER JOIN serie ON(turma.fk_id_serie = serie.id_serie) 
            INNER JOIN curso ON(turma.fk_id_curso = curso.id_curso) 
            INNER JOIN cedula_turma ON(turma.fk_id_cedula = cedula_turma.id_cedula_turma) 
            INNER JOIN turno ON(turma.fk_id_turno = turno.id_turno)          
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo)
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)
                                   
            WHERE codigo_acesso = :accessCode AND nome_aluno = :studentName
            
            ORDER BY serie.id_serie DESC
            
            LIMIT 1
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':accessCode', $this->__get('accessCode'));
        $stmt->bindValue(':studentName', $this->__get('name'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Esse método retorna todas as situações gerais que o aluno pode se encrontrar.
     * Entretanto, o mesmo deve ser usado para peencher a tag select na View.
     *  
     * @return array
     */
    public function generalSituationStudent()
    {

        return $this->speedingUp(
            "SELECT id_situacao_geral AS option_value , situacao_geral AS option_text FROM situacao_geral_aluno"
        );
    }


    /**
     * Retorna os últimos alunos matrículados, com a possibilidade de uso de um parâmetro dinâmico.
     * 
     * @param int $limit
     * 
     * @return array
     */
    public function recentlyEnrolledStudents($limit = 5000)
    {

        return $this->speedingUp(

            "SELECT 
            
            aluno.nome_aluno AS studentName , 
            aluno.foto_perfil_aluno AS profilePhoto , 
            aluno.data_matricula_inicial AS initialEnrollmentDate 
            
            FROM aluno 
            
            WHERE aluno.fk_id_situacao_geral_aluno = 1

            ORDER BY aluno.id_aluno DESC LIMIT $limit"
        );
    }


    /**
     * Retorna o total de alunos matrículados no ano atual
     * 
     * @return array
     */
    public function studentsAddedToday()
    {

        $query = "SET @currentDate = (SELECT CURDATE())";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $this->speedingUp(

            "SELECT COUNT(aluno.id_aluno) AS totalStudent
            
            FROM aluno 
            
            WHERE aluno.fk_id_situacao_geral_aluno = 1 AND DATE(aluno.data_matricula_inicial) = DATE(@currentDate)"
        );
    }


    /**
     * Retorna a quantidade de alunos do sexo masculino e feminino
     * 
     * @return array
     */
    public function divisionStudentsBySex()
    {

        return $this->speedingUp(

            "SELECT 

            (SELECT COUNT(aluno.id_aluno) 
                
            FROM aluno 
                
            WHERE aluno.fk_id_sexo_aluno = sexo.id_sexo AND aluno.fk_id_situacao_geral_aluno = 1) AS total , 
                
            sexo.sexo AS sex
                
            FROM sexo"
        );
    }
}
