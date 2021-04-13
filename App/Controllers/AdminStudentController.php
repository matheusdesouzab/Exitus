<?php

namespace App\Controllers;

use App\Models\Student;
use App\Models\Classe;
use App\Models\StudentEnrollment;
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
        $Student = Container::getModel('Student');
        echo json_encode($Student->availableSex());
    }


    public function pcd()
    {
        $Student = Container::getModel('Student');
        echo json_encode($Student->pcd());
    }


    public function bloodType()
    {
        $Student = Container::getModel('Student');
        echo json_encode($Student->bloodType());
    }


    public function availableListClass()
    {
        $Classe = Container::getModel('Classe');
        $this->view->listClass = $Classe->availableListClass();
        $this->render('/listElement/listClass', 'SimpleLayout');
    }


    public function insertStudent()
    {

        $Student = Container::getModel('Student');

        $Enrollment = Container::getModel('StudentEnrollment');

        $this->processImage($Student, '/admin/aluno/cadastro?erro=imagem');

        $cpf = $this->format($_POST['cpf']);

        $telephone = $this->format($_POST['telephoneNumber']);

        $data = [

            'name' => $_POST['name'],
            'cpf' => $cpf,
            'birthDate' => $_POST['birthDate'],
            'naturalness' => $_POST['naturalness'],
            'nationality' => $_POST['nationality'],
            'motherName' => $_POST['motherName'],
            'fatherName' => $_POST['fatherName'],

            'fk_id_sex' => $_POST['sex'],
            'fk_id_blood_type' => $_POST['bloodType'],
            'fk_id_pcd' => $_POST['pcd'],

            'telephoneNumber' => $telephone,
            'zipCode' => $_POST['zipCode'],
            'district' => $_POST['district'],
            'address' => $_POST['address'],
            'uf' => $_POST['uf'],
            'county' => $_POST['county'],

        ];

        $Student->setAll($data);


        //$this->render('student_registration', 'AdminLayout');



    }
}
