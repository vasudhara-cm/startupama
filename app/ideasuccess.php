<?php 

session_start();
if(!isset($_SESSION['counterVal'])){
header("location:index.php");	
}

?>
<?php
$message="";
$message1=true;

if(count($_POST)){


if($_POST["verify_otp"]==""){
	$message="Enter Your OTP";
	$message1=true;
}
elseif($_SESSION["otp"]==$_POST["verify_otp"]){
$firstname=$_SESSION["firstname"];
$lastname=$_SESSION["lastname"];
$email=$_SESSION["email"];
$mobile=$_SESSION["mobile"];
$idea_name=$_SESSION["idea_name"];
$q1=$_SESSION["q1"];
$q2=$_SESSION["q2"];
$q3=$_SESSION["q3"];
$q4=$_SESSION["q4"];
$status=$_SESSION["status"];
$category=$_SESSION["category"];
$otp=$_SESSION["otp"];
$count=$_SESSION["count"];
$date=$_SESSION["regi_date"];
$ideaid=$_SESSION["idea_id"];
$count=$_SESSION["countnew"];

include 'connection.php';
if(mysql_query("insert into submitted_ideas(firstname,lastname,fullname,email,mobile,idea_name,q1,q2,q3,q4,idea_status,idea_category,otp,verified,idea_id,date,count) values('$firstname','$lastname','$firstname $lastname','$email','$mobile','$idea_name','$q1','$q2','$q3','$q4','$status','$category','$otp','1','$ideaid','$date','$count')")){

$message="Your Idea is Submitted with ID : $ideaid ";
$message1=false;
}
}

else{
	
	$message="Enter Correct OTP";
	$message1=true;
	
}

}

?>

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html class=""><!--<![endif]-->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Submit An Idea, Start Up Amaravathi">
    <meta name="author" content="Start Up Amaravathi">
	<title>Submit An Idea </title>

	<!-- Standard Favicon -->
	<link rel="icon" type="image/x-icon" href="images/favicon.ico" />
	
	<!-- For iPhone 4 Retina display: -->
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-icon-114x114.png">
	
	<!-- For iPad: -->
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-icon-72x72.png">
	
	<!-- For iPhone: -->
	<link rel="apple-touch-icon-precomposed" href="images/apple-icon-57x57.png">
	
	<!-- Library - Bootstrap v3.3.5 -->
    <link rel="stylesheet" type="text/css" href="libraries/lib.css">
    <link rel="stylesheet" type="text/css" href="libraries/Stroke-Gap-Icon/stroke-gap-icon.css">
	
	<!-- Custom - Common CSS -->
	<link rel="stylesheet" type="text/css" href="css/plugins.css">
	<link rel="stylesheet" type="text/css" href="css/navigation-menu.css">
	<link rel="stylesheet" type="text/css" href="libraries/lightslider-master/lightslider.css">
	
	<!-- Custom - Theme CSS -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/shortcode.css">
	<!--[if lt IE 9]>		
		<script src="js/html5/respond.min.js"></script>
    <![endif]-->
	
</head>

<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">
	<!-- Loader -->
	<div id="site-loader" class="load-complete">
		<div class="loader">
			<div class="loader-inner ball-clip-rotate">
				<div></div>
			</div>
		</div>
	</div><!-- Loader /- -->
	
	<!-- Header -->
	<header class="header-main container-fluid no-padding">
		<!-- Top Header -->
		<div class="top-header container-fluid no-padding">
			<!-- Container -->
			<div class="container">
				<div class="row">
										
				<!-- Logo Block -->
					<div class="col-md-12 col-sm-12 col-xs-12 text-center logo-block">
						<a class ="text-center" href="index.php" title="Logo">
							<img  src="images/logo_1.jpg" style="height:auto;" alt="logo" />
							
						</a>
						</div><!-- Logo Block /- -->
				</div>
			</div><!-- Container /- -->
		</div><!-- Top Header /- -->
		
		<!-- Menu Block -->
		<div class="menu-block container-fluid no-padding">
			<!-- Container -->
			
			<a class=" user btn btn-warning" href="submitanidea.php"  style="
    width: 130px;line-height: 47px;

" role="button">Submit an Idea</a>
			<div class="container">
			


			    
				<div class="col-md-12 col-sm-12">
				
					<!-- Navigation -->
				   
					<nav class="navbar ow-navigation">

						<div class="navbar-header">
						 
							<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
							
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							
							<p><a title="Logo" href="index.php" class="navbar-brand"><img src="images/logo.png" alt="logo"/><span>Start Up Amarvathi</span></a></p>
						
						</div>

						<div class="navbar-collapse collapse" id="navbar">
							<ul class="nav navbar-nav menubar">
							
						<li><a title="Objective" href="objective.php">Objective</a></li>
						<li><a title="Boot Camp Schedules" href="bootcamp.php">Boot Camp Schedules </a></li>
						<li><a title="Important Dates" href="dates.php">Important Dates</a></li>
						<li><a title="Gallery" href="gallery.php">Gallery/Downloads</a></li>
						<li class="active" style="background-color:#feca16"><a href="submitanidea.php" title="Submit An Idea" >Submit An Idea</a></li>
							</ul>
						</div>
					</nav><!-- Navigation /- -->
				</div>
			</div><!-- Container /- -->
		</div><!-- Menu Block /- -->
	
	<!-- PageBanner -->
	<div class="container-fluid page-banner error no-padding">
		<div class="section-padding"></div>
			<div class="container">
				<div class="banner-content-block">
					<div class="banner-content">
						<h3>Submit An Idea </h3>
						<ol class="breadcrumb">
							<li><a href="index.php">Home</a></li>
							<li class="active">Submit An Idea  </li>
						</ol>
					</div>
				</div>
			</div>
		<div class="section-padding"></div>
	</div><!-- PageBanner /- -->
	
	<div class="container-fulid no-padding ">
			<div class="container">
				<div class="row contact-form-section">
				<h4 style="text-align:center;color:red">Idea submission starts from 13-February-2017.</h4>
				
				<h3 style="text-align:center">Submit An Idea </h3>
					<div class="col-md-10 col-sm-12 col-xs-12">
					<?php 
			if($message1){
				
			?>
						
					<form method="post"  action="" name="f1" onsubmit="return myFunction();">
	

    <div class="col-md-6 col-sm-6 col-xs-12">
						
	<div class="form-group">
      <label for="pwd">Enter Your OTP:</label>
	  <p style="color:red">An OTP is sent to your registered mail !! Plese check your mail. </p>
      <input type="text" class="form-control" id="otp" name="verify_otp" placeholder="Plese Enter Your OTP">
    </div>
						
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="form-group">
						
    <input type="submit"  value="Submit" />
	</div></div>
  </form>
  	
<?php
			} ?>
<div class="col-md-12 col-sm-12 col-xs-12">			
<h4 style="color:red">
  <?php echo $message;
			 ?>
			 </h4></div>
					</div>
					
					</div>
			</div>
		<div class="section-padding"></div>
	</div>
	<?php
	include "connection.php";
$count = mysql_query("select count(*) as total_ideas from submitted_ideas");
	$total = mysql_fetch_array($count);
	$ideas = $total["total_ideas"];
	?>
	<!-- Footer Main -->
	<footer class="footer-main container-fluid no-padding">
		<!-- Container -->
		<div class="container">
			
			
			<div class="row">
				<!-- Customer Service Widget -->
				<aside class="col-md-3 col-sm-6 col-xs-6 widget widget_customer_services">
					
					<img src="images/logo-white.png" alt="logo" width="90%" height="auto"/>
					<div class="contactinfo-box btn btn-warning block-title">
					No. of Ideas submitted<br><b > <?php echo $ideas;?></b></div>
				</aside><!-- Customer Service Widget /- -->
				
				<!-- Quick Links Widget -->
				<aside class="col-md-3 col-sm-6 col-xs-6 widget widget_quick_links">
					<h3 class="block-title">Quick Menu</h3>
					<ul>
						<li><a title="Objective" href="objective.php">Objective</a></li>
						<li><a title="Boot Camp Schedules" href="bootcamp.php">Boot Camp Schedules </a></li>
						<li><a title="Important Dates" href="dates.php">Important Dates</a></li>
						<li><a title="Gallery" href="gallery.php">Gallery/Downloads</a></li>
						<li><a title="Submit An Idea" href="submitanidea.php">Submit An Idea</a></li>
					</ul>
				</aside>
				
				
				<aside class="col-md-3 col-sm-6 col-xs-6 widget widget_contactus">
					<h2 class="block-title">Toll Free Number</h2>
					<div class="contactinfo-box">
							<i class="fa fa-phone"></i>
							<p><b>1800-111-1111 </b></p>
						</div>
						<h2 class="block-title">Partnered By</h2>
					
						<div class="contactinfo-box">
						
					<img src="images/gbilogo.png" alt="logo" width="60%" />
					
				</div><!-- Customer Service Widget /- -->
				
				</aside>
	
	
				<!-- Quick Links Widget /- -->
				
				<!-- ContactUs Widget -->
				<!--<aside class="col-md-3 col-sm-6 col-xs-6 widget widget_contactus">
					<h3 class="block-title">Contact Us</h3>
					<div class="contactinfo-box">
						<i class="fa fa-map-marker"></i>
							<p>09 Design Street, Mitri, Victoria, Australia.</p>
					</div>
					<div class="contactinfo-box">
						<i class="fa fa-phone"></i>
						<p>
							<a title="0112345678" href="tel:+0112345678">+01 123 456 78</a>
							<a title="0112355689" href="tel:+0112355689">+01 123 556 89</a>
						</p>
					</div>
					<div class="contactinfo-box">
						<i class="fa fa-map-marker"></i>
						<p>
							<a href="mailto:Info@OurDomain.Com" title="Info@OurDomain.Com">Info@OurDomain.Com</a>
							<a href="mailto:Support@OurDomain.Com" title="Support@OurDomain.Com">Support@OurDomain.Com</a>
						</p>
					</div>
				</aside>-->
				<!-- ContactUs Widget /- -->
				
				<!-- NewsLetter Widget -->
				<aside class="col-md-3 col-sm-6 col-xs-6 widget widget_newsletter">
					<h3 class="block-title">Social Media</h3>
					
					<ul>
						<li><a title="Facebook" data-toggle="tooltip" href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a title="Twitter" data-toggle="tooltip" href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a title="Google Plus" data-toggle="tooltip" href="#"><i class="fa fa-google-plus"></i></a></li>
					</ul>
					<h3 class="block-title">Visitors Count</h3>
					<p><b><?php
echo  $_SESSION['counterVal'];
?></b></p>
				</aside><!-- NewsLetter Widget /- -->
				<div class="section-padding"></div>
				
				
			</div>
		</div><!-- Container /- -->	
		
		<!-- Container -->
		<div class="container">
			<div class="footer-menu">
				<!-- Copyrights -->
			<div class="copyrights ow-pull-left">
					<p>&copy; <?php echo date("Y"); ?> | All rights reserved by <b>STARTUP AMARAVATHI</b></p>
				</div>
				<!-- Copyrights /- -->
				<!-- Navigation 
				<nav class="navbar ow-navigation ow-pull-right">
					<div class="navbar-header">
						<button aria-controls="navbar" aria-expanded="false" data-target="#navbar2" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="navbar-collapse collapse" id="navbar2">
						<ul class="nav navbar-nav">
							<li><a title="Home" href="index.html">Home</a></li>
							<li><a title="About Us" href="about-page.html">About Us</a></li>
							<li><a title="Services" href="services-page.html">Services</a></li>
							<li><a title="Latest News" href="blog-page.html">Latest News</a></li>
							<li><a title="Contact Us" href="contactus.html">Contact Us</a></li>
						</ul>
					</div>
				</nav>--><!-- Navigation /- -->
			</div><!-- Footer Menu /- -->
		</div><!-- Container /- -->
	</footer><!-- Footer Main /- -->
	
	<!-- JQuery v1.11.3 -->
	<script src="js/jquery.min.js"></script>
	
	<!-- Library - Js -->
	<script src="libraries/lib.js"></script><!-- Bootstrap JS File v3.3.5 -->
	<script src="libraries/jquery.countdown.min.js"></script>
	
	<script src="libraries/lightslider-master/lightslider.js"></script>
	<!-- Library - Google Map API -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCn3Z6i1AYolP3Y2SGis5qhbhRwmxxo1wU"></script>
	<script src="js/functions.js"></script>
</body>
</html>
