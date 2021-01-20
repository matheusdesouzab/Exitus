<?php

namespace App\Controllers;

//os recursos do miniframework

use App\Models\Matricula;
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action
{

    public function home()
    {

        $matricula = Container::getModel('Matricula');

        $matriculasRecentes = $matricula->matriculasRecentes(5);
        $matriculasHoje = $matricula->matriculasRealizadasDiasAtras('0');
        $matriculasTotais = $matricula->matriculasRealizadasDiasAtras('1000');

        $this->view->dadosGerais = [
            'matriculasRecentes' => $matriculasRecentes,
            'matriculasHoje' => $matriculasHoje,
            'matriculasTotais' => $matriculasTotais,
        ];

        $this->render('home');
    }

    public function matricula()
    {

        $matricula = Container::getModel('Matricula');
        $dadosCurso = $matricula->getDadosCurso();

        $this->view->dadosCurso = $dadosCurso;

        $this->render('matricula');
    }

    public function listaAlunos(){

        $matricula = Container::getModel('Matricula');

        $matriculasRecentes = $matricula->matriculasRecentes(50);
        $dadosCurso = $matricula->getDadosCurso();

        $this->view->dadosGerais = [
            'matriculasRecentes' => $matriculasRecentes,
            'dadosCurso' => $dadosCurso
        ];

        $this->render('listaMatriculados');
    }

    public function matricular()
    {

        $matricula = Container::getModel('Matricula');

        $matricula->__set('nome', $_POST['nome']);
        $matricula->__set('cpf', $_POST['cpf']);
        $matricula->__set('sexo', $_POST['sexo']);
        $matricula->__set('email', $_POST['email']);
        $matricula->__set('telefone', $_POST['telefone']);
        $matricula->__set('nascimento', $_POST['nascimento']);
        $matricula->__set('naturalidade', $_POST['naturalidade']);

        $matricula->__set('cep', $_POST['cep']);
        $matricula->__set('uf', $_POST['uf']);
        $matricula->__set('endereco', $_POST['endereco']);
        $matricula->__set('bairro', $_POST['bairro']);
        $matricula->__set('municipio', $_POST['municipio']);

        $matricula->__set('curso', $_POST['curso']);
        $matricula->__set('turno', $_POST['turno']);
        $matricula->__set('turma', $_POST['turma']);

        session_start();

        $matricula->__set('usuario', $_SESSION['id_usuario']);

        $matricula->matricularAluno(); 

        echo json_encode($matricula);      

    }

    public function verificarVaga()
    {

        $matricula = Container::getModel('Matricula');

        $matricula->__set('curso', $_GET['curso']);
        $matricula->__set('turma', $_GET['turma']);
        $matricula->__set('turno', $_GET['turno']);
        $matricula->__set('email', $_GET['email']);
        $matricula->__set('cpf', $_GET['cpf']);

        $situacaoVaga = $matricula->verificarVaga();

        echo json_encode($situacaoVaga);
    }

    public function fichaAluno(){

        $matricula = Container::getModel('Matricula');
        $matricula->__set('id_aluno', $_GET['id']);
        $fichadoAluno = $matricula->fichaAluno();

        echo json_encode($fichadoAluno);
        
    }

    public function atualizarDados(){

        $matricula = Container::getModel('Matricula');

        $matricula->__set('nome', $_POST['nome']);
        $matricula->__set('id_aluno', $_POST['id_aluno']);
        $matricula->__set('cpf', $_POST['cpf']);
        $matricula->__set('sexo', $_POST['sexo']);
        $matricula->__set('email', $_POST['email']);
        $matricula->__set('telefone', $_POST['telefone']);
        $matricula->__set('nascimento', $_POST['nascimento']);
        $matricula->__set('naturalidade', $_POST['naturalidade']);

        $matricula->__set('cep', $_POST['cep']);
        $matricula->__set('uf', $_POST['uf']);
        $matricula->__set('endereco', $_POST['endereco']);
        $matricula->__set('bairro', $_POST['bairro']);
        $matricula->__set('municipio', $_POST['municipio']);

        $matricula->__set('curso', $_POST['curso']);
        $matricula->__set('turno', $_POST['turno']);
        $matricula->__set('turma', $_POST['turma']);

        $matricula->atualizarDados();  

        echo json_encode($matricula);      
    
    }

    public function graficoAlunoCurso(){

        $matricula = Container::getModel('Matricula');
        $alunoCurso = $matricula->getTotalAlunosCurso();
        echo json_encode($alunoCurso);
    }

    public function graficoMatriculasSemanais(){

        $matricula = Container::getModel('Matricula');
        $matriculasSemanais = $matricula->getMatriculaSemanais();
        echo json_encode($matriculasSemanais);

    }

    

    

    
}
