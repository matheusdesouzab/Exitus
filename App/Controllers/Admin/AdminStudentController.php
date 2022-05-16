<?php

namespace App\Controllers\Admin;

use App\Tools\Tools;
use MF\Controller\Action;
use MF\Model\Container;


class AdminStudentController extends Action
{

    public function studentRegistration()
    {

        $Student = Container::getModel('Student\\Student');
        $Classe = Container::getModel('GeneralManagement\\Classe');

        $this->view->availableSex = $Student->availableSex();
        $this->view->pcd = $Student->pcd();
        $this->view->bloodType = $Student->availablebloodType();
        $this->view->availableClass = $Classe->firstGradeClasses();

        $this->render('student/studentRegistration', 'AdminLayout');
    }


    public function studentList()
    {

        $Student = Container::getModel('Student\\Student');
        $Course = Container::getModel('GeneralManagement\\Course');
        $Classe = Container::getModel('GeneralManagement\\Classe');
        $Student = Container::getModel('Student\\Student');
        $Shift = Container::getModel('GeneralManagement\\Shift');
        $Series = Container::getModel('GeneralManagement\\Series');
        $SchoolTerm = Container::getModel('GeneralManagement\\SchoolTerm');

        $this->view->listStudent = $Student->readAll();
        $this->view->availableCourse = $Course->listForSelect();
        $this->view->availableClass = $Classe->firstGradeClasses();
        $this->view->availableSex = $Student->availableSex();
        $this->view->availableShift = $Shift->listForSelect();
        $this->view->availableSeries = $Series->listForSelect();
        $this->view->typeStudentList = 'normal';
        $this->view->allSchoolTerm = $SchoolTerm->allSchoolTerm();

        $this->render('student/studentList', 'AdminLayout');
    }


    public function studentListing()
    {

        $Student = Container::getModel('Student\\Student');

        $this->view->listStudent = $Student->readAll();
        $this->view->typeStudentList = 'normal';

        $this->render('student/components/studentListing', 'SimpleLayout');
    }


    public function availableListClass()
    {

        $Classe = Container::getModel('GeneralManagement\\Classe');
        $this->view->listClass = $Classe->firstGradeClasses();
        $this->render('student/components/classesList', 'SimpleLayout');
    }


    public function studentSeek()
    {

        $Student = Container::getModel('Student\\Student');
        $Classe = Container::getModel('GeneralManagement\\Classe');

        $Student->__set('name', $_GET['name']);
        $Student->__set('fk_id_sex', $_GET['sex']);
        $Classe->__set('fk_id_course', $_GET['course']);
        $Classe->__set('fk_id_series', $_GET['series']);
        $Classe->__set('fk_id_shift', $_GET['shift']);
        $Classe->__set('fk_id_school_term', $_GET['schoolTerm']);

        $this->view->listStudent = $Student->seek($Classe);
        $this->view->typeStudentList = 'normal';

        $this->render('student/components/studentListing', 'SimpleLayout');
    }


    public function studentProfile()
    {

        $Student = Container::getModel('Student\\Student');
        $ClassDiscipline = Container::getModel('GeneralManagement\\ClassDiscipline');
        $Classe = Container::getModel('GeneralManagement\\Classe');
        $SchoolTerm = Container::getModel('GeneralManagement\\SchoolTerm');
        $StudentEnrollment = Container::getModel('Student\\StudentEnrollment');
        $DisciplineAverage = Container::getModel('TeacherStudent\\DisciplineAverage');
        $Unity = Container::getModel('GeneralManagement\\Unity');

        $StudentEnrollment->__set('studentEnrollmentId', empty($_GET['enrollmentId']) ? $_GET['id'] : $_GET['enrollmentId']);

        $this->view->studentDataEnrollment = $StudentEnrollment->dataGeneral();

        $Student->__set('studentId', $this->view->studentDataEnrollment[0]->id);

        $this->view->studentDataGeneral = $Student->dataGeneral($StudentEnrollment);
        $this->view->availableSex = $Student->availableSex();
        $this->view->pcd = $Student->pcd();
        $this->view->unity = $Unity->readOpenUnits();
        $this->view->bloodType = $Student->availablebloodType();

        if (!isset($_SESSION)) session_start();
        if (isset($_SESSION['Teacher']['id'])) $ClassDiscipline->__set("fk_id_teacher", $_SESSION['Teacher']['id']);

        $ClassDiscipline->__set("fk_id_class", $this->view->studentDataEnrollment[0]->class_id);

        $Classe->__set('fk_id_series', $this->view->studentDataEnrollment[0]->series_id);
        $Classe->__set('fk_id_course', $this->view->studentDataEnrollment[0]->course_id);

        $this->view->linkedDisciplines = isset($_SESSION['Teacher']['id']) ?  $ClassDiscipline->teacherLinkedDisciplines() :  $ClassDiscipline->classLinkedSubjects();
        $this->view->listSubtitles = $DisciplineAverage->availableSubtitles();
        $this->view->studentSituation = $StudentEnrollment->studentSituation();
        $this->view->schoolTermActive = $SchoolTerm->active();
        $this->view->generalSituationStudent = $Student->generalSituationStudent();
        $this->view->classesWhereStudentEnrolledSameYear = $Classe->classesWhereStudentEnrolledSameYear();

        $this->render('student/components/modalStudentProfile', 'SimpleLayout');
    }


    public function updateStudentProfile()
    {

        if (!isset($_SESSION)) session_start();

        if ($_SESSION['Admin']['hierarchyFunction'] <= 2) {

            $Address =  Container::getModel('People\\Address');
            $Telephone = Container::getModel('People\Telephone');
            $Student = Container::getModel('Student\\Student');
            $StudentEnrollment = Container::getModel('Student\\StudentEnrollment');

            $Tool = new Tools();

            $Address->__set('addressId', $_POST['addressId']);
            $Address->__set('district', $_POST['district']);
            $Address->__set('address', $_POST['address']);
            $Address->__set('uf', $_POST['uf']);
            $Address->__set('county', $_POST['county']);
            $Address->__set('zipCode', $Tool->formatElement($_POST['zipCode']));

            $Telephone->__set('telephoneId', $_POST['telephoneId']);
            $Telephone->__set('telephoneNumber', $Tool->formatElement($_POST['telephoneNumber']));

            $Student->__set('accessCode', $_POST['accessCode']);
            $Student->__set('email', $_POST['email']);
            $Student->__set('fk_id_blood_type', $_POST['bloodType']);
            $Student->__set('studentId', $_POST['studentId']);

            $Student->__set('name', $_POST['name']);
            $Student->__set('birthDate', $_POST['birthDate']);
            $Student->__set('cpf', $Tool->formatElement($_POST['cpf']));
            $Student->__set('naturalness', $_POST['naturalness']);
            $Student->__set('nationality', $_POST['nationality']);
            $Student->__set('motherName', $_POST['motherName']);
            $Student->__set('fatherName', $_POST['fatherName']);
            $Student->__set('fk_id_sex', $_POST['sex']);
            $Student->__set('fk_id_pcd', $_POST['pcd']);
            $Student->__set('fk_id_general_situation', $_POST['situationStudentGeneral']);
            $StudentEnrollment->__set('studentEnrollmentId', $_POST['enrollmentId']);
            $StudentEnrollment->__set('fk_id_student_situation', $_POST['situationStudent']);


            $Telephone->update();
            $Address->update();
            $Student->update();
        } else {
            header('Location: portal-aluno/home');
        }
    }


    public function enrollStudent($classId, $studentId, $schoolTermId, $studentSituation = 1)
    {

        $Enrollment = Container::getModel('Student\\StudentEnrollment');

        $Enrollment->__set('fk_id_student_situation', $studentSituation);
        $Enrollment->__set('fk_id_student', $studentId);
        $Enrollment->__set('fk_id_class', $classId);
        $Enrollment->__set('fk_id_school_term', $schoolTermId);

        $Enrollment->insert();
    }


    public function studentInsert()
    {

        $SchoolTerm = Container::getModel('GeneralManagement\\SchoolTerm');
        $activeSchoolTerm = $SchoolTerm->active();

        $Tool = new Tools();

        $Address =  Container::getModel('People\\Address');
        $Telephone = Container::getModel('People\Telephone');
        $Student = Container::getModel('Student\\Student');
        $Enrollment = Container::getModel('Student\\StudentEnrollment');

        $Address->__set('district', $_POST['district']);
        $Address->__set('address', $_POST['address']);
        $Address->__set('uf', $_POST['uf']);
        $Address->__set('county', $_POST['county']);
        $Address->__set('zipCode', $Tool->formatElement($_POST['zipCode']));

        $Telephone->__set('telephoneNumber', $Tool->formatElement($_POST['telephoneNumber']));
        $Student->__set('accessCode', $Tool->formatElement($_POST['accessCode']));

        $Student->__set('name', $_POST['name']);
        $Student->__set('birthDate', $_POST['birthDate']);
        $Student->__set('cpf', $Tool->formatElement($_POST['cpf']));
        $Tool->image($Student, '../public/assets/img/studentProfilePhotos/');
        $Student->__set('naturalness', $_POST['naturalness']);
        $Student->__set('nationality', $_POST['nationality']);
        $Student->__set('motherName', $_POST['motherName']);
        $Student->__set('fatherName', $_POST['fatherName']);
        $Student->__set('email', $_POST['email']);
        $Student->__set('fk_id_hierarchy_function', 4);
        $Student->__set('fk_id_sex', $_POST['sex']);
        $Student->__set('fk_id_blood_type', $_POST['bloodType']);
        $Student->__set('fk_id_pcd', $_POST['pcd']);
        $Student->__set('fk_id_telephone', $Telephone->insert());
        $Student->__set('fk_id_address', $Address->insert());

        $Enrollment->__set('fk_id_student_situation', 1);
        $Enrollment->__set('fk_id_student', $Student->insert());
        $Enrollment->__set('fk_id_class', $_POST['class']);
        $Enrollment->__set('fk_id_school_term', $activeSchoolTerm[0]->option_value);

        $Enrollment->insert();

        header('Location: /admin/aluno/cadastro');
    }


    public function updateStudentProfilePicture()
    {

        $Student = Container::getModel('Student\\Student');
        $Tool = new Tools();

        empty($_GET['oldPhoto']) ? '' : unlink('../public/assets/img/studentProfilePhotos/' . $_POST['oldPhoto']);

        $Tool->image($Student, '../public/assets/img/studentProfilePhotos/');

        $Student->__set('studentId', $_POST['id']);

        $Student->updateProfilePicture();
    }


    public function rematrug()
    {

        $StudentEnrollment = Container::getModel('Student\\StudentEnrollment');

        $StudentEnrollment->__set('fk_id_student_situation', 1);
        $StudentEnrollment->__set('fk_id_student', $_POST['studentId']);
        $StudentEnrollment->__set('fk_id_class', $_POST['newClass']);
        $StudentEnrollment->__set('fk_id_school_term', $_POST['schoolTermId']);

        $StudentEnrollment->insert();
    }


    public function studentSituationSchoolYear()
    {

        $StudentEnrollment = Container::getModel('Student\\StudentEnrollment');
        echo json_encode($StudentEnrollment->studentSituationSchoolYear());
    }


    public function totalRematriumMarkedWithYesAndNo()
    {

        $StudentRematrug = Container::getModel('Student\\StudentRematrug');
        echo json_encode($StudentRematrug->totalRematriumMarkedWithYesAndNo());
    }


    public function divisionStudentsBySex()
    {

        $Student = Container::getModel('Student\\Student');
        echo json_encode($Student->divisionStudentsBySex());
    }


    public function switchClasses()
    {

        $this->enrollStudent($_POST['classId'], $_POST['studentId'], $_POST['schoolTermId'], 1);

        $StudentEnrollment = Container::getModel('Student\\StudentEnrollment');

        $StudentEnrollment->__set('fk_id_student_situation', 4);
        $StudentEnrollment->__set('studentEnrollmentId', $_POST['enrollmentId']);

        $StudentEnrollment->changeStudentFromClass();
    }
}
