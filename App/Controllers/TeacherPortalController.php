<?php

namespace App\Controllers;

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
        $Teacher->__set('teacherName', $_POST['name']);

        $auth = $Teacher->login();

        if (count($auth) != 1) {

            header('Location: /portal-docente?error=true');
        } else {

            session_start();

            $_SESSION['teacher_id'] = $auth[0]->teacher_id;
            $_SESSION['teacher_name'] = $auth[0]->teacher_name;

            header('Location: /portal-docente/home');
        }
    }


    public function home()
    {

        session_start();

        print_r($_SESSION);
    }


    public function teacherClasses()
    {

        $Teacher = Container::getModel('Teacher\\Teacher');
        $Classe = Container::getModel('Management\\Classe');
        $Course = Container::getModel('Management\\Course');
        $ClassRoom = Container::getModel('Management\\ClassRoom');
        $SchoolTerm = Container::getModel('Management\\SchoolTerm');

        session_start();

        $Teacher->__set('id', $_SESSION['teacher_id']);

        $this->view->teacherClasses = $Teacher->teacherClasses();
        $this->view->listClass = $Classe->list();
        $this->view->availableShift = $Classe->availableShift();
        $this->view->availableBallot = $Classe->availableBallot();
        $this->view->availableSeries = $Classe->availableSeries();
        $this->view->availableCourse = $Course->availableCourse();
        $this->view->availableClassRoom = $ClassRoom->activeClassroom();
        $this->view->activeSchoolTerm = $SchoolTerm->active();

        session_abort();

        $this->render('management/pages/listClass', 'TeacherPortalLayout', 'TeacherPortal');
    }


    public function seekTeacherClasses()
    {

        $Classe = Container::getModel('Management\\Classe');
        $Teacher = Container::getModel('Teacher\\Teacher');

        $Classe->__set('fk_id_course', $_GET['course']);
        $Classe->__set('fk_id_shift', $_GET['shift']);
        $Classe->__set('fk_id_series', $_GET['series']);
        $Classe->__set('fk_id_series', $_GET['series']);
        
        session_start();

        $Teacher->__set('id', $_SESSION['teacher_id']);

        session_abort();

        $this->view->teacherClasses = $Teacher->seekTeacherClasses($Classe);

        $this->render('management/pages/listClass', 'TeacherPortalLayout', 'TeacherPortal');

    }


    public function closeSession()
    {

        session_start();
        session_destroy();

        header('Location: /portal-docente');
    }
}
