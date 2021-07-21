<?php

namespace MF\Model;

abstract class Model
{

	protected $db;
	protected $id;
	

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
