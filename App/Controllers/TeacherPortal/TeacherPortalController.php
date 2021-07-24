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

            header('Location: /portal-docente/turmas');
        }
    }


    public function home()
    {

        if (!isset($_SESSION)) session_start();

        print_r($_SESSION);
    }


    public function teacherClasses()
    {

        $Teacher = Container::getModel('Teacher\\Teacher');
        $Classe = Container::getModel('Admin\\Classe');
        $Course = Container::getModel('Admin\\Course');
        $ClassRoom = Container::getModel('Admin\\ClassRoom');
        $SchoolTerm = Container::getModel('Admin\\SchoolTerm');

        if (!isset($_SESSION)) session_start();

        $Teacher->__set('id', $_SESSION['Teacher']['id']);

        $this->view->teacherClasses = $Teacher->teacherClasses();
        $this->view->listClass = $Classe->list();
        $this->view->availableShift = $Classe->availableShift();
        $this->view->availableBallot = $Classe->availableBallot();
        $this->view->availableSeries = $Classe->availableSeries();
        $this->view->availableCourse = $Course->availableCourse();
        $this->view->availableClassRoom = $ClassRoom->activeClassroom();
        $this->view->activeSchoolTerm = $SchoolTerm->active();

        $this->render('management/pages/listClass', 'TeacherPortalLayout', 'TeacherPortal');
    }


    public function seekTeacherClasses()
    {

        $Classe = Container::getModel('Admin\\Classe');
        $Teacher = Container::getModel('Teacher\\Teacher');

        $Classe->__set('fk_id_course', $_GET['course']);
        $Classe->__set('fk_id_shift', $_GET['shift']);
        $Classe->__set('fk_id_series', $_GET['series']);
        $Classe->__set('fk_id_series', $_GET['series']);

        if (!isset($_SESSION)) session_start();

        $Teacher->__set('id', $_SESSION['Teacher']['id']);

        $this->view->teacherClasses = $Teacher->seekTeacherClasses($Classe);

        $this->render('management/components/classListing', 'SimpleLayout', 'TeacherPortal');
    }


    public function exit()
    {

        if (!isset($_SESSION)) session_start();

        unset($_SESSION['Teacher']);

        header('Location: /portal-docente');
    }
}
