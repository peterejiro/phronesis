<!DOCTYPE html>
<html lang="en">
<head>

	<?php include(APPPATH.'\views\stylesheet.php');
	$CI =& get_instance();
	$CI->load->model('salaries');
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
								<h4 class="page-title">Payroll Action</h4>
							</div>
						</div>
					</div>
					<!-- end page title end breadcrumb -->


					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">

									<h4 class="mt-0 header-title">Summary Of Payroll Routine - <?php echo $payroll_year." ".date("F", mktime(0, 0, 0, $payroll_month, 10)); ?></h4>


									<br> <br> <br>

									<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


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

										endif; ?>

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


<script>
	$( window ).on( "load", function() {
		swal({
			title: ' ',
			text: "Payroll Routine Successful",
			type: "success",
			confirmButtonClass: 'btn btn-confirm mt-2',
			cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
		}). then(function ()  {
			window.location="#";

		})
	});

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

</script>
</body>
</html>
