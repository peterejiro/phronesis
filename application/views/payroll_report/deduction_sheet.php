
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
								<h4 class="page-title">Deduction Report</h4>
							</div>
						</div>
					</div>
					<!-- end page title end breadcrumb -->


					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">

									<h4 class="mt-0 header-title"> <?php echo $payment->payment_definition_payment_name ?> Deduction Report - <?php echo $payroll_year." ".date("F", mktime(0, 0, 0, $payroll_month, 10)); ?></h4>

									<br> <br>


									<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


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


