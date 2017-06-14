<?php include "../publics.php" ?>
<!DOCTYPE html>
<!--
Template Name: Lacegant
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
<title>Login Page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<script language="javascript" type="text/javascript" src="../jquery-3.2.1.min.js"></script>
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<?php include "../headerpage.php" ?>
<?php include "../menupage.php" ?>
<!-- ################################################################################################ -->
<div class="wrapper bgded overlay" style="background-image:url('../images/demo/backgrounds/02.png');">
  <div id="breadcrumb" class="hoc clear"> 
    <!-- ################################################################################################ -->
     <ul>
		 <li>Login to Negar Site</li>
    </ul>
    <!-- ################################################################################################ -->
  </div>
</div>
	  
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="content"> 
      <!-- ################################################################################################ -->
      <h1>
	     Login Form
     </h1>
     <table style="width:100%; text-align:center;">
     	<tr>
     		<td>
     		<form method="post" action="destination.php" id="login">
				<fieldset>
				  <legend>Newsletter:</legend>
				  <input type="hidden" value="login" id="job" name="job">
				  <input class="btmspace-15" type="text" value="" id="email" name="email" placeholder="Enter Email or Username" required="required">
				  <input class="btmspace-15" type="password" value="" id="password" name="password" placeholder="Enter Password" required="required">
    <input type="text" name="captcha" />
    <img src="../captcha.php">
    <br><br><br>
				  <button type="submit" value="submit" class="btn">Login</button>
				</fieldset>
			  </form>	
     		</td>
     		<td style="width:30%";>
     			     <img class="imgr borderedbox inspace-5" src="../images/register.jpg" alt="">
     		</td>
     	</tr>
		</table>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="one_quarter first">
      <h6 class="title">Pharetra tempus</h6>
      <ul class="nospace linklist contact">
        <li><i class="fa fa-map-marker"></i>
          <address>
          Street Name &amp; Number, Town, Postcode/Zip
          </address>
        </li>
        <li><i class="fa fa-phone"></i> +00 (123) 456 7890<br>
          +00 (123) 456 7890</li>
        <li><i class="fa fa-fax"></i> +00 (123) 456 7890</li>
        <li><i class="fa fa-envelope-o"></i> info@domain.com</li>
      </ul>
    </div>
    <div class="one_quarter">
      <h6 class="title">Ante phasellus</h6>
      <ul class="nospace linklist">
        <li><a href="#">Sed urna eu consectetur</a></li>
        <li><a href="#">Vestibulum ornare non felis</a></li>
        <li><a href="#">Et ullamcorper proin placerat</a></li>
        <li><a href="#">Nibh quis nulla vehicula</a></li>
        <li><a href="#">Interdum proin tincidunt erat</a></li>
      </ul>
    </div>
    <div class="one_quarter">
      <h6 class="title">Ac sodales dapibus</h6>
      <p class="btmspace-30">Mi sagittis vel maecenas lobortis eros finibus tortor.</p>
      <form method="post" action="#">
        <fieldset>
          <legend>Newsletter:</legend>
          <input class="btmspace-15" type="text" value="" placeholder="Name">
          <input class="btmspace-15" type="text" value="" placeholder="Email">
          <button type="submit" value="submit">Submit</button>
        </fieldset>
      </form>
    </div>
    <div class="one_quarter">
      <h6 class="title">Vehicula purus urna</h6>
      <ul class="nospace linklist">
        <li>
          <article>
            <h2 class="nospace font-x1"><a href="#">Cursus condimentum</a></h2>
            <time class="font-xs block btmspace-10" datetime="2045-04-06">Friday, 6<sup>th</sup> April 2045</time>
            <p class="nospace">Consequat felis faucibus ac suspendisse lacinia nisi.</p>
          </article>
        </li>
        <li>
          <article>
            <h2 class="nospace font-x1"><a href="#">Pretium sapien sem</a></h2>
            <time class="font-xs block btmspace-10" datetime="2045-04-05">Thirsday, 5<sup>th</sup> April 2045</time>
            <p class="nospace">Augue vel suscipit ex sapien eget magna nulla vitae.</p>
          </article>
        </li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2015 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
<!-- IE9 Placeholder Support -->
<script src="../layout/scripts/jquery.placeholder.min.js"></script>
<!-- / IE9 Placeholder Support -->
</body>
</html>