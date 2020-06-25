<!DOCTYPE html>
<html lang="en">
<head>

	<?php include(APPPATH.'\views\stylesheet.php'); ?>

</head>

<body>
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>
		<?php include(APPPATH.'\views\topbar.php'); ?>


		<?php include(APPPATH.'\views\sidebar.php'); ?>



		<div class="main-content">

			<section class="section">
				<div class="section-header">
					<h1>PayRoll Reports</h1>
				</div>

				<div class="section-body">

					<div class="row">
						<div class="col-lg-6">
							<div class="card card-large-icons">
								<div class="card-icon bg-primary text-white">
									<i class="fas fa-cog"></i>
								</div>
								<div class="card-body">
									<h4>Emolument Report</h4>

									<a href="<?php echo base_url('emolument') ?>" class="card-cta">View Report <i class="fas fa-chevron-right"></i></a>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card card-large-icons">
								<div class="card-icon bg-primary text-white">
									<i class="fas fa-search"></i>
								</div>
								<div class="card-body">
									<h4>Deduction Report</h4>

									<a href="<?php echo base_url('deduction'); ?>" class="card-cta">View Report <i class="fas fa-chevron-right"></i></a>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card card-large-icons">
								<div class="card-icon bg-primary text-white">
									<i class="fas fa-envelope"></i>
								</div>
								<div class="card-body">
									<h4>Pay Order</h4>

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
<!-- END wrapper -->

<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>
