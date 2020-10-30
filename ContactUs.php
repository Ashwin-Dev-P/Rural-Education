<?php
	require_once "pdo.php";
	session_start();
	if(isset($_POST['send'])){
		if( isset($_POST['Number']) ){
			$_SESSION['Number'] = $_POST['Number'];
		}
		if( isset($_POST['EmailId']) ){
			$_SESSION['EmailId'] = $_POST['EmailId'];
		}
		if( isset($_POST['username']) ){
			$_SESSION['username'] = $_POST['username'];
		}
		if( isset($_POST['feedback']) ){
			$_SESSION['feedback'] = $_POST['feedback'];
		}
		if( !isset($_POST['ContactApproval']) ){
			$_POST['ContactApproval'] = "No";
		}
		if(isset($_POST['username']) && strlen($_POST['username'])>0 ){
			
			if( isset($_POST['feedback']) && strlen($_POST['feedback'])>0 ){
				if(isset($_POST['ContactApproval']) && $_POST['ContactApproval'] == "Yes" ){
					if((  !isset($_POST['EmailId']) || strlen($_POST['EmailId']) < 1 ) && (  !isset($_POST['Number']) || strlen($_POST['Number']) < 1 ) ){
						$_SESSION['error'] = "Enter your Email-Id or contact number to contact you.Or uncheck the 'May we contact you?' checkbox.";
					}
					else{
						$sql = "INSERT INTO feedback(Name, Number, EmailId,ContactApproval,feedback,Date,Time,Meridiem) VALUES (:Name ,:Number,:EmailId, :ContactApproval,:feedback,:Date,:Time,:Meridiem)";
				
						$stmt = $pdo->prepare($sql);
						
						$stmt->execute(array(
						':Name' => htmlentities($_POST['username']),
						':Number' => htmlentities($_POST['Number']),
						':EmailId' => htmlentities($_POST['EmailId']),
						':ContactApproval' => htmlentities($_POST['ContactApproval']),
						':feedback' => htmlentities($_POST["feedback"]),
						':Date' => $_POST["Date"],
						':Time' => $_POST["Time"],
						':Meridiem' => $_POST['Meridiem']
						));
						$_SESSION['success'] = "Thanks for feedback";
						unset($_SESSION['username']);
						unset($_SESSION['Number']);
						unset($_SESSION['EmailId']);
						unset($_SESSION['feedback']);
						
					}
				}
				else{
				
					$sql = "INSERT INTO feedback(Name, Number, EmailId,ContactApproval,feedback,Date,Time,Meridiem) VALUES (:Name ,:Number,:EmailId, :ContactApproval,:feedback,:Date,:Time,:Meridiem)";
				
					$stmt = $pdo->prepare($sql);
					
					$stmt->execute(array(
					':Name' => htmlentities($_POST['username']),
					':Number' => htmlentities($_POST['Number']),
					':EmailId' => htmlentities($_POST['EmailId']),
					':ContactApproval' => htmlentities($_POST['ContactApproval']),
					':feedback' => htmlentities($_POST["feedback"]),
					':Date' => $_POST["Date"],
					':Time' => $_POST["Time"],
					':Meridiem' => $_POST['Meridiem']
					));
					$_SESSION['success'] = "Thanks for feedback";
					unset($_SESSION['username']);
					unset($_SESSION['Number']);
					unset($_SESSION['EmailId']);
					unset($_SESSION['feedback']);
				}
			}
			else{
				$_SESSION['error'] = "Enter feedback.";
			}
			
			
		}
		else{
			$_SESSION['error'] = "Enter your name.";
			
			
		}
		
	}
	
	if( !isset($_SESSION['username']) ){
		$_SESSION['username'] = "";
	}
	if( !isset($_SESSION['Number']) ){
		$_SESSION['Number'] = "";
	}
	if( !isset($_SESSION['EmailId']) ){
		$_SESSION['EmailId'] = "";
	}
	if( !isset($_SESSION['feedback']) ){
		$_SESSION['feedback'] = "";
	}
	date_default_timezone_set('Asia/Kolkata');

?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="description" content="About Us">
		<meta name="author" content="Ashwin Dev">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">


		<title>
			Contact Us
		</title>

		<link rel = "icon" href ="assets/img/RuralEducationLogo.PNG" type = "image/x-icon">

		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/all.min.css">
		
		<link rel="stylesheet" href="assets/css/bootstrap-social.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/board.css">
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
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
								<li class="nav-item"><a class="nav-link" href="./index.html"><span class="fa fa-home fa-lg"></span> Home</a></li>
								<li class="nav-item"><a class="nav-link" href="./aboutus.html"><span class="fa fa-info fa-lg"></span> About Us</a></li>
								<li class="nav-item active"><a class="nav-link" href="#"><span class="fa fa-address-card fa-lg"></span> Contact Us</a></li>
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
						<li class="breadcrumb-item active">Contact Us</li>
					</ol>
				</div>
			</div>


			
		

			<div class="row row-content">
			   <div class="col-12">
				  <h3>Send us your Feedback</h3>
			   </div>
			   
				<!--FeedBack Form-->
				<div class="col-12 col-md-9">
					<form method="post" id="FeedBackForm" name="FeedBackForm" >
						<div class="form-group row">
							<label for="name" class="col-md-2 col-form-label">Name</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="username" name="username" placeholder="Name" value="<?=$_SESSION['username']?>">
							</div>
						</div>
						
						<div class="form-group row">
							<label for="telnum" class="col-12 col-md-2 col-form-label">Contact Tel.</label>
							<div class="col-12 col-md-10">
								<input type="tel" class="form-control" id="telnum" name="Number" placeholder="Tel. number  (optional)" value="<?=$_SESSION['Number']?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="emailid" class="col-md-2 col-form-label">Email</label>
							<div class="col-md-10">
								<input type="email" class="form-control" id="emailid" name="EmailId" placeholder="Email  (optional)" value="<?=$_SESSION['EmailId']?>">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6 offset-md-2">
								<div class="form-check">
									<input type="checkbox" class="form-check-input" name="ContactApproval" id="approve" value="Yes" checked>
									<label class="form-check-label" for="approve">
										<strong>May we contact you?</strong>
									</label>
								</div>
							</div>
							
						</div>
						<div class="form-group row">
							<label for="feedback" class="col-md-2 col-form-label">Your Feedback</label>
							<div class="col-md-10">
								<textarea class="form-control" id="feedback" name="feedback" rows="12"><?=$_SESSION['feedback']?></textarea>
							</div>
						</div>
						<div class="form-group row">
							<div class="offset-md-2 col-md-10">
								<button type="submit" class="btn btn-primary" name="send" id="send">Send Feedback</button>
							</div>
						</div>
						
						<input type="date" value="<?php echo date('Y-m-d');?>" name="Date" id="creationdate" hidden>
					
						<input type="time" id="creationtime" name="Time" value="<?php echo date('h:i:s');?>"  hidden>
					
						<input type="text" name="Meridiem" id="ampm" value="<?php echo date('A');?>" hidden>
					</form>
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
							<li><a href="#">Contact Us</a></li>
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
		
		<div id="testarea"></div>
		
		
		
		
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