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
					<h1> PayRoll Reports</h1>
				</div>

				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
					<a href="<?php echo site_url('emolument'); ?>">
						<div class="card card-statistic-1">
							<div class="card-icon bg-primary">
								<i class="far fa-user"></i>
							</div>
							<div class="card-wrap">
								<div class="card-header">
<!--									<h4>Total Employees</h4>-->
								</div>
								<div class="card-body">
									Emolument Report
								</div>
							</div>
						</div>
					</a>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
						<a href="<?php echo site_url('deduction'); ?>">
							<div class="card card-statistic-1">
								<div class="card-icon bg-primary">
									<i class="far fa-user"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
<!--										<h4>Total Employees</h4>-->
									</div>
									<div class="card-body">
										Deduction
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
						<a href="<?php echo site_url('pay_order'); ?>">
							<div class="card card-statistic-1">
								<div class="card-icon bg-primary">
									<i class="far fa-user"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
<!--										<h4>Total Employees</h4>-->
									</div>
									<div class="card-body">
										Pay Order
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
						<div class="card card-statistic-1">
							<div class="card-icon bg-success">
								<i class="fas fa-circle"></i>
							</div>
							<div class="card-wrap">
								<div class="card-header">
									<h4>Online Users</h4>
								</div>
								<div class="card-body">
									47
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
