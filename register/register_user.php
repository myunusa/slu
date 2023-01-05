<?php include('../php_admin/signup.php') ?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Register|Buk Bus Reservation</title>

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
	<!-- switchery css -->
	<link rel="stylesheet" type="text/css" href="../src/plugins/switchery/switchery.min.css">
	<!-- bootstrap-tagsinput css -->
	<link rel="stylesheet" type="text/css" href="../src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">
	<!-- bootstrap-touchspin css -->
	<link rel="stylesheet" type="text/css" href="../src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css">
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
						<a href="../admin_panel/dashboard.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house"></span><span class="mtext">Dashboard</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="text-center col-md-6 col-lg-7">
					<img src="../vendors/images/background/up.avif" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Register</h2>
						</div>
						<form method="post" action="./register_user.php" enctype="multipart/form-data">
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
							<?php include('../errors.php'); ?>
							<?php if ($radio_option == ""):?>
								<input type="radio" style="display:none" id="none" checked="true" name="radio_option" value="">
								<input type="radio" style="display:none" id="student"  name="radio_option" value="student">
								<input type="radio" style="display:none" id="staff" name="radio_option" value="staff">
							<?php endif ?>
							<?php if ($radio_option == "student"):?>
								<input type="radio" style="display:none" id="none" name="radio_option" value="">
								<input type="radio" style="display:none" id="student" checked="true" name="radio_option" value="student">
								<input type="radio" style="display:none" id="staff" name="radio_option" value="staff">
							<?php endif ?>
							<?php if ($radio_option == "staff"):?>
								<input type="radio" style="display:none" id="none" name="radio_option" value="">
								<input type="radio" style="display:none" id="student"  name="radio_option" value="student">
								<input type="radio" style="display:none" id="staff" checked="true" name="radio_option" value="staff">
							<?php endif ?>
							<!-- <input type="radio" style="display:none" id="student" name="radio_option" value="student">
							<input type="radio" style="display:none" id="staff" name="radio_option" value="staff"> -->
							<div class="select-role form-group text-center">
								<div  class="btn-group btn-group-toggle" data-toggle="buttons">
									<?php if ($radio_option == ""):?>
										<label for="none" style="display:none" class="btn-radio btn active">
										<input type="radio" id="none" checked="true" name="radio_option" value="">
										</label>
										<label for="student" class="btn-radio btn active">
											<input type="radio" id="student" name="radio_option" value="student">
											<div class="icon"><img src="../vendors/images/person.svg" class="svg" alt=""></div>
											<span>I'm Student</span>
										</label>
										<label for="staff" class="btn-radio btn">
											<div class="icon"><img src="../vendors/images/briefcase.svg" class="svg" alt=""></div>
											<input type="radio" id="staff" name="radio_option" value="staff">
											<span>I'm Staff</span>
										</label>
									<?php endif ?>
									<?php if ($radio_option == "student"):?>
										<label for="student" class="btn-radio btn active">
											<input type="radio" id="student" checked="true" name="radio_option" value="student">
											<div class="icon"><img src="../vendors/images/person.svg" class="svg" alt=""></div>
											<span>I'm Student</span>
										</label>
										<label for="staff" class="btn-radio btn">
											<div class="icon"><img src="../vendors/images/briefcase.svg" class="svg" alt=""></div>
											<input type="radio" id="staff" name="radio_option" value="staff">
											<span>I'm Staff</span>
										</label>
									<?php endif ?>
									<?php if ($radio_option == "staff"):?>
										<label for="student" class="btn-radio btn active">
											<input type="radio" id="student" name="radio_option" value="student">
											<div class="icon"><img src="../vendors/images/person.svg" class="svg" alt=""></div>
											<span>I'm Student</span>
										</label>
										<label for="staff" class="btn-radio btn">
											<input type="radio" id="staff" checked="true" name="radio_option" value="staff">
											<div class="icon"><img src="../vendors/images/briefcase.svg" class="svg" alt=""></div>
											<span>I'm Staff</span>
										</label>
									<?php endif ?>
								</div>
							</div>
							<div id="form">
								<div class="input-group custom">
									<input type="text" class="form-control form-control-lg" name="fullname" value="<?php echo $fullname; ?>" placeholder="Name">
									<div class="input-group-append custom">
										<span class="input-group-text"><i class="dw dw-user"></i></span>
									</div>
								</div>
								<?php if ($radio_option == "student"):?>
									<div class="form-group enable-student">
										<input type="text" name="regno" class="form-control form-control-lg" value="<?php echo $regno; ?>" placeholder="Registration Number">
									</div>
									<div class="form-group enable-student">
										<input type="text" name="jambno" class="form-control form-control-lg" value="<?php echo $jambno; ?>" placeholder="Jamb Number">
									</div>
									<div class="form-group hidden-container enable-staff">
										<select class="custom-select2 form-control" name="department" style="width: 100%; height: 38px;">
											<?php if (count($errors) > 0) : ?>
												<option value="<?php echo $department; ?>" ><?php echo $department; ?></option>
											<?php endif ?>
											<option value="Department" hidden>Department</option>
											<optgroup label="FCSIT">
												<option value="Computer Science">Computer Science</option>
												<option value="Information Tech.">Information Tech.</option>
												<option value="Software">Software</option>
												<option value="Cyber Security">Cyber Security</option>
											</optgroup>
											<optgroup label="FCSIT">
												<option value="Computer Science">Computer Science</option>
												<option value="Information Tech.">Information Tech.</option>
												<option value="Software">Software</option>
												<option value="Cyber Security">Cyber Security</option>
											</optgroup>
										</select>
									</div>
									<div class="form-group hidden-container enable-staff">
										<input type="text" name="staff_id" class="form-control form-control-lg" placeholder="Staff Id">
									</div>
								<?php endif ?>
								<?php if ($radio_option == "staff"):?>
									<div class="form-group enable-staff">
										<select class="custom-select2 form-control" name="department" style="width: 100%; height: 38px;">
											<?php if (count($errors) > 0) : ?>
												<option value="<?php echo $department; ?>" ><?php echo $department; ?></option>
											<?php endif ?>
											<option value="Department" hidden>Department</option>
											<optgroup label="FCSIT">
												<option value="Computer Science">Computer Science</option>
												<option value="Information Tech.">Information Tech.</option>
												<option value="Software">Software</option>
												<option value="Cyber Security">Cyber Security</option>
											</optgroup>
											<optgroup label="FCSIT">
												<option value="Computer Science">Computer Science</option>
												<option value="Information Tech.">Information Tech.</option>
												<option value="Software">Software</option>
												<option value="Cyber Security">Cyber Security</option>
											</optgroup>
										</select>
									</div>
									<div class="form-group enable-staff">
										<input type="text" name="staff_id" class="form-control form-control-lg" placeholder="Staff Id">
									</div>
									<div class="form-group hidden-container enable-student">
										<input type="text" name="regno" class="form-control form-control-lg" value="<?php echo $regno; ?>" placeholder="Registration Number">
									</div>
									<div class="form-group hidden-container enable-student">
										<input type="text" name="jambno" class="form-control form-control-lg" value="<?php echo $jambno; ?>" placeholder="Jamb Number">
									</div>
								<?php endif ?>
								<?php if ($radio_option == ""):?>
									<div class="form-group hidden-container enable-student">
										<input type="text" name="regno" class="form-control form-control-lg" value="<?php echo $regno; ?>" placeholder="Registration Number">
									</div>
									<div class="form-group hidden-container enable-student">
										<input type="text" name="jambno" class="form-control form-control-lg" value="<?php echo $jambno; ?>" placeholder="Jamb Number">
									</div>
									<div class="form-group hidden-container enable-staff">
										<select class="custom-select2 form-control" name="department" style="width: 100%; height: 38px;">
											<?php if (count($errors) > 0) : ?>
												<option value="<?php echo $department; ?>" ><?php echo $department; ?></option>
											<?php endif ?>
											<option value="Department" hidden>Department</option>
											<optgroup label="FCSIT">
												<option value="Computer Science">Computer Science</option>
												<option value="Information Tech.">Information Tech.</option>
												<option value="Software">Software</option>
												<option value="Cyber Security">Cyber Security</option>
											</optgroup>
											<optgroup label="FCSIT">
												<option value="Computer Science">Computer Science</option>
												<option value="Information Tech.">Information Tech.</option>
												<option value="Software">Software</option>
												<option value="Cyber Security">Cyber Security</option>
											</optgroup>
										</select>
									</div>
									<div class="form-group hidden-container enable-staff">
										<input type="text" name="staff_id" class="form-control form-control-lg" placeholder="Staff Id">
									</div>
								<?php endif ?>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<input class="btn btn-outline-primary btn-lg btn-block" type="submit" name="register_user" value="Register">
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
	<!-- switchery js -->
	<script src="../src/plugins/switchery/switchery.min.js"></script>
	<!-- bootstrap-tagsinput js -->
	<script src="../src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
	<!-- bootstrap-touchspin js -->
	<script src="../src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
	<script src="../vendors/scripts/advanced-components.js"></script>
	<script src="../../vendors/scripts/core1.js"></script>
	<script>
		$(document).ready(function () {
			$('input[name=radio_option]').change(function () {
				if($('#student').prop('checked')) {
					$('.enable-student').show();
					$('.enable-staff').hide();
				} else if ($('#staff').prop('checked')) {
					$('.enable-student').hide();
					$('.enable-staff').show();
				}
			});
		
		});
	</script>
</body>
</html>