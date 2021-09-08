<?php

namespace App\Controllers\Admin;

use MF\Controller\Action;
use MF\Model\Container;
use App\Tools\Tools;

class AdminController extends Action
{

    public function index()
    {

        $this->render('index', 'SimpleLayout');
    }

    public function auth()
    {

        $Admin = Container::getModel('Admin\\Admin');
        $Tool = new Tools();

        $Admin->__set('accessCode', $Tool->formatElement($_POST['accessCode']));
        $Admin->__set('name', $_POST['name']);

        $auth = $Admin->login();

        if (count($auth) != 1) {

            header('Location: /admin?error=true');
        } else {

            if (!isset($_SESSION)) session_start();

            $_SESSION['Admin'] = [

                'id' => $auth[0]->admin_id,
                'name' => $auth[0]->admin_name,
                'profilePhoto' => $auth[0]->admin_photo,
                'hierarchyFunction' => $auth[0]->hierarchy_function

            ];

            session_cache_expire(200);

            header('Location: /admin/gestao/turma');
        }
    }


    public function settings()
    {

        $Settings = Container::getModel('Admin\\Settings');
        $Admin = Container::getModel('Admin\\Admin');

        if (!isset($_SESSION)) session_start();

        $Admin->__set('id', $_SESSION['Admin']['id']);

        $this->view->unitControlList = $Settings->unitControlList();
        $this->view->unitControlCurrent = $Settings->unitControlCurrent();
        $this->view->currentStatusRematrium = $Settings->currentStatusRematrium();
        $this->view->registrationControlOptions = $Settings->registrationControlOptions();
        $this->view->Data = $Admin->list();
        $this->view->availableSex = $Admin->availableSex();
        $this->view->pcd = $Admin->pcd();
        $this->view->bloodType = $Admin->bloodType();
        $this->listHierarchyFunction = $Admin->listHierarchyFunction();

        $this->render('settings', 'SimpleLayout');
    }


    public function adminUpdate()
    {

        $Admin = Container::getModel('Admin\\Admin');
        $Address =  Container::getModel('People\\Address');
        $Telephone = Container::getModel('People\Telephone');

        $Tool = new Tools();

        if (!isset($_SESSION)) session_start();

        $Address->__set('addressId', $_POST['addressId']);
        $Address->__set('district', $_POST['district']);
        $Address->__set('address', $_POST['address']);
        $Address->__set('uf', $_POST['uf']);
        $Address->__set('county', $_POST['county']);
        $Address->__set('zipCode', $Tool->formatElement($_POST['zipCode']));

        $Telephone->__set('telephoneId', $_POST['telephoneId']);
        $Telephone->__set('telephoneNumber', $Tool->formatElement($_POST['telephoneNumber']));

        $Admin->__set('name', $_POST['name']);
        $Admin->__set('birthDate', $_POST['birthDate']);
        $Admin->__set('cpf', $Tool->formatElement($_POST['cpf']));
        $Admin->__set('naturalness', $_POST['naturalness']);
        $Admin->__set('nationality', $_POST['nationality']);
        $Admin->__set('email', $_POST['email']);
        $Admin->__set('fk_id_sex', $_POST['sex']);
        $Admin->__set('fk_id_blood_type', $_POST['bloodType']);
        $Admin->__set('fk_id_pcd', $_POST['pcd']);
        $Admin->__set('fk_id_hierarchy_function', $_POST['hierarchyFunction']);
        $Admin->__set('id', $_SESSION['Admin']['id']);

        $Telephone->update();
        $Address->update();
        $Admin->update();
    }


    public function settingsUpdate()
    {

        $Settings = Container::getModel('Admin\\Settings');

        $Settings->__set('fk_id_control_unity', $_POST['controlUnity']);
        $Settings->__set('fk_id_control_rematrug', $_POST['controlRematrug']);

        $Settings->update();
    }


    public function updateAdminProfilePicture()
    {

        $Admin = Container::getModel('Admin\\Admin');

        $Tool = new Tools();

        empty($_GET['oldPhoto']) ? '' : unlink('../public/assets/img/studentProfilePhotos/' . $_POST['oldPhoto']);

        $Tool->image($Admin, '../public/assets/img/adminProfilePhotos/');

        $Admin->__set('id', $_POST['id']);

        if (!isset($_SESSION)) session_start();

        $Admin->updateProfilePicture();

        $profilePhoto = $Admin->list();

        $_SESSION['Admin']['profilePhoto'] = $profilePhoto[0]->profilePhoto;
    }


    public function exit()
    {

        if (!isset($_SESSION)) session_start();

        unset($_SESSION['Admin']);

        header('Location: /admin');
    }
}
