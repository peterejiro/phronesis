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
            <a href="<?php echo site_url('specific_memo')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
					<h1>New Directive</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="<?php echo site_url('specific_memo')?>">Directives</a></div>
            <div class="breadcrumb-item">New Directive</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Creating New Directives</div>
          <p class="section-lead">You can fill the form to add a new directive memo for employees or departments here</p>
          <div class="row">
            <div class="col-12">
              <form class="needs-validation" data-persist="garlic" novalidate method="post" action="<?php echo site_url('add_specific_memo'); ?>">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>New Directive Memo Form</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label> Category</label><span style="color: red"> *</span>
                        <select id="category" class="select2 form-control" required name="category" onchange="toogle_employee_department()" style="width: 100%; height:42px !important;">
                          <option value=""> -- Select -- </option>
                          <option value="1">  Department </option>
                          <option value="2">  Employees  </option>
                        </select>
                        <div class="invalid-feedback">
                          please select a category
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-6" id="departments" style="display: none">
                        <label> Department</label>
                        <select id="payment_type" class="select2 form-control" name="department_id" style="width: 100%; height:42px !important;">
                          <option value=""> -- Select -- </option>
				                  <?php foreach ($departments as $department):?>
                            <option value="<?php echo $department->department_id ?>"> <?php echo $department->department_name; ?> </option>
				                  <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-sm-6" id="employees" style="display: none">
                        <label>Employees</label>
                        <select class="select2 select2-multiple" style="width: 100%; height: 42px !important;" multiple data-placeholder="Choose" name="employee_ids[]">
                          <option value="" disabled> -- Select -- </option>
				                  <?php foreach ($employees as $employee):
					                  if(($employee->employee_status == 0) or ($employee->employee_status == 3)):
					                  else:?>
                              <option value="<?php echo $employee->employee_id ?>"> <?php echo $employee->employee_first_name." ".$employee->employee_last_name." (".$employee->department_name.")" ; ?> </option>
					                  <?php
					                  endif;
				                  endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Memo Subject</label><span style="color: red"> *</span>
                      <input type="text" class="form-control" name="memo_subject" required  placeholder="Enter Memo Subject"/>
                      <div class="invalid-feedback">
                        please fill in a subject
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <label>Memo Body</label><span style="color: #ff0000"> *</span>
                        <textarea class="summernote" required name="memo_body"></textarea>
                      </div>
                    </div>
        					  <input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
                  </div>
                  <div class="card-footer text-right bg-whitesmoke">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="location.reload()" class="btn btn-secondary">Reset</button>
                    <button onclick="location.href='<?php echo site_url('specific_memo');?>'" class="btn btn-danger" type="button">Go Back</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

      </section>
		</div>
	</div>
</div>
<?php include(APPPATH.'/views/footer.php'); ?>
<?php include(APPPATH.'/views/js.php'); ?>
<script>
  $('title').html('New Directive - Phronesis')
  window.onload = function(){
    document.getElementById("employees").style.display='none';
    document.getElementById("departments").style.display='none';
  };
  function toogle_employee_department() {
    var value = document.getElementById('category').value;
    if(value == 1){
      document.getElementById("employees").style.display='none';
      document.getElementById("departments").style.display='block';
    } else if(value == 2){
      document.getElementById("employees").style.display='block';
      document.getElementById("departments").style.display='none';
    }
  }
</script>
</body>
</html>

















