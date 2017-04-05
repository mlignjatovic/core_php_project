<?php
/*
*
* 	DATABASE CONNECTION
*   
*/
abstract class Database {

	protected $db;

	function __construct ($db = NULL) {

		if (is_object($db)) {
			$this->db = $db;
		}
		else {
			$dsn = 'mysql:host='.Settings::db_host().';dbname='.Settings::db_name();

			try {
				$this->db = new PDO($dsn,Settings::db_user(),Settings::db_pass());
				$this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}
	//hellper function for stdStatemment object
	protected function setStatement($sql,$data = NULL) {
		$statement = $this->db->prepare($sql);
		try {
			$statement->execute($data);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		return $statement;
	}
}