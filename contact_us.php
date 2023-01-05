<?php include('./php_users/signup.php') ?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Contact Us|Buk Bus Reservation</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="./vendors/images/background/buk-logo.png">
	<link rel="icon" type="image/png" sizes="32x32" href="./vendors/images/background/buk-logo.png">
	<link rel="icon" type="image/png" sizes="16x16" href="./vendors/images/background/buk-logo.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="./vendors/styles/mystyle.css">
	<link rel="stylesheet" type="text/css" href="./vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="./vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="./vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script type = "text/javascript" >
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script> 
</head>
<body class="login-page">
	<?php  if (count($errors) == 0) : ?>
		<!-- <div class="pre-loader">
			<div class="pre-loader-box">
				<div class="loader-logo"><img src="./vendors/images/background/buk-title.png" alt=""></div>
				<div class='loader-progress' id="progress_div">
					<div class='bar' id='bar1'></div>
				</div>
				<div class='percent' id='percent1'>0%</div>
				<div class="loading-text">
					Loading...
				</div>
			</div>
		</div> -->
	<?php  endif ?>
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="javascript:;">
					<img src="./vendors/images/background/buk-title.png" alt="" class="dark-logo">
					<img src="./vendors/images/background/buk-title.png" alt="" class="light-logo">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li>
						<a href="./index.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
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
					<img src="./vendors/images/background/contact_us.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Contact Us</h2>
						</div>
						<form method="post" action="contact_us.php" enctype="multipart/form-data">
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
							<?php include('./errors.php'); ?>
							<div id="form">
								<div class="input-group custom">
									<input type="text" name="fullname" value="<?php echo $fullname;?>" class="form-control form-control-lg" placeholder="Name">
									<div class="input-group-append custom">
										<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
									</div>
								</div>
								<div class="input-group custom">
									<input type="text" name="phone" value="<?php echo $phone;?>" class="form-control form-control-lg" placeholder="Phone Number:">
									<div class="input-group-append custom">
										<span class="input-group-text"><i class="icon-copy fa fa-phone"></i></span>
									</div>
								</div>
								<div class="input-group custom">
									<input type="email" name="email" value="<?php echo $email;?>" class="form-control form-control-lg" placeholder="Email">
									<div class="input-group-append custom">
										<span class="input-group-text"><i class="icon-copy dw dw-email"></i></span>
									</div>
								</div>
								<div class="input-group custom">
									<input type="text" name="subject" value="<?php echo $subject;?>" class="form-control form-control-lg" placeholder="Subject">
									<div class="input-group-append custom">
										<span class="input-group-text"><i class="icon-copy fi-comment"></i></span>
									</div>
								</div>
								<div class="input-group custom">
									<textarea type="text" name="message" row="5" value="<?php echo $message;?>" class="form-control form-control-lg" placeholder="message"></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<input class="btn btn-outline-primary btn-lg btn-block" type="submit" name="submit_contact_us" value="Submit">
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
	<script src="./vendors/scripts/core.js"></script>
	<script src="./vendors/scripts/script.min.js"></script>
	<script src="./vendors/scripts/process.js"></script>
	<script src="./vendors/scripts/layout-settings.js"></script>
</body>
</html>