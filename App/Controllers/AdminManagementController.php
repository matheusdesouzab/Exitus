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


    // School Term


    public function SchoolTerm() // Carrega página 
    {
        $SchoolTerm = Container::getModel('SchoolTerm');

        $this->render('management_schoolTerm', 'AdminLayout');
    }


    public function addSchoolTerm() // Adicionar período letivo 
    {

        $SchoolTerm = Container::getModel('SchoolTerm');

        $SchoolTerm->__set('startDate', $_POST['startDate']);
        $SchoolTerm->__set('endDate', $_POST['endDate']);
        $SchoolTerm->__set('fk_id_school_term_situation', $_POST['schoolTermSituation']);
        $SchoolTerm->__set('fk_id_school_year', $_POST['schoolYear']);

        $SchoolTerm->addSchoolTerm();
    }


    public function updateSchoolTerm() // Atualizar período letivo 
    {

        $SchoolTerm = Container::getModel('SchoolTerm');

        $SchoolTerm->__set('idSchoolTerm', $_POST['idSchoolTerm']);
        $SchoolTerm->__set('startDate', $_POST['startDate']);
        $SchoolTerm->__set('endDate', $_POST['endDate']);
        $SchoolTerm->__set('fk_id_school_term_situation', $_POST['schoolTermSituation']);
        $SchoolTerm->__set('fk_id_school_year', $_POST['schoolYear']);

        $SchoolTerm->updateSchoolTerm();
    }

    public function listSchoolTerm() // Lista dos períodos letivos 
    {

        $SchoolTerm = Container::getModel('SchoolTerm');

        echo json_encode($SchoolTerm->listSchoolTerm('order by periodo_disponivel.ano_letivo desc'));
    }

    public function deleteSchoolTerm() // Apagar período letivo
    {

        $SchoolTerm = Container::getModel('SchoolTerm');

        $SchoolTerm->__set('idSchoolTerm', $_POST['idSchoolTerm']);

        $SchoolTerm->deleteSchoolTerm();
    }

    public function listSchoolTermSituation() // Lista das situações dos períodos letivos
    {

        $SchoolTerm = Container::getModel('SchoolTerm');

        echo json_encode($SchoolTerm->listSchoolTermSituation(''));
    }

    public function availableSchoolTerm() // Listas dos períodos letivos
    {

        $SchoolTerm = Container::getModel('SchoolTerm');

        echo json_encode($SchoolTerm->availableSchoolTerm());
    }


    // Class Room ( Sala de Aula )


    public function ClassRoom()
    {
        $this->render('management_classRoom', 'AdminLayout');
    }

    public function addClassRoom()
    {
        $ClassRoom = Container::getModel('ClassRoom');
        $ClassRoom->__set('fk_id_classroom_number', $_POST['classroomNumber']);
        $ClassRoom->addClassRoom();

    }

    public function availableClassroom()
    {
        $ClassRoom = Container::getModel('ClassRoom');
        echo json_encode($ClassRoom->availableClassroom());
        
    }

    public function listClassRoom(){

        $ClassRoom = Container::getModel('ClassRoom');
        echo json_encode($ClassRoom->listClassroom());

    }

    public function deleteClassRoom(){

        $ClassRoom = Container::getModel('ClassRoom');
        $ClassRoom->__set('idClassRoom', $_POST['idClassRoom']);
        $ClassRoom->deleteClassroom();

    }




    public function managementCourse()
    {
        $this->render('management_course', 'AdminLayout');
    }

    public function managementDiscipline()
    {
        $this->render('management_discipline', 'AdminLayout');
    }

    public function managementClass()
    {
        $this->render('management_class', 'AdminLayout');
    }
}
