<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap
{

	protected function initRoutes()
	{

		// Student ( Aluno )


		$routes['adminCadastroAluno'] = array(
			'route' => '/admin/aluno/cadastro',
			'controller' => 'AdminStudentController',
			'action' => 'studentRegistration'
		);

		$routes['adminInsertStudent'] = array(
			'route' => '/admin/aluno/cadastro/inserir',
			'controller' => 'AdminStudentController',
			'action' => 'insertStudent'
		);

		$routes['adminListStudent'] = array(
			'route' => '/admin/aluno/lista',
			'controller' => 'AdminStudentController',
			'action' => 'listStudent'
		);

		$routes['adminListingStudents'] = array(
			'route' => '/admin/aluno/lista/listagem',
			'controller' => 'AdminStudentController',
			'action' => 'studentListing'
		);

		$routes['adminSeekStudent'] = array(
			'route' => '/admin/aluno/lista/buscar',
			'controller' => 'AdminStudentController',
			'action' => 'seekStudent'
		);

		$routes['adminProfileStudent'] = array(
			'route' => '/admin/aluno/lista/perfil-aluno',
			'controller' => 'AdminStudentController',
			'action' => 'studentProfile'
		);

		

		//People

		$routes['dadosGeraisAvailableSex'] = array(
			'route' => '/dados-gerais/lista-sexo',
			'controller' => 'AdminPeopleController',
			'action' => 'availableSex'
		);

		$routes['dadosGeraisPcd'] = array(
			'route' => '/dados-gerais/lista-pcd',
			'controller' => 'AdminPeopleController',
			'action' => 'pcd'
		);

		$routes['dadosGeraisTipoSanguineo'] = array(
			'route' => '/dados-gerais/lista-tipo-sanguineo',
			'controller' => 'AdminPeopleController',
			'action' => 'bloodType'
		);

		$routes['verificarDadosCpf'] = array(
			'route' => '/verificar-dados/cpf',
			'controller' => 'AdminPeopleController',
			'action' => 'checkCpf'
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

		$routes['adminInsertSchoolTerm'] = array(
			'route' => '/admin/gestao/periodo-letivo/inserir',
			'controller' => 'AdminManagementController',
			'action' => 'insertSchoolTerm'
		);

		$routes['adminListSchoolTerm'] = array(
			'route' => '/admin/gestao/periodo-letivo/lista',
			'controller' => 'AdminManagementController',
			'action' => 'listSchoolTerm'
		);

		$routes['adminUpdateSchoolTerm'] = array(
			'route' => '/admin/gestao/periodo-letivo/atualizar',
			'controller' => 'AdminManagementController',
			'action' => 'updateSchoolTerm'
		);

		$routes['adminDeleteSchoolTerm'] = array(
			'route' => '/admin/gestao/periodo-letivo/deletar',
			'controller' => 'AdminManagementController',
			'action' => 'deleteSchoolTerm'
		);

		$routes['adminListSchoolTermSituation'] = array(
			'route' => '/admin/gestao/periodo-letivo/lista-situacao-periodo-letivo',
			'controller' => 'AdminManagementController',
			'action' => 'listSchoolTermSituation'
		);

		$routes['adminAvailableSchoolTerm'] = array(
			'route' => '/admin/gestao/periodo-letivo/lista-anos-disponiveis',
			'controller' => 'AdminManagementController',
			'action' => 'availableSchoolTerm'
		);

		$routes['adminActiveSchoolTerm'] = array(
			'route' => '/admin/gestao/periodo-letivo/ativado',
			'controller' => 'AdminManagementController',
			'action' => 'activeSchoolTerm'
		);


		// Class Room ( Sala de aula )


		$routes['adminSalaGestao'] = array(
			'route' => '/admin/gestao/sala',
			'controller' => 'AdminManagementController',
			'action' => 'ClassRoom'
		);

		$routes['adminInsertClassRoom'] = array(
			'route' => '/admin/gestao/sala/inserir',
			'controller' => 'AdminManagementController',
			'action' => 'insertClassRoom'
		);

		$routes['adminListClassRoom'] = array(
			'route' => '/admin/gestao/sala/lista',
			'controller' => 'AdminManagementController',
			'action' => 'listClassRoom'
		);

		$routes['adminAvailableClassroom'] = array(
			'route' => '/admin/gestao/sala/lista-numeros-disponiveis',
			'controller' => 'AdminManagementController',
			'action' => 'availableClassroom'
		);

		$routes['adminDeleteClassRoom'] = array(
			'route' => '/admin/gestao/sala/deletar',
			'controller' => 'AdminManagementController',
			'action' => 'deleteClassRoom'
		);

		$routes['adminUpdateClassRoom'] = array(
			'route' => '/admin/gestao/sala/atualizar',
			'controller' => 'AdminManagementController',
			'action' => 'updateClassRoom'
		);


		// Course


		$routes['adminCursoGestao'] = array(
			'route' => '/admin/gestao/curso',
			'controller' => 'AdminManagementController',
			'action' => 'managementCourse'
		);

		$routes['adminInsertCourse'] = array(
			'route' => '/admin/gestao/curso/inserir',
			'controller' => 'AdminManagementController',
			'action' => 'insertCourse'
		);

		$routes['adminListCourse'] = array(
			'route' => '/admin/gestao/curso/lista',
			'controller' => 'AdminManagementController',
			'action' => 'listCourse'
		);

		$routes['adminUpdateCourse'] = array(
			'route' => '/admin/gestao/curso/atualizar',
			'controller' => 'AdminManagementController',
			'action' => 'updateCourse'
		);

		$routes['adminDeleteCourse'] = array(
			'route' => '/admin/gestao/curso/deletar',
			'controller' => 'AdminManagementController',
			'action' => 'deleteCourse'
		);


		// Discipline ( Disciplina )


		$routes['adminDisciplinaGestao'] = array(
			'route' => '/admin/gestao/disciplina',
			'controller' => 'AdminManagementController',
			'action' => 'managementDiscipline'
		);

		$routes['adminInsertDiscipline'] = array(
			'route' => '/admin/gestao/disciplina/inserir',
			'controller' => 'AdminManagementController',
			'action' => 'insertDiscipline'
		);

		$routes['adminListDiscipline'] = array(
			'route' => '/admin/gestao/disciplina/lista',
			'controller' => 'AdminManagementController',
			'action' => 'listDiscipline'
		);

		$routes['adminUpdateDiscipline'] = array(
			'route' => '/admin/gestao/disciplina/atualizar',
			'controller' => 'AdminManagementController',
			'action' => 'updateDiscipline'
		);

		$routes['adminDeleteDiscipline'] = array(
			'route' => '/admin/gestao/disciplina/deletar',
			'controller' => 'AdminManagementController',
			'action' => 'deleteDiscipline'
		);

		$routes['adminlistDisciplineModality'] = array(
			'route' => '/admin/gestao/disciplina/lista-modalidades',
			'controller' => 'AdminManagementController',
			'action' => 'listDisciplineModality'
		);

		$routes['adminSeekDiscipline'] = array(
			'route' => '/admin/gestao/disciplina/buscar',
			'controller' => 'AdminManagementController',
			'action' => 'seekDiscipline'
		);

		$routes['adminDisciplineData'] = array(
			'route' => '/admin/gestao/disciplina/dados',
			'controller' => 'AdminManagementController',
			'action' => 'disciplineData'
		);


		// Class ( Turma )


		$routes['adminGestaoTurma'] = array(
			'route' => '/admin/gestao/turma',
			'controller' => 'AdminManagementController',
			'action' => 'ManagementClass'
		);

		$routes['adminInsertClass'] = array(
			'route' => '/admin/gestao/turma/inserir',
			'controller' => 'AdminManagementController',
			'action' => 'insertClass'
		);

		$routes['adminUpdateClass'] = array(
			'route' => '/admin/gestao/turma/atualizar',
			'controller' => 'AdminManagementController',
			'action' => 'updateClass'
		);

		$routes['adminDeleteClass'] = array(
			'route' => '/admin/gestao/turma/deletar',
			'controller' => 'AdminManagementController',
			'action' => 'deleteClass'
		);

		$routes['adminClassData'] = array(
			'route' => '/admin/gestao/turma/dados',
			'controller' => 'AdminManagementController',
			'action' => 'classData'
		);

		$routes['adminListClass'] = array(
			'route' => '/admin/gestao/turma/lista',
			'controller' => 'AdminManagementController',
			'action' => 'listClass'
		);

		$routes['adminAvailableShift'] = array(
			'route' => '/admin/gestao/turma/lista-turnos',
			'controller' => 'AdminManagementController',
			'action' => 'availableShift'
		);

		$routes['adminAvailableBallot'] = array(
			'route' => '/admin/gestao/turma/lista-cedulas',
			'controller' => 'AdminManagementController',
			'action' => 'availableBallot'
		);

		$routes['adminAvailableSeries'] = array(
			'route' => '/admin/gestao/turma/lista-series',
			'controller' => 'AdminManagementController',
			'action' => 'availableSeries'
		);

		$routes['adminAvailableCourse'] = array(
			'route' => '/admin/gestao/turma/lista-cursos',
			'controller' => 'AdminManagementController',
			'action' => 'availableCourse'
		);

		$routes['adminActiveClassRoom'] = array(
			'route' => '/admin/gestao/turma/lista-salas',
			'controller' => 'AdminManagementController',
			'action' => 'activeClassRoom'
		);

		$routes['adminCheckClass'] = array(
			'route' => '/admin/gestao/turma/verificar-dados',
			'controller' => 'AdminManagementController',
			'action' => 'checkClass'
		);

		$routes['adminSeekClass'] = array(
			'route' => '/admin/gestao/turma/buscar',
			'controller' => 'AdminManagementController',
			'action' => 'seekClass'
		);

		$routes['adminAvailableListClass'] = array(
			'route' => '/admin/gestao/turma/lista-turmas-disponiveis',
			'controller' => 'AdminStudentController',
			'action' => 'availableListClass'
		);










		$this->setRoutes($routes);
	}
}
