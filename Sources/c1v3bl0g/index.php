<?php

include_once "config/core.php";
include_once "config/database.php";
include_once "objects/Post.php";

$database = new Database;
$db = $database->getConnection();

$post = new Post($db);

include_once "layout_head.php";
$post->fetchPosts();
include_once "left_column.php";
include_once "right_column.php";
include_once "layout_foot.php";


?>
