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


    $sql = mysqli_query($con, "INSERT INTO `medicine_history`(`id`, `name`, `medicine_one`, `time_one`, `medicine_two`, `time_two`, `medicine_three`, `time_three`, `medicine_four`, `time_four`, `medicine_five`, `time_five`, `medicine_extra`, `time_extra`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14])");

    if ($sql) {
        echo "<script>alert('Blood Report Added Successfully');</script>";
        echo "<script>window.location.href ='add-blood-report-admin.php?viewid=$id'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor | Add Prescription Details </title>

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
                                <h1 class="mainTitle">Doctor | Add Prescription Details</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>User </span>
                                </li>
                                <li class="active">
                                    <span>Add Prescription Details</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <!-- end: PAGE TITLE -->
                    <!-- start: BASIC EXAMPLE -->
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="">Add <span class="text-bold">Prescription</span></h3>
                                <?php
                                $vid = $_GET['id'];
                                $ret = mysqli_query($con, "select * from users where ID='$did'");
                                $cnt = 1;
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
                            <h2 class="text-bold"><br /><br />&nbsp;&nbsp;Rx </h2>
                            <div class="panel-body">
                                <form role="form" name="adddoc" method="post" onSubmit="return valid();">
                                    <?php

                                    $ret = mysqli_query($con, "select * from users where ID='$did'");
                                    $row = mysqli_fetch_array($ret);
                                    ?>
                                    <div class="hidden-top">
                                        <input type="hidden" class="form-control" name="did" value="<?php echo $row['id']; ?>">
                                        <input type="hidden" class="form-control" name="dname" value="<?php echo $row['fullName']; ?>">
                                    </div>
                                    <div class="col-md-12 text-left mb-3">
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <tr>
                                                <th>Serial No</th>
                                                <th>Medicine Name</th>
                                                <th>Time Table</th>
                                            </tr>

                                            <tr>
                                                <td>01</td>
                                                <td><input type="text" class="form-control" name="dmedicine1" placeholder="Medicine Name"></td>
                                                <td><input type="text" class="form-control" name="dtime1" placeholder="Time Table"></td>
                                            </tr>

                                            <tr>
                                                <td>02</td>
                                                <td><input type="text" class="form-control" name="dmedicine1" placeholder="Medicine Name"></td>
                                                <td><input type="text" class="form-control" name="dtime1" placeholder="Time Table"></td>
                                            </tr>

                                            <tr>
                                                <td>03</td>
                                                <td><input type="text" class="form-control" name="dmedicine2" placeholder="Medicine Name"></td>
                                                <td><input type="text" class="form-control" name="dtime2" placeholder="Time Table"></td>
                                            </tr>

                                            <tr>
                                                <td>04</td>
                                                <td><input type="text" class="form-control" name="dmedicine3" placeholder="Medicine Name"></td>
                                                <td><input type="text" class="form-control" name="dtime3" placeholder="Time Table"></td>
                                            </tr>

                                            <tr>
                                                <td>05</td>
                                                <td><input type="text" class="form-control" name="dmedicine4" placeholder="Medicine Name"></td>
                                                <td><input type="text" class="form-control" name="dtime4" placeholder="Time Table"></td>
                                            </tr>

                                            <tr>
                                                <td>Extra</td>
                                                <td><textarea type="text" class="form-control" name="dmedicine_extra" placeholder="Medicine Name"></textarea></td>
                                                <td><textarea type="text" class="form-control" name="dtime_extra" placeholder="Time Table"></textarea></td>
                                            </tr>
                                            
                                        </table>
                                    </div>
                                    <div class="col-md-12 text-right mb-3">
                                        <button class="btn btn-primary" id="apintment-date"> Next Appointment Date</button>
                                        <button type="submit" name="submit" id="submit" class="btn btn-primary"> Submit </button>
                                    </div>
                                </form>
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