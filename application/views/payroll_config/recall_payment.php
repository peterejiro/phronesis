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
								<h4 class="mt-0 header-title"> Add New Variational Payment</h4>
							</div>
						</div>
					</div>
					<!-- end page title end breadcrumb -->


					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
											<div class="modal-content">

												<form class="" method="post" action="<?php echo site_url('add_variational_payment'); ?>">
												<div class="modal-body">

													<div class="form-group row">

														<div class="col-sm-6">
															<label> Payment Definition:</label>
															<select id="payment_type" class="select2 form-control mb-3 custom-select" required name="payment_definition_id" style="width: 100%; height:56px;">
																<option value="null"> -- Select -- </option>
																<?php foreach ($payment_definitions as $payment_definition):
																		if($payment_definition->payment_definition_variant == 1): ?>


																	<option value="<?php echo $payment_definition->payment_definition_id ?>"  <?php if($variational_payments[0]->payment_definition_id == $payment_definition->payment_definition_id){ echo "selected"; } ?> > <?php echo $payment_definition->payment_definition_payment_name; ?> </option>

																<?php
																endif;
																endforeach; ?>

															</select>

														</div>

														<div class="col-sm-6">

														<input type="hidden" value="0" name="category">

														</div>

													</div>

													<div class="form-group row">


														<div class="col-sm-6" >
															<label> Employees:</label>
															<select class="select2 mb-3 select2-multiple" style="width: 100%" multiple data-placeholder="Choose" name="employee_ids[]">

																<option> -- Select -- </option>

																<?php
																$temps[0] = 0;
																foreach ($variational_payments as $variational_payment): ?>

																	<option value="<?php echo $variational_payment->employee_id ?>" selected> <?php echo $variational_payment->employee_first_name." ".$variational_payment->employee_last_name." (".$variational_payment->department_name.")" ; ?> </option>

																<?php
																$temps[] = $variational_payment->employee_id;
																endforeach;

																foreach ($employees as $employee):
																	if(($employee->employee_status == 0) or ($employee->employee_status == 3)):
																		else:
																			if((array_search($employee->employee_id, $temps, true))):

																			else:
																			?>
																			<option value="<?php echo $employee->employee_id ?>"> <?php echo $employee->employee_first_name." ".$employee->employee_last_name." (".$employee->department_name.")" ; ?> </option>
																				<?php
																		endif;
																	endif;
																endforeach; ?>

															</select>

														</div>

														<div class="col-sm-6">
															<label> Amount:</label>
															<input  name="payment_amount"  data-parsley-type="digits" type="text"
																	class="form-control"
																	placeholder="Enter allowance amount" required value="<?php echo $variational_payments[0]->variational_amount; ?>"/>
														</div>

													</div>

													<div class="form-group row">

														<div class="col-sm-6">
															<label> Payroll Month:</label>
															<input  name="payroll_month"  data-parsley-type="text" type="text"
																	class="form-control"
																	placeholder="Enter Payment Name" disabled value="<?php echo date("F", mktime(0, 0, 0, $payroll->payroll_month_year_month, 10)) ?>"/>

														</div>

														<div class="col-sm-6">
															<label> Payroll Year:</label>
															<input  name="payroll_year"  data-parsley-type="text" type="text"
																	class="form-control"
																	placeholder="Enter Payment Name" disabled value="<?php echo $payroll->payroll_month_year_year; ?>"/>

														</div>



													</div>

													<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
												<div class="modal-footer">
													<button type="submit" class="btn btn-primary">Add New Variational Payment</button>
														</div>
												</form>
											</div>






								</div>


								</div>
							</div>
						</div> <!-- end col -->
					</div> <!-- end row -->

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
		document.getElementById("employees").style.display='none';
		document.getElementById("departments").style.display='none';
	};



	function toogle_employee_department() {
		var value = document.getElementById('category').value;



		if(value == 1){
			document.getElementById("employees").style.display='none';
			document.getElementById("departments").style.display='block';
		} else if(value == 0){

			document.getElementById("employees").style.display='block';
			document.getElementById("departments").style.display='none';

		}
	}








</script>



