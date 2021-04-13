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
		$subDirectory = lcfirst($control[2]);

		require_once "../App/Views/" . $directory . "/" . $subDirectory . "/" . $this->view->page . '.php';
	}


	public function processImage($model, $routeError)
	{

		if (isset($_FILES['profilePhoto']['name']) && $_FILES['profilePhoto']['error'] == 0) {

			$dir = '../App/Views/admin/student/profilePhoto/';

			date_default_timezone_set("Brazil/East");

			$ext = strtolower(pathinfo($_FILES['profilePhoto']['name'], PATHINFO_EXTENSION));

			if ((strstr('.jpg;.jpeg', $ext))) {

				$new_name = uniqid(time()) . '.' . $ext;

				move_uploaded_file($_FILES['profilePhoto']['tmp_name'], $dir . $new_name);

				$model->profilePhoto = $new_name;

			} else {

				header('Location:'.$routeError);
			}
		}
	}


	function format($value)
	{
		$value = preg_replace('/[^0-9]/', '', $value);
		return $value;
	}
}
