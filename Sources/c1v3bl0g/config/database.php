<?php

//get database connection

class Database{

	//database credentials here
	private $host = "Hostname Here";
	private $dbName = "Database Name Here";
	private $username = "Username Here";
	private $password = "Password Here";
	public $conn;

	//get the database connection
	public function getConnection(){

		$this->conn = null;

		try{
			$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName, $this->username, $this->password);
		}catch(PDOException $exception){
			echo "Connection error: " . $exception->getMessage();
		}

		return $this->conn;
	}
}

?>
