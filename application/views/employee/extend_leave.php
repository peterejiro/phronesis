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
					<h1> Extend Leave</h1>
				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-body">

								<div class="modal-content">
									<form class="" method="post" action="<?php echo site_url('extend_employee_leave'); ?>" id="loan_form">
										<div class="modal-body">

											<div class="form-group row">

												<div class="col-sm-6">
													<label> Employee:</label>

													<input type="text" class="form-control"  disabled value="<?php echo $leave->employee_first_name." ".$leave->employee_last_name; ?>" />

												</div>
												<div class="col-sm-6">
													<label> Leave Type:</label>
													<input type="text" class="form-control"  disabled value="<?php echo $leave->leave_name; ?>" />

												</div>

												<input type="hidden" name="leave_id" value="<?php echo $leave->employee_leave_id; ?>">

											</div>

											<div class="form-group row">

												<div class="col-sm-6">
													<label> Start Date:</label>
													<input type="date" class="form-control"   name="start_date"  required disabled  value="<?php echo $leave->leave_start_date; ?>" />
												</div>
												<div class="col-sm-6" id="location">
													<label> End Date:</label>
													<input type="date" class="form-control"  name="end_date" required value="<?php echo "t";  ?>" placeholder="Enter Name of employee" />
												</div>

											</div>

											<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
											<div class="modal-footer">
												<button type="submit"  class="btn btn-primary">Extend</button>
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



