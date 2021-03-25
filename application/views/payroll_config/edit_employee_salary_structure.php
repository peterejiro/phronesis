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
					<h1>Edit Salary Structure</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="<?php echo site_url('employee_salary_structure')?>">Salary Structures</a></div>
            <div class="breadcrumb-item">Edit Salary Structure</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Editing Employee Salary Structure</div>
          <p class="section-lead">You can edit an employee's salary structure here</p>
          <div class="row">
            <div class="col-md-7">
              <form method="post" action="<?php echo site_url('update_employee_salary_structure'); ?>" class="needs-validation" novalidate>
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Salary Structure Details</h4>
                    <div class="card-header-action">
                      <button onclick="location.href='<?php echo site_url('view_employee_salary_structure').'/'.$employee->employee_id;?>'" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-eye"></i> View Salary Structure</button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Employee ID</label>
                      <input type="text" class="form-control"  name="employee_unique_id" disabled value="<?php echo $employee->employee_unique_id; ?>"/>
                    </div>
                    <div class="form-group">
                      <label>Employee Name</label>
                      <input type="text" class="form-control"  name="employee_unique_id" disabled value="<?php echo $employee->employee_last_name." ".$employee->employee_first_name." ".$employee->employee_other_name; ?>" placeholder="Enter Name of employee"/>
                    </div>
                    <div class="form-group">
                      <label>Salary Structure Type</label>
                      <select id="salary_structure_type" class="select2 form-control mb-3" required onchange="check_salary_structure_type()" name="salary_structure_type" style="width: 100%; height:42px !important;">
                        <option disabled value="2"> -- Select -- </option>
                        <option value="0" <?php if($employee->employee_salary_structure_category == 0) { echo "selected"; } ?>> Personalized </option>
                        <option value="1" <?php if($employee->employee_salary_structure_category == 1) { echo "selected"; } ?>> Categorised </option>
                      </select>
                    </div>

                    <div class="form-group" id="salary_structure_category" style="display: <?php if($employee->employee_salary_structure_category > 0){ echo " block"; } else{ echo "none"; } ?>">
                      <label> Salary Structure Category</label>
                      <select id="payment_type" class="select2 form-control mb-3 custom-select"  required name="salary_structure_category" style="width: 100%;">
                        <option disabled> -- Select -- </option>
		                    <?php foreach ($salary_structures as $salary_structure): ?>
                          <option value="<?php echo $salary_structure->salary_structure_id ?>" <?php if($employee->employee_salary_structure_category == $salary_structure->salary_structure_id){ echo "selected"; } ?>> <?php echo $salary_structure->salary_structure_category_name; ?> </option>
		                    <?php endforeach; ?>
                      </select>
                    </div>

                    <div id="allowances" style="display: <?php if($employee->employee_salary_structure_category == 0) { echo "block";} else{ echo "none"; } ?>">

	                    <?php if(!empty($personalized_allowances)):
		                    foreach ($personalized_allowances as $personalized_allowance): ?>
                          <div class="form-group row" id="allowance">
                            <div class="col-sm-5">
                              <label>Payment Definition</label>
                              <select class="form-control" id="payment_definition" required name="payment_definition[]" style="width: 100%; height: 42px !important;">
                                <option> -- Select -- </option>
			                          <?php foreach ($payment_definitions as $payment_definition): ?>
                                  <option value="<?php echo $payment_definition->payment_definition_id ?>" <?php if($personalized_allowance->personalized_payment_definition == $payment_definition->payment_definition_id){echo "selected";} ?>> <?php echo $payment_definition->payment_definition_payment_name." (".$payment_definition->payment_definition_payment_code.")"; ?> </option>
			                          <?php endforeach; ?>
                              </select>
                              <div class="invalid-feedback">
                                please select a payment definition
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <label>Amount</label>
                              <input required name="allowance_amount[]" type="number" step="any" class="form-control" value="<?php echo $personalized_allowance->personalized_amount; ?>"/>
                              <div class="invalid-feedback">
                                please fill in an amount
                              </div>
                            </div>
                            <button type="button" onclick="delete_div(this)" class="btn btn-round btn-sm btn-danger" style="margin: 30px 0">
                              <i class="fa fa-minus"></i>
                            </button>
                          </div>
		                    <?php endforeach;
	                    else:
		                    ?>
                        <div class="form-group row" id="allowance">
                          <div class="col-sm-5" >
                            <label>Payment Definition</label>
                            <select class="form-control" id="payment_definition" required name="payment_definition[]" style="width: 100%; height: 42px !important;">
                              <option disabled> -- Select -- </option>

					                    <?php foreach ($payment_definitionss as $payment_definition):
											          if($payment_definition->payment_definition_variant == 0 && $payment_definition->payment_definition_desc == 0 ):
                              ?>
                                <option value="<?php echo $payment_definition->payment_definition_id ?>" > <?php echo $payment_definition->payment_definition_payment_name." (".$payment_definition->payment_definition_payment_code.")"; ?> </option>
					                    <?php
					                    endif;
					                    endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                              please select a payment definition
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <label>Amount</label>
                            <input required name="allowance_amount[]" type="number" step="any" class="form-control"/>
                            <div class="invalid-feedback">
                              please fill in an amount
                            </div>
                          </div>
                          <button type="button" onclick="delete_div(this)" class="btn btn-round btn-sm btn-danger" style="margin: 30px 0">
                            <i class="fa fa-minus"></i>
                          </button>
                        </div>
	                    <?php endif; ?>
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
  $('title').html('Edit Salary Structure - IHUMANE')
  window.onload = function() {
    let salary_structure_type = document.getElementById('salary_structure_type').value;
    console.log(salary_structure_type);
    if (salary_structure_type == 1) {
      let elem = document.getElementById("allowances");
      let inputs = elem.getElementsByTagName('input');
      let selects = elem.getElementsByTagName('select');
      for (let i = 0; i < inputs.length; i++) {
        inputs[i].setAttribute('disabled', 'disabled');
        selects[i].setAttribute('disabled', 'disabled');
      }
    }
  }
  let count = 1;
  function clone_div() {
    let elem = document.getElementById('allowance');
    if(elem.style.display === 'none'){
      let inputs = elem.getElementsByTagName('input');
      let selects = elem.getElementsByTagName('select');
      inputs[0].removeAttribute('disabled');
      selects[0].removeAttribute('disabled');
      elem.style.removeProperty('display');
    } else{
      // Create a copy of it
      let clone = elem.cloneNode(true);
      // Update the ID and add a class
      clone.id = 'allowance'+count;
      let allowances = document.getElementById('allowances');
      let allowance_button = document.getElementById('allowance_button');
      allowances.insertBefore(clone,allowance_button);
      // Inject it into the DOM
      elem.after(clone);
      $('#'+clone.id).find('select').attr('id', 'payment_definition'+count );
      count ++;
    }
  }

  function delete_div(e){
    let id = e.parentElement.id;
    if (id === 'allowance') {
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
      let elem = document.getElementById("allowances");
      let inputs = elem.getElementsByTagName('input');
      let selects = elem.getElementsByTagName('select');
      for (let i = 0; i < inputs.length; i++) {
        inputs[i].setAttribute('disabled', 'disabled');
        selects[i].setAttribute('disabled', 'disabled');
      }
    }
    if(salary_structure_type == 0){
      document.getElementById("salary_structure_category").style.display = 'none';
      document.getElementById("allowances").style.display='block';
      let elem = document.getElementById("allowances");
      let inputs = elem.getElementsByTagName('input');
      let selects = elem.getElementsByTagName('select');
      for (let i = 0; i < inputs.length; i++) {
        inputs[i].removeAttribute('disabled');
        selects[i].removeAttribute('disabled');
      }
    }
  }
</script>
</body>
</html>
