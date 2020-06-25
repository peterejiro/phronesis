<!DOCTYPE html>
<html lang="en">
<head>



	<?php include(APPPATH.'\views\stylesheet.php'); ?>
	<!-- DataTables -->


</head>


<body class="fixed-left">
<!-- Begin page -->
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>
		<?php include(APPPATH.'\views\topbar.php'); ?>


		<?php include(APPPATH.'\views\sidebar.php'); ?>



		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1> New Loan</h1>
				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-body">

								<div class="modal-content">
									<form class="" method="post" action="<?php echo site_url('add_new_loan'); ?>" id="loan_form">
										<div class="modal-body">

											<div class="form-group row">

												<div class="col-sm-6">
													<label> Employee:</label>
													<select class="form-control mb-3 custom-select selectric" required name="employee_id" style="width: 100%; height:56px;">
														<option value="0"> -- Select -- </option>
														<?php foreach ($employees as $employee):

															?>
															<option value="<?php echo $employee->employee_id ?>"> <?php echo $employee->employee_unique_id." (".$employee->employee_last_name." ".$employee->employee_first_name.")"; ?> </option>
														<?php

														endforeach; ?>


													</select>
												</div>
												<div class="col-sm-6">
													<label> Loan:</label>
													<select class="form-control mb-3 custom-select selectric" required name="payment_definition_id" style="width: 100%; height:56px;">
														<option value="0"> -- Select -- </option>
														<?php foreach ($payment_definitions as $payment_definition):
															if($payment_definition->payment_definition_desc == 1):
																?>
																<option value="<?php echo $payment_definition->payment_definition_id ?>"> <?php echo $payment_definition->payment_definition_payment_name; ?> </option>
															<?php
															endif;
														endforeach; ?>


													</select>
												</div>



											</div>


											<div class="form-group row">





												<div class="col-sm-6">
													<label> Amount:</label>
													<input  name="amount"  data-parsley-pattern="^[1-9]\d*(\.\d+)?$" type="text"
															class="form-control" id="amount"
															placeholder="Loan Amount"/>
												</div>

												<div class="col-sm-6" >

													<label> Repayment Amount:</label>
													<input  name="repayment_amount" data-parsley-pattern="^[1-9]\d*(\.\d+)?$" type="text"
															class="form-control" id="repayment_amount"
															placeholder="Repayment Amount"/>

												</div>

											</div>


											<div class="form-group row">

												<div class="col-sm-6">
													<label>Start Year:</label>

													<select class="form-control mb-3 custom-select selectric" id="start_year" required name="start_year" style="width: 100%; height:56px;">
														<option value="0"> -- Select -- </option>

														<option value="<?php echo date("Y"); ?>"> <?php echo date("Y"); ?> </option>
														<option value="<?php echo date("Y")+1; ?>"> <?php echo date("Y")+1; ?> </option>



													</select>

												</div>
												<div class="col-sm-6">
													<label>Start Month:</label>


													<select class="form-control mb-3 custom-select selectric" id="start_month" required name="start_month" style="width: 100%; height:56px;">
														<option value="0"> -- Select -- </option>

														<?php $month = date('n'); // current month
														for ($x = 0; $x < 12; $x++): ?>
															<option value="<?php echo date('n', mktime(0,0,0,$month + $x,1)); ?>">
																<?php echo date('F', mktime(0,0,0,$month + $x,1)); ?>
															</option>
														<?php endfor; ?>



													</select>

												</div>


											</div>

											<div class="form-group row">

												<div class="col-sm-6">
													<label>End Year:</label>
													<input   type="text"
															 class="form-control"  disabled id="end_year_name"
															 placeholder="end_year"/>

													<!--														<select class="select2 form-control mb-3 custom-select" id="end_year" required name="end_year" style="width: 100%; height:56px;">-->
													<!--															<option value="0"> -- Select -- </option>-->
													<!---->
													<!--															<option value="--><?php //echo date("Y"); ?><!--"> --><?php //echo date("Y"); ?><!-- </option>-->
													<!--															<option value="--><?php //echo date("Y")+1; ?><!--"> --><?php //echo date("Y")+1; ?><!-- </option>-->
													<!---->
													<!---->
													<!---->
													<!--														</select>-->
													<input type="hidden" id="end_year" name="end_year">

												</div>
												<div class="col-sm-6">
													<label>End Month:</label>
													<input  name="end_month" disabled type="text"
															class="form-control" id="end_month_name"
															placeholder="end_year"/>

													<input type="hidden" id="end_month" name="end_month">


													<!--														<select class="select2 form-control mb-3 custom-select" id="end_month" required name="end_month" style="width: 100%; height:56px;">-->
													<!--															<option value="0"> -- Select -- </option>-->
													<!---->
													<!--															--><?php //$month = date('n'); // current month
													//															for ($x = 0; $x < 12; $x++): ?>
													<!--																<option value="--><?php //echo date('n', mktime(0,0,0,$month + $x,1)); ?><!--">-->
													<!--																	--><?php //echo date('F', mktime(0,0,0,$month + $x,1)); ?>
													<!--																</option>-->
													<!--															--><?php //endfor; ?>
													<!---->
													<!---->
													<!---->
													<!--														</select>-->

												</div>


											</div>



											<input type="hidden" id="payroll_month" name="payroll_month" value="<?php echo $payroll->payroll_month_year_month; ?>">
											<input type="hidden" id="payroll_year" name="payroll_year" value="<?php echo $payroll->payroll_month_year_year; ?>">











											<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
											<div class="modal-footer">
												<button type="button" id="compute_loan" onclick="add_months()" class="btn btn-primary">Compute Loan</button>
												<button type="submit" id="loan_button"  class="btn btn-primary">New Loan</button>
												<button type="reset" onclick="reset_form()" class="btn btn-danger ml-2">Clear All</button>
											</div>
									</form>
								</div>




							</div>


						</div>
					</div>


			</section>
		</div>




	</div>
</div>





<!-- End Right content here -->

</div>
<!-- END wrapper -->


<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>




<script>

	window.onload = function(){
		document.getElementById("loan_button").style.display='none';
	};
	function reset_form() {
		document.getElementById("loan_form").reset();
		document.getElementById("loan_button").style.display='none';
		document.getElementById("compute_loan").style.display='block';
	}

	function addMonths(date, months) {
		var d = date.getDate();
		date.setMonth(date.getMonth() + +months);
		if (date.getDate() != d) {
			date.setDate(0);
		}
		return date;
	}

	function add_months(){
		var start_month = document.getElementById('start_month').value;
		var start_year = document.getElementById('start_year').value;
		var payroll_month = document.getElementById('payroll_month').value;
		var payroll_year = document.getElementById('payroll_year').value;
		var amount = document.getElementById('amount').value;
		var repayment_amount = document.getElementById('repayment_amount').value;

		var installments = amount/repayment_amount;

		var start_date = new Date(start_year, start_month-1);
		var payroll_date = new Date(payroll_year, payroll_month-1);
		if(start_date <= payroll_date){

			alert("Start date cannot be equal or less than current payroll date");

		} else {
			var date = addMonths(start_date, installments-1);
			var end_year = date.getFullYear();
			var end_month = date.getMonth() + 1;
			const monthNames = ["January", "February", "March", "April", "May", "June",
				"July", "August", "September", "October", "November", "December"
			];
			 var end_month_name = monthNames[date.getMonth()];
			 document.getElementById('end_month').value = end_month;
			 document.getElementById('end_year').value = end_year;
			 document.getElementById('end_year_name').value = end_year;
			 document.getElementById('end_month_name').value = end_month_name;
			 document.getElementById("loan_button").style.display='block';
			 document.getElementById("compute_loan").style.display='none';
	  	}
	}


</script>
