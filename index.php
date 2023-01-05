<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Home|Buk Bus Reservation</title>
	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/background/buk-logo.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/background/buk-logo.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/background/buk-logo.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
  	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/mystyle.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/fancybox/dist/jquery.fancybox.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
	<!-- <div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="vendors/images/background/buk-title.png" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div> -->
	<div class="header" style="background-color: transparent;">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
		</div>
	</div>
	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="./register/admin_signin.php">
				<img src="vendors/images/background/buk-title.png" alt="" class="dark-logo">
				<img src="vendors/images/background/buk-title.png" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul style="margin-top:50px"id="accordion-menu">
					<li>
						<a href="javascript:;" class="dropdown-toggle no-arrow active">
							<span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
						</a>
					</li>
					<li>
						<a href="./register/user_signin.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-login"></span><span class="mtext">Sign In</span>
						</a>
					</li>
					<li>
						<a href="./register/user_signup.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user"></span><span class="mtext">Sign Up</span>
						</a>
					</li>
					<li>
						<a href="./contact_us.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-email"></span><span class="mtext">Contact Us</span>
						</a>
					</li>
					<!-- <li class="dropdown">
						<a  class="dropdown-toggle">
							<span class="micon dw dw-user"></span><span class="mtext">Sign Up</span>
						</a>
						<ul class="submenu">
							<li><a href="staff_register.php">Staff</a></li>
							<li><a href="student_register.php">Student</a></li>
						</ul>
					</li> -->
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>
	<section id="bannersec">
		<div class="banner">
		  <video  autoplay loop muted>
			<source src="vendors/images/background/sideshow.mp4" class="img-fluid" type="video/mp4">
		  </video>
		  <div class="bannercontent">
		  <h1><strong><marquee direction = "down"> BUK Bus RESERVATION PORTAL</marquee></strong></h1>
		  <p><marquee direction = "left">You can make your reservation before the time, Book from Old Side to New Side, Book from New Side to Old Side, Book  for Excursion</marquee></p>
		  </div>
		</div>
	</section>
	<div class="main-container">
		<div class="pd-ltr-20">
			<!-- ===== About Section ===== -->	
				<div class="card-box pd-20 height-100-p mb-30">
					<div class="row align-items-center">
						<div class="col-md-4">
							<img src="vendors/images/background/bukbg.jpg" alt="">
						</div>
						<div class="col-md-8">
							<h4 class="font-20 weight-500 mb-10 text-capitalize">
								<div class="weight-600 font-30 text-blue">ABOUT</div>
							</h4>
							<p class="font-18 max-width-600">The Buk Bus Transportation Portal is design by Buk ICT members to help the students of Buk 
								to book the unversity bus for Transportation within the university Campuses and for the HODs of each  department to book for Exurtion for the student of the department
								</p>
						</div>
					</div>
				</div>
			
				<div class="row">
					<div class="col-xl-3 mb-30">
						<div class="card-box height-100-p widget-style1">
							<div class="d-flex flex-wrap align-items-center">
								<div class="progress-data">
									<div id="chart2"></div>
								</div>
								<div class="widget-data">
									<div class="h4 mb-0">2</div>
									<div class="weight-600 font-14">CAMPUSES</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 mb-30">
						<div class="card-box height-100-p widget-style1">
							<div class="d-flex flex-wrap align-items-center">
								<div class="progress-data">
									<div id="chart3"></div>
								</div>
								<div class="widget-data">
									<div class="h4 mb-0">5</div>
									<div class="weight-600 font-14">FACULTIES</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 mb-30">
						<div class="card-box height-100-p widget-style1">
							<div class="d-flex flex-wrap align-items-center">
								<div class="progress-data">
									<div id="chart"></div>
								</div>
								<div class="widget-data">
									<div class="h4 mb-0">15</div>
									<div class="weight-600 font-14">CENTRES</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 mb-30">
						<div class="card-box height-100-p widget-style1">
							<div class="d-flex flex-wrap align-items-center">
								<div class="progress-data">
									<div id="chart4"></div>
								</div>
								<div class="widget-data">
									<div class="h4 mb-0">87</div>
									<div class="weight-600 font-14">DEPARTMENTS</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<!-- ===== End of About Section ===== -->

			<!-- ===== route Section ===== -->	
				<div class="card-box pd-20 height-100-p mb-30">
					<div class="row align-items-center">
						<div id="route" class="route">
							<div class="container">
							<div class="section-title">
								<h2>Our Route</h2>
								<p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
							</div>
							<div class="row">
								<div class="col-lg-4 col-md-6 icon-box">
								<div class="container">
								<div class="route-wrap">
									<img src="vendors/images/gallery/route1.jfif" class="img-fluid" alt="">
								</div>
									<h4 class="title">Old Side</h4>
									<p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
								</div>
								</div>
								<div class="col-lg-4 col-md-6 icon-box">
								<div class="container">
								<div class="route-wrap">
									<img src="vendors/images/gallery/route2.jfif" class="img-fluid" alt="">
								</div>
									<h4 class="title">New Side</h4>
									<p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
								</div>
								</div>
								<div class="col-lg-4 col-md-6 icon-box">
								<div class="container">
								<div class="route-wrap">
									<img src="vendors/images/gallery/route.jpg" class="img-fluid" alt="">
								</div>
									<h4 class="title">Excursion</h4>
									<p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
								</div>
								</div>
							</div>
							</div>
						</div>
					</div>
				</div>
			<!-- End route Section -->
		 
			<!-- ===== Gallery Section ===== -->
				<div class="card-box pd-20 height-100-p mb-30">
					<div class="row align-items-center">
						<h2 class="h2_gallery">Gallery</h2>
						<div class="gallery-wrap">
							<ul class="row">
								<li class="col-lg-4 col-md-6 col-sm-12">
									<div class="da-card box-shadow">
										<div class="da-card-photo">
											<img src="vendors/images/gallery/llery3.jpg" alt="">
											<div class="da-overlay">
												<div class="da-social">
													<h5 class="mb-10 color-white pd-20">Lorem ipsum dolor sit amet, consectetur adipisicing.</h5>
													<ul class="clearfix">
														<li><a href="vendors/images/gallery/llery3.jpg" data-fancybox="images"><i class="fa fa-picture-o"></i></a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="col-lg-4 col-md-6 col-sm-12">
									<div class="da-card box-shadow">
										<div class="da-card-photo">
											<img src="vendors/images/gallery/llery4.jpg" alt="">
											<div class="da-overlay">
												<div class="da-social">
													<h5 class="mb-10 color-white pd-20">Lorem ipsum dolor sit amet, consectetur adipisicing.</h5>
													<ul class="clearfix">
														<li><a href="vendors/images/gallery/llery4.jpg" data-fancybox="images"><i class="fa fa-picture-o"></i></a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="col-lg-4 col-md-6 col-sm-12">
									<div class="da-card box-shadow">
										<div class="da-card-photo">
											<img src="vendors/images/gallery/llery5.jpg" alt="">
											<div class="da-overlay">
												<div class="da-social">
													<h5 class="mb-10 color-white pd-20">Lorem ipsum dolor sit amet, consectetur adipisicing.</h5>
													<ul class="clearfix">
														<li><a href="vendors/images/gallery/llery5.jpg" data-fancybox="images"><i class="fa fa-picture-o"></i></a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="col-lg-4 col-md-6 col-sm-12">
									<div class="da-card box-shadow">
										<div class="da-card-photo">
											<img src="vendors/images/gallery/llery2.jpg" alt="">
											<div class="da-overlay">
												<div class="da-social">
													<h5 class="mb-10 color-white pd-20">Lorem ipsum dolor sit amet, consectetur adipisicing.</h5>
													<ul class="clearfix">
														<li><a href="vendors/images/gallery/llery2.jpg" data-fancybox="images"><i class="fa fa-picture-o"></i></a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="col-lg-4 col-md-6 col-sm-12">
									<div class="da-card box-shadow">
										<div class="da-card-photo">
											<img src="vendors/images/gallery/llery8.jpg" alt="">
											<div class="da-overlay">
												<div class="da-social">
													<h5 class="mb-10 color-white pd-20">Lorem ipsum dolor sit amet, consectetur adipisicing.</h5>
													<ul class="clearfix">
														<li><a href="vendors/images/gallery/llery8.jpg" data-fancybox="images"><i class="fa fa-picture-o"></i></a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="col-lg-4 col-md-6 col-sm-12">
									<div class="da-card box-shadow">
										<div class="da-card-photo">
											<img src="vendors/images/gallery/llery6.jpg" alt="">
											<div class="da-overlay">
												<div class="da-social">
													<h5 class="mb-10 color-white pd-20">Lorem ipsum dolor sit amet, consectetur adipisicing.</h5>
													<ul class="clearfix">
														<li><a href="vendors/images/gallery/llery6.jpg" data-fancybox="images"><i class="fa fa-picture-o"></i></a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="col-lg-4 col-md-6 col-sm-12">
									<div class="da-card box-shadow">
										<div class="da-card-photo">
											<img src="vendors/images/gallery/llery9.jpg" alt="">
											<div class="da-overlay">
												<div class="da-social">
													<h5 class="mb-10 color-white pd-20">Lorem ipsum dolor sit amet, consectetur adipisicing.</h5>
													<ul class="clearfix">
														<li><a href="vendors/images/gallery/llery9.jpg" data-fancybox="images"><i class="fa fa-picture-o"></i></a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="col-lg-4 col-md-6 col-sm-12">
									<div class="da-card box-shadow">
										<div class="da-card-photo">
											<img src="vendors/images/gallery/llery7.jpg" alt="">
											<div class="da-overlay">
												<div class="da-social">
													<h5 class="mb-10 color-white pd-20">Lorem ipsum dolor sit amet, consectetur adipisicing.</h5>
													<ul class="clearfix">
														<li><a href="vendors/images/gallery/llery7.jpg" data-fancybox="images"><i class="fa fa-picture-o"></i></a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="col-lg-4 col-md-6 col-sm-12">
									<div class="da-card box-shadow">
										<div class="da-card-photo">
											<img src="vendors/images/gallery/llery1.jpg" alt="">
											<div class="da-overlay">
												<div class="da-social">
													<h5 class="mb-10 color-white pd-20">Lorem ipsum dolor sit amet, consectetur adipisicing.</h5>
													<ul class="clearfix">
														<li><a href="vendors/images/gallery/llery1.jpg" data-fancybox="images"><i class="fa fa-picture-o"></i></a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			<!-- End Gallery Section -->

			<!-- ===== Testimonials Section ===== -->	
				<div class="card-box pd-20 height-100-p mb-30">
					<div class="row align-items-center">
						<h2 class="h2_gallery">Testimonials</h2>
						<div class="row clearfix">
							<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
								<div class="da-card">
									<div class="da-card-photo">
										<img src="vendors/images/gallery/testimonials-1.jpg" alt="">
										<div class="da-overlay">
											<div class="da-social">
												<ul class="clearfix">
													<li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
													<li><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
													<li><a href="javascript:;"><i class="fa fa-envelope-o"></i></a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="da-card-content">
										<h6 class="h6 mb-10">Prof.&nbsp;Sagir Adamu Abbas</h6>
										<p class="test_title"><strong>Vice Chancellor</strong></p>
										<p class="mb-0">Here at Bayero University, we are committed to addressing African developmental challenges through cutting-edge research, knowledge transfer and training of high quality graduates.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
								<div class="da-card">
									<div class="da-card-photo">
										<img src="vendors/images/gallery/testimonials-2.jpg" alt="">
										<div class="da-overlay">
											<div class="da-social">
												<ul class="clearfix">
													<li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
													<li><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
													<li><a href="javascript:;"><i class="fa fa-envelope-o"></i></a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="da-card-content">
										<h6 class="h6 mb-10">Prof.&nbsp;Jamilu Salim</h6>
										<p class="test_title"><strong>Registrar</strong></p>
										<p class="mb-0">Here at Bayero University, we are committed to addressing African developmental challenges through cutting-edge research, knowledge transfer and training of high quality graduates.</p>
									</div>
								</div>
							</div>
							
							<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
								<div class="da-card">
									<div class="da-card-photo">
										<img src="vendors/images/gallery/testimonials-3.jpg" alt="">
										<div class="da-overlay">
											<div class="da-social">
												<ul class="clearfix">
													<li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
													<li><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
													<li><a href="javascript:;"><i class="fa fa-envelope-o"></i></a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="da-card-content">
										<h6 class="h6 mb-10">Prof.&nbsp;Suleiman Bello</h6>
										<p class="test_title"><strong>Bursar</strong></p>
										<p class="mb-0">Here at Bayero University, we are committed to addressing African developmental challenges through cutting-edge research, knowledge transfer and training of high quality graduates.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
								<div class="da-card">
									<div class="da-card-photo">
										<img src="vendors/images/gallery/testimonials-4.jpg" alt="">
										<div class="da-overlay">
											<div class="da-social">
												<ul class="clearfix">
													<li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
													<li><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
													<li><a href="javascript:;"><i class="fa fa-envelope-o"></i></a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="da-card-content">
										<h6 class="h6 mb-10">Prof.&nbsp;Mahmud Umar Sani</h6>
										<p class="test_title"><strong>DVC (Acadamic)</strong></p>
										<p class="mb-0">Here at Bayero University, we are committed to addressing African developmental challenges through cutting-edge research, knowledge transfer and training of high quality graduates.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Testimonials Section -->
				
				<!-- ===== footer Section ===== -->
				
				<div class="footer-wrap pd-20 mb-20 card-box">
					<a href="javascript:;" class="btn" data-bgcolor="#00b489" data-color="#ffffff"><i class="fa fa-whatsapp"></i></a>
					<a href="javascript:;" class="btn" data-bgcolor="#db4437" data-color="#ffffff"><i class="fa fa-google-plus"></i></a>
					<a href="javascript:;" class="btn" data-bgcolor="#3b5998" data-color="#ffffff"><i class="fa fa-facebook"></i></a>
					<a href="javascript:;" class="btn" data-bgcolor="#f46f30" data-color="#ffffff"><i class="fa fa-instagram"></i></a>
					<div>
						<a href="javascript:;" class="scroll_top"><i class="icon-copy ion-arrow-up-a"></i></a>
						<strong>&copy; Copyright <span><a style="color: black; text-decoration:none;" target="_blank" href="./register/admin_signin.php">Buk Bus Reservation Portal</a></span></strong>
					</div>
				</div>
				<!-- End footer Section -->
		</div>
	</div>
		<a href="https://wa.me/+2349048429539/?Hi sent payment slip" target="_blank" class="whatsapp whatsapp1 "><i class="fa fa-whatsapp"></i></a>
	<!-- js -->
	<script src="vendors/scripts/app.js"></script>
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/main.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="vendors/scripts/dashboard.js"></script>
		<!-- fancybox Popup Js -->
		<script src="src/plugins/fancybox/dist/jquery.fancybox.js"></script>
</body>
</html>