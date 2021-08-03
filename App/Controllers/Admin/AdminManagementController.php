<?php

namespace App\Controllers\Admin;

use MF\Controller\Action;
use MF\Model\Container;

class AdminManagementController extends Action
{

    public function managementGeneral()
    {
        $this->render('management/pages/generalManagement', 'AdminLayout');
    }


    // School Term


    public function schoolTermManagement()
    {

        $SchoolTerm = Container::getModel('Admin\\SchoolTerm');

        $this->view->listSchoolTerm = $SchoolTerm->list();
        $this->view->listSchoolTermStates = $SchoolTerm->listSchoolTermStates();

        $this->render('management/pages/schoolTermManagement', 'AdminLayout');
    }


    public function schoolTermInsert()
    {

        $SchoolTerm = Container::getModel('Admin\\SchoolTerm');

        $SchoolTerm->__set('startDate', $_POST['startDate']);
        $SchoolTerm->__set('endDate', $_POST['endDate']);
        $SchoolTerm->__set('fk_id_school_term_situation', $_POST['schoolTermSituationAdd']);
        $SchoolTerm->__set('fk_id_school_year', $_POST['schoolYear']);

        $SchoolTerm->insert();
    }


    public function schoolTermUpdate()
    {

        $SchoolTerm = Container::getModel('Admin\\SchoolTerm');

        $SchoolTerm->__set('schoolTermId', $_POST['schoolTermId']);
        $SchoolTerm->__set('startDate', $_POST['startDate']);
        $SchoolTerm->__set('endDate', $_POST['endDate']);
        $SchoolTerm->__set('fk_id_school_term_situation', $_POST['schoolTermSituation']);

        $SchoolTerm->update();
    }


    public function schoolTermList()
    {

        $SchoolTerm = Container::getModel('Admin\\SchoolTerm');

        $this->view->listSchoolTerm = $SchoolTerm->list();
        $this->view->listSchoolTermStates = $SchoolTerm->listSchoolTermStates();

        $this->render('management/components/schoolTermsList', 'SimpleLayout');
    }


    public function schoolTermDelete()
    {

        $SchoolTerm = Container::getModel('Admin\\SchoolTerm');
        $SchoolTerm->__set('schoolTermId', $_POST['schoolTermId']);
        $SchoolTerm->delete();
    }


    public function schoolTermAvailable()
    {

        $SchoolTerm = Container::getModel('Admin\\SchoolTerm');
        echo json_encode($SchoolTerm->listAvailableYears());
    }


    public function schoolTermActive()
    {

        $SchoolTerm = Container::getModel('Admin\\SchoolTerm');
        echo json_encode($SchoolTerm->active());
    }


    // Class Room ( Sala de Aula )


    public function ClassRoomManagement()
    {

        $ClassRoom = Container::getModel('Admin\\ClassRoom');

        $this->view->listClassRoom = $ClassRoom->list();

        $this->render('management/pages/classroomManagement', 'AdminLayout');
    }


    public function classRoomInsert()
    {

        $ClassRoom = Container::getModel('Admin\\ClassRoom');

        $ClassRoom->__set('studentCapacity', $_POST['studentCapacity']);
        $ClassRoom->__set('fk_id_classroom_number', $_POST['classroomNumber']);

        $ClassRoom->insert();
    }


    public function classRoomUpdate()
    {

        $ClassRoom = Container::getModel('Admin\\ClassRoom');

        $ClassRoom->__set('classroomId', $_POST['classroomId']);
        $ClassRoom->__set('studentCapacity', $_POST['studentCapacity']);

        $ClassRoom->update();
    }


    public function availableRoomNumbers()
    {

        $ClassRoom = Container::getModel('Admin\\ClassRoom');
        echo json_encode($ClassRoom->availableNumbers());
    }


    public function classRoomList()
    {

        $ClassRoom = Container::getModel('Admin\\ClassRoom');

        $this->view->listClassRoom = $ClassRoom->list();

        $this->render('management/components/classroomsList', 'SimpleLayout');
    }


    public function classRoomDelete()
    {

        $ClassRoom = Container::getModel('Admin\\ClassRoom');
        $ClassRoom->__set('classroomId', $_POST['classroomId']);
        $ClassRoom->delete();
    }


    public function classRoomActive()
    {

        $ClassRoom = Container::getModel('Admin\\ClassRoom');
        echo json_encode($ClassRoom->activeClassRoom());
    }



    // Course


    public function courseManagement()
    {

        $Course = Container::getModel('Admin\\Course');

        $this->view->listCourse = $Course->list();

        $this->render('management/pages/courseManagement', 'AdminLayout');
    }


    public function courseInsert()
    {

        $Course = Container::getModel('Admin\\Course');

        $Course->__set('courseName', $_POST['courseName']);
        $Course->__set('acronym', $_POST['acronym']);

        $Course->insert();
    }


    public function courseList()
    {

        $Course = Container::getModel('Admin\\Course');

        $this->view->listCourse = $Course->list();

        $this->render('management/components/coursesList', 'SimpleLayout');
    }


    public function courseUpdate()
    {

        $Course = Container::getModel('Admin\\Course');

        $Course->__set('courseId', $_POST['courseId']);
        $Course->__set('courseName', $_POST['courseName']);
        $Course->__set('acronym', $_POST['acronym']);

        $Course->update();
    }


    public function courseAvailable()
    {

        $Course = Container::getModel('Admin\\Course');
        echo json_encode($Course->availableCourse());
    }


    public function courseDelete()
    {

        $Course = Container::getModel('Admin\\Course');

        $Course->__set('courseId', $_POST['courseId']);

        $Course->delete();
    }


    // Discipline


    public function disciplineManagement()
    {

        $Discipline = Container::getModel('Admin\\Discipline');

        $this->view->listDiscipline = $Discipline->list();
        $this->view->listModality = $Discipline->listDisciplineModality();

        $this->render('management/pages/disciplineManagement', 'AdminLayout');
    }


    public function disciplineInsert()
    {

        $Discipline = Container::getModel('Admin\\Discipline');

        $Discipline->__set('disciplineName', $_POST['disciplineName']);
        $Discipline->__set('acronym', $_POST['acronym']);
        $Discipline->__set('fk_id_modality', $_POST['modalityAdd']);

        $Discipline->insert();
    }


    public function disciplineList()
    {

        $Discipline = Container::getModel('Admin\\Discipline');

        $this->view->listDiscipline = $Discipline->list();

        $this->render('management/components/disciplinesList', 'SimpleLayout');
    }


    public function disciplineUpdate()
    {

        $Discipline = Container::getModel('Admin\\Discipline');

        $Discipline->__set('disciplineId', $_POST['disciplineId']);
        $Discipline->__set('disciplineName', $_POST['disciplineName']);
        $Discipline->__set('acronym', $_POST['acronym']);
        $Discipline->__set('fk_id_modality', $_POST['modality']);

        $Discipline->update();
    }


    public function disciplineSeek()
    {

        $Discipline = Container::getModel('Admin\\Discipline');

        $Discipline->__set('disciplineName', $_GET['seekName']);
        $Discipline->__set('fk_id_modality', $_GET['seekModality']);

        $this->view->listDiscipline = $Discipline->seekDiscipline();

        $this->render('management/components/disciplinesList', 'SimpleLayout');
    }


    public function disciplineData()
    {

        $Discipline = Container::getModel('Admin\\Discipline');

        $Discipline->__set('disciplineId', $_GET['id']);

        $this->view->discipline = $Discipline->list();
        $this->view->listDisciplineModality = $Discipline->listDisciplineModality();

        $this->render('management/components/disciplineModal', 'SimpleLayout');
    }


    public function disciplineDelete()
    {

        $Discipline = Container::getModel('Admin\\Discipline');

        $Discipline->__set('disciplineId', $_POST['disciplineId']);

        $Discipline->delete();
    }


    // Class


    public function classManagement()
    {

        $Classe = Container::getModel('Admin\\Classe');
        $Course = Container::getModel('Admin\\Course');
        $ClassRoom = Container::getModel('Admin\\ClassRoom');
        $SchoolTerm = Container::getModel('Admin\\SchoolTerm');

        $this->view->listClass = $Classe->list();
        $this->view->availableShift = $Classe->availableShift();
        $this->view->availableBallot = $Classe->availableBallot();
        $this->view->availableSeries = $Classe->availableSeries();
        $this->view->availableCourse = $Course->availableCourse();
        $this->view->availableClassRoom = $ClassRoom->activeClassroom();
        $this->view->activeSchoolTerm = $SchoolTerm->active();

        $this->render('management/pages/classeManagement', 'AdminLayout');
    }


    public function classInsert()
    {

        $Class = Container::getModel('Admin\\Classe');

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

        $Classe = Container::getModel('Admin\\Classe');

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

        $Classe = Container::getModel('Admin\\Classe');

        $this->view->listClass = $Classe->list();

        $this->render('management/components/classList', 'SimpleLayout');
    }


    public function classSeek()
    {

        $Classe = Container::getModel('Admin\\Classe');

        $Classe->__set('fk_id_course', $_GET['course']);
        $Classe->__set('fk_id_shift', $_GET['shift']);
        $Classe->__set('fk_id_series', $_GET['series']);

        $this->view->listClass = $Classe->seekClass();

        $this->render('management/components/classList', 'SimpleLayout');
    }


    public function classProfile()
    {

        $Student = Container::getModel('Student\\Student');
        $Classe = Container::getModel('Admin\\Classe');
        $ClassDiscipline = Container::getModel('Admin\\ClassDiscipline');
        $Exam = Container::getModel('TeacherStudent\\Exam');
        $Teacher = Container::getModel('Teacher\\Teacher');

        if (!isset($_SESSION)) session_start();

        $ClassDiscipline->__set("fk_id_class", $_GET['id']);
        $ClassDiscipline->__Set("fk_id_teacher", isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);
        $Classe->__set('classId', $_GET['id']);
        $Student->__set("fk_id_class", $_GET['id']);

        $this->view->listStudent = $Student->list();
        $this->view->typeStudentList = "class";
        $this->view->classId = $Classe->__get('classId');
        $this->view->typeTeacherList = 'class';
        $this->view->unity = $Exam->unity();
        $this->view->classData = $Classe->list();
        $this->view->listTeacher = $ClassDiscipline->listTeachersClass();
        $this->view->teacherAvailable = $Teacher->teacherAvailable();
        $this->view->disciplinesClassAlreadyAdded = $ClassDiscipline->disciplinesClassAlreadyAdded();

        $this->render('management/components/modalClassProfile', 'SimpleLayout');
    }


    public function classDisciplineInsert()
    {

        $ClassDiscipline = Container::getModel('Admin\\ClassDiscipline');

        $ClassDiscipline->__set("fk_id_teacher", $_POST['teacher']);
        $ClassDiscipline->__set("fk_id_class", $_POST['classId']);
        $ClassDiscipline->__set("fk_id_discipline", $_POST['disciplineClass']);

        $ClassDiscipline->insert();
    }


    public function listTeachersDisciplineClass()
    {

        $ClassDiscipline = Container::getModel('Admin\\ClassDiscipline');
        $Discipline = Container::getModel('Admin\\Discipline');
        $Teacher = Container::getModel('Teacher\\Teacher');

        $ClassDiscipline->__set("fk_id_class", $_GET['classId']);

        $this->view->listTeacher = $ClassDiscipline->listTeachersClass();
        $this->view->teacherAvailable = $Teacher->teacherAvailable();

        $this->render('management/components/disciplineClass', 'SimpleLayout');
    }


    public function disciplineAvailable()
    {

        $ClassDiscipline = Container::getModel('Admin\\ClassDiscipline');

        $ClassDiscipline->__set('fk_id_class', $_POST['classId']);

        echo json_encode($ClassDiscipline->disciplinesNotYetAdded());
    }


    public function subjectAvailableClass()
    {

        $ClassDiscipline = Container::getModel('Admin\\ClassDiscipline');

        $ClassDiscipline->__set("fk_id_class", $_GET['classId']);

        echo json_encode($ClassDiscipline->subjectAvailableClass());
    }


    public function updateClassDiscipline()
    {

        $ClassDiscipline = Container::getModel('Admin\\ClassDiscipline');

        $ClassDiscipline->__set("id", $_POST['disciplineClass']);
        $ClassDiscipline->__set("fk_id_teacher", $_POST['teacher']);
        $ClassDiscipline->__set("fk_id_discipline", $_POST['discipline']);
        $ClassDiscipline->__set("fk_id_class", $_POST['classId']);

        $ClassDiscipline->update();

        $this->view->listTeacher = $ClassDiscipline->listTeachersClass();
    }


    public function disciplineClassDelete()
    {

        $ClassDiscipline = Container::getModel('Admin\\ClassDiscipline');

        $ClassDiscipline->__set("id", $_POST['disciplineClass']);

        $ClassDiscipline->delete();
    }


    public function disciplinesClassAlreadyAdded()
    {

        $ClassDiscipline = Container::getModel('Admin\\ClassDiscipline');

        $ClassDiscipline->__set("fk_id_class", $_GET['classId']);

        if (!isset($_SESSION)) session_start();

        $ClassDiscipline->__Set("fk_id_teacher", isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);

        echo json_encode($ClassDiscipline->disciplinesClassAlreadyAdded());
    }
}
