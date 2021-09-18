<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

$did = intval($_GET['viewid']); // get patient id

if (isset($_GET['cancel'])) {
    mysqli_query($con, "update appointment set userStatus='0' where id = '" . $_GET['id'] . "'");
    $_SESSION['msg'] = "Your appointment canceled !!";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor | Patient Details </title>

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
                                <h1 class="mainTitle">Doctor | Patient Details</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>User </span>
                                </li>
                                <li class="active">
                                    <span>Patient Details</span>
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
                                    <?php
                                    $ret = mysqli_query($con, "select * from tblmedicalhistory  where PatientID='$vid'");
                                    ?>
                            </div>
                            <h2 class="text-bold"><br/><br/>&nbsp;&nbsp;Rx </h2>
                            <div class="col-md-12 text-left mb-3">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <tr>
                                        <th>Serial No</th>
                                        <th>Medicine Name</th>
                                        <th>Medicine Details</th>
                                        <th>Time Table</th>
                                        <th>Total Medicine</th>
                                    </tr>

                                    <tr>
                                        <td>
                                            <a href="#?viewid=<?php echo $did ?>"><button class="btn btn-primary"> Patient History</button></a><br /><br />

                                            <a href="#?viewid=<?php echo $did ?>"><button class="btn btn-primary"> Urine Report</button></a><br /><br />

                                            <a href="#?viewid=<?php echo $did ?>"><button class="btn btn-primary"> Blood Report</button></a><br /><br />

                                            <a href="#"><button class="btn btn-primary"> Others</button></a>
                                        </td>


                                        <td>
                                            <a href="add-prescription-doctor.php?viewid=<?php echo $did ?>"><button class="btn btn-primary">Add Prescription</button></a><br /><br />

                                            <a href="#?viewid=<?php echo $did ?>"><button class="btn btn-primary">Update Prescription</button></a><br /><br />

                                            <a href="#"><button class="btn btn-primary"> Special Note</button></a>
                                        </td>
                                    </tr>

                                </table>
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