<?php

namespace App\Controllers\StudentPortal;

use MF\Controller\Action;
use MF\Model\Container;
use App\Tools\Tools;

class StudentPortalController extends Action
{

    public function index()
    {

        $this->render("index/login", "SimpleLayout", "studentPortal");
    }


    public function auth()
    {

        $Student = Container::getModel('Student\\Student');
        $Tool = new Tools();

        $Student->__set('accessCode', $Tool->formatElement($_POST['accessCode']));
        $Student->__set('name', $_POST['name']);

        $auth = $Student->login();

        if (count($auth) != 1) {

            header('Location: /portal-aluno?error=true');
        } else {

            if (!isset($_SESSION)) session_start();

            $_SESSION['Student'] = [

                'id' => $auth[0]->student_id,
                'name' => $auth[0]->student_name,
                'profilePhoto' => $auth[0]->student_photo,
                'hierarchyFunction' => $auth[0]->hierarchy_function,
                'enrollmentId' => $auth[0]->enrollmentId,
                'class' => $auth[0]->acronym_series . 'ª ' . $auth[0]->ballot . ' - ' . $auth[0]->course . ' - ' . $auth[0]->shift,
                'classId' => $auth[0]->classId
            ];

            session_cache_expire(400);

            header('Location: /portal-aluno/home');
        }
    }

    public function home()
    {

        $Student = Container::getModel('Student\\Student');
        $Note = Container::getModel('TeacherStudent\\Note');
        $Observation = Container::getModel('TeacherStudent\\Observation');
        $Lack = Container::getModel('TeacherStudent\\Lack');
        $DisciplineAverage = Container::getModel('TeacherStudent\\DisciplineAverage');
        $StudentRematrug = Container::getModel('Student\\StudentRematrug');
        $Settings = Container::getModel('Admin\\Settings');
        $SchoolTerm = Container::getModel('Admin\\SchoolTerm');
        $Exam = Container::getModel('TeacherStudent\\Exam');
        $ClassDiscipline = Container::getModel('Admin\\ClassDiscipline');

        if (!isset($_SESSION)) session_start();

        $Note->__set('fk_id_student_enrollment', $_SESSION['Student']['enrollmentId']);
        $Observation->__set('fk_id_enrollment', $_SESSION['Student']['enrollmentId']);
        $Lack->__set('fk_id_enrollment', $_SESSION['Student']['enrollmentId']);
        $DisciplineAverage->__set('fk_id_enrollment', $_SESSION['Student']['enrollmentId']);
        $StudentRematrug->__set('fk_id_enrollment', $_SESSION['Student']['enrollmentId']);
        $Student->__set('fk_id_enrollmentId', $_SESSION['Student']['enrollmentId']);
        $Student->__set('fk_id_class', $_SESSION['Student']['classId']);
        $Exam->__set("fk_id_class", $_SESSION['Student']['classId']);
        $ClassDiscipline->__set("fk_id_class", $_SESSION['Student']['classId']);

        $this->view->listNote = $Note->list();
        $this->view->listObservation = $Observation->list();
        $this->view->lackList = $Lack->list();
        $this->view->disciplineAverageList = $DisciplineAverage->list();
        $this->view->rematrugSituationList = $StudentRematrug->rematrugSituation();
        $this->view->checkForRegistration = $StudentRematrug->checkForRegistration();
        $this->view->currentStatusRematrium = $Settings->currentStatusRematrium();
        $this->view->schoolTermActive = $SchoolTerm->active();
        $this->view->studentDataGeneral = $Student->list("<> 0");
        $this->view->listExam = $Exam->list();
        $Student->__set('fk_id_enrollmentId', 0);
        $this->view->listStudent = $Student->list('<> 0');
        $this->view->typeStudentList = "class";
        $this->view->typeTeacherList = 'class';
        $this->view->listTeacher = $ClassDiscipline->listTeachersClass();

        $this->render("pages/home", "SimpleLayout", "studentPortal");
    }


    public function sendRematriumRequest()
    {

        $StudentRematrug = Container::getModel('Student\\StudentRematrug');

        $StudentRematrug->__set('fk_id_rematrug_situation', $_POST['rematrugSituation']);
        $StudentRematrug->__set('fk_id_enrollment', $_POST['enrollmentId']);

        $StudentRematrug->insert();
    }


    public function settings()
    {


        $Student = Container::getModel('Student\\Student');

        if (!isset($_SESSION)) session_start();

        $Student->__set('studentId', $_SESSION['Student']['id']);

        $this->view->studentProfile = $Student->dataGeneral();
        $this->view->availableSex = $Student->availableSex();
        $this->view->pcd = $Student->pcd();
        $this->view->bloodType = $Student->bloodType();
        $this->view->studentEnrollment = $Student->list("<> 0");

        $this->render('pages/settings', 'SimpleLayout', 'studentPortal');
    }


    public function updateSettings()
    {

        $Student = Container::getModel('Student\\Student');
        $Classe = Container::getModel('Admin\\Classe');

        if (!isset($_SESSION)) session_start();

        $_SESSION['Student']['enrollmentId'] = $_POST['enrollmentId'];
        $Student->__set('fk_id_enrollmentId',  $_SESSION['Student']['enrollmentId']);
        $class = $Student->list('<> 0');

        $_SESSION['Student']['classId'] = $class[0]->class_id;
        $Classe->__set('classId', $class[0]->class_id);
        $class0 = $Classe->list("<> 0");

        $_SESSION['Student']['class'] = $class0[0]->seriesId . 'ª ' . $class0[0]->ballot . ' - ' . $class0[0]->courseName . ' - ' . $class0[0]->shift; 
    }


    public function exit()
    {

        if (!isset($_SESSION)) session_start();

        unset($_SESSION['Student']);

        header('Location: /portal-aluno');
    }
}
