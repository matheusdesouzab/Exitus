<?php

namespace MF\Controller;

abstract class Action {

	protected $view;

	public function __construct() {
		$this->view = new \stdClass();
	}

	protected function render($view, $layout = 'layout') {
		$this->view->page = $view;

		if(file_exists("../App/Views/".$layout.".php")) {
			require_once "../App/Views/".$layout.".php";
		} else {
			$this->content();
		}
	}

	protected function content() {
		
		$classAtual = get_class($this);

		$classAtual = str_replace('App\\Controllers\\', '', $classAtual);

		$classAtual = strtolower(str_replace('Controller', '', $classAtual));

		$pastaArquivo = explode('_',$this->view->page);

		require_once "../App/Views/".$classAtual."/".$pastaArquivo[0]."/".$this->view->page.".php";
	}
}

?>