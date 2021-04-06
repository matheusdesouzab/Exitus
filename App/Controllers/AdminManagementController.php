<?php

namespace App\Controllers;

use App\Models\SchoolTerm;
use MF\Controller\Action;
use MF\Model\Container;

class AdminManagementController extends Action
{

    public function managementGeneral()
    {
        $this->render('/pages/management_general', 'AdminLayout');
    }


    public function formClassRoom()
    {
        $ClassRoom = Container::getModel('ClassRoom');
        $this->view->listClassRoom = $ClassRoom->listClassRoom();
        $this->render('formClassRoom', 'SimpleLayout');
    }


    // School Term


    public function SchoolTerm()
    {
        $this->render('/pages/management_schoolTerm', 'AdminLayout');
    }


    public function insertSchoolTerm()
    {

        $SchoolTerm = Container::getModel('SchoolTerm');

        $data = [
            'startDate' => $_POST['startDate'],
            'endDate' => $_POST['endDate'],
            'fk_id_school_term_situation' => $_POST['schoolTermSituationAdd'],
            'fk_id_school_year' => $_POST['schoolYear'],
        ];

        $SchoolTerm->setAll($data)->insertSchoolTerm();
    }


    public function updateSchoolTerm()
    {

        $SchoolTerm = Container::getModel('SchoolTerm');

        $data = [
            'idSchoolTerm' => $_POST['idSchoolTerm'],
            'startDate' => $_POST['startDate'],
            'endDate' => $_POST['endDate'],
            'fk_id_school_term_situation' => $_POST['schoolTermSituation'],
            'fk_id_school_year' => $_POST['schoolYear'],
        ];

        $SchoolTerm->setAll($data)->updateSchoolTerm();
    }


    public function listSchoolTerm()
    {

        $SchoolTerm = Container::getModel('SchoolTerm');
        $this->view->listSchoolTerm = $SchoolTerm->listSchoolTerm();
        $this->view->listSchoolTermSituation = $SchoolTerm->listSchoolTermSituation();
        $this->render('/listElement/listSchoolTerm', 'SimpleLayout');
    }


    public function deleteSchoolTerm()
    {

        $SchoolTerm = Container::getModel('SchoolTerm');
        $SchoolTerm->idSchoolTerm = $_POST['idSchoolTerm'];
        $SchoolTerm->deleteSchoolTerm();
    }


    public function listSchoolTermSituation()
    {

        $SchoolTerm = Container::getModel('SchoolTerm');
        echo json_encode($SchoolTerm->listSchoolTermSituation());
    }


    public function availableSchoolTerm()
    {

        $SchoolTerm = Container::getModel('SchoolTerm');
        echo json_encode($SchoolTerm->availableSchoolTerm());
    }


    public function activeSchoolTerm()
    {
        $SchoolTerm = Container::getModel('SchoolTerm');
        echo json_encode($SchoolTerm->activeSchoolTerm());
    }


    // Class Room ( Sala de Aula )


    public function ClassRoom()
    {
        $this->render('/pages/management_classRoom', 'AdminLayout');
    }


    public function insertClassRoom()
    {
        $ClassRoom = Container::getModel('ClassRoom');
        $data = ['studentCapacity' => $_POST['studentCapacity'], 'fk_id_classroom_number' => $_POST['classroomNumber']];
        $ClassRoom->setAll($data)->insertClassRoom();
    }


    public function updateClassRoom()
    {
        $ClassRoom = Container::getModel('ClassRoom');
        $data = ['studentCapacity' => $_POST['studentCapacity'], 'idClassRoom' => $_POST['idClassRoom']];
        $ClassRoom->setAll($data)->updateClassRoom();
    }


    public function availableClassroom()
    {
        $ClassRoom = Container::getModel('ClassRoom');
        echo json_encode($ClassRoom->availableClassroom());
    }


    public function listClassRoom()
    {

        $ClassRoom = Container::getModel('ClassRoom');
        $this->view->listClassRoom = $ClassRoom->listClassRoom();
        $this->render('/listElement/listClassRoom', 'SimpleLayout');
    }


    public function deleteClassRoom()
    {

        $ClassRoom = Container::getModel('ClassRoom');
        $ClassRoom->idClassRoom = $_POST['idClassRoom'];
        $ClassRoom->deleteClassRoom();
    }


    public function activeClassRoom()
    {
        $ClassRoom = Container::getModel('ClassRoom');
        echo json_encode($ClassRoom->activeClassRoom());
    }



    // Course


    public function managementCourse()
    {
        $this->render('/pages/management_course', 'AdminLayout');
    }


    public function insertCourse()
    {

        $Course = Container::getModel('Course');
        $data = ['course' => $_POST['course'], 'acronym' => $_POST['acronym']];
        $Course->setAll($data)->insertCourse();
    }


    public function listCourse()
    {
        $Course = Container::getModel('Course');
        $this->view->listCourse = $Course->listCourse();
        $this->render('/listElement/listCourse', 'SimpleLayout');
    }


    public function updateCourse()
    {

        $Course = Container::getModel('Course');
        $data = ['idCourse' => $_POST['idCourse'], 'course' => $_POST['course'], 'acronym' => $_POST['acronym']];
        $Course->setAll($data)->updateCourse();
    }


    public function availableCourse()
    {
        $Course = Container::getModel('Course');
        echo json_encode($Course->availableCourse());
    }


    public function deleteCourse()
    {

        $Course = Container::getModel('Course');
        $Course->idCourse = $_POST['idCourse'];
        $Course->deleteCourse();
    }


    // Discipline


    public function managementDiscipline()
    {
        $this->render('/pages/management_discipline', 'AdminLayout');
    }


    public function insertDiscipline()
    {
        $Discipline = Container::getModel('Discipline');
        $data = ['discipline' => $_POST['discipline'], 'acronym' => $_POST['acronym'], 'fk_id_modality' => $_POST['modalityAdd']];
        $Discipline->setAll($data)->insertDiscipline();
    }


    public function listDisciplineModality()
    {
        $Discipline = Container::getModel('Discipline');
        echo json_encode($Discipline->listDisciplineModality());
    }


    public function listDiscipline()
    {
        $Discipline = Container::getModel('Discipline');
        $this->view->listDiscipline = $Discipline->listDiscipline();
        $this->render('/listElement/listDiscipline', 'SimpleLayout');
    }


    public function updateDiscipline()
    {
        $Discipline = Container::getModel('Discipline');

        $data = [
            'idDiscipline' => $_POST['idDiscipline'],
            'discipline' => $_POST['discipline'],
            'acronym' => $_POST['acronym'],
            'fk_id_modality' => $_POST['modality']
        ];

        $Discipline->setAll($data)->updateDiscipline();
    }


    public function seekDiscipline()
    {
        $Discipline = Container::getModel('Discipline');

        $data = [
            'discipline' => $_GET['seekName'],
            'fk_id_modality' => $_GET['seekModality']
        ];

        $Discipline->setAll($data);

        $this->view->listDiscipline = $Discipline->seekDiscipline();

        $this->render('/listElement/listDiscipline', 'SimpleLayout');
    }


    public function disciplineData()
    {
        $Discipline = Container::getModel('Discipline');
        $Discipline->idDiscipline = $_GET['idDiscipline'];

        $this->view->discipline = $Discipline->disciplineData();
        $this->view->listDisciplineModality = $Discipline->listDisciplineModality();

        $this->render('/modals/modalDiscipline', 'SimpleLayout');
        
    }


    public function deleteDiscipline()
    {
        $Discipline = Container::getModel('Discipline');
        $Discipline->idDiscipline = $_POST['idDiscipline'];
        $Discipline->deleteDiscipline();
    }


    // Class


    public function managementClass()
    {
        $this->render('/pages/management_class', 'AdminLayout');
    }


    public function insertClass()
    {
        $Class = Container::getModel('Classe');

        $data = [
            'fk_id_ballot' => $_POST['ballot'],
            'fk_id_classroom' => $_POST['classRoom'],
            'fk_id_school_term' => $_POST['schoolTerm'],
            'fk_id_course' => $_POST['course'],
            'fk_id_shift' => $_POST['shift'],
            'fk_id_series' => $_POST['series'],
        ];

        $Class->setAll($data)->insertClass();
    }


    public function availableShift()
    {
        $Classe = Container::getModel('Classe');
        echo json_encode($Classe->availableShift());
    }


    public function availableBallot()
    {
        $Classe = Container::getModel('Classe');
        echo json_encode($Classe->availableBallot());
    }


    public function availableSeries()
    {
        $Classe = Container::getModel('Classe');
        echo json_encode($Classe->availableSeries());
    }


    public function checkClass()
    {
        $Classe = Container::getModel('Classe');

        $data = [
            'fk_id_classroom' => $_GET['classRoom'],
            'fk_id_shift' => $_GET['shift'],
            'fk_id_series' => $_GET['series'],
            'fk_id_ballot' => $_GET['ballot'],
            'fk_id_course' => $_GET['course'],
        ];

        echo json_encode($Classe->setAll($data)->checkClass());
    }


    public function listClass()
    {
        $Classe = Container::getModel('Classe');
        $this->view->listClass = $Classe->listClass();
        $this->render('/listElement/listClass', 'SimpleLayout');
    }


    public function seekClass()
    {
        $Classe = Container::getModel('Classe');

        $data = [
            'fk_id_shift' => $_GET['shift'],
            'fk_id_series' => $_GET['series'],
            'fk_id_course' => $_GET['course'],
        ];

        $Classe->setAll($data);

        $this->view->listClass = $Classe->seekClass();

        $this->render('/listElement/listClass', 'SimpleLayout');
    }
}
