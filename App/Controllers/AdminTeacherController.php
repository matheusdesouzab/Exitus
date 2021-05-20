<?php

namespace App\Controllers;

use App\Models\Teacher\Teacher;
use App\Models\People\Address;
use App\Models\People\Telephone;
use App\Tools\Tools;
use MF\Controller\Action;
use MF\Model\Container;

class AdminTeacherController extends Action
{

    public function teacherRegistration()
    {

        $People = Container::getModel('People\\People');

        $this->view->availableSex = $People->availableSex();
        $this->view->pcd = $People->pcd();
        $this->view->bloodType = $People->bloodType();

        $this->render('teacherRegistration', 'AdminLayout');
    }


    public function teacherInsert()
    {

        $Address =  Container::getModel('People\\Address');
        $Telephone = Container::getModel('People\Telephone');
        $Teacher = Container::getModel('Teacher\\Teacher');

        $Tool = new Tools();

        $Address->__set('district', $_POST['district']);
        $Address->__set('address', $_POST['address']);
        $Address->__set('uf', $_POST['uf']);
        $Address->__set('county', $_POST['county']);
        $Address->__set('zipCode', $Tool->formatElement($_POST['zipCode']));

        $Telephone->__set('telephoneNumber', $Tool->formatElement($_POST['telephoneNumber']));

        $Teacher->__set('name', $_POST['name']);
        $Teacher->__set('birthDate', $_POST['birthDate']);
        $Teacher->__set('cpf', $Tool->formatElement($_POST['cpf']));
        $Tool->image($Teacher, '../public/assets/img/teacherProfilePhotos/');
        $Teacher->__set('naturalness', $_POST['naturalness']);
        $Teacher->__set('nationality', $_POST['nationality']);
        $Teacher->__set('fk_id_sex', $_POST['sex']);
        $Teacher->__set('fk_id_blood_type', $_POST['bloodType']);
        $Teacher->__set('fk_id_pcd', $_POST['pcd']);
        $Teacher->__set('fk_id_telephone', $Telephone->insert());
        $Teacher->__set('fk_id_address', $Address->insert());

        $Teacher->insert();

        header('Location: /admin/professor/cadastro');
    }

    public function teacherList()
    {

        $this->render('teacherList', 'AdminLayout');
    }
}
