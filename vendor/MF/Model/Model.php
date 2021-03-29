<?php

namespace MF\Model;

abstract class Model
{

	protected $db;

	public function __construct(\PDO $db)
	{
		$this->db = $db;
	}

	public function __get($att)
	{
		return $this->$att;
	}

	public function __set($att, $newValue)
	{
		return $this->$att = $newValue;
	}

	public function __call($method, $value)
	{
		return $this->get($method);
	}
	

	protected function set($property, $value)
	{
		$methodName = "set" . ucfirst($property);
		if (method_exists($this, $methodName)) {
			call_user_func_array(array($this, $methodName), array($value));
		} else if (property_exists($this, $property)) {
			$this->{$property} = $value;
		} else {
			throw new \InvalidArgumentException("Property {$property} not exists!");
		}
	}


	public function setAll(array $data)
	{
		foreach ($data as $k => $v)
			$this->set($k, $v);
		return $this;
	}
	

	public function speedingUp($query)
	{

		$stmt = $this->db->prepare($query);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_OBJ);
	}
}
