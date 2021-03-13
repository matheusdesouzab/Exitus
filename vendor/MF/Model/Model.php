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

}
