
<!DOCTYPE html>
<html lang="en">
<head>

	<?php include(APPPATH.'\views\stylesheet.php');
	$CI =& get_instance();
	$CI->load->model('salaries');
	$CI->load->model('payroll_configurations');
	?>
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
								<h4 class="page-title">Emolument Sheet</h4>
							</div>
						</div>
					</div>
					<!-- end page title end breadcrumb -->


					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">

									<h4 class="mt-0 header-title">Emolument Sheet - <?php echo $payroll_year." ".date("F", mktime(0, 0, 0, $payroll_month, 10)); ?></h4>

									<br> <br>


									<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


										<thead>
										<tr>
											<th>S/N</th>
											<th>Employee Name</th>
											<th>Department</th>
											<th>Break Down</th>

											<th>Net Pay </th>



										</tr>
										</thead>


										<tbody>

										<?php

										$sn = 1;

											foreach($emoluments as $emolument):



													?>

													<tr>
														<td><?php echo $sn; ?></td>

														<td> <?php echo $emolument->employee_first_name." ".$emolument->employee_last_name." ".$emolument->employee_other_name; ?></td>
														<td> <?php echo $emolument->department_name; ?></td>

														<td> <table class="table table-striped table-bordered dt-responsive nowrap">
																<thead>
																<tr>
																<th>Income</th>
																<th>Deduction </th>
																</tr>

																</thead>

																<tbody>

																<?php $emolument_fields = $CI->salaries->view_emolument_fields();
																	foreach($emolument_fields as $emolument_field):

																		$payment_definition_field = stristr($emolument_field,"payment_definition_");

																	if(!empty($payment_definition_field)):

																		$payment_definition_id =  str_replace("payment_definition_","",$payment_definition_field);

																?>

																<tr>

																	<?php $payment_definition_check = $CI->payroll_configurations->view_payment_definition($payment_definition_id);


																	$emolument_detail = $CI->salaries->get_employee_income_pay($emolument->employee_id, $payment_definition_id, $payroll_month, $payroll_year); ?>


																	<td> <?php

																		if($payment_definition_check->payment_definition_type == 1):
																			if(empty($emolument_detail)):
																				echo $payment_definition_check->payment_definition_payment_name.": ".number_format(0);

																				else:

																		echo $emolument_detail->payment_definition_payment_name.": ".number_format($emolument_detail->salary_amount);
																				endif;
																		endif;
																		?></td>
																	<td><?php

																		if($payment_definition_check->payment_definition_type == 0):
																			if(empty($emolument_detail)):
																				echo $payment_definition_check->payment_definition_payment_name.": ".number_format(0);

																			else:

																				echo $emolument_detail->payment_definition_payment_name.": ".number_format($emolument_detail->salary_amount);
																			endif;
																		endif;
																		?></td>
																</tr>



																<?php
																endif;
																endforeach; ?>

																<tr>
																	<td>
																		<b style="color: green;">
																		<?php
																		$gross_pay = 0;

																		$salaries = $CI->salaries->get_employee_income($emolument->employee_id, $payroll_month, $payroll_year, 1);
																		foreach ($salaries as $salary):
																			$_gross_pay = $salary->salary_amount;

																			$gross_pay = $gross_pay + $_gross_pay;
																		endforeach;
																		echo  "Total Income: ".number_format($gross_pay);


																		?>
																		</b>
																	</td>

																	<td>
																		<b style="color: red;">
																		<?php
																		$total_deduction = 0;

																		$salaries = $CI->salaries->get_employee_income($emolument->employee_id, $payroll_month, $payroll_year, 0);
																		foreach ($salaries as $salary):
																			$_total_deduction = $salary->salary_amount;

																			$total_deduction = $total_deduction + $_total_deduction;
																		endforeach;
																		echo "Total Deduction: ". number_format($total_deduction);


																		?>
																		</b>
																	</td>

																</tr>

																</tbody>


															</table> </td>









														<td><?php echo number_format($gross_pay - $total_deduction); ?></td>

													</tr>



													<?php
													$sn++;

											endforeach; ?>




										</tbody>

									</table>





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

	window.onbeforeunload = confirmExit;
	function confirmExit()

	{
		$.ajax({
			url:'<?php echo site_url('emolument_report_clear'); ?>',

		});

		return "You have attempted to leave this page.  If you have made any changes to the fields without clicking the Save button, your changes will be lost.  Are you sure you want to exit this page?";
	}



	$('#sa-params').click(function () {
		swal({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Yes, Undo PayRoll Routine!',
			cancelButtonText: 'No, Cancel!',
			confirmButtonClass: 'btn btn-success',
			cancelButtonClass: 'btn btn-danger m-l-10',
			buttonsStyling: false
		}).then(function () {

			window.location="<?php echo site_url('undo_payroll_routine'); ?>";
			// swal(
			// 		'Deleted!',
			// 		'Your file has been deleted.',
			// 		'success'
			// )
		}, function (dismiss) {
			// dismiss can be 'cancel', 'overlay',
			// 'close', and 'timer'
			if (dismiss === 'cancel') {
				swal(
						'Cancelled',
						'Undo Canceled!!',
						'error'
				)
			}
		})
	});

	$('#sa-paramss').click(function () {
		swal({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Yes, Approve PayRoll Routine!',
			cancelButtonText: 'No, Cancel!',
			confirmButtonClass: 'btn btn-success',
			cancelButtonClass: 'btn btn-danger m-l-10',
			buttonsStyling: false
		}).then(function () {

			window.location="<?php echo site_url('run_approve_payroll_routine'); ?>";
			// swal(
			// 		'Deleted!',
			// 		'Your file has been deleted.',
			// 		'success'
			// )
		},
				function (dismiss) {
			// dismiss can be 'cancel', 'overlay',
			// 'close', and 'timer'
			if (dismiss === 'cancel') {
				swal(
						'Cancelled',
						'Undo Canceled!!',
						'error'
				)
			}
		})
	});

</script>
