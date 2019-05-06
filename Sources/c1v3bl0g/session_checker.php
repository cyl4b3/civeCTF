<?php

include_once "config/core.php";

	//check users' session

	if(!isset($_SESSION['logged_in']) && ($page_title != "C1v3-Bl0G CTF") && ($page_title != "Auth")){
		
		header("Location: {$home_url}login");
	
	}

	else if(isset($_SESSION['logged_in']) && $page_title === "Auth"){
		
		header("Location: {$home_url}index");
	
	}

	else{
		 //stay on current page
	}
