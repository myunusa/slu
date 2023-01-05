<?php 
  include('../php_booking/staff.php');
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
	<title>Booking|Buk Bus Reservation</title>

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
<body class="login-page">
	<?php if (count($errors) == 0) : ?>
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
	<?php endif ?>
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="javascript:;">
					<img src="../vendors/images/background/buk-title.png" alt="" class="dark-logo">
					<img src="../vendors/images/background/buk-title.png" alt="" class="light-logo">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li>
						<a href="../users/staff_dashboard.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house"></span><span class="mtext">Dashboard</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="text-center col-md-6 col-lg-7">
					<img src="../vendors/images/background/booking.jpg" alt="">
				</div>
				
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">NEW BOOKING</h2>
						</div>
						<form method="post" action="./staff_booking.php" enctype="multipart/form-data">
							<?php include('../errors.php'); ?>
							<div id="form">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<select name="depart_from" class="custom-select form-control">
											  <?php if (count($errors) > 0) : ?>
												<option value="<?php echo $depart_from; ?>" ><?php echo $depart_from;?></option>
											  <?php endif ?>
											  <option value="From" hidden>From</option>
											  <option value="Old Site">Old Site</option>
											  <option value="New Site">New Site</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<select name="arrive_to" class="custom-select form-control">
											 <?php if (count($errors) > 0) : ?>
												<option value="<?php echo $arrive_to; ?>"><?php echo $arrive_to; ?></option>
											  <?php endif ?>
											  <option value="TO" hidden >TO</option>
											  <option value="Kano">Kano</option>
											  <option value="North West">North West</option>
											  <option value="North East">North East</option>
											  <option value="North Central">North Central</option>
											  <option value="South East">South East</option>
											  <option value="South South">South South</option>
											  <option value="South West">South West</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="date" class="form-control form-control-lg" name="depart_date" value="<?php echo $depart_date; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="date" class="form-control form-control-lg" name="arrive_date" value="<?php echo $arrive_date; ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="number" class="form-control form-control-lg" name="No_of_students" value="<?php echo $No_of_students; ?>" class="input date1" placeholder="No of Students">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control form-control-lg" name="address"  value="<?php echo $address; ?>" placeholder="Enter Address">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<input class="btn btn-primary btn-lg btn-block" type="submit" name="staff_booking" value="SEARCH">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<a href="https://wa.me/+2349048429539/?Hi sent payment slip" target="_blank" class="whatsapp whatsapp1 "><i class="fa fa-whatsapp"></i></a>

	<!-- js -->
	<script src="../vendors/scripts/core.js"></script>
	<script src="../vendors/scripts/core1.js"></script>
	<script src="../vendors/scripts/script.min.js"></script>
	<script src="../vendors/scripts/process.js"></script>
	<script src="../vendors/scripts/layout-settings.js"></script>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript"></script>
</body>
</html>