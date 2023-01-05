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
		function preventBack() { window.history.forward(); }
		setTimeout("preventBack()", 0);
		window.onunload = function () { null };

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
							<h4 class="text-center mb-30 weight-600">BOOKING DETAILS</h4>
							<div class="row pb-30">
								<div class="col-md-6">
									<img src="../vendors/images/profile/staff/<?php echo $_SESSION['staff_image']; ?>" style="width:130px; 
									height:130px; border-radius:70%; border: 3px solid #045caf; margin-bottom: 10px;"alt="">
									<h5 class="mb-15">Booking Id: <?php echo $_SESSION['booking_id'];?> </h5>
									<p class="font-14 mb-5">Staff Id: <strong class="weight-600"><?php echo $_SESSION['staff_id'];?></strong></p>
									<p class="font-14 mb-5">Department: <strong class="weight-600"><?php echo $_SESSION['department'];?></strong></p>
									<p class="font-14 mb-5">Email: <strong class="weight-600"><?php echo $_SESSION['staff_email'];?></strong></p>
									<p class="font-14 mb-5">Phone Number: <strong class="weight-600"><?php echo $_SESSION['staff_phone'];?></strong></p>
								</div>
							</div>

							<div class="invoice-desc pb-30">
								<h6 class="mb-15">Booking Info.</h6>
								<div class="invoice-desc-head clearfix">
									<div class="invoice-sub">Depart From</div>
									<div class="invoice-hours">Depart Date</div>
									<div class="invoice-hours">arrival Date</div>
									<div class="invoice-hours">Students</div>
									<div class="invoice-hours">Payment</div>
									<div class="invoice-rate">Ticket Status</div>
								</div>
								<div class="invoice-desc-body">
									<ul>
										<li class="clearfix">
											<div class="invoice-sub"><?php echo $_SESSION['depart_from'];?> - <?php echo $_SESSION['arrive_to'];?></div>
											<div class="invoice-hours"><?php echo $_SESSION['depart_date'];?></div>
											<div class="invoice-hours"><?php echo $_SESSION['arrive_date'];?></div>
											<div class="invoice-hours"><span class="weight-600 font-16"><?php echo $_SESSION['No_of_students'];?></span></div>
											<div class="invoice-hours"><span class="weight-600 font-16"><?php echo $_SESSION['payment_status'];?></span></div>
											<div class="invoice-rate"><?php echo $_SESSION['ticket_status'];?></div>
										</li>
									</ul>
								</div>
								<div class="invoice-desc-footer">
									<div class="invoice-desc-head clearfix">
										<div class="booked-by">Booked By</div>
										<div class="date-amount">Date of issued</div>
										<div class="date-amount">Total Amount</div>
									</div>
									<div class="invoice-desc-body">
										<ul>
											<li class="clearfix">
												<div class="booked-by font-18 weight-600 text-capitalize">
												<?php echo $_SESSION['booked_by'];?>
												</div>
												<div class="date-amount font-14 weight-600"><?php echo $_SESSION['issued_date'];?></div>
												<div class="date-amount"><span class="weight-600 font-18 text-danger">NGN <?php echo $_SESSION['amount'];?>.00</span></div>
											</li>
										</ul>
									</div>
								</div>
							</div>
								<a class="btn btn-danger d-print-none" href="./staff_managed.php" role="button">Cancel</a>
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