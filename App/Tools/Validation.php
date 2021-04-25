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

	


	/* public function getUrlError()
	{


		$errorVector = array_map(function ($value) {
			return '&' . $value;
		}, $this->error);

		$errorVector = substr(str_replace(',', '', implode(",", $errorVector)), 1);

		return $this->__get('url') . $errorVector;
	} */


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



	function basic($model, $value, $size, $att, $isCpf = false)
	{

		$situation = false;

		$newName = preg_replace('/[^0-9]/', '', $value);

		if (strlen($newName) == $size) {

			$situation = true;

			if ($isCpf) {

				for ($t = 9; $t < 11; $t++) {

					for ($d = 0, $c = 0; $c < $t; $c++) {
						$d += $newName[$c] * (($t + 1) - $c);
					}

					$d = ((10 * $d) % 11) % 10;

					$situation = $newName[$c] != $d ? true : false;
				}
			}
		} else {

			$situation = false;
		}

		$situation ?: array_push($this->error, $att);

		$model->__set($att, $newName);
	}


}
