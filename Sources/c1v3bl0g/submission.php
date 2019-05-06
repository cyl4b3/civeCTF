<?php

$page_title = "Submit The Flag";

include_once "config/core.php";
include_once "config/database.php";
include_once "objects/Flag.php";

include_once "layout_head.php";

$database = new Database();
$db = $database->getConnection();
$submission = new Flag($db);

//fetch all the winners for displaying them in the table
$submission->fetchWinners();

?>

<div class="leftcolumn">

  <?php

    if(isset($_POST['Submit'])){

      $submitter = $_POST['name'];
      $flags = $_POST['flags'];
      $rate = $_POST['rate'];
      $s_date = date('Y-m-d');

      //spit the flags
      $flags = explode(';', $flags);
      if($submission->checkFlag($flags)){
        
        if($submission->saveFlag($submitter, $rate, $s_date)){
          //$submission->fetchWinners();
          header("Location: /submission?action=succ");
        }
        
        else{
          header("Location: /submission?action=err");
        }

      }

      else{
        header("Location: /submission?action=err");
      }

    }
  ?>

  <form name="submission-form" action="/submission" method="POST">

      <?php
        
        if(isset($_GET['action']) && ($_GET['action'] === "succ")){
          echo "<h3 style='background-color:#90EE90; padding:5px 0px 5px 5px'>Success! Submitted Flag successfully.</h3>";
        }

        else if(isset($_GET['action']) && ($_GET['action'] === "err")){
          echo "<h3 style='background-color:#f76060; padding:5px 0px 5px 5px'>What the heck are you doing, huh!?</h3>";
        }

        else{
          //
        }

      ?>

      <div style="margin:30px 0px 0px 0px">
          <label style="margin:0px 52px 0px 0px"><b>Name:</b></label>
          <input style="padding:5px 5px 5px 5px" type="text" name="name" maxlength="6" size="50" required/><br/>
          <p style="margin:0px 0px 0px 104px">Six (6) alphanumeric characters Maximum allowed.</p><br/>
      </div>

      <div style="margin:30px 0px 0px 0px">
          <label style="margin:0px 52px 0px 0px"><b>Flags:</b></label>
          <textarea style="padding:5px 5px 5px 5px" name="flags" maxlength="70" cols="51" required></textarea><br/>
          <p style="margin:-2px 0px 0px 104px">Type the flags, separated with '<b>;</b>'. Example: <b>ctf{flag1};ctf{flag2}</b></p><br/>
      </div>

      <div style="margin:30px 0px 0px 0px">
          <label style="margin:0px 52px 0px 0px"><b>Rate:</b></label><br/>
      </div>
      
      <div style="margin:-18px 0px 0px 96px">
        <input type="radio" name="rate" value="0"/>Easy<br/>
        <input type="radio" name="rate" value="1"/>Piece of Cake<br/>
        <input type="radio" name="rate" value="2"/>Hard<br/>
      </div>

      <div style="margin:20px 0px 0px -29px">
        <input type="submit" name="Submit" value="Submit" style="margin:0px 0px 0px 129px"/>
      </div>

  </form>

</div>

<div class="rightcolumn" style="text-align:center">
  <div class="card">

    <table border="0" cellpadding="10px" cellspacing="0px">

      <tr>
        <th>Submitted By</th>
        <th>Difficulty</th>
        <th>Submitted Date</th>
      </tr>
      
      <?php
        //
        for($i=0; $i < count($submission->submissions); $i++){
      ?>
          <tr>
            <td style="color:blue"><?php echo $submission->submissions[$i]['name'] ?></td>
            <td>
              
              <?php 
                
                if($submission->submissions[$i]['difficulty'] === "0"){
                  echo "Easy";
                }
                
                else if($submission->submissions[$i]['difficulty'] === "1"){
                  echo "Piece of Cake";
                }

                else if($submission->submissions[$i]['difficulty'] === "2"){
                  echo "Hard";
                }

                else{
                  //
                }

              ?>
              
            </td>
            <td><?php echo $submission->submissions[$i]['submitted_date'] ?></td>
          </tr>
      <?php
        }
      ?>

    </table>

  </div>
</div>

<?php

include_once "layout_foot.php";

?>