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
	<title>Payment|Buk Bus Reservation</title>

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
					<div class="form-group enable-book-now">
						<div id="payment-detail">
							<img src="../vendors/images/background/3.jpg" alt="">
							<div id="payment-row">
								<h5>EXCURTION TICKET DETAILS</h5>
								<ul>
									<li><strong>Booking ID.: <?php echo $_SESSION['booking_id']; ?></strong></li>
									<li><strong>Total Amount To Pay:</strong> NGN <?php echo $_SESSION['amount'];?>.00</li>
									<li><strong>Email: </strong><?php echo $_SESSION['staff_email']; ?></li>
									<li><strong>Phone No.: </strong><?php echo $_SESSION['staff_phone']; ?></li>
									<li><strong>Depart From: </strong><?php echo $_SESSION['depart_from'] ." - ". $_SESSION['arrive_to']; ?></li>
									<li><strong>Depart Date: </strong><?php echo $_SESSION['depart_date']; ?></li>
									<li><strong>Arrive Date: </strong><?php echo $_SESSION['arrive_date']; ?></li>
								</ul>				
							</div>
						</div>
					</div>
					<div class="form-group hidden-container enable-pay-now">
						<div id="payment-detail">
							<img src="../vendors/images/background/3.jpg" alt="">
							<div id="payment-row">
								<h5>Payment Instruction</h5>
								<p>Deposite/Transfer <strong class="text-danger">NGN <?php echo $_SESSION['amount'];?>.00</strong> to the Account details below</p>
								<p><span class="text-danger">Notice: </span>Use Booking Id as reference of payment</p>
								<p><span class="text-danger">Notice: </span>Your payment will be verified within 24hours</p>
								<p>Upload Payment Slip or send the slip to our whatsapp link below</p>
								<ul>
									<li><strong>Account Name: </strong>SULAIMAN MUSA YUNUSA</li>
									<li><strong>Bank Name: </strong>First City Monument Bank (FCMB)</li>
									<li><strong>Account Number: </strong>7116974017 &emsp; <strong>Account Type: </strong>Savings</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Make Payment</h2>
						</div>
						<form method="post" action="./staff_payment.php" enctype="multipart/form-data">							
							<?php include('../errors.php'); ?>
							<div id="form">
								<div class="input-group custom enable-book-now align-items-center justify-content-center">
									<div class="icon "><img src="../vendors/images/background/mastercard.png" class="svg" alt=""></div>
									<input type="number" class="form-control form-control-lg" name="e_card" value="<?php echo $e_card; ?>" placeholder="E-card No.">
								</div>
								<div class="form-group hidden-container enable-pay-now">
									<input type="file" class="form-control form-control-lg" name="file" value="<?php echo $file; ?>">
								</div>
							</div>
							<div class="form-group row align-items-center">
								<div class="col-6">
									<div class="form-group  enable-book-now">
										<input class="btn btn-outline-primary btn-lg btn-block" type="submit" name="book_now" value="Book on Hold">
									</div>
									<div class="form-group hidden-container enable-pay-now">
										<label for="book-now" class="btn btn-outline-primary btn-lg btn-block btn-radio">
											<input type="radio" id="book-now" name="radio-grp" value="book_now">
												<strong >Don't Pay Now</strong>
											</label>
									</div>
								</div>
								<div class="col-1">
									<div class="font-16 weight-600 text-center" data-color="#707373"></div>
								</div>
								<div class="col-5">
									<div class="form-group  hidden-container enable-pay-now">
										<input class="btn btn-outline-primary btn-lg btn-block" type="submit" name="pay" value="Submit">
									</div>
									<div class="form-group  enable-book-now">
										<label for="pay-now" class="btn btn-outline-primary btn-lg btn-block btn-radio">
											<input type="radio" id="pay-now" name="radio-grp" value="pay">
												<strong >Pay Now</strong>
											</label>
									</div>
								</div>
							</div>
						</form>
						<div class="row">
							<div class="col-sm-12">
								<div class="input-group mb-0">
									<a class="btn btn-primary btn-lg btn-block" href="./staff_booking.php">Cancel Payment</a>
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
	<script src="../vendors/scripts/core1.js"></script>
	<script src="../vendors/scripts/script.min.js"></script>
	<script src="../vendors/scripts/process.js"></script>
	<script src="../vendors/scripts/layout-settings.js"></script>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script>
		function triggerClick(){
		  document.querySelector('#profile_Image').click();
		}
		function dispalyImage(e){
		  if (e.files[0]){
			  var reader= new FileReader();
			  reader.onload=function(e){
				  document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
			  }
			  reader.readAsDataURL(e.files[0]);
		  }
		}
		$(document).ready(function () {
			$('input[name=radio-grp]').change(function () {
				if($('#pay-now').prop('checked')) {
					$('.enable-pay-now').show();
					$('.enable-book-now').hide();
				} else if ($('#book-now').prop('checked')) {
					$('.enable-pay-now').hide();
					$('.enable-book-now').show();
				}
			});
		
		});
	</script>
</body>
</html>