<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap
{

	protected function initRoutes()
	{

		// Admin routes


			$routes['admin'] = array(
				'route' => '/admin',
				'controller' => 'AdminController',
				'action' => 'index'
			);

			$routes['adminLogin'] = array(
				'route' => '/admin/login',
				'controller' => 'AdminController',
				'action' => 'auth'
			);

			$routes['adminExit'] = array(
				'route' => '/admin/sair',
				'controller' => 'AdminController',
				'action' => 'exit'
			);


			// Student 


			$routes['adminStudentRegistration'] = array(
				'route' => '/admin/aluno/cadastro',
				'controller' => 'AdminStudentController',
				'action' => 'studentRegistration'
			);

			$routes['adminStudentInsert'] = array(
				'route' => '/admin/aluno/cadastro/inserir',
				'controller' => 'AdminStudentController',
				'action' => 'studentInsert'
			);

			$routes['adminStudentList'] = array(
				'route' => '/admin/aluno/lista',
				'controller' => 'AdminStudentController',
				'action' => 'studentList'
			);

			$routes['adminStudentListing'] = array(
				'route' => '/admin/aluno/lista/listagem',
				'controller' => 'AdminStudentController',
				'action' => 'studentListing'
			);

			$routes['adminStudentSeek'] = array(
				'route' => '/admin/aluno/lista/buscar',
				'controller' => 'AdminStudentController',
				'action' => 'studentSeek'
			);

			$routes['adminStudentProfile'] = array(
				'route' => '/admin/aluno/lista/perfil-aluno',
				'controller' => 'AdminStudentController',
				'action' => 'studentProfile'
			);

			$routes['adminUpdateStudentProfile'] = array(
				'route' => '/admin/aluno/lista/perfil-aluno/atualizar',
				'controller' => 'AdminStudentController',
				'action' => 'updateStudentProfile'
			); 

			$routes['adminUpdateStudentProfilePicture'] = array(
				'route' => '/admin/aluno/lista/perfil-aluno/atualizar-foto',
				'controller' => 'AdminStudentController',
				'action' => 'updateStudentProfilePicture'
			); 

			$routes['adminUpdateTeacherProfilePicture'] = array(
				'route' => '/admin/professor/lista/perfil-professor/atualizar-foto',
				'controller' => 'AdminTeacherController',
				'action' => 'updateTeacherProfilePicture'
			); 
			

			// People 
			

			$routes['checkCpf'] = array(
				'route' => '/verificar-dados/cpf',
				'controller' => 'AdminPeopleController',
				'action' => 'checkCpf'
			);


			// Teacher


			$routes['adminTeacherRegistration'] = array(
				'route' => '/admin/professor/cadastro',
				'controller' => 'AdminTeacherController',
				'action' => 'teacherRegistration'
			);

			$routes['adminTeacherInsert'] = array(
				'route' => '/admin/professor/cadastro/inserir',
				'controller' => 'AdminTeacherController',
				'action' => 'teacherInsert'
			);

			$routes['adminTeacherList'] = array(
				'route' => '/admin/professor/lista',
				'controller' => 'AdminTeacherController',
				'action' => 'teacherList'
			);

			$routes['adminTeacherListing'] = array(
				'route' => '/admin/professor/lista/listagem',
				'controller' => 'AdminTeacherController',
				'action' => 'teacherListing'
			);

			$routes['adminTeacherProfile'] = array(
				'route' => '/admin/professor/lista/perfil-professor',
				'controller' => 'AdminTeacherController',
				'action' => 'teacherProfile'
			);

			$routes['adminTeacherUpdate'] = array(
				'route' => '/admin/professor/lista/perfil-professor/atualizar',
				'controller' => 'AdminTeacherController',
				'action' => 'updateTeacherProfile'
			);

			


			// Management general routes


			$routes['adminManagementGeneral'] = array(
				'route' => '/admin/gestao',
				'controller' => 'AdminManagementController',
				'action' => 'managementGeneral'
			);


			// School term routes


			$routes['adminSchoolTermManagement'] = array(
				'route' => '/admin/gestao/periodo-letivo',
				'controller' => 'AdminManagementController',
				'action' => 'schoolTermManagement'
			);

			$routes['adminSchoolTermInsert'] = array(
				'route' => '/admin/gestao/periodo-letivo/inserir',
				'controller' => 'AdminManagementController',
				'action' => 'schoolTermInsert'
			);

			$routes['adminSchoolTermList'] = array(
				'route' => '/admin/gestao/periodo-letivo/lista',
				'controller' => 'AdminManagementController',
				'action' => 'schoolTermList'
			);

			$routes['adminSchoolTermUpdate'] = array(
				'route' => '/admin/gestao/periodo-letivo/atualizar',
				'controller' => 'AdminManagementController',
				'action' => 'schoolTermUpdate'
			);

			$routes['adminSchoolTermDelete'] = array(
				'route' => '/admin/gestao/periodo-letivo/deletar',
				'controller' => 'AdminManagementController',
				'action' => 'schoolTermDelete'
			);


			$routes['adminSchoolTermAvailable'] = array(
				'route' => '/admin/gestao/periodo-letivo/lista-anos-disponiveis',
				'controller' => 'AdminManagementController',
				'action' => 'schoolTermAvailable'
			);


			// Class room routes


			$routes['adminClassRoomManagement'] = array(
				'route' => '/admin/gestao/sala',
				'controller' => 'AdminManagementController',
				'action' => 'classRoomManagement'
			);

			$routes['adminClassRoomInsert'] = array(
				'route' => '/admin/gestao/sala/inserir',
				'controller' => 'AdminManagementController',
				'action' => 'classRoomInsert'
			);

			$routes['adminClassRoomList'] = array(
				'route' => '/admin/gestao/sala/lista',
				'controller' => 'AdminManagementController',
				'action' => 'classRoomList'
			);

			$routes['adminAvailableRoomNumbers'] = array(
				'route' => '/admin/gestao/sala/lista-numeros-disponiveis',
				'controller' => 'AdminManagementController',
				'action' => 'availableRoomNumbers'
			);

			$routes['adminClassRoomDelete'] = array(
				'route' => '/admin/gestao/sala/deletar',
				'controller' => 'AdminManagementController',
				'action' => 'classRoomDelete'
			);

			$routes['adminClassRoomUpdate'] = array(
				'route' => '/admin/gestao/sala/atualizar',
				'controller' => 'AdminManagementController',
				'action' => 'classRoomUpdate'
			);

			$routes['adminActiveClassRoom'] = array(
				'route' => '/admin/gestao/turma/lista-salas',
				'controller' => 'AdminManagementController',
				'action' => 'activeClassRoom'
			);


			// Course routes


			$routes['adminCourseManagement'] = array(
				'route' => '/admin/gestao/curso',
				'controller' => 'AdminManagementController',
				'action' => 'courseManagement'
			);

			$routes['adminCourseInsert'] = array(
				'route' => '/admin/gestao/curso/inserir',
				'controller' => 'AdminManagementController',
				'action' => 'courseInsert'
			);

			$routes['adminCourseList'] = array(
				'route' => '/admin/gestao/curso/lista',
				'controller' => 'AdminManagementController',
				'action' => 'courseList'
			);

			$routes['adminCourseUpdate'] = array(
				'route' => '/admin/gestao/curso/atualizar',
				'controller' => 'AdminManagementController',
				'action' => 'courseUpdate'
			);

			$routes['adminCourseDelete'] = array(
				'route' => '/admin/gestao/curso/deletar',
				'controller' => 'AdminManagementController',
				'action' => 'courseDelete'
			);

			$routes['adminAvailableCourse'] = array(
				'route' => '/admin/gestao/turma/lista-cursos',
				'controller' => 'AdminManagementController',
				'action' => 'availableCourse'
			);


			// Discipline routes


			$routes['adminDisciplineManagement'] = array(
				'route' => '/admin/gestao/disciplina',
				'controller' => 'AdminManagementController',
				'action' => 'disciplineManagement'
			);

			$routes['adminDisciplineInsert'] = array(
				'route' => '/admin/gestao/disciplina/inserir',
				'controller' => 'AdminManagementController',
				'action' => 'disciplineInsert'
			);

			$routes['adminDisciplineList'] = array(
				'route' => '/admin/gestao/disciplina/lista',
				'controller' => 'AdminManagementController',
				'action' => 'disciplineList'
			);

			$routes['adminDisciplineUpdate'] = array(
				'route' => '/admin/gestao/disciplina/atualizar',
				'controller' => 'AdminManagementController',
				'action' => 'disciplineUpdate'
			);

			$routes['adminDisciplineDelete'] = array(
				'route' => '/admin/gestao/disciplina/deletar',
				'controller' => 'AdminManagementController',
				'action' => 'disciplineDelete'
			);

			$routes['adminDisciplineSeek'] = array(
				'route' => '/admin/gestao/disciplina/buscar',
				'controller' => 'AdminManagementController',
				'action' => 'disciplineSeek'
			);

			$routes['adminDisciplineData'] = array(
				'route' => '/admin/gestao/disciplina/dados',
				'controller' => 'AdminManagementController',
				'action' => 'disciplineData'
			);

			$routes['adminDisciplineAvailable'] = array(
				'route' => '/admin/gestao/disciplina/disponiveis',
				'controller' => 'AdminManagementController',
				'action' => 'disciplineAvailable'
			);


			// Class routes


			$routes['adminClassManagement'] = array(
				'route' => '/admin/gestao/turma',
				'controller' => 'AdminManagementController',
				'action' => 'classManagement'
			);

			$routes['adminClassInsert'] = array(
				'route' => '/admin/gestao/turma/inserir',
				'controller' => 'AdminManagementController',
				'action' => 'classInsert'
			);

			$routes['adminClassUpdate'] = array(
				'route' => '/admin/gestao/turma/atualizar',
				'controller' => 'AdminManagementController',
				'action' => 'classUpdate'
			);

			$routes['adminClassDelete'] = array(
				'route' => '/admin/gestao/turma/deletar',
				'controller' => 'AdminManagementController',
				'action' => 'classDelete'
			);

			$routes['adminClassData'] = array(
				'route' => '/admin/gestao/turma/dados',
				'controller' => 'AdminManagementController',
				'action' => 'classData'
			);

			$routes['adminClassList'] = array(
				'route' => '/admin/gestao/turma/lista',
				'controller' => 'AdminManagementController',
				'action' => 'classList'
			);

			$routes['adminClassCheck'] = array(
				'route' => '/admin/gestao/turma/verificar-dados',
				'controller' => 'AdminManagementController',
				'action' => 'classCheck'
			);

			$routes['adminClassSeek'] = array(
				'route' => '/admin/gestao/turma/buscar',
				'controller' => 'AdminManagementController',
				'action' => 'classSeek'
			);

			$routes['adminAvailableListClass'] = array(
				'route' => '/admin/gestao/turma/turmas-disponiveis',
				'controller' => 'AdminStudentController',
				'action' => 'classAvailable'
			);

			$routes['adminClassProfile'] = array(
				'route' => '/admin/gestao/turma/perfil-turma',
				'controller' => 'AdminManagementController',
				'action' => 'classProfile'
			);

			$routes['adminClassDisciplineInsert'] = array(
				'route' => '/admin/gestao/turma/perfil-turma/turma-disciplina/inserir',
				'controller' => 'AdminManagementController',
				'action' => 'classDisciplineInsert'
			);

			$routes['adminListTeacherClass'] = array(
				'route' => '/admin/gestao/turma/perfil-turma/turma-disciplina/professores-turma',
				'controller' => 'AdminTeacherController',
				'action' => 'listTeacherClass'
			);

			$routes['adminListTeachersDisciplineClass'] = array(
				'route' => '/admin/gestao/turma/perfil-turma/turma-disciplina/professores-disciplina-turma',
				'controller' => 'AdminManagementController',
				'action' => 'listTeachersDisciplineClass'
			);

			$routes['adminUpdateClassDiscipline'] = array(
				'route' => '/admin/gestao/turma/perfil-turma/turma-disciplina/atualizar',
				'controller' => 'AdminManagementController',
				'action' => 'updateClassDiscipline'
			);

			$routes['adminSubjectAvailableClass'] = array(
				'route' => '/admin/gestao/turma/perfil-turma/turma-disciplina/select-disciplinas',
				'controller' => 'AdminManagementController',
				'action' => 'subjectAvailableClass'
			);

			$routes['adminDisciplinesClassAlreadyAdded'] = array(
				'route' => '/admin/gestao/turma/perfil-turma/turma-disciplina/disciplinas-adicionadas',
				'controller' => 'AdminManagementController',
				'action' => 'disciplinesClassAlreadyAdded'
			);

			$routes['adminDisciplineClassDelete'] = array(
				'route' => '/admin/gestao/turma/perfil-turma/turma-disciplina/deletar',
				'controller' => 'AdminManagementController',
				'action' => 'disciplineClassDelete'
			);

			$routes['adminExamInsert'] = array(
				'route' => '/admin/gestao/turma/perfil-turma/avaliacoes/inserir',
				'controller' => 'AdminManagementController',
				'action' => 'examInsert'
			);

			$routes['adminSumUnitGrades'] = array(
				'route' => '/admin/gestao/turma/perfil-turma/avaliacoes/soma-notas-unidade',
				'controller' => 'AdminManagementController',
				'action' => 'sumUnitGrades'
			);

			$routes['adminExamList'] = array(
				'route' => '/admin/gestao/turma/perfil-turma/avaliacoes/lista',
				'controller' => 'AdminManagementController',
				'action' => 'examList'
			);

			$routes['adminRecentsExam'] = array(
				'route' => '/admin/gestao/turma/perfil-turma/avaliacoes/lista-recentes',
				'controller' => 'AdminManagementController',
				'action' => 'recentsExam'
			);

			$routes['adminExamData'] = array(
				'route' => '/admin/gestao/turma/perfil-turma/avaliacoes/dados',
				'controller' => 'AdminManagementController',
				'action' => 'examData'
			);

			$routes['adminExamUpdate'] = array(
				'route' => '/admin/gestao/turma/perfil-turma/avaliacoes/atualizar',
				'controller' => 'AdminManagementController',
				'action' => 'examUpdate'
			);

			$routes['adminExamDeletar'] = array(
				'route' => '/admin/gestao/turma/perfil-turma/avaliacoes/deletar',
				'controller' => 'AdminManagementController',
				'action' => 'examDelete'
			);

			$routes['adminExamSeek'] = array(
				'route' => '/admin/gestao/turma/perfil-turma/avaliacoes/buscar',
				'controller' => 'AdminManagementController',
				'action' => 'examSeek'
			);

			$routes['adminCheckExamName'] = array(
				'route' => '/admin/gestao/turma/perfil-turma/avaliacoes/verificar-nome',
				'controller' => 'AdminManagementController',
				'action' => 'checkExamName'
			);

			$routes['adminInsertExamNote'] = array(
				'route' => '/admin/gestao/turma/perfil-turma/aluno/adicionar-nota-avaliacao',
				'controller' => 'AdminManagementController',
				'action' => 'insertExamNote'
			);

			$routes['adminNotesNotAddedYet'] = array(
				'route' => '/admin/gestao/turma/perfil-turma/aluno/notas-disponiveis',
				'controller' => 'AdminManagementController',
				'action' => 'notesNotAddedYet'
			);

			$routes['adminNoteList'] = array(
				'route' => '/admin/gestao/turma/perfil-turma/aluno/lista-notas',
				'controller' => 'AdminManagementController',
				'action' => 'noteList'
			);

			$routes['adminNoteListClass'] = array(
				'route' => '/admin/gestao/turma/perfil-turma/lista-notas',
				'controller' => 'AdminManagementController',
				'action' => 'noteListClass'
			);

			$routes['adminNoteSeek'] = array(
				'route' => '/admin/gestao/turma/perfil-turma/aluno/lista-avaliacoes/buscar',
				'controller' => 'AdminManagementController',
				'action' => 'noteSeek'
			);

			$routes['adminNoteSeekClass'] = array(
				'route' => '/admin/gestao/turma/perfil-turma/lista-notas/buscar',
				'controller' => 'AdminManagementController',
				'action' => 'noteSeekClass'
			);

			$routes['adminNoteData'] = array(
				'route' => '/admin/gestao/turma/perfil-turma/aluno/lista-avaliacoes/dados',
				'controller' => 'AdminManagementController',
				'action' => 'noteData'
			);

			$routes['adminNoteUpdate'] = array(
				'route' => '/admin/gestao/turma/perfil-turma/aluno/avaliacoes/dados/atualizar',
				'controller' => 'AdminManagementController',
				'action' => 'noteUpdate'
			);

			$routes['adminNoteDelete'] = array(
				'route' => '/admin/gestao/turma/perfil-turma/aluno/avaliacoes/dados/deletar',
				'controller' => 'AdminManagementController',
				'action' => 'noteDelete'
			);

			$routes['IndexTeacherPortal'] = array(
				'route' => '/portal-docente',
				'controller' => 'TeacherPortalController',
				'action' => 'index'
			);

			$routes['loginTeacherPortal'] = array(
				'route' => '/portal-docente/login',
				'controller' => 'TeacherPortalController',
				'action' => 'auth'
			);

			$routes['homeTeacherPortal'] = array(
				'route' => '/portal-docente/home',
				'controller' => 'TeacherPortalController',
				'action' => 'home'
			);

			$routes['teacherClassesTeacherPortal'] = array(
				'route' => '/portal-docente/turmas',
				'controller' => 'TeacherPortalController',
				'action' => 'teacherClasses'
			);

			$routes['seekTeacherClasses'] = array(
				'route' => '/portal-docente/turmas/buscar',
				'controller' => 'TeacherPortalController',
				'action' => 'seekTeacherClasses'
			);

			$routes['closeSessionTeacherPortal'] = array(
				'route' => '/portal-docente/sair',
				'controller' => 'TeacherPortalController',
				'action' => 'closeSession'
			);

			




		$this->setRoutes($routes);
	}
}
