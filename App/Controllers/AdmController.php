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

    public function aluno_cadastro()
    {

        $this->render('aluno_cadastro');
    }

    public function aluno_lista()
    {

        $this->render('aluno_lista');
    }

    public function professor_cadastro()
    {
        $this->render('professor_cadastro');
    }

    public function gestao_geral()
    {
        $this->render('gestao_geral');
    }

    public function gestao_curso()
    {
        $this->render('gestao_curso');
    }
    
    public function gestao_disciplina()
    {
        $this->render('gestao_disciplina');
    }

    public function gestao_periodosLetivos()
    {
        $this->render('gestao_periodoLetivo');
    }

}
