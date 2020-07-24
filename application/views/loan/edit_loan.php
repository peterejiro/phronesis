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
            <a href="<?php echo site_url('loans')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
					<h1>Reschedule Loan</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="<?php echo site_url('loans');?>">Manage Loans</a></div>
            <div class="breadcrumb-item">Reschedule Loan</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Rescheduling Loans</div>
          <p class="section-lead">You can skip a payment month or change the repayment amount of a loan here</p>
          <div class="row">
            <div class="col-md-3">
              <div class="card">
                <div class="card-header">
                  <h4>Rescheduling Options</h4>
                </div>
                <div class="card-body">
                  <ul class="nav nav-pills flex-column">
                    <li class="nav-item"><a href="#skip-month" class="nav-link active" role="tab" data-toggle="tab"> Skip Month</a></li>
                    <li class="nav-item"><a href="#change-amount" class="nav-link" role="tab" data-toggle="tab"> Change Repayment Amount</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="tab-content">
                <div class="tab-pane p-0 active" id="skip-month" role="tabpanel">
                  <form class="needs-validation" novalidate method="post" action="<?php echo site_url('update_loan'); ?>" id="loan_form">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h4>Skip Current Month</h4>
                      </div>
                      <div class="card-body">
                        <div class="form-group row">
                          <div class="col-sm-6">
                            <label>Employee ID</label>
                            <input type="text" class="form-control"  name="employee_name" disabled value="<?php echo $loan->employee_unique_id; ?>"/>
                          </div>
                          <div class="col-sm-6">
                            <label> Employee</label>
                            <input type="text" class="form-control" disabled name="employee_name" value="<?php echo $loan->employee_first_name." ".$loan->employee_last_name." ".$loan->employee_other_name; ?>"/>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-6">
                            <label>Loan Type</label>
                            <input type="text" class="form-control" disabled name="employee_name" value="<?php echo $loan->payment_definition_payment_name; ?>"/>

                          </div>
                          <div class="col-sm-6">
                            <label>Amount</label>
                            <input type="text" class="form-control"  name="employee_name" disabled value="<?php echo number_format($loan->loan_amount); ?>"/>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-6">
                            <label>From</label>
                            <input type="text" class="form-control"  name="employee_name" disabled value="<?php echo date("F", mktime(0, 0, 0, $loan->loan_start_month, 10))." ".$loan->loan_start_year; ?>"/>
                          </div>
                          <div class="col-sm-6">
                            <label>To</label>
                            <input type="text" class="form-control"  name="employee_name" disabled value="<?php echo date("F", mktime(0, 0, 0, $loan->loan_end_month, 10))." ".$loan->loan_end_year; ?>"/>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-6">
                            <label>Skip Year</label>
                            <select class="select2 form-control" id="end_year" required name="skip_year" style="width: 100%; height:56px;">
                              <option value="<?php echo $payroll->payroll_month_year_year; ?>">
					                      <?php echo $payroll->payroll_month_year_year; ?>
                              </option>
                            </select>
                          </div>
                          <div class="col-sm-6">
                            <label>Skip Month</label>
                            <select class="select2 form-control" id="end_month" required name="skip_month" style="width: 100%; height:56px;">
                              <option value="<?php echo $payroll->payroll_month_year_month; ?>">
					                      <?php echo date("F", mktime(0, 0, 0, $payroll->payroll_month_year_month, 10))?>
                              </option>
                            </select>
                          </div>
                        </div>
                        <input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
                        <input type="hidden" name="loan_id" value="<?php echo $loan->loan_id; ?>">
                        <input type="hidden" name="reschedule_type" value="0">
                      </div>
                      <div class="card-footer text-right bg-whitesmoke">
                        <button type="submit" class="btn btn-primary">Skip Month</button>
                        <button onclick="location.href='<?php echo site_url('loans');?>'" class="btn btn-danger" type="button">Go Back</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="tab-pane p-0" id="change-amount" role="tabpanel">
                  <form class="needs-validation" novalidate method="post" action="<?php echo site_url('update_loan'); ?>" id="loan_form_2">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h4>Change Repayment Amount</h4>
                      </div>
                      <div class="card-body">
                        <div class="form-group row">
                          <div class="col-sm-6">
                            <label>Employee ID</label>
                            <input type="text" class="form-control"  name="employee_name" disabled value="<?php echo $loan->employee_unique_id; ?>"/>
                          </div>
                          <div class="col-sm-6">
                            <label>Employee</label>
                            <input type="text" class="form-control" disabled name="employee_name" value="<?php echo $loan->employee_first_name." ".$loan->employee_last_name." ".$loan->employee_other_name; ?>"/>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-6">
                            <label>Loan Amount</label>
                            <input type="text" class="form-control" disabled value="<?php echo number_format($loan->loan_amount); ?>"/>
                          </div>
                          <div class="col-sm-6">
                            <label>Loan Balance</label>
                            <input type="text" class="form-control" disabled value="<?php echo number_format($loan->loan_balance); ?>"/>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-6">
                            <label>Current Payroll Year</label>
                            <input type="text" class="form-control"  name="employee_name" disabled value="<?php echo $payroll->payroll_month_year_year; ?>"/>
                          </div>
                          <div class="col-sm-6">
                            <label>Current Payroll Month</label>
                            <input type="text" class="form-control"  name="employee_name" disabled value="<?php echo date("F", mktime(0, 0, 0, $payroll->payroll_month_year_month, 10)); ?>"/>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-6">
                            <label>Monthly Repayment</label>
                            <input type="text" class="form-control" disabled value="<?php echo number_format($loan->loan_monthly_repayment); ?>"/>
                          </div>
                          <div class="col-sm-6">
                            <label>New Monthly Repayment</label><span style="color: red"> *</span>
                            <input name="new_repayment_amount" required type="number" class="form-control" id="new_repayment_amount"/>
                            <div class="invalid-feedback">
                              please fill in a new monthly repayment
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-6">
                            <label>New End Year</label>
                            <input type="text" class="form-control" disabled id="new_end_year_name"/>
                            <input type="hidden" id="new_end_year" name="new_end_year">
                          </div>
                          <div class="col-sm-6">
                            <label>New End Month</label>
                            <input name="end_month" disabled type="text" class="form-control" id="new_end_month_name"/>
                            <input type="hidden" id="new_end_month" name="new_end_month">
                          </div>
                        </div>
                        <input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
                        <input type="hidden" name="loan_id" value="<?php echo $loan->loan_id; ?>">
                        <input type="hidden" id="payroll_month" value="<?php echo $payroll->payroll_month_year_month; ?>"/>
                        <input type="hidden" id="payroll_year" value="<?php echo $payroll->payroll_month_year_year; ?>">
                        <input type="hidden" id="loan_balance" name="loan_balance" value="<?php echo $loan->loan_balance; ?>">
                        <input type="hidden" name="reschedule_type" value="1">
                      </div>
                      <div class="card-footer text-right bg-whitesmoke">
                        <button type="button" id="compute_loan" onclick="add_months()" class="btn btn-primary">Compute Loan</button>
                        <button type="submit" id="loan_button"  class="btn btn-primary" style="display: none">Update Repayment Loan</button>
                        <button type="button" id="reset_button" onclick="reset_form()" class="btn btn-secondary">Reset</button>
                        <button onclick="location.href='<?php echo site_url('loans');?>'" class="btn btn-danger" type="button">Go Back</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
			</section>
		</div>
	</div>
</div>
<?php include(APPPATH.'\views\footer.php'); ?>
<?php include(APPPATH.'\views\js.php'); ?>
<script>

  window.onload = function(){
    // document.getElementById("skip_month").style.display='none';
    // document.getElementById("reschedule_amount").style.display='none';
    // document.getElementById("loan_button").style.display='none';
  };


  function show_skip_month() {
    document.getElementById("skip_month").style.display='block';
    document.getElementById("reschedule_amount").style.display='none';
  }

  function show_reschedule_amount() {
    //alert('fuck you');
    document.getElementById("reschedule_amount").style.display='block';
    document.getElementById("skip_month").style.display='none';
  }

</script>

<script>

  function reset_form() {
    document.getElementById("loan_form_2").reset();
    document.getElementById("loan_button").style.display='none';
    document.getElementById("compute_loan").style.removeProperty('display');
    document.getElementById("new_repayment_amount").removeAttribute('readonly');
  }

  function addMonths(date, months) {
    let d = date.getDate();
    date.setMonth(date.getMonth() + +months);
    if (date.getDate() != d) {
      date.setDate(0);
    }
    return date;
  }

  function validateAmount() {
    let newRepaymentAmount = document.forms['loan_form_2']['new_repayment_amount'].value;
    return !(newRepaymentAmount === '' || newRepaymentAmount <= 0);
  }

  function add_months(){
    let payroll_month = document.getElementById('payroll_month').value;
    let payroll_year = document.getElementById('payroll_year').value;
    let loan_balance = document.getElementById('loan_balance').value;
    let new_repayment_amount = document.getElementById('new_repayment_amount').value;

    let installments = loan_balance/new_repayment_amount;

    let payroll_date = new Date(payroll_year, payroll_month-1);
    if (!validateAmount()) {
      swal("Sorry!", "Please loan repayment amount must be greater than zero", "error");
    } else {
      let date = addMonths(payroll_date, installments-1);
      let end_year = date.getFullYear();
      let end_month = date.getMonth() + 1;
      const monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
      ];
      let end_month_name = monthNames[date.getMonth()];
      document.getElementById('new_end_month').value = end_month;
      document.getElementById('new_end_year').value = end_year;
      document.getElementById('new_end_year_name').value = end_year;
      document.getElementById('new_end_month_name').value = end_month_name;
      // document.getElementById("loan_button").style.display='block';
      document.getElementById("loan_button").style.removeProperty('display');
      document.getElementById("compute_loan").style.display='none';
      document.getElementById("new_repayment_amount").setAttribute('readonly', 'readonly');
    }
  }
</script>
</body>
</html>
