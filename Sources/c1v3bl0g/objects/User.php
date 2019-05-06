<?php

//'user' object

class User{

	//database connection and table name
	private $conn;
	private $table_name = "users";

	//object props
	public $user_id;
	public $username;
	public $password;
	public $access_level;
	public $avatar;

	//constructor
	public function __construct($db){
		$this->conn = $db;
	}

	//checks if given username exists
	public function usernameExists(){

		$query = "SELECT * FROM ".$this->table_name." WHERE username = ?";

		//prepare the query
		$stmt = $this->conn->prepare( $query );

		$this->username = htmlspecialchars(strip_tags($this->username));

		$stmt->bindParam(1, $this->username);

		$stmt->execute();

		$num_rows = $stmt->rowCount();

		//if username exists assign values to object properties for easy access
		if($num_rows > 0){

			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			//assign values to object properties
			$this->user_id = $row['user_id'];
			$this->username = $row['username'];
			$this->password = $row['password'];
			$this->access_level = $row['access_level'];
			$this->avatar = $row['avatar'];

			return true;
		}else{
			return false;
		}
	}

}
