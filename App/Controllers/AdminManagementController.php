<?php

namespace App\Controllers;

use App\Models\Student\Student;
use App\Models\Teacher\Teacher;
use MF\Controller\Action;
use MF\Model\Container;

class AdminManagementController extends Action
{

    public function managementGeneral()
    {
        $this->render('/pages/generalManagement', 'AdminLayout');
    }


    // School Term


    public function schoolTermManagement()
    {

        $SchoolTerm = Container::getModel('Management\\SchoolTerm');

        $this->view->listSchoolTerm = $SchoolTerm->list();
        $this->view->listSchoolTermStates = $SchoolTerm->listSchoolTermStates();

        $this->render('/pages/schoolTermManagement', 'AdminLayout');
    }


    public function schoolTermInsert()
    {

        $SchoolTerm = Container::getModel('Management\\SchoolTerm');

        $SchoolTerm->__set('startDate', $_POST['startDate']);
        $SchoolTerm->__set('endDate', $_POST['endDate']);
        $SchoolTerm->__set('fk_id_school_term_situation', $_POST['schoolTermSituationAdd']);
        $SchoolTerm->__set('fk_id_school_year', $_POST['schoolYear']);

        $SchoolTerm->insert();
    }


    public function schoolTermUpdate()
    {

        $SchoolTerm = Container::getModel('Management\\SchoolTerm');

        $SchoolTerm->__set('schoolTermId', $_POST['schoolTermId']);
        $SchoolTerm->__set('startDate', $_POST['startDate']);
        $SchoolTerm->__set('endDate', $_POST['endDate']);
        $SchoolTerm->__set('fk_id_school_term_situation', $_POST['schoolTermSituation']);

        $SchoolTerm->update();
    }


    public function schoolTermList()
    {

        $SchoolTerm = Container::getModel('Management\\SchoolTerm');

        $this->view->listSchoolTerm = $SchoolTerm->list();
        $this->view->listSchoolTermStates = $SchoolTerm->listSchoolTermStates();

        $this->render('/components/schoolTermsList', 'SimpleLayout');
    }


    public function schoolTermDelete()
    {

        $SchoolTerm = Container::getModel('Management\\SchoolTerm');
        $SchoolTerm->__set('schoolTermId', $_POST['schoolTermId']);
        $SchoolTerm->delete();
    }


    public function schoolTermAvailable()
    {

        $SchoolTerm = Container::getModel('Management\\SchoolTerm');
        echo json_encode($SchoolTerm->listAvailableYears());
    }


    public function schoolTermActive()
    {

        $SchoolTerm = Container::getModel('Management\\SchoolTerm');
        echo json_encode($SchoolTerm->active());
    }


    // Class Room ( Sala de Aula )


    public function ClassRoomManagement()
    {

        $ClassRoom = Container::getModel('Management\\ClassRoom');

        $this->view->listClassRoom = $ClassRoom->list();

        $this->render('/pages/classroomManagement', 'AdminLayout');
    }


    public function classRoomInsert()
    {

        $ClassRoom = Container::getModel('Management\\ClassRoom');

        $ClassRoom->__set('studentCapacity', $_POST['studentCapacity']);
        $ClassRoom->__set('fk_id_classroom_number', $_POST['classroomNumber']);

        $ClassRoom->insert();
    }


    public function classRoomUpdate()
    {

        $ClassRoom = Container::getModel('Management\\ClassRoom');

        $ClassRoom->__set('classroomId', $_POST['classroomId']);
        $ClassRoom->__set('studentCapacity', $_POST['studentCapacity']);

        $ClassRoom->update();
    }


    public function availableRoomNumbers()
    {

        $ClassRoom = Container::getModel('Management\\ClassRoom');
        echo json_encode($ClassRoom->availableNumbers());
    }


    public function classRoomList()
    {

        $ClassRoom = Container::getModel('Management\\ClassRoom');

        $this->view->listClassRoom = $ClassRoom->list();

        $this->render('/components/classroomsList', 'SimpleLayout');
    }


    public function classRoomDelete()
    {

        $ClassRoom = Container::getModel('Management\\ClassRoom');
        $ClassRoom->__set('classroomId', $_POST['classroomId']);
        $ClassRoom->delete();
    }


    public function classRoomActive()
    {

        $ClassRoom = Container::getModel('Management\\ClassRoom');
        echo json_encode($ClassRoom->activeClassRoom());
    }



    // Course


    public function courseManagement()
    {

        $Course = Container::getModel('Management\\Course');

        $this->view->listCourse = $Course->list();

        $this->render('/pages/courseManagement', 'AdminLayout');
    }


    public function courseInsert()
    {

        $Course = Container::getModel('Management\\Course');

        $Course->__set('courseName', $_POST['courseName']);
        $Course->__set('acronym', $_POST['acronym']);

        $Course->insert();
    }


    public function courseList()
    {

        $Course = Container::getModel('Management\\Course');

        $this->view->listCourse = $Course->list();

        $this->render('/components/coursesList', 'SimpleLayout');
    }


    public function courseUpdate()
    {

        $Course = Container::getModel('Management\\Course');

        $Course->__set('courseId', $_POST['courseId']);
        $Course->__set('courseName', $_POST['courseName']);
        $Course->__set('acronym', $_POST['acronym']);

        $Course->update();
    }


    public function courseAvailable()
    {

        $Course = Container::getModel('Management\\Course');
        echo json_encode($Course->availableCourse());
    }


    public function courseDelete()
    {

        $Course = Container::getModel('Management\\Course');

        $Course->__set('courseId', $_POST['courseId']);

        $Course->delete();
    }


    // Discipline


    public function disciplineManagement()
    {

        $Discipline = Container::getModel('Management\\Discipline');

        $this->view->listDiscipline = $Discipline->list();
        $this->view->listModality = $Discipline->listDisciplineModality();

        $this->render('/pages/disciplineManagement', 'AdminLayout');
    }


    public function disciplineInsert()
    {

        $Discipline = Container::getModel('Management\\Discipline');

        $Discipline->__set('disciplineName', $_POST['disciplineName']);
        $Discipline->__set('acronym', $_POST['acronym']);
        $Discipline->__set('fk_id_modality', $_POST['modalityAdd']);

        $Discipline->insert();
    }


    public function disciplineList()
    {

        $Discipline = Container::getModel('Management\\Discipline');

        $this->view->listDiscipline = $Discipline->list();

        $this->render('/components/disciplinesList', 'SimpleLayout');
    }


    public function disciplineUpdate()
    {

        $Discipline = Container::getModel('Management\\Discipline');

        $Discipline->__set('disciplineId', $_POST['disciplineId']);
        $Discipline->__set('disciplineName', $_POST['disciplineName']);
        $Discipline->__set('acronym', $_POST['acronym']);
        $Discipline->__set('fk_id_modality', $_POST['modality']);

        $Discipline->update();
    }


    public function disciplineSeek()
    {

        $Discipline = Container::getModel('Management\\Discipline');

        $Discipline->__set('disciplineName', $_GET['seekName']);
        $Discipline->__set('fk_id_modality', $_GET['seekModality']);

        $this->view->listDiscipline = $Discipline->seekDiscipline();

        $this->render('/components/disciplinesList', 'SimpleLayout');
    }


    public function disciplineData()
    {

        $Discipline = Container::getModel('Management\\Discipline');

        $Discipline->__set('disciplineId', $_GET['id']);

        $this->view->discipline = $Discipline->disciplineData();
        $this->view->listDisciplineModality = $Discipline->listDisciplineModality();

        $this->render('/components/disciplineModal', 'SimpleLayout');
    }


    public function disciplineDelete()
    {

        $Discipline = Container::getModel('Management\\Discipline');

        $Discipline->__set('disciplineId', $_POST['disciplineId']);

        $Discipline->delete();
    }


    // Class


    public function classManagement()
    {

        $Classe = Container::getModel('Management\\Classe');
        $Course = Container::getModel('Management\\Course');
        $ClassRoom = Container::getModel('Management\\ClassRoom');
        $SchoolTerm = Container::getModel('Management\\SchoolTerm');

        $this->view->listClass = $Classe->list();
        $this->view->availableShift = $Classe->availableShift();
        $this->view->availableBallot = $Classe->availableBallot();
        $this->view->availableSeries = $Classe->availableSeries();
        $this->view->availableCourse = $Course->availableCourse();
        $this->view->availableClassRoom = $ClassRoom->activeClassroom();
        $this->view->activeSchoolTerm = $SchoolTerm->active();

        $this->render('/pages/classeManagement', 'AdminLayout');
    }


    public function classInsert()
    {

        $Class = Container::getModel('Management\\Classe');

        $Class->__set('fk_id_ballot', $_POST['ballot']);
        $Class->__set('fk_id_classroom', $_POST['classRoom']);
        $Class->__set('fk_id_school_term', $_POST['schoolTerm']);
        $Class->__set('fk_id_course', $_POST['course']);
        $Class->__set('fk_id_shift', $_POST['shift']);
        $Class->__set('fk_id_series', $_POST['series']);

        $Class->insert();
    }


    public function classCheck()
    {

        $Classe = Container::getModel('Management\\Classe');

        $Classe->__set('fk_id_ballot', $_GET['ballot']);
        $Classe->__set('fk_id_classroom', $_GET['classRoom']);
        $Classe->__set('fk_id_school_term', $_GET['schoolTerm']);
        $Classe->__set('fk_id_course', $_GET['course']);
        $Classe->__set('fk_id_shift', $_GET['shift']);
        $Classe->__set('fk_id_series', $_GET['series']);

        echo json_encode($Classe->checkClass());
    }


    public function classList()
    {

        $Classe = Container::getModel('Management\\Classe');

        $this->view->listClass = $Classe->list();

        $this->render('/components/classList', 'SimpleLayout');
    }


    public function classSeek()
    {

        $Classe = Container::getModel('Management\\Classe');

        $Classe->__set('fk_id_course', $_GET['course']);
        $Classe->__set('fk_id_shift', $_GET['shift']);
        $Classe->__set('fk_id_series', $_GET['series']);

        $this->view->listClass = $Classe->seekClass();

        $this->render('/components/classList', 'SimpleLayout');
    }


    public function classProfile()
    {

        $Student = Container::getModel('Student\\Student');
        $Teacher = Container::getModel('Teacher\\Teacher');
        $Discipline = Container::getModel('Management\\Discipline');
        $Classe = Container::getModel('Management\\Classe');
        $ClassDiscipline = Container::getModel('Management\\ClassDiscipline');
        $Exam = Container::getModel('Management\\Exam');

        $ClassDiscipline->__set("fk_id_class", $_GET['id']);
        $Classe->__set('classId', $_GET['id']);

        $this->view->listStudent = $Student->list("WHERE turma.id_turma = " . $Classe->__get('classId'));
        $this->view->teacherAvailable = $Teacher->teacherAvailable();
        $this->view->disciplineAvailable = $ClassDiscipline->disciplinesNotYetAdded();
        $this->view->disciplineAll = $Discipline->disciplineAll();
        $this->view->disciplinesAlreadyAdded = $ClassDiscipline->disciplinesAlreadyAdded();
        $this->view->typeStudentList = "class";
        $this->view->classId = $Classe->__get('classId');
        $this->view->typeTeacherList = 'class';
        $this->view->unity = $Exam->unity();
        $this->view->listTeacher = $ClassDiscipline->listTeachersClass();
        $this->view->listExam = $Exam->examList("WHERE turma_disciplina.fk_id_turma = " . $Classe->__get('classId'));


        $this->render('/components/modalClassProfile', 'SimpleLayout');
    }


    public function classDisciplineInsert()
    {

        $ClassDiscipline = Container::getModel('Management\\ClassDiscipline');

        $ClassDiscipline->__set("fk_id_teacher", $_POST['teacher']);
        $ClassDiscipline->__set("fk_id_class", $_POST['classId']);
        $ClassDiscipline->__set("fk_id_discipline", $_POST['discipline']);

        $ClassDiscipline->insert();

        $this->view->typeTeacherList = 'class';
    }


    public function listTeachersDisciplineClass()
    {

        $ClassDiscipline = Container::getModel('Management\\ClassDiscipline');
        $Discipline = Container::getModel('Management\\Discipline');
        $Teacher = Container::getModel('Teacher\\Teacher');

        $ClassDiscipline->__set("fk_id_class", $_GET['classId']);

        $this->view->listTeacher = $ClassDiscipline->listTeachersClass();
        $this->view->teacherAvailable = $Teacher->teacherAvailable();
        $this->view->disciplineAvailable = $ClassDiscipline->disciplinesNotYetAdded();

        $this->render('/components/disciplineClass', 'SimpleLayout');
    }


    public function disciplineAvailable()
    {

        $ClassDiscipline = Container::getModel('Management\\ClassDiscipline');

        $ClassDiscipline->__set('fk_id_class', $_POST['classId']);

        echo json_encode($ClassDiscipline->disciplinesNotYetAdded());
    }


    public function SelectClassDiscipline()
    {

        $ClassDiscipline = Container::getModel('Management\\ClassDiscipline');
        $Discipline = Container::getModel('Management\\Discipline');

        $ClassDiscipline->__set("fk_id_class", $_GET['classId']);

        $this->view->disciplineAvailable = $ClassDiscipline->disciplinesNotYetAdded();
        $this->view->disciplineAll = $Discipline->disciplineAll();

        $this->render('/components/disciplineSelect', 'SimpleLayout');
    }


    public function examList()
    {

        $Exam = Container::getModel('Management\\Exam');

        $Exam->__set("fk_id_class", $_GET['classId']);

        $this->view->listExam = $Exam->examList("WHERE turma_disciplina.fk_id_turma = " . $Exam->__get('fk_id_class'));

        $this->render('/components/examList', 'SimpleLayout');
    }


    public function recentsExam()
    {

        $Exam = Container::getModel('Management\\Exam');

        $Exam->__set("fk_id_exam_unity", $_GET['unity']);
        $Exam->__set("fk_id_discipline_class", $_GET['disciplineClassId']);

        $this->view->listExam = $Exam->examList("WHERE avaliacoes.fk_id_unidade_avaliacao = " . $Exam->__get('fk_id_exam_unity') . " AND avaliacoes.fk_turma_disciplina_avaliacao = " . $Exam->__get('fk_id_discipline_class'));

        $this->view->typeListExam = 'recent';

        $this->render('/components/examList', 'SimpleLayout');

    }



    public function updateClassDiscipline()
    {

        $ClassDiscipline = Container::getModel('Management\\ClassDiscipline');

        $ClassDiscipline->__set("classDisciplineId", $_POST['disciplineClassId']);
        $ClassDiscipline->__set("fk_id_teacher", $_POST['teacher']);
        $ClassDiscipline->__set("fk_id_discipline", $_POST['discipline']);
        $ClassDiscipline->__set("fk_id_class", $_POST['classId']);

        $ClassDiscipline->update();

        $this->view->listTeacher = $ClassDiscipline->listTeachersClass();
    }


    public function disciplinesAlreadyAdded()
    {

        $ClassDiscipline = Container::getModel('Management\\ClassDiscipline');

        $ClassDiscipline->__set("fk_id_class", $_GET['id']);

        echo json_encode($ClassDiscipline->disciplinesAlreadyAdded());
    }


    public function examInsert()
    {

        $Exam = Container::getModel('Management\\Exam');

        $Exam->__set("examDescription", $_POST['examDescription']);
        $Exam->__set("examValue", $_POST['examValue']);
        $Exam->__set("realizeDate", $_POST['realizeDate']);
        $Exam->__set("fk_id_exam_unity", $_POST['unity']);
        $Exam->__set("fk_id_discipline_class", $_POST['disciplineClassId']);

        $Exam->insert();
    }


    public function sumUnitGrades()
    {

        $Exam = Container::getModel('Management\\Exam');

        $Exam->__set("fk_id_exam_unity", $_GET['unity']);
        $Exam->__set("fk_id_discipline_class", $_GET['disciplineClassId']);

        echo json_encode($Exam->sumUnitGrades());
    }


    public function examData()
    {

        $Exam = Container::getModel('Management\\Exam');

        $Exam->__set('examId', $_GET['id']);

        $this->view->examData = $Exam->examList("WHERE avaliacoes.id_avaliacao = " . $Exam->__get('examId'));

        $this->render('/components/modalExam', 'SimpleLayout');
    }


    public function examUpdate()
    {

        $Exam = Container::getModel('Management\\Exam');

        $Exam->__set('examId', $_POST['examId']);
        $Exam->__set('examDescription', $_POST['examDescription']);
        $Exam->__set('realizeDate', $_POST['realizeDate']);
        $Exam->__set('examValue', $_POST['examValue']);

        $Exam->update();
    }
}
