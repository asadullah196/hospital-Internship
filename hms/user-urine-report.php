<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>User | Urine Test Report </title>

	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
	<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
	<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
	<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
	<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/plugins.css">
	<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />

	<!-- html2pdf converter -->
    <script src="pdf.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

</head>

<body>
	<div id="app">
		<?php include('include/sidebar.php'); ?>
		<div class="app-content">


			<?php include('include/header.php'); ?>
			<!-- end: TOP NAVBAR -->
			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">User | Urine Test Report</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>User </span>
								</li>
								<li class="active">
									<span>Urine Test History</span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->

					<section class="paitent-report">
						<?php
						$sql = mysqli_query($con, "SELECT * FROM users where id='" . $_SESSION['id'] . "'");
						$row = mysqli_fetch_array($sql);
						?>


						<br>
						<div class="paitent-detail report-css">
							<p>Patients ID&nbsp;: <?php echo $row['id']; ?></p>
							<p>Full Name&nbsp;&nbsp;: <?php echo $row['fullName']; ?></p>
							<p>Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row['address']; ?></p>
							<p>City&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row['city']; ?></p>
							<p>Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row['gender']; ?></p>
							<p>Phone&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row['phone']; ?></p>
							<p>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row['email']; ?></p>
						</div>
						<br>
					</section>
					<section>
						<?php
						$sql = mysqli_query($con, "SELECT * FROM user_urin where id='" . $_SESSION['id'] . "'");
						$row = mysqli_fetch_array($sql);
						?>
					</section>
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white" id="invoice">

						<div class="row">
							<div class="col-md-12">
								<div class="report-detail">
									<h3>Urine Test Report</h3>
								</div>
								<!-- Code for Urin Test -->
								<table class="parent-table table table-bordered admin-salary" width="1">
									<thead>
										<tr>
											<th>Laboratory Test</th>
											<th>Patient value</th>
											<th>Normal Value</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Hemoglobin(g/l)</td>
											<td><?php echo htmlentities($row['hemoglobingl']); ?></td>
											<td>120-160</td>
										</tr>
										<tr>
											<td>Leukocyte Count(cell/microL)</td>
											<td><?php echo htmlentities($row['leukocyte_count_cm']); ?></td>
											<td>4800-1000</td>
										</tr>
										<tr>
											<td>Glucose(mmol/l)</td>
											<td><?php echo htmlentities($row['glucose_ml']); ?></td>
											<td>3.9-6.4</td>
										</tr>
										<tr>
											<td>Blood Urea nitrogen(mmol/l)</td>
											<td><?php echo htmlentities($row['blood_urea_nitrogen_ml']); ?></td>
											<td>7.1-35.7</td>
										</tr>
										</tr>
										<tr>
											<td>Creatinine(micromml)</td>
											<td><?php echo htmlentities($row['creatinine_m']); ?></td>
											<td>44.2-97.2</td>
										</tr>
										</tr>
										<tr>
											<td>Arterial pH</td>
											<td><?php echo htmlentities($row['arterial_ph']); ?></td>
											<td>7.35-7.45</td>
										</tr>
									</tbody>
								</table>
								<div class="col-md-12 text-right mb-3">
                                	<button class="btn btn-primary" id="download"> Download</button>
                                	<button class="btn btn-primary" onclick="window.print()"> Print PDF</button>
                            	</div>
							</div>
						</div>

						<!-- end: BASIC EXAMPLE -->
						<!-- end: SELECT BOXES -->

					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
			<?php include('include/footer.php'); ?>
			<!-- end: FOOTER -->

			<!-- start: SETTINGS -->
			<?php include('include/setting.php'); ?>

			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>

		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>