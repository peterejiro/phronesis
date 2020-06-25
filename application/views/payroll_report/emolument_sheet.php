
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
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>
		<?php include(APPPATH.'\views\topbar.php'); ?>


		<?php include(APPPATH.'\views\sidebar.php'); ?>



		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1> Emolument Sheet - <?php echo date("F", mktime(0, 0, 0, $payroll_month, 10))." ".$payroll_year; ?> </h1>
				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-body">

								<table id="datatable-buttons" class="table table-bordered table-md">
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


			</section>
		</div>




	</div>
</div>

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


</script>
