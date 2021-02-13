<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		// Home

		$routes['home'] = array(
			'route' => '/home',
			'controller' => 'AdmController',
			'action' => 'admHome'
		);

		// Aluno

		$routes['admCadastroAluno'] = array(
			'route' => '/admAlunoCadastro',
			'controller' => 'AdmController',
			'action' => 'aluno_cadastro'
		);

		$routes['admListaAlunos'] = array(
			'route' => '/admAlunoLista',
			'controller' => 'AdmController',
			'action' => 'aluno_lista'
		);

		// Funcionário

		$routes['admCadastroFuncionario'] = array(
			'route' => '/admFuncionarioCadastro',
			'controller' => 'AdmController',
			'action' => 'funcionario_cadastro'
		);

		$routes['admlistaFuncionario'] = array(
			'route' => '/admFuncionariolista',
			'controller' => 'AdmController',
			'action' => 'funcionario_lista'
		);

		// Gestão

		$routes['admGestaoGeral'] = array(
			'route' => '/admGestaoGeral',
			'controller' => 'AdmController',
			'action' => 'gestao_geral'
		);

		$routes['admCursoGestao'] = array(
			'route' => '/admGestaoCursos',
			'controller' => 'AdmController',
			'action' => 'gestao_curso'
		);

		$routes['admDisciplinaGestao'] = array(
			'route' => '/admGestaoDisciplinas',
			'controller' => 'AdmController',
			'action' => 'gestao_disciplina'
		);

		$routes['admPeriodoLetivoGestao'] = array(
			'route' => '/admGestaoPeriodosLetivos',
			'controller' => 'AdmController',
			'action' => 'gestao_periodosLetivos'
		);

		$routes['admSalaGestao'] = array(
			'route' => '/admGestaoSalas',
			'controller' => 'AdmController',
			'action' => 'gestao_salas'
		);

		










		$routes['index'] = array(
			'route' => '/',
			'controller' => 'IndexController',
			'action' => 'index'
		);

		$routes['autenticar'] = array(
			'route' => '/autenticar',
			'controller' => 'AuthController',
			'action' => 'autenticar'
		);

		

		$routes['matricular'] = array(
			'route' => '/matricular',
			'controller' => 'AppController',
			'action' => 'matricular'
		);

		$routes['verificarVaga'] = array(
			'route' => '/verificarVaga',
			'controller' => 'AppController',
			'action' => 'verificarVaga'
		);	
	

		$this->setRoutes($routes);
	}

}

?>