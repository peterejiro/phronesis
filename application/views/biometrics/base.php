<?php include(APPPATH.'/views/stylesheet.php'); ?>

<body>
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>
		<?php include(APPPATH.'/views/topbar.php'); ?>
		<?php include(APPPATH.'/views/sidebar.php'); ?>
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1>Attendance Reports</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Attendance Reports</div>
          </div>
				</div>
				<div class="section-body">
          <div class="section-title">All About Attendance Reports</div>
          <p class="section-lead">You can select the attendance report you want to generate here</p>
					<div class="row">
						<div class="col-lg-6">
							<div class="card card-large-icons">
								<div class="card-icon bg-primary text-white">
									<i class="fas fa-user-clock"></i>
								</div>
								<div class="card-body">
									<h4>Today's Present Employees</h4>
                  <p>Generate report for employees present today here</p>
									<a href="<?php echo base_url('today_present') ?>" class="card-cta">View Report <i class="fas fa-chevron-right"></i></a>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card card-large-icons">
								<div class="card-icon bg-primary text-white">
									<i class="fas fa-user-times"></i>
								</div>
								<div class="card-body">
									<h4>Today's Absent Employee</h4>
                  <p>Generate report for employees absent today here</p>
									<a href="<?php echo base_url('today_absent'); ?>" class="card-cta">View Report <i class="fas fa-chevron-right"></i></a>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card card-large-icons">
								<div class="card-icon bg-primary text-white">
									<i class="fas fa-calendar-check"></i>
								</div>
								<div class="card-body">
									<h4>Present Employees</h4>
                  <p>Generate report for employees present on a given date here</p>
									<a href="<?php echo base_url('present_employee'); ?>" class="card-cta">View Report <i class="fas fa-chevron-right"></i></a>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card card-large-icons">
								<div class="card-icon bg-primary text-white">
									<i class="fas fa-calendar-times"></i>
								</div>
								<div class="card-body">
									<h4>Absent Employees</h4>
									<p>Generate report for employees absent on a given date here</p>
									<a href="<?php echo base_url('absent_employee'); ?>" class="card-cta">View Report <i class="fas fa-chevron-right"></i></a>
								</div>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="card card-large-icons">
								<div class="card-icon bg-primary text-white">
									<i class="fas fa-calendar-minus"></i>
								</div>
								<div class="card-body">
									<h4>Clock Out - Today</h4>
									<p>Generate report for time Employees Clocked out</p>
									<a href="<?php echo base_url('clock_out_today'); ?>" class="card-cta">View Report <i class="fas fa-chevron-right"></i></a>
								</div>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="card card-large-icons">
								<div class="card-icon bg-primary text-white">
									<i class="far fa-calendar-plus"></i>
								</div>
								<div class="card-body">
									<h4>Clock Out - Date</h4>
									<p>Generate report for when employees clocked out on a given date here</p>
									<a href="<?php echo base_url('clock_out_date'); ?>" class="card-cta">View Report <i class="fas fa-chevron-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<?php include(APPPATH.'/views/footer.php'); ?>
<?php include(APPPATH.'/views/js.php'); ?>
</body>
</html>

<script>
  $('title').html('Attendance Reports - IHUMANE');
</script>
