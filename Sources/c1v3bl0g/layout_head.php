<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php echo isset($page_title) ? strip_tags($page_title) : "C1v3-Bl0G CTF"; ?></title>

	<!-- Custom CSS -->
	<link href="<?php echo "/libs/css/nav.css" ?>" rel="stylesheet">
	<link href="<?php echo "/libs/css/main.css" ?>" rel="stylesheet">

</head>
<body>

	<?php include_once "navigation.php"; ?>

	<?php
		if($page_title!="C1v3-Bl0G CTF"){
	?>
		<div class="header">
  			<h2><?php echo isset($page_title) ? $page_title : "C1v3-Bl0G CTF" ?></h2>
		</div>
	<?php
		}
	?>

	<div class="row">
