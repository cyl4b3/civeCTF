<?php

include_once "config/core.php";
include_once "config/database.php";
include_once "../session_checker.php";

$page_title = "Dashboard";

include_once "layout_head.php";

echo "<p style='text-align:center'>Congrats! You are just half-way the journey. One more fl4g to catch! 
        <a href='https://www.owasp.org/index.php/Blocking_Brute_Force_Attacks'>https://www.owasp.org/index.php/Blocking_Brute_Force_Attacks</a> Here's the flag below: </p><br/>";

echo "<h3 style='text-align:center;'>ctf{Wh0a_Y0u_JuSt_BrUt3_F0rc3d_M3}</h3>";

include_once "layout_foot.php";

?>