<?php 
  include('../php_booking/staff.php');
  if (!isset($_SESSION['username'])) {
  	header('location: ../register/user_signin.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Update Booking|Buk Bus Reservation</title>

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
						<a href="./staff_managed.php" class="dropdown-toggle no-arrow">
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
						<h5>EXCURTION TICKET DETAILS</h5>
                  <ul>
                    <li><strong>Booking ID.: </strong><?php echo $_SESSION['booking_id']; ?></li>
                    <li><strong>Booking ID.: </strong><?php echo $_SESSION['staff_email']; ?></li>
                    <li><strong>Depart From: </strong><?php echo $_SESSION['depart_from'] ." - ". $_SESSION['arrive_to']; ?></li>
                    <li><strong>Depart Date: </strong><?php echo $_SESSION['depart_date']; ?> &emsp; <strong>Arrive Date: </strong><?php echo $_SESSION['arrive_date']; ?></li>
                    <li><strong>Total Amount:</strong> NGN<?php echo $_SESSION['amount']; ?></li>
                  </ul>					</div>
					</div>
				</div>
				
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">UPDATE BOOKING</h2>
						</div>
						<form method="post" action="./staff_update.php" enctype="multipart/form-data">							
							<?php include('../errors.php'); ?>
							<div id="form">
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
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<input class="btn btn-primary btn-lg btn-block" type="submit" name="update_booking" value="SEARCH">
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