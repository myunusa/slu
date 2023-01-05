<?php 
  include('../php_users/signin.php');
  include('../php_admin/notification.php');
  if (!isset($_SESSION['admin'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../register/admin_signin.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['admin']);
  	header("location: ../register/admin_signin.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Admin Panel|Buk Bus Reservation</title>
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
		function preventBack() { window.history.forward(); }
		setTimeout("preventBack()", 0);
		window.onunload = function () { null };

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
				<h6 class="text-danger">Active: <strong class="text-uppercase text-primary"> <?php echo $_SESSION['fullname']; ?></strong></h6>
			</div>
		</div>
		<div class="header-right">
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="javascript:;" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="../vendors/images/profile/admin/<?php echo $_SESSION['image']; ?>" style="width:100%; height:100%"alt="">
						</span>
						<span class="user-name text-capitalize"><?php echo $_SESSION['admin']; ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item active" href="javascript:;"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="../register/admin_update.php"><i class="dw dw-settings2"></i> Change Password</a>
						<?php  if (isset($_SESSION['admin'])) : ?>
              				<a href="../register/admin_signin.php?logout='1'" class="dropdown-item"><i class="dw dw-logout"></i>Log Out</a>
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
				<ul style="margin-top:20px"id="accordion-menu">
					<li>
						<a href="javascript:;" class="dropdown-toggle no-arrow active">
							<span class="micon dw dw-house"></span><span class="mtext">Dashboard</span>
						</a>
					</li>
					<li class="dropdown">
						<a  class="dropdown-toggle">
							<span class="micon dw dw-user-2"></span><span class="mtext">Register</span>
						</a>
						<ul class="submenu">
							<?php if($_SESSION['type']== "Super"): ?>
								<li><a href="../register/admin_signup.php">New Admin</a></li>
							<?php endif ?>
							<li><a href="../register/register_user.php">Register User</a></li>
							<li><a href="../register/signup_user.php">Signup User</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a  class="dropdown-toggle">
							<span class="micon dw dw-user"></span><span class="mtext">Users Info.</span>
						</a>
						<ul class="submenu">
							<?php if($_SESSION['type']== "Super"): ?>
								<li><a href="./admin.php">Admin</a></li>
								<li><a href="./buk_student.php">BUK Student</a></li>
								<li><a href="./buk_staff.php">BUK Staff</a></li>
							<?php endif ?>
							<li><a href="./signup_student.php">Signup Student</a></li>
							<li><a href="./signup_staff.php">Signup Staff</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a  class="dropdown-toggle">
							<span class="micon dw dw-bus"></span><span class="mtext">New boking</span>
						</a>
						<ul class="submenu">
							<li><a href="../admin_booking/student_booking.php">Student Booking</a></li>
							<li><a href="../admin_booking/staff_booking.php">Staff Booking</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a  class="dropdown-toggle">
							<span class="micon  dw dw-id-card"></span><span class="mtext">Manage Booking</span>
						</a>
						<ul class="submenu">
							<li><a href="../admin_booking/student_manage.php">Manage Student Booking</a></li>
							<li><a href="../admin_booking/staff_manage.php"> Manage Staff Booking</a></li>
						</ul>
					</li>
					<li>
						<a href="../admin_booking/check_in.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-car"></span><span class="mtext">Check In</span>
						</a>
					</li>
					<li>
						<a href="./contact_us.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-email"></span><span class="mtext">Contact Us</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>
	<div class="main-container">
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
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
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
										<div class="col-md-12 col-sm-12">
											<div class="title">
												<h4>MAKE/VERIFY PAYMENT</h4>
											</div>
											<p>You can make payment or verify payment of staff booking by clicking Make/Verify Payment.</p>
											<div class="row">
												<div class="col-md-6 col-6">
													<a href="../admin_booking/make_payment.php" class="btn btn-outline-primary btn-block">Make/Verify Payment</a>
												</div>
												<div class="col-md-6 col-6">
													<a href="../admin_booking/check_in.php" class="btn btn-outline-primary btn-block">Check In Booking</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-12 col-sm-12">
								<div id="user-info">
									<h4>NOTIFICATIONS</h4>
									<ul>
										<li>Number of registered admins: <strong><?php if ($admin_row){ echo $admin_row." Admins";}else{ echo "No Admin";} ?></strong></li>
										<li>Number of Buk staff: <strong><?php if ($buk_staff_row){ echo $buk_staff_row." Staff";}else{ echo "No Staff";} ?></strong></li>
										<li>Number of Buk Student: <strong><?php if ($buk_student_row){ echo $buk_student_row." Students";}else{ echo "No Student";} ?></strong></li>
										<li>Number of registered staff: <strong><?php if ($staff_signup_row){ echo $staff_signup_row." Staffs";}else{ echo "No Staff";} ?></strong></li>
										<li>Number of Buk registered student: <strong><?php if ($student_signup_row){ echo $student_signup_row." Students";}else{ echo "No Admin";} ?></strong></li>
										<!-- <li>&emsp;</li> -->

										<li><strong>TOTAL NUMBER OF BOOKING FOR TODAY</strong>
										<li>For Excurtion: <strong><?php if ($staff_booking_row){ echo $staff_booking_row." Booking";}else{ echo "No Booking";} ?></strong></li>
										<li>From Old Campus To New Campus: <strong><?php if ($old_site_row){ echo $old_site_row." Booking";}else{ echo "No Booking";} ?></strong></li>
										<li>From New Campus To Old Campus: <strong><?php if ($new_site_row){ echo $new_site_row." Booking";}else{ echo "No Booking";} ?></strong></li>
										<!-- <li>&emsp;</li> -->
										<li><strong>TOTAL NUMBER OF CHECKED IN USER FOR TODAY</strong>
										<li>For Excurtion: <strong><?php if ($staff_checkin_row){ echo $staff_checkin_row." Staff";}else{ echo "No Staff";} ?></strong></li>
										<li>From Old Campus To New Campus: <strong><?php if ($old_checkin_row){ echo $old_checkin_row." Students";}else{ echo "No Student";} ?></strong></li>
										<li>From New Campus To Old Campus: <strong><?php if ($new_checkin_row){ echo $new_checkin_row." Students";}else{ echo "No Student";} ?></strong></li>
									</ul>
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