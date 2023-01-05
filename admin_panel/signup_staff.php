<?php 
  include('../php_admin/view.php');
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
	<title>Staff|Buk Bus Reservation</title>
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
						<a href="./dashboard.php" class="dropdown-toggle no-arrow">
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
								<li><a href="./admin.php">Admin</a></li>
								<li><a href="./buk_student.php">BUK Student</a></li>
								<li><a href="./buk_staff.php">BUK Staff</a></li>
							<?php endif ?>
							<li><a href="./signup_student.php">Signup Student</a></li>
							<li><a href="javascript:;" class="active">Signup Staff</a></li>
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
						<a href="./contact_us.php" class="dropdown-toggle">
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
			<!-- Buk student list start -->
			<div class="min-height-200px">
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">LIST OF SIGNUP STAFF</h4>
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
									<th class="table-plus datatable-nosort">Full Name</th>
									<th>Staff Id</th>
									<th>Email</th>
									<th>Verify Status</th>
									<th>Image</th>
									<th class="datatable-nosort">Action</th>
									<th>Departmnet</th>
									<th>Phone Number</th>
									<th>E_Card</th>
									<th>Amount to be paid</th>
									<th>Token</th>
									<th>Password</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($fetch_signup_staff as $staff):
								$sn =($sn +1);
								$fullname=$staff['fullname'];
								$staff_id=$staff['staff_id'];
								$department=$staff['department'];
								$email=$staff['email'];
								$phone=$staff['phone'];
								$e_card=$staff['e_card'];
								$e_unit=$staff['e_unit'];
								$token=$staff['token'];
								$verify=$staff['verify'];
								$password=$staff['password'];
								$image=$staff['image'];
								echo '
								<tr>
								<td> '.$sn.' </td>
								<td class="text-capitalize"> '.$fullname.' </td>
								<td class="text-capitalize"> '.$staff_id.' </td>
								<td class="text-capitalize"> '.$email.' </td>
								<td class="text-capitalize"> '.$verify.' </td>
								<td> <img src="../vendors/images/profile/staff/'.$image.'" style="width:40px; height:40px"> </td>
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="javascript:;" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
										<a class="dropdown-item" href="../php_admin/view.php?staff='.$staff_id.'"><i class="dw dw-edit2"></i> Edit</a>
										<a class="dropdown-item" href="../php_admin/print_info.php?print_staff='.$staff_id.'"><i class="dw dw-print"></i> Print</a>
										<a class="dropdown-item" href="../php_admin/delete_info.php?delete_staff='.$staff_id.'"><i class="dw dw-delete-3"></i> Delete</a>
										</div>
									</div>
								</td>
								<td class="text-capitalize"> '.$department.' </td>
								<td class="text-capitalize"> '.$phone.' </td>
								<td class="text-capitalize"> '.$e_card.' </td>
								<td class="text-capitalize"> '.$e_unit.' </td>
								<td class="text-capitalize"> '.$token.' </td>
								<td class="text-center"> '.$password.' </td>
								
									</tr>';
									?>
							  <?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- buk staff list End -->
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