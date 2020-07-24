<?php include(APPPATH.'/views/stylesheet.php');
$CI =& get_instance();
$CI->load->model('biometric');

?>

<body>
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>
		<?php include(APPPATH.'/views/topbar.php'); ?>
		<?php include(APPPATH.'/views/sidebar.php'); ?>
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1>Employees Absent On <?php echo $date ?> </h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
			  <div class="breadcrumb-item active"><a href="<?php echo base_url('biometrics_report'); ?>">Biometrics Report</a></div>
            <div class="breadcrumb-item">Employee Absent On <?php echo $date ?></div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Employees Absent On <?php echo $date ?></div>
          <p class="section-lead">You can View Employees Absent On <?php echo $date ?></p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>All Employees Absent On <?php echo $date ?></h4>

                </div>
                <div class="card-body">
					<div class="table-responsive">
						<table id="datatable-buttons" class="table table-bordered table-striped table-md">
							<thead>
							<tr>
								<th>Employee Name</th>
								<th>Employee Unique Id</th>
								<th>Enrollment Status</th>


							</tr>
							</thead>
							<tbody>
							<?php

							if(!empty($employees)):
								foreach($employees as $employee):
									$check_biometrics  = $CI->biometric->get_employee_biometric($employee->employee_id);
									if(!empty($check_biometrics)):
										$check_login = $CI->biometric->check_clock_in($employee->employee_id, $date);

										if(empty($check_login)):

											?>
											<tr>
												<td><?php echo $employee->employee_last_name." ".$employee->employee_first_name." ".$employee->employee_other_name; ?></td>
												<td><?php echo $employee->employee_unique_id; ?></td>
												<td><?php

													$check_biometrics  = $CI->biometric->get_employee_biometric($employee->employee_id);

													if(empty($check_biometrics)): ?>

														<div class="badge badge-danger">Not Enrolled</div>

													<?php	else: ?>
														<div class="badge badge-success">Enrolled</div>

													<?php	endif;


													?>
													<code id="<?php echo "user_finger_".$employee->employee_id; ?>"> <?php echo count($check_biometrics); ?></code>

												</td>


											</tr>
										<?php
										endif;
									endif;

								endforeach;
							endif; ?>
							</tbody>
						</table>
					</div>
                </div>
                <div class="card-footer bg-whitesmoke"></div>
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
