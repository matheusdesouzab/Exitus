<?php

namespace App\Tools;

class Validation
{


	protected $url;
	protected $error = [];


	public function __construct($url)
	{
		$this->$url = $url;
	}


	public function __get($att)
	{
		return $this->$att;
	}


	public function image($model, $dir, $errorParameter)
	{

		if (isset($_FILES['profilePhoto']['name']) && $_FILES['profilePhoto']['error'] == 0) {

			date_default_timezone_set("Brazil/East");

			$ext = strtolower(pathinfo($_FILES['profilePhoto']['name'], PATHINFO_EXTENSION));

			if ((strstr('.jpg;.jpeg', $ext))) {

				$new_name = uniqid(time()) . '.' . $ext;

				move_uploaded_file($_FILES['profilePhoto']['tmp_name'], $dir . $new_name);

				$model->__set('profilePhoto', $new_name);

			} else {

				array_push($this->error, $errorParameter);
			}
		}
	}



	function cpf($cpf, $model)
	{

		$cpfSituation = false;

		$newCpf = preg_replace('/[^0-9]/', '', $cpf);

		if (strlen($newCpf) == 11) {

			$cpfSituation = true;

			for ($t = 9; $t < 11; $t++) {

				for ($d = 0, $c = 0; $c < $t; $c++) {
					$d += $newCpf[$c] * (($t + 1) - $c);
				}

				$d = ((10 * $d) % 11) % 10;

				$cpfSituation = $newCpf[$c] != $d ? true : false;
			}
		} else {

			$cpfSituation = false;
		}

		$cpfSituation ?: array_push($this->error, 'cpf=formato-invalido');

		$model->__set('cpf', $newCpf);
	}


	public function basic($model, $value, $size, $att, $errorParameter)
	{

		$situation = false;

		$newValue = preg_replace('/[^0-9]/', '', $value);

		strlen($newValue) == $size ? $situation = true : $situation = false;

		$situation ?: array_push($this->error, $errorParameter);

		$model->__set($att, $newValue);
	}
}
