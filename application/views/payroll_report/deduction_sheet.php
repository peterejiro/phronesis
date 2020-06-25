
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

					<h1> <?php echo $payment->payment_definition_payment_name ?> Deduction Report - <?php echo $payroll_year." ".date("F", mktime(0, 0, 0, $payroll_month, 10)); ?></h1>

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
										<th>Amount </th>




									</tr>
									</thead>


									<tbody>

									<?php
									if(!empty($deductions)):

										$sn = 1;
										$total = 0;



										foreach($deductions as $deduction):
											?>
											<tr>
												<td><?php echo $sn; ?></td>

												<td> <?php echo $deduction->employee_first_name." ".$deduction->employee_last_name." ".$deduction->employee_other_name; ?></td>

												<td><?php echo number_format($deduction->salary_amount); ?></td>
												<?php $total = $total + $deduction->salary_amount; ?>

											</tr>



											<?php
											$sn++;

										endforeach; ?>

										<tr>
											<td><?php echo $sn + 1; ?></td>
											<td><b> Total: </b></td>

											<td><?php echo number_format($total); ?></td>


										</tr>

									<?php endif; ?>
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

