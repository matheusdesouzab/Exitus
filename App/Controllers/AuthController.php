<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action
{

    public function autenticar()
    {

        $usuario = Container::getModel('Usuario');

        $usuario->__set('email', $_POST['email']);
        $usuario->__set('senha', $_POST['senha']);

        $autenticacao = $usuario->autenticar();

       if (count($autenticacao) != 0) {

            session_start();

            $_SESSION['id_usuario'] = $autenticacao[0]['id_usuario'];
            $_SESSION['nome_usuario'] = $autenticacao[0]['nome_usuario'];

            print_r($_SESSION);

            header("Location: /home");

        } else {

            header('Location: /?login=erro');
        } 
    }
}
