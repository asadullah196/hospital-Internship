<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

$did = intval($_GET['viewid']); // get patient id

if (isset($_POST['submit'])) {

    $id = $did;
    $hemoglobin = $_POST['hemoglobin'];
    $leukocyte_count = $_POST['leukocyte_count'];
    $glucose = $_POST['glucose'];
    $blood_urea_nitrogen = $_POST['blood_urea_nitrogen'];
    $creatinine = $_POST['creatinine'];
    $arterial = $_POST['arterial'];

    $query = mysqli_query($con, "INSERT INTO `user_urin` (`id`, `hemoglobingl`, `leukocyte_count_cm`, `glucose_ml`, `blood_urea_nitrogen_ml`, `creatinine_m`, `arterial_ph`, `status`) VALUES ('$id', '$hemoglobin', '$leukocyte_count', '$glucose', '$blood_urea_nitrogen', '$creatinine', '$arterial', '1');");
    if ($query) {
        echo "<script>alert('Patient Added Successfully to the System!');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin | Add Urin Report</title>

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
    <script type="text/javascript">
        function valid() {
            if (document.adddoc.npass.value != document.adddoc.cfpass.value) {
                alert("Password and Confirm Password Field do not match  !!");
                document.adddoc.cfpass.focus();
                return false;
            }
            return true;
        }
    </script>


    <script>
        function checkemailAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data: 'emailid=' + $("#docemail").val(),
                type: "POST",
                success: function(data) {
                    $("#email-availability-status").html(data);
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

            <!-- end: TOP NAVBAR -->
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Admin | Urin Report </h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Admin</span>
                                </li>
                                <li class="active">
                                    <span>Add Urin Report</span>
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
                                        <?php
                                        // Connect with user-patient database
                                        $sql = mysqli_query($con, "select * from users where id='" . $did . "'");
                                        $row = mysqli_fetch_array($sql);
                                        ?>
                                        <div class="box-basic-info">
                                            <h2>Name: <?php echo $row['fullName']; ?></h2>
                                            <h2>Phone: <?php echo $row['phone']; ?></h2><br />
                                        </div>


                                        <!-- start: REGISTER BOX -->
                                        <div class="box-register">
                                            <form name="registration" id="registration" method="post" onSubmit="return valid();">
                                                <fieldset>
                                                    <legend>
                                                        Add/Update Report
                                                    </legend>

                                                    <?php
                                                        // Connect with user-patient database
                                                        $sql = mysqli_query($con, "select * from user_urin where id='" . $did . "'");
                                                        $row = mysqli_fetch_array($sql);
                                                    ?>
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
                                                                <td><input type="text" class="form-control" name="hemoglobin" placeholder="Current Value: <?php echo htmlentities($row['hemoglobingl']); ?>" required></td>
                                                                <td>120-160</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Leukocyte Count(cell/microL)</td>
                                                                <td><input type="text" class="form-control" name="leukocyte_count" placeholder="Current Value: <?php echo htmlentities($row['leukocyte_count_cm']); ?>" required></td>
                                                                <td>4800-1000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Glucose(mmol/l)</td>                                                                
                                                                <td><input type="text" class="form-control" name="glucose" placeholder="Current Value: <?php echo htmlentities($row['glucose_ml']); ?>" required></td>
                                                                <td>3.9-6.4</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Blood Urea nitrogen(mmol/l)</td>
                                                                <td><input type="text" class="form-control" name="blood_urea_nitrogen" placeholder="Current Value: <?php echo htmlentities($row['blood_urea_nitrogen_ml']); ?>" required></td>
                                                                <td>7.1-35.7</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Creatinine(micromml)</td>
                                                                <td><input type="text" class="form-control" name="creatinine" placeholder="Current Value: <?php echo htmlentities($row['creatinine_m']); ?>" required></td>
                                                                <td>44.2-97.2</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Arterial pH</td>
                                                                <td><input type="text" class="form-control" name="arterial" placeholder="Current Value: <?php echo htmlentities($row['arterial_ph']); ?>" required></td>
                                                                <td>7.35-7.45</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="form-actions">
                                                        <button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
                                                            Save <i class="fa fa-arrow-circle-right"></i>
                                                        </button>
                                                    </div>
                                                </fieldset>
                                            </form>

                                            <div class="copyright">
                                                &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> HMS</span>. <span>All rights reserved</span>
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