<?php 
  include('../php_admin/print_info.php');
  if (!isset($_SESSION['admin'])) {
  	header('location: ../register/admin_signin.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['admin']);
  	header("location: ../register/admin_signin.php");
  }
?>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Print|Buk Bus Reservation</title>
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
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/fancybox/dist/jquery.fancybox.css">
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
<body onload="window.print()">
	<div class="mobile-menu-overlay"></div>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			
			<div class="card-box mb-30">
				<div class="pb-20">
					<div class="invoice-wrap ">
						<div class="invoice-box">
							<div class="invoice-header">
								<div class="logo text-center">
									<img src="../vendors/images/deskapp-logo.png" alt="">
								</div>
							</div>
							<h4 class="text-center text-uppercase mb-30 weight-600"><?php echo $_SESSION['regno']; ?> DETAILS</h4>
							<div class="row pb-30">
								<div class="col-md-20">
									<ul>
										<li><img src="../vendors/images/profile/student/<?php echo $_SESSION['student_image'];?>" style="width:100px; height:100px; border-radius:70%; border: 3px solid #045caf; margin-bottom: 10px;" alt=""></li>
										<li>&emsp;</li>
										<h5 class="mb-15">Registration Number: </strong><?php echo $_SESSION['regno']; ?></h5>
										
										<li><strong>Name: </strong><?php echo $_SESSION['student_fullname']; ?></br></li>
										<li>&emsp;</li>
										<li><strong>Jamb Number: </strong><?php echo $_SESSION['jambno']; ?></br></li>
										<li>&emsp;</li>
										<li><strong>Email: </strong><?php echo $_SESSION['student_email']; ?></li>
										<li>&emsp;</li>
										<li><strong>Phone Number: </strong><?php echo $_SESSION['student_phone']; ?></li>
										<li>&emsp;</li>
										<li><strong>E_Card: </strong><?php echo $_SESSION['student_e_card']; ?></br></li>
										<li>&emsp;</li>
										<li><strong>Amount Balance: </strong><?php echo $_SESSION['student_e_unit']; ?></br></li>
										<li>&emsp;</li>
										<li><strong>Verify Status: </strong><?php echo $_SESSION['student_verify']; ?></br></li>
										<li>&emsp;</li>
										<li><strong>Password: </strong><?php echo $_SESSION['student_password']; ?></li>
									</ul>
								</div>
							</div>
							<a class="btn btn-danger d-print-none" href="./signup_student.php" role="button">Cancel</a>
							<a class="btn btn-success d-print-none" href="javascript:;" role="button"  name="print" onclick="window.print();">Print Now</a>
						</div>
					</div>
				
				</div>
			</div>
		</div>
	</div>
	<a href="https://wa.me/+2349048429539/?Hi sent payment slip" target="_blank" class="whatsapp whatsapp1 "><i class="fa fa-whatsapp"></i></a>

	<!-- js -->
	<script src="../vendors/scripts/core.js"></script>
	<script src="../vendors/scripts/main.js"></script>
	<script src="../vendors/scripts/script.min.js"></script>
	<script src="../vendors/scripts/process.js"></script>
	<script src="../vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="../vendors/scripts/dashboard.js"></script>
		<!-- fancybox Popup Js -->
		<script src="src/plugins/fancybox/dist/jquery.fancybox.js"></script>
		
	<!-- Datatable Setting js -->
	<script src="../vendors/scripts/datatable-setting.js"></script>
</body>
</html>