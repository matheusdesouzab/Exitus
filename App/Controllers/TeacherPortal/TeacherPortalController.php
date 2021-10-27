<?php

namespace App\Controllers\TeacherPortal;

use MF\Controller\Action;
use MF\Model\Container;
use App\Tools\Tools;

class TeacherPortalController extends Action
{

    public function index()
    {

        $this->render("index/login", "SimpleLayout", "teacherPortal");
    }


    public function auth()
    {

        $Teacher = Container::getModel('Teacher\\Teacher');
        $Tool = new Tools();

        $Teacher->__set('accessCode', $Tool->formatElement($_POST['accessCode']));
        $Teacher->__set('name', $_POST['name']);

        $auth = $Teacher->login();

        if (count($auth) != 1) {

            header('Location: /portal-docente?error=true');
        } else {

            if (!isset($_SESSION)) session_start();

            $_SESSION['Teacher'] = [

                'id' => $auth[0]->teacher_id,
                'name' => $auth[0]->teacher_name,
                'profilePhoto' => $auth[0]->teacher_photo,
                'hierarchyFunction' => $auth[0]->hierarchy_function

            ];

            session_cache_expire(60);

            header('Location: /portal-docente/turmas');
        }
    }


    public function home()
    {

        $Settings = Container::getModel('Admin\\Settings');
        $SchoolTerm = Container::getModel('GeneralManagement\\SchoolTerm');
        $Teacher = Container::getModel('Teacher\\Teacher');
        $Exam = Container::getModel('TeacherStudent\\Exam');
        $Note = Container::getModel('TeacherStudent\\Note');
        $Lack = Container::getModel('TeacherStudent\\Lack');
        $DisciplineAverage = Container::getModel('TeacherStudent\\DisciplineAverage');
        $Observation = Container::getModel('TeacherStudent\\Observation');

        if (!isset($_SESSION)) session_start();

        $Teacher->__set('teacherId', $_SESSION['Teacher']['id']);

        $this->view->unitControlCurrent = $Settings->unitControlCurrent();
        $this->view->SchoolTermActive = $SchoolTerm->active();
        $this->view->totalStudents = $Teacher->totalStudents();
        $this->view->listExam = $Teacher->readExamByIdTeacher();
        $this->view->listNote = $Teacher->readNoteByIdTeacher();
        $this->view->listLack = $Teacher->readLackByIdTeacher();
        $this->view->listObservation = $Teacher->readObservationByIdTeacher();
        $this->view->listDisciplineAverage = $Teacher->readByIdTeacher();

        $this->render('home', 'TeacherPortalLayout', 'TeacherPortal');
    }


    public function teacherClasses()
    {

        $Teacher = Container::getModel('Teacher\\Teacher');
        $Classe = Container::getModel('GeneralManagement\\Classe');
        $Course = Container::getModel('GeneralManagement\\Course');
        $ClassRoom = Container::getModel('GeneralManagement\\ClassRoom');
        $SchoolTerm = Container::getModel('GeneralManagement\\SchoolTerm');
        $Shift = Container::getModel('GeneralManagement\\Shift');
        $Series = Container::getModel('GeneralManagement\\Series');
        $Ballot = Container::getModel('GeneralManagement\\Ballot');

        if (!isset($_SESSION)) session_start();

        $Teacher->__set('teacherId', $_SESSION['Teacher']['id']);

        $this->view->teacherClasses = $Teacher->teacherClasses();
        $this->view->listClass = $Classe->list();
        $this->view->availableShift = $Shift->listForSelect();
        $this->view->availableBallot = $Ballot->listForSelect();
        $this->view->availableSeries = $Series->listForSelect();
        $this->view->availableCourse = $Course->listForSelect();
        $this->view->availableClassRoom = $ClassRoom->listForSelect();
        $this->view->activeSchoolTerm = $SchoolTerm->active();

        $this->render('management/pages/listClass', 'TeacherPortalLayout', 'TeacherPortal');
    }


    public function seekTeacherClasses()
    {

        $Classe = Container::getModel('GeneralManagement\\Classe');
        $Teacher = Container::getModel('Teacher\\Teacher');

        $Classe->__set('fk_id_course', $_GET['course']);
        $Classe->__set('fk_id_shift', $_GET['shift']);
        $Classe->__set('fk_id_series', $_GET['series']);
        $Classe->__set('fk_id_series', $_GET['series']);

        if (!isset($_SESSION)) session_start();

        $Teacher->__set('teacherId', $_SESSION['Teacher']['id']);

        $this->view->teacherClasses = $Teacher->seekTeacherClasses($Classe);

        $this->render('management/components/classListing', 'SimpleLayout', 'TeacherPortal');
    }


    public function settings()
    {

        $Teacher = Container::getModel('Teacher\\Teacher');

        if (!isset($_SESSION)) session_start();

        $Teacher->__set('teacherId', $_SESSION['Teacher']['id']);

        $this->view->Data = $Teacher->dataGeneral();
        $this->view->availableSex = $Teacher->availableSex();
        $this->view->pcd = $Teacher->pcd();
        $this->view->bloodType = $Teacher->availablebloodType();

        $this->render('settings', 'SimpleLayout', 'TeacherPortal');
    }


    public function updateTeacherPortal()
    {

        $Teacher = Container::getModel('Teacher\\Teacher');
        $Address =  Container::getModel('People\\Address');
        $Telephone = Container::getModel('People\Telephone');

        $Tool = new Tools();

        if (!isset($_SESSION)) session_start();

        $Address->__set('addressId', $_POST['addressId']);
        $Address->__set('district', $_POST['district']);
        $Address->__set('address', $_POST['address']);
        $Address->__set('uf', $_POST['uf']);
        $Address->__set('county', $_POST['county']);
        $Address->__set('zipCode', $Tool->formatElement($_POST['zipCode']));

        $Telephone->__set('telephoneId', $_POST['telephoneId']);
        $Telephone->__set('telephoneNumber', $Tool->formatElement($_POST['telephoneNumber']));

        $Teacher->__set('name', $_POST['name']);
        $Teacher->__set('birthDate', $_POST['birthDate']);
        $Teacher->__set('cpf', $Tool->formatElement($_POST['cpf']));
        $Teacher->__set('naturalness', $_POST['naturalness']);
        $Teacher->__set('nationality', $_POST['nationality']);
        $Teacher->__set('email', $_POST['email']);
        $Teacher->__set('fk_id_sex', $_POST['sex']);
        $Teacher->__set('fk_id_blood_type', $_POST['bloodType']);
        $Teacher->__set('fk_id_pcd', $_POST['pcd']);
        $Teacher->__set('teacherId', $_SESSION['Teacher']['id']);

        $Telephone->update();
        $Address->update();
        $Teacher->update();
    }


    public function studentBasedFinalAverage()
    {

        $Teacher = Container::getModel('Teacher\\Teacher');

        if (!isset($_SESSION)) session_start();

        $Teacher->__set('teacherId', $_SESSION['Teacher']['id']);
        
        echo json_encode($Teacher->studentBasedFinalAverage());
    }


    public function exit()
    {

        if (!isset($_SESSION)) session_start();

        unset($_SESSION['Teacher']);

        header('Location: /portal-docente');
    }
}
