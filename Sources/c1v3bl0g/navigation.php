<ul>
  <li><a class="active" href="/">Home</a></li>
  <li><a href="/libs/index?p=libs">Libs</a></li>
  <li style=""><a href="/about">About</a></li>
  <li style="float:right"><a href="/submission">Submit Flag</a></li>
  <?php
    if(!isset($_SESSION['logged_in'])){ 
  ?>
      <li style="float:right"><a href="/login">Login</a></li>
  <?php
    }
    else{
      //
    }
  ?>

  <?php
    if(isset($_SESSION['logged_in'])){ 
  ?>

    <li style="float:right" class="sess-dropdown">
      <a href="javascript:void(0)" class="dropbtn"><?php echo strip_tags($_SESSION['username']); ?></a>
      <div class="dropdown-content">
        <a href="/dashboard">Dashboard</a>
        <a href="/logout">Logout</a>
      </div>
    </li>

  <?php
    }
    else{
      //
    }
  ?>

  <?php
    if(isset($_SESSION['logged_in'])){ 
  ?>

    <li style="float:right" class="sess-dropdown">
      <a href="javascript:void(0)" class="dropbtn">Actions</a>
      <div class="dropdown-content">
        <a href="/dashboard/edit">Edit Post</a>
      </div>
    </li>
  
  <?php
    }
    else{
      //
    }
  ?>
  
</ul>
