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

		// Student ( Aluno )

		$routes['admCadastroAluno'] = array(
			'route' => '/admAlunoCadastro',
			'controller' => 'AdminStudentController',
			'action' => 'studentRegistration'
		);

		$routes['admListaAlunos'] = array(
			'route' => '/admAlunoLista',
			'controller' => 'AdminStudentController',
			'action' => 'studentList'
		);

		// Employee ( Funcionário )

		$routes['admCadastroFuncionario'] = array(
			'route' => '/admFuncionarioCadastro',
			'controller' => 'AdminEmployeeController',
			'action' => 'employeeRegistration'
		);

		$routes['admlistaFuncionario'] = array(
			'route' => '/admFuncionarioLista',
			'controller' => 'AdminEmployeeController',
			'action' => 'employeeList'
		);

		// Management ( Gestão )

		$routes['admGestaoGeral'] = array(
			'route' => '/admGestaoGeral',
			'controller' => 'AdminManagementController',
			'action' => 'managementGeneral'
		);

		$routes['admCursoGestao'] = array(
			'route' => '/admGestaoCursos',
			'controller' => 'AdminManagementController',
			'action' => 'managementCourse'
		);

		$routes['admDisciplinaGestao'] = array(
			'route' => '/admGestaoDisciplinas',
			'controller' => 'AdminManagementController',
			'action' => 'managementDiscipline'
		);

		$routes['admPeriodoLetivoGestao'] = array(
			'route' => '/admGestaoPeriodosLetivos',
			'controller' => 'AdminManagementController',
			'action' => 'managementSchoolTerm'
		);

		$routes['admSalaGestao'] = array(
			'route' => '/admGestaoSalas',
			'controller' => 'AdminManagementController',
			'action' => 'managementRoom'
		);

		$routes['admTurmaGestao'] = array(
			'route' => '/admGestaoTurmas',
			'controller' => 'AdminManagementController',
			'action' => 'managementClass'
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
