<?php 
  include('../php_admin_booking/student.php');
  if (!isset($_SESSION['admin'])) {
  	header('location: ../register/admin_signin.php');
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
						<a href="../admin_booking/student_managed.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-id-card"></span><span class="mtext">Manage</span>
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
					<div id="payment-detail">
					<img src="../vendors/images/background/3.jpg" alt="">
					<div id="payment-row">
						<h5><?php echo $_SESSION['ticket_type']; ?> TICKET</h5>
						<ul>
							<li><strong>Booking ID.: <?php echo $_SESSION['booking_id']; ?></strong></li>
							<li><strong>Email: </strong><?php echo $_SESSION['student_email']; ?></li>
							<li><strong>Phone No.: </strong><?php echo $_SESSION['student_phone']; ?></li>
							<li><strong>Depart From: </strong><?php echo $_SESSION['depart_from'] ." - ". $_SESSION['arrive_to']; ?></li>
							<li><strong>Depart Date: </strong><?php echo $_SESSION['depart_date']; ?>&emsp; <strong>Depart Time: </strong><?php echo $_SESSION['depart_time']; ?></li>
							<?php if($_SESSION['ticket_type']== "Return"): ?>
								<li><strong>Arrive From: </strong><?php echo $_SESSION['arrive_to'] ." - ". $_SESSION['depart_from']; ?></li>
								<li><strong>Arrive Date: </strong><?php echo $_SESSION['arrive_date']; ?>&emsp; <strong>Arrive Time: </strong><?php echo $_SESSION['arrive_time']; ?></li>
						  	<?php endif ?>
							<li><strong>Total Amount To Pay:</strong> NGN<?php echo $_SESSION['student_amount'];?>.00</li>
						</ul>
					</div>
					</div>
				</div>
				
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h5 class="text-center text-primary">UPDATE <span style="color:red"><?php echo $_SESSION['booking_id']; ?></span> BOOKING</h5>
						</div>
						<form method="post" action="./student_update.php" enctype="multipart/form-data">
							<?php include('../errors.php'); ?>

							<?php if($_SESSION['ticket_status1'] =="Used"): ?>
								<?php echo "You have used departure ticket"; ?>
							<?php endif ?>

							<?php if($_SESSION['ticket_status2'] =="Used"): ?>
								<?php echo array_push($errors, "You have used Return"); ?>
							<?php endif ?>

							<div class="form-group text-center">

								<?php if($_SESSION['ticket_type']== "One way"): ?>
										<?php if($_SESSION['ticket_status1'] =="Not used"): ?>
										<label for="oneway" class="btn-radio">
											<input type="radio"id="oneway" checked="true" name="radio_option" value="One way">
											<svg width="40px" height="40px" viewBox="0 0 20 20">
											<circle cx="10" cy="10" r="9"></circle>
											<path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
											<path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
											</svg>
											<span style="margin-right: 50px;">ONE-WAY</span>
										</label>
										<?php endif ?>
								<?php endif ?>

								<?php if($_SESSION['ticket_type']== "Return"): ?>
									<?php if($_SESSION['ticket_status2'] =="Not used"): ?>
										<label for="Return" class="btn-radio">
											<input type="radio"id="Return" checked="true"name="radio_option" value="Return">
											<svg width="40px" height="40px" viewBox="0 0 20 20">
											<circle cx="10" cy="10" r="9"></circle>
											<path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
											<path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
											</svg>
											<span >TWO-WAY</span>
										</label>
									<?php endif ?>
								<?php endif ?>
							</div>
							<div id="form">
								<div class="row">
									<?php if($_SESSION['ticket_status1'] =="Not used" || $_SESSION['ticket_status2'] =="Not used" ): ?>
										<div class="col-md-6">
											<div class="form-group">
												<select name="depart_from" class="custom-select form-control">
													<option value="" hidden>From</option>
													<?php if (count($errors) > 0) : ?>
														<option value="<?php echo $depart_from; ?>" ><?php echo $depart_from;?></option>
													<?php endif ?>
													<option value="Old Site">Old Site</option>
													<option value="New Site">New Site</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<select name="arrive_to" class="custom-select form-control">
												<?php if (count($errors) > 0) : ?>
													<option value="<?php echo $arrive_to; ?>" ><?php echo $arrive_to;?></option>
												<?php endif ?>
												<option value="" hidden>To</option>
												<option value="New Site">New Site</option>
												<option value="Old Site">Old Site</option>
												</select>
											</div>
										</div>
									<?php endif ?>
								</div>
								<?php if($_SESSION['ticket_status1'] =="Not used"): ?>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<input type="date" class="form-control form-control-lg" name="depart_date" value="<?php echo $depart_date; ?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<select name="depart_time" class=" text-center form-control">
													<?php if (count($errors) > 0) : ?>
													<option value="<?php echo $depart_time; ?>" ><?php echo $depart_time; ?></option>
													<?php endif ?>
													<option value="" hidden >Time</option>
													<option value="07:30">07:30AM</option>
													<option value="09:30">09:30AM</option>
													<option value="10:30">10:30AM</option>
													<option value="12:30">12:30PM</option>
													<option value="13:30">01:30PM</option>
													<option value="15:30">03:30PM</option>
													<option value="16:30">04:30PM</option>
													<option value="18:30">06:30PM</option>
												</select>
											</div>
										</div>
									</div>
								<?php endif ?>

								<?php if($_SESSION['ticket_status2'] =="Not used" ): ?>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group  enable-return">
												<input type="date" class="form-control form-control-lg" name="arrive_date" value="<?php echo $arrive_date; ?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group  enable-return">
												<select name="arrive_time" class="text-center form-control">
													<?php if (count($errors) > 0) : ?>
													<option value="<?php echo $arrive_time; ?>" ><?php echo $arrive_time; ?></option>
													<?php endif ?>
													<option value="" hidden >Time</option>
													<option value="07:30">07:30AM</option>
													<option value="09:30">09:30AM</option>
													<option value="10:30">10:30AM</option>
													<option value="12:30">12:30PM</option>
													<option value="13:30">01:30PM</option>
													<option value="15:30">03:30PM</option>
													<option value="16:30">04:30PM</option>
													<option value="18:30">06:30PM</option>
												</select>
											</div>
										</div>
									</div>
								<?php endif ?>
							</div>
							<?php if($_SESSION['ticket_status1'] =="Not used" || $_SESSION['ticket_status2'] =="Not used" ): ?>
								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-0">
											<input class="btn btn-primary btn-lg btn-block" type="submit" name="update_booking" value="SEARCH">
										</div>
									</div>
								</div>
							<?php endif ?>
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
	<script>
		$(document).ready(function () {
			$('input[name=radio_option]').change(function () {
				if($('#oneway').prop('checked')) {
					$('.enable-return').hide();
				} else if ($('#Return').prop('checked')) {
					$('.enable-return').show();
				}
			});
		
		});
	</script>
</body>
</html>
								<!-- <div class="custom-control custom-radio custom-control-inline pb-0">
									<label for="oneway" class="btn-radio">
										<input type="radio" id="oneway" checked="true" name="radio_option" value="One way">
										<svg width="20px" height="20px" viewBox="0 0 20 20">
										<circle cx="10" cy="10" r="9"></circle>
										<path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
										<path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
										</svg>
										<span>ONE WAY</span>
									</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline pb-0">
									<label for="Return" class="btn-radio">
										<input type="radio" id="Return" name="radio_option" value="Return">
										<svg width="20px" height="20px" viewBox="0 0 20 20">
										<circle cx="10" cy="10" r="9"></circle>
										<path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
										<path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
										</svg>
										<span>RETURN</span>
									</label>
								</div> -->