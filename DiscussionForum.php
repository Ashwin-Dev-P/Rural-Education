<?php
	ini_set('display_errors',1);
	ini_set('log_errors',1);
	ini_set('error_log',dirname(__FILE__).'/log.txt');
	error_reporting(E_ALL);
	session_start();
	require_once "pdo.php";
	$salt = 'XyZzy12*_';
	$stored_hash = 'ac7cc39c493be9ccbd7548984d90185e';

	

	//This if statement won't get executed on opening this webpage the first time.It runs when the login button is pressed.
	if (isset($_POST['username']) && isset($_POST['password'])) {
		if( strlen($_POST['password']) < 1 && strlen($_POST['username']) < 1 ){
			$_SESSION['error'] = "Username and Password is required";
			header("Location: DiscussionForum.php");
			return;
		}
		else if (strlen($_POST['username']) < 1 ) {
			$_SESSION["password"]= $_POST["password"];
			$_SESSION['error'] = "Username is required";
			header("Location: DiscussionForum.php");
			return;
		}
		else if( strlen($_POST['password']) < 1  ){
			$_SESSION["username"]= $_POST["username"];
			$_SESSION['error'] = "Password is required";
			header("Location: DiscussionForum.php");
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
					header("Location: DiscussionForum.php");
					return;
				} 
				else {
					$pass = $_POST['password'];
				
					$_SESSION['error'] = "Sorry, your password was incorrect. Please double-check your password.";
					error_log(" || Login fail || account name =".$_POST['username']." || Password="." $pass"." || ");
					header("Location: DiscussionForum.php");
					return;
				}
			}
			else{
				$_SESSION["error"] = "The username you entered doesn't belong to an account. Please check your username and try again.";
				header("Location: DiscussionForum.php");
				return;
			}
	}
	}
	
	if( isset($_POST['post']) && isset($_SESSION['user_id']) ){
		$_POST['DiscussionTextArea'] = trim($_POST['DiscussionTextArea'],' ');
		if( isset($_POST['topic']) && strlen($_POST['topic'])>0 ){
			$_SESSION['topic'] = $_POST['topic'];
			if( isset($_POST['DiscussionTextArea']) && strlen($_POST['DiscussionTextArea']) > 0 ){
				//unset($_SESSION['username']);
				
				if( isset($_SESSION['username']) || strlen($_SESSION['username']) >= 1){
					
					$sql = "INSERT INTO discussions (user_id,topic, discussion) VALUES (:user_id,:topic,:discussion)";
			
					$stmt = $pdo->prepare($sql);
					
					$stmt->execute(array(
						':user_id' => $_SESSION['user_id'],
						':topic' => $_POST['topic'],
						':discussion' => $_POST['DiscussionTextArea']
					
					));
					$_SESSION['success'] = "Discussion posted.";
				}
			}
			else{
				$_SESSION['error'] = "Type your dicussion.";
			}
		}
		else{
			
			if(isset($_POST['DiscussionTextArea']) && strlen($_POST['DiscussionTextArea']) > 0){
				$_SESSION['DiscussionTextArea'] = $_POST['DiscussionTextArea'];
			}
			$_SESSION['error'] = "Type your topic of dicussion.";
		}
	}
	else if(isset($_POST['post'])){
		if(isset($_POST['DiscussionTextArea']) && strlen($_POST['DiscussionTextArea']) > 0){
			$_SESSION['DiscussionTextArea'] = $_POST['DiscussionTextArea'];
		}
		if( isset($_POST['topic']) && strlen($_POST['topic'])>0 ){
			$_SESSION['topic'] = $_POST['topic'];
		}
		$_SESSION['error'] = "Log in to continue";
	}
	
	if(!isset($_SESSION['DiscussionTextArea'])){
		$_SESSION['DiscussionTextArea'] = "";
	}
	if(!isset($_SESSION['topic'])){
		$_SESSION['topic'] = "";
	}
	if(!isset($_SESSION['username'])){
		$_SESSION['username'] = "";
	}
	if(!isset($_SESSION['password'])){
		$_SESSION['password'] = "";
	}
	
	if(!isset($_SESSION['error'])  && !isset($_SESSION['success']) && (!isset($_SESSION['user_id']) || strlen($_SESSION['user_id'])<1)  ){
		$_SESSION['success'] = "Log in to post discussions";
	}
	else if(!isset($_SESSION['error'])  && !isset($_SESSION['success']) && (isset($_SESSION['user_id']) && strlen($_SESSION['user_id'])<1)  ){
		$_SESSION['success'] = "Welcome to discussion forum.";
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
		<link rel="stylesheet" href="assets/css/dropdown.css">
		
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/modal.js"></script>
		
		
	</head>
	<body>
		
		<!--Error Modal-->
		<div id="infomodal" class="modal fade" role="dialog">
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
										unset($_SESSION['error']);
									}
								?>
								</div>
								<div class="col-xs-12 col-md-12 ">	
								<?php
									if( isset($_SESSION['success']) ){
										echo "<p style='color:green;font-size:25px;'>".$_SESSION['success']."</p>";
										unset($_SESSION['success']);
									}
									
								?>
								</div>
							
						</div>
						
					</div>
				</div>
			</div>
		</div>
		
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
									<form method="post" id="loginform" name="loginform" >
										
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
													<input type="password" class="form-control" id="password" name="password" placeholder="password" value="<?=$_SESSION['password']?>">
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
						//unset($_SESSION['username']);
						if( !isset($_SESSION['username']) || strlen($_SESSION['username']) < 1){
							echo "<script>togglelogin();</script>";
						}
						else{
							//$_SESSION['success'] = "Discussion posted.";
							echo "<script>toggleinfo();</script>";
						}
					}
					else{
						//$_SESSION['error'] = "Type your topic of dicussion.";
						echo "<script>toggleinfo();</script>";
					}
				
			}
			
			if(!isset($_SESSION['loggedin']) ){
				
				echo "<script>toggleinfo();</script>";
			}
			if(isset($_SESSION['success'])){
				echo "<script>toggleinfo();</script>";
			}
			
			
			
		?>
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
								<div class="dropdown">
									<a class="nav-item"><a class="nav-link">
										<?php
											if( isset($_SESSION['user_id']) && strlen($_SESSION['user_id'])>0 ){
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
												<li class='nav-item '><a onclick='togglelogin();return false;' class='mydropdownitem' href='Login.php'>Log In</a></li>
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
						<label for="topic" class="col-12 col-form-label">Topic</label>
						<div class="col-12">
							<input type="text" class="form-control" id="topic" name="topic" value='<?=$_SESSION['topic']?>'></input>
						</div>
					</div>
					
					<div class="form-group row ">
						<label for="DiscussionTextArea" class="col-12 col-form-label">Your Discussion or Doubts</label>
						<div class="col-12">
							<textarea class="form-control" id="DiscussionTextArea" name="DiscussionTextArea" rows="6" ><?=$_SESSION['DiscussionTextArea']?></textarea>
						</div>
					</div>
					<div class="form-group row ">
						<div class="col-12 ">
							<button type="submit" class="btn btn-primary mybutton" name="post" id="post" style="float:right;" >POST</button>
						</div>
					</div>
					
					<input type="date" value="<?php echo date('Y-m-d');?>" name="Date" id="creationdate" hidden>
					<input type="time" id="creationtime" name="Time" value="<?php echo date('h:i:s');?>"  hidden>
					<input type="text" name="Meridiem" id="ampm" value="<?php echo date('A');?>" hidden>
					
				</form>
			</div>
			</div>


			<?php
				$stmt3 = $pdo->query("SELECT discussion_id,user_id,topic,discussion FROM discussions ORDER BY discussion_id");
				
				
				
				
				
				$stmt5 = $pdo->query("SELECT discussion_id,user_id,topic,discussion FROM discussions ORDER BY discussion_id");
				while ( $row5 = $stmt5->fetch(PDO::FETCH_ASSOC) ) {
						$stmt4 = $pdo->query("SELECT username FROM accounts WHERE user_id=".$row5['user_id']);
						echo "<div class='card ' >";
						echo(" <div class='card-header'>");
						//echo $stmt4;
						while($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)){
							echo "POSTED BY:  ".$row4['username'];
						}
						echo "</div>";
						echo(" <div class='card-body'>");
						//echo($row5['discussion_id']);
						
						
						echo "<h5 class='card-title'>".htmlentities($row5['topic'])."</h5>";
						echo("<p class='card-text' style='text-align:center;'>".htmlentities($row5['discussion'])."</p> ");
						
						//echo();
						echo "</div>";
						
						echo(" <div class='card-footer '>");
						echo "<a class='btn btn-primary col-xs-3 col-md-1 mybutton' style='float:right;' href='./discussion.php?discussion_id=".$row5['discussion_id']."'>Enter</a>";
						echo "</div>";
						echo("</div>");
					}
				
			?>
			


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
		
		
		
		
		
		
		<script src="assets/js/popper.min.js"></script>
		<?php
			if( isset($_SESSION['error']) ){
				echo "
				<script>
					function toggleinfo(){
						$('#infomodal').modal('show');
					}
					toggleinfo(); 
				</script>";
				//unset($_SESSION['error']);
				
			}
			else if( isset($_SESSION['success']) ){
				echo "
				<script>
					function toggleinfo(){
						$('#infomodal').modal('show');
					}
					toggleinfo(); 
				</script>";
				//unset($_SESSION['success']);
			}
		?>
		
		
	</body>
</html>