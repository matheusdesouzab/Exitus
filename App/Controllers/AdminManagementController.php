<?php

namespace App\Controllers;

use App\Models\SchoolTerm;
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
        $this->render('management_schoolTerm', 'AdminLayout');
    }


    public function addSchoolTerm()
    {

        $SchoolTerm = Container::getModel('SchoolTerm');

        $data = [
            'startDate' => $_POST['startDate'],
            'endDate' => $_POST['endDate'],
            'fk_id_school_term_situation' => $_POST['schoolTermSituationAdd'],
            'fk_id_school_year' => $_POST['schoolYear'],
        ];

        $SchoolTerm->setAll($data)->addSchoolTerm();
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

        echo json_encode($SchoolTerm->listSchoolTerm());
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


    // Class Room ( Sala de Aula )


    public function ClassRoom()
    {
        $this->render('management_classRoom', 'AdminLayout');
    }


    public function addClassRoom()
    {
        $ClassRoom = Container::getModel('ClassRoom');
        $ClassRoom->fk_id_classroom_number = $_POST['classroomNumber'];
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
        $ClassRoom->idClassRoom = $_POST['idClassRoom'];
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
        $data = ['course' => $_POST['course'], 'acronym' => $_POST['acronym']];
        $Course->setAll($data)->addCourse();
    }


    public function listCourse()
    {
        $Course = Container::getModel('Course');
        echo json_encode($Course->listCourse());
    }


    public function updateCourse()
    {

        $Course = Container::getModel('Course');
        $data = ['idCourse' => $_POST['idCourse'], 'course' => $_POST['course'], 'acronym' => $_POST['acronym']];
        $Course->setAll($data)->updateCourse();
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
        $this->render('management_discipline', 'AdminLayout');
    }


    public function addDiscipline()
    {
        $Discipline = Container::getModel('Discipline');
        $data = ['discipline' => $_POST['discipline'], 'acronym' => $_POST['acronym'], 'fk_id_modality' => $_POST['modality']];
        $Discipline->setAll($data)->addDiscipline();
    }


    public function listDisciplineModality()
    {
        $Discipline = Container::getModel('Discipline');
        echo json_encode($Discipline->listDisciplineModality());
    }


    public function listDiscipline()
    {
        $Discipline = Container::getModel('Discipline');
        echo json_encode($Discipline->listDiscipline());
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

        print_r($_POST);

        $Discipline->setAll($data)->updateDiscipline();
    }


    public function seekDiscipline()
    {
        $Discipline = Container::getModel('Discipline');

        $data = [
            'discipline' => $_GET['seekName'],
            'fk_id_modality' => $_GET['seekModality']
        ];

        $data = $Discipline->setAll($data)->seekDiscipline();

        echo json_encode($data);
    }


    public function disciplineData()
    {
        $Discipline = Container::getModel('Discipline');
        $Discipline->idDiscipline = $_GET['idDiscipline'];
        echo json_encode($Discipline->disciplineData());
    }


    public function deleteDiscipline()
    {
        $Discipline = Container::getModel('Discipline');
        $Discipline->idDiscipline = $_POST['idDiscipline'];
        $Discipline->deleteDiscipline();
    }















    public function managementClass()
    {
        $this->render('management_class', 'AdminLayout');
    }
}
