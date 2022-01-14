<?php

namespace App\Controllers\Index;

use MF\Controller\Action;
use MF\Model\Container;
use App\Tools\Tools;

class IndexController extends Action
{

    public function index()
    {

        $this->render("index", "SimpleLayout");
    }

    public function error()
    {
        $this->render('errorPage', 'SimpleLayout');
    }
}

?>