<?php

namespace MF\Controller;

abstract class Action {

	protected $view;

	public function __construct() {
		$this->view = new \stdClass();
	}

	protected function render($view, $layout) {

		$this->view->page = $view;

		if(file_exists("../App/Views/layouts/".$layout.".php")) {
			require_once "../App/Views/layouts/".$layout.".php";
		} else {
			$this->content();
		}
	}

	protected function content() {
		
		$classAtual = explode('\\',get_class($this));

		$caminhoAbsoluto = preg_split('/(?=[A-Z])/', $classAtual[2]);

		$pastaPrincipal = lcfirst($caminhoAbsoluto[1]);
		$pastaSecundaria = lcfirst($caminhoAbsoluto[2]);

		require_once "../App/Views/".$pastaPrincipal."/".$pastaSecundaria."/".$this->view->page.'.php';
	}
}

?>