<?php

include_once "config/core.php";
include_once "config/database.php";

session_destroy();

header("Location: {$home_url}");

?>