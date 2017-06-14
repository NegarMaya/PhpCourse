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
<title>USERS</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<script type="text/javascript" src="../jquery-3.2.1.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
$('#delete').click(function(){
var checkstr =  confirm('are you sure you want to delete this?');
if(checkstr == true){
  // do your code
}else{
return false;
}
});	
});
</script>

<script type="text/javascript">
$(document).ready(function(){
var elem = $('input[type="image"][id$="edit"]');
$(elem).click(function() {
    alert($(this).closest('tr').index());
	//$(this).closest('tr').remove();
	$(this).parents('tr').find('td.editableColumns').each(function(){
		alert ("lka");
		var html = $(this).html();
			var input = $('<input type="text" />');
			var id=$(this).parents('tr').find('input[type="hidden"]').val();
		alert (id);
			input.val(html);
			$(this).html(input);
		    $(this).parents('tr').find('#save'+id).css('visibility','visible');
		   
			/*$(this).parents('tr').find('#save').attr('src','../images/save.jfif');
			$(this).parents('tr').find('#save').attr("href", "destination.php?job=updateuser&id="+id);*/
			
	});
});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
var elemS = $('input[type="button"]');
$(elemS).click(function() {
    alert($(this).closest('tr').index());
	//$(this).closest('tr').remove();
	$(this).parents('tr').find('td.editableColumns').each(function(){
		alert ("lka");
		    var html = $(this).html();
			var id=$(this).parents('tr').find('input[type="hidden"]').val();
			var name=$(this).parents('tr').find('#name'+id).val();
		alert (name);
		   	$(this).parents('tr').find('#save'+id).prop("href", "destination.php?job=updateuser&id="+id+"&name=ajkdk");

			/*$(this).parents('tr').find('#save').attr('src','../images/save.jfif');
			$(this).parents('tr').find('#save').attr("href", "destination.php?job=updateuser&id="+id);*/
			
	});
});
});
</script>
</head>
<body id="top">
<!-- ################################################################################################ -->
<?php include "../headerpage.php" ?>
<?php include "../menupage.php" ?>

<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="content"> 
      <!-- ################################################################################################ -->
      <a href="../panelCMS.php">Back to Panel CMS</a>
      <br>
      <h1>Table(USERS)</h1>
      <div class="scrollable">
      
      
<?php

$job=isset($_REQUEST['job']) ? $_REQUEST['job'] : '';
if ($job=="alluser")
{
	$conn= getConnection();
	$query= "select SQL_NO_CACHE * from users";
	$result= $conn->query($query);
	//echo $result->fetch_assoc();
    
	echo "<table>";
	echo "<thead><tr><th>Operation</th><th>Full Name</th><th>User Name</th><th>Email</th><th>User Photo</th></tr></thead>";
	echo "<tbody>";
	while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$name= $row['username'];
		$fullname= $row['userfullname'];
		$userphoto=$row['userphoto'];
		$email=$row['email'];
		$id=$row['id'];
		echo "<tr><td>
		<input type='hidden' value='$id'>
		<a href='usersEdit.php?job=edituser&id=$id'>Edit | </a>
		<a href='destination.php?job=deleteuser&id=$id'>Delete</a>
		</td></thead>";
		echo "<td class='editableColumns' id='name'>".$name."</td>";
		echo "<td class='editableColumns' id='name'>".$fullname."</td>";
		echo "<td class='editableColumns' id='email'>".$email."</td>";
		echo "<td><img src='$userphoto'></td></tr></thead>";
	}
	echo "</tbody>";
	echo "</table>";
	}
?>
      </div>
      <!-- ################################################################################################ -->
    </div>
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