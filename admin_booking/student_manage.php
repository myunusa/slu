<?php 
  include('../php_admin_booking/view.php');
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
	<title>Student Bookings|Buk Bus Reservation</title>
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
							<li><a href="javascript:;" class="active">Manage Student Booking</a></li>
							<li><a href="./staff_manage.php"> Manage Staff Booking</a></li>
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
			<!-- List of Unused Ticket-->
			<div class="min-height-200px">
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">LIST OF UNUSED TICKETS</h4>
					</div>
					<div class="pb-20">
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
						<table class="table hover data-table-export nowrap">
							<thead>
								<tr>
									<th>S/n</th>
									<th class="table-plus datatable-nosort">Booking Id</th>
									<th>Depart From</th>
									<th>Arrive To</th>
									<th>Departure Date</th>
									<th>Time</th>
									<th>Seat</th>
									<th>Ticket Type</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
							  <?php foreach($fetch_student as $student):
							   $unused =($unused +1);
							   $booking_id= $student['booking_id'];
							   $depart_from= $student['depart_from'];
							   $arrive_to= $student['arrive_to'];
							   $depart_date= $student['depart_date'];
							   $depart_time= $student['depart_time'];
							   $depart_seat= $student['depart_seat'];
							   $ticket_type= $student['ticket_type'];
								echo '
								<tr>
								<td> '.$unused.' </td>
								<td class="text-capitalize"> '.$booking_id.' </td>
								<td class="text-capitalize"> '.$depart_from.' </td>
								<td class="text-capitalize"> '.$arrive_to.' </td>
								<td class="text-capitalize"> '.$depart_date.' </td>
								<td class="text-capitalize"> '.$depart_time.'</td>
								<td class="text-capitalize"> '.$depart_seat.'</td>
								<td class="text-capitalize"> '.$ticket_type.'</td>
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="javascript:;" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="../php_admin_booking/view.php?student_booking='.$booking_id.'"><i class="dw dw-edit2"></i> More Details</a>
											<a class="dropdown-item" href="../php_admin/delete_info.php?student_booking='.$booking_id.'"><i class="dw dw-delete-3"></i> Delete</a>
										</div>
									</div>
								</td>
							</tr>';
							?>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Unused Ticket End -->

			<!-- List of Used Ticket start -->
			<div class="min-height-200px">
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">LIST OF TICKETS</h4>
					</div>
					<div class="pb-20">
						<table class="table hover data-table-export nowrap">
							<thead>
								<tr>
									<th>S/n</th>
									<th class="table-plus datatable-nosort">Booking Id</th>
									<th>Depart From</th>
									<th>Arrive To</th>
									<th>Departure Date</th>
									<th>Time</th>
									<th>Seat</th>
									<th>Ticket Type</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
							  <?php foreach($fetch_students as $student):
							   $used =($used +1);
							   $booking_id= $student['booking_id'];
							   $depart_from= $student['depart_from'];
							   $arrive_to= $student['arrive_to'];
							   $depart_date= $student['depart_date'];
							   $depart_time= $student['depart_time'];
							   $depart_seat= $student['depart_seat'];
							   $ticket_type= $student['ticket_type'];
								echo '
								<tr>
								<td> '.$used.' </td>
								<td class="text-capitalize"> '.$booking_id.' </td>
								<td class="text-capitalize"> '.$depart_from.' </td>
								<td class="text-capitalize"> '.$arrive_to.' </td>
								<td class="text-capitalize"> '.$depart_date.' </td>
								<td class="text-capitalize"> '.$depart_time.'</td>
								<td class="text-capitalize"> '.$depart_seat.'</td>
								<td class="text-capitalize"> '.$ticket_type.'</td>
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="javascript:;" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
										<a class="dropdown-item" href="../php_admin_booking/view.php?student_booking='.$booking_id.'"><i class="dw dw-edit2"></i> More Details</a>
											<a class="dropdown-item" href="../php_admin/delete_info.php?student_booking='.$booking_id.'"><i class="dw dw-delete-3"></i> Delete</a>
										</div>
									</div>
								</td>
							</tr>';
							?>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!--Used Ticket Contact Us End -->
		</div>
	</div>
	<a href="https://wa.me/+2349048429539/?Hi sent payment slip" target="_blank" class="whatsapp whatsapp1 "><i class="fa fa-whatsapp"></i></a>

	<!-- js -->
	<script src="../vendors/scripts/core.js"></script>
	<script src="../vendors/scripts/script.min.js"></script>
	<script src="../vendors/scripts/process.js"></script>
	<script src="../vendors/scripts/layout-settings.js"></script>
	<script src="../src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="../src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="../src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="../src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- buttons for Export datatable -->
	<script src="../src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.print.min.js"></script>
	<!-- Datatable Setting js -->
	<script src="../vendors/scripts/datatable-setting.js"></script></body>
</html>