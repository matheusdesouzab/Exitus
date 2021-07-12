<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class TeacherPortalController extends Action
{

    public function login()
    {

        $this->render("index/login", "LoginLayout" , "teacherPortal");
    }
}
