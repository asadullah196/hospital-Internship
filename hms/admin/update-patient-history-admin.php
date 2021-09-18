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
	$age = $_POST['page'];
	$gender = $_POST['pgender'];
	$height = $_POST['pheight'];
	$weight = $_POST['pweight'];
	$temperature = $_POST['ptemperature'];
	$blood_pressure = $_POST['pblood_pressure'];
	$covid_vaccinated = $_POST['pcovid_vaccinated'];
	$occupation = $_POST['poccupation'];

	$sql = mysqli_query($con, "UPDATE user_history SET `name`='$name',`age`='$age',`gender`='$gender',`height`='$height',`weight`='$weight',`temperature`='$temperature',`blood_pressure`='$blood_pressure',`covid_vaccinated`='$covid_vaccinated',`occupation`='$occupation' WHERE id='$id'");
	
	if ($sql) {
		echo "<script>alert('Patient History Updated Successfully');</script>";
		echo "<script>window.location.href ='view-patient-admin.php?viewid=$id'</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin | Update Patient History </title>

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
								<h1 class="mainTitle">Admin | Update Patient History</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Admin</span>
								</li>
								<li class="active">
									<span>Update Patient History</span>
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
												<h3 class="">Update Patient History</h3>
											</div>

											<?php
                                                // Connect with user-patient database
                                                $sql = mysqli_query($con, "select * from user_history where id='" . $did . "'");
                                                $row = mysqli_fetch_array($sql);
                                            ?>

											<?php if ($row['status'] == 1) { ?>
											<div class="panel-body">
												<form role="form" name="adddoc" method="post" onSubmit="return valid();">
													<div class="form-group">
														<table class="parent-table table table-bordered admin-salary" width="1">
															<thead>
																<tr>
																	<th>Name</th>
																	<th>Value</th>
																	<th>Units</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>Patient</td>
																	<td><input type="text" name="pname" class="form-control" placeholder="" value="<?php echo $row['name'];?>" value="<?php echo $row['name'];?>" readonly></td>
																	<td>N/A</td>
																</tr>

																<tr>
																	<td>Age</td>
																	<td><input type="text" name="page" class="form-control" placeholder="<?php echo $row['age'];?>" value="<?php echo $row['age'];?>" required></td>
																	<td>Year</td>
																</tr>

																<tr>
																	<td>Gender</td>
																	<td><input type="text" name="pgender" class="form-control" placeholder="<?php echo $row['gender'];?>" value="<?php echo $row['gender'];?>" required></td>
																	<td>N/A</td>
																</tr>

																<tr>
																	<td>Height</td>
																	<td><input type="text" name="pheight" class="form-control" placeholder="<?php echo $row['height'];?>" value="<?php echo $row['height'];?>" required></td>
																	<td>Inc</td>
																</tr>

																<tr>
																	<td>Weight</td>
																	<td><input type="text" name="pweight" class="form-control" placeholder="<?php echo $row['weight'];?>" value="<?php echo $row['weight'];?>" required></td>
																	<td>Kg</td>
																</tr>
																
																<tr>
																	<td>Temperature</td>
																	<td><input type="text" name="ptemperature" class="form-control" placeholder="<?php echo $row['temperature'];?>" value="<?php echo $row['temperature'];?>" required></td>
																	<td>Degrees Celsius</td>
																</tr>

																<tr>
																	<td>Blood Pressure</td>
																	<td><input type="text" name="pblood_pressure" class="form-control" placeholder="<?php echo $row['blood_pressure'];?>" value="<?php echo $row['blood_pressure'];?>" required></td>
																	<td>mmHg</td>
																</tr>

																<tr>
																	<td>Covid19 Vaccinated</td>
																	<td><input type="text" name="pcovid_vaccinated" class="form-control" placeholder="<?php echo $row['covid_vaccinated'];?>" value="<?php echo $row['covid_vaccinated'];?>" required></td>
																	<td>N/A</td>
																</tr>

																<tr>
																	<td>Occupation</td>
																	<td><input type="text" name="poccupation" class="form-control" placeholder="<?php echo $row['occupation'];?>" value="<?php echo $row['occupation'];?>" required></td>
																	<td>N/A</td>
																</tr>

															</tbody>
														</table>
													</div>
													<button type="submit" name="submit" id="submit" class="btn btn-primary pull-right">
														Submit
													</button>
												</form>
											</div>
											<?php
											} else {
												echo "<h2>&nbsp;&nbsp;Sorry! No report updated yet</h2>";
											}
											?>
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