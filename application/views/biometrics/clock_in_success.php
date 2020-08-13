<?php
  include(APPPATH.'/views/stylesheet.php');
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
					<div class="row">
						<div class="col-12">
							<div class="card card-danger" style="height: 100vh">
                <div class="card-header text-center">
                  <h4>Clock In Success</h4>
                </div>
								<div class="card-body">
                  <div class="user-item">
                    <img alt="image" src="../uploads/employee_passports/<?php echo $employee->employee_passport; ?>" class="img-fluid" height="200" width="200">
                    <div class="user-details">
                      <div class="user-name"><?php echo $employee->employee_first_name." ".$employee->employee_last_name; ?></div>
                      <div class="user-name"><?php echo $employee->employee_unique_id; ?></div>
                      <div class="text-job text-muted"><?php echo $employee->job_name; ?></div>
						<div class="text-job text-muted"><?php echo $employee->department_name; ?></div>

						<div class="text-job text-muted"><?php $status =  $employee->employee_status; if($status == 1){ echo "Probationary."; } if($status == 2){ echo "Confirmed."; } ?></div>
                      <div class="text-job text-muted"><?php echo date('F j, Y g:i a', strtotime($login_time)); ?></div>
                      <div class="user-cta">
                        <button onclick="location.href='<?php echo site_url('clock_attendance');?>'" type="button" class="btn btn-icon icon-left btn-primary"><i class="fas fa-chevron-left"></i> Back</button>
                      </div>
                    </div>
                  </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<?php include(APPPATH.'/views/footer.php'); ?>
<?php include(APPPATH.'/views/js.php'); ?>
</body>
</html>

<script>
  $('title').html('Clock In Success - IHUMANE');
</script>
