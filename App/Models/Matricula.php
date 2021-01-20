<?php

namespace App\Models;

use MF\Model\Model;

class Matricula extends Model
{
    private $id_aluno;
    private $nome;
    private $sexo;
    private $cpf;
    private $cep;
    private $uf;
    private $endereco;
    private $bairro;
    private $municipio;
    private $naturalidade;
    private $nascimento;
    private $telefone;
    private $email;
    private $curso;
    private $turno;
    private $turma;
    private $usuario;


    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($novoValor, $atual)
    {
        return $this->$atual = $novoValor;
    }

    public function getDadosCurso()
    {

        $query = "select c.id_curso , c.nome_curso from tb_cursos as c;";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $cursos = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $query = "select t.id_turma , t.nome_turma from tb_turma as t";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $turma = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $query = "select tu.id_turno , tu.nome_turno from tb_turno as tu";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $turno = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return [
            'cursos' => $cursos,
            'turma' => $turma,
            'turno' => $turno
        ];
    }

    public function matricularAluno()
    {

        $query = "insert into tb_alunos(nome_aluno,cpf,email,telefone,data_nascimento,naturalidade,sexo) values (:nome,:cpf,:email,:telefone,:data_nascimento,:naturalidade,:sexo)";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':cpf', $this->__get('cpf'));
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':telefone', $this->__get('telefone'));
        $stmt->bindValue(':data_nascimento', $this->__get('nascimento'));
        $stmt->bindValue(':naturalidade', $this->__get('naturalidade'));
        $stmt->bindValue(':sexo', $this->__get('sexo'));

        $stmt->execute();

        $id = $this->db->lastInsertId();

        $query = "insert into tb_localidade(fk_id_aluno,cep,endereco,bairro,uf,municipio) values (:fk_id_aluno,:cep,:endereco,:bairro,:uf,:municipio);";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_aluno', $id);
        $stmt->bindValue(':cep', $this->__get('cep'));
        $stmt->bindValue(':endereco', $this->__get('endereco'));
        $stmt->bindValue(':bairro', $this->__get('bairro'));
        $stmt->bindValue(':uf', $this->__get('uf'));
        $stmt->bindValue(':municipio', $this->__get('municipio'));

        $stmt->execute();

        $query = "insert into tb_matricula(fk_id_usuario,fk_id_aluno,fk_id_curso,fk_id_turma,fk_id_turno) values 
        (:id_usuario,:id_aluno,:id_curso,:id_turma,:id_turno);";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':id_usuario', $this->__get('usuario'));
        $stmt->bindValue(':id_aluno', $id);
        $stmt->bindValue(':id_curso', $this->__get('curso'));
        $stmt->bindValue(':id_turma', $this->__get('turma'));
        $stmt->bindValue(':id_turno', $this->__get('turno'));

        $stmt->execute();
    }

    public function atualizarDados()
    {

        $query = "update tb_alunos set nome_aluno = :nome , cpf = :cpf , sexo = :sexo ,
		telefone = :telefone , email = :email , data_nascimento = :data_nascimento , naturalidade = :naturalidade
        where id_aluno = :id_aluno";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':cpf', $this->__get('cpf'));
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':telefone', $this->__get('telefone'));
        $stmt->bindValue(':data_nascimento', $this->__get('nascimento'));
        $stmt->bindValue(':naturalidade', $this->__get('naturalidade'));
        $stmt->bindValue(':sexo', $this->__get('sexo'));
        $stmt->bindValue(':id_aluno', $this->__get('id_aluno'));

        $stmt->execute();

        $query = "update tb_localidade set cep = :cep , endereco = :endereco , bairro = :bairro , uf = :uf ,
        municipio = :municipio where fk_id_aluno = :id_aluno ;";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':cep', $this->__get('cep'));
        $stmt->bindValue(':endereco', $this->__get('endereco'));
        $stmt->bindValue(':bairro', $this->__get('bairro'));
        $stmt->bindValue(':uf', $this->__get('uf'));
        $stmt->bindValue(':municipio', $this->__get('municipio'));
        $stmt->bindValue(':id_aluno', $this->__get('id_aluno'));

        $stmt->execute();

        $query = "update tb_matricula set fk_id_curso = :id_curso , fk_id_turma = :id_turma , fk_id_turno = :id_turno where fk_id_aluno = :id_aluno";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_curso', $this->__get('curso'));
        $stmt->bindValue(':id_turma', $this->__get('turma'));
        $stmt->bindValue(':id_turno', $this->__get('turno'));
        $stmt->bindValue(':id_aluno', $this->__get('id_aluno'));

        $stmt->execute();
    }

    public function verificarVaga()
    {

        $query = "select count(*) as total, c.nome_curso , tu.nome_turno , tb_turma.nome_turma from tb_matricula as m 
        left join tb_alunos on(m.fk_id_aluno = tb_alunos.id_aluno)
		left join tb_cursos as c on(m.fk_id_curso = c.id_curso) 
		left join tb_turno as tu on(m.fk_id_turno = tu.id_turno) 
		left join tb_turma on(tb_turma.id_turma = m.fk_id_turma)  
        where m.fk_id_curso = :curso and m.fk_id_turma = :turma and m.fk_id_turno = :turno and c.id_curso = :curso
        and tu.id_turno = :turno and tb_turma.id_turma = :turma
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':curso', $this->__get('curso'));
        $stmt->bindValue(':turma', $this->__get('turma'));
        $stmt->bindValue(':turno', $this->__get('turno'));
        $stmt->execute();

        $totalVagasOcupadas = $stmt->fetchAll(\PDO::FETCH_OBJ);

        $query = "select * from tb_alunos where cpf = :cpf;";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':cpf', $this->__get('cpf'));
        $stmt->execute();

        $situacaoCpf = $stmt->fetchAll(\PDO::FETCH_OBJ);

        $query = "select * from tb_alunos where email = :email;";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->execute();

        $situacaoEmail = $stmt->fetchAll(\PDO::FETCH_OBJ);

        return [
            'totalVagasOcupadas' => $totalVagasOcupadas,
            'situacaoCPF' => $situacaoCpf,
            'situacaoEmail' => $situacaoEmail
        ];
    }

    public function matriculasRecentes($total)
    {

        $query = "select tb_alunos.id_aluno , tb_alunos.data_hora_matricula , tb_alunos.nome_aluno , tb_cursos.nome_curso , 
		tb_turma.nome_turma , tb_turno.nome_turno from tb_matricula 
		left join tb_cursos on(tb_matricula.fk_id_curso = tb_cursos.id_curso) 
		left join tb_turno on(tb_matricula.fk_id_turno = tb_turno.id_turno) 
		left join tb_turma on(tb_turma.id_turma = tb_matricula.fk_id_turma) 
		left join tb_alunos on(tb_matricula.fk_id_aluno = tb_alunos.id_aluno) 
		order by tb_alunos.id_aluno desc limit $total ";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getDataAntiga($data)
    {

        $DiasAtras = date("d/m/Y", time() - (86400 * $data));
        $DiasAtras = explode('/', $DiasAtras);
        $DiasAtras[1] = $DiasAtras[1] . '-';
        $DiasAtras[2] = $DiasAtras[2] . '-';
        $DiasAtras = $DiasAtras[2] . $DiasAtras[1] . $DiasAtras[0];

        return $DiasAtras;
    }

    public function matriculasRealizadasDiasAtras($dias)
    {

        $DiasAtras = $this->getDataAntiga($dias);

        $query = "select count(*) as total from tb_alunos left join tb_matricula on(tb_alunos.id_aluno = tb_matricula.fk_id_aluno) where tb_alunos.data_hora_matricula > '$DiasAtras 00-00-00' ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function fichaAluno()
    {

        $query = "select tb_alunos.nome_aluno, tb_alunos.cpf , tb_alunos.sexo , tb_alunos.telefone , tb_alunos.data_nascimento , tb_alunos.email , tb_alunos.naturalidade , 
        tb_localidade.cep , tb_localidade.endereco , tb_localidade.bairro, tb_localidade.uf, tb_localidade.municipio, 
        tb_cursos.nome_curso , tb_turno.nome_turno, tb_turma.nome_turma, tb_matricula.fk_id_curso, tb_matricula.fk_id_turma , 
        tb_matricula.fk_id_turno, tb_alunos.id_aluno from tb_matricula 
        left join tb_alunos on(tb_matricula.fk_id_aluno = tb_alunos.id_aluno) 
        left join tb_cursos on(tb_matricula.fk_id_curso = tb_cursos.id_curso) 
        left join tb_turno on(tb_matricula.fk_id_turno = tb_turno.id_turno) 
        left join tb_turma on(tb_turma.id_turma = tb_matricula.fk_id_turma) 
        left join tb_localidade on(tb_alunos.id_aluno = tb_localidade.fk_id_aluno)
        where tb_alunos.id_aluno = :id_aluno";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id_aluno", $this->__get('id_aluno'));
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getTotalAlunosCurso()
    {

        $query = "select curso.nome_curso, (select COUNT(matricula.fk_id_curso) from tb_matricula matricula where matricula.fk_id_curso = curso.id_curso) as Alunos from tb_cursos curso";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getMatriculaSemanais()
    {
        $subtotal = [];

        $DiasAtras = [$this->getDataAntiga(6), $this->getDataAntiga(5), $this->getDataAntiga(4), $this->getDataAntiga(3), $this->getDataAntiga(2), $this->getDataAntiga(1), $this->getDataAntiga(0)];

        for($i=0 ; $i < count($DiasAtras) ; $i++) {

            $query = "select count(*) as total from tb_alunos left join tb_matricula on(tb_alunos.id_aluno = tb_matricula.fk_id_aluno) where tb_alunos.data_hora_matricula >= '$DiasAtras[$i] 00:00:00' and tb_alunos.data_hora_matricula <= '$DiasAtras[$i] 23:59:59' ";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            array_push($subtotal,[$stmt->fetch(\PDO::FETCH_OBJ),$DiasAtras[$i]]);
        };

       
        return $subtotal;
    }
}
