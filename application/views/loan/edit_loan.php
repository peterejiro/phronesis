<!DOCTYPE html>
<html lang="en">
<head>


	<?php include(APPPATH.'\views\stylesheet.php'); ?>
	<!-- DataTables -->


</head>


<body class="fixed-left">
<!-- Begin page -->
<div id="wrapper">

	<!-- ========== Left Sidebar Start ========== -->
	<?php include(APPPATH.'\views\sidebar.php'); ?>
	<!-- Left Sidebar End -->

	<!-- Start right Content here -->

	<div class="content-page" id="raps">
		<!-- Start content -->
		<div class="content">

			<!-- Top Bar Start -->
			<?php include(APPPATH.'\views\topbar.php'); ?>
			<!-- Top Bar End -->

			<div class="page-content-wrapper">

				<div class="container-fluid">

					<div class="row">
						<div class="col-sm-12">
							<div class="page-title-box">
								<div class="float-right">

								</div>
								<h4 class="page-title">Reschedule Loan</h4>
							</div>
						</div>
					</div>
					<!-- end page title end breadcrumb -->


					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">

									<h4 class="mt-0 header-title"> Reschedule Loan</h4>


									<div class="row">
										<div class="col-md-6 col-xl-6">
											<div class="card m-b-30">
												<div class="card-body">
													<div class="button-items">
														<button type="button" onclick="show_skip_month()" class="btn btn-primary btn-lg btn-block">Skip Month</button>

													</div>
												</div>
											</div>
										</div>

										<div class="col-md-6 col-xl-6">
											<div class="card m-b-30">
												<div class="card-body">
													<div class="button-items">
														<button type="button" onclick="show_reschedule_amount()" class="btn btn-primary btn-lg btn-block">Change Repayment Amount</button>
													</div>
												</div>
											</div>
										</div>
									</div>



									<div class="modal-content" id="reschedule_amount">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLongTitle2">Reschedule Repayment Amount</h5>

										</div>

										<form class="" method="post" action="<?php echo site_url('update_loan'); ?>" id="loan_form">
											<div class="modal-body">

												<div class="form-group row">
													<div class="col-sm-6">
														<label>Employee ID:</label>
														<input type="text" class="form-control"  name="employee_name" disabled value="<?php echo $loan->employee_unique_id; ?>" placeholder="Enter Name of employee"/>
													</div>
													<div class="col-sm-6">
														<label> Employee:</label>
														<input type="text" class="form-control" disabled name="employee_name" required value="<?php echo $loan->employee_first_name." ".$loan->employee_last_name." ".$loan->employee_other_name; ?>" placeholder="Enter Name of employee"/>

													</div>

												</div>


												<div class="form-group row">
													<div class="col-sm-6">
														<label>Loan Amount:</label>
														<input type="text" class="form-control" disabled required value="<?php echo number_format($loan->loan_amount); ?>" placeholder="Enter Name of employee"/>
													</div>
													<div class="col-sm-6">
														<label>Loan Balance:</label>
														<input type="text" class="form-control" disabled required value="<?php echo number_format($loan->loan_balance); ?>" placeholder="Enter Name of employee"/>
													</div>



												</div>

												<div class="form-group row">

													<div class="col-sm-6">
														<label>Current Payroll Year:</label>
														<input type="text" class="form-control"  name="employee_name" disabled required value="<?php echo $payroll->payroll_month_year_year; ?>" placeholder="Enter Name of employee"/>
													</div>
													<div class="col-sm-6">
														<label>Current Payroll Month:</label>
														<input type="text" class="form-control"  name="employee_name" disabled required value="<?php echo date("F", mktime(0, 0, 0, $payroll->payroll_month_year_month, 10)); ?>" placeholder="Enter Name of employee"/>
													</div>


												</div>

												<div class="form-group row">
													<div class="col-sm-6">
														<label>Monthly Repayment:</label>
														<input type="text" class="form-control" disabled required value="<?php echo number_format($loan->loan_monthly_repayment); ?>" placeholder="Enter Name of employee"/>
													</div>
													<div class="col-sm-6">
														<label>New Monthly Repayment:</label>
														<input  name="new_repayment_amount" data-parsley-pattern="^[1-9]\d*(\.\d+)?$" type="text"
																class="form-control" id="new_repayment_amount"
																placeholder="Repayment Amount"/></div>



												</div>

												<div class="form-group row">

													<div class="col-sm-6">
														<label>New End Year:</label>
														<input   type="text"
																 class="form-control"  disabled id="new_end_year_name"
																 placeholder="end_year"/>


														<input type="hidden" id="new_end_year" name="new_end_year">

													</div>
													<div class="col-sm-6">
														<label>New End Month:</label>
														<input  name="end_month" disabled type="text"
																class="form-control" id="new_end_month_name"
																placeholder="end_year"/>

														<input type="hidden" id="new_end_month" name="new_end_month">


													</div>


												</div>



												<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
												<input type="hidden" name="loan_id" value="<?php echo $loan->loan_id; ?>">
												<input type="hidden" id="payroll_month" value="<?php echo $payroll->payroll_month_year_month; ?>"/>
												<input type="hidden" id="payroll_year" value="<?php echo $payroll->payroll_month_year_year; ?>">
												<input type="hidden" id="loan_balance" name="loan_balance" value="<?php echo $loan->loan_balance; ?>">
												<input type="hidden" name="reschedule_type" value="1">


												<div class="modal-footer">
													<button type="button" id="compute_loan" onclick="add_months()" class="btn btn-primary">Compute Loan</button>
													<button type="submit" id="loan_button"  class="btn btn-primary">Update Repayment Loan</button>
													<button type="reset" onclick="reset_form()" class="btn btn-danger ml-2">Clear All</button>


												</div>
											</div>
										</form>
									</div>
								</div>


									<div class="modal-content" id="skip_month">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLongTitle2">Skip Current Month</h5>

										</div>
										<form class="" method="post" action="<?php echo site_url('update_loan'); ?>" id="loan_form">
											<div class="modal-body">

												<div class="form-group row">
													<div class="col-sm-6">
														<label>Employee ID:</label>
														<input type="text" class="form-control"  name="employee_name" disabled value="<?php echo $loan->employee_unique_id; ?>" placeholder="Enter Name of employee"/>
													</div>
													<div class="col-sm-6">
														<label> Employee:</label>
														<input type="text" class="form-control" disabled name="employee_name" required value="<?php echo $loan->employee_first_name." ".$loan->employee_last_name." ".$loan->employee_other_name; ?>" placeholder="Enter Name of employee"/>




													</div>




												</div>


												<div class="form-group row">
													<div class="col-sm-6">
														<label> Loan Type:</label>
														<input type="text" class="form-control" disabled name="employee_name" required value="<?php echo $loan->payment_definition_payment_name; ?>" placeholder="Enter Name of employee"/>

													</div>
													<div class="col-sm-6">
														<label>Amount:</label>
														<input type="text" class="form-control"  name="employee_name" disabled required value="<?php echo number_format($loan->loan_amount); ?>" placeholder="Enter Name of employee"/>
													</div>

												</div>

												<div class="form-group row">

													<div class="col-sm-6">
														<label>From:</label>
														<input type="text" class="form-control"  name="employee_name" disabled required value="<?php echo date("F", mktime(0, 0, 0, $loan->loan_start_month, 10))." ".$loan->loan_start_year; ?>" placeholder="Enter Name of employee"/>
													</div>
													<div class="col-sm-6">
														<label>To:</label>
														<input type="text" class="form-control"  name="employee_name" disabled required value="<?php echo date("F", mktime(0, 0, 0, $loan->loan_end_month, 10))." ".$loan->loan_end_year; ?>" placeholder="Enter Name of employee"/>
													</div>


												</div>

												<div class="form-group row">

													<div class="col-sm-6">
														<label>Skip Year:</label>

														<select class="select2 form-control mb-3 custom-select" id="end_year" required name="skip_year" style="width: 100%; height:56px;">

															<option value="<?php echo $payroll->payroll_month_year_year; ?>"> <?php echo $payroll->payroll_month_year_year; ?> </option>
														</select>

													</div>
													<div class="col-sm-6">
														<label>Skip Month:</label>


														<select class="select2 form-control mb-3 custom-select" id="end_month" required name="skip_month" style="width: 100%; height:56px;">

																	<option value="<?php echo $payroll->payroll_month_year_month; ?>">
																		<?php echo date("F", mktime(0, 0, 0, $payroll->payroll_month_year_month, 10))?>
																	</option>
														</select>

													</div>


												</div>



												<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
												<input type="hidden" name="loan_id" value="<?php echo $loan->loan_id; ?>">
												<input type="hidden" name="reschedule_type" value="0">
												<div class="modal-footer">
													<button type="submit"  class="btn btn-primary">Skip Month</button>

												</div>
										</form>
									</div>
							</div>


								</div>


							</div>
						</div>
					</div> <!-- end col -->


			</div><!-- container -->

		</div> <!-- Page content Wrapper -->

	</div> <!-- content -->

	<?php include(APPPATH.'\views\footer.php'); ?>

</div>
<!-- End Right content here -->

</div>
<!-- END wrapper -->


<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>


<script>

	window.onload = function(){
		document.getElementById("skip_month").style.display='none';
		document.getElementById("reschedule_amount").style.display='none';
		document.getElementById("loan_button").style.display='none';
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
		//document.getElementById("loan_form").reset();
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

		var payroll_month = document.getElementById('payroll_month').value;
		var payroll_year = document.getElementById('payroll_year').value;
		var loan_balance = document.getElementById('loan_balance').value;
		var new_repayment_amount = document.getElementById('new_repayment_amount').value;

		var installments = loan_balance/new_repayment_amount;

		var payroll_date = new Date(payroll_year, payroll_month-1);

			var date = addMonths(payroll_date, installments-1);
			var end_year = date.getFullYear();
			var end_month = date.getMonth() + 1;
			const monthNames = ["January", "February", "March", "April", "May", "June",
				"July", "August", "September", "October", "November", "December"
			];
			var end_month_name = monthNames[date.getMonth()];
			document.getElementById('new_end_month').value = end_month;
			document.getElementById('new_end_year').value = end_year;
			document.getElementById('new_end_year_name').value = end_year;
			document.getElementById('new_end_month_name').value = end_month_name;
			document.getElementById("loan_button").style.display='block';
			document.getElementById("compute_loan").style.display='none';

	}


</script>
