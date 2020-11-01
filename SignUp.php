<?php
	session_start();
	require_once "pdo.php";
	if(   isset($_POST["fullname"]) && isset($_POST["username"]) && isset($_POST["password"])  &&isset($_POST["passwordconfirmation"])   ){
		$password = $_POST["password"];
		$email = $_POST["email"];
		
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);
		$specialChars = preg_match('@[^\w]@', $password);
	
		if( strlen($_POST["fullname"]) < 1){
			$_SESSION["error"] = "Full name is required.";
			if(strlen($_POST["username"]) > 0){
				$_SESSION["username"]= $_POST["username"];
			}
			if(strlen($_POST["password"]) > 0){
				$_SESSION["password"]= $_POST["passwordconfirmation"];
			}
			if(strlen($_POST["passwordconfirmation"]) > 0){
				$_SESSION["passwordconfirmation"]= $_POST["passwordconfirmation"];
			}
			if(strlen($_POST["email"]) > 0){
				$_SESSION["email"]= $_POST["email"];
			}
			if(strlen($_POST["number"]) > 0){
				$_SESSION["number"]= $_POST["number"];
			}
		}
		else if(  strlen($_POST["username"]) < 1){
			$_SESSION["error"] = "User name is required";
		
			$_SESSION["fullname"]= $_POST["fullname"];
			if(strlen($_POST["password"]) > 0){
				$_SESSION["password"]= $_POST["passwordconfirmation"];
			}
			if(strlen($_POST["passwordconfirmation"]) > 0){
				$_SESSION["passwordconfirmation"]= $_POST["passwordconfirmation"];
			}
			if(strlen($_POST["email"]) > 0){
				$_SESSION["email"]= $_POST["email"];
			}
			if(strlen($_POST["number"]) > 0){
				$_SESSION["number"]= $_POST["number"];
			}
		}
		else if( strlen($_POST["password"]) < 1){
			$_SESSION["error"] = "password is required";
		
			$_SESSION["fullname"]= $_POST["fullname"];
			$_SESSION["username"]= $_POST["username"];
			if(strlen($_POST["passwordconfirmation"]) > 0){
				$_SESSION["passwordconfirmation"]= $_POST["passwordconfirmation"];
			}
			if(strlen($_POST["email"]) > 0){
				$_SESSION["email"]= $_POST["email"];
			}
			if(strlen($_POST["number"]) > 0){
				$_SESSION["number"]= $_POST["number"];
			}
		}
		else if(  strlen($_POST["passwordconfirmation"]) < 1){
			$_SESSION["error"] = "password confirmation is required";
		
			$_SESSION["username"]= $_POST["username"];
			$_SESSION["password"]= $_POST["password"];
			$_SESSION["fullname"]= $_POST["fullname"];
			if(strlen($_POST["email"]) > 0){
				$_SESSION["email"]= $_POST["email"];
			}
			if(strlen($_POST["number"]) > 0){
				$_SESSION["number"]= $_POST["number"];
			}
		}
		else if( $_POST["password"] !== $_POST["passwordconfirmation"]  ){
			$_SESSION["error"] = "Both the passwords does not match.";
		
			$_SESSION["username"]= $_POST["username"];
			$_SESSION["password"]= $_POST["password"];
			$_SESSION["passwordconfirmation"]= $_POST["passwordconfirmation"];
			$_SESSION["fullname"]= $_POST["fullname"];
			if(strlen($_POST["email"]) > 0){
				$_SESSION["email"]= $_POST["email"];
			}
			if(strlen($_POST["number"]) > 0){
				$_SESSION["number"]= $_POST["number"];
			}
		}
		else if( strlen($_POST["password"]) < 8 ){
			$_SESSION["error"] ='Password should include at least one upper case letter, one number, and one special character.';
			$_SESSION["username"]= $_POST["username"];
			$_SESSION["password"]= $_POST["password"];
			$_SESSION["passwordconfirmation"]= $_POST["passwordconfirmation"];
			$_SESSION["fullname"]= $_POST["fullname"];
			if(strlen($_POST["email"]) > 0){
				$_SESSION["email"]= $_POST["email"];
			}
			if(strlen($_POST["number"]) > 0){
				$_SESSION["number"]= $_POST["number"];
			}
		}
		else if(!$uppercase || !$lowercase || !$number || !$specialChars ) {
			$_SESSION["error"] ='Password should include at least one upper case letter, one number, and one special character.';
			$_SESSION["username"]= $_POST["username"];
			$_SESSION["password"]= $_POST["password"];
			$_SESSION["passwordconfirmation"]= $_POST["passwordconfirmation"];
			$_SESSION["fullname"]= $_POST["fullname"];
			if(strlen($_POST["email"]) > 0){
				$_SESSION["email"]= $_POST["email"];
			}
			if(strlen($_POST["number"]) > 0){
				$_SESSION["number"]= $_POST["number"];
			}
		}
		else if ( strlen($_POST["email"]) >= 1 and !filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$_SESSION["error"] = "Invalid email format";
			$_SESSION["username"]= $_POST["username"];
			$_SESSION["password"]= $_POST["password"];
			$_SESSION["passwordconfirmation"]= $_POST["passwordconfirmation"];
			$_SESSION["fullname"]= $_POST["fullname"];
			$_SESSION["email"]= $_POST["email"];
			if(strlen($_POST["number"]) > 0){
				$_SESSION["number"]= $_POST["number"];
			}
		}
		else if( strlen($_POST["number"]) > 0 && strlen($_POST["number"]) != 10 ){
			$_SESSION["error"] = "Enter a valid number.";
			$_SESSION["username"]= $_POST["username"];
			$_SESSION["password"]= $_POST["password"];
			$_SESSION["passwordconfirmation"]= $_POST["passwordconfirmation"];
			$_SESSION["fullname"]= $_POST["fullname"];
			$_SESSION["email"]= $_POST["email"];
			$_SESSION["number"]= $_POST["number"];
		}
		else{
			$_SESSION["username"]= $_POST["username"];
			$_SESSION["password"]= $_POST["password"];
			$_SESSION["passwordconfirmation"]= $_POST["passwordconfirmation"];
			$_SESSION["fullname"]= $_POST["fullname"];
			$_SESSION["email"]= $_POST["email"];
			$_SESSION["number"]= $_POST["number"];
			
			$stmt = $pdo->prepare("SELECT username FROM accounts WHERE username= :username");
			$stmt -> execute(array(":username" => $_POST['username']));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			if($row !== false){
				$_SESSION['error'] = 'User name '.'"'.$_POST["username"] .'"'.' has already been taken.Try another name.';
				header('Location: signup.php');
				return;
			
			}
			
		
		
			
			$salt = 'XyZzy12*_';
			$storage_password =  hash('md5', $salt.$_POST['password']);
			$sql = "INSERT INTO accounts (fullname,username, password, email,number,date,time,meridiem) VALUES (:fullname,:username ,:password, :email,:number,:creationdate,:creationtime,:meridiem)";
			
			$stmt = $pdo->prepare($sql);
			
			$stmt->execute(array(
			':fullname' => htmlentities($_POST['fullname']),
			':username' => htmlentities($_POST['username']),
			':password' => $storage_password,
			':email' => htmlentities($_POST['email']),
			':number' => htmlentities($_POST["number"]),
			':creationdate' => $_POST["creationdate"],
			':creationtime' => $_POST["creationtime"],
			':meridiem' => $_POST['meridiem']
			));
			
			$stmt = $pdo->query("SELECT fullname,username, password, email,number,date,time,meridiem FROM accounts");
			$_SESSION['rows']=$stmt->fetchAll(PDO::FETCH_ASSOC);
			$_SESSION["success"] = "Account created successfully.";
			
			$stmt2 = $pdo->prepare("SELECT username,user_id FROM accounts WHERE username= :username");
			$stmt2 -> execute(array(":username" => $_POST['username']));
			$row2 = $stmt->fetch(PDO::FETCH_ASSOC);
			$_SESSION['user_id'] = $row2['user_id'];
			$_SESSION['username'] = $row2['username'];
			
			
			
			header("Location: signup.php");
			return;
		
		}	
	}
	date_default_timezone_set('Asia/Kolkata');

	if(!isset($_SESSION['fullname'])){
		$_SESSION['fullname'] = "";
	}
	if(!isset($_SESSION['username'])){
		//$_SESSION['username'] = "";
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
		<link rel="stylesheet" href="assets/css/board.css">
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
						<a class="navbar-brand mr-auto" href="./index.html"><img src="assets/img/RuralEducationLogo.png" height="30" width="61"></a>


						<!--NavBar-->
						<div class="collapse navbar-collapse" id="Navbar">
							<ul class="navbar-nav  ml-auto">  
								<li class="nav-item active"><a class="nav-link" href="./index.html"><span class="fa fa-home fa-lg"></span> Home</a></li>
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
						<li class="breadcrumb-item"><a href="./index.html">Home</a></li>
						<li class="breadcrumb-item active">Sign Up</li>
					</ol>
				</div>
			</div>

			
			<!--Board selection-->
			<div class="row boarddiv justify-content-center">
				<div class="row container  justify-content-center">	
			   
					<!--Sign In Form-->
					<div class="col-12 border">
						<div class="col-12 justify-content-center ">
							<p style="text-align:center;font-weight:700;font-size:55px;color:#512DA8;">SIGN UP</p>
						</div>
						<form method="post" id="signupform" name="signupform" >
							<div class="form-group row">
								<label for="fullname" class="col-md-2 col-form-label">Full Name</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" value="<?=$_SESSION['fullname']?>">
								</div>
							</div>
							
							<div class="form-group row ">
								<label for="username" class="col-md-2 col-form-label">User Name</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="username" name="username" placeholder="User Name" value="<?=$_SESSION['username']?>">
								</div>
							</div>
							
							<div class="form-group row">
								<label for="number" class="col-12 col-md-2 col-form-label">Mobile Number</label>
								<div class="col-12 col-md-10">
									<input type="tel" class="form-control" id="number" name="number" placeholder="Mobile Number  (optional)" value="<?=$_SESSION['number']?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="emailid" class="col-md-2 col-form-label">Email Id</label>
								<div class="col-md-10">
									<input type="email" class="form-control" id="email" name="email" placeholder="Email  (optional)" value="<?=$_SESSION['emailid']?>">
								</div>
							</div>
							
							<div class="form-group row">
								<label for="password" class="col-md-2 col-form-label">Password</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?=$_SESSION['password']?>">
								</div>
							</div>
							
							<div class="form-group row">
								<label for="passwordconfirmation" class="col-md-2 col-form-label">Password Confirmation</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="passwordconfirmation" name="passwordconfirmation" placeholder="Password Confirmation" value="<?=$_SESSION['passwordconfirmation']?>">
								</div>
							</div>
							
							<div class="form-group row ml-auto">
								<div class="offset-md-2 col-md-10 ">
									<button type="submit" class="btn mybutton " name="send" id="send" style="float:right;" >SIGN UP</button>
								</div>
							</div>
							
							<input type="date" value="<?php echo date('Y-m-d');?>" name="creationdate" id="creationdate" hidden>
						
							<input type="time" id="creationtime" name="creationtime" value="<?php echo date('h:i:s');?>"  hidden>
						
							<input type="text" name="meridiem" id="meridiem" value="<?php echo date('A');?>" hidden>
							
						</form>
					</div>
					
					<div class="col-12 border  justify-content-center">
						<p style="text-align:center;padding:30px;font-size:25px;" >Already have an account?<a href="login.php">LOG IN</a></p>
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