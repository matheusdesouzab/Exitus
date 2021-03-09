<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {


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


		$routes['admCadastroProfessor'] = array(
			'route' => '/admProfessorCadastro',
			'controller' => 'AdminTeacherController',
			'action' => 'teacherRegistration'
		);

		$routes['admlistaProfessor'] = array(
			'route' => '/admProfessorLista',
			'controller' => 'AdminTeacherController',
			'action' => 'teacherList'
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


		
		$routes['addSchoolTerm'] = array(
			'route' => '/addSchoolTerm',
			'controller' => 'AdminManagementController',
			'action' => 'addSchoolTerm'
		);

		$routes['listSchoolTerm'] = array(
			'route' => '/listSchoolTerm',
			'controller' => 'AdminManagementController',
			'action' => 'listSchoolTerm'
		);

		$routes['lastSchoolTerm'] = array(
			'route' => '/lastSchoolTerm',
			'controller' => 'AdminManagementController',
			'action' => 'lastSchoolTerm'
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
	

		$this->setRoutes($routes);
	}

}
