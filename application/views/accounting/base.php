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
					<h1>Accounting Reports</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Accounting Reports</div>
          </div>
				</div>
				<div class="section-body">
          <div class="section-title">All About Accounting Reports</div>
          <p class="section-lead">You can select the Accounting report you want to generate here</p>
					<div class="row">
						<div class="col-lg-6">
							<div class="card card-large-icons">
								<div class="card-icon bg-primary text-white">
									<i class="fas fa-money-check"></i>
								</div>
								<div class="card-body">
									<h4>Profit and Loss Statement</h4>
                  <p>Generate emolument sheet for the selected month & year</p>
									<a href="<?php echo base_url('profit_loss') ?>" class="card-cta">View Report <i class="fas fa-chevron-right"></i></a>
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
  $('title').html('Accounting Reports - Phronesis')
</script>
