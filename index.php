<?php
	session_start();
?>
<!DOCTYPE html>
<html lang = "en">
	<head>
	
		<meta property="og:title" content="Rural Education" />
		<meta property="og:description" content="Notes and study material for state board and NEET students." />
		<meta property="og:image" content="assets/img/RuralEducationLogo.PNG" />
		
		<meta name="description" content="Rural Education.">
		<meta name="keywords" content="Study materials, NEET, Tamil Nadu,State Board,Rural Education,Notes,Online Education">
		<meta name="author" content="Ashwin Dev">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		
		
		<title>
			Rural Education
		</title>
		
		<link rel = "icon" href ="assets/img/RuralEducationLogo.PNG" type = "image/x-icon">
		
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/all.min.css">
		
		<link rel="stylesheet" href="assets/css/bootstrap-social.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/index.css">
		<link rel="stylesheet" href="assets/css/dropdown.css">
	</head>
	<body>

		<!--Header-->
		<header>
			<div class="container">
			<nav class="navbar navbar-dark navbar-expand-sm fixed-top">
				<div class="container">

					<!--Logo-->
					<a class="navbar-brand mr-auto" href="#"><img src="assets/img/RuralEducationLogo.png" height="30" width="61"></a>


					<!--Nav-->
					<div class="collapse navbar-collapse" id="Navbar">
						<ul class="navbar-nav ml-auto">  
							<li class="nav-item active"><a class="nav-link" href="#"><span class="fa fa-home fa-lg"></span> Home</a></li>
							<li class="nav-item"><a class="nav-link" href="./aboutus.html"><span class="fa fa-info fa-lg"></span> About Us</a></li>
							<li class="nav-item"><a class="nav-link" href="./contactus.php"><span class="fa fa-address-card fa-lg"></span> Contact Us</a></li>
							<li class="nav-item"><a class="nav-link" href="./DiscussionForum.php"><span class="fas fa-comments fa-lg"></span>Discussion Forums</a></li>
							<div class="dropdown">
									<a class="nav-item"><a class="nav-link">
										<?php
											if( isset($_SESSION['user_id']) && strlen($_SESSION['user_id'])>0 ){
												echo "<i class='fa fa-user' aria-hidden='true'></i>".$_SESSION['username'];
											}
											else{
												echo "<i class='fa fa-user' aria-hidden='true'></i>"."My Account";
											}
										?>
										
									  <i class="fa fa-caret-down"></i>
									</a>
									<div class="dropdown-content dropdown-menu">
										<?php
											if(!isset($_SESSION['user_id']) || strlen($_SESSION['user_id']) <1 ){
												echo "
												<li class='nav-item '><a class='mydropdownitem' href='SignUp.php'>Sign Up</a></li>
												<li class='nav-item '><a class='mydropdownitem' href='Login.php'>Log In</a></li>
												";
											}
										?>
										<li class="nav-item"><a class="mydropdownitem" href="./aboutus.html"> About Us</a></li>
										<li class="nav-item"><a class="mydropdownitem" href="./contactus.php"> Contact Us</a></li>
										<li class="nav-item"><a class="mydropdownitem" href="./logout.php">Log Out</a></li>
										
									</div>
								</div>
						</ul>
						
					</div>

					<!--toggle button-->
					<button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#Navbar">
						<span class="navbar-toggler-icon"></span>
					</button>
				</div>
				
			</nav>
			</div>
		</header>
		<div class="col-xs-12 col-md-12 d-none d-md-block" style="margin-top:10px;" >
			<div id="mycarousel" class="carousel slide " data-ride="carousel" >
				<div class="carousel-inner" role="listbox">
				
					<div class="carousel-item active">
						<img class="d-block img-fluid"
							src="assets/img/EducationAlone2.jpg" alt="Education" width="100%" height="100%">
						<div class="carousel-caption d-none d-md-block">
							<h2 style="color:white;font-size:50px;"> Rural Education </h2>
							<p class="d-none d-sm-block" style="color:white;font-size:32px;">Developing educational facilities in rural areas can be made easily through this website.</p>
						</div>
					</div>
					
					<div class="carousel-item">
						<img class="d-block img-fluid"
						src="assets/img/bookopen.jpg" alt="Books" width="100%" height="100%">
						<div class="carousel-caption d-none d-md-block">
							<h2 style="color:white;font-size:50px;">Books </h2>
							<p class="d-none d-sm-block" style="color:white;font-size:32px;">Study materials for stateboard and NEET is available along with model question papers.</p>
						</div>
					</div>
					
					
					<div class="carousel-item">
						<img class="d-block img-fluid"
						src="assets/img/pencils.jpg" alt="RuralEducation" width="100%">
						<div class="carousel-caption d-none d-md-block">
							<h2 style="color:white;font-size:50px;">Education</h2>
							
							<p class="d-none d-sm-block" style="color:white;font-size:32px;">Free study material for everyone.
							</p>
						</div>
					</div>
					
					
					
				</div>
				<ol class="carousel-indicators">
					<li data-target="#mycarousel" data-slide-to="0" class="active"></li>
					<li data-target="#mycarousel" data-slide-to="1"></li>
					<li data-target="#mycarousel" data-slide-to="2"></li>
				</ol>
				<a class="carousel-control-prev" href="#mycarousel" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon"></span>
				</a>
				<a class="carousel-control-next" href="#mycarousel" role="button" data-slide="next">
					<span class="carousel-control-next-icon"></span>
				</a>
				
					<button class="btn btn-danger btn-sm" id="carouselButton">
					<span id="carousel-button-icon" class="fa fa-pause"></span>
				</button>
				
			</div>
		</div>
		<!--Main-->
		<div class="container mainbody">
			
			<div class="row getstarted">
				<div class="col-sm-8 offset-sm-2 ">
					<a href="./Board.php">
						<div class="card " >
							
							<div class="card-body">
								<h5 class="card-title" style="font-size: 35px;">Get Started</h5>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
		
			
  
		<!--Footer-->
		<footer class="footer">
			<div class="container">
				<div class="row">             
					<div class="col-12 offset-1 col-sm-2">
						<h5>Links</h5>
						<ul class="list-unstyled">
							<li><a href="#">Home</a></li>
							<li><a href="./AboutUs.html">About Us</a></li>
							<li><a href="./ContactUs.php">Contact Us</a></li>
						</ul>
					</div>
					
					<div class="col-12 col-sm-4 align-self-center">
						<div class="text-center">
							<a class="btn btn-social-icon btn-linkedin" href="https://www.linkedin.com/in/ashwindev14/" target="_blank"><i class="fa fa-linkedin"></i></a>
							<a class="btn btn-social-icon" href="mailto:"><i class="fa fa-envelope-o"></i></a>
							<a class="btn btn-social-icon" href="tel:"><i class="fa fa-phone fa-lg" aria-hidden="true" style="font-size:40px;"></i></a>
							<a href="whatsapp://send?abid=phonenumber&text=Hello%2C%20World!" style="color: #25d366;"><i class="fa fa-whatsapp green-color " aria-hidden="true" style="font-size:40px"></i></a>
						</div>
					</div>
				</div>
			</div>
		</footer>
		
		
		
		
		
		
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/carousel.js"></script>
	</body>
</html>