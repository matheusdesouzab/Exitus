<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['index'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);

		$routes['autenticar'] = array(
			'route' => '/autenticar',
			'controller' => 'AuthController',
			'action' => 'autenticar'
		);

		$routes['home'] = array(
			'route' => '/home',
			'controller' => 'AppController',
			'action' => 'home'
		);

		$routes['matricula'] = array(
			'route' => '/matricula',
			'controller' => 'AppController',
			'action' => 'matricula'
		);

		$routes['listaAlunos'] = array(
			'route' => '/listaAlunos',
			'controller' => 'AppController',
			'action' => 'listaAlunos'
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

		$routes['fichaAluno'] = array(
			'route' => '/fichaAluno',
			'controller' => 'AppController',
			'action' => 'fichaAluno'
		);

		$routes['atualizarDados'] = array(
			'route' => '/atualizarDados',
			'controller' => 'AppController',
			'action' => 'atualizarDados'
		);

		$routes['graficoAlunoCurso'] = array(
			'route' => '/graficoAlunoCurso',
			'controller' => 'AppController',
			'action' => 'graficoAlunoCurso'
		);

		$routes['graficoMatriculasSemanais'] = array(
			'route' => '/graficoMatriculasSemanais',
			'controller' => 'AppController',
			'action' => 'graficoMatriculasSemanais'
		);

		$this->setRoutes($routes);
	}

}

?>