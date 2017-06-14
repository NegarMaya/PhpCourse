<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
  <div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="fl_left">
      <ul class="nospace inline pushright">
        <li><i class="fa fa-sign-in"></i> <a href="pages/login.php">Login</a></li>
        <li><i class="fa fa-user"></i> <a href="pages/register.php">Register</a></li>
      </ul>
    </div>
    <div class="fl_right">
      <ul class="nospace inline pushright">
        <li><i class="fa fa-phone"></i> +98 (21) 123 4567</li>
        <li><i class="fa fa-envelope-o"></i> info@negar.es</li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo">
     <?php
		if(isset($_SESSION["username"]) && !empty($_SESSION["username"])) 
			$session= $_SESSION["username"].",";
		else $session='';
		?>
      <h1><a href="index.php">Welcome <?php echo $session ?> to My website</a></h1>
      <p>PHP course sample website</p>
    </div>
    <!-- ################################################################################################ -->
  </header>
</div>