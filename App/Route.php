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
			'route' => '/matriculaAluno',
			'controller' => 'AdmController',
			'action' => 'matricular_aluno'
		);

		$routes['cadastraProfessor'] = array(
			'route' => '/cadastraProfessor',
			'controller' => 'AdmController',
			'action' => 'cadastrar_professor'
		);

		$routes['listaAlunos'] = array(
			'route' => '/listaAlunos',
			'controller' => 'AdmController',
			'action' => 'listaAlunos'
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