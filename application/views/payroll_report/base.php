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
					<h1>Payroll Reports</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Payroll Reports</div>
          </div>
				</div>
				<div class="section-body">
          <div class="section-title">All About Payroll Reports</div>
          <p class="section-lead">You can select the payroll report you want to generate here</p>
					<div class="row">
						<div class="col-lg-6">
							<div class="card card-large-icons">
								<div class="card-icon bg-primary text-white">
									<i class="fas fa-money-check"></i>
								</div>
								<div class="card-body">
									<h4>Emolument Report</h4>
                  <p>Generate emolument sheet for the selected month & year</p>
									<a href="<?php echo base_url('emolument') ?>" class="card-cta">View Report <i class="fas fa-chevron-right"></i></a>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card card-large-icons">
								<div class="card-icon bg-primary text-white">
									<i class="fas fa-coins"></i>
								</div>
								<div class="card-body">
									<h4>Deduction Report</h4>
                  <p>Generate deduction sheet for deduction type, month & year</p>
									<a href="<?php echo base_url('deduction'); ?>" class="card-cta">View Report <i class="fas fa-chevron-right"></i></a>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card card-large-icons">
								<div class="card-icon bg-primary text-white">
									<i class="fas fa-file-signature"></i>
								</div>
								<div class="card-body">
									<h4>Pay Order</h4>
                  <p>Generate pay order sheet for the selected month & year</p>
									<a href="<?php echo base_url('pay_order'); ?>" class="card-cta">View Report <i class="fas fa-chevron-right"></i></a>
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
  $('title').html('Payroll Reports - IHUMANE')
</script>
