<?php

namespace MF\Model;

abstract class Model
{

	protected $db;
	
	public function __construct(\PDO $db)
	{
		$this->db = $db;
	}


	public function speedingUp($query)
	{

		$stmt = $this->db->prepare($query);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_OBJ);
	}
}
