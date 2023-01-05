<?php 
  include('../php_users/signin.php');
  
//   if (isset($_GET['token'])){
//     $token = $_GET['token'];
//     verifystaff($token);
//     header("location:../users/staff_dashboard.php");
//   }
  if (!isset($_SESSION['username'])) {
  	header('location: ../register/user_signin.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: ../register/user_signin.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Dashboard|Buk Bus Reservation</title>
	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="../vendors/images/background/buk-logo.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../vendors/images/background/buk-logo.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../vendors/images/background/buk-logo.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
  	<link rel="stylesheet" type="text/css" href="../vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/mystyle.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="../src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="../src/plugins/fancybox/dist/jquery.fancybox.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script type = "text/javascript" >
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
	<!-- <div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="../vendors/images/background/buk-title.png" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div> -->
	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-user" data-toggle="header_search"></div>
			<div class="header-search">
				<h6 class="text-danger">Active: <strong class="text-uppercase text-primary"> <?php echo $_SESSION['staff_fullname']; ?></strong></h6>
			</div>
		</div>
		<div class="header-right">
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="javascript:;" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="../vendors/images/profile/staff/<?php echo $_SESSION['staff_image']; ?>" style="width:100%; height:100%"alt="">
						</span>
						<span class="user-name text-uppercase"><?php echo $_SESSION['username']; ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item active" href="javascript:;"><i class="dw dw-user1"></i> Profile</a>
						<?php if ($_SESSION['staff_verify'] == "Verified"):?>
							<a class="dropdown-item" href="./staff_update_info.php"><i class="dw dw-settings2"></i>Update Info.</a>
							<?php endif ?>
							<?php if ($_SESSION['staff_verify'] == "Unverified"):?>
								<a class="dropdown-item" href="./staff_update_email.php"><i class="dw dw-settings2"></i> Update Email</a>
							<?php endif ?>
							<a class="dropdown-item" href="./staff_ _info.php"><i class="dw dw-print"></i>Print Info.</a>
							<?php  if (isset($_SESSION['username'])) : ?>
								<a href="../register/user_signin.php?logout='1'" class="dropdown-item"><i class="dw dw-logout"></i>Log Out</a>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="javascript:;">
				<img src="../vendors/images/background/buk-title.png" alt="" class="dark-logo">
				<img src="../vendors/images/background/buk-title.png" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul style="margin-top:10px"id="accordion-menu">
					<li>
						<a href="javascript:;" class="dropdown-toggle no-arrow active">
							<span class="micon dw dw-user"></span><span class="mtext">Dashboard</span>
						</a>
					</li>
					<?php if ($_SESSION['staff_verify'] == "Verified"):?>
						<li>
							<a href="../booking/staff_booking.php" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-bus"></span><span class="mtext">New Booking</span>
							</a>
						</li>
						<li>
							<a href="../booking/staff_manage.php" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-id-card"></span><span class="mtext">Manage Booking</span>
							</a>
						</li>
					<?php endif ?>
					<?php if ($_SESSION['staff_verify'] == "Unverified"):?>
						<li>
							<a class="dropdown-toggle no-arrow">
								<span class="micon dw dw-bus"></span><span class="mtext">New Booking</span>
							</a>
						</li>
						<li>
							<a class="dropdown-toggle no-arrow">
								<span class="micon dw dw-id-card"></span><span class="mtext">Manage Booking</span>
							</a>
						</li>
					<?php endif ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<?php if (isset($_SESSION['success'])) : ?>
					<div class="error success">
						<h3 style="font-size: 18px;">
							<?php 
							echo $_SESSION['success']; 
							unset($_SESSION['success']);
							?>
						</h3>
					</div>
				<?php endif ?>
					<div class="product-wrap">
					<div class="product-detail-wrap mb-30">
						<div class="row">
							<div class="col-lg-6 col-md-12 col-sm-12">
								<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
									<ol class="carousel-indicators">
										<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
										<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
										<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
									</ol>
									<div class="carousel-inner">
										<div class="carousel-item active">
											<img class="d-block w-100" src="../vendors/images/gallery/llery7.jpg" alt="First slide">
										</div>
										<div class="carousel-item">
											<img class="d-block w-100" src="../vendors/images/gallery/llery8.jpg" alt="Second slide">
										</div>
										<div class="carousel-item">
											<img class="d-block w-100" src="../vendors/images/gallery/llery9.jpg" alt="Third slide">
										</div>
									</div>
									<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
									</a>
									<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
									</a>
								</div>
								<div>&nbsp;&nbsp;&nbsp;&nbsp; </div>
								<div class="page-header">
									<div class="row">
										<?php if ($_SESSION['staff_verify'] == "Verified"):?>
											<div class="col-md-12 col-sm-12">
												<div class="title">
													<h4>Electronic Card(E-card)</h4>
												</div>
												<p>An Electronic Card is a virtual card that has 16 digital Number that you can use for your booking, your E-Card Number is: <strong><?php echo $_SESSION['staff_e_card']; ?></strong></p>
											</div>
										<?php endif ?>
										<?php if ($_SESSION['staff_verify'] == "Unverified"):?>
											<div class="col-md-12 col-sm-12">
											<div class="title">
												<h4 class="text-danger">Unverified Account</h4>
											</div>
											<p>You cannot make new booking or manage booking with unvirify account, If your email <strong><?php echo $_SESSION['staff_email']; ?></strong> is invalid click on Change Email.</p>
												<a href="./staff_update_email.php" class="btn btn-outline-primary btn-block">Change Email</a>
										</div>
										<?php endif ?>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-12 col-sm-12">
								<div id="user-info">
									<h4><?php echo $_SESSION['staff_id']; ?> DETAILS</h4>
									<ul>
										<li><strong>AMOUNT TO PAY: NGN <?php echo $_SESSION['staff_e_unit']; ?>.00</strong></li>
										<li><strong>E-card: </strong><?php echo $_SESSION['staff_e_card']; ?></li>
										<li><strong>Name: </strong><?php echo $_SESSION['staff_fullname']; ?></li>
										<li><strong>Staff Id.: </strong><?php echo $_SESSION['staff_id']; ?></li>
										<li><strong>Department: </strong><?php echo $_SESSION['department']; ?></li>
										<li><strong>Phone No.: </strong><?php echo $_SESSION['staff_phone']; ?></li>
										<li><strong>Email: </strong><?php echo $_SESSION['staff_email']; ?></li>
									</ul>
								</div>
								<div class="page-header">
									<div class="row">
										<?php if ($_SESSION['staff_verify'] == "Verified"):?>
											<div class="col-md-12 col-sm-12">
												<div class="title">
													<h4>VERIFIED</h4>
												</div>
												<p>You can make booking or manage booking with virify account, use <strong><?php echo $_SESSION['staff_e_card']; ?></strong> as your E-Card Number to make your booking payment.</p>
												<div class="row">
													<div class="col-md-6 col-6">
														<a href="../booking/staff_booking" class="btn btn-outline-primary btn-block">Book Now</a>
													</div>
													<div class="col-md-6 col-6">
														<a href="../booking/staff_manage.php" class="btn btn-primary btn-block">Manage Booking</a>
													</div>
												</div>
											</div>
										<?php endif ?>
										<?php if ($_SESSION['staff_verify'] == "Unverified"):?>
											<div class="col-md-12 col-sm-12">
												<div class="title">
													<h4>HOW TO VERIFY YOUR ACCOUNT</h4>
												</div>
												<p>To verify your acount, Kindly sign into your email account and click on the verification link sent to <strong><?php echo $_SESSION['staff_email']; ?></strong>.</p>
												<a href="https://accounts.google.com/signin/v2/identifier?hl=en&continue=https%3A%2F%2Fwww.google.com%2Fsearch%3Fclient%3Dfirefox-b-d%26q%3Dgmail%2Blogin%26pli%3D1&ec=GAlAAQ&flowName=GlifWebSignIn&flowEntry=AddSession" target="_blank" class="btn btn-primary btn-block">Email Signin</a>
											</div>
										<?php endif ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<a href="https://wa.me/+2349048429539/?Hi sent payment slip" target="_blank" class="whatsapp whatsapp1 "><i class="fa fa-whatsapp"></i></a>

	<!-- js -->
	<script src="../vendors/scripts/core.js"></script>
	<script src="../vendors/scripts/main.js"></script>
	<script src="../vendors/scripts/script.min.js"></script>
	<script src="../vendors/scripts/process.js"></script>
	<script src="../vendors/scripts/layout-settings.js"></script>
	<script src="../src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="../src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="../src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="../src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="../src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="../vendors/scripts/dashboard.js"></script>
		<!-- fancybox Popup Js -->
		<script src="../src/plugins/fancybox/dist/jquery.fancybox.js"></script>
</body>
</html>