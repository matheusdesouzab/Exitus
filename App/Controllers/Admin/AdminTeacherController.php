<?php

namespace App\Controllers\Admin;

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
        $this->view->bloodType = $People->availablebloodType();

        $this->render('teacher/teacherRegistration', 'AdminLayout');
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

        $Telephone->__set('telephoneNumber', $Tool->formatElement($_POST['telephoneNumber']));
        $Address->__set('zipCode', $Tool->formatElement($_POST['zipCode']));
        $Teacher->__set('accessCode', $Tool->formatElement($_POST['accessCode']));
        $Teacher->__set('cpf', $Tool->formatElement($_POST['cpf']));
        $Tool->image($Teacher, '../public/assets/img/teacherProfilePhotos/');

        $Teacher->__set('name', $_POST['name']);
        $Teacher->__set('birthDate', $_POST['birthDate']);
        $Teacher->__set('naturalness', $_POST['naturalness']);
        $Teacher->__set('nationality', $_POST['nationality']);
        $Teacher->__set('email', $_POST['email']);
        $Teacher->__set('fk_id_sex', $_POST['sex']);
        $Teacher->__set('fk_id_blood_type', $_POST['bloodType']);
        $Teacher->__set('fk_id_pcd', $_POST['pcd']);
        $Teacher->__set('fk_id_hierarchy_function', 3);

        $Teacher->__set('fk_id_telephone', $Telephone->insert());
        $Teacher->__set('fk_id_address', $Address->insert());

        $Teacher->insert();

        header('Location: /admin/professor/cadastro');
    }


    public function listTeacherClass()
    {

        $ClassDiscipline = Container::getModel('GeneralManagement\\ClassDiscipline');
        $ClassDiscipline->__set("fk_id_class", $_GET['classId']);

        $this->view->typeTeacherList = 'class';

        $this->view->listTeacher = $ClassDiscipline->listTeachersClass();

        $this->render('teacher/components/teacherListing', 'SimpleLayout');
    }


    public function teacherList()
    {

        $Teacher = Container::getModel('Teacher\\Teacher');
        $Classe = Container::getModel('GeneralManagement\\Classe');

        $this->view->listTeacher = $Teacher->list();
        $this->view->availableSex = $Teacher->availableSex();
        $this->view->pcd = $Teacher->pcd();
        $this->view->typeTeacherList = 'normal';
        $this->view->bloodType = $Teacher->availablebloodType();
        $this->view->availableClass = $Classe->availableListClass();

        $this->render('teacher/teacherList', 'AdminLayout');
    }


    public function teacherListing()
    {

        $Teacher = Container::getModel('Teacher\\Teacher');

        $this->view->listTeacher = $Teacher->list();
        $this->view->typeTeacherList = 'normal';

        $this->render('teacher/components/teacherListing', 'SimpleLayout');
    }


    public function teacherProfile()
    {

        $Teacher = Container::getModel('Teacher\\Teacher');
        $ClassDiscipline =  Container::getModel('GeneralManagement\\ClassDiscipline');

        $Teacher->__set('teacherId', $_GET['id']);
        $ClassDiscipline->__set('fk_id_teacher', $_GET['id']);

        $this->view->teacherProfile = $Teacher->list();
        $this->view->availableSex = $Teacher->availableSex();
        $this->view->pcd = $Teacher->pcd();
        $this->view->bloodType = $Teacher->availablebloodType();
        $this->view->subjectsThatTeacherTeaches = $ClassDiscipline->subjectsThatTeacherTeaches();

        $this->render('teacher/components/modalTeacherProfile', 'SimpleLayout');
    }


    public function updateTeacherProfile()
    {

        $Address =  Container::getModel('People\\Address');
        $Telephone = Container::getModel('People\Telephone');
        $Teacher = Container::getModel('Teacher\\Teacher');
        $ClassDiscipline = Container::getModel('GeneralManagement\\ClassDiscipline');

        $ClassDiscipline->__set("fk_id_teacher", $_POST['teacherId']);

        $Address->__set('addressId', $_POST['addressId']);
        $Address->__set('district', $_POST['district']);
        $Address->__set('address', $_POST['address']);
        $Address->__set('uf', $_POST['uf']);
        $Address->__set('county', $_POST['county']);
        $Address->__set('zipCode', preg_replace('/[^0-9]/', '', $_POST['zipCode']));

        $Telephone->__set('telephoneId', $_POST['telephoneId']);
        $Telephone->__set('telephoneNumber', preg_replace('/[^0-9]/', '', $_POST['telephoneNumber']));
        $Teacher->__set('email', $_POST['email']);

        $Teacher->__set('name', $_POST['name']);
        $Teacher->__set('birthDate', $_POST['birthDate']);
        $Teacher->__set('cpf', preg_replace('/[^0-9]/', '', $_POST['cpf']));
        $Teacher->__set('naturalness', $_POST['naturalness']);
        $Teacher->__set('nationality', $_POST['nationality']);
        $Teacher->__set('fk_id_sex', $_POST['sex']);
        $Teacher->__set('fk_id_blood_type', $_POST['bloodType']);
        $Teacher->__set('fk_id_pcd', $_POST['pcd']);
        $Teacher->__set('teacherId', $_POST['teacherId']);

        $Telephone->update();
        $Address->update();
        $Teacher->update();

        $this->view->teacherProfile = $Teacher->profile();
        $this->view->typeTeacherList = 'normal';
        $this->view->availableSex = $Teacher->availableSex();
        $this->view->pcd = $Teacher->pcd();
        $this->view->bloodType = $Teacher->availablebloodType();
        $this->view->subjectsThatTeacherTeaches = $ClassDiscipline->subjectsThatTeacherTeaches();


        $this->render('teacher/components/modalTeacherProfile', 'SimpleLayout');
    }


    public function updateTeacherProfilePicture()
    {

        $Teacher = Container::getModel('Teacher\\Teacher');

        $Tool = new Tools();

        empty($_GET['oldPhoto']) ? '' : unlink('../public/assets/img/teacherProfilePhotos/' . $_POST['oldPhoto']);

        $Tool->image($Teacher, '../public/assets/img/teacherProfilePhotos/');

        $Teacher->__set('teacherId', $_POST['id']);

        $Teacher->updateProfilePicture();
    }
}
