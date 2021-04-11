<?php

namespace App\Controllers;

use App\Models\Student;
use App\Models\Classe;
use MF\Controller\Action;
use MF\Model\Container;

class AdminStudentController extends Action
{

    public function studentRegistration()
    {

        $this->render('student_registration', 'AdminLayout');
    }


    function format($value)
    {
        $value = preg_replace('/[^0-9]/', '', $value);
        return $value;
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

        $dir = '../App/Views/admin/student/profilePhoto/';

        if (isset($_FILES['profilePhoto'])) {

            date_default_timezone_set("Brazil/East");

            $ext = pathinfo($_FILES['profilePhoto']['name'], PATHINFO_EXTENSION);
            $new_name = date("Y.m.d-H.i.s") .'.'. $ext;

            move_uploaded_file($_FILES['profilePhoto']['tmp_name'], $dir . $new_name);

            $Student->profilePhoto = $new_name;

        }

        $cpf = $this->format($_POST['cpf']);
        $telefone = $this->format($_POST['telephoneNumber']);

        

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

            'telephoneNumber' => $telefone,
            'zipCode' => $_POST['zipCode'],
            'district' => $_POST['district'],
            'address' => $_POST['address'],
            'uf' => $_POST['uf'],
            'county' => $_POST['county'],
            'fk_id_class' => $_POST['class'],

        ];

        $Student->setAll($data);

        echo '<pre>';

        print_r($Student);

        echo '</pre>';
    }
}
