<?php

namespace App\Controllers;

use App\Models\Management\SchoolTerm;
use App\Models\Student\Student;
use App\Models\Teacher\Teacher;
use App\Models\Management\Discipline;
use App\Models\Management\ClassDiscipline;
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
        $this->view->listSchoolTermSituation = $SchoolTerm->listSchoolTermSituation();

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
        $this->view->listSchoolTermSituation = $SchoolTerm->listSchoolTermSituation();

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
        echo json_encode($SchoolTerm->availableSchoolTerm());
    }


    public function schoolTermActive()
    {

        $SchoolTerm = Container::getModel('Management\\SchoolTerm');
        echo json_encode($SchoolTerm->activeSchoolTerm());
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

        $ClassRoom->__set('idClassRoom', $_POST['idClassRoom']);
        $ClassRoom->__set('studentCapacity', $_POST['studentCapacity']);

        $ClassRoom->update();
    }


    public function availableRoomNumbers()
    {

        $ClassRoom = Container::getModel('Management\\ClassRoom');
        echo json_encode($ClassRoom->availableClassroom());
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
        $ClassRoom->__set('idClassRoom', $_POST['idClassRoom']);
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

        $Course->__set('course', $_POST['course']);
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

        $Course->__set('idCourse', $_POST['idCourse']);
        $Course->__set('course', $_POST['course']);
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
        $Course->__set('idCourse', $_POST['idCourse']);
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

        $Discipline->__set('discipline', $_POST['discipline']);
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

        $Discipline->__set('idDiscipline', $_POST['idDiscipline']);
        $Discipline->__set('discipline', $_POST['discipline']);
        $Discipline->__set('acronym', $_POST['acronym']);
        $Discipline->__set('fk_id_modality', $_POST['modality']);

        $Discipline->update();
    }


    public function disciplineSeek()
    {

        $Discipline = Container::getModel('Management\\Discipline');

        $Discipline->__set('discipline', $_GET['seekName']);
        $Discipline->__set('fk_id_modality', $_GET['seekModality']);

        $this->view->listDiscipline = $Discipline->seekDiscipline();

        $this->render('/components/disciplinesList', 'SimpleLayout');
    }


    public function disciplineData()
    {

        $Discipline = Container::getModel('Management\\Discipline');
        $Discipline->__set('idDiscipline', $_GET['id']);

        $this->view->discipline = $Discipline->disciplineData();
        $this->view->listDisciplineModality = $Discipline->listDisciplineModality();

        $this->render('/components/disciplineModal', 'SimpleLayout');
    }


    public function disciplineDelete()
    {

        $Discipline = Container::getModel('Management\\Discipline');
        $Discipline->__set('idDiscipline', $_POST['idDiscipline']);
        $Discipline->delete();
    }


    public function disciplineAvailable()
    {

        $Discipline = Container::getModel('Management\\Discipline');
        echo json_encode($Discipline->available());
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
        $this->view->activeSchoolTerm = $SchoolTerm->activeSchoolTerm();

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

        $this->render('/components/classesList', 'SimpleLayout');
    }


    public function classSeek()
    {

        $Classe = Container::getModel('Management\\Classe');

        $Classe->__set('fk_id_course', $_GET['course']);
        $Classe->__set('fk_id_shift', $_GET['shift']);
        $Classe->__set('fk_id_series', $_GET['series']);

        $this->view->listClass = $Classe->seekClass();

        $this->render('/components/classesList', 'SimpleLayout');
    }


    public function classProfile()
    {

        $Student = Container::getModel('Student\\Student');
        $Teacher = Container::getModel('Teacher\\Teacher');
        $Discipline = Container::getModel('Management\\Discipline');
        $Classe = Container::getModel('Management\\Classe');
        $ClassDiscipline = Container::getModel('Management\\ClassDiscipline');

        $ClassDiscipline->__set("fk_id_class", $_GET['id']);
        $Classe->__set('idClass', $_GET['id']);

        $this->view->listStudent = $Student->list("WHERE turma.id_turma = " . $Classe->__get('idClass'));
        $this->view->teacherAvailable = $Teacher->teacherAvailable();
        $this->view->disciplineAvailable = $Discipline->available();
        $this->view->typeStudentList = "class";
        $this->view->classId = $Classe->__get('idClass');
        $this->view->typeTeacherList = 'class';
        $this->view->listTeacher = $ClassDiscipline->listTeachersClass();
        

        $this->render('/components/modalClasseProfile', 'SimpleLayout');
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
        $this->view->disciplineAvailable = $Discipline->available();

        $this->render('/components/disciplineClass', 'SimpleLayout');
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
}
