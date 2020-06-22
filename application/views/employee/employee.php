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
								<h4 class="page-title">employees</h4>
							</div>
						</div>
					</div>
					<!-- end page title end breadcrumb -->


					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">

									<h4 class="mt-0 header-title">employees</h4>

									<a class="btn btn-secondary btn-round" type="button" href="<?php echo site_url('new_employee') ?>" aria-haspopup="true" aria-expanded="false">
										<i class="mdi mdi-new-box "></i>Add New employee
									</a>

									<br> <br> <br>

									<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


										<thead>



										<tr>

											<th>Name of employee</th>
											<th>Department</th>
											<th>Job Role</th>
											<th>Employment Status</th>
											<th>Action</th>

										</tr>
										</thead>


										<tbody>
										<?php if(!empty($employees)):
											foreach($employees as $employee):
												?>
												<tr>
													<td><?php echo $employee->employee_last_name." ".$employee->employee_first_name." ".$employee->employee_other_name; ?></td>
													<td><?php echo $employee->department_name; ?></td>
													<td><?php echo $employee->job_name; ?></td>
													<td><?php $status = $employee->employee_status; if ($status == 0) { echo "Fired";} if ($status == 1) { echo "Probationary";} if ($status == 2) { echo "Confirmed";} if ($status == 3) { echo "Retired";} ?></td>
													<td><a type="button" class="btn btn-primary m-b-10 m-l-10 waves-effect waves-light"  href="<?php echo site_url('view_employee')."/".$employee->employee_id; ?>">
															<i class="mdi mdi-eye"></i>
														</a>
														<a type="button" class="btn btn-primary m-b-10 m-l-10 waves-effect waves-light" href="<?php echo site_url('update_employee')."/".$employee->employee_id; ?>">
															<i class="mdi mdi-table-edit "></i>
														</a>
														<button type="button" class="btn btn-danger m-b-10 m-l-10 waves-effect waves-light">
															<i class="mdi mdi-delete-forever "></i>
														</button></td>

												</tr>

											<?php

											endforeach;
										endif; ?>

										</tbody>

									</table>

									<div class="modal fade bd-example-modal-lg" id="add_employee" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLongTitle2">Add New employee</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true" class="text-dark">&times;</span>
													</button>
												</div>
												<form class="" method="post" action="<?php echo site_url('add_employee'); ?>">
													<div class="modal-body">

														<div class="form-group">
															<label>Name of employee:</label>
															<input type="text" class="form-control"  name="employee_name" required placeholder="Enter Name of employee"/>
														</div>


														<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />


													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-primary">Add New employee</button>
														<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
													</div>
												</form>
											</div>
										</div>
									</div>


									<?php foreach($employees as $employee): ?>
										<div class="modal fade bd-example-modal-lg" id="view_employee<?php echo $employee->employee_id ?>" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLongTitle2">View employee</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true" class="text-dark">&times;</span>
														</button>
													</div>
													<form class="" method="post" action="<?php echo site_url('update_employee'); ?>">
														<div class="modal-body">

															<div class="form-group">
																<label>Name of employee:</label>
																<input type="text" class="form-control" disabled name="employee_name" required value="<?php echo $employee->employee_name; ?>" placeholder="Enter Name of employee"/>
															</div>

															<div class="form-group row">

																<div class="col-sm-6">
																	<label>Email:</label>
																	<input type="text" class="form-control"  name="employee_name" required value="<?php echo $employee->employee_email; ?>" placeholder="Enter Name of employee"/>
																</div>
																<div class="col-sm-6">
																	<label>employeename:</label>
																	<input type="text" class="form-control" disabled  name="employee_name" required value="<?php echo $employee->employee_employeename; ?>" placeholder="Enter Name of employee"/>
																</div>

															</div>

															<div class="form-group row">

																<div class="col-sm-12 ml-auto input-group mt-3">
																	<div class="input-group-prepend">
																		<span class="input-group-text" id="inputGroup-sizing-normal">Status</span>
																	</div>
																	<input type="text" disabled value="<?php if($employee->employee_status == 1){ echo "Active"; } else { echo "Inactive"; } ?>" class="form-control" aria-label="Normal" aria-describedby="inputGroup-sizing-sm">
																</div>
															</div>

															<div class="row">
																<div class="col-md-12 col-xl-12">
																	<div class="card">
																		<div class="card-body">
																			<h4 class="mt-0 header-title">employee Permission</h4>

																			<?php if ($employee->employee_management == 1): ?>

																				<button type="button" class="btn btn-success">
																					Employee Management
																				</button>


																			<?php	endif;
																			?>

																			<?php if ($employee->payroll_management == 1): ?>

																				<button type="button" class="btn btn-success">
																					Payroll Management
																				</button>


																			<?php	endif;
																			?>

																			<?php if ($employee->employee_management == 1): ?>

																				<button type="button" class="btn btn-success">
																					employee Management
																				</button>


																			<?php	endif;
																			?>

																			<?php if ($employee->biometrics == 1): ?>

																				<button type="button" class="btn btn-success">
																					Biometrics
																				</button>


																			<?php	endif;
																			?>



																		</div>
																	</div>
																</div> <!-- end col -->
															</div><!--end row-->



															<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />

															<input type="hidden" name="employee_id" value="<?php echo $employee->employee_id;?>" />


														</div>
														<div class="modal-footer">

															<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
														</div>
													</form>
												</div>
											</div>
										</div>

									<?php endforeach; ?>
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
