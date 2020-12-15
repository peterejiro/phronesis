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
            <a href="<?php echo site_url('variational_payment')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
					<h1>New Variational Payment</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="<?php echo site_url('variational_payment')?>">Variational Payments</a></div>
            <div class="breadcrumb-item">New Variational Payment</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About New Variational Payments</div>
          <p class="section-lead">You can add a new variational payment for employees or departments here</p>
          <div class="row">
            <div class="col-12">
              <form class="needs-validation" novalidate method="post" action="<?php echo site_url('add_variational_payment'); ?>">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>New Variational Payment Form</h4>
                    <div class="card-header-action">
                      <a href="<?php echo site_url('recall_month') ?>" class="btn btn-warning">Recall Previous Month's Payment</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label>Payment Definition</label><span style="color: red"> *</span>
                        <select id="payment_type" class="select2 form-control" required name="payment_definition_id" style="width: 100%; height:42px !important;">
                          <option value=""> -- Select -- </option>
				                  <?php foreach ($payment_definitions as $payment_definition):
					                  if($payment_definition->payment_definition_variant == 1): ?>
                              <option value="<?php echo $payment_definition->payment_definition_id ?>"> <?php echo $payment_definition->payment_definition_payment_name; ?> </option>
					                  <?php
					                  endif;
				                  endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                          please select a payment definition
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <label> Category</label><span style="color: red"> *</span>
                        <select id="category" class="select2 form-control" required name="category" onchange="toogle_employee_department()" style="width: 100%; height:42px !important;">
                          <option value=""> -- Select -- </option>
                          <option value="1">  Department </option>
                          <option value="2">  Individuals  </option>
							<option value="3">  All Employees  </option>
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
                        <select class="select2 select2-multiple" style="width: 100% height:42px !important;" multiple data-placeholder="Choose" name="employee_ids[]">
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

						<div class="col-sm-6">
							<label> Type</label><span style="color: red"> *</span>
							<select id="type" class="select2 form-control" required name="type" onchange="toogle_amount_percent()" style="width: 100%; height:42px !important;">
								<option value=""> -- Select -- </option>
								<option value="1">  Flat </option>
								<option value="2">  Percentage  </option>

							</select>
							<div class="invalid-feedback">
								please select a type
							</div>
						</div>
                    </div>

					  <div class="form-group row" id="amount" style="display: none">
						  <div class="col-sm-6">
							  <label>Amount</label><span style="color: #ff0000"> *</span>
							  <input name="payment_amount" type="number" class="form-control" />
							  <div class="invalid-feedback">
								  please fill in an amount
							  </div>
						  </div>



					  </div>

					  <div class="form-group row" id="percentage" style="display: none">
						  <div class="col-sm-6">
							  <label>Percentage % </label><span style="color: red"> *</span>
							  <input name="payment_percentage" type="number" value="0" step="any" class="form-control" />
							  <div class="invalid-feedback">
								  please fill in a percent
							  </div>
						  </div>

						  <div class="col-sm-6">
							  <label> Of</label><span style="color: red"> *</span>
							  <select id="of" class="select2 form-control" required name="of" style="width: 100%; height:42px !important;">
								  <option value="a"> All Income  </option>
								 <?php foreach ($payment_definitions as $payment_definition):
								 			if($payment_definition->payment_definition_variant == 0 && $payment_definition->payment_definition_type == 1):
								 ?>
								  <option value="<?php echo $payment_definition->payment_definition_id ?>">  <?php echo $payment_definition->payment_definition_payment_name; ?> </option>


								  <?php endif;
								  			endforeach;
								  ?>

							  </select>
							  <div class="invalid-feedback">
								  please select a type
							  </div>
						  </div>

						  <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center" role="alert" style="margin: 10px" >
<!--							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
<!--								  <span aria-hidden="true">&times;</span>-->
<!--							  </button>-->
							  <i class="mdi mdi-close-circle font-32"></i><strong class="pr-1">Warning !</strong>  Please ensure employees Salary Structure has been properly set before proceeding.
						  </div>

					  </div>

                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label>Payroll Month</label>
                        <input name="payroll_month" type="text" class="form-control" disabled value="<?php echo date("F", mktime(0, 0, 0, $payroll->payroll_month_year_month, 10)) ?>"/>
                      </div>
                      <div class="col-sm-6">
                        <label>Payroll Year</label>
                        <input name="payroll_year" type="text" class="form-control" disabled value="<?php echo $payroll->payroll_month_year_year; ?>"/>
                      </div>
                    </div>
                    <input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
                  </div>
                  <div class="card-footer text-right bg-whitesmoke">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="location.reload()" class="btn btn-secondary">Reset</button>
                    <button onclick="location.href='<?php echo site_url('variational_payment');?>'" class="btn btn-danger" type="button">Go Back</button>
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
  $('title').html('New Variational Payment - IHUMANE')

  window.onload = function(){
    // document.getElementById("employees").style.display='none';
    // document.getElementById("departments").style.display='none';
  };
  function toogle_employee_department() {
    let value = document.getElementById('category').value;
    console.log(value);
    if(value == 1){
      document.getElementById("employees").style.display='none';
      document.getElementById("departments").style.display='block';
    } else if(value == 2){
      document.getElementById("employees").style.display='block';
      document.getElementById("departments").style.display='none';
    } else if(value == 3){
		document.getElementById("employees").style.display='none';
		document.getElementById("departments").style.display='none';
	}
  }

  function toogle_amount_percent() {
	  let toggle = document.getElementById('type').value;
	  console.log(toggle);
	  if(toggle == 1){
		  document.getElementById("percentage").style.display='none';
		  document.getElementById("amount").style.display='block';
	  } else if(toggle == 2){
		  document.getElementById("amount").style.display='none';
		  document.getElementById("percentage").style.display='block';
	  } else if(toggle == 3){
		  document.getElementById("employees").style.display='none';
		  document.getElementById("departments").style.display='none';
	  }
  }
</script>
</body>
</html>

















