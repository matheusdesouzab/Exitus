<?php

namespace App\Tools;

class Validation
{


	protected $url;
	protected $error = [];


	public function __get($att)
	{
		return $this->$att;
	}

	public function __set($att, $newValue)
	{
		return $this->$att = $newValue;
	}


	public function image($model, $dir, $errorParameter)
	{
		print_r($_FILES['profilePhoto']['error']);

		if (isset($_FILES['profilePhoto']['name']) && $_FILES['profilePhoto']['error'] == 0) {

			echo 'chegou';

			date_default_timezone_set("Brazil/East");

			$ext = strtolower(pathinfo($_FILES['profilePhoto']['name'], PATHINFO_EXTENSION));

			if ((strstr('.jpg;.jpeg', $ext))) {

				$new_name = uniqid(time()) . '.' . $ext;

				move_uploaded_file($_FILES['profilePhoto']['tmp_name'], $dir . $new_name);

				$model->__set('profilePhoto', $new_name);

			} else {

				echo('ext');

				array_push($this->error, $errorParameter);
			}

		}else{

			echo 'pau';
		}
	}



	


}
