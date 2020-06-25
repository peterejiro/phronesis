<!DOCTYPE html>
<html lang="en">
<head>



	<?php include(APPPATH.'\views\stylesheet.php'); ?>
	<!-- DataTables -->


</head>


<body class="fixed-left">
<!-- Begin page -->
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>
		<?php include(APPPATH.'\views\topbar.php'); ?>


		<?php include(APPPATH.'\views\sidebar.php'); ?>



		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1> Payroll Routine </h1>
				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-body">

								<table id="datatable-buttons" class="table table-bordered table-md">
									<thead>
									<tr>
										<th>Month and Year</th>
										<th>Action</th>

									</tr>
									</thead>

									<tbody>
									<?php if(!empty($payroll_year)): ?>

										<tr>
											<td><?php echo $payroll_year->payroll_month_year_year." ".date("F", mktime(0, 0, 0, $payroll_year->payroll_month_year_month, 10)); ?></td>
											<td> <a class="btn btn-primary m-b-10 m-l-10 waves-effect waves-light" href="<?php echo site_url('run_payroll_routine'); ?>" >
													Run Payroll Routine
												</a>


										</tr>

									<?php


									endif; ?>

									</tbody>

								</table>







							</div>


						</div>
					</div>


			</section>
		</div>




	</div>
</div>





<!-- End Right content here -->

</div>
<!-- END wrapper -->


<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>
