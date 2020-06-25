
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
								<h4 class="page-title">Pay Order</h4>
							</div>
						</div>
					</div>
					<!-- end page title end breadcrumb -->


					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">

									<h4 class="mt-0 header-title">Pay Order - <?php echo $payroll_year." ".date("F", mktime(0, 0, 0, $payroll_month, 10)); ?></h4>

									<br> <br>


									<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
										<p> Lets see</p>

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

