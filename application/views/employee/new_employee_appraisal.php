<?php include(APPPATH.'\views\stylesheet.php'); ?>

<body>
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>
		<?php include(APPPATH.'\views\topbar.php'); ?>
    <?php include(APPPATH.'\views\sidebar.php'); ?>
		<div class="main-content">
			<section class="section">
				<div class="section-header">
          <div class="section-header-back">
            <a href="<?php echo site_url('employee_appraisal')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
					<h1>New Appraisal</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="<?php echo site_url('employee_appraisal')?>">Employee Appraisals</a></div>
            <div class="breadcrumb-item">New Appraisal</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">New Employee appraisal</div>
          <p class="section-lead">You can fill in the form to start an employee appraisal here</p>
        </div>
        <div class="row">
          <div class="col-12">
            <form class="needs-validation" novalidate method="post" action="<?php echo site_url('add_new_employee_appraisal'); ?>" id="loan_form">
              <div class="card card-primary">
                <div class="card-header">
                  <h4>New Appraisal Form</h4>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <div class="col-sm-6">
                      <label>Employee</label><span style="color: red"> *</span>
                      <select class="select2 form-control" required name="employee_id" id="employee" onchange="compare_employee_supervisor()" style="width: 100%; height:42px !important;">
                        <option value=""> -- Select -- </option>
                        <?php foreach ($employees as $employee):?>
                          <option value="<?php echo $employee->employee_id ?>"> <?php echo $employee->employee_unique_id." (".$employee->employee_last_name." ".$employee->employee_first_name.")"; ?> </option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback">
                        please select an employee
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <label>Supervisor</label><span style="color: red"> *</span>
                      <select class="select2 form-control" required name="supervisor_id" id="supervisor" onchange="compare_employee_supervisor()" style="width: 100%; height:42px !important;">
                        <option value=""> -- Select -- </option>
                        <?php foreach ($employees as $employee):?>
                          <option value="<?php echo $employee->employee_id ?>"> <?php echo $employee->employee_unique_id." (".$employee->employee_last_name." ".$employee->employee_first_name.")"; ?> </option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback">
                        please select a supervisor
                      </div>
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
                  <button type="submit" id="appraisal_button" disabled  class="btn btn-primary">Add Appraisal</button>
                  <button onclick="location.href='<?php echo site_url('employee_appraisal');?>'" class="btn btn-danger" type="button">Go Back</button>
                </div>
              </div>
            </form>
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

<script>
function compare_employee_supervisor() {
	let employee_id = document.getElementById('employee').value;
	let supervisor_id = document.getElementById('supervisor').value;
	if(employee_id === supervisor_id){
		swal('Sorry!', 'Employee and Supervisor Cannot be the same!', 'error');
		document.getElementById('appraisal_button').disabled = true;
	} else{
		document.getElementById('appraisal_button').disabled = !employee_id || !supervisor_id;
	}
}
</script>



