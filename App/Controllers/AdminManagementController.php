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


    public function SchoolTerm() 
    {
        $SchoolTerm = Container::getModel('SchoolTerm');

        $this->render('management_schoolTerm', 'AdminLayout');
    }


    public function addSchoolTerm() 
    {

        $SchoolTerm = Container::getModel('SchoolTerm');

        $SchoolTerm->__set('startDate', $_POST['startDate']);
        $SchoolTerm->__set('endDate', $_POST['endDate']);
        $SchoolTerm->__set('fk_id_school_term_situation', $_POST['schoolTermSituation']);
        $SchoolTerm->__set('fk_id_school_year', $_POST['schoolYear']);

        $SchoolTerm->addSchoolTerm();
    }


    public function updateSchoolTerm() 
    {

        $SchoolTerm = Container::getModel('SchoolTerm');

        $SchoolTerm->__set('idSchoolTerm', $_POST['idSchoolTerm']);
        $SchoolTerm->__set('startDate', $_POST['startDate']);
        $SchoolTerm->__set('endDate', $_POST['endDate']);
        $SchoolTerm->__set('fk_id_school_term_situation', $_POST['schoolTermSituation']);
        $SchoolTerm->__set('fk_id_school_year', $_POST['schoolYear']);

        $SchoolTerm->updateSchoolTerm();
    }


    public function listSchoolTerm() 
    {

        $SchoolTerm = Container::getModel('SchoolTerm');

        echo json_encode($SchoolTerm->listSchoolTerm('order by periodo_disponivel.ano_letivo desc'));
    }


    public function deleteSchoolTerm() 
    {

        $SchoolTerm = Container::getModel('SchoolTerm');

        $SchoolTerm->__set('idSchoolTerm', $_POST['idSchoolTerm']);

        $SchoolTerm->deleteSchoolTerm();
    }


    public function listSchoolTermSituation() 
    {

        $SchoolTerm = Container::getModel('SchoolTerm');

        echo json_encode($SchoolTerm->listSchoolTermSituation(''));
    }


    public function availableSchoolTerm() 
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


    public function listClassRoom()
    {

        $ClassRoom = Container::getModel('ClassRoom');
        echo json_encode($ClassRoom->listClassroom());
    }


    public function deleteClassRoom()
    {

        $ClassRoom = Container::getModel('ClassRoom');
        $ClassRoom->__set('idClassRoom', $_POST['idClassRoom']);
        $ClassRoom->deleteClassroom();
    }


    // Course


    public function managementCourse()
    {
        $this->render('management_course', 'AdminLayout');
    }


    public function addCourse()
    {

        $Course = Container::getModel('Course');
        $Course->__set('course', $_POST['course']);
        $Course->__set('acronym', $_POST['acronym']);

        $Course->addCourse();
    }


    public function listCourse()
    {
        $Course = Container::getModel('Course');
        echo json_encode($Course->listCourse());
    }


    public function updateCourse()
    {

        $Course = Container::getModel('Course');

        $Course->__set('idCourse', $_POST['idCourse']);
        $Course->__set('course', $_POST['course']);
        $Course->__set('acronym', $_POST['acronym']);

        $Course->updateCourse();
    }
    

    public function deleteCourse()
    {

        $Course = Container::getModel('Course');
        $Course->__set('idCourse', $_POST['idCourse']);
        $Course->deleteCourse();
    }


    // Discipline


    public function managementDiscipline()
    {
        $this->render('management_discipline', 'AdminLayout');
    }












    public function managementClass()
    {
        $this->render('management_class', 'AdminLayout');
    }
}
