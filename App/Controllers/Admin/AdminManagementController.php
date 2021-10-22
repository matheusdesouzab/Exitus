<?php

namespace App\Controllers\Admin;

use MF\Controller\Action;
use MF\Model\Container;

class AdminManagementController extends Action
{

    public function managementGeneral()
    {
        $this->render('management/pages/generalManagement', 'AdminLayout');
    }


    // School Term


    public function schoolTermManagement()
    {

        $SchoolTerm = Container::getModel('GeneralManagement\\SchoolTerm');

        $this->view->listSchoolTerm = $SchoolTerm->list();
        $this->view->listSchoolTermStates = $SchoolTerm->schoolTermStates();

        $this->render('management/pages/schoolTermManagement', 'AdminLayout');
    }


    public function schoolTermInsert()
    {

        $SchoolTerm = Container::getModel('GeneralManagement\\SchoolTerm');

        $SchoolTerm->__set('startDate', $_POST['startDate']);
        $SchoolTerm->__set('endDate', $_POST['endDate']);
        $SchoolTerm->__set('fk_id_school_term_situation', $_POST['schoolTermSituationAdd']);
        $SchoolTerm->__set('fk_id_school_year', $_POST['schoolYear']);

        $SchoolTerm->insert();
    }


    public function schoolTermUpdate()
    {

        $SchoolTerm = Container::getModel('GeneralManagement\\SchoolTerm');

        $SchoolTerm->__set('schoolTermId', $_POST['schoolTermId']);
        $SchoolTerm->__set('startDate', $_POST['startDate']);
        $SchoolTerm->__set('endDate', $_POST['endDate']);
        $SchoolTerm->__set('fk_id_school_term_situation', $_POST['schoolTermSituation']);

        $SchoolTerm->update();
    }


    public function schoolTermList()
    {

        $SchoolTerm = Container::getModel('GeneralManagement\\SchoolTerm');

        $this->view->listSchoolTerm = $SchoolTerm->list();
        $this->view->listSchoolTermStates = $SchoolTerm->schoolTermStates();

        $this->render('management/components/schoolTermsList', 'SimpleLayout');
    }


    public function schoolTermDelete()
    {

        $SchoolTerm = Container::getModel('GeneralManagement\\SchoolTerm');
        $SchoolTerm->__set('schoolTermId', $_POST['schoolTermId']);
        $SchoolTerm->delete();
    }


    public function schoolTermAvailable()
    {
        $SchoolTerm = Container::getModel('GeneralManagement\\SchoolTerm');
        echo json_encode($SchoolTerm->availableYears());
    }


    public function schoolTermActive()
    {
        $SchoolTerm = Container::getModel('GeneralManagement\\SchoolTerm');
        echo json_encode($SchoolTerm->active());
    }


    // Class Room ( Sala de Aula )


    public function ClassRoomManagement()
    {
        $ClassRoom = Container::getModel('GeneralManagement\\ClassRoom');
        $this->view->listClassRoom = $ClassRoom->list();
        $this->render('management/pages/classroomManagement', 'AdminLayout');
    }


    public function classRoomInsert()
    {

        $ClassRoom = Container::getModel('GeneralManagement\\ClassRoom');

        $ClassRoom->__set('studentCapacity', $_POST['studentCapacity']);
        $ClassRoom->__set('fk_id_classroom_number', $_POST['classroomNumber']);

        $ClassRoom->insert();
    }


    public function classRoomUpdate()
    {

        $ClassRoom = Container::getModel('GeneralManagement\\ClassRoom');

        $ClassRoom->__set('classroomId', $_POST['classroomId']);
        $ClassRoom->__set('studentCapacity', $_POST['studentCapacity']);

        $ClassRoom->update();
    }


    public function availableRoomNumbers()
    {
        $ClassRoom = Container::getModel('GeneralManagement\\ClassRoom');
        echo json_encode($ClassRoom->availableNumbers());
    }


    public function classRoomList()
    {
        $ClassRoom = Container::getModel('GeneralManagement\\ClassRoom');
        $this->view->listClassRoom = $ClassRoom->list();
        $this->render('management/components/classroomsList', 'SimpleLayout');
    }


    public function classRoomDelete()
    {
        $ClassRoom = Container::getModel('GeneralManagement\\ClassRoom');
        $ClassRoom->__set('classroomId', $_POST['classroomId']);
        $ClassRoom->delete();
    }


    public function classRoomActive()
    {
        $ClassRoom = Container::getModel('GeneralManagement\\ClassRoom');
        echo json_encode($ClassRoom->listForSelect());
    }


    // Course


    public function courseManagement()
    {
        $Course = Container::getModel('GeneralManagement\\Course');
        $this->view->listCourse = $Course->list();
        $this->view->courseMode = $Course->courseMode();
        $this->render('management/pages/courseManagement', 'AdminLayout');
    }


    public function courseInsert()
    {

        $Course = Container::getModel('GeneralManagement\\Course');

        $Course->__set('courseName', $_POST['courseName']);
        $Course->__set('acronym', $_POST['acronym']);
        $Course->__set('courseMode', $_POST['courseMode']);

        $Course->insert();
    }


    public function courseList()
    {
        $Course = Container::getModel('GeneralManagement\\Course');
        $this->view->listCourse = $Course->list();
        $this->view->courseMode = $Course->courseMode();
        $this->render('management/components/coursesList', 'SimpleLayout');
    }


    public function courseUpdate()
    {

        $Course = Container::getModel('GeneralManagement\\Course');

        $Course->__set('courseId', $_POST['courseId']);
        $Course->__set('courseName', $_POST['courseName']);
        $Course->__set('acronym', $_POST['acronym']);
        $Course->__set('courseMode', $_POST['courseMode']);

        $Course->update();
    }


    public function courseAvailable()
    {
        $Course = Container::getModel('GeneralManagement\\Course');
        echo json_encode($Course->listForSelect());
    }


    public function courseDelete()
    {
        $Course = Container::getModel('GeneralManagement\\Course');
        $Course->__set('courseId', $_POST['courseId']);
        $Course->delete();
    }


    public function totalStudentsCourse()
    {
        $Course = Container::getModel('GeneralManagement\\Course');
        echo json_encode($Course->totalStudentsCourse());
    }


    // Discipline


    public function disciplineManagement()
    {

        $Discipline = Container::getModel('GeneralManagement\\Discipline');

        $this->view->listDiscipline = $Discipline->list();
        $this->view->listModality = $Discipline->disciplineModality();

        $this->render('management/pages/disciplineManagement', 'AdminLayout');
    }


    public function disciplineInsert()
    {

        $Discipline = Container::getModel('GeneralManagement\\Discipline');

        $Discipline->__set('disciplineName', $_POST['disciplineName']);
        $Discipline->__set('acronym', $_POST['acronym']);
        $Discipline->__set('fk_id_modality', $_POST['modalityAdd']);

        $Discipline->insert();
    }


    public function disciplineList()
    {
        $Discipline = Container::getModel('GeneralManagement\\Discipline');
        $this->view->listDiscipline = $Discipline->list();
        $this->render('management/components/disciplinesList', 'SimpleLayout');
    }


    public function disciplineUpdate()
    {

        $Discipline = Container::getModel('GeneralManagement\\Discipline');

        $Discipline->__set('disciplineId', $_POST['disciplineId']);
        $Discipline->__set('disciplineName', $_POST['disciplineName']);
        $Discipline->__set('acronym', $_POST['acronym']);
        $Discipline->__set('fk_id_modality', $_POST['modality']);

        $Discipline->update();
    }


    public function disciplineSeek()
    {

        $Discipline = Container::getModel('GeneralManagement\\Discipline');

        $Discipline->__set('disciplineName', $_GET['seekName']);
        $Discipline->__set('fk_id_modality', $_GET['seekModality']);

        $this->view->listDiscipline = $Discipline->seek();

        $this->render('management/components/disciplinesList', 'SimpleLayout');
    }


    public function disciplineData()
    {

        $Discipline = Container::getModel('GeneralManagement\\Discipline');

        $Discipline->__set('disciplineId', $_GET['id']);

        $this->view->discipline = $Discipline->list();
        $this->view->listDisciplineModality = $Discipline->disciplineModality();

        $this->render('management/components/disciplineModal', 'SimpleLayout');
    }


    public function disciplineDelete()
    {
        $Discipline = Container::getModel('GeneralManagement\\Discipline');
        $Discipline->__set('disciplineId', $_POST['disciplineId']);
        $Discipline->delete();
    }


    // Class


    public function classManagement()
    {

        $Classe = Container::getModel('GeneralManagement\\Classe');
        $Course = Container::getModel('GeneralManagement\\Course');
        $ClassRoom = Container::getModel('GeneralManagement\\ClassRoom');
        $SchoolTerm = Container::getModel('GeneralManagement\\SchoolTerm');
        $Shift = Container::getModel('GeneralManagement\\Shift');
        $Series = Container::getModel('GeneralManagement\\Series');
        $Ballot = Container::getModel('GeneralManagement\\Ballot');

        $this->view->availableShift = $Shift->listForSelect();
        $this->view->availableBallot = $Ballot->listForSelect();
        $this->view->availableSeries = $Series->listForSelect();
        $this->view->availableCourse = $Course->listForSelect();
        $this->view->availableClassRoom = $ClassRoom->listForSelect();
        $this->view->listClass = $Classe->list();
        $this->view->activeSchoolTerm = $SchoolTerm->activeScheduledSchoolTerm();

        $this->render('management/pages/classeManagement', 'AdminLayout');
    }


    public function classInsert()
    {

        $Class = Container::getModel('GeneralManagement\\Classe');

        $Class->__set('fk_id_ballot', $_POST['ballot']);
        $Class->__set('fk_id_classroom', $_POST['classRoom']);
        $Class->__set('fk_id_school_term', $_POST['schoolTerm']);
        $Class->__set('fk_id_course', $_POST['course']);
        $Class->__set('fk_id_shift', $_POST['shift']);
        $Class->__set('fk_id_series', $_POST['series']);

        $Class->insert();
    }


    public function classCheck()
    {

        $Classe = Container::getModel('GeneralManagement\\Classe');

        $Classe->__set('fk_id_ballot', $_GET['ballot']);
        $Classe->__set('fk_id_classroom', $_GET['classRoom']);
        $Classe->__set('fk_id_school_term', $_GET['schoolTerm']);
        $Classe->__set('fk_id_course', $_GET['course']);
        $Classe->__set('fk_id_shift', $_GET['shift']);
        $Classe->__set('fk_id_series', $_GET['series']); 

        echo json_encode(['class_id_ballot_course' => $Classe->checkCourseBallot(), 'class_id_shift_classroom' => $Classe->checkShiftClassroom()]);
    }


    public function classUpdate()
    {

        $Classe = Container::getModel('GeneralManagement\\Classe');

        $Classe->__set('fk_id_ballot', $_POST['ballot']);
        $Classe->__set('fk_id_classroom', $_POST['classRoom']);
        $Classe->__set('fk_id_shift', $_POST['shift']);
        $Classe->__set('classId', $_POST['classId']);

        $Classe->update();

    }


    public function classList()
    {
        $Classe = Container::getModel('GeneralManagement\\Classe');
        $this->view->listClass = $Classe->list();
        $this->render('management/components/classList', 'SimpleLayout');
    }


    public function classSeek()
    {

        $Classe = Container::getModel('GeneralManagement\\Classe');

        $Classe->__set('fk_id_course', $_GET['course']);
        $Classe->__set('fk_id_shift', $_GET['shift']);
        $Classe->__set('fk_id_series', $_GET['series']);
        $Classe->__set('fk_id_school_term', $_GET['schoolTerm']);

        $this->view->listClass = $Classe->seek();

        $this->render('management/components/classList', 'SimpleLayout');
    }


    public function classProfile()
    {

        $Student = Container::getModel('Student\\Student');
        $Classe = Container::getModel('GeneralManagement\\Classe');
        $ClassDiscipline = Container::getModel('GeneralManagement\\ClassDiscipline');
        $Teacher = Container::getModel('Teacher\\Teacher');
        $Unity = Container::getModel('GeneralManagement\\Unity');
        $Course = Container::getModel('GeneralManagement\\Course');
        $ClassRoom = Container::getModel('GeneralManagement\\ClassRoom');
        $SchoolTerm = Container::getModel('GeneralManagement\\SchoolTerm');
        $Shift = Container::getModel('GeneralManagement\\Shift');
        $Series = Container::getModel('GeneralManagement\\Series');
        $Ballot = Container::getModel('GeneralManagement\\Ballot');
        
        if (!isset($_SESSION)) session_start();

        $ClassDiscipline->__set("fk_id_class", !isset($_GET['id']) ? $_GET['classId'] : $_GET['id']);
        $ClassDiscipline->__Set("fk_id_teacher", isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);
        $Classe->__set('classId', !isset($_GET['id']) ? $_GET['classId'] : $_GET['id']);
        $Student->__set("fk_id_class", !isset($_GET['id']) ? $_GET['classId'] : $_GET['id']);     

        $this->view->listStudent = $Student->list('<> 0');
        $this->view->typeStudentList = "class";
        $this->view->classId = $Classe->__get('classId');
        $this->view->typeTeacherList = 'class';
        $this->view->unity = $Unity->unitys();
        $this->view->classData = $Classe->list('<> 0');
        $this->view->listTeacher = $ClassDiscipline->listTeachersClass();
        $this->view->teacherAvailable = $Teacher->teacherAvailable();
        $this->view->disciplinesClassAlreadyAdded = $ClassDiscipline->disciplinesClassAlreadyAdded();
        $this->view->availableShift = $Shift->listForSelect();
        $this->view->availableBallot = $Ballot->listForSelect();
        $this->view->availableSeries = $Series->listForSelect();
        $this->view->availableCourse = $Course->listForSelect();
        $this->view->availableClassRoom = $ClassRoom->listForSelect();
        $this->view->activeSchoolTerm = $SchoolTerm->activeScheduledSchoolTerm();       

        $this->render('management/components/modalClassProfile', 'SimpleLayout');
    }


    public function studentsAverage(){

        $Note = Container::getModel('TeacherStudent\\Note');
        $ClassDiscipline = Container::getModel('GeneralManagement\\ClassDiscipline');
        $Student = Container::getModel('Student\\Student');
        $Unity = Container::getModel('GeneralManagement\\Unity');
        $Exam = Container::getModel('TeacherStudent\\Exam');

        if (!isset($_SESSION)) session_start();

        $Note->__set('fk_id_class', $_GET['classId']);
        $Note->__set('fk_id_teacher', isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);
        $ClassDiscipline->__set("fk_id_class", $_GET['classId']);
        $ClassDiscipline->__Set("fk_id_teacher", isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);
        $Student->__set("fk_id_class", $_GET['classId']);

        $Exam->__set('fk_id_class', $_GET['classId']);
        $Exam->__set('examDescription', '');

        $this->view->listNote = $Note->list();
        $this->view->disciplinesClassAlreadyAdded = $ClassDiscipline->disciplinesClassAlreadyAdded();
        $this->view->listStudent = $Student->list('<> 0');
        $this->view->unity = $Unity->unitys();
        $this->view->orderBy = 'alphabetical';
        $this->view->listExam = $Exam->seek();
        $this->view->noteStatus = 0;
        $this->view->averageType = 'averageUnity';

        $this->render('student/components/studentsAverage', 'SimpleLayout');
    }


    public function studentsAverageSeek()
    {

        $Note = Container::getModel('TeacherStudent\\Note');
        $ClassDiscipline = Container::getModel('GeneralManagement\\ClassDiscipline');
        $Student = Container::getModel('Student\\Student');
        $Unity = Container::getModel('GeneralManagement\\Unity');
        $Classe = Container::getModel('GeneralManagement\\Classe');
        $Exam = Container::getModel('TeacherStudent\\Exam');

        $Student->__set('name', $_GET['name']);
        $Classe->__set('fk_id_course', 0);
        $Classe->__set('fk_id_series', 0);
        $Classe->__set('fk_id_shift', 0);
        $Student->__set("fk_id_class", $_GET['classId']);
        $Student->__set('fk_id_sex', 0);

        $Exam->__set('fk_id_discipline_class', $_GET['disciplineClass']);
        $Exam->__set('fk_id_exam_unity', $_GET['unity']);
        $Exam->__set('fk_id_class', $_GET['classId']);
        $Exam->__set('examDescription', '');

        if (!isset($_SESSION)) session_start();

        $Note->__set('fk_id_class', $_GET['classId']);
        $Note->__set("fk_id_exam_unity", $_GET['unity']);
        $Note->__set("fk_id_discipline_class", $_GET['disciplineClass']);
        $Note->__set("examDescription", $_GET['examDescription']);

        $ClassDiscipline->__set("fk_id_class", $_GET['classId']);
        $ClassDiscipline->__set("classDisciplineId", $_GET['disciplineClass']);
        $ClassDiscipline->__set("fk_id_teacher", isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);

        $Unity->__set("unityId", $_GET['unity']);

        $this->view->listNote = $Note->seek();
        $this->view->disciplinesClassAlreadyAdded = $ClassDiscipline->disciplinesClassAlreadyAdded();
        $this->view->listStudent = $Student->seek($Classe);
        $this->view->unity = $Unity->specificUnity();
        $this->view->orderBy = $_GET['orderBy'];
        $this->view->listExam = $Exam->seek();
        $this->view->noteStatus = $_GET['noteStatus'];
        $this->view->averageType = $_GET['averageType'];

        $this->render('student/components/studentsAverage', 'SimpleLayout');

    }

    public function listRematrugRequests()
    {

        $Classe = Container::getModel('GeneralManagement\\Classe');

        $Classe->__set('classId', $_GET['classId']);

        $Classe->__set('fk_id_course', $_GET['course']);
        $Classe->__set('fk_id_series', $_GET['series']);

        $this->view->nextClass = $Classe->nextClass();
        $this->view->listRematrugRequests = $Classe->listRematrugRequests();

        $this->render('management/components/listRequestRematrung', 'SimpleLayout');
    }


    public function studentsAlreadyRegisteredNextYear()
    {

        $Classe = Container::getModel('GeneralManagement\\Classe');
        $Student = Container::getModel('Student\\Student');

        $Classe->__set('fk_id_course', $_GET['course']);
        $Classe->__set('fk_id_series', $_GET['series'] + 1);
        $Student->__set('fk_id_class', $_GET['classId']);

        $this->view->studentsAlreadyRegisteredNextYear = $Classe->studentsAlreadyRegisteredNextYear();
        $this->view->listStudent = $Student->list();

        $this->render('management/components/listStudentsAlreadyEnrolled', 'SimpleLayout');
    }


    public function classDisciplineInsert()
    {

        $ClassDiscipline = Container::getModel('GeneralManagement\\ClassDiscipline');

        $ClassDiscipline->__set("fk_id_teacher", $_POST['teacher']);
        $ClassDiscipline->__set("fk_id_class", $_POST['classId']);
        $ClassDiscipline->__set("fk_id_discipline", $_POST['disciplineClass']);

        $ClassDiscipline->insert();
    }


    public function listTeachersDisciplineClass()
    {

        $ClassDiscipline = Container::getModel('GeneralManagement\\ClassDiscipline');
        $Discipline = Container::getModel('GeneralManagement\\Discipline');
        $Teacher = Container::getModel('Teacher\\Teacher');

        $ClassDiscipline->__set("fk_id_class", $_GET['classId']);

        $this->view->listTeacher = $ClassDiscipline->listTeachersClass();
        $this->view->teacherAvailable = $Teacher->teacherAvailable();

        $this->render('management/components/disciplineClass', 'SimpleLayout');
    }


    public function disciplineAvailable()
    {
        $ClassDiscipline = Container::getModel('GeneralManagement\\ClassDiscipline');
        $ClassDiscipline->__set('fk_id_class', $_POST['classId']);
        echo json_encode($ClassDiscipline->disciplinesNotYetAdded());
    }


    public function subjectAvailableClass()
    {
        $ClassDiscipline = Container::getModel('GeneralManagement\\ClassDiscipline');
        $ClassDiscipline->__set("fk_id_class", $_GET['classId']);
        echo json_encode($ClassDiscipline->subjectAvailableClass());
    }


    public function updateClassDiscipline()
    {

        $ClassDiscipline = Container::getModel('GeneralManagement\\ClassDiscipline');

        $ClassDiscipline->__set("classDisciplineId", $_POST['disciplineClass']);
        $ClassDiscipline->__set("fk_id_teacher", $_POST['teacher']);
        $ClassDiscipline->__set("fk_id_discipline", $_POST['discipline']);
        $ClassDiscipline->__set("fk_id_class", $_POST['classId']);

        $ClassDiscipline->update();

        $this->view->listTeacher = $ClassDiscipline->listTeachersClass();
    }


    public function disciplineClassDelete()
    {
        $ClassDiscipline = Container::getModel('GeneralManagement\\ClassDiscipline');
        $ClassDiscipline->__set("classDisciplineId", $_POST['disciplineClass']);
        $ClassDiscipline->delete();
    }


    public function disciplinesClassAlreadyAdded()
    {

        $ClassDiscipline = Container::getModel('GeneralManagement\\ClassDiscipline');

        if (!isset($_SESSION)) session_start();

        $ClassDiscipline->__set("fk_id_class", $_GET['classId']);
        $ClassDiscipline->__Set("fk_id_teacher", isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);

        echo json_encode($ClassDiscipline->disciplinesClassAlreadyAdded());
    }
}
