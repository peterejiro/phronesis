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
								<h4 class="page-title">job_roles</h4>
							</div>
						</div>
					</div>
					<!-- end page title end breadcrumb -->


					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">

									<h4 class="mt-0 header-title">job_roles</h4>

									<button class="btn btn-secondary btn-round" type="button"data-toggle="modal" data-target="#add_job_role" aria-haspopup="true" aria-expanded="false">
										<i class="mdi mdi-new-box "></i>Add New job_role
									</button>

									<br> <br> <br>

									<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


										<thead>



										<tr>
											<th>Name of job role</th>
											<th>Department</th>
											<th>Job Description</th>
											<th>Action</th>

										</tr>
										</thead>


										<tbody>
										<?php if(!empty($job_roles)):
										foreach($job_roles as $job_role):
										?>
										<tr>
											<td><?php echo $job_role->job_name; ?></td>
											<td><?php echo $job_role->department_name; ?></td>
											<td><?php echo $job_role->job_description; ?></td>
											<td> <button type="button" class="btn btn-primary m-b-10 m-l-10 waves-effect waves-light" data-toggle="modal" data-target="#edit_job_role<?php echo $job_role->job_role_id ?>">
													<i class="mdi mdi-table-edit "></i>
												</button>
												<button type="button" class="btn btn-danger m-b-10 m-l-10 waves-effect waves-light">
													<i class="mdi mdi-delete-forever "></i>
												</button></td>

										</tr>

										<?php

										endforeach;
										endif; ?>

										</tbody>

									</table>

									<div class="modal fade" id="add_job_role" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLongTitle2">Add New job_role</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true" class="text-dark">&times;</span>
													</button>
												</div>
												<form class="" method="post" action="<?php echo site_url('add_job_role'); ?>">
												<div class="modal-body">

														<div class="form-group">
															<label>Name of job_role:</label>
															<input type="text" class="form-control"  name="job_role_name" required placeholder="Enter Name of job_role"/>
														</div>

													<div class="form-group">
														<label>Select Department</label>

															<select name="department_id" class="custom-select">

																<option selected>Open this select menu</option>
																<?php foreach($departments as $department): ?>
																<option value="<?php echo $department->department_id; ?>"> <?php echo $department->department_name; ?></option>

																<?php endforeach; ?>

															</select>

													</div>

													<div class="form-group">
														<label class="mb-0"><b>Job Description</b></label>

														<textarea id="textarea" name="job_description" class="form-control" maxlength="225" rows="3" placeholder="Enter Job Description."></textarea>

													</div>


													<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />


												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-primary">Add New job Role</button>
													<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
												</div>
												</form>
											</div>
										</div>
									</div>


									<?php foreach($job_roles as $job_role): ?>
									<div class="modal fade" id="edit_job_role<?php echo $job_role->job_role_id ?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLongTitle2">Update job_role</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true" class="text-dark">&times;</span>
													</button>
												</div>
												<form class="" method="post" action="<?php echo site_url('update_job_role'); ?>">
													<div class="modal-body">

														<div class="form-group">
															<label>Name of job_role:</label>
															<input type="text" class="form-control"  name="job_role_name" required value="<?php echo $job_role->job_name; ?>" placeholder="Enter Name of job_role"/>
														</div>

														<div class="form-group">
															<label>Select Department</label>

															<select name="department_id" class="custom-select">

																<option selected>Open this select menu</option>
																<?php foreach($departments as $department): ?>
																	<option value="<?php echo $department->department_id; ?>" <?php if($job_role->department_id == $department->department_id){ echo "selected"; } ?>> <?php echo $department->department_name; ?></option>

																<?php endforeach; ?>

															</select>

														</div>

														<div class="form-group">
															<label class="mb-0"><b>Job Description</b></label>

															<textarea id="textarea" name="job_description" class="form-control" maxlength="225" rows="3" placeholder="Enter Job Description."> <?php echo $job_role->job_description; ?></textarea>

														</div>


														<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />

														<input type="hidden" name="job_role_id" value="<?php echo $job_role->job_role_id;?>" />


													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-primary">Update job_role</button>
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
