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

		$routes['matriculaAluno'] = array(
			'route' => '/alunoMatricula',
			'controller' => 'AdmController',
			'action' => 'aluno_matricula'
		);

		$routes['cadastraProfessor'] = array(
			'route' => '/cadastraProfessor',
			'controller' => 'AdmController',
			'action' => 'cadastrar_professor'
		);

		$routes['listaAlunos'] = array(
			'route' => '/alunoLista',
			'controller' => 'AdmController',
			'action' => 'alunoLista'
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