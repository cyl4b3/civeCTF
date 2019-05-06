<?php

if($_POST){

	include_once "config/core.php";
	include_once "config/database.php";
	include_once "objects/User.php";

	//get database connection
	$database = new Database();
	$db = $database->getConnection();

	//initialize user object
	$user = new User($db);

	//check if username exists and password are in database
	$user->username = $_POST['username'];
	$password = md5($_POST['password']);

	$username_exists = $user->usernameExists();

	if($username_exists && ($password === $user->password)){

		//if it is the correct user
		$_SESSION['logged_in'] = "True";
		$_SESSION['user_id'] = $user->user_id;
		$_SESSION['username'] = htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8');
		$_SESSION['access_level'] = $user->access_level;
		$_SESSION['avatar'] = $user->avatar;

		//redirect logged in user to admin dashboard
		if($user->access_level === "Admin"){
			header("Location: {$home_url}dashboard/index.php");
		}

	}else{

		header("Location: {$home_url}login?resp=failed");

	}

}



