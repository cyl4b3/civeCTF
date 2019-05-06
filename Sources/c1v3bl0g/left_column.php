<div class="leftcolumn">

<?php
  //
  for($i=0; $i < count($post->posts); $i++){
?>
    <div class="card">
      <h2><?php echo $post->posts[$i]['post_title'];?></h2>
      <h5>Date Posted: <?php echo $post->posts[$i]['created_at'];?></h5>
      <img src="/uploads/<?php echo $post->posts[$i]['post_pic'];?>" class="fakeimg" style="height:500px;"/>
      <p style="float:right; margin-top:-5px">Attachment name: <?php echo $post->posts[$i]['post_pic'];?></p><br/><br/>
      <p><?php echo $post->posts[$i]['post_body'];?></p>
    </div>
  
  <?php
    }
  ?>
  
</div>