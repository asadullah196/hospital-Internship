<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

$did = intval($_GET['viewid']); // get patient id

if (isset($_POST['submit'])) {

	$id = $did;
	$name = $_POST['pname'];
	$albumin = $_POST['palbumin'];      
	$alt_sgot = $_POST['palt_sgot'];
	$ast_sgot = $_POST['past_sgot'];
	$alkaline_phosphatase = $_POST['palkaline_phosphatase'];
	$total_billirubin = $_POST['ptotal_billirubin'];
	$bun = $_POST['pbun'];
	$calcium = $_POST['pcalcium'];
	$chloride = $_POST['pchloride'];
	$creatinine = $_POST['pcreatinine'];
	$glucose = $_POST['pglucose'];   
	$lactate_dehydrogenase_ldh = $_POST['plactate_dehydrogenase_ldh'];
	$magnesium = $_POST['pmagnesium'];
	$sodium = $_POST['psodium'];
	$total_protien = $_POST['ptotal_protien'];
	$uric_acide = $_POST['puric_acide'];


	$sql = mysqli_query($con, "INSERT INTO `user_blood`(`id`, `name`, `albumin`, `alt_sgot`, `ast_sgot`, `alkaline_phosphatase`, `total_billirubin`, `bun`, `calcium`, `chloride`, `creatinine`, `glucose`, `lactate_dehydrogenase_ldh`, `magnesium`, `sodium`, `total_protien`, `uric_acide`, `status`) VALUES ('$id','$name','$albumin','$alt_sgot','$ast_sgot','$alkaline_phosphatase','$total_billirubin','$bun','$calcium','$chloride','$creatinine','$glucose','$lactate_dehydrogenase_ldh','$magnesium','$sodium','$total_protien','$uric_acide','1')");
	
	if ($sql) {
		echo "<script>alert('Blood Report Added Successfully');</script>";
		echo "<script>window.location.href ='add-blood-report-admin.php?viewid=$id'</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin | Add Blood Report </title>

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
								<h1 class="mainTitle">Admin | Add Blood Report </h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Admin</span>
								</li>
								<li class="active">
									<span>Add Blood Report </span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">

								<div class="row margin-top-30">
									<div class="col-lg-8 col-md-12">
										<div class="panel panel-white">
											<div class="panel-heading">
												<h3 class="">Add Blood Report </h3>
											</div>

											<?php
											// Connect with user-patient database
											$sql = mysqli_query($con, "select * from users where id='" . $did . "'");
											$row = mysqli_fetch_array($sql);
											?>

											<div class="panel-body">

												<form role="form" name="adddoc" method="post" onSubmit="return valid();">
													<div class="form-group">
														<table class="parent-table table table-bordered admin-salary" width="1">
															<thead>
																<tr>
																	<th>Name</th>
																	<th>Result</th>
																	<th>Units</th>
																	<th>Refernce Interval</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>Patient</td>
																	<td><input type="text" name="pname" class="form-control" placeholder="" value="<?php echo $row['fullName']; ?>" readonly></td>
																	<td>N/A</td>
																	<td>N/A</td>
																</tr>

																<tr>
																	<td>Albumin</td>
																	<td><input type="text" class="form-control" name="palbumin" placeholder="Albumin" required></td>
																	<td>g/dl</td>
																	<td> 3.5 - 5.0 </td>
																</tr>
																<tr>
																	<td>ALT (SGOT)</td>
																	<td><input type="text" class="form-control" name="palt_sgot" placeholder="ALT (SGOT)" required></td>
																	<td>IU/L</td>
																	<td>11 - 36</td>
																</tr>
																<tr>
																	<td>AST (SGOT)</td>
																	<td><input type="text" class="form-control" name="past_sgot" placeholder="AST (SGOT)" required></td>
																	<td>IU/L</td>
																	<td>38 - 126</td>
																</tr>
																<tr>
																	<td>Alkaline Phosphatase</td>
																	<td><input type="text" class="form-control" name="palkaline_phosphatase" placeholder="Alkaline Phosphatase" required></td>
																	<td>mg/dl</td>
																	<td>0.2 - 1.3</td>
																</tr>
																<tr>
																	<td>Total Billirubin</td>
																	<td><input type="text" class="form-control" name="ptotal_billirubin" placeholder="Total Billirubin" required></td>
																	<td>mg/dl</td>
																	<td>7 - 17</td>
																</tr>
																<tr>
																	<td>BUN</td>
																	<td><input type="text" class="form-control" name="pbun" placeholder="BUN" required></td>
																	<td>mg/dl</td>
																	<td>8.4 - 10.2</td>
																</tr>
																<tr>
																	<td>Calcium</td>
																	<td><input type="text" class="form-control" name="pcalcium" placeholder="Calcium" required></td>
																	<td>mg/dl</td>
																	<td>98 - 107</td>
																</tr>
																<tr>
																	<td>Chloride</td>
																	<td><input type="text" class="form-control" name="pchloride" placeholder="Chloride" required></td>
																	<td>mg/dl</td>
																	<td>0.7 - 1.2</td>
																</tr>
																<tr>
																	<td>Creatinine</td>
																	<td><input type="text" class="form-control" name="pcreatinine" placeholder="Creatinine" required></td>
																	<td>mmol/L</td>
																	<td>65 - 105</td>
																</tr>
																<tr>
																	<td>Glucose</td>
																	<td><input type="text" class="form-control" name="pglucose" placeholder="Glucose" required></td>
																	<td>mg/dl</td>
																	<td>100 - 250</td>
																</tr>
																<tr>
																	<td>Lactate dehydrogenase (LDH)</td>
																	<td><input type="text" class="form-control" name="plactate_dehydrogenase_ldh" placeholder="Lactate dehydrogenase (LDH)" required></td>
																	<td>mg/dl</td>
																	<td>0.65 - 1.05</td>
																</tr>
																<tr>
																	<td>Magnesium</td>
																	<td><input type="text" class="form-control" name="pmagnesium" placeholder="Magnesium" required></td>
																	<td>IU/L</td>
																	<td>3.6 - 5.0</td>
																</tr>
																<tr>
																	<td>Sodium</td>
																	<td><input type="text" class="form-control" name="psodium" placeholder="Sodium" required></td>
																	<td>mmol/L</td>
																	<td>137 - 145</td>
																</tr>
																<tr>
																	<td>Total Protein</td>
																	<td><input type="text" class="form-control" name="ptotal_protien" placeholder="Total Protein" required></td>
																	<td>mmol/L</td>
																	<td>6.3 - 8.2</td>
																</tr>
																<tr>
																	<td>Uric Acid</td>
																	<td><input type="text" class="form-control" name="puric_acide" placeholder="Uric Acide" required></td>
																	<td>mmol/L</td>
																	<td>227 - 467</td>
																</tr>
															</tbody>
														</table>
													</div>
													<button type="submit" name="submit" id="submit" class="btn btn-primary pull-right">
														Submit
													</button>
												</form>
											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="panel panel-white">


								</div>
							</div>
						</div>
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
	<!-- start: JavaScript Event Handlers for this page -->
	<script src="assets/js/form-elements.js"></script>
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