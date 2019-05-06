<?php

$page_title = "Edit Post";

include "../config/core.php";
include "../config/database.php";
include_once "../session_checker.php";

//head layout
include_once "layout_head.php";

?>

<form action="<?php echo $home_url."dashboard/post"; ?>" method="post" enctype="multipart/form-data">

    <?php 
        if(isset($_GET['action']) && ($_GET['action'] === "empty")){
            echo "<h3 style='background-color:#90EE90; padding:5px 0px 5px 5px'>Success! Posts Deleted Successfully.</h3>";
        }
        
        else if(isset($_GET['action']) && ($_GET['action'] === "succ")){
            echo "<h3 style='background-color:#90EE90; padding:5px 0px 5px 5px'>Success! Posted successfully.</h3>";
        }
        
        else if(isset($_GET['action']) && ($_GET['action'] === "err")){
            echo "<h3 style='background-color:#f76060; padding:5px 0px 5px 5px'>What the heck are you doing, huh!?</h3>";
        }

        else{
            //
        }
    ?>

    <div style="margin:30px 0px 0px 0px">
        <label style="margin:0px 52px 0px 0px"><b>Post Title</b></label>
        <textarea cols="50" rows="3" name="post-title" maxlength="30" required></textarea><br/><br/>
    </div>

    <div style="margin:10px 0px 0px 0px">
        <label style="margin:0px 45px 0px 0px"><b>Post Body</b></label>
        <textarea cols="50" rows="10" name="post-body" maxlength="50" required></textarea>
    </div>

    <div style="margin:20px 0px 20px 0px">
        <label style="margin:0px 45px 0px 0px"><b>Post Pic</b></label>
        <input type="file" name="post-pic" style="margin:0px 0px 0px 16px" required/>
    </div>

    <div style="margin:5px 0px 0px 0px">
        <input type="submit" name="Submit" value="Submit" style="margin:0px 0px 0px 129px"/>
        <a href="/dashboard/post?action=empty" style="margin:-21px 0px 0px 250px">Delete all posts</a>
    </div>

    
</form>

    

<?php
include_once "layout_foot.php";
?>