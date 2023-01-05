<?php 
  include('../php_admin_booking/staff.php');
  if (!isset($_SESSION['admin'])) {
  	header('location: ../register/admin_signin.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['admin']);
  	header('location: ../register/admin_signin.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Managed Booking|Buk Bus Reservation</title>
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
						<a href="../admin_panel/dashboard.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house"></span><span class="mtext">Dashboard</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
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
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-user"></span><span class="mtext">Users Info.</span>
						</a>
						<ul class="submenu">
							<?php if($_SESSION['type']== "Super"): ?>
								<li><a href="../admin_panel/admin.php">Admin</a></li>
								<li><a href="../admin_panel/buk_student.php">BUK Student</a></li>
								<li><a href="../admin_panel/buk_staff.php">BUK Staff</a></li>
							<?php endif ?>
							<li><a href="../admin_panel/signup_student.php">Signup Student</a></li>
							<li><a href="../admin_panel/signup_staff.php">Signup Staff</a></li>
						</ul>
					</li>
					
					<li class="dropdown">
						<a  class="dropdown-toggle">
							<span class="micon dw dw-bus"></span><span class="mtext">New boking</span>
						</a>
						<ul class="submenu">
							<li><a href="./student_booking.php">Student Booking</a></li>
							<li><a href="./staff_booking.php">Staff Booking</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a  class="dropdown-toggle">
							<span class="micon  dw dw-id-card"></span><span class="mtext">Manage Booking</span>
						</a>
						<ul class="submenu">
							<li><a href="./student_manage.php">Manage Student Booking</a></li>
							<li><a href="./staff_manage.php" class="active"> Manage Staff Booking</a></li>
						</ul>
					</li>
					<li>
						<a href="./check_in.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-car"></span><span class="mtext">Check In</span>
						</a>
					</li>
					<li>
						<a href="../admin_panel/contact_us.php" class="dropdown-toggle">
							<span class="micon dw dw-email"></span><span class="mtext">Contact Us</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			
			<div class="card-box mb-30">
				<div class="pb-20">
					<div class="invoice-wrap ">
						<div class="invoice-box">
							<div class="invoice-header">
								<div class="logo text-center">
									<img src="../vendors/images/deskapp-logo.png" alt="">
								</div>
							</div>
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
							<h4 class="text-center mb-30 weight-600">BOOKING DETAILS</h4>
							<div>
								<?php  if ($_SESSION['ticket_status'] =="Not used") : ?>
									<a class="btn btn-primary" href="./staff_update.php" role="button">Change Booking</a>
								<?php endif ?>
								<a class="btn btn-primary" href="./staff_print.php" role="button">Print Ticket</a>
							</div>
							<br>
							<div class="row pb-30">
								<div class="col-md-6">
									<h5 class="mb-15">Booking Id: <?php echo $_SESSION['booking_id'];?> </h5>
									<p class="font-14 mb-5">Staff Id: <strong class="weight-600"><?php echo $_SESSION['staff_id'];?></strong></p>
									<p class="font-14 mb-5">Department: <strong class="weight-600"><?php echo $_SESSION['department'];?></strong></p>
									<p class="font-14 mb-5">Email: <strong class="weight-600"><?php echo $_SESSION['staff_email'];?></strong></p>
									<p class="font-14 mb-5">Phone Number: <strong class="weight-600"><?php echo $_SESSION['staff_phone'];?></strong></p>
								</div>
							</div>

							<div class="invoice-desc pb-30">
								<h6 class="mb-15">Booking Info.</h6>
								<div class="invoice-desc-head clearfix">
									<div class="invoice-sub">Depart From</div>
									<div class="invoice-hours">Depart Date</div>
									<div class="invoice-hours">arrival Date</div>
									<div class="invoice-hours">Students</div>
									<div class="invoice-hours">Payment</div>
									<div class="invoice-rate">Ticket Status</div>
								</div>
								<div class="invoice-desc-body">
									<ul>
										<li class="clearfix">
											<div class="invoice-sub"><?php echo $_SESSION['depart_from'];?> - <?php echo $_SESSION['arrive_to'];?></div>
											<div class="invoice-hours"><?php echo $_SESSION['depart_date'];?></div>
											<div class="invoice-hours"><?php echo $_SESSION['arrive_date'];?></div>
											<div class="invoice-hours"><span class="weight-600 font-16"><?php echo $_SESSION['No_of_students'];?></span></div>
											<div class="invoice-hours"><span class="weight-600 font-16"><?php echo $_SESSION['payment_status'];?></span></div>
											<div class="invoice-rate"><?php echo $_SESSION['ticket_status'];?></div>
										</li>
									</ul>
								</div>
								<div class="invoice-desc-footer">
									<div class="invoice-desc-head clearfix">
										<div class="booked-by">Booked By</div>
										<div class="date-amount">Date of issued</div>
										<div class="date-amount">Total Amount</div>
									</div>
									<div class="invoice-desc-body">
										<ul>
											<li class="clearfix">
												<div class="booked-by font-18 weight-600 text-capitalize">
												<?php echo $_SESSION['booked_by'];?>
												</div>
												<div class="date-amount font-18 weight-600"><?php echo $_SESSION['issued_date'];?></div>
												<div class="date-amount"><span class="weight-600 font-18 text-danger">NGN <?php echo $_SESSION['amount'];?>.00</span></div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<h4 class="text-center pb-20">Thank You!!</h4>
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
		
	<!-- Datatable Setting js -->
	<script src="../vendors/scripts/datatable-setting.js"></script>
</body>
</html>