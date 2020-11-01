<?php
	session_start();
	require_once "pdo.php";
	if( isset($_POST['replybutton']) ){
		if(isset($_POST['reply']) && strlen($_POST['reply'])> 0){
			$sql = "INSERT INTO discussions_reply (discussion_id,user_id, reply) VALUES (:discussion_id,:user_id ,:reply)";
			
			$stmt = $pdo->prepare($sql);
			
			$stmt->execute(array(
				':discussion_id' => htmlentities($_GET['discussion_id']),
				':user_id' => htmlentities($_SESSION['user_id']),
				':reply' => htmlentities($_POST['reply'])
			));
		}
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
	</head>
	<body>

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
						<li class="breadcrumb-item active">Board</li>
					</ol>
				</div>
			</div>


			<!--Board selection-->
			<div class="row boarddiv">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<?php
								$stmt = $pdo->query("SELECT user_id,topic,discussion FROM discussions WHERE discussion_id=".$_GET['discussion_id']);
								
								while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
									$stmt2 = $pdo->query("SELECT username FROM accounts WHERE user_id=".$row['user_id']);
									while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
										echo "POSTED BY: ".$row2['username'];
										echo "
											</div>
											<div class='card-body'>
										";
										echo "<h1 style='text-align:center;'>".$row['topic']."</h1>";
										echo "<h5 style='text-align:center;'>".$row['discussion']."</h5><hr/>";
										
									}
								}
								
								//For getting replies
								$stmt3 = $pdo->query("SELECT user_id,discussion_reply_id,reply FROM discussions_reply WHERE discussion_id=".$_GET['discussion_id']);
								while($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
									
									//For getting replier info.
									$stmt4 = $pdo->query("SELECT username FROM accounts WHERE user_id=".$row3['user_id']);
									echo "<div class='row container row-content col-12'>";
									while($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)){
										echo "<div class='row-content'>
												<div class='row'>
													<p> ".$row3['reply']."</p><br/>
												</div>
												
												<div class='row' style='float:right;>
													<p style='float:right;'>-- ".$row4['username']."</p>
												</div>
											</div>";
									}
									echo "</div>";
								}
								
							?>
							
						
						</div>
						<div class="card-footer">
							<div class="col-12">
								<form method="post" id="replyform" name="replyform" >
									
									
									
									
									
									<div class="form-group row ">
										<label for="reply" class="col-12 col-form-label">Your Reply</label>
										<div class="col-12">
											<textarea class="form-control" id="reply" name="reply" rows="2" ><?=$_SESSION['DiscussionTextArea']?></textarea>
										</div>
									</div>
									<div class="form-group row ">
										<div class="col-12 ">
											<button type="submit" class="btn btn-primary mybutton" name="replybutton" id="replybutton" style="float:right;" >REPLY</button>
										</div>
									</div>
									
									
									
								</form>
							</div>
						</div>
					</div>
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
	</body>
</html>