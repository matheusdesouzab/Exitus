<?php

namespace App\Controllers;

use App\Models\Matricula;
use MF\Controller\Action;
use MF\Model\Container;

class AdmController extends Action
{

    public function admHome()
    {

        $this->render('adm_home');
    }

    public function matricula()
    {

        $this->render('aluno_matricula');
    }

    public function listaAlunos()
    {

        $this->render('aluno_lista');
    }
}
