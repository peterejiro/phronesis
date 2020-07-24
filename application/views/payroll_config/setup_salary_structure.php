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
            <a href="<?php echo site_url('employee_salary_structure')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
					<h1> Setup Salary Structure</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="<?php echo site_url('employee_salary_structure')?>">Salary Structures</a></div>
            <div class="breadcrumb-item">Setup Salary Structure</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">Setup Employee Salary Structure</div>
          <p class="section-lead">You can setup an employee's salary structure here</p>
          <div class="row">
            <div class="col-md-7">
              <form method="post" action="<?php echo site_url('add_employee_salary_structure'); ?>" class="needs-validation" novalidate>
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Salary Structure Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Employee ID</label>
                      <input type="text" class="form-control"  name="employee_unique_id" disabled value="<?php echo $employee->employee_unique_id; ?>"/>
                    </div>
                    <div class="form-group">
                      <label>Employee Name</label>
                      <input type="text" class="form-control"  name="employee_unique_id" disabled value="<?php echo $employee->employee_last_name." ".$employee->employee_first_name." ".$employee->employee_other_name; ?>"/>
                    </div>
                    <div class="form-group">
                      <label> Salary Structure Type</label>
                      <select id="salary_structure_type" class="select2 form-control" required onchange="check_salary_structure_type()" name="salary_structure_type" style="width: 100%; min-height: 42px !important ;">
                        <option value="2"> -- Select -- </option>
                        <option value="0"> Personalized </option>
                        <option value="1"> Categorised </option>
                      </select>
                    </div>
                    <div class="form-group" id="salary_structure_category">
                      <label> Salary Structure Category</label>
                      <select id="payment_type" class="form-control" required name="salary_structure_category" style="width: 100%; height: 42px !important;;">
                        <option disabled> -- Select -- </option>
		                    <?php foreach ($salary_structures as $salary_structure): ?>
                          <option value="<?php echo $salary_structure->salary_structure_id ?>>"> <?php echo $salary_structure->salary_structure_category_name; ?> </option>
		                    <?php endforeach; ?>
                      </select>
                    </div>
                    <div id="allowances">
                      <div class="form-group row" id="allowance">
                        <div class="col-sm-5">
                          <label> Payment Definition</label><span style="color: red"> *</span>
                          <select class="form-control" id="payment_definition" required name="payment_definition[]" style="width: 100%; height: 42px !important;">
                            <option disabled> -- Select -- </option>
		                        <?php foreach ($payment_definitions as $payment_definition): ?>
                              <option value="<?php echo $payment_definition->payment_definition_id ?>"> <?php echo $payment_definition->payment_definition_payment_name." (".$payment_definition->payment_definition_payment_code.")"; ?> </option>
		                        <?php endforeach; ?>
                          </select>
                          <div class="invalid-feedback">
                            please select a payment definition
                          </div>
                        </div>
                        <div class="col-sm-5">
                          <label> Amount</label><span style="color: red"> *</span>
                          <input required name="allowance_amount[]" type="number" class="form-control"/>
                          <div class="invalid-feedback">
                            please fill in an amount
                          </div>
                        </div>
                        <button type="button" onclick="delete_div(this)"  class="btn btn-round btn-sm btn-danger" style="margin: 30px 0">
                          <i class="fa fa-minus"></i>
                        </button>
                      </div>
                      <button id="allowance_button" type="button" onclick="clone_div()" class="btn btn-sm btn-primary btn-round">
                        <i class="fa fa-plus"></i>
                      </button>
                    </div>
                    <input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
                    <input type="hidden" name="employee_id" value="<?php echo $employee->employee_id; ?>">
                  </div>
                  <div class="card-footer text-right bg-whitesmoke">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="location.reload();" class="btn btn-secondary">Reset</button>
                    <button type="button" onclick="location.href='<?php echo site_url('employee_salary_structure');?>'" class="btn btn-danger" data-dismiss="modal">Go Back</button>
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
  window.onload = function(){
    document.getElementById("allowances").style.display='none';
    document.getElementById("salary_structure_category").style.display = 'none';
  };
  let count = 1;
  function clone_div() {
    let elem = document.getElementById('allowance');
    if(elem.style.display === 'none'){
      let inputs = elem.getElementsByTagName('input');
      let selects = elem.getElementsByTagName('select');
      inputs[0].removeAttribute('disabled');
      selects[0].removeAttribute('disabled');
      elem.style.removeProperty('display');
    } else {
      // Create a copy of it
      let clone = elem.cloneNode(true);
      // Update the ID and add a class
      clone.id = 'allowance'+count;
      let allowances = document.getElementById('allowances');
      let allowance_button = document.getElementById('allowance_button');
      //clone.insertBefore(work_experience_button);
      allowances.insertBefore(clone,allowance_button)
      // Inject it into the DOM
      elem.after(clone);
      $('#'+clone.id).find('select').attr('id', 'payment_definition'+count );
      count ++;
    }
  }

  function delete_div(e){
    let id = e.parentElement.id;
    if(id === 'allowance' ){
      let elem = document.getElementById('allowance');
      let inputs = e.parentElement.getElementsByTagName('input');
      let selects = e.parentElement.getElementsByTagName('select');
      inputs[0].setAttribute('disabled', 'disabled');
      selects[0].setAttribute('disabled', 'disabled');
      e.parentElement.style.display = 'none';
    } else {
      e.parentElement.remove();
    }
  }

  function check_salary_structure_type(){
    let salary_structure_type = document.getElementById('salary_structure_type').value;
    if(salary_structure_type == 1){
      document.getElementById("allowances").style.display='none';
      document.getElementById("salary_structure_category").style.display='block';
    }
    if(salary_structure_type == 0){
      document.getElementById("salary_structure_category").style.display = 'none';
      document.getElementById("allowances").style.display='block';
    }
  }
</script>
</body>
</html>

