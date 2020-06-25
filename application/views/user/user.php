
<!DOCTYPE html>
<html lang="en">
<head>

	<?php include(APPPATH.'\views\stylesheet.php');

	?>
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

					<h1> Users</h1>

				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-body">
								<a class="btn btn-secondary btn-round" type="button" href="<?php echo site_url('new_user') ?>" aria-haspopup="true" aria-expanded="false">
									<i class="mdi mdi-new-box "></i>Add New user
								</a>

								<br> <br> <br>

								<table id="datatable-buttons" class="table table-bordered table-md">
									<thead>
									<tr>
										<th>Username</th>
										<th>Name of user</th>
										<th>Status</th>
										<th>Action</th>

									</tr>
									</thead>

									<tbody>
									<?php if(!empty($users)):
										foreach($users as $user):
											?>
											<tr>
												<td><?php echo $user->user_username; ?></td>
												<td><?php echo $user->user_name; ?></td>
												<td><?php $status = $user->user_status; if ($status == 1) { echo "active";} else{ echo "inactive";} ?></td>
												<td><button type="button" class="btn btn-primary m-b-10 m-l-10 waves-effect waves-light" data-toggle="modal" data-target="#view_user<?php echo $user->user_id ?>">
														<i class="mdi mdi-eye"></i>
													</button>
													<a type="button" class="btn btn-primary m-b-10 m-l-10 waves-effect waves-light" href="<?php echo site_url('manage_user')."/".$user->user_id; ?>">
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




							</div>


						</div>
					</div>


			</section>
		</div>
		<?php foreach($users as $user): ?>
			<div class="modal fade bd-example-modal-lg" id="view_user<?php echo $user->user_id ?>" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle2">View user</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true" class="text-dark">&times;</span>
							</button>
						</div>
						<form class="" method="post" action="<?php echo site_url('update_user'); ?>">
							<div class="modal-body">

								<div class="form-group">
									<label>Name of user:</label>
									<input type="text" class="form-control" disabled name="user_name" required value="<?php echo $user->user_name; ?>" placeholder="Enter Name of user"/>
								</div>

								<div class="form-group row">

									<div class="col-sm-6">
										<label>Email:</label>
										<input type="text" class="form-control"  name="user_name" required value="<?php echo $user->user_email; ?>" placeholder="Enter Name of user"/>
									</div>
									<div class="col-sm-6">
										<label>Username:</label>
										<input type="text" class="form-control" disabled  name="user_name" required value="<?php echo $user->user_username; ?>" placeholder="Enter Name of user"/>
									</div>

								</div>

								<div class="form-group row">

									<div class="col-sm-12 ml-auto input-group mt-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroup-sizing-normal">Status</span>
										</div>
										<input type="text" disabled value="<?php if($user->user_status == 1){ echo "Active"; } else { echo "Inactive"; } ?>" class="form-control" aria-label="Normal" aria-describedby="inputGroup-sizing-sm">
									</div>
								</div>

								<div class="row">
									<div class="col-md-12 col-xl-12">
										<div class="card">
											<div class="card-body">
												<h4 class="mt-0 header-title">User Permission</h4>

												<?php if ($user->employee_management == 1): ?>

													<button type="button" class="btn btn-success">
														Employee Management
													</button>


												<?php	endif;
												?>

												<?php if ($user->payroll_management == 1): ?>

													<button type="button" class="btn btn-success">
														Payroll Management
													</button>


												<?php	endif;
												?>

												<?php if ($user->user_management == 1): ?>

													<button type="button" class="btn btn-success">
														User Management
													</button>


												<?php	endif;
												?>

												<?php if ($user->biometrics == 1): ?>

													<button type="button" class="btn btn-success">
														Biometrics
													</button>


												<?php	endif;
												?>

												<?php if ($user->configuration == 1): ?>

													<button type="button" class="btn btn-success">
														App Configuration
													</button>


												<?php	endif;
												?>

												<?php if ($user->hr_configuration == 1): ?>

													<button type="button" class="btn btn-success">
														HR Configuration
													</button>


												<?php	endif;
												?>

												<?php if ($user->payroll_configuration == 1): ?>

													<button type="button" class="btn btn-success">
														Payroll Configuration
													</button>


												<?php	endif;
												?>



											</div>
										</div>
									</div> <!-- end col -->
								</div><!--end row-->



								<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />

								<input type="hidden" name="user_id" value="<?php echo $user->user_id;?>" />


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
<!-- END wrapper -->


<?php include(APPPATH.'\views\js.php'); ?>


</body>
</html>
