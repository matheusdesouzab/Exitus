<?php

namespace App\Tools;

class Tools
{

	protected $url;
	

	public function __get($att)
	{
		return $this->$att;
	}

	public function __set($att, $newValue)
	{
		return $this->$att = $newValue;
	}


	public function formatElement($value)
	{

		return preg_replace('/[^0-9]/', '', $value);
	}


	public function image($model, $dir)
	{

		if (isset($_FILES['profilePhoto']['name']) && $_FILES['profilePhoto']['error'] == 0) {

			date_default_timezone_set("Brazil/East");

			$ext = strtolower(pathinfo($_FILES['profilePhoto']['name'], PATHINFO_EXTENSION));

			$new_name = uniqid(time()) . '.' . $ext;

			move_uploaded_file($_FILES['profilePhoto']['tmp_name'], $dir . $new_name);

			$model->__set('profilePhoto', $new_name);
		}
	}
}
