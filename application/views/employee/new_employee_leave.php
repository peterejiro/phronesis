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
            <a href="<?php echo site_url('employee_leave')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
					<h1>New Leave</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="<?php echo site_url('employee_leaves')?>">Employee Leaves</a></div>
            <div class="breadcrumb-item">New Leave</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">New Employee Leave</div>
          <p class="section-lead">You can fill in the form to start an employee leave here</p>
        </div>
        <div class="row">
          <div class="col-md-7">
            <form class="needs-validation" novalidate method="post" action="<?php echo site_url('add_new_employee_leave'); ?>" id="loan_form">
              <div class="card card-primary">
                <div class="card-header">
                  <h4>New Leave Form</h4>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label>Employee</label><span style="color: red"> *</span>
                    <select class="form-control select2" required name="employee_id" style="width: 100%; height:42px !important;">
                      <option value=""> -- Select -- </option>
                      <?php foreach ($employees as $employee):?>
                        <option value="<?php echo $employee->employee_id ?>"> <?php echo $employee->employee_unique_id." (".$employee->employee_last_name." ".$employee->employee_first_name.")"; ?> </option>
                      <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                      please select an employee
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Leave Type</label><span style="color: red"> *</span>
                    <select class="form-control select2" required name="leave_id" style="width: 100%; height:42px !important;">
                      <option value=""> -- Select -- </option>
                      <?php foreach ($leaves as $leave):?>
                        <option value="<?php echo $leave->leave_id ?>"> <?php echo $leave->leave_name; ?> </option>
                      <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                      please select a leave type
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6">
                      <label>Start Date</label><span style="color: red"> *</span>
                      <input type="date" class="form-control"  name="start_date" required/>
                      <div class="invalid-feedback">
                        please fill in a start date
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <label>End Date</label><span style="color: red"> *</span>
                      <input type="date" class="form-control"  name="end_date" required/>
                      <div class="invalid-feedback">
                        please fill in an end date
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
                </div>
                <div class="card-footer text-right bg-whitesmoke">
                  <button type="submit"  class="btn btn-primary">Add Leave</button>
                  <button onclick="location.href='<?php echo site_url('employee_leave');?>'" class="btn btn-danger" type="button">Go Back</button>
                </div>
              </div>
            </form>
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
  $('title').html('New Employee Leave - IHUMANE')
</script>



