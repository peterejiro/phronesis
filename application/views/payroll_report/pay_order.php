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
								<h4 class="page-title">Pay Order</h4>
							</div>
						</div>
					</div>
					<!-- end page title end breadcrumb -->


					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">

									<h4 class="mt-0 header-title"> Pay Order</h4>


									<br> <br> <br>


									<div class="modal-content">
									<form class="" method="post" action="<?php echo site_url('pay_order_report'); ?>" id="loan_form">
											<div class="modal-body">



													<div class="form-group row">

														<div class="col-sm-6">
															<label>Start Year:</label>

															<select class="select2 form-control mb-3 custom-select" id="start_year" required name="year" style="width: 100%; height:56px;">
																<option value="0"> -- Select -- </option>
																<option value="<?php echo $min_payroll_year[0]->salary_pay_year; ?>"> <?php echo $min_payroll_year[0]->salary_pay_year; ?> </option>
														<?php
														$_min_payroll_year = $min_payroll_year[0]->salary_pay_year;
														$_year = date("Y");
														$check = $_year - $_min_payroll_year;
														if($check > 0):
															$count = 1;
																	while ($count <= $check):
														?>
																<option value="<?php echo $_min_payroll_year + $count; ?>"> <?php echo $_min_payroll_year + $count; ?> </option>

															<?php
																	$count++;
															endwhile;
															endif; ?>

															</select>

														</div>



													</div>

												<div class="form-group row">


													<div class="col-sm-6">
														<label>Start Month:</label>


														<select class="select2 form-control mb-3 custom-select" id="start_month" required name="month" style="width: 100%; height:56px;">
															<option value="0"> -- Select -- </option>

															<?php $month = date('n'); // current month
															for ($x = 0; $x < 12; $x++): ?>
																<option value="<?php echo date('n', mktime(0,0,0,$month + $x,1)); ?>">
																	<?php echo date('F', mktime(0,0,0,$month + $x,1)); ?>
																</option>
															<?php endfor; ?>



														</select>

													</div>


												</div>












												<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
												<div class="modal-footer">

													<button type="submit" id="loan_button"  class="btn btn-primary">List</button>
													<button type="reset" class="btn btn-danger ml-2">Clear All</button>
												</div>
										</form>
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



