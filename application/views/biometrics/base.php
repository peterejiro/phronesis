<?php include(APPPATH.'\views\stylesheet.php'); ?>

<body>
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>
		<?php include(APPPATH.'\views\topbar.php'); ?>
		<?php include(APPPATH.'\views\sidebar.php'); ?>
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1>Biometrics Reports</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Biometrics Reports</div>
          </div>
				</div>
				<div class="section-body">
          <div class="section-title">All About Biometrics Reports</div>
          <p class="section-lead">You can select the Biometric Reports you want to generate here</p>
					<div class="row">
						<div class="col-lg-6">
							<div class="card card-large-icons">
								<div class="card-icon bg-primary text-white">
									<i class="fas fa-money-check"></i>
								</div>
								<div class="card-body">
									<h4> Today's Present Employees</h4>
                  <p>Check Employee Present Today</p>
									<a href="<?php echo base_url('today_present') ?>" class="card-cta">View Report <i class="fas fa-chevron-right"></i></a>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card card-large-icons">
								<div class="card-icon bg-primary text-white">
									<i class="fas fa-coins"></i>
								</div>
								<div class="card-body">
									<h4>Today's Absent Employee</h4>
                  <p>Check Employee Absent today</p>
									<a href="<?php echo base_url('today_absent'); ?>" class="card-cta">View Report <i class="fas fa-chevron-right"></i></a>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card card-large-icons">
								<div class="card-icon bg-primary text-white">
									<i class="fas fa-file-signature"></i>
								</div>
								<div class="card-body">
									<h4>Present Employees</h4>
                  <p>Generate Employees Present on a given date</p>
									<a href="<?php echo base_url('present_employee'); ?>" class="card-cta">View Report <i class="fas fa-chevron-right"></i></a>
								</div>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="card card-large-icons">
								<div class="card-icon bg-primary text-white">
									<i class="fas fa-file-signature"></i>
								</div>
								<div class="card-body">
									<h4>Absent Employees</h4>
									<p>Generate Employees Absent on a given date</p>
									<a href="<?php echo base_url('absent_employee'); ?>" class="card-cta">View Report <i class="fas fa-chevron-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<?php include(APPPATH.'\views\footer.php'); ?>
<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>
