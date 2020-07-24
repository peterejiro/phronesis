
<!DOCTYPE html>
<html lang="en">
<head>


<?php	$CI =& get_instance();
	$CI->load->model('salaries');
	?>
	<?php include(APPPATH.'/views/stylesheet.php'); ?>
	<!-- DataTables -->


</head>


<body class="fixed-left">
<!-- Begin page -->
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>
		<?php include(APPPATH.'/views/topbar.php'); ?>


		<?php include(APPPATH.'/views/sidebar.php'); ?>



		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1> Summary Of Payroll Routine - <?php echo $payroll_year." ".date("F", mktime(0, 0, 0, $payroll_month, 10)); ?> </h1>
				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-body">

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


			</section>
		</div>




	</div>
</div>





<!-- End Right content here -->

</div>
<!-- END wrapper -->
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

<?php include(APPPATH.'/views/js.php'); ?>
</body>
</html>
