<?php 
  include('../php_admin/update_info.php');
  if (!isset($_SESSION['admin'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../register/admin_signin.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Change Password|Buk Bus Reservation</title>

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
	<?php  if (count($errors) == 0) : ?>
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
	<?php  endif ?>
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
						<a href="../admin_panel/dashboard.php" class="dropdown-toggle no-arrow">
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
					<img src="../vendors/images/background/forgot-password.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Change Password</h2>
						</div>
						<form method="post" action="./admin_update.php" enctype="multipart/form-data">
							<?php include('../errors.php'); ?>
							<div id="form">
							<div class="input-group custom">
									<input type="password" id="old_password" class="form-control form-control-lg" name="old_password" value="<?php echo $old_password; ?>" placeholder="Old Password">
									<div class="input-group-append custom">
										<span class="input-group-text"><i class="dw dw-padlock1" onclick="old_password()"></i></span>
									</div>
								</div>
								<div class="input-group custom">
									<input type="password" id="password" class="form-control form-control-lg" name="password" value="<?php echo $password; ?>" placeholder="New Password">
									<div class="input-group-append custom">
										<span class="input-group-text"><i class="dw dw-padlock1" onclick="showpassword()"></i></span>
									</div>
								</div>
								<div class="input-group custom">
									<input type="password" id="password_1" class="form-control form-control-lg" name="password_1" placeholder="Confirm Password">
									<div class="input-group-append custom">
										<span class="input-group-text"><i class="dw dw-padlock1" onclick="password_1()"></i></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<input class="btn btn-outline-primary btn-lg btn-block" type="submit" name="change_password" value="Change Password">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="../vendors/scripts/core.js"></script>
	<script src="../vendors/scripts/script.min.js"></script>
	<script src="../vendors/scripts/process.js"></script>
	<script src="../vendors/scripts/layout-settings.js"></script>
	<script>
		function old_password(){
			var show =document.getElementById("old_password");
			if(show.type === "password"){
				show.type ="text";
			}else{show.type="password"}
		}
		function showpassword(){
			var show =document.getElementById("password");
			if(show.type === "password"){
				show.type ="text";
			}else{show.type="password"}
		}
		function password_1(){
			var show =document.getElementById("password_1");
			if(show.type === "password"){
				show.type ="text";
			}else{show.type="password"}
		}
	</script>
	
</body>
</html>