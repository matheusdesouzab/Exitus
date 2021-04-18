<?php

namespace App\Controllers;

use App\Models\Management\SchoolTerm;
use MF\Controller\Action;
use MF\Model\Container;

class AdminManagementController extends Action
{

    public function managementGeneral()
    {
        $this->render('/pages/management_general', 'AdminLayout');
    }


    // School Term


    public function SchoolTerm()
    {
        $this->render('/pages/management_schoolTerm', 'AdminLayout');
    }


    public function insertSchoolTerm()
    {

        $SchoolTerm = Container::getModel('Management\\SchoolTerm');

        $SchoolTerm->__set('startDate', $_POST['startDate']);
        $SchoolTerm->__set('endDate', $_POST['endDate']);
        $SchoolTerm->__set('fk_id_school_term_situation', $_POST['schoolTermSituationAdd']);
        $SchoolTerm->__set('fk_id_school_year', $_POST['schoolYear']);

        $SchoolTerm->insert();
    }


    public function updateSchoolTerm()
    {

        $SchoolTerm = Container::getModel('Management\\SchoolTerm');

        $SchoolTerm->__set('idSchoolTerm', $_POST['idSchoolTerm']);
        $SchoolTerm->__set('startDate', $_POST['startDate']);
        $SchoolTerm->__set('endDate', $_POST['endDate']);
        $SchoolTerm->__set('fk_id_school_term_situation', $_POST['schoolTermSituation']);

        $SchoolTerm->update();
    }


    public function listSchoolTerm()
    {

        $SchoolTerm = Container::getModel('Management\\SchoolTerm');

        $this->view->listSchoolTerm = $SchoolTerm->list();
        $this->view->listSchoolTermSituation = $SchoolTerm->listSchoolTermSituation();

        $this->render('/listElement/listSchoolTerm', 'SimpleLayout');
    }


    public function deleteSchoolTerm()
    {

        $SchoolTerm = Container::getModel('Management\\SchoolTerm');
        $SchoolTerm->__set('idSchoolTerm', $_POST['idSchoolTerm']);
        $SchoolTerm->delete();
    }


    public function listSchoolTermSituation()
    {

        $SchoolTerm = Container::getModel('Management\\SchoolTerm');
        echo json_encode($SchoolTerm->listSchoolTermSituation());
    }


    public function availableSchoolTerm()
    {

        $SchoolTerm = Container::getModel('Management\\SchoolTerm');
        echo json_encode($SchoolTerm->availableSchoolTerm());
    }


    public function activeSchoolTerm()
    {

        $SchoolTerm = Container::getModel('Management\\SchoolTerm');
        echo json_encode($SchoolTerm->activeSchoolTerm());
    }


    // Class Room ( Sala de Aula )


    public function ClassRoom()
    {
        $this->render('/pages/management_classRoom', 'AdminLayout');
    }


    public function insertClassRoom()
    {

        $ClassRoom = Container::getModel('Management\\ClassRoom');

        $ClassRoom->__set('studentCapacity', $_POST['studentCapacity']);
        $ClassRoom->__set('fk_id_classroom_number', $_POST['classroomNumber']);

        $ClassRoom->insert();
    }


    public function updateClassRoom()
    {

        $ClassRoom = Container::getModel('Management\\ClassRoom');

        $ClassRoom->__set('idClassRoom', $_POST['idClassRoom']);
        $ClassRoom->__set('studentCapacity', $_POST['studentCapacity']);

        $ClassRoom->update();
    }


    public function availableClassroom()
    {

        $ClassRoom = Container::getModel('Management\\ClassRoom');
        echo json_encode($ClassRoom->availableClassroom());
    }


    public function listClassRoom()
    {

        $ClassRoom = Container::getModel('Management\\ClassRoom');
        $this->view->listClassRoom = $ClassRoom->list();
        $this->render('/listElement/listClassRoom', 'SimpleLayout');
    }


    public function deleteClassRoom()
    {

        $ClassRoom = Container::getModel('Management\\ClassRoom');
        $ClassRoom->__set('idClassRoom', $_POST['idClassRoom']);
        $ClassRoom->delete();
    }


    public function activeClassRoom()
    {

        $ClassRoom = Container::getModel('Management\\ClassRoom');
        echo json_encode($ClassRoom->activeClassRoom());
    }



    // Course


    public function managementCourse()
    {
        $this->render('/pages/management_course', 'AdminLayout');
    }


    public function insertCourse()
    {

        $Course = Container::getModel('Management\\Course');

        $Course->__set('course', $_POST['course']);
        $Course->__set('acronym', $_POST['acronym']);

        $Course->insert();
    }


    public function listCourse()
    {

        $Course = Container::getModel('Management\\Course');
        $this->view->listCourse = $Course->list();
        $this->render('/listElement/listCourse', 'SimpleLayout');
    }


    public function updateCourse()
    {

        $Course = Container::getModel('Management\\Course');

        $Course->__set('idCourse', $_POST['idCourse']);
        $Course->__set('course', $_POST['course']);
        $Course->__set('acronym', $_POST['acronym']);

        $Course->update();
    }


    public function availableCourse()
    {

        $Course = Container::getModel('Management\\Course');
        echo json_encode($Course->availableCourse());
    }


    public function deleteCourse()
    {

        $Course = Container::getModel('Management\\Course');
        $Course->__set('idCourse', $_POST['idCourse']);
        $Course->delete();
    }


    // Discipline


    public function managementDiscipline()
    {
        $this->render('/pages/management_discipline', 'AdminLayout');
    }


    public function insertDiscipline()
    {

        $Discipline = Container::getModel('Management\\Discipline');

        $Discipline->__set('discipline', $_POST['discipline']);
        $Discipline->__set('acronym', $_POST['acronym']);
        $Discipline->__set('fk_id_modality', $_POST['modalityAdd']);

        $Discipline->insert();
    }


    public function listDisciplineModality()
    {

        $Discipline = Container::getModel('Management\\Discipline');
        echo json_encode($Discipline->listDisciplineModality());
    }


    public function listDiscipline()
    {

        $Discipline = Container::getModel('Management\\Discipline');
        $this->view->listDiscipline = $Discipline->list();
        $this->render('/listElement/listDiscipline', 'SimpleLayout');
    }


    public function updateDiscipline()
    {

        $Discipline = Container::getModel('Management\\Discipline');

        $Discipline->__set('idDiscipline', $_POST['idDiscipline']);
        $Discipline->__set('discipline', $_POST['discipline']);
        $Discipline->__set('acronym', $_POST['acronym']);
        $Discipline->__set('fk_id_modality', $_POST['modality']);

        $Discipline->update();
    }


    public function seekDiscipline()
    {

        $Discipline = Container::getModel('Management\\Discipline');

        $Discipline->__set('discipline', $_GET['seekName']);
        $Discipline->__set('fk_id_modality', $_GET['seekModality']);

        $this->view->listDiscipline = $Discipline->seekDiscipline();

        $this->render('/listElement/listDiscipline', 'SimpleLayout');
    }


    public function disciplineData()
    {

        $Discipline = Container::getModel('Management\\Discipline');
        $Discipline->__set('idDiscipline', $_GET['idDiscipline']);

        $this->view->discipline = $Discipline->disciplineData();
        $this->view->listDisciplineModality = $Discipline->listDisciplineModality();

        $this->render('/modals/modalDiscipline', 'SimpleLayout');
    }


    public function deleteDiscipline()
    {

        $Discipline = Container::getModel('Management\\Discipline');
        $Discipline->__set('idDiscipline', $_POST['idDiscipline']);
        $Discipline->delete();
    }


    // Class


    public function managementClass()
    {
        $this->render('/pages/management_class', 'AdminLayout');
    }


    public function insertClass()
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


    public function availableShift()
    {

        $Classe = Container::getModel('Management\\Classe');
        echo json_encode($Classe->availableShift());
    }


    public function availableBallot()
    {

        $Classe = Container::getModel('Management\\Classe');
        echo json_encode($Classe->availableBallot());
    }


    public function availableSeries()
    {

        $Classe = Container::getModel('Management\\Classe');
        echo json_encode($Classe->availableSeries());
    }


    public function checkClass()
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


    public function listClass()
    {

        $Classe = Container::getModel('Management\\Classe');
        $this->view->listClass = $Classe->list();
        $this->render('/listElement/listClass', 'SimpleLayout');
    }


    public function seekClass()
    {

        $Classe = Container::getModel('Management\\Classe');

        $Classe->__set('fk_id_course', $_GET['course']);
        $Classe->__set('fk_id_shift', $_GET['shift']);
        $Classe->__set('fk_id_series', $_GET['series']);

        $this->view->listClass = $Classe->seekClass();

        $this->render('/listElement/listClass', 'SimpleLayout');
    }
}
