<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$did = intval($_GET['id']); // get doctor id
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
    <title>Admin | Edit Doctor Details</title>

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
            <!-- start: MENU TOGGLER FOR MOBILE DEVICES -->

            <!-- end: TOP NAVBAR -->
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Admin | Edit Doctor Details</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Admin</span>
                                </li>
                                <li class="active">
                                    <span>Edit Doctor Details</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <!-- end: PAGE TITLE -->
                    <!-- start: BASIC EXAMPLE -->
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">

                                <?php
                                // Database Connection Block
                                $sql = mysqli_query($con, "select * from users");
								$num = mysqli_num_rows($sql);
                                
                                

                                // Salary Calculation Block
                                    $base_salary = 12000;

                                    $paitents_number = $num;
                                    $paitents_earning = $num * 120;

                                    $total_salary =  $report_earning + $paitents_earning + $base_salary;
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
                                            <td>1</td>
                                            <td><?php echo $paitents_number; ?></td>
                                            <td><?php echo $base_salary; ?></td>
                                        </tr>                                    
                                        <tr>
                                            <td>Total Patients</td>
                                            <td><?php echo $report_number; ?></td>
                                            <td>120</td>
                                            <td><?php echo $paitents_earning; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total Report</td>
                                            <td><?php echo $report_number; ?></td>
                                            <td>75</td>
                                            <td><?php echo $report_earning; ?></td>
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
                        <div class="download-button">
                            <button><a href="#"> Download </a></button>
                            <button><a href="#"> Print </a></button>
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