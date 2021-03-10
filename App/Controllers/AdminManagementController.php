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

        $this->render('management_schoolTerm', 'AdminLayout');
    }

    public function lastSchoolTerm()
    {

        $SchoolTerm = Container::getModel('SchoolTerm');

        echo json_encode($SchoolTerm->listSchoolTerm('order by periodo_letivo.ano_letivo desc limit 1'));
    }

    public function listSchoolTermSituation()
    {

        $SchoolTerm = Container::getModel('SchoolTerm');
        
        echo json_encode($SchoolTerm->listSchoolTermSituation(' '));
    }

    public function addSchoolTerm()
    {

        $SchoolTerm = Container::getModel('SchoolTerm');

        $SchoolTerm->__set('schoolYear', $_POST['schoolYear']);
        $SchoolTerm->__set('startDate', $_POST['startDate']);
        $SchoolTerm->__set('endDate', $_POST['endDate']);
        $SchoolTerm->__set('fk_id_school_term_situation', $_POST['schoolTermSituation']);

        $SchoolTerm->addSchoolTerm();
    }

    public function listSchoolTerm()
    {

        $SchoolTerm = Container::getModel('SchoolTerm');

        echo json_encode($SchoolTerm->listSchoolTerm('order by periodo_letivo.ano_letivo desc'));
    }

    public function updateSchoolTerm(){

        $SchoolTerm = Container::getModel('SchoolTerm');

        $SchoolTerm->__set('idSchoolYear', $_POST['idSchoolYear']);
        $SchoolTerm->__set('startDate', $_POST['startDate']);
        $SchoolTerm->__set('endDate', $_POST['endDate']);
        $SchoolTerm->__set('fk_id_school_term_situation', $_POST['schoolTermSituation']);

        $SchoolTerm->updateSchoolTerm();

        $SchoolTerm->listSchoolTerm("where periodo_letivo.id_ano_letivo = ".$SchoolTerm->__get('idSchoolYear'));

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
