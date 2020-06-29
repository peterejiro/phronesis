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
					<h1> New Leave</h1>
				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-body">

								<div class="modal-content">
									<form class="" method="post" action="<?php echo site_url('add_new_employee_leave'); ?>" id="loan_form">
										<div class="modal-body">

											<div class="form-group row">

												<div class="col-sm-6">
													<label> Employee:</label>
													<select class="form-control mb-3 custom-select selectric" required name="employee_id" style="width: 100%; height:56px;">
														<option disabled selected> -- Select -- </option>
														<?php foreach ($employees as $employee):

															?>
															<option value="<?php echo $employee->employee_id ?>"> <?php echo $employee->employee_unique_id." (".$employee->employee_last_name." ".$employee->employee_first_name.")"; ?> </option>
														<?php

														endforeach; ?>


													</select>
												</div>
												<div class="col-sm-6">
													<label> Leave Type:</label>
													<select class="form-control mb-3 custom-select selectric" required name="leave_id">
														<option disabled selected> --select-- </option>


														<?php foreach ($leaves as $leave):

															?>
															<option value="<?php echo $leave->leave_id ?>"> <?php echo $leave->leave_name; ?> </option>
														<?php

														endforeach; ?>


													</select>
												</div>



											</div>

											<div class="form-group row">

												<div class="col-sm-6">
													<label> Start Date:</label>
													<input type="date" class="form-control"  name="start_date" required  placeholder="Enter Name of employee" />
												</div>
												<div class="col-sm-6" id="location">
													<label> End Date:</label>
													<input type="date" class="form-control"  name="end_date" required value="<?php echo "t";  ?>" placeholder="Enter Name of employee" />
												</div>

											</div>

											<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
											<div class="modal-footer">
												<button type="submit"  class="btn btn-primary">Add</button>
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



