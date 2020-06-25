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

					<h1>Pay Order - <?php echo $payroll_year." ".date("F", mktime(0, 0, 0, $payroll_month, 10)); ?></h1>

				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-body">



								<table id="datatable-buttons" class="table table-bordered table-md">
									<thead>
									<tr>
										<th>Destination Bank Code</th>
										<th>Destination Bank Name</th>
										<th>Account Number</th>
										<th>Account Name</th>
										<th>Amount</th>
										<th>Narration</th>
										<th>Reference No</th>


									</tr>
									</thead>


									<tbody>

									<?php

									$sn = 1;

									foreach($employees as $employee):

										if($employee->employee_status == 0 || $employee->employee_status == 3):


										else:

											?>

											<tr>


												<td> <?php echo $employee->bank_code; ?></td>
												<td> <?php echo $employee->bank_name; ?></td>
												<td> <?php echo $employee->employee_account_number; ?></td>
												<td> <?php echo $employee->employee_first_name." ".$employee->employee_last_name." ".$employee->employee_other_name; ?></td>
												<td>
													<?php
													$gross_pay = 0;

													$salaries = $CI->salaries->get_employee_income($employee->employee_id, $payroll_month, $payroll_year, 1);
													foreach ($salaries as $salary):
														$_gross_pay = $salary->salary_amount;

														$gross_pay = $gross_pay + $_gross_pay;
													endforeach;
													//echo  "Total Income: ".number_format($gross_pay);
													$total_deduction = 0;

													$salaries = $CI->salaries->get_employee_income($employee->employee_id, $payroll_month, $payroll_year, 0);
													foreach ($salaries as $salary):
														$_total_deduction = $salary->salary_amount;

														$total_deduction = $total_deduction + $_total_deduction;
													endforeach;
													//echo "Total Deduction: ". number_format($total_deduction);

													echo number_format($gross_pay - $total_deduction);


													?>


												</td>

												<td>
													<?php echo "Salary for ".$payroll_year." ".date("F", mktime(0, 0, 0, $payroll_month, 10)); ?>

												</td>

												<td><?php echo $payroll_year." ".date("F", mktime(0, 0, 0, $payroll_month, 10)); ?>
												</td>

											</tr>



										<?php
										endif;
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
