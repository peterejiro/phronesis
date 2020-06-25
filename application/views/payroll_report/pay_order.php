
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
					<h1> Pay Order </h1>
				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-body">
								<div class="modal-content">
									<form class="" method="post" action="<?php echo site_url('pay_order_report'); ?>" id="loan_form">
										<div class="modal-body">



											<div class="form-group row">

												<div class="col-sm-6">
													<label>Start Year:</label>

													<select class="selectric form-control mb-3 custom-select" id="start_year" required name="year" style="width: 100%; height:56px;">
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


													<select class="selectric form-control mb-3 custom-select" id="start_month" required name="month" style="width: 100%; height:56px;">
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
