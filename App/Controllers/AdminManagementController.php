<?php

namespace App\Controllers;

use App\Models\Matricula;
use MF\Controller\Action;
use MF\Model\Container;

class AdminManagementController extends Action
{

    public function managementGeneral()
    {
        $this->render('management_general', 'AdminLayout');
    }

    public function managementCourse()
    {
        $this->render('management_course', 'AdminLayout');
    }

    public function managementDiscipline()
    {
        $this->render('management_discipline', 'AdminLayout');
    }

    public function managementSchoolTerm()
    {
        $SchoolTerm = Container::getModel('SchoolTerm');

        $this->view->listSchoolTermSituation = $SchoolTerm->listSchoolTermSituation();

        $this->view->lastSchoolTerm = $SchoolTerm->lastSchoolTerm();

        $this->render('management_schoolTerm', 'AdminLayout');
    }

    public function lastSchoolTerm()
    {

        $SchoolTerm = Container::getModel('SchoolTerm');

        echo json_encode($SchoolTerm->lastSchoolTerm());
    }

    public function addSchoolTerm()
    {

        $schoolTerm = Container::getModel('SchoolTerm');

        $schoolTerm->__set('schoolYear', $_POST['schoolYear']);
        $schoolTerm->__set('startDate', $_POST['startDate']);
        $schoolTerm->__set('endDate', $_POST['endDate']);
        $schoolTerm->__set('fk_id_school_term_situation', $_POST['schoolTermSituation']);

        $schoolTerm->addSchoolTerm();
    }

    public function listSchoolTerm()
    {

        $schoolTerm = Container::getModel('SchoolTerm');

        echo json_encode($schoolTerm->listSchoolTerm());
    }


    public function managementRoom()
    {
        $this->render('management_room', 'AdminLayout');
    }

    public function managementClass()
    {
        $this->render('management_class', 'AdminLayout');
    }
}
