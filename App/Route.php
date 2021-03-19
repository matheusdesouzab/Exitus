<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap
{

	protected function initRoutes()
	{


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

		

		$routes['admTurmaGestao'] = array(
			'route' => '/admGestaoTurmas',
			'controller' => 'AdminManagementController',
			'action' => 'managementClass'
		);


		// School Term ( Período letivo )


		$routes['admPeriodoLetivoGestao'] = array(
			'route' => '/admGestaoPeriodosLetivos',
			'controller' => 'AdminManagementController',
			'action' => 'SchoolTerm'
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

		$routes['updateSchoolTerm'] = array(
			'route' => '/updateSchoolTerm',
			'controller' => 'AdminManagementController',
			'action' => 'updateSchoolTerm'
		);

		$routes['deleteSchoolTerm'] = array(
			'route' => '/deleteSchoolTerm',
			'controller' => 'AdminManagementController',
			'action' => 'deleteSchoolTerm'
		);

		$routes['listSchoolTermSituation'] = array(
			'route' => '/listSchoolTermSituation',
			'controller' => 'AdminManagementController',
			'action' => 'listSchoolTermSituation'
		);

		$routes['availableSchoolTerm'] = array(
			'route' => '/availableSchoolTerm',
			'controller' => 'AdminManagementController',
			'action' => 'availableSchoolTerm'
		);

		// Class Room ( Sala de aula )

		$routes['admSalaGestao'] = array(
			'route' => '/admGestaoSalas',
			'controller' => 'AdminManagementController',
			'action' => 'ClassRoom'
		);

		$routes['addClassRoom'] = array(
			'route' => '/addClassRoom',
			'controller' => 'AdminManagementController',
			'action' => 'addClassRoom'
		);

		$routes['listClassRoom'] = array(
			'route' => '/listClassRoom',
			'controller' => 'AdminManagementController',
			'action' => 'listClassRoom'
		);

		$routes['availableClassroom'] = array(
			'route' => '/availableClassroom',
			'controller' => 'AdminManagementController',
			'action' => 'availableClassroom'
		);

		$routes['deleteClassRoom'] = array(
			'route' => '/deleteClassRoom',
			'controller' => 'AdminManagementController',
			'action' => 'deleteClassRoom'
		);

		// Course

		$routes['admCursoGestao'] = array(
			'route' => '/admGestaoCursos',
			'controller' => 'AdminManagementController',
			'action' => 'managementCourse'
		);

		$routes['admAddCourse'] = array(
			'route' => '/addCourse',
			'controller' => 'AdminManagementController',
			'action' => 'addCourse'
		);

		$routes['admListCourse'] = array(
			'route' => '/listCourse',
			'controller' => 'AdminManagementController',
			'action' => 'listCourse'
		);

		$routes['admUpdateCourse'] = array(
			'route' => '/updateCourse',
			'controller' => 'AdminManagementController',
			'action' => 'updateCourse'
		);

		$routes['admDeleteCourse'] = array(
			'route' => '/deleteCourse',
			'controller' => 'AdminManagementController',
			'action' => 'deleteCourse'
		);

		// Discipline ( Disciplina )

		$routes['admDisciplinaGestao'] = array(
			'route' => '/admGestaoDisciplinas',
			'controller' => 'AdminManagementController',
			'action' => 'managementDiscipline'
		);

		$routes['admAddDiscipline'] = array(
			'route' => '/addDiscipline',
			'controller' => 'AdminManagementController',
			'action' => 'addDiscipline'
		);

		$routes['admListDiscipline'] = array(
			'route' => '/listDiscipline',
			'controller' => 'AdminManagementController',
			'action' => 'listDiscipline'
		);

		$routes['admUpdateDiscipline'] = array(
			'route' => '/updateDiscipline',
			'controller' => 'AdminManagementController',
			'action' => 'updateDiscipline'
		);

		$routes['admDeleteDiscipline'] = array(
			'route' => '/deleteDiscipline',
			'controller' => 'AdminManagementController',
			'action' => 'deleteDiscipline'
		);

		$routes['admlistDisciplineModality'] = array(
			'route' => '/listDisciplineModality',
			'controller' => 'AdminManagementController',
			'action' => 'listDisciplineModality'
		);

		$routes['admSeekDiscipline'] = array(
			'route' => '/seekDiscipline',
			'controller' => 'AdminManagementController',
			'action' => 'seekDiscipline'
		);

		$routes['admDisciplineData'] = array(
			'route' => '/disciplineData',
			'controller' => 'AdminManagementController',
			'action' => 'disciplineData'
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
