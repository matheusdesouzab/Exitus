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


    public function listStudent()
    {

        $this->render('student_list', 'AdminLayout');
    }


    public function listStudents()
    {

        $Student = Container::getModel('Student\\Student');

        $this->view->listStudent = $Student->listStudent();

        $this->render('/listElement/listStudent', 'SimpleLayout');

    }


    public function availableListClass()
    {

        $Classe = Container::getModel('Management\\Classe');
        $this->view->listClass = $Classe->availableListClass();
        $this->render('/listElement/listClass', 'SimpleLayout');
    }


    public function insertStudent()
    {

        $Address =  Container::getModel('People\\Address');
        $Telephone = Container::getModel('People\Telephone');
        $Student = Container::getModel('Student\\Student');
        $Enrollment = Container::getModel('Student\\StudentEnrollment');

        $Validation = new Validation();
        
        $Validation->basic($Student, $_POST['cpf'], 11, 'cpf');
        $Validation->basic($Address, $_POST['zipCode'], 8, 'zipCode');
        $Validation->basic($Telephone, $_POST['telephoneNumber'], 11, 'telephoneNumber');    
        $Validation->image($Student, '../App/Views/admin/student/profilePhoto/', 'imagem');


        if (count($Validation->__get('error')) == 0) {


            $Address->__set('district', $_POST['district']);
            $Address->__set('address', $_POST['address']);
            $Address->__set('uf', $_POST['uf']);
            $Address->__set('county', $_POST['county']);


            $Student->__set('name', $_POST['name']);
            $Student->__set('birthDate', $_POST['birthDate']);
            $Student->__set('naturalness', $_POST['naturalness']);
            $Student->__set('nationality', $_POST['nationality']);
            $Student->__set('motherName', $_POST['motherName']);
            $Student->__set('fatherName', $_POST['fatherName']);
            $Student->__set('fk_id_sex', $_POST['sex']);
            $Student->__set('fk_id_blood_type', $_POST['bloodType']);
            $Student->__set('fk_id_pcd', $_POST['pcd']);
            $Student->__set('fk_id_telephone', $Telephone->insert());
            $Student->__set('fk_id_address', $Address->insert());


            $Enrollment->__set('fk_student_situation', 1);
            $Enrollment->__set('fk_id_student', $Student->insert());
            $Enrollment->__set('fk_id_class', $_POST['class']);
            $Enrollment->__set('fk_id_school_term', $_POST['schoolTerm']);

            $Enrollment->insert();

            header('Location: /admin/aluno/cadastro');

        } else {


            $this->view->atributes = [

                'name' => $_POST['name'],
                'cpf' => $_POST['cpf'],
                'birthDate' => $_POST['birthDate'],
                'naturalness' => $_POST['naturalness'],
                'nationality' => $_POST['nationality'],
                'motherName' => $_POST['motherName'],
                'fatherName' => $_POST['fatherName'],
                'zipCode' => $_POST['zipCode'],
                'district' => $_POST['district'],
                'address' => $_POST['address'],
                'uf' => $_POST['uf'],
                'county' => $_POST['county'],
                'telephoneNumber' => $_POST['telephoneNumber'],

            ];

            $this->view->incorrectAttributes = $Validation->__get('error');

            $this->render('student_registration', 'AdminLayout');
        }
    }
}
