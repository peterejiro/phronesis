
<?php include(APPPATH.'/views/stylesheet.php');
$CI =& get_instance();
$CI->load->model('hr_configurations');
$CI->load->model('payroll_configurations');
$CI->load->model('employees');

?>

<body class="layout-3">
<div id="app">
	<div class="main-wrapper container">
		<div class="navbar-bg"></div>
		<?php include('header.php'); ?>

		<?php include('menu.php'); ?>

		<!-- Main Content -->
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1>Change Password</h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="<?php echo base_url('employee_main'); ?>">Dashboard</a></div>

						<div class="breadcrumb-item">Change Password</div>
					</div>
				</div>
				<div class="section-body">
					<div class="section-title">Change Password</div>
					<div class="row mt-4">
						<div class="col-6 offset-3">

							<div class="card-body">

								<form method="post" action="<?php echo site_url('change_password_'); ?>">
									<div class="form-group">

										<input type="hidden" value="<?php echo $user_data->user_id; ?>"  class="form-control" name="user_id" >
									</div>

									<div class="form-group">
										<label for="password">New Password</label>
										<input id="password" type="password" onkeyup="check_password()" class="form-control pwstrength" data-indicator="pwindicator" name="password" tabindex="2" required>
										<div id="pwindicator" class="pwindicator">
											<div class="bar"></div>
											<div class="label"></div>
										</div>
									</div>

									<div class="form-group">
										<label for="password_confirm">Confirm Password</label>
										<input id="password_confirm" onkeyup="check_password()" type="password" class="form-control" name="confirm-password" tabindex="2" required>
									</div>
									<div id="password_alert">
									<div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert" >
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<i class="mdi mdi-close-circle font-32"></i><strong class="pr-1">Error !</strong> Password Do Not Match.
									</div>
									</div>

									<div id="password_success">
										<div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert" >
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											<i class="mdi mdi-close-circle font-32"></i><strong class="pr-1">Yes !</strong> Password Match.
										</div>
									</div>
									<input type="hidden" name="<?php echo $csrf_name; ?>" value="<?php echo $csrf_hash; ?>" />
									<div class="form-group">
										<button type="submit" id="submit_button" disabled class="btn btn-primary btn-lg btn-block" tabindex="4">
											Reset Password
										</button>
									</div>
								</form>



						</div>
					</div>


				</div>
			</section>
		</div>


		<?php include(APPPATH.'/views/footer.php'); ?>
	</div>
</div>

<?php include(APPPATH.'/views/js.php'); ?>
</body>
</html>

<script>

	document.getElementById('password_success').style.display = 'none';
	document.getElementById('submit_button').disabled = true;
	function check_password() {
		var password = document.getElementById('password').value;
		var password_confirm = document.getElementById('password_confirm').value;



		if(password == password_confirm){
			document.getElementById('password_alert').style.display = 'none';
			document.getElementById('submit_button').disabled = false;
			document.getElementById('password_success').style.display = 'block';


		}else{
			document.getElementById('password_alert').style.display = 'block';
			document.getElementById('submit_button').disabled = true;
			document.getElementById('password_success').style.display = 'none';


		}
	}

















</script>









