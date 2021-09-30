<div class="sidebar app-aside" id="sidebar">
	<div class="sidebar-container perfect-scrollbar">

		<nav>

			<!-- start: MAIN NAVIGATION MENU -->
			<div class="navbar-title">
				<span>Main Navigation</span>
			</div>
			<ul class="main-navigation-menu">
				<li>
					<a href="dashboard.php">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-home"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Dashboard </span>
							</div>
						</div>
					</a>
				</li>
				<li>
					<a href="edit-profile.php">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-align-left"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Profile View & Update </span>
							</div>
						</div>
					</a>
				</li>
				<li>
					<a href="appointment-history.php">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-arrow-circle-right"></i>
							</div>
							<div class="item-inner">
								<span class="title"> My Appointments </span>
							</div>
						</div>
					</a>
				</li>
				<li>
					<a href="book-appointment.php">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-save-alt"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Book Appointment </span>
							</div>
						</div>
					</a>
				</li>
				<li>
					<a href="view-prescription-patient.php">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-comments"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Check Prescription </span>
							</div>
						</div>
					</a>
				</li>
				<li>
					<a href="next-appointment-user.php">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-reload"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Next Schedule </span>
							</div>
						</div>
					</a>
				</li>

				<li>
					<a href="user-urine-test.php">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-pulse"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Urine Test </span>
							</div>
						</div>
					</a>
				</li>
				<li>
					<a href="user-blood-test.php">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-infinite"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Blood Test </span>
							</div>
						</div>
					</a>
				</li>
				<li>
					<a href="view-notes-patient.php?viewid=<?php echo $_SESSION['id']; ?>">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-headphone"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Special Note </span>
							</div>
						</div>
					</a>
				</li>

			</ul>
			<!-- end: CORE FEATURES -->

		</nav>
	</div>
</div>