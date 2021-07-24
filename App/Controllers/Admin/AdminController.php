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

            header('Location: /admin/gestao/turma');
        }
    }


    public function exit()
    {

        if (!isset($_SESSION)) session_start();

        unset($_SESSION['Admin']);

        header('Location: /admin');
    }
}
