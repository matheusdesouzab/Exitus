<?php

namespace App\Controllers;

use App\Models\Student\Student;
use App\Models\Management\Classe;
use App\Models\Student\StudentEnrollment;
use App\Models\People\Address;
use App\Models\People\Telephone;
use App\Tools\Validation;
use MF\Controller\Action;
use MF\Model\Container;

class AdminStudentController extends Action
{

    public function studentRegistration()
    {

        $this->render('student_registration', 'AdminLayout');
    }


    public function availableSex()
    {
        $Student = Container::getModel('Student\\Student');
        echo json_encode($Student->availableSex());
    }


    public function pcd()
    {
        $Student = Container::getModel('Student\\Student');
        echo json_encode($Student->pcd());
    }


    public function bloodType()
    {
        $Student = Container::getModel('Student\\Student');
        echo json_encode($Student->bloodType());
    }


    public function availableListClass()
    {
        $Classe = Container::getModel('Management\\Classe');
        $this->view->listClass = $Classe->availableListClass();
        $this->render('/listElement/listClass', 'SimpleLayout');
    }


    public function insertStudent()
    {

        $Address = Container::getModel('People\\Address');
        $Telephone = Container::getModel('People\Telephone');
        $Student = Container::getModel('Student\\Student');
        $Enrollment = Container::getModel('Student\\StudentEnrollment');
        $Validation = new Validation('/admin/aluno/cadastro');

        echo $Validation->cpfValidation($_POST['cpf']);

   

        //$Validation->imageValidation($Student, '../App/Views/admin/student/profilePhoto/' , '/admin/aluno/cadastro?erro=imagem');


        /* $addressData = [
            'zipCode' => $this->format($_POST['zipCode']),
            'district' => $_POST['district'],
            'address' => $_POST['address'],
            'uf' => $_POST['uf'],
            'county' => $_POST['county']
        ];


        $Address->setAll($addressData);


        $telephoneData = [
            'telephoneNumber' => $this->format($_POST['telephoneNumber'])
        ];


        $Telephone->setAll($telephoneData);


        $studentData = [
            'name' => $_POST['name'],
            'cpf' =>  $this->format($_POST['cpf']),
            'birthDate' => $_POST['birthDate'],
            'naturalness' => $_POST['naturalness'],
            'nationality' => $_POST['nationality'],
            'motherName' => $_POST['motherName'],
            'fatherName' => $_POST['fatherName'],
            'fk_id_sex' => $_POST['sex'],
            'fk_id_blood_type' => $_POST['bloodType'],
            'fk_id_pcd' => $_POST['pcd'],
            'fk_id_telephone' => $Telephone->insert(),
            'fk_id_address' => $Address->insert()
        ];


        print_r($Student);


        $Student->setAll($studentData);


        $enrollmentData = [
            'fk_student_situation' => 1,
            'fk_id_student' => $Student->insert(),
            'fk_id_class' => $_POST['class'],
            'fk_id_school_term' => $_POST['schoolTerm']
        ];


        $Enrollment->setAll($enrollmentData)->insert();

        $this->render('student_registration', 'AdminLayout'); */
    }
}
