<?php
	session_start();
	if(!isset($_SESSION['fullname'])){
		$_SESSION['fullname'] = "";
	}
	if(!isset($_SESSION['username'])){
		$_SESSION['username'] = "";
	}
	if(!isset($_SESSION['password'])){
		$_SESSION['password'] = "";
	}
	if(!isset($_SESSION['passwordconfirmation'])){
		$_SESSION['passwordconfirmation'] = "";
	}
	if(!isset($_SESSION['emailid'])){
		$_SESSION['emailid'] = "";
	}
	if(!isset($_SESSION['number'])){
		$_SESSION['number'] = "";
	}

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
		<link rel="stylesheet" href="assets/css/DiscussionForum.css">
		
		
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/modal.js"></script>
	</head>
	<body>
		
		
		
		<!-- Login  Modal-->
		<div id="loginModal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg" role="content">
				<!-- Modal content-->
				<div class="modal-content">
					
					<div class="modal-header">
							<h4 class="myModalLabel" >LOGIN </h4>
						
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						
					</div>
					<div class="modal-body">
						<div class="row container">	
			   
								<!--Sign In Form-->
								<div class="col-12 ">
									<form method="post" id="FeedBackForm" name="FeedBackForm" >
										
										<div class="container">
										<div class="form-group row ">
											<label for="name" class="col-md-2 col-form-label">User Name</label>
											<div class="col-md-10">
												<input type="text" class="form-control" id="username" name="username" placeholder="Name" value="<?=$_SESSION['username']?>">
											</div>
										</div>
										
										
										<div class="form-group row">
											<label for="name" class="col-md-2 col-form-label">Password</label>
											<div class="col-md-10">
												<input type="password" class="form-control" id="username" name="username" placeholder="password" value="<?=$_SESSION['password']?>">
											</div>
										</div>
										
										
										
										<div class="form-group row-container">
											<div style="float:left;">
											<div class="col-xs-6 ">
												<button type="button" class="btn btn-secondary" name="cancel" id="cancel" data-dismiss="modal">Cancel</button>
											</div>
											</div>
											
											<div class="ml-auto">
											<div class="col-xs-6 ">
												<button type="submit" class="btn btn-primary " name="login" id="login" style="float:right;" >Login</button>
											</div>
											</div>
											
										</div>
										</div>
										

									</form>
								</div>
								
								
							
						</div>
					</div>
					
				</div>
			</div>
		</div><!--Modal closing-->
		
		
		
		<?php
			if(isset($_POST['post'])){
				$_POST['DiscussionTextArea'] = trim($_POST['DiscussionTextArea'],' ');
				
				
					if( isset($_POST['DiscussionTextArea']) && strlen($_POST['DiscussionTextArea']) > 0 ){
						
						if( strlen($_SESSION['username']) < 1){
							//echo "<script>togglelogin();</script>";
							echo strlen($_POST['DiscussionTextArea']);
						}
						else{
							$_SESSION['success'] = "Discussion posted.";
						}
					}
					else{
						
						$_SESSION['error'] = "Type your topic of dicussion.";
					}
				
			}
			
			
			
		?>
		<!-- Header -->
		<header>
			<div class="container">
				<nav class="navbar navbar-dark navbar-expand-sm fixed-top navbar-text">
					<div class="container">

						<!--Logo-->
						<a class="navbar-brand mr-auto" href="./index.html"><img src="assets/img/RuralEducationLogo.png" height="30" width="61"></a>


						<!--NavBar-->
						<div class="collapse navbar-collapse" id="Navbar">
							<ul class="navbar-nav  ml-auto">  
								<li class="nav-item active"><a class="nav-link" href="./index.html"><span class="fa fa-home fa-lg"></span> Home</a></li>
								<li class="nav-item"><a class="nav-link" href="./aboutus.html"><span class="fa fa-info fa-lg"></span> About Us</a></li>
								<li class="nav-item"><a class="nav-link" href="./contactus.php"><span class="fa fa-address-card fa-lg"></span> Contact Us</a></li>
								<?php
									if( strlen($_SESSION['username']) < 1 ){
										echo "<li class='nav-item'><a   class='nav-link' onclick='togglelogin();'><span class='fa fa-sign-in fa-lg'></span> Log In</a></li>";
									}
									else{
										echo "<li class='nav-item'><a   class='nav-link' href='#'>".$_SESSION['username']."</a></li>";
									}
								?>
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
						<li class="breadcrumb-item"><a href="./index.html">Home</a></li>
						<li class="breadcrumb-item active">Discussion Forum</li>
					</ol>
				</div>
			</div>
			
			<div class="card">
			<div class="col-12">
			  <h3>Create a discussion</h3>
			</div>
			
			<!--Discussion Form-->
			<div class="col-12">
				<form method="post" id="DiscussionForm" name="DiscussionForm" >
					
					
					
					
					
					<div class="form-group row ">
						<label for="DiscussionTextArea" class="col-12 col-form-label">Your Discussion or Doubts</label>
						<div class="col-12">
							<textarea class="form-control" id="DiscussionTextArea" name="DiscussionTextArea" rows="6" ></textarea>
						</div>
					</div>
					<div class="form-group row ">
						<div class="col-12 ">
							<button type="submit" class="btn btn-primary" name="post" id="post" style="float:right;" >POST</button>
						</div>
					</div>
					
					<input type="date" value="<?php echo date('Y-m-d');?>" name="Date" id="creationdate" hidden>
					<input type="time" id="creationtime" name="Time" value="<?php echo date('h:i:s');?>"  hidden>
					<input type="text" name="Meridiem" id="ampm" value="<?php echo date('A');?>" hidden>
					
				</form>
			</div>
			</div>

			


		</div>
		<!--Board selection-->
			
				
					
				
			
			
  
		<!-- Footer -->
		<footer class="footer">
			<div class="container">
				<div class="row">  

					<!--Navigation-->
					<div class="col-12 offset-1 col-sm-2">
						<h5>Links</h5>
						<ul class="list-unstyled">
							<li><a href="./index.html">Home</a></li>
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
		
		
		
		
		
		
		<script src="assets/js/popper.min.js"></script>
		
		
		
	</body>
</html>