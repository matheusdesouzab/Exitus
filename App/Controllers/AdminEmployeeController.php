<?php

namespace App\Controllers;

use App\Models\Matricula;
use MF\Controller\Action;
use MF\Model\Container;

class AdminEmployeeController extends Action
{

    public function employeeRegistration()
    {

        $this->render('employee_registration' , 'AdminLayout');
    }

    public function employeeList()
    {

        $this->render('employee_list' , 'AdminLayout');
    }
}
