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

        $this->render('teacherRegistration' , 'AdminLayout');
    }


    public function teacherInsert(){

        $Address =  Container::getModel('People\\Address');
        $Telephone = Container::getModel('People\Telephone');
        $Teacher = Container::getModel('Teacher\\Teacher');
        $People = Container::getModel('People\\People');

        $Tool = new Tools();

        $Address->__set('district', $_POST['district']);
        $Address->__set('address', $_POST['address']);
        $Address->__set('uf', $_POST['uf']);
        $Address->__set('county', $_POST['county']);
        $Address->__set('zipCode', preg_replace('/[^0-9]/', '', $_POST['zipCode']));

        $Telephone->__set('telephoneNumber', preg_replace('/[^0-9]/', '', $_POST['telephoneNumber']));



    }

    public function teacherList()
    {

        $this->render('teacherList' , 'AdminLayout');
    }
}








?>