<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap
{

	protected function initRoutes()
	{


		// Student ( Aluno )


		$routes['admCadastroAluno'] = array(
			'route' => '/admin/aluno/cadastro',
			'controller' => 'AdminStudentController',
			'action' => 'studentRegistration'
		);

		$routes['adminInsertStudent'] = array(
			'route' => '/admin/aluno/cadastro/inserir',
			'controller' => 'AdminStudentController',
			'action' => 'insertStudent'
		);

		$routes['admListaAlunos'] = array(
			'route' => '/admAlunoLista',
			'controller' => 'AdminStudentController',
			'action' => 'studentList'
		);

		$routes['availableSex'] = array(
			'route' => '/admin/sexoDisponiveis',
			'controller' => 'AdminStudentController',
			'action' => 'availableSex'
		);

		$routes['pcd'] = array(
			'route' => '/admin/pcd',
			'controller' => 'AdminStudentController',
			'action' => 'pcd'
		);

		$routes['tipoSanguineo'] = array(
			'route' => '/admin/tipoSanguineo',
			'controller' => 'AdminStudentController',
			'action' => 'bloodType'
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


		$routes['adminGestao'] = array(
			'route' => '/admin/gestao',
			'controller' => 'AdminManagementController',
			'action' => 'managementGeneral'
		);


		// School Term ( Período letivo )


		$routes['adminPeriodoLetivo'] = array(
			'route' => '/admin/gestao/periodo-letivo',
			'controller' => 'AdminManagementController',
			'action' => 'SchoolTerm'
		);

		$routes['admininsertSchoolTerm'] = array(
			'route' => '/admin/gestao/periodo-letivo/inserir',
			'controller' => 'AdminManagementController',
			'action' => 'insertSchoolTerm'
		);

		$routes['listSchoolTerm'] = array(
			'route' => '/admin/gestao/periodo-letivo/lista',
			'controller' => 'AdminManagementController',
			'action' => 'listSchoolTerm'
		);

		$routes['updateSchoolTerm'] = array(
			'route' => '/admin/gestao/periodo-letivo/atualizar',
			'controller' => 'AdminManagementController',
			'action' => 'updateSchoolTerm'
		);

		$routes['deleteSchoolTerm'] = array(
			'route' => '/admin/gestao/periodo-letivo/deletar',
			'controller' => 'AdminManagementController',
			'action' => 'deleteSchoolTerm'
		);

		$routes['listSchoolTermSituation'] = array(
			'route' => '/admin/gestao/periodo-letivo/lista-situacao-periodo-letivo',
			'controller' => 'AdminManagementController',
			'action' => 'listSchoolTermSituation'
		);

		$routes['availableSchoolTerm'] = array(
			'route' => '/admin/gestao/periodo-letivo/lista-anos-disponiveis',
			'controller' => 'AdminManagementController',
			'action' => 'availableSchoolTerm'
		);

		$routes['admActiveSchoolTerm'] = array(
			'route' => '/admin/gestao/periodo-letivo/ativado',
			'controller' => 'AdminManagementController',
			'action' => 'activeSchoolTerm'
		);


		// Class Room ( Sala de aula )


		$routes['admSalaGestao'] = array(
			'route' => '/admin/gestao/sala',
			'controller' => 'AdminManagementController',
			'action' => 'ClassRoom'
		);

		$routes['insertClassRoom'] = array(
			'route' => '/admin/gestao/sala/inserir',
			'controller' => 'AdminManagementController',
			'action' => 'insertClassRoom'
		);

		$routes['listClassRoom'] = array(
			'route' => '/admin/gestao/sala/lista',
			'controller' => 'AdminManagementController',
			'action' => 'listClassRoom'
		);

		$routes['availableClassroom'] = array(
			'route' => '/admin/gestao/sala/lista-numeros-disponiveis',
			'controller' => 'AdminManagementController',
			'action' => 'availableClassroom'
		);

		$routes['deleteClassRoom'] = array(
			'route' => '/admin/gestao/sala/deletar',
			'controller' => 'AdminManagementController',
			'action' => 'deleteClassRoom'
		);

		$routes['updateClassRoom'] = array(
			'route' => '/admin/gestao/sala/atualizar',
			'controller' => 'AdminManagementController',
			'action' => 'updateClassRoom'
		);


		// Course


		$routes['admCursoGestao'] = array(
			'route' => '/admin/gestao/curso',
			'controller' => 'AdminManagementController',
			'action' => 'managementCourse'
		);

		$routes['adminsertCourse'] = array(
			'route' => '/admin/gestao/curso/inserir',
			'controller' => 'AdminManagementController',
			'action' => 'insertCourse'
		);

		$routes['admListCourse'] = array(
			'route' => '/admin/gestao/curso/lista',
			'controller' => 'AdminManagementController',
			'action' => 'listCourse'
		);

		$routes['admUpdateCourse'] = array(
			'route' => '/admin/gestao/curso/atualizar',
			'controller' => 'AdminManagementController',
			'action' => 'updateCourse'
		);

		$routes['admDeleteCourse'] = array(
			'route' => '/admin/gestao/curso/deletar',
			'controller' => 'AdminManagementController',
			'action' => 'deleteCourse'
		);


		// Discipline ( Disciplina )


		$routes['admDisciplinaGestao'] = array(
			'route' => '/admin/gestao/disciplina',
			'controller' => 'AdminManagementController',
			'action' => 'managementDiscipline'
		);

		$routes['adminsertDiscipline'] = array(
			'route' => '/admin/gestao/disciplina/inserir',
			'controller' => 'AdminManagementController',
			'action' => 'insertDiscipline'
		);

		$routes['admListDiscipline'] = array(
			'route' => '/admin/gestao/disciplina/lista',
			'controller' => 'AdminManagementController',
			'action' => 'listDiscipline'
		);

		$routes['admUpdateDiscipline'] = array(
			'route' => '/admin/gestao/disciplina/atualizar',
			'controller' => 'AdminManagementController',
			'action' => 'updateDiscipline'
		);

		$routes['admDeleteDiscipline'] = array(
			'route' => '/admin/gestao/disciplina/deletar',
			'controller' => 'AdminManagementController',
			'action' => 'deleteDiscipline'
		);

		$routes['admlistDisciplineModality'] = array(
			'route' => '/admin/gestao/disciplina/lista-modalidades',
			'controller' => 'AdminManagementController',
			'action' => 'listDisciplineModality'
		);

		$routes['admSeekDiscipline'] = array(
			'route' => '/admin/gestao/disciplina/buscar',
			'controller' => 'AdminManagementController',
			'action' => 'seekDiscipline'
		);

		$routes['admDisciplineData'] = array(
			'route' => '/admin/gestao/disciplina/dados',
			'controller' => 'AdminManagementController',
			'action' => 'disciplineData'
		);


		// Class ( Turma )


		$routes['admGestaoTurma'] = array(
			'route' => '/admin/gestao/turma',
			'controller' => 'AdminManagementController',
			'action' => 'ManagementClass'
		);

		$routes['admInsertClass'] = array(
			'route' => '/admin/gestao/turma/inserir',
			'controller' => 'AdminManagementController',
			'action' => 'insertClass'
		);

		$routes['admUpdateClass'] = array(
			'route' => '/admin/gestao/turma/atualizar',
			'controller' => 'AdminManagementController',
			'action' => 'updateClass'
		);

		$routes['admDeleteClass'] = array(
			'route' => '/admin/gestao/turma/deletar',
			'controller' => 'AdminManagementController',
			'action' => 'deleteClass'
		);

		$routes['admClassData'] = array(
			'route' => '/admin/gestao/turma/dados',
			'controller' => 'AdminManagementController',
			'action' => 'classData'
		);

		$routes['admListClass'] = array(
			'route' => '/admin/gestao/turma/lista',
			'controller' => 'AdminManagementController',
			'action' => 'listClass'
		);

		$routes['admAvailableShift'] = array(
			'route' => '/admin/gestao/turma/lista-turnos',
			'controller' => 'AdminManagementController',
			'action' => 'availableShift'
		);

		$routes['admAvailableBallot'] = array(
			'route' => '/admin/gestao/turma/lista-cedulas',
			'controller' => 'AdminManagementController',
			'action' => 'availableBallot'
		);

		$routes['admAvailableSeries'] = array(
			'route' => '/admin/gestao/turma/lista-series',
			'controller' => 'AdminManagementController',
			'action' => 'availableSeries'
		);

		$routes['admAvailableCourse'] = array(
			'route' => '/admin/gestao/turma/lista-cursos',
			'controller' => 'AdminManagementController',
			'action' => 'availableCourse'
		);

		$routes['admActiveClassRoom'] = array(
			'route' => '/admin/gestao/turma/lista-salas',
			'controller' => 'AdminManagementController',
			'action' => 'activeClassRoom'
		);

		$routes['admCheckClass'] = array(
			'route' => '/admin/gestao/turma/verificar-dados',
			'controller' => 'AdminManagementController',
			'action' => 'checkClass'
		);

		$routes['admseekClass'] = array(
			'route' => '/admin/gestao/turma/buscar',
			'controller' => 'AdminManagementController',
			'action' => 'seekClass'
		);

		$routes['admAvailableListClass'] = array(
			'route' => '/admin/gestao/turma/turmas-disponiveis',
			'controller' => 'AdminManagementController',
			'action' => 'availableListClass'
		);









		$this->setRoutes($routes);
	}
}
