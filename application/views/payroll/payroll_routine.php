<!DOCTYPE html>
<html lang="en">
<head>



	<?php include(APPPATH.'\views\stylesheet.php'); ?>
	<!-- DataTables -->


</head>


<body class="fixed-left">
<!-- Begin page -->
<div id="wrapper">

	<!-- ========== Left Sidebar Start ========== -->
	<?php include(APPPATH.'\views\sidebar.php'); ?>
	<!-- Left Sidebar End -->

	<!-- Start right Content here -->

	<div class="content-page" id="raps">
		<!-- Start content -->
		<div class="content">

			<!-- Top Bar Start -->
			<?php include(APPPATH.'\views\topbar.php'); ?>
			<!-- Top Bar End -->

			<div class="page-content-wrapper">

				<div class="container-fluid">

					<div class="row">
						<div class="col-sm-12">
							<div class="page-title-box">
								<div class="float-right">

								</div>
								<h4 class="page-title">Payroll Routine</h4>
							</div>
						</div>
					</div>
					<!-- end page title end breadcrumb -->


					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">

									<h4 class="mt-0 header-title">Run Payroll Routine</h4>


									<br> <br> <br>

									<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


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

									<div class="modal fade" id="add_payroll" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLongTitle2">Add New payroll</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true" class="text-dark">&times;</span>
													</button>
												</div>
												<form class="" method="post" action="<?php echo site_url('add_payroll_month_year'); ?>">
													<div class="modal-body">

														<div class="form-group">
															<label>Year of payroll:</label>

															<select class="select form-control mb-3 custom-select" id="payment_definition" required name="payroll_month_year_year" style="width: 100%; height:56px;">
																<option> -- Select -- </option>

																<option value="<?php echo date("Y"); ?>"> <?php echo date("Y"); ?> </option>



															</select>
														</div>

														<div class="form-group">
															<label>Month of payroll:</label>


															<select class="select form-control mb-3 custom-select" id="payment_definition" required name="payroll_month_year_month" style="width: 100%; height:56px;">
																<option> -- Select -- </option>

																<option value="<?php echo date('n', strtotime('-1 day', strtotime(date('Y-m-01'))));  ?>"> <?php echo date('F', strtotime('-1 day', strtotime(date('Y-m-01'))));  ?> </option>


																<option value="<?php echo date("n"); ?>"> <?php echo date("F"); ?> </option>



															</select>
														</div>

														<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />


													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-primary">Add New Year and Month </button>
														<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
													</div>
												</form>
											</div>
										</div>
									</div>



								</div>


							</div>
						</div>
					</div> <!-- end col -->
				</div> <!-- end row -->

			</div><!-- container -->

		</div> <!-- Page content Wrapper -->

	</div> <!-- content -->

	<?php include(APPPATH.'\views\footer.php'); ?>

</div>
<!-- End Right content here -->

</div>
<!-- END wrapper -->


<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>
