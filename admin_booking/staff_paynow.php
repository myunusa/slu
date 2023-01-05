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
			<!-- <div class="login-menu">
				<ul>
					<li>
						<a href="./staff_managed.php" class="dropdown-toggle no-arrow">
							<span class="icon-copy ion-arrow-left-a"></span><span class="mtext">Back</span>
						</a>
					</li>
				</ul>
			</div> -->
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="text-center col-md-6 col-lg-7">
					<div class="form-group">
						<div id="payment-detail">
							<img src="../vendors/images/background/3.jpg" alt="">
							<div id="payment-row">
								<h5>Payment Instruction</h5>
								<p>Deposite/Transfer <strong>NGN 80000.00</strong> to the Account details below</p>
								<p><span class="text-danger">Notice: </span>Use Booking Id as reference of payment</p>
								<p><span class="text-danger">Notice: </span>You payment will be verified within 48hours</p>
								<p>Upload Payment Slip and Click on Paid</p>
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
							<h2 class="text-center text-primary">Upload Payment Slip</h2>
						</div>
						<form method="post" action="./staff_paynow.php" enctype="multipart/form-data">						
							<?php include('../errors.php'); ?>
							<div id="form">
								<div class="form-group">
									<input type="file" class="form-control form-control-lg" name="file" value="<?php echo $file; ?>">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<input class="btn btn-primary btn-lg btn-block" type="submit" name="pay_now" value="Submit">
									</div>
									<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373"></div>
									<div class="input-group mb-0">
										<a class="btn btn-outline-primary btn-lg btn-block" href="./Managed.html">Don't Pay Now</a>
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
	</script>
</body>
</html>