<?php

namespace App;

class Connection
{

	public static function getDb()
	{
		try {

			$conn = new \PDO(
				"mysql:host=localhost;dbname=exitus;charset=utf8",
				"root",
				"88687328"
			);

			return $conn;
			
		} catch (\PDOException $e) {
			echo ($e->getMessage());
		}
	}
}
