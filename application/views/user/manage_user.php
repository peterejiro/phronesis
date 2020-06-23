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
								<h4 class="page-title">users</h4>
							</div>
						</div>
					</div>
					<!-- end page title end breadcrumb -->


					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">

									<?php if($error != ' '): ?>

										<div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											<i class="mdi mdi-close-circle font-32"></i><strong class="pr-1">Error !</strong> <?php echo $error; ?>.
										</div>
									<?php endif; ?>

									<form class="" method="post" action="<?php echo site_url('edit_user'); ?>">
										<div class="modal-body">

											<div class="form-group">
												<label>Name of user:</label>
												<input type="text" class="form-control"  name="name" required value="<?php echo $user_datum->user_name; ?>" placeholder="Enter Name of user"/>
											</div>

											<div class="form-group row">

												<div class="col-sm-6">
													<label>Email:</label>
													<input type="email" class="form-control"  name="email" required value="<?php echo $user_datum->user_email; ?>" placeholder="Enter Name of user"/>
												</div>
												<div class="col-sm-6">
													<label>Username:</label>
													<input type="text" class="form-control" readonly  name="username" required value="<?php echo $user_datum->user_username; ?>" placeholder="Enter username"/>
												</div>

											</div>


											<div class="form-group row">
												<div class="col-sm-6">



														<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />

														<input type="hidden" name="user_user_id" value="<?php echo $user_datum->user_id;?>" />


														<label>Password</label>
													<div class="input-group">
														<div class="input-group-addon">
															<span><i id="pass-active" class="mdi mdi-toggle-switch" aria-hidden="true" onClick="enablePassword()"></i></span>

														</div>
														<input class="form-control" name="password" type="password" disabled  id="password-field" autocomplete="current-password" placeholder="Password">
														<div class="input-group-addon">
															<span><i id="pass-status" class="fa fa-eye" aria-hidden="true" onClick="viewPassword()"></i></span>

														</div>
													</div>




												</div>
												<div class="col-sm-6">
												<label>Status</label>

												<select name="status" class="custom-select">



													<option value="1" <?php if($user_datum->user_status == 1){ echo "selected"; } ?>> Active </option>
													<option value="0" <?php if($user_datum->user_status == 0){ echo "selected"; } ?>> Inactive </option>



												</select>
												</div>



											</div>

											<div class="row">
												<div class="col-md-12 col-xl-12">
													<div class="card">
														<div class="card-body">
															<div class="form-group row">
																<label class="col-md-3 my-2 control-label">User Permissions</label>
																<div class="col-md-9">
																	<div class="checkbox my-2">
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" class="custom-control-input" <?php if($user_datum->employee_management == 1) { echo "checked" ;} ?> value="1" id="customCheck2" name="employee_management" data-parsley-multiple="groups" data-parsley-mincheck="1">
																			<label class="custom-control-label" for="customCheck2">Employee Management</label>
																		</div>
																	</div>
																	<div class="checkbox my-2">
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" class="custom-control-input" <?php if($user_datum->payroll_management == 1) { echo "checked" ;} ?> value="1" name="payroll_management" id="customCheck3" data-parsley-multiple="groups" data-parsley-mincheck="1">
																			<label class="custom-control-label" for="customCheck3">Payroll Management</label>
																		</div>
																	</div>
																	<div class="checkbox my-2">
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" class="custom-control-input" <?php if($user_datum->biometrics == 1) { echo "checked" ;} ?> value="1" name="biometrics" id="customCheck4" data-parsley-multiple="groups" data-parsley-mincheck="1">
																			<label class="custom-control-label" for="customCheck4"> Biometrics </label>
																		</div>
																	</div>
																	<div class="checkbox my-2">
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" class="custom-control-input" <?php if($user_datum->user_management == 1) { echo "checked" ;} ?> value="1" name="user_management"  id="customCheck5" data-parsley-multiple="groups" data-parsley-mincheck="1">
																			<label class="custom-control-label" for="customCheck5"> User Management </label>
																		</div>
																	</div>

																	<div class="checkbox my-2">
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" class="custom-control-input" <?php if($user_datum->configuration == 1) { echo "checked" ;} ?> value="1" name="configuration"  id="customCheck6" data-parsley-multiple="groups" data-parsley-mincheck="1">
																			<label class="custom-control-label" for="customCheck6"> App Configuration </label>
																		</div>																	</div>

																	<div class="checkbox my-2">
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" class="custom-control-input" <?php if($user_datum->payroll_configuration == 1) { echo "checked" ;} ?> value="1" name="payroll_configuration"  id="customCheck7" data-parsley-multiple="groups" data-parsley-mincheck="1">
																			<label class="custom-control-label" for="customCheck7"> Payroll Configuration </label>
																		</div>
																	</div>

																	<div class="checkbox my-2">
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" class="custom-control-input" <?php if($user_datum->hr_configuration == 1) { echo "checked" ;} ?> value="1" name="hr_configuration"  id="customCheck8" data-parsley-multiple="groups" >
																			<label class="custom-control-label" for="customCheck8"> HR Configuration </label>
																		</div>
																	</div>
																</div>
															</div> <!--end row-->







														</div>
													</div>
												</div> <!-- end col -->
											</div><!--end row-->



											<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />

											<input type="hidden" name="user_id" value="" />


										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary">Update user</button>

										</div>
									</form>


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
<script>

	function viewPassword() {
		var passwordInput = document.getElementById('password-field');
		var passStatus = document.getElementById('pass-status');
		if (passwordInput.type == 'password')
		{
			passwordInput.type='text';
			passStatus.className='fa fa-eye-slash';
		}
		else
		{
			passwordInput.type='password';
			passStatus.className='fa fa-eye';
		}
	}

	function enablePassword() {
		 var passwordInput = document.getElementById('password-field');
		var passwordActive = document.getElementById('pass-active');

		 if(passwordInput.disabled == false){
		 	passwordInput.value = null;
		 	passwordInput.disabled = true;
		 	passwordActive.className = 'mdi mdi-toggle-switch';

		 }
		 else{
			 passwordInput.disabled = false;
			 passwordActive.className = 'mdi mdi-toggle-switch-off';
		 }







	}


</script>


<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>
