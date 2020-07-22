<?php include(APPPATH.'\views\stylesheet.php');
$CI =& get_instance();
$CI->load->model('biometric');

?>

<body>
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>

		<div class="bodywrapper">
			<section class="section">

				<div class="section-body">


					<div class="row" >
						<div class="col-12" >




							<div class="card card-danger" style="height: 100vh" >
<!--								<div class="card-header">-->
<!--									<h4>--><?php //echo $employee->employee_first_name." ".$employee->employee_last_name; ?><!--</h4>-->
<!--									<div class="card-header-action">-->
<!---->
<!--									</div>-->
<!--								</div>-->
								<div class="card-body">
<!--									<div class="owl-carousel" id="users-carousel">-->
<!--									<div>-->
<!--										<div>-->
											<div class="user-item">
												<img alt="image" src="../uploads/employee_passports/<?php echo $employee->employee_passport; ?>" class="img-fluid" height="200" width="200">
												<div class="user-details">
													<div class="user-name"><?php echo $employee->employee_first_name." ".$employee->employee_last_name; ?></div>
													<div class="user-name"><?php echo $employee->employee_unique_id; ?></div>
													<div class="text-job text-muted"><?php echo $employee->job_name; ?></div>
													<div class="text-job text-muted"><?php echo $login_time; ?></div>
													<div class="user-cta">
														<button onclick="location.href='<?php echo site_url('clockin');?>'" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Back</button>
<!--														<button class="btn btn-primary follow-btn" data-follow-action="alert('user1 followed');" data-unfollow-action="alert('user1 unfollowed');">Follow</button>-->
													</div>
												</div>
											</div>
<!--										</div>-->

<!--									</div>-->
								</div>
							</div>





						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<?php include(APPPATH.'\views\footer.php'); ?>
<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>

