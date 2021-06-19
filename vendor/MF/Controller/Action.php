<?php

namespace MF\Controller;

abstract class Action
{

	protected $view;

	public function __construct()
	{
		$this->view = new \stdClass();
	}

	protected function render($view, $layout)
	{

		$this->view->page = $view;

		if (file_exists("../App/Views/layouts/" . $layout . ".php")) {

			require_once "../App/Views/layouts/" . $layout . ".php";

		} else {

			$this->content();
		}
	}

	protected function content()
	{

		$class = explode('\\', get_class($this));

		$control = preg_split('/(?=[A-Z])/', $class[2]);

		$directory = lcfirst($control[1]);

		require_once "../App/Views/" . $directory . "/" . $this->view->page . '.php'; 
	}
}
