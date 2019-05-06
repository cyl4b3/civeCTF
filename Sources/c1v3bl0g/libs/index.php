<?php

include_once "config/core.php";

if(isset($_GET['p'])){

	$page = $_GET['p'];
	
	$ext = explode('.',$page);
	
	if($ext[0] === "flag" && $ext[1] === null){

		$page_title = "The Damn LFI fl4g";
		
		include_once "../layout_head.php";

		echo "<h3 style='text-align:center;'>ctf{G00sh_LFIs_ArE_ReAllY_Bad}</h3>";
		
		include_once "../layout_foot.php";
	
	}

	else if($ext[0] === "libs" && $ext[1] === null){
		
		include_once $home_url.$page;
	
	}
	
	else{

		include_once "../layout_head.php";
		echo "\n<h3>What the heck are you doing, huh!?</h3>";
		include_once "../layout_foot.php";
	}

}else {
    //
}