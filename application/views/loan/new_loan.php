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
					<h1> New Loan</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">New Loan</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Creating Loans</div>
          <p class="section-lead">You can complete the form to create a loan here</p>
          <div class="row">
            <div class="col-12">
              <form class="needs-validation" novalidate method="post" action="<?php echo site_url('add_new_loan'); ?>" id="loan_form">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>New Loan Form</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label>Employee</label><span style="color: red"> *</span>
                        <select class="select2 form-control" required name="employee_id" style="width: 100%; height:56px;">
                          <option value=""> -- Select -- </option>
				                  <?php foreach ($employees as $employee): ?>
                            <option value="<?php echo $employee->employee_id ?>"> <?php echo $employee->employee_unique_id." (".$employee->employee_last_name." ".$employee->employee_first_name.")"; ?> </option>
				                  <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                          please select an employee
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <label>Loan Type</label><span style="color: red"> *</span>
                        <select class="select2 form-control" required name="payment_definition_id" style="width: 100%; height:56px;">
                          <option value=""> -- Select -- </option>
				                  <?php foreach ($payment_definitions as $payment_definition):
					                  if($payment_definition->payment_definition_desc == 1): ?>
                              <option value="<?php echo $payment_definition->payment_definition_id ?>"> <?php echo $payment_definition->payment_definition_payment_name; ?> </option>
					                  <?php
					                  endif;
				                  endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                          please select a loan type
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label>Amount</label><span style="color: red"> *</span>
                        <input name="amount" type="number" class="form-control" id="amount" required/>
                        <div class="invalid-feedback">
                          please fill in the loan amount
                        </div>
                      </div>
                      <div class="col-sm-6" >
                        <label>Repayment Amount</label><span style="color: red"> *</span>
                        <input name="repayment_amount" type="number" class="form-control" id="repayment_amount"/>
                        <div class="invalid-feedback">
                          please fill in the repayment amount
                        </div>
                      </div>
                    </div>

					  <div class="form-group row">
						  <div class="col-sm-12">
							  <label>Reason</label><span style="color: red"> *</span>
							  <textarea class="summernote form-control"  name="reason" placeholder="Type a reason ..."></textarea>

							  <div class="invalid-feedback">
								  please fill in the loan amount
							  </div>
						  </div>

					  </div>
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label>Start Year</label><span style="color: red"> *</span>
                        <select class="select2 form-control" id="start_year" required name="start_year" style="width: 100%; height:56px;">
                          <option value=""> -- Select -- </option>
                          <option value="<?php echo date("Y"); ?>"> <?php echo date("Y"); ?> </option>
                          <option value="<?php echo date("Y")+1; ?>"> <?php echo date("Y")+1; ?> </option>
                        </select>
                        <small class="form-text text-muted">
                          Note, start date must be later than the current payroll date
                        </small>
                        <div class="invalid-feedback">
                          please select a start year
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <label>Start Month</label><span style="color: red"> *</span>
                        <select class="select2 form-control" id="start_month" required name="start_month" style="width: 100%; height:56px;">
                          <option value=""> -- Select -- </option>
				                  <?php $month = date('n'); // current month
				                  for ($x = 0; $x < 12; $x++): ?>
                            <option value="<?php echo date('n', mktime(0,0,0,$month + $x,1)); ?>">
						                  <?php echo date('F', mktime(0,0,0,$month + $x,1)); ?>
                            </option>
				                  <?php endfor; ?>
                        </select>
                        <div class="invalid-feedback">
                          please select a start month
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label>End Year</label>
                        <input type="text" class="form-control"  disabled id="end_year_name"/>
                        <input type="hidden" id="end_year" name="end_year">
                      </div>
                      <div class="col-sm-6">
                        <label>End Month</label>
                        <input  name="end_month" disabled type="text" class="form-control" id="end_month_name"/>
                        <input type="hidden" id="end_month" name="end_month">
                      </div>
                    </div>
                    <input type="hidden" id="payroll_month" name="payroll_month" value="<?php echo $payroll->payroll_month_year_month; ?>">
                    <input type="hidden" id="payroll_year" name="payroll_year" value="<?php echo $payroll->payroll_month_year_year; ?>">
                    <input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
                  </div>
                  <div class="card-footer text-right bg-whitesmoke">
                    <button type="button" id="compute_loan" onclick="add_months()" class="btn btn-primary">Compute Loan</button>
                    <button type="submit" id="loan_button"  class="btn btn-primary" style="display: none">Confirm Loan</button>
                    <button type="button" onclick="location.reload();" class="btn btn-secondary">Reset</button>
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
  $('title').html('New Loan - Phronesis')

  window.onload = function(){
    // document.getElementById("loan_button").style.display='none';
  };
  function reset_form() {
    document.getElementById("loan_form").reset();
    document.getElementById("loan_button").style.display='none';
    document.getElementById("compute_loan").style.removeProperty('display');
  }

  function addMonths(date, months) {
    let d = date.getDate();
    date.setMonth(date.getMonth() + +months);
    if (date.getDate() != d) {
      date.setDate(0);
    }
    return date;
  }

  function validateForm() {
    let fields = ['employee_id', 'payment_definition_id', 'amount', 'repayment_amount', 'start_month', 'start_year'];
    let fieldLength = fields.length;
    let fieldName;
    for (let i = 0; i < fieldLength; i++) {
      fieldName = fields[i];
      if(document.forms["loan_form"][fieldName].value === "") return false;
    }
    return true;
  }

  function validateAmounts() {
    return !(document.forms['loan_form']['amount'].value <= 0 || document.forms['loan_form']['repayment_amount'] <= 0);
  }

  function add_months(){
    let start_month = document.getElementById('start_month').value;
    let start_year = document.getElementById('start_year').value;
    let payroll_month = document.getElementById('payroll_month').value;
    let payroll_year = document.getElementById('payroll_year').value;
    let amount = document.getElementById('amount').value;
    let repayment_amount = document.getElementById('repayment_amount').value;
    let installments = amount/repayment_amount;
    let start_date = new Date(start_year, start_month-1);
    let payroll_date = new Date(payroll_year, payroll_month-1);
    if (!validateForm()) {
      swal("Sorry!", "Please fill in all required fields to enable loan computation", "error");
    } else if (!validateAmounts()){
      swal("Sorry!", "Please loan amounts must be greater than zero", "error");
    } else if (start_date <= payroll_date){
      swal("Sorry!", "Start date must be later than the current payroll date", "error").then(closedAlert => {
        if(closedAlert) location.reload();
      });
    } else {
      let date = addMonths(start_date, installments-1);
      let end_year = date.getFullYear();
      let end_month = date.getMonth() + 1;
      const monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
      ];
      let end_month_name = monthNames[date.getMonth()];
      document.getElementById('end_month').value = end_month;
      document.getElementById('end_year').value = end_year;
      document.getElementById('end_year_name').value = end_year;
      document.getElementById('end_month_name').value = end_month_name;
      document.getElementById("loan_button").style.removeProperty('display');
      // document.getElementById("loan_button").style.display='block';
      document.getElementById("compute_loan").style.display='none';
    }
  }
</script>
</body>
</html>





