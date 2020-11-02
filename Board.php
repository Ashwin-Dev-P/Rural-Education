<?php
	session_start();
?>
<!DOCTYPE html>
<html lang = "en">
	<head>
	
		<meta property="og:title" content="Rural Education" />
		<meta property="og:description" content="Notes and study material for state board and NEET students." />
		<meta property="og:image" content="assets/img/RuralEducationLogo.PNG" />
		<meta charset="UTF-8">
		
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
		<link rel="stylesheet" href="assets/css/board.css">
		<link rel="stylesheet" href="assets/css/dropdown.css">
	</head>
	<body>

		<!-- Header -->
		<header>
			<div class="container">
				<nav class="navbar navbar-dark navbar-expand-sm fixed-top navbar-text">
					<div class="container">

						<!--Logo-->
						<a class="navbar-brand mr-auto" href="./index.php"><img src="assets/img/RuralEducationLogo.png" height="30" width="61"></a>


						<!--NavBar-->
						<div class="collapse navbar-collapse" id="Navbar">
							<ul class="navbar-nav  ml-auto">  
								<li class="nav-item active"><a class="nav-link" href="./index.php"><span class="fa fa-home fa-lg"></span> Home</a></li>
								<li class="nav-item"><a class="nav-link" href="./DiscussionForum.php"><span class="fas fa-comments fa-lg"></span>Discussion Forums</a></li>
								
		
								<div class="dropdown">
									<a class="nav-item"><a class="nav-link">
										<?php
											if( isset($_SESSION['username']) && strlen($_SESSION['username'])>0 ){
												echo $_SESSION['username'];
											}
											else{
												echo "My Account";
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
						
						<button class="navbar-toggler btn-sm" type="button" data-toggle="collapse" data-target="#Navbar">
							<span class="navbar-toggler-icon"></span>
						</button>

					</div>
					
					

					
					
				</nav>
			</div>
		</header>
		
  
   

		<!-- Main body -->
		<div class="container mainbody">


			<!-- Bread crumbs-->
			<div class="row row-container mybreadcrumbs"> 
				<div class="col-12">
					<ol class="col-12 breadcrumb">
						<li class="breadcrumb-item"><a href="./index.php">Home</a></li>
						<li class="breadcrumb-item active">Board</li>
					</ol>
				</div>
			</div>





			<!--Board selection-->
			<div class="row boarddiv">
				<div class="col-sm-6 divhover">
					<a href="Stateboard.html">
						<div class="card " >
							<img class="card-img-top" src="assets/img/StateBoardIcon2.png" alt="State Board" height="50px" width="50px">
							<div class="card-body">
								<h5 class="card-title">State Board</h5>
							</div>
						</div>
					</a>
				</div>
					



				<div class="col-sm-6 divhover">
					<a href="NEET.html">
						<div class="card " >
							<img class="card-img-top" src="assets/img/NEETIcon.jpg" alt="NEET" height="50px" width="50px">
							<div class="card-body">
								<h5 class="card-title">NEET Preparation</h5>
							</div>
						</div>
					</a>
				</div>
				
				<div class="col-sm-6 divhover">
					<a href="JEE.html">
						<div class="card " >
							<img class="card-img-top" src="assets/img/JEEIcon.png" alt="JEE" height="50px" width="50px">
							<div class="card-body">
								<h5 class="card-title">JEE Preparation</h5>
							</div>
						</div>
					</a>
				</div>
				
				<div class="col-sm-6 divhover">
					<a href="Stateboard.html">
						<div class="card " >
							<img class="card-img-top" src="assets/img/job2.jpg" alt="job" height="50px" width="50px">
							<div class="card-body">
								<h5 class="card-title">Job Opportunities</h5>
							</div>
						</div>
					</a>
				</div>
				
				<div class="col-sm-6 divhover">
					<a href="EducationalYoutubeChannels.html">
						<div class="card " >
							<img class="card-img-top" src="assets/img/YouTubeIcon.png" alt="job" height="50px" width="50px">
							<div class="card-body">
								<h5 class="card-title">Educational Youtube Channels</h5>
							</div>
						</div>
					</a>
				</div>
				
				<div class="col-sm-6 divhover">
					<a href="OtherEducationalSites.html">
						<div class="card " >
							<img class="card-img-top" src="assets/img/OtherEducationalSites.png" alt="job" height="50px" width="50px">
							<div class="card-body">
								<h5 class="card-title">Other Educational sites</h5>
							</div>
						</div>
					</a>
				</div>
					



				

			</div>


		</div>
		
			
  
		<!-- Footer -->
		<footer class="footer">
			<div class="container">
				<div class="row">  

					<!--Navigation-->
					<div class="col-12 offset-1 col-sm-2">
						<h5>Links</h5>
						<ul class="list-unstyled">
							<li><a href="./index.php">Home</a></li>
							<li><a href="./AboutUs.html">About Us</a></li>
							<li><a href="./ContactUs.php">Contact Us</a></li>
							
						</ul>
					</div>
					

					<!--Social Media-->
					<div class="col-12 col-sm-4 align-self-center">
						<div class="text-center">
							
							<a class="btn btn-social-icon btn-linkedin" href="https://www.linkedin.com/in/ashwindev14/" target="_blank"><i class="fa fa-linkedin"></i></a>
							
							<a class="btn btn-social-icon" href="mailto:ashwindev1462001@gmail.com"><i class="fa fa-envelope-o"></i></a>
							<a class="btn btn-social-icon" href="tel:805-615-0426"><i class="fa fa-phone fa-lg" aria-hidden="true" style="font-size:40px;"></i></a>
							<a href="whatsapp://send?abid=phonenumber&text=Hello%2C%20World!" style="color: #25d366;"><i class="fa fa-whatsapp green-color " aria-hidden="true" style="font-size:40px"></i></a>
						</div>
					</div>
				</div>
			</div>
		</footer>
		
		
		
		
		
		
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<!--<script src="assets/js/dropdown.js"></script>-->
	</body>
</html>