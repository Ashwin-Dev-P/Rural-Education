<?php
	session_start();
	require_once "pdo.php";
	$salt = 'XyZzy12*_';
	if (isset($_POST['username']) && isset($_POST['password'])) {
		if( strlen($_POST['password']) < 1 && strlen($_POST['username']) < 1 ){
			$_SESSION['error'] = "Username and Password is required";
			header("Location: login.php");
			return;
		}
		else if (strlen($_POST['username']) < 1 ) {
			$_SESSION["password"]= $_POST["password"];
			$_SESSION['error'] = "Username is required";
			header("Location: login.php");
			return;
		}
		else if( strlen($_POST['password']) < 1  ){
			$_SESSION["username"]= $_POST["username"];
			$_SESSION['error'] = "Password is required";
			header("Location: login.php");
			return;
		}
		else {
			//The username and password entered by the user will be stored in session even before validating them.
			//So that it can be displayed for them to correct even if it is wrong. 
			$_SESSION["username"]= $_POST["username"];
			$_SESSION["password"]= $_POST["password"];
			
			//For value
			$_SESSION["usernamevalue"]= $_POST["username"];
			$_SESSION["passwordvalue"]= $_POST["password"];
		
			$stmt = $pdo->prepare("SELECT username,password,user_id FROM accounts WHERE username= :username");
			$stmt -> execute(array(":username" => $_POST['username']));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
			if($row !== false){
			
				$RetrievedPasswordHash = $row["password"];
				$check = hash('md5', $salt.$_POST['password']);
				if ($check == $RetrievedPasswordHash) {
					$_SESSION['user_id'] = $row['user_id'];
					
					$_SESSION['loggedin'] = "true";
					error_log("Login success ".$_POST['username']);
					$_SESSION['username'] = htmlentities($_POST['username']);
					$_SESSION['success'] = "Logged In.";
					header("Location: index.php");
					return;
				} 
				else {
					$pass = $_POST['password'];
				
					$_SESSION['error'] = "Sorry, your password was incorrect. Please double-check your password.";
					error_log(" || Login fail || account name =".$_POST['username']." || Password="." $pass"." || ");
					header("Location: login.php");
					return;
				}
			}
			else{
				$_SESSION["error"] = "The username you entered doesn't belong to an account. Please check your username and try again.";
				header("Location: login.php");
				return;
			}
	}
	}
	
	if(!isset($_SESSION['username'])){
		$_SESSION['username'] = "";
	}
	if(!isset($_SESSION['password'])){
		$_SESSION['password'] = "";
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
		<link rel="stylesheet" href="assets/css/board.css">
		<style>
			body{
				background-color:#E9E7E9;
			}
			.myformdiv{
				background-color: #FFFFFF;
			}
		</style>
	</head>
	<body>
		<!--Modal-->
		<div id="loginModal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg" role="content">
				<!-- Modal content-->
				<div class="modal-content">
					
					<div class="modal-header">
							<h4 class="myModalLabel" >INFO</h4>
						
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						
					</div>
					<div class="modal-body">
						<div class="row container ">
							
								<div class="col-xs-12 col-md-12 ">
								<?php
									if( isset($_SESSION['error']) ){
										echo "<p style='color:red;font-size:25px;'>".$_SESSION['error']."</p>";
										//unset($_SESSION['error']);
									}
								?>
								</div>
								<div class="col-xs-12 col-md-12 ">	
								<?php
									if( isset($_SESSION['success']) ){
										echo "<p style='color:green;font-size:25px;'>".$_SESSION['success']."</p>";
										//unset($_SESSION['success']);
									}
								?>
								</div>
							
						</div>
						
					</div>
				</div>
			</div>
		</div>
		
		
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
								<li class="nav-item"><a class="nav-link" href="./aboutus.html"><span class="fa fa-info fa-lg"></span> About Us</a></li>
								<li class="nav-item"><a class="nav-link" href="./contactus.php"><span class="fa fa-address-card fa-lg"></span> Contact Us</a></li>
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
						<li class="breadcrumb-item active">Login</li>
					</ol>
				</div>
			</div>

			
			<!--Board selection-->
			<div class="row boarddiv justify-content-center">
				<div class="row container  justify-content-center">	
			   
					<!--Sign In Form-->
					<div class="col-12 col-md-8 border myformdiv">
						<div class="col-12 justify-content-center ">
							<p style="text-align:center;font-weight:700;font-size:55px;color:#512DA8;">LOGIN</p>
						</div>
						<form method="post" id="signupform" name="signupform" >
							
							
							<div class="form-group row ">
								<label for="username" class="col-md-2 col-form-label">User Name</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="username" name="username" placeholder="User Name"  value="<?=$_SESSION['username']?>">
								</div>
							</div>
							
							
							
							
							<div class="form-group row">
								<label for="password" class="col-md-2 col-form-label">Password</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?=$_SESSION['password']?>" >
								</div>
							</div>
							
							
							<div class="form-group row ml-auto">
								<div class="offset-md-2 col-md-10 ">
									<button type="submit" class="btn mybutton " name="send" id="send" style="float:right;" >Log In</button>
								</div>
							</div>
							
							
							
						</form>
					</div>
					
					<div class="col-12 col-md-8 border  justify-content-center myformdiv">
						<p style="text-align:center;padding:30px;font-size:25px;" >Don't have an account?<a href="SignUp.php">SIGN UP</a></p>
					</div>
					



				
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
		<script src="assets/js/modal.js"></script>
		<?php
			if( isset($_SESSION['error']) ){
				echo "
				<script>
					function toggle(){
						$('#loginModal').modal('show');
					}
					toggle() 
				</script>";
				unset($_SESSION['error']);
				
			}
			else if( isset($_SESSION['success']) ){
				echo "
				<script>
					function toggle(){
						$('#loginModal').modal('show');
					}
					toggle() 
				</script>";
				unset($_SESSION['success']);
			}
		?>	
	</body>
</html>