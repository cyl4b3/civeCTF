<?php

$page_title = "Auth";

include_once "config/core.php";
include_once "session_checker.php";

?>

<!DOCTYPE html>
<html>
<head>

<title><?php echo $page_title; ?></title>
<link href="<?php echo $home_url."libs/css/auth.css" ?>" rel="stylesheet">
<link href="<?php echo $home_url."libs/css/normalize.min.css"?>" rel="stylesheet">
<link href="<?php echo $home_url."libs/css/Titillium.css"?>" rel="stylesheet">
</head>

<body>
<div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#login">Log In</a></li>
        <li class="tab"><a href="#signup">Sign Up</a></li>
      </ul>
      
      <div class="tab-content">

        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="<?php echo $home_url."auth" ?>" method="POST">
          
            <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input type="text" name="username" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="password" required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>

          <?php 
          
            if(isset($_GET['resp']) && ($_GET['resp'] === "failed")){
              echo "<p style='text-align:center;margin-top:-25px;color:red'>Login failed!</p>";
            }
          
          ?>

          <button class="button button-block"/>Log In</button>

          </form>

        </div>

        <div id="signup">   
          <h1>Join our Blog</h1>

          <!-- NEVER MIND THIS CODE, NOTHING SPECIAL -->

          <form action="#" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off"/>
          </div>
          
          <button type="submit" class="button button-block"/>Get Started</button>
          
          </form>

        </div>
        
        <!-- / -->
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->

	<script src="<?php echo $home_url."libs/js/jquery-3.3.1.min.js" ?>" type="text/javascript"></script>
	<script src="<?php echo $home_url."libs/js/auth.js" ?>" type="text/javascript"></script>

</body>

</html>
