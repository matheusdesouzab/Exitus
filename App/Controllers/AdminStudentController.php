<?php

namespace App\Controllers;

use App\Models\Student;
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


    public function insertStudent()
    {
        $Student = Container::getModel('Student');

        $dir = '../App/Views/admin/student/profilePhoto/';

        if (isset($_FILES['profilePhoto'])) {

            date_default_timezone_set("Brazil/East");

            $ext = strtolower(substr($_FILES['profilePhoto']['name'], -4));
            $new_name = date("Y.m.d-H.i.s") . $ext;

            move_uploaded_file($_FILES['profilePhoto']['tmp_name'], $dir . $new_name);

            $Student->profilePhoto = $new_name;
        }

        $data = [

            'name' => $_POST['name'],
            'cpf' => $_POST['cpf'],
            'birthDate' => $_POST['birthDate'],
            'naturalness' => $_POST['naturalness'],
            'nationality' => $_POST['nationality'],
            'motherName' => $_POST['motherName'],
            'fatherName' => $_POST['fatherName'],

            'fk_id_sex' => $_POST['sex'],
            'fk_id_blood_type' => $_POST['boodType'],
            'fk_id_pcd' => $_POST['pcd'],

            'telephoneNumber' => $_POST['telephoneNumber'],
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
