<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

$did = intval($_GET['viewid']); // get patient id

if (isset($_POST['blood-submit'])) {

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


if (isset($_POST['urin-submit'])) {

    $id = $did;
    $albumin = $_POST['albumin'];
    $alt_sgot = $_POST['alt_sgot'];
    $ast_sgot = $_POST['ast_sgot'];
    $alkaline_phosphatase = $_POST['alkaline_phosphatase'];
    $total_billirubin = $_POST['total_billirubin'];
    $bun = $_POST['bun'];
    $calcium = $_POST['calcium'];
    $chloride = $_POST['chloride'];
    $creatinine = $_POST['creatinine'];
    $glucose = $_POST['glucose'];
    $lactate_dehydrogenase_ldh = $_POST['lactate_dehydrogenase_ldh'];
    $magnesium = $_POST['magnesium'];
    $sodium = $_POST['sodium'];
    $total_protien = $_POST['total_protien'];
    $uric_acide = $_POST['uric_acide'];

    $query = mysqli_query($con, "INSERT INTO `user_blood` (`id`, `albumin`, `alt_sgot`, `ast_sgot`, `alkaline_phosphatase`, `total_billirubin`, `bun`, `calcium`, `chloride`, `creatinine`, `glucose`, `lactate_dehydrogenase_ldh`, `magnesium`, `sodium`, `total_protien`, `uric_acide`, `status`) VALUES ('$id', '$albumin', '$alt_sgot', '$ast_sgot', '$alkaline_phosphatase', '$total_billirubin', '$bun', '$calcium', '$chloride', '$creatinine', '$glucose', '$lactate_dehydrogenase_ldh', '$magnesium', '$sodium', '$total_protien', '$uric_acide', '1');");
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
                                                    <h3> Add/Update Urine Test Report </h3>

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
                                                            </tr>
                                                            <tr>
                                                                <td>Creatinine(micromml)</td>
                                                                <td><input type="text" class="form-control" name="creatinine" placeholder="Current Value: <?php echo htmlentities($row['creatinine_m']); ?>" required></td>
                                                                <td>44.2-97.2</td>
                                                            </tr>
                                                            </tr>
                                                            <tr>
                                                                <td>Arterial pH</td>
                                                                <td><input type="text" class="form-control" name="arterial" placeholder="Current Value: <?php echo htmlentities($row['arterial_ph']); ?>" required></td>
                                                                <td>7.35-7.45</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="form-actions">
                                                        <button type="submit" class="btn btn-primary pull-right" id="submit" name="urin-submit">
                                                            Save <i class="fa fa-arrow-circle-right"></i>
                                                        </button>
                                                    </div>
                                                </fieldset>
                                            </form>

                                            <form name="registration" id="registration" method="post" onSubmit="return valid();">
                                                <fieldset>
                                                    <h3> Add/Update Blood Test Report </h3>

                                                    <?php
                                                        // Connect with user-patient database
                                                        $sql = mysqli_query($con, "select * from user_blood where id='" . $did . "'");
                                                        $row = mysqli_fetch_array($sql);
                                                    ?>
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
                                                                <td>Albumin</td>
                                                                <td><input type="text" class="form-control" name="albumin" placeholder="Current Value: <?php echo htmlentities($row['albumin']); ?>" required></td>
                                                                <td>g/dl</td>
                                                                <td> 3.5 - 5.0 </td>
                                                            </tr>
                                                            <tr>
                                                                <td>ALT (SGOT)</td>
                                                                <td><input type="text" class="form-control" name="alt_sgot" placeholder="Current Value: <?php echo htmlentities($row['alt_sgot']); ?>" required></td>
                                                                <td>IU/L</td>
                                                                <td>11 - 36</td>
                                                            </tr>
                                                            <tr>
                                                                <td>AST (SGOT)</td>                                                                
                                                                <td><input type="text" class="form-control" name="ast_sgot" placeholder="Current Value: <?php echo htmlentities($row['ast_sgot']); ?>" required></td>
                                                                <td>IU/L</td>
                                                                <td>38 - 126</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Alkaline Phosphatase</td>
                                                                <td><input type="text" class="form-control" name="alkaline_phosphatase" placeholder="Current Value: <?php echo htmlentities($row['alkaline_phosphatase']); ?>" required></td>
                                                                <td>mg/dl</td>
                                                                <td>0.2 - 1.3</td>
                                                            </tr>
                                                            </tr>
                                                            <tr>
                                                                <td>Total Billirubin</td>
                                                                <td><input type="text" class="form-control" name="total_billirubin" placeholder="Current Value: <?php echo htmlentities($row['total_billirubin']); ?>" required></td>
                                                                <td>mg/dl</td>
                                                                <td>7 - 17</td>
                                                            </tr>
                                                            </tr>
                                                            <tr>
                                                                <td>BUN</td>
                                                                <td><input type="text" class="form-control" name="bun" placeholder="Current Value: <?php echo htmlentities($row['bun']); ?>" required></td>
                                                                <td>mg/dl</td>
                                                                <td>8.4 - 10.2</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Calcium</td>
                                                                <td><input type="text" class="form-control" name="calcium" placeholder="Current Value: <?php echo htmlentities($row['calcium']); ?>" required></td>
                                                                <td>mg/dl</td>
                                                                <td>98 - 107</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Chloride</td>
                                                                <td><input type="text" class="form-control" name="chloride" placeholder="Current Value: <?php echo htmlentities($row['chloride']); ?>" required></td>
                                                                <td>mg/dl</td>
                                                                <td>0.7 - 1.2</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Creatinine</td>
                                                                <td><input type="text" class="form-control" name="creatinine" placeholder="Current Value: <?php echo htmlentities($row['creatinine']); ?>" required></td>
                                                                <td>mmol/L</td>
                                                                <td>65 - 105</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Glucose</td>
                                                                <td><input type="text" class="form-control" name="glucose" placeholder="Current Value: <?php echo htmlentities($row['glucose']); ?>" required></td>
                                                                <td>mg/dl</td>
                                                                <td>100 - 250</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Lactate dehydrogenase (LDH)</td>
                                                                <td><input type="text" class="form-control" name="lactate_dehydrogenase_ldh" placeholder="Current Value: <?php echo htmlentities($row['lactate_dehydrogenase_ldh']); ?>" required></td>
                                                                <td>mg/dl</td>
                                                                <td>0.65 - 1.05</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Magnesium</td>
                                                                <td><input type="text" class="form-control" name="magnesium" placeholder="Current Value: <?php echo htmlentities($row['magnesium']); ?>" required></td>
                                                                <td>IU/L</td>
                                                                <td>3.6 - 5.0</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sodium</td>
                                                                <td><input type="text" class="form-control" name="sodium" placeholder="Current Value: <?php echo htmlentities($row['sodium']); ?>" required></td>
                                                                <td>mmol/L</td>
                                                                <td>137 - 145</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total Protien</td>
                                                                <td><input type="text" class="form-control" name="total_protien" placeholder="Current Value: <?php echo htmlentities($row['total_protien']); ?>" required></td>
                                                                <td>mmol/L</td>
                                                                <td>6.3 - 8.2</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Uric Acide</td>
                                                                <td><input type="text" class="form-control" name="uric_acide" placeholder="Current Value: <?php echo htmlentities($row['uric_acide']); ?>" required></td>
                                                                <td>mmol/L</td>
                                                                <td>227 - 467</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="form-actions">
                                                        <button type="submit" class="btn btn-primary pull-right" id="submit" name="blood-submit">
                                                            Save <i class="fa fa-arrow-circle-right"></i>
                                                        </button>
                                                    </div>
                                                </fieldset>
                                            </form>

                                            <form name="registration" id="registration" method="post" onSubmit="return valid();">
                                                <fieldset>
                                                    <h3> Add/Update Urine Test Report </h3>

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
                                                            </tr>
                                                            <tr>
                                                                <td>Creatinine(micromml)</td>
                                                                <td><input type="text" class="form-control" name="creatinine" placeholder="Current Value: <?php echo htmlentities($row['creatinine_m']); ?>" required></td>
                                                                <td>44.2-97.2</td>
                                                            </tr>
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