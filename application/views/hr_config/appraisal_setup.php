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
					<h1>Appraisal Setup</h1>
				</div>

				<div class="section-body">

					<div class="row">
						<div class="col-lg-6">
							<div class="card card-large-icons">
								<div class="card-icon bg-primary text-white">
									<i class="fas fa-cog"></i>
								</div>
								<div class="card-body">
									<h4>Self-Performance Assessment</h4>

									<a href="<?php echo base_url('self_assessment') ?>" class="card-cta">Setup <i class="fas fa-chevron-right"></i></a>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card card-large-icons">
								<div class="card-icon bg-primary text-white">
									<i class="fas fa-search"></i>
								</div>
								<div class="card-body">
									<h4>Quantitative Assessment</h4>

									<a href="<?php echo base_url('quantitative_assessment'); ?>" class="card-cta">Setup <i class="fas fa-chevron-right"></i></a>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card card-large-icons">
								<div class="card-icon bg-primary text-white">
									<i class="fas fa-envelope"></i>
								</div>
								<div class="card-body">
									<h4>Qualitative Assessment</h4>

									<a href="<?php echo base_url('qualitative_assessment'); ?>" class="card-cta">Setup <i class="fas fa-chevron-right"></i></a>
								</div>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="card card-large-icons">
								<div class="card-icon bg-primary text-white">
									<i class="fas fa-envelope"></i>
								</div>
								<div class="card-body">
									<h4>Supervisor Assessment</h4>

									<a href="<?php echo base_url('supervisor_assessment'); ?>" class="card-cta">Setup <i class="fas fa-chevron-right"></i></a>
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
