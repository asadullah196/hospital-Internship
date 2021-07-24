<?php
include_once('hms/include/config.php');
if (isset($_POST['submit'])) {
	$name = $_POST['fullname'];
	$email = $_POST['emailid'];
	$mobileno = $_POST['mobileno'];
	$dscrption = $_POST['description'];
	$query = mysqli_query($con, "insert into tblcontactus(fullname,email,contactno,message) value('$name','$email','$mobileno','$dscrption')");
	echo "<script>alert('Your information succesfully submitted');</script>";
	echo "<script>window.location.href ='contact.php'</script>";
}


?>
<!DOCTYPE HTML>
<html>

<head>
	<title>HMS | Contact us</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
</head>

<body>
	<br><br><br><br><br><br>
	<!--start-wrap-->
	<section>
		<div class="body-area">
			<div class="wrap">
				<div class="contact">
					<div class="section group">
						<div class="col span_1_of_3">

							<div class="company_address">
								<h2>Hospital Address :</h2>
								<p>Plot # 9/2, Avenue # 5,</p>
								<p>Section # 6, Block # B,</p>
								<p>Mirpur, Dhaka</p>
								<p>Phone:(00) 222 666 444</p>
								<p>Fax: (000) 000 00 00 0</p>
								<p>Email: <span>info@galibnotes.com</span></p>

							</div>
						</div>
						<div class="col span_2_of_3">
							<div class="contact-form">
								<h2>Contact Us</h2>
								<form name="contactus" method="post">
									<div>
										<span><label>NAME</label></span>
										<span><input type="text" name="fullname" required="true" value=""></span>
									</div>
									<div>
										<span><label>E-MAIL</label></span>
										<span><input type="email" name="emailid" required="ture" value=""></span>
									</div>
									<div>
										<span><label>MOBILE.NO</label></span>
										<span><input type="text" name="mobileno" required="true" value=""></span>
									</div>
									<div>
										<span><label>Description</label></span>
										<span><textarea name="description" required="true"> </textarea></span>
									</div>
									<div>
										<span><input type="submit" name="submit" value="Submit"></span>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer>
		<div class="footer-copyright">
			<?php
				include('template/footer.php');
			?>
		</div>
	</footer>
</body>

</html>