<?php

namespace App\Models\Teacher;

use App\Models\People\People;

class Teacher extends People
{

    private $teacherId;

    public function __get($att)
    {
        return $this->$att;
    }


    public function __set($att, $newValue)
    {
        return $this->$att = $newValue;
    }


    /**
     * Cadastrar docente 
     * 
     * @return void
     */
    public function insert()
    {

        $query =

            "INSERT INTO professor 
            
                (nome_professor, cpf_professor, data_nascimento_professor, naturalidade_professor, foto_perfil_professor, nacionalidade_professor,fk_id_sexo_professor, fk_id_tipo_sanguineo_professor, fk_id_pcd_professor, fk_id_endereco_professor, fk_id_telefone_professor , codigo_acesso , email_professor , fk_id_professor_hierarquia_funcao, fk_id_situacao_conta_professor)

            VALUES 
            
                (:teacherName, :cpf, :birthDate, :naturalness, :profilePhoto, :nationality, :fk_id_sex, :fk_id_blood_type, :fk_id_pcd, :fk_id_address,:fk_id_telephone , :accessCode , :email , :fk_id_hierarchy_function , 1)     
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


    /**
     * Retorna todos os docentes cadastrados
     * 
     * @return array
     */
    public function dataGeneral()
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
                                  
            professor.id_professor AS id , 
            professor.nome_professor AS name , 
            professor.cpf_professor AS cpf , 
            sexo.id_sexo AS sex_id , 
            sexo.sexo AS sex , 
            data_hora_matricula AS initial_enrollment_date,
            professor.codigo_acesso AS access_code ,
            professor.data_nascimento_professor AS birth_date , 
            professor.naturalidade_professor AS naturalness , 
            professor.foto_perfil_professor AS profile_photo , 
            professor.nacionalidade_professor AS nationality , 
            tipo_sanguineo.tipo_sanguineo AS blood_type , 
            tipo_sanguineo.id_tipo_sanguineo AS blood_type_id , 
            pcd.pcd AS pcd , 
            pcd.id_pcd AS pcd_id , 
            telefone.numero_telefone AS telephone_number , 
            endereco.id_endereco AS address_id , 
            endereco.cep AS zip_code , 
            endereco.bairro AS district , 
            endereco.endereco AS address , 
            endereco.uf AS uf , 
            endereco.municipio AS county , 
            endereco.id_endereco AS address_id , 
            telefone.id_telefone AS telephone_id ,
            email_professor AS email ,
            professor.codigo_acesso AS access_code ,
            hierarquia_funcao.hierarquia_funcao AS hierarchy_function ,
            hierarquia_funcao.id_hierarquia_funcao AS hierarchy_function_id ,
            situacao_conta.id_situacao_conta AS account_state_id , 
            situacao_conta.situacao_conta AS account_state 
            
            FROM professor 
            
            LEFT JOIN sexo ON(sexo.id_sexo = professor.fk_id_sexo_professor)
            LEFT JOIN turma_disciplina ON(professor.id_professor = turma_disciplina.fk_id_professor)
            LEFT JOIN endereco ON(endereco.id_endereco = professor.fk_id_endereco_professor) 
            LEFT JOIN telefone ON(telefone.id_telefone = professor.fk_id_telefone_professor) 
            LEFT JOIN tipo_sanguineo ON(tipo_sanguineo.id_tipo_sanguineo = professor.fk_id_tipo_sanguineo_professor) 
            LEFT JOIN pcd ON(pcd.id_pcd = professor.fk_id_pcd_professor) 
            INNER JOIN hierarquia_funcao ON(professor.fk_id_professor_hierarquia_funcao = hierarquia_funcao.id_hierarquia_funcao)
            INNER JOIN situacao_conta ON(professor.fk_id_situacao_conta_professor = situacao_conta.id_situacao_conta)

            WHERE professor.id_professor = :teacherId 

        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':teacherId', $this->__get('teacherId'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Buscar docentes
     * 
     * @return array
     */
    public function seek()
    {

        $query =

            "SELECT DISTINCT

            (SELECT COUNT(turma.id_turma) 

            FROM turma_disciplina           
                
            LEFT JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma) 
            LEFT JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo) 
            LEFT JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)         
            LEFT JOIN disciplina ON(disciplina.id_disciplina = turma_disciplina.fk_id_disciplina)

            WHERE turma_disciplina.fk_id_professor = professor.id_professor 
            
            AND situacao_periodo_letivo.id_situacao_periodo_letivo = 1) AS total_discipline ,
                                  
            professor.id_professor AS id , 
            professor.nome_professor AS name , 
            professor.cpf_professor AS cpf , 
            sexo.id_sexo AS sex_id , 
            email_professor AS email ,
            sexo.sexo AS sex ,  
            professor.foto_perfil_professor AS profile_photo ,
            situacao_conta.situacao_conta AS account_status
        
            FROM professor 
            
            LEFT JOIN sexo ON(sexo.id_sexo = professor.fk_id_sexo_professor)
            LEFT JOIN situacao_conta ON(professor.fk_id_situacao_conta_professor = situacao_conta.id_situacao_conta)
            LEFT JOIN turma_disciplina ON(professor.id_professor = turma_disciplina.fk_id_professor)
            INNER JOIN turma ON(turma.id_turma = turma_disciplina.fk_id_turma)
            INNER JOIN curso ON(curso.id_curso = turma.fk_id_curso)
            INNER JOIN serie ON(serie.id_serie = turma.fk_id_serie)
            INNER JOIN turno ON(turno.id_turno = turma.fk_id_turno)
            INNER JOIN sala ON(sala.id_sala = turma.fk_id_sala)
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo) 
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo) 

            WHERE professor.nome_professor LIKE :teacherName 

            AND

            periodo_letivo.fk_id_situacao_periodo_letivo = 1

            AND

            CASE WHEN :fk_id_discipline = 0 THEN turma_disciplina.fk_id_disciplina <> :fk_id_discipline ELSE turma_disciplina.fk_id_disciplina = :fk_id_discipline END

            AND

            CASE WHEN :fk_id_series = 0 THEN serie.id_serie <> :fk_id_series ELSE serie.id_serie = :fk_id_series END

            AND

            CASE WHEN :fk_id_course = 0 THEN curso.id_curso <> :fk_id_course ELSE curso.id_curso = :fk_id_course END

            AND

            CASE WHEN :fk_id_shift = 0 THEN turno.id_turno <> :fk_id_shift ELSE turno.id_turno = :fk_id_shift END

            AND

            CASE WHEN :fk_id_sex = 0 THEN sexo.id_sexo <> :fk_id_sex ELSE sexo.id_sexo = :fk_id_sex END

            AND

            CASE WHEN :fk_id_classroom = 0 THEN sala.id_sala <> :fk_id_classroom ELSE sala.id_sala = :fk_id_classroom END

            ORDER BY professor.nome_professor ASC
            
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':teacherName', "%" . $this->__get('name') . "%", \PDO::PARAM_STR);
        $stmt->bindValue(':fk_id_discipline', $this->__get('fk_id_discipline'));
        $stmt->bindValue(':fk_id_course', $this->__get('fk_id_course'));
        $stmt->bindValue(':fk_id_series', $this->__get('fk_id_series'));
        $stmt->bindValue(':fk_id_shift', $this->__get('fk_id_shift'));
        $stmt->bindValue(':fk_id_sex', $this->__get('fk_id_sex'));
        $stmt->bindValue(':fk_id_classroom', $this->__get('fk_id_classroom'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna todos os docentes cadastrados
     * 
     * @return array
     */
    public function readAll()
    {

        return $this->speedingUp(

            "SELECT DISTINCT

            (SELECT COUNT(turma.id_turma) 

            FROM turma_disciplina           
                
            LEFT JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma) 
            LEFT JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo) 
            LEFT JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)         
            LEFT JOIN disciplina ON(disciplina.id_disciplina = turma_disciplina.fk_id_disciplina)

            WHERE turma_disciplina.fk_id_professor = professor.id_professor 
            
            AND situacao_periodo_letivo.id_situacao_periodo_letivo = 1) AS total_discipline ,
                                  
            professor.id_professor AS id , 
            professor.nome_professor AS name , 
            professor.cpf_professor AS cpf , 
            sexo.id_sexo AS sex_id , 
            email_professor AS email ,
            sexo.sexo AS sex ,  
            professor.foto_perfil_professor AS profile_photo ,
            situacao_conta.situacao_conta AS account_status
        
            FROM professor 
            
            LEFT JOIN sexo ON(sexo.id_sexo = professor.fk_id_sexo_professor)
            LEFT JOIN situacao_conta ON(professor.fk_id_situacao_conta_professor = situacao_conta.id_situacao_conta)
            LEFT JOIN turma_disciplina ON(professor.id_professor = turma_disciplina.fk_id_professor)

            ORDER BY professor.nome_professor ASC"

        );
    }


    /**
     * Atualizar dados do docente
     * 
     * @return void
     */
    public function update()
    {

        $query =

            "UPDATE professor SET 
            
            nome_professor = :teacherName , 
            cpf_professor = :cpf  , 
            codigo_acesso = :accessCode ,
            naturalidade_professor = :naturalness , 
            nacionalidade_professor = :nationality , 
            fk_id_sexo_professor = :fk_id_sex , 
            fk_id_tipo_sanguineo_professor = :fk_id_blood_type, 
            fk_id_pcd_professor = :fk_id_pcd , 
            data_nascimento_professor = :birthDate ,
            email_professor = :email ,
            fk_id_situacao_conta_professor = :fk_id_account_state 
            
            WHERE id_professor = :teacherId
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':teacherName', $this->__get('name'));
        $stmt->bindValue(':cpf', $this->__get('cpf'));
        $stmt->bindValue(':accessCode', $this->__get('accessCode'));
        $stmt->bindValue(':birthDate', $this->__get('birthDate'));
        $stmt->bindValue(':naturalness', $this->__get('naturalness'));
        $stmt->bindValue(':nationality', $this->__get('nationality'));
        $stmt->bindValue(':fk_id_sex', $this->__get('fk_id_sex'));
        $stmt->bindValue(':fk_id_blood_type', $this->__get('fk_id_blood_type'));
        $stmt->bindValue(':fk_id_pcd', $this->__get('fk_id_pcd'));
        $stmt->bindValue(':teacherId', $this->__get('teacherId'));
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':fk_id_account_state', $this->__get('fk_id_account_state'));

        $stmt->execute();
    }


    /**
     * Atualizar dados do docente
     * 
     * @return void
     */
    public function updatePath()
    {

        $query =

            "UPDATE professor SET 
            
            codigo_acesso = :accessCode ,
            fk_id_tipo_sanguineo_professor = :fk_id_blood_type, 
            fk_id_pcd_professor = :fk_id_pcd , 
            email_professor = :email 
            
            WHERE id_professor = :teacherId
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':accessCode', $this->__get('accessCode'));
        $stmt->bindValue(':fk_id_blood_type', $this->__get('fk_id_blood_type'));
        $stmt->bindValue(':fk_id_pcd', $this->__get('fk_id_pcd'));
        $stmt->bindValue(':teacherId', $this->__get('teacherId'));
        $stmt->bindValue(':email', $this->__get('email'));

        $stmt->execute();
    }


    /**
     * Esse método retorna todos os docentes. Entretanto, ele deve ser usado para peencher a tag select na View.
     * 
     * @return array
     */
    public function teacherAvailable()
    {

        return $this->speedingUp(
            "SELECT professor.id_professor AS option_value , professor.nome_professor AS option_text FROM professor ORDER BY professor.nome_professor ASC;"
        );
    }


    /**
     * Atualizar foto do perfil do docente
     * 
     * @return void
     */
    public function updateProfilePicture()
    {

        $query = "UPDATE professor SET professor.foto_perfil_professor = :profilePhoto WHERE professor.id_professor = :teacherId";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':profilePhoto', $this->__get('profilePhoto'));
        $stmt->bindValue(':teacherId', $this->__get('teacherId'));

        $stmt->execute();
    }


    /**
     * Esse método verifica se os dados recebidos, correspondem a conta de um docente.
     * 
     * @return array
     */
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


    /**
     * Retorna as turmas que um docente ministra aulas, seguido do total de disciplinas que o mesmo possui em cada.
     * 
     * @return array
     */
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


    /**
     * Busca turmas no portal do docente
     * 
     * @return array
     */
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


    /**
     * Esse método retorna o total de alunos que o docente possui no período letivo ativo.
     * 
     * @return array
     */
    public function totalStudents()
    {

        $query =

            "SELECT DISTINCT       
            
            (SELECT COUNT(matricula.id_matricula) FROM matricula WHERE matricula.fk_id_turma_matricula = turma.id_turma ) as student_total
            
            FROM turma 
            
            INNER JOIN turma_disciplina ON(turma.id_turma = turma_disciplina.fk_id_turma) 
            INNER JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor) 
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

        return array_reduce($stmt->fetchAll(\PDO::FETCH_OBJ), fn ($sum, $value) => $sum += $value->student_total);
    }


    /**
     * Esse método retorna o total de alunos que foram aprovados e reprovados, nas disciplinas que o docente ministra
     * 
     * @return array
     */
    public function studentBasedFinalAverage()
    {

        $query =

            "SELECT 
            
            (SELECT COUNT(media_disciplina.id_media_disciplina) 
            
            FROM media_disciplina 
            
            INNER JOIN turma_disciplina ON(media_disciplina.fk_id_turma_disciplina = turma_disciplina.id_turma_disciplina) 
            INNER JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor) 
            INNER JOIN matricula ON(media_disciplina.fk_id_matricula_media = matricula.id_matricula) 
            INNER JOIN periodo_letivo ON(matricula.fk_id_periodo_letivo_matricula = periodo_letivo.id_ano_letivo) 
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo) 
            
            WHERE professor.id_professor = :teacherId
            
            AND situacao_periodo_letivo.id_situacao_periodo_letivo = 1 
            
            AND media_disciplina.fk_id_legenda = legenda.id_legenda ) AS total , 
            legenda.sigla AS acronym 
            
            FROM legenda          
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':teacherId', $this->__get('teacherId'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna as notas das avaliações vinculadas a um docente
     * 
     * @return array
     */
    public function readNoteByIdTeacher()
    {

        $query =

            "SELECT 
            avaliacoes.descricao_avaliacao AS exam_description , 
            disciplina.nome_disciplina AS discipline_name , 
            disciplina.id_disciplina AS discipline_id, 
            avaliacoes.valor_avaliacao AS exam_value , 
            nota_avaliacao.valor_nota AS note_value ,
            unidade.unidade AS unity ,
            unidade.id_unidade AS unity_id ,
            nota_avaliacao.id_nota AS note_id ,
            avaliacoes.id_avaliacao AS exam_id ,
            avaliacoes.data_realizada AS realize_date ,
            professor.nome_professor AS teacher_name ,
            professor.foto_perfil_professor AS teacher_profile_photo , 
            matricula.id_matricula AS enrollment_id ,
            aluno.nome_aluno AS student_name ,
            aluno.foto_perfil_aluno AS student_profile_photo  ,
            aluno.id_aluno AS student_id ,
            nota_avaliacao.data_postagem AS post_date ,
            turma_disciplina.id_turma_disciplina AS class_discipline_id
      
            FROM avaliacoes
            
            INNER JOIN turma_disciplina ON(avaliacoes.fk_id_turma_disciplina_avaliacao = turma_disciplina.id_turma_disciplina)
            INNER JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor)
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)
            INNER JOIN nota_avaliacao ON(avaliacoes.id_avaliacao = nota_avaliacao.fk_id_avaliacao)
            INNER JOIN matricula ON(nota_avaliacao.fk_id_matricula_aluno = matricula.id_matricula)
            INNER JOIN unidade ON(avaliacoes.fk_id_unidade_avaliacao = unidade.id_unidade)
            INNER JOIN aluno ON(matricula.fk_id_aluno = aluno.id_aluno)
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo)
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)  
            
            WHERE turma_disciplina.fk_id_professor = :teacherId

            AND situacao_periodo_letivo.id_situacao_periodo_letivo = 1 

            ORDER BY nota_avaliacao.valor_nota DESC
            
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':teacherId', $this->__get('teacherId'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna todas as faltas de um aluno pelo id do docente e aluno
     * 
     * @return array
     */
    public function readLackByIdTeacher()
    {

        $query =

            "SELECT 
            
            falta_aluno.id_falta AS lack_id , 
            falta_aluno.total_faltas AS total_lack , 
            disciplina.nome_disciplina AS discipline_name , 
            unidade.unidade AS unity,
            falta_aluno.fk_id_matricula_falta AS enrollment_id ,
            turma_disciplina.id_turma_disciplina AS class_id ,
            falta_aluno.data_postagem AS post_date ,
            professor.nome_professor AS teacher_name ,
            professor.foto_perfil_professor AS teacher_profile_photo ,
            aluno.foto_perfil_aluno AS student_profile_photo ,
            aluno.nome_aluno AS student_name
            FROM falta_aluno
            
            INNER JOIN matricula ON(falta_aluno.fk_id_matricula_falta = matricula.id_matricula)
            INNER JOIN aluno ON(matricula.fk_id_aluno = aluno.id_aluno)
            LEFT JOIN turma_disciplina ON(falta_aluno.fk_id_turma_disciplina_falta = turma_disciplina.id_turma_disciplina)         
            LEFT JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)         
            LEFT JOIN unidade ON(falta_aluno.fk_id_unidade_falta = unidade.id_unidade)
            LEFT JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor)
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo)
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo) 
           
            WHERE turma_disciplina.fk_id_professor = :teacherId 

            AND situacao_periodo_letivo.id_situacao_periodo_letivo = 1 
   
            ORDER BY falta_aluno.total_faltas DESC
        
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':teacherId', $this->__get('teacherId'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna todas as observações de um aluno com base no id do docente
     * 
     * @return array
     */
    public function readObservationByIdTeacher()
    {

        $query =

            "SELECT  
            
            observacao_aluno.id_observacao AS observation_id ,
            observacao_aluno.descricao AS observation_description ,
            observacao_aluno.data_postagem AS post_date ,
            professor.nome_professor AS teacher_name ,
            professor.foto_perfil_professor AS teacher_profile_photo ,
            unidade.unidade AS unity ,
            disciplina.nome_disciplina AS discipline_name ,
            observacao_aluno.fk_id_matricula_observacao AS enrollment_id ,
            serie.sigla AS series_acronym , 
            cedula_turma.cedula AS ballot , 
            curso.sigla AS course , 
            turno.nome_turno AS shift ,  
            periodo_disponivel.ano_letivo AS school_term ,
            aluno.foto_perfil_aluno AS student_profile_photo ,
            aluno.nome_aluno AS student_name

            FROM observacao_aluno

            INNER JOIN turma_disciplina ON(observacao_aluno.fk_id_turma_disciplina_observacao = turma_disciplina.id_turma_disciplina)
            INNER JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)
            INNER JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor)
            INNER JOIN unidade ON(observacao_aluno.fk_id_unidade = unidade.id_unidade)
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            INNER JOIN cedula_turma ON(turma.fk_id_cedula = cedula_turma.id_cedula_turma) 
            INNER JOIN curso ON(turma.fk_id_curso = curso.id_curso) 
            INNER JOIN serie ON(turma.fk_id_serie = serie.id_serie) 
            INNER JOIN turno ON(turma.fk_id_turno = turno.id_turno)
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo) 
            INNER JOIN periodo_disponivel ON(periodo_letivo.fk_id_ano_letivo = periodo_disponivel.id_periodo_disponivel) 
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)
            INNER JOIN matricula ON(observacao_aluno.fk_id_matricula_observacao = matricula.id_matricula) 
            INNER JOIN aluno ON(matricula.fk_id_aluno = aluno.id_aluno)

            WHERE professor.id_professor = :fk_id_teacher

            AND situacao_periodo_letivo.id_situacao_periodo_letivo = 1 

            ORDER BY observacao_aluno.data_postagem DESC
   
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':fk_id_teacher', $this->__get('teacherId'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna todas as médias finais de um aluno
     * 
     * @return array
     */
    public function readByIdTeacherAverage()
    {

        $query =

            "SELECT 
            media_disciplina.id_media_disciplina AS discipline_avarage_id,
            disciplina.nome_disciplina AS discipline_name,
            media_disciplina.nota_valor AS average,
            legenda.legenda AS subtitle ,
            legenda.id_legenda AS subtitle_id ,
            turma_disciplina.id_turma_disciplina AS discipline_class ,
            matricula.id_matricula AS enrollment_id ,
            media_disciplina.data_postagem AS post_date ,
            professor.nome_professor AS teacher_name ,
            professor.foto_perfil_professor AS teacher_profile_photo ,
            aluno.foto_perfil_aluno AS student_profile_photo ,
            aluno.nome_aluno AS student_name

            FROM media_disciplina

            LEFT JOIN turma_disciplina ON(media_disciplina.fk_id_turma_disciplina = turma_disciplina.id_turma_disciplina)
            INNER JOIN turma ON(turma_disciplina.fk_id_turma = turma.id_turma)
            LEFT JOIN disciplina ON(turma_disciplina.fk_id_disciplina = disciplina.id_disciplina)
            LEFT JOIN legenda ON(media_disciplina.fk_id_legenda = legenda.id_legenda)
            LEFT JOIN matricula ON(media_disciplina.fk_id_matricula_media = matricula.id_matricula)
            LEFT JOIN professor ON(turma_disciplina.fk_id_professor = professor.id_professor)
            INNER JOIN aluno ON(matricula.fk_id_aluno = aluno.id_aluno)
            INNER JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo)
            INNER JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)  
        
            WHERE turma_disciplina.fk_id_professor = :fk_id_teacher 

            AND

            situacao_periodo_letivo.id_situacao_periodo_letivo = 1 
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':fk_id_teacher', $this->__get('teacherId'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Verifica se a conta do docente está ativa
     * 
     * @return array
     */
    public function accountStatus()
    {

        $query = "SELECT professor.fk_id_situacao_conta_professor AS account_status FROM professor WHERE professor.codigo_acesso = :accessCode AND professor.nome_professor = :name";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':accessCode', $this->__get('accessCode'));
        $stmt->bindValue(':name', $this->__get('name'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}
