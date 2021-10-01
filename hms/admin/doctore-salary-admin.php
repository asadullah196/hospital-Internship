<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

$did = intval($_GET['viewid']); // get doctor id

if (isset($_POST['submit'])) {
    $docspecialization = $_POST['Doctorspecialization'];
    $docname = $_POST['docname'];
    $docaddress = $_POST['clinicaddress'];
    $docfees = $_POST['docfees'];
    $doccontactno = $_POST['doccontact'];
    $docemail = $_POST['docemail'];
    $sql = mysqli_query($con, "Update doctors set specilization='$docspecialization',doctorName='$docname',address='$docaddress',docFees='$docfees',contactno='$doccontactno',docEmail='$docemail' where id='$did'");
    if ($sql) {
        $msg = "Doctor Details updated Successfully";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor Salary Details</title>

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
            <!-- start: MENU TOGGLER FOR MOBILE DEVICES -->

            <!-- end: TOP NAVBAR -->
            <div class="main-content" id="">
                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Doctor's Salary</h1>
                            </div>
                        </div>
                    </section>
                    <!-- end: PAGE TITLE -->
                    <!-- start: BASIC EXAMPLE -->
                    <div class="container-fluid container-fullw bg-white">

						<div class="row">
							<div class="col-md-12" id="invoice">

								<?php


								$sql = mysqli_query($con, "select users.id as fid, users.fullName as fname, users.email as uemail, users.phone as uphone, users.address as uaddress, appointment.*  from appointment join users on users.id=appointment.userId where appointment.doctorId='" . $did . "'");

								$cnt = 1;

								while ($row = mysqli_fetch_array($sql)) {									
										$cnt = $cnt + 1;									
								} 

								// Salary Calculation Block
								$base_salary = 50000;

								$paitents_number = $cnt-1;
								$paitents_earning = $paitents_number * 300;

								$total_salary =  $paitents_earning + $base_salary;

								?>

								<h2>Salary Details</h2><br>
								<table class="parent-table table table-bordered admin-salary" width="1">
									<thead>
										<tr>
											<th>Name</th>
											<th>Quantity</th>
											<th>Rate (BDT)</th>
											<th>Total (BDT)</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Base Salary</td>
											<td>N/A</td>
											<td>N/A</td>
											<td><?php echo $base_salary; ?></td>
										</tr>
										<tr>
											<td>Total Patients</td>
											<td><?php echo $paitents_number; ?></td>
											<td>300</td>
											<td><?php echo $paitents_earning; ?></td>
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td>Total Payable</td>
											<td>= <?php echo $total_salary; ?> BDT</td>
										</tr>
									</tbody>
								</table>

							</div>
							<div class="col-md-12 text-right mb-3">
								<button class="btn btn-primary" onclick="window.print()"> Print PDF</button>
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
    <>
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