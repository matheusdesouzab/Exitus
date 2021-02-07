<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		// ADM

		$routes['home'] = array(
			'route' => '/home',
			'controller' => 'AdmController',
			'action' => 'admHome'
		);

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

		$routes['admCadastroProfessor'] = array(
			'route' => '/admProfessorCadastro',
			'controller' => 'AdmController',
			'action' => 'professor_cadastro'
		);

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