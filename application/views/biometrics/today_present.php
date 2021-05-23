<?php include(APPPATH.'/views/stylesheet.php'); ?>

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
            <a href="<?php echo site_url('biometrics_report')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
					<h1>Employees Present Today</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="<?php echo base_url('biometrics_report'); ?>">Attendance Reports</a></div>
            <div class="breadcrumb-item">Employees Present Today</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Employees Present Today</div>
          <p class="section-lead">You can view employees present today</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>All Employees Present Today</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="datatable-buttons-2" class="table table-bordered table-striped table-md">
                      <thead>
                      <tr>
                        <th>Employee Name</th>
						            <th>Employee Unique Id</th>
                        <th>Clock In Time</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php if(!empty($present_employees)):
                        foreach($present_employees as $present_employee):
                          ?>
                          <tr>
                            <td><?php echo $present_employee->employee_last_name." ".$present_employee->employee_first_name." ".$present_employee->employee_other_name; ?></td>
                            <td><?php echo $present_employee->employee_unique_id; ?></td>
                            <td><?php echo date('F j, Y g:i a', strtotime($present_employee->employee_biometrics_login_time)); ?></td>
                          </tr>
                        <?php
                        endforeach;
                      endif; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer text-right bg-whitesmoke">
                  <button class="btn btn-danger" onclick="location.href='<?php echo site_url('biometrics_report');?>'">Go Back</button>
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
  $('title').html('Employees Present Today - Phronesis');
</script>
