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


		// Management General ( Gestão General )


		$routes['admGestaoGeral'] = array(
			'route' => '/admGestaoGeral',
			'controller' => 'AdminManagementController',
			'action' => 'managementGeneral'
		);


		// School Term ( Período letivo )


		$routes['admPeriodoLetivoGestao'] = array(
			'route' => '/admGestaoPeriodosLetivos',
			'controller' => 'AdminManagementController',
			'action' => 'SchoolTerm'
		);

		$routes['insertSchoolTerm'] = array(
			'route' => '/insertSchoolTerm',
			'controller' => 'AdminManagementController',
			'action' => 'insertSchoolTerm'
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

		$routes['insertClassRoom'] = array(
			'route' => '/insertClassRoom',
			'controller' => 'AdminManagementController',
			'action' => 'insertClassRoom'
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

		$routes['updateClassRoom'] = array(
			'route' => '/updateClassRoom',
			'controller' => 'AdminManagementController',
			'action' => 'updateClassRoom'
		);


		// Course


		$routes['admCursoGestao'] = array(
			'route' => '/admGestaoCursos',
			'controller' => 'AdminManagementController',
			'action' => 'managementCourse'
		);

		$routes['adminsertCourse'] = array(
			'route' => '/insertCourse',
			'controller' => 'AdminManagementController',
			'action' => 'insertCourse'
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

		$routes['adminsertDiscipline'] = array(
			'route' => '/insertDiscipline',
			'controller' => 'AdminManagementController',
			'action' => 'insertDiscipline'
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


		// Class ( Turma )

		
		$routes['admGestaoTurma'] = array(
			'route' => '/admGestaoTurmas',
			'controller' => 'AdminManagementController',
			'action' => 'ManagementClass'
		);

		$routes['admInsertClass'] = array(
			'route' => '/insertClass',
			'controller' => 'AdminManagementController',
			'action' => 'insertClass'
		);

		$routes['admUpdateClass'] = array(
			'route' => '/updateClass',
			'controller' => 'AdminManagementController',
			'action' => 'updateClass'
		);

		$routes['admDeleteClass'] = array(
			'route' => '/deleteClass',
			'controller' => 'AdminManagementController',
			'action' => 'deleteClass'
		);

		$routes['admClassData'] = array(
			'route' => '/classData',
			'controller' => 'AdminManagementController',
			'action' => 'classData'
		);

		$routes['admListClass'] = array(
			'route' => '/listClass',
			'controller' => 'AdminManagementController',
			'action' => 'listClass'
		);

		$routes['admAvailableShift'] = array(
			'route' => '/availableShift',
			'controller' => 'AdminManagementController',
			'action' => 'availableShift'
		);

		$routes['admAvailableBallot'] = array(
			'route' => '/availableBallot',
			'controller' => 'AdminManagementController',
			'action' => 'availableBallot'
		);

		$routes['admAvailableSeries'] = array(
			'route' => '/availableSeries',
			'controller' => 'AdminManagementController',
			'action' => 'availableSeries'
		);

		$routes['admAvailableCourse'] = array(
			'route' => '/availableCourse',
			'controller' => 'AdminManagementController',
			'action' => 'availableCourse'
		);

		$routes['admActiveSchoolTerm'] = array(
			'route' => '/activeSchoolTerm',
			'controller' => 'AdminManagementController',
			'action' => 'activeSchoolTerm'
		);

		$routes['admActiveClassRoom'] = array(
			'route' => '/activeClassRoom',
			'controller' => 'AdminManagementController',
			'action' => 'activeClassRoom'
		);

		$routes['admCheckClass'] = array(
			'route' => '/checkClass',
			'controller' => 'AdminManagementController',
			'action' => 'checkClass'
		);

		$routes['admseekClass'] = array(
			'route' => '/seekClass',
			'controller' => 'AdminManagementController',
			'action' => 'seekClass'
		);









		$this->setRoutes($routes);
	}
}
