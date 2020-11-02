<?php
	if(!isset($_GET['content'])){
		header("Location: StateBoardEnglish.html");
		return;
	}
	if(!isset($_GET['standard'])){
		header("Location: StateBoardEnglish.html");
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
						<li class="breadcrumb-item"><a href="./index.php">Home</a></li>
						<li class="breadcrumb-item"><a href="./Board.php">Board</a></li>
						<li class="breadcrumb-item"><a href="./StateBoard.html">State Board</a></li>
						<li class="breadcrumb-item"><a href="./StateBoardEnglish.html">English</a></li>
						<li class="breadcrumb-item"><a href="./StateBoardEnglish<?=$_GET['content']?>.html"><?=$_GET['content']?></a></li>
						<li class="breadcrumb-item active">Standard <?=$_GET['standard']?></li>
					</ol>
				</div>
			</div>


			<!--Board selection-->
			<div class="row justify-content-md-center">
				<?php
					
						$valid = 1;
						if( $_GET['content'] == "StudyMaterial"){
							switch($_GET['standard']) {
								case 1:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1l_keeH76gG-di5vlZeiyuqKrGJA9Dspj#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 2:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1eN0skg4jtNr5jHyLg7_0EKpQ7hvB3PyX#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 3:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1wDXhpqceKBLNEAXPlsQ1B4KbAqi3fge_#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 4:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=12X-uVrT9cgH-bNjxIrX_TARiY030WzYy#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 5:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=10P8D-ROhjX23QJYUEgThZSN8H1vgxNh7#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 6:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1nghV70y74KkrGx-RuYmDSK7wZRWmzWB-#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 7:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1l0PI1NcClcncQT5tHBIGXCEjkEilEScI#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 8:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1lwQUdpdEX-fAUIj0d0b64efmU6nqev_V#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									
									break;
								case 9:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1n9cj8kszyUURtAYyWLZ_8oI1S6ScyRbJ#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 10:
								
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=16xmZmWLzrGP5h24_u9UcFbJZAN0-jTI_#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 11:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1E3yTLBDOlSO6G8Ab-QopAk5OPsTDstVq#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 12:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1kaKWn0kwAl4K-UHNAB1-ZjdfPf64T8IQ#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
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
									<iframe src='https://drive.google.com/embeddedfolderview?id=1ZAk0pA1oHNY_rCtLL5dWErypquY7-MHu#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 2:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1_wlrKV_3_7XXlVYCkoG1nzY9z5Ugcj0Q#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 3:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1zjpZQ_h62y-jQ7W7avcOq3LK5yp2MMG3#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 4:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1Emfm_n9vuZSMCd4GPs7-V6U_DrORz7wC#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 5:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1QY1cBdVbHrvjXxTQJafPXOfw8BC4N_hX#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 6:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1FORLh754EkS_6Iob5MYH3pL75z0Fz44M#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 7:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1gqgWEsWn5y7u5-e4QTGR1JYGrYarr9Fa#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 8:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1-z02bpsLGgOCmuw24EIB74vSSTHmyxUk#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 9:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1ZX51YHRcuqnykemUlfs1zW-sffzE1tHa#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 10:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1JYXGcRGRmjXf_DI4LgkimADNVaUbqfl9#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 11:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1k8TJFzFDwN4fvc_iUic4a4PSccD1VZRg#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
									";
									break;
								case 12:
									echo "
									<iframe src='https://drive.google.com/embeddedfolderview?id=1iRxOqmzSPrFsVAKTvmI_opOCbfOBsqtw#list' width='100%' height='500' frameborder='0' class='responsive-iframe'></iframe>
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