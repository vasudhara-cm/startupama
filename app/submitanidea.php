<?php 

session_start();
if(!isset($_SESSION['counterVal'])){
header("location:index.php");	
}

?>
<?php 
//session_start();

include 'connection.php';
$id=mysql_query("select submitted_ideas.date,submitted_ideas.count from submitted_ideas where id=(select max(id) from submitted_ideas)");
while($user=mysql_fetch_array($id)){
$_SESSION["regi_date"]=$user['date'];
$_SESSION["count"]=$user['count'];
}
?>

<?php

if(count($_POST)){


$_SESSION['firstname']=$_POST["firstname"];
$_SESSION['lastname']=$_POST["lastname"];
$_SESSION['email']=$_POST["email"];
$_SESSION['mobile']=$_POST["mobile"];
$_SESSION['idea_name']=$_POST["idea_name"];
$_SESSION['q1']=$_POST["q1"];
$_SESSION['q2']=$_POST["q2"];
$_SESSION['q3']=$_POST["q3"];
$_SESSION['q4']=$_POST["q4"];
$_SESSION['status']=$_POST["status"];
$_SESSION['category']=$_POST["category"];
$_SESSION['otp']=rand(100001,999999);

$regi_date=date("Y-m-d");

if($regi_date==$_SESSION["regi_date"]){
	 
	 $app_count=$_SESSION["count"]+1;
	  $ideaid="APASTART".date("dmy").$app_count;
 }
 else{

	 $app_count=1;	 
	  $ideaid="APASTART".date("dmy").$app_count;
 }
 
 $_SESSION["countnew"]=$app_count;
 $_SESSION["regi_date"]=$regi_date;
 $_SESSION["idea_id"]=$ideaid;
 
 
$sendotp = "<html>
<head>
<title>Start up Amaravathi </title>
</head>
<body><p>Your OTP for idea name $_SESSION[idea_name] is $_SESSION[otp]</p></body>
</html> ";
$uemail=$_SESSION['email'];

//echo $sendotp;



///$to = "somebody@example.com, somebodyelse@example.com";
$subject = "OTP for Idea Submission - Amaravathi-Startup";


// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <startupamaravathi123@gmail.com>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($uemail,$subject,$sendotp,$headers);



header("location:ideasuccess.php");

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
	<title>Submit An Idea | Start Up Amaravathi</title>

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
<script>
function myFunction()
{
var fname=document.getElementById('firstname').value;
if(fname==""){
	document.getElementById('fnameerr').innerHTML="please enter Your First Name";
	return false;
}
if(fname!=="")
{
document.getElementById('fnameerr').innerHTML="";

}

var lname=document.getElementById('lastname').value;
if(lname==""){
	document.getElementById('lnameerr').innerHTML="please enter Your Last Name";
	return false;
}
if(lname!=="")
{
document.getElementById('lnameerr').innerHTML="";

}
var mobile=document.getElementById('mobile').value;
if(mobile==""){
	document.getElementById('mobileerr').innerHTML="please enter Your Mobile Number";
	return false;
}
else if(!mobile.match(/^[0-9]{10}$/)){
document.getElementById('mobileerr').innerHTML="Please enter a Valid Mobile Number";
return false;
}
if(mobile!=="" && mobile.match(/^[0-9]{10}$/))
{
document.getElementById('mobileerr').innerHTML="";
}
var email=document.getElementById('emailu').value;
if(!email.match(/^([a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$)/)){
	document.getElementById('emailerr').innerHTML="Please enter a Valid Email Id";
	return false;
}
if(email.match(/^([a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$)/)){
	document.getElementById('emailerr').innerHTML="";
}
var idea=document.getElementById('idea_name').value;
if(idea==""){
	document.getElementById('ideaerr').innerHTML="please enter Your Idea Name";
	return false;
}
if(idea!=="")
{
document.getElementById('ideaerr').innerHTML="";

}
var q1=document.getElementById('q1').value;
if(q1==""){
	document.getElementById('q1err').innerHTML="Plese Provide Your Idea Details";
	return false;
}
if(q1!=="")
{
document.getElementById('q1err').innerHTML="";
}
var q2=document.getElementById('q2').value;
if(q2==""){
	document.getElementById('q2err').innerHTML="Plese Provide Your Idea Details";
	return false;
}
if(q2!=="")
{
document.getElementById('q2err').innerHTML="";
}
var q3=document.getElementById('q3').value;
if(q3==""){
	document.getElementById('q3err').innerHTML="Plese Provide Your Idea Details";
	return false;
}
if(q3!=="")
{
document.getElementById('q3err').innerHTML="";
}
var q4=document.getElementById('q4').value;
if(q4==""){
	document.getElementById('q4err').innerHTML="Plese Provide Your Idea Details";
	return false;
}
if(q4!=="")
{
document.getElementById('q4err').innerHTML="";
}

}
</script>
	
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
	</header><!-- Header /- -->	

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
				
					<div class="col-md-12 col-sm-12 col-xs-12">
						<h3 style="text-align:center">Submit An Idea</h3>
					<form method="post"  action="" name="f1" onsubmit="return myFunction();">
	

    <div class="col-md-6 col-sm-6 col-xs-12">
						
	<div class="form-group">
      <label for="pwd">First Name:</label>
      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name">
    </div>
						
	<span id="fnameerr" style="color:red"></span>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
	
	    <div class="form-group">
      <label for="pwd">Last Name:</label>
      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name">
    </div>
	<span id="lnameerr" style="color:red"></span>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
	
		    <div class="form-group">
      <label for="pwd">Mobile:</label>
      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number">
    </div>
	<span id="mobileerr" style="color:red"></span>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
	
		    <div class="form-group">
      <label for="pwd">Email Address:</label>
      <input type="text" class="form-control" id="emailu" name="email" placeholder="Enter Email Address">
    </div>
	<span id="emailerr" style="color:red"></span>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
	
		    <div class="form-group">
      <label for="pwd">Title of the Idea:</label>
      <input type="text" class="form-control" id="idea_name" name="idea_name" placeholder="Enter Title Of Idea">
    </div>
	<span id="ideaerr" style="color:red"></span>
	
	</div>
	<div class="col-md-6 col-sm-12 col-xs-12">
	
	<div class="form-group">
  <label for="comment">What is your Idea?</label>
  <textarea class="form-control" rows="6" id="q1" name="q1"></textarea>
</div>
	<span id="q1err" style="color:red"></span>
	</div>
	<div class="col-md-6 col-sm-12 col-xs-12">
	
	<div class="form-group">
  <label for="comment">What problem will your Idea solve?</label>
  <textarea class="form-control" rows="6" id="q2" name="q2"></textarea>
</div>
	<span id="q2err" style="color:red"></span>
	
	</div>
	<div class="col-md-6 col-sm-12 col-xs-12">
	
	<div class="form-group">
  <label for="comment">What are unique features about your Idea?</label>
  <textarea class="form-control" rows="6" id="q3" name="q3"></textarea>
</div>
	<span id="q3err" style="color:red"></span>
	
	</div>
	<div class="col-md-6 col-sm-12 col-xs-12">
	
	<div class="form-group">
  <label for="comment">How can your Idea better than existing solutions?</label>
  <textarea class="form-control" rows="6" id="q4" name="q4"></textarea>
</div>
<span id="q4err" style="color:red"></span>
</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
	
		<div class="form-group">

	 <label for="status">Current Status of the Idea</label>
    
	 <div class="radio">
	 
      <label><input type="radio" name="status" id="status" value="Just an Idea" checked>Just an Idea</label>
    </div>
    <div class="radio">
      <label><input type="radio" name="status" id="status" value="Prototype">Prototype</label>
    </div>
	 <div class="radio">
      <label><input type="radio" name="status" id="status" value="Validated in Market">Validated in Market</label>
    </div>
	 <div class="radio">
      <label><input type="radio" name="status" id="status" value="Existing Business with Revenue">Existing Business with Revenue</label>
    </div>
	</div>
	<span id="statuserr" style="color:red"></span>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
	
	
	<div class="form-group">

	 <label for="email">Select the Category of the Idea</label>
    
	 <div class="radio">
	 
      <label><input type="radio" name="category" id="category" value="E-Commerce" checked>E-Commerce</label>
    </div>
    <div class="radio">
      <label><input type="radio" name="category" id="category"  value="Marketing">Marketing</label>
    </div>
	 
	</div>
	
	<span id="categoryerr" style="color:red"><br></span>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="form-group">
						
    <input type="submit"  value="Submit" disabled/>
	</div></div>
  </form>
  	

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
				</nav> --><!-- Navigation /- -->
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