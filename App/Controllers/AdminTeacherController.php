<?php

namespace App\Controllers;

use App\Models\Matricula;
use MF\Controller\Action;
use MF\Model\Container;

class AdminTeacherController extends Action
{

    public function teacherRegistration()
    {

        $this->render('teacher_registration' , 'AdminLayout');
    }

    public function teacherList()
    {

        $this->render('teacher_list' , 'AdminLayout');
    }
}
