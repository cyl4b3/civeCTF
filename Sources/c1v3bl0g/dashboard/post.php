<?php

include_once "../config/core.php";
include_once "../config/database.php";
include_once "../objects/Post.php";
include_once "../session_checker.php";

$database = new Database();
$db = $database->getConnection();
$post = new Post($db);

//Delete all posts
if(isset($_GET['action']) && $_GET['action'] === "empty"){
    $post->emptyPosts();
    header("Location: /dashboard/edit?action=empty");
}

//Post Article in the database
if(isset($_POST['Submit']) && !empty($_POST['Submit'])){
    
    $post->post_pic_arr = $_FILES;
    $post->post_title = $_POST['post-title'];
    $post->post_body = $_POST['post-body'];
    $post->created_at = date('Y-m-d');
    $post->user_id = $_SESSION['user_id'];

    $postArr = array('post_pic' => $post->post_pic_arr, 'post_title' => $post->post_title, 'post_body' => $post->post_body, 'created_at' => $post->created_at, 'user_id' => $post->user_id);

    if($post->savePic($postArr) && $post->savePost()){
        header("Location: /dashboard/edit?action=succ");
    }

    else{
        header("Location: /dashboard/edit?action=err");
    }

}

?>