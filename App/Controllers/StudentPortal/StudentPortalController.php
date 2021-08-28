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

        $Note = Container::getModel('TeacherStudent\\Note');
        $Observation = Container::getModel('TeacherStudent\\Observation');
        $Lack = Container::getModel('TeacherStudent\\Lack');
        $DisciplineAverage = Container::getModel('TeacherStudent\\DisciplineAverage');
        $StudentRematrug = Container::getModel('Student\\StudentRematrug');

        if (!isset($_SESSION)) session_start();

        $Note->__set('fk_id_student_enrollment', $_SESSION['Student']['enrollmentId']);
        $Observation->__set('fk_id_enrollment', $_SESSION['Student']['enrollmentId']);
        $Lack->__set('fk_id_enrollment', $_SESSION['Student']['enrollmentId']);
        $DisciplineAverage->__set('fk_id_enrollment', $_SESSION['Student']['enrollmentId']);

        $this->view->listNote = $Note->list();
        $this->view->listObservation = $Observation->list();
        $this->view->lackList = $Lack->list();
        $this->view->disciplineAverageList = $DisciplineAverage->list();
        $this->view->rematrugSituationList = $StudentRematrug->rematrugSituation();

        $this->render("pages/home", "SimpleLayout", "studentPortal");
    }


    public function rematrugInsert()
    {

        $StudentRematrug = Container::getModel('Student\\StudentRematrug');

        $StudentRematrug->__set('fk_id_rematrug_situation', $_POST['rematrugSituation']);
        $StudentRematrug->__set('fk_id_enrollmentId', $_POST['enrollmentId']);

        $StudentRematrug->insert();
    }


    public function exit()
    {

        if (!isset($_SESSION)) session_start();

        unset($_SESSION['Student']);

        header('Location: /portal-aluno');
    }
}
