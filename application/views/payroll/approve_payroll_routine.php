<!DOCTYPE html>
<html lang="en">
<head>


	<?php	$CI =& get_instance();
	$CI->load->model('salaries');
	?>
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
					<?php if($check_salary > 0): ?>
						<h1> Summary Of Payroll Routine - <?php echo $payroll_year." ".date("F", mktime(0, 0, 0, $payroll_month, 10)); ?> </h1>

					<?php else: ?>
						<h1>No Routine </h1>
					<?php endif; ?>
				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-body">


								<?php
								if($check_salary > 0):
								?>
									<span style="float: right;">
									<button type="button" class="btn btn-primary waves-effect waves-light" id="sa-paramss">Approve Routine</button>
									<button type="button" class="btn btn-danger waves-effect waves-light" id="sa-params">Undo Routine</button>
									</span>
								<?php
								endif;
								?>
								<table id="datatable-buttons" class="table table-bordered table-md">
									<thead>
									<tr>
										<th>S/N</th>
										<th>Employee Id</th>
										<th>Employee Name</th>
										<th>Gross Pay</th>
										<th>Total Deduction</th>
										<th>Net Pay </th>



									</tr>
									</thead>


									<tbody>

									<?php
									if($check_salary > 0):
									$sn = 1;
									if(!empty($employees)):
										foreach($employees as $employee):
											if($employee->employee_status == 3 || $employee->employee_status == 0):

											else:
												?>

												<tr>
													<td><?php echo $sn; ?></td>
													<td><?php echo $employee->employee_unique_id; ?></td>
													<td> <?php echo $employee->employee_first_name." ".$employee->employee_last_name." ".$employee->employee_other_name; ?></td>
													<td>
														<?php
														$gross_pay = 0;

														$salaries = $CI->salaries->get_employee_income($employee->employee_id, $payroll_month, $payroll_year, 1);
														foreach ($salaries as $salary):
															$_gross_pay = $salary->salary_amount;

															$gross_pay = $gross_pay + $_gross_pay;
														endforeach;
														echo number_format($gross_pay);


														?>


													</td>
													<td>
														<?php
														$total_deduction = 0;

														$salaries = $CI->salaries->get_employee_income($employee->employee_id, $payroll_month, $payroll_year, 0);
														foreach ($salaries as $salary):
															$_total_deduction = $salary->salary_amount;

															$total_deduction = $total_deduction + $_total_deduction;
														endforeach;
														echo number_format($total_deduction);


														?>


													</td>

													<td><?php echo number_format($gross_pay - $total_deduction); ?></td>

												</tr>

												<?php
												$sn++;
											endif;
										endforeach;

									endif;

									endif; ?>

									</tbody>

								</table>







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


	$('#sa-params').click(function () {

		swal({
			title: 'Are you sure?',
			text: 'Action Cannot be reversed!',
			icon: 'warning',
			buttons: true,
			dangerMode: true,
		})
				.then((willDelete) => {
					if (willDelete) {
						window.location="<?php echo site_url('undo_payroll_routine'); ?>"
					} else {
						swal('Undo Canceled!');
					}
				});
	});

	$('#sa-paramss').click(function () {

		swal({
			title: 'Are you sure?',
			text: 'Action Cannot be reversed!',
			icon: 'warning',
			buttons: true,
			dangerMode: true,
		})
				.then((willDelete) => {
					if (willDelete) {
						window.location="<?php echo site_url('run_approve_payroll_routine'); ?>"
					} else {
						swal('Routine Canceled!');
					}
				});


	});


</script>
