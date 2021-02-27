<?php

namespace App\Controllers;

use App\Models\Matricula;
use MF\Controller\Action;
use MF\Model\Container;

class AdminManagementController extends Action
{

    public function managementGeneral()
    {
        $this->render('management_general', 'AdminLayout');
    }

    public function managementCourse()
    {
        $this->render('management_course', 'AdminLayout');
    }

    public function managementDiscipline()
    {
        $this->render('management_discipline', 'AdminLayout');
    }

    public function managementSchoolTerm()
    {
        $this->render('management_schoolTerm', 'AdminLayout');
    }

    public function managementRoom()
    {
        $this->render('management_room', 'AdminLayout');
    }

    public function managementClass()
    {
        $this->render('management_class', 'AdminLayout');
    }
}
