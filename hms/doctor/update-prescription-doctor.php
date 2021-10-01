<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

$id = intval($_GET['viewid']); // get patient id

if (isset($_POST['submit'])) {

	$docid = $id;
	$patname = $_POST['dname'];

	$medicine1 = $_POST['dmedicine1'];
	$time1 = $_POST['dtime1'];

	$medicine2 = $_POST['dmedicine2'];
	$time2 = $_POST['dtime2'];

	$medicine3 = $_POST['dmedicine3'];
	$time3 = $_POST['dtime3'];

	$medicine4 = $_POST['dmedicine4'];
	$time4 = $_POST['dtime4'];

	$medicine5 = $_POST['dmedicine5'];
	$time5 = $_POST['dtime5'];

	$medicine_extra = $_POST['dmedicine_extra'];
	$time_extra = $_POST['dtime_extra'];

	$sql = mysqli_query($con, "UPDATE medicine SET `name`='$patname',`medicine_one`='$medicine1',`time_one`='$time1',`medicine_two`='$medicine2',`time_two`='$time2',`medicine_three`='$medicine3',`time_three`='$time3',`medicine_four`='$medicine4',`time_four`='$time4',`medicine_five`='$medicine5',`time_five`='$time5',`medicine_extra`='$medicine_extra',`time_extra`='$time_extra' WHERE pid='$id'");

	if ($sql) {
		echo "<script>alert('Prescription Update Successfully');</script>";
		echo "<script>window.location.href ='update-prescription-doctor.php?viewid=$id'</script>";
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Doctor | Update Prescription</title>

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

	<script>
		function userAvailability() {
			$("#loaderIcon").show();
			jQuery.ajax({
				url: "check_availability.php",
				data: 'email=' + $("#patemail").val(),
				type: "POST",
				success: function(data) {
					$("#user-availability-status1").html(data);
					$("#loaderIcon").hide();
				},
				error: function() {}
			});
		}
	</script>
</head>

<body>
	<div id="app">
		<?php include('include/sidebar.php'); ?>
		<div class="app-content">
			<?php include('include/header.php'); ?>

			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">Doctor | Udate Prescription</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Doctor</span>
								</li>
								<li class="active">
									<span>Update Prescription</span>
								</li>
							</ol>
						</div>
					</section>

					<div class="container-fluid container-fullw bg-white">
						<div class="row">

							<div class="col-md-12">
								<h3 class="">Add <span class="text-bold">Prescription</span></h3>
								<?php
								$ret = mysqli_query($con, "select * from users where ID='$id'");
								while ($row = mysqli_fetch_array($ret)) {
								?>
									<table border="1" class="table table-bordered">
										<tr align="center">
											<td colspan="4" style="font-size:20px;color:blue">
												Patient Details</td>
										</tr>

										<tr>
											<th scope>Patient Name</th>
											<td><?php echo $row['fullName']; ?></td>
											<th scope>Patient Email</th>
											<td><?php echo $row['email']; ?></td>
										</tr>
										<tr>
											<th scope>Patient Mobile Number</th>
											<td><?php echo $row['phone']; ?></td>
											<th>Patient Address</th>
											<td><?php echo $row['address']; ?></td>
										</tr>
										<tr>
											<th>Patient Gender</th>
											<td><?php echo $row['gender']; ?></td>
											<th>Patient Reg Date</th>
											<td><?php echo $row['regDate']; ?></td>
										</tr>

									<?php } ?>
									</table>
							</div>

							<div class="col-md-12">
								<div class="row margin-top-30">
									<div class="col-lg-8 col-md-12">
										<div class="panel panel-white">
											<h2 class="text-bold">&nbsp;&nbsp;Rx </h2>


											<?php
											$ret = mysqli_query($con, "select * from medicine where pid='$id'");
											$row_id = mysqli_fetch_array($ret);

											if ($row_id['status'] == 1) { ?>

												<div class="panel-body">
													<form role="form" name="" method="post">
														
														<?php
														$medicintable = mysqli_query($con, "select * from medicine where pid='$id'");
														$med = mysqli_fetch_array($medicintable);
														?>

														<div class="col-md-12 text-left mb-3">
															<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
																<tr>
																	<th>Serial No</th>
																	<th>Medicine Name</th>
																	<th>Time Table</th>
																</tr>

																<tr>
																	<td>01</td>
																	<td><input type="text" class="form-control" name="dmedicine1" placeholder="<?php echo $med['medicine_one']; ?>" value="<?php echo $med['medicine_one']; ?>"></td>
																	<td><input type="text" class="form-control" name="dtime1" placeholder="<?php echo $med['time_one']; ?>" value="<?php echo $med['time_one']; ?>"></td>
																</tr>

																<tr>
																	<td>02</td>
																	<td><input type="text" class="form-control" name="dmedicine2" placeholder="<?php echo $med['medicine_two']; ?>" value="<?php echo $med['medicine_two']; ?>"></td>
																	<td><input type="text" class="form-control" name="dtime2" placeholder="<?php echo $med['time_two']; ?>" value="<?php echo $med['time_two']; ?>"></td>
																</tr>

																<tr>
																	<td>03</td>
																	<td><input type="text" class="form-control" name="dmedicine3" placeholder="<?php echo $med['medicine_three']; ?>" value="<?php echo $med['medicine_three']; ?>"></td>
																	<td><input type="text" class="form-control" name="dtime3" placeholder="<?php echo $med['time_three']; ?>" value="<?php echo $med['time_three']; ?>"></td>
																</tr>

																<tr>
																	<td>04</td>
																	<td><input type="text" class="form-control" name="dmedicine4" placeholder="<?php echo $med['medicine_four']; ?>" value="<?php echo $med['medicine_four']; ?>"></td>
																	<td><input type="text" class="form-control" name="dtime4" placeholder="<?php echo $med['time_four']; ?>" value="<?php echo $med['time_four']; ?>"></td>
																</tr>

																<tr>
																	<td>05</td>
																	<td><input type="text" class="form-control" name="dmedicine5" placeholder="<?php echo $med['medicine_five']; ?>" value="<?php echo $med['medicine_five']; ?>"></td>
																	<td><input type="text" class="form-control" name="dtime5" placeholder="<?php echo $med['time_five']; ?>" value="<?php echo $med['time_five']; ?>"></td>
																</tr>

																<tr>
																	<td>Extra</td>
																	<td><textarea type="text" class="form-control" name="dmedicine_extra" placeholder="<?php echo $med['medicine_extra']; ?>" value="<?php echo $med['medicine_extra']; ?>"></textarea></td>
																	<td><textarea type="text" class="form-control" name="dtime_extra" placeholder="<?php echo $med['time_extra']; ?>" value="<?php echo $med['time_extra']; ?>"></textarea></td>
																</tr>

															</table>
														</div>
														<div class="col-md-12 text-right mb-3">
															<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
																Submit
															</button>
														</div>
													</form>
												</div>
											<?php
											} else {
												echo "<h2>&nbsp;&nbsp;Prescription has been submitted already!</h2>";
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