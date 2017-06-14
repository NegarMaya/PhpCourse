<?php include "publics.php" ?>
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
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
<title>Negar Site</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<script src="jquery-3.2.1.min.js"></script>

<script type="text/javascript">
jQuery.noConflict();
jQuery(document).ready(function () {
    jQuery('#check').click(function() {
        //alert("working");
		var dataString = jQuery('#searchMovie').val();
		//alert (dataString);
    var url = 'pages/showMovieInfo.php?movieName='+dataString;
    window.open(
        url,
        'popUpWindow',
        'height=400,     \
         width=650,      \
         left=300,       \
         top=100,        \
         resizable=yes,  \
         scrollbars=yes, \
         toolbar=yes,    \
         menubar=no,     \
         location=no,    \
         directories=no, \
         status=yes');
		}
    );
});
</script>

</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<?php include "header.php" ?>
<?php include "menu.php" ?>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper bgded overlay" style="background-image:url('images/backgrounds/bg1.jpg');">
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article class="introtxt">
      <h2 class="heading">PHP is very interesting!</h2>
      <p>but you must practice and practice hard</p>
     <!--/* <footer><a class="btn inverse medium" href="#">efficitur justo nulla</a></footer>*/-->
    </article>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper bgded overlay coloured">
  <div id="topSite" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article class="center">
      <h2 class="heading font-x3">Top Site</h2>
      <footer>
        <ul class="nospace inline pushright">
          <li><a class="btn" href="http://www.Digifort.ir" target="_blank">Digifort official website in Iran </a></li>
          <li><a class="btn inverse" href="http://www.Eris.ir">Eris Intelligent Systems</a></li>
        </ul>
      </footer>
    </article>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row6">
  <div id="topMovies" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="center btmspace-50">
      <h2 class="heading">My Favorite Movies</h2>
      <p class="nospace">Movies with top rank in IMDB site!</p>
    </div>
    <ul class="nospace group btmspace-50 elements">
    	<?php 
                	$movie[1]= getIMDB("October Baby");
                	$movie[2]= getIMDB("Rain Man");
                	$movie[3]= getIMDB("Life Is Beautiful");
                	$movie[4]= getIMDB("Snowmen");
      ?>
      <li class="one_quarter first">
        <article>
          <figure><img src="<?php echo htmlspecialchars($movie[1]["poster"]); ?>" alt="">
            <!--<figcaption>Odio quisque blandit</figcaption>-->
          </figure>
          <div class="txtwrap">
            <h6 class="heading"><?php echo htmlspecialchars($movie[1]["show_title"]);  ?></h6>
            <p>Cast:<?php echo htmlspecialchars($movie[1]["show_cast"]); ?></p>
            <p>Director:<?php echo htmlspecialchars($movie[1]["director"]); ?></p>
            <p>Release Year:<?php echo htmlspecialchars($movie[1]["release_year"]); ?></p>
          </div>
        </article>
      </li>
      <?php 
	
for ($i=2; $i<=4; $i++){
echo <<<EOF
<li class="one_quarter">
        <article>
          <figure><img src="{$movie[$i]["poster"]}"></figure>
          <div class="txtwrap">
            <h6 class="heading">{$movie[$i]["show_title"]}</h6>
            <p>Cast:{$movie[$i]["show_cast"]}</p>
            <p>Director:{$movie[$i]["director"]}</p>
            <p>Release Year:{$movie[$i]["release_year"]}</p>
          </div>
        </article>
      </li>
	
EOF;
    /*echo $str;
		  var_dump ($movie[$i]["show_title"]);*/
		  }
		?>
    </ul>
    <div class="nospace center"><input type="text" id="searchMovie" value="" placeholder="Enter The Movie Name" style="color:black;">
    <button type="button" name="check" id="check" value="check" class="btn">Search Your Movie</button></div>
    <!-- ################################################################################################ -->
    <div class="clear"></div>
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main id="blog" class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <ul class="nospace group btmspace-50 elements">
      <li class="one_quarter first">
        <h6 class="heading">Follow My Blog</h6>
        <p>My daily writing and programming article and&hellip;</p>
      </li>
      
    <?php 
		$conn= getConnection();
		$query= "select * from blogpost LIMIT 4";
		$result= $conn->query($query);
		
		while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
		$titlepost= $row['titlePost'];
		$bodypost= $row['bodyPost'];
		$writerpost=$row['writerPost'];
		$datepost=$row['datePost'];
		$picpost=$row['picpost'];
		$id=$row['id'];
		echo "<li class='one_quarter'>
        <article><img src='pages/$picpost' alt=''>
          <div class='txtwrap'>
            <h6 class='heading'>$titlepost</h6>
            <p>$bodypost&hellip;</p>
			<p class='nospace'><a href='#'>Read More &raquo;</a></p>
          </div>
        </article>
      </li>";
		}
	?>
      
<!--      <li class="one_quarter">
        <article><a href="#"><img src="images/demo/320x220.png" alt=""></a>
          <div class="txtwrap">
            <h6 class="heading">Nulla faucibus lectus ut nisl tincidunt</h6>
            <p>Gravida aliquet sapien est scelerisque risus id accumsan nibh leo sit amet neque fusce placerat tristique&hellip;</p>
            <p class="nospace"><a href="#">Read More &raquo;</a></p>
          </div>
        </article>
      </li>
      <li class="one_quarter">
        <article><a href="#"><img src="images/demo/320x220.png" alt=""></a>
          <div class="txtwrap">
            <h6 class="heading">Imperdiet eros dictum arcu auctor</h6>
            <p>Nunc congue pharetra ipsum et feugiat donec ipsum mauris ullamcorper non aliquet sit amet cursus sed&hellip;</p>
            <p class="nospace"><a href="#">Read More &raquo;</a></p>
          </div>
        </article>
      </li>
      <li class="one_quarter">
        <article><a href="#"><img src="images/demo/320x220.png" alt=""></a>
          <div class="txtwrap">
            <h6 class="heading">Ullamcorper laoreet vel sollicitudin</h6>
            <p>Mi aenean ultricies eros non laoreet scelerisque diam est vehicula orci quis tincidunt ligula diam urna&hellip;</p>
            <p class="nospace"><a href="#">Read More &raquo;</a></p>
          </div>
        </article>
      </li>-->
    </ul>
    <hr class="btmspace-50">
    <article class="two_third first">
      <h6 class="heading">Rutrum nulla sed eu sodales</h6>
      <p>Scelerisque sed ornare lacus in mollis sagittis quam purus porta nisl vel tristique leo mauris a erat curabitur vitae tellus venenatis fringilla nunc in vestibulum quam ut scelerisque scelerisque odio pretium sodales mauris consectetur sit amet fusce sit amet.</p>
      <p>Turpis volutpat fringilla neque suspendisse ante urna facilisis ut odio ut consequat lacinia neque aliquam non velit nulla morbi sollicitudin.</p>
    </article>
    <aside class="one_third">
      <h6 class="heading">Enim nunc volutpat</h6>
      <ul class="nospace">
        <li class="btmspace-15"><i class="fa fa-fw fa-home"></i> <a href="#">Vel ultricies leo fermentum aenean</a></li>
        <li class="btmspace-15"><i class="fa fa-fw fa-book"></i> <a href="#">Dignissim felis nec volutpat maecenas</a></li>
        <li class="btmspace-15"><i class="fa fa-fw fa-pencil"></i> <a href="#">Sagittis arcu a rutrum laoreet lacus</a></li>
        <li><i class="fa fa-fw fa-cog"></i> <a href="#">Velit elementum nisi sit amet gravida</a></li>
      </ul>
    </aside>
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
    <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved By Negar - <a href="#">www.negar.es</a></p>
    <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<!-- IE9 Placeholder Support -->
<script src="layout/scripts/jquery.placeholder.min.js"></script>
<!-- / IE9 Placeholder Support -->
</body>
</html>