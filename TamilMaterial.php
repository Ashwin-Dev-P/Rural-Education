<?php
	if(!isset($_GET['content'])){
		header("Location: StateBoardTamil.html");
		return;
	}
	if(!isset($_GET['standard'])){
		header("Location: StateBoardTamil.html");
		return;
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
						<li class="breadcrumb-item"><a href="./index.html">Home</a></li>
						<li class="breadcrumb-item"><a href="./Board.php">Board</a></li>
						<li class="breadcrumb-item"><a href="./StateBoard.html">State Board</a></li>
						<li class="breadcrumb-item"><a href="./StateBoardTamil.html">Tamil</a></li>
						<li class="breadcrumb-item"><a href="./StateBoardTamil<?=$_GET['content']?>.html"><?=$_GET['content']?></a></li>
						<li class="breadcrumb-item active">Standard <?=$_GET['standard']?></li>
					</ol>
				</div>
			</div>


			<!--Board selection-->
			<!--Board selection-->
			<div class="row justify-content-md-center">
				<?php
					
						$valid = 1;
						if( $_GET['content'] == "StudyMaterial"){
							switch($_GET['standard']) {
								case 1:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1UNasmR48Hls_73_fQ_BNqKhYEyASWNc9#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 2:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1otWnGEnXocJzeAoUU5XtwLRUh-9nZ8Hj#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 3:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1552IkJSvqEEfA-ZuVyxio34c9u_pkArj#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 4:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1qGW6IcDo562vLoVIJSaYDyfM-MGrINlg#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 5:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1ceHxB6UBe_cEfhtSBMf9R0Cu7-_d1YGR#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 6:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1leZLrVeuYkMYWL7IzajmO8XUSqAFWr4a#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 7:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1IgZPbrQqD7K-HLG3Iel70mMkswdfSQOB#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 8:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1qytWTcxjnwiEpivrfgU5gJGGJcdlkDvW#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									
									break;
								case 9:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1KPOAx3o7B1t1-TrlQQGBuc522v_F14Hi#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 10:
								
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1rsUzCLioFgrnYDerDBC0QstttAj6iFCB#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 11:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1aDXSoDV_ZH5o5UNZhsAgv780J2Ru8M3h#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 12:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1OGGvDxbTbmW4sFDu5bPNLWnTEBdoqg6N#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								default:
									echo "
										<li class='list-group-item list-group-item-action standardlist col-xs-12 col-md-9 col-lg-8'>
											<div class='col-xs-12 PDFnames' style='color:red;'>Invalid Standard Parameter.Contact the server for help.</div>
										</li>
									";
									$valid=0;
							}
							
							
						}
						else if( $_GET['content'] == "QuestionPapers" ){
							
							switch($_GET['standard']) {
								case 1:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1bhgkUmBJvD5VRPisY_UT_TM6ivYyNx_7#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 2:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1RTvVJ6icreA9R8rOjqVicAXApRTE7VgG#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 3:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1u1EgYaqYT0fU2zQW-Tgx-gWXynOQEzTV#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 4:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1mQQcMXE7EatbGfwoTFMWKC_AEL-f1YaL#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 5:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1g64qSdpyzXsAH7lT0TrqOaBeaqWozHxa#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 6:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1_NIoKxmqbGO-cvE1wV9hARCjaVTDTGDk#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 7:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=10sUkgWmBAEAe841NI4Mu5Eno3luDzZqV#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 8:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1UyleFRRbLup7Tw8OUl-SL171AbsC-cjK#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 9:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1gOPQzAqmzSMcCLO4XcvHinlBexnnWdkv#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 10:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1_lOrOstgrkCbADkQiamrmngowJaghjew#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 11:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1sen475KXYk3xK82PeJhB9qivzNQusJR5#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 12:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1Z3oW3BAjncGP14zF-Mk1hUFqGd55Bw2a#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								default:
									echo "
										<li class='list-group-item list-group-item-action standardlist col-xs-12 col-md-9 col-lg-8'>
											<div class='col-xs-12 PDFnames' style='color:red;'>Invalid Standard Parameter.Contact the server for help.</div>
										</li>
									";
									$valid = 0;
							}
						}
						else{
							echo "
								<li class='list-group-item list-group-item-action standardlist col-xs-12 col-md-9 col-lg-8'>
									<div class='col-xs-12 PDFnames' style='color:red;'>Invalid Content Parameters.Contact the server for help.</div>
								</li>
							";
							$valid=0;
						}
						
						
					
					?>

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
	</body>
</html>