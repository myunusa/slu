<?php 
  include('../php_admin/update_info.php');
  if (!isset($_SESSION['admin'])) {
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
	<title>Update Infor.|Buk Bus Reservation</title>

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
						<a href="./admin.php" class="dropdown-toggle no-arrow">
							<span class="icon-copy ion-arrow-left-a"></span><span class="mtext">Back</span>
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
						<h5><?php echo $_SESSION['user_name']; ?> DETAILS</h5>
						
						<ul>
						  <li><img src="../vendors/images/profile/admin/<?php echo $_SESSION['image'];?>" style="width:75px; height:70px border-radius:70%; border: 3px solid #045caf; margin-bottom: 10px;" alt=""></li>
						 <br> 
						  <li>&emsp;</li>
						  <li class="text-capitalize"><strong>Name: </strong><?php echo $_SESSION['fullname']; ?></li>
						  <li><strong>Username: </strong><?php echo $_SESSION['user_name']; ?></li>
						  <li><strong>Phone Number: </strong><?php echo $_SESSION['phone']; ?></li>
						  <li><strong>Email: </strong><?php echo $_SESSION['email']; ?></li>
						  <li><strong>Password: </strong><?php echo $_SESSION['password']; ?></li>
						</ul>
					</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Update Informations</h2>
						</div>
						<form method="post" action="./update_admin.php" enctype="multipart/form-data">
							<?php include('../errors.php'); ?>
							<div id="form">
								<div id="img">
								<img src="../vendors/images/profile/defaultimage.JPG" onclick="triggerClick()" id="profileDisplay">
                          		<input type="file" id="profile_Image" onchange="dispalyImage(this)" name="file" value="<?php echo $file; ?>" class="input" style="display: none;" >
								</div>
								<div class="input-group custom">
									<input type="text" class="form-control form-control-lg" name="phone" value="<?php echo $phone; ?>"placeholder="Phone Number">
									<div class="input-group-append custom">
										<span class="input-group-text"><i class="icon-copy fa fa-phone"></i></span>
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
										<input class="btn btn-outline-primary btn-lg btn-block" type="submit" name="admin_update" value="Update">
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
	<script src="../vendors/scripts/script.min.js"></script>
	<script src="../vendors/scripts/process.js"></script>
	<script src="../vendors/scripts/layout-settings.js"></script>
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