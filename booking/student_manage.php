<?php 
  include('../php_booking/view.php');
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
	<title>Manage Booking|Buk Bus Reservation</title>
	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="../vendors/images/background/buk-logo.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../vendors/images/background/buk-logo.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../vendors/images/background/buk-logo.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../vendors/styles/mystyle.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="../src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/style.css">

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
				<h6 class="text-danger">Active: <strong class="text-uppercase text-primary"> <?php echo $_SESSION['student_fullname']; ?></strong></h6>
			</div>
		</div>
		<div class="header-right">
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="javascript:;" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="../vendors/images/profile/student/<?php echo $_SESSION['student_image']; ?>" style="width:100%; height:100%"alt="">
						</span>
						<span class="user-name text-uppercase"><?php echo $_SESSION['username']; ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item active" href="javascript:;"><i class="dw dw-user1"></i> Profile</a>
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
						<a href="../users/student_dashboard.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user"></span><span class="mtext">Dashboard</span>
						</a>
					</li>
					<li>
						<a href="./student_booking.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-bus"></span><span class="mtext">New Booking</span>
						</a>
					</li>
					<li>
						<a href="javascript:;" class="dropdown-toggle no-arrow active">
							<span class="micon dw dw-id-card"></span><span class="mtext">Manage Booking</span>
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
						<table class="table hover data-table-export nowrap">
							<thead>
								<tr>
									<th>S/n</th>
									<th class="table-plus datatable-nosort">Booking Id</th>
									<th>Depart From</th>
									<th>Arrive To</th>
									<th>Depart Date</th>
									<th>Depart Time</th>
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
							   $ticket_type= $student['ticket_type'];
								echo '
								<tr>
								<td> '.$unused.' </td>
								<td class="text-capitalize"> '.$booking_id.' </td>
								<td class="text-capitalize"> '.$depart_from.' </td>
								<td class="text-capitalize"> '.$arrive_to.' </td>
								<td class="text-capitalize"> '.$depart_date.' </td>
								<td class="text-capitalize"> '.$depart_time.' </td>
								<td class="text-capitalize"> '.$ticket_type.'</td>
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="javascript:;" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="../php_booking/view.php?student_booking='.$booking_id.'"><i class="dw dw-edit2"></i> More Details</a>
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
									<th>Depart Date</th>
									<th>Depart Time</th>
									<th>Ticket Type</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
							  <?php foreach($fetch_student as $student):
							   $used =($used +1);
							   $booking_id= $student['booking_id'];
							   $depart_from= $student['depart_from'];
							   $arrive_to= $student['arrive_to'];
							   $depart_date= $student['depart_date'];
							   $depart_time= $student['depart_time'];
							   $ticket_type= $student['ticket_type'];
								echo '
								<tr>
								<td> '.$used.' </td>
								<td class="text-capitalize"> '.$booking_id.' </td>
								<td class="text-capitalize"> '.$depart_from.' </td>
								<td class="text-capitalize"> '.$arrive_to.' </td>
								<td class="text-capitalize"> '.$depart_date.' </td>
								<td class="text-capitalize"> '.$depart_time.' </td>
								<td class="text-capitalize"> '.$ticket_type.'</td>
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="javascript:;" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="../php_booking/view.php?student_booking='.$booking_id.'"><i class="dw dw-edit2"></i> More Details</a>
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
	<script src="../vendors/scripts/datatable-setting.js"></script>
</body>
</html>