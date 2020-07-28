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
          <div class="section-header-back">
            <a href="<?php echo site_url('absent_employee')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
					<h1>Absent Employees Sheet </h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="<?php echo base_url('biometrics_report'); ?>">Attendance Reports</a></div>
            <div class="breadcrumb-item active"><a href="<?php echo base_url('absent_employee'); ?>">Absent Employees</a></div>
            <div class="breadcrumb-item">Absent Employees Sheet</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Employees Absent On <?php echo date('F j, Y', strtotime($date)); ?></div>
            <p class="section-lead">You can view all employees absent on the given date here</p>
            <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>All Absent Employees</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="datatable-buttons-2" class="table table-bordered table-striped table-md">
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
                            if(empty($check_login)):?>
                              <tr>
                                <td><?php echo $employee->employee_last_name." ".$employee->employee_first_name." ".$employee->employee_other_name; ?></td>
                                <td><?php echo $employee->employee_unique_id; ?></td>
                                <td>
                                  <?php
                                  $check_biometrics  = $CI->biometric->get_employee_biometric($employee->employee_id);
                                  if(empty($check_biometrics)): ?>
                                    <div class="badge badge-danger">Not Enrolled</div>
                                  <?php	else: ?>
                                    <div class="badge badge-success">Enrolled</div>
                                  <?php	endif; ?>
                                  <input type="hidden" id="<?php echo "user_finger_".$employee->employee_id; ?>" value="<?php echo count($check_biometrics); ?>">
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
                <div class="card-footer text-right bg-whitesmoke">
                  <button class="btn btn-danger" onclick="location.href='<?php echo site_url('absent_employee');?>'">Go Back</button>
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
  $('title').html('Absent Employees Sheet - IHUMANE');
</script>
