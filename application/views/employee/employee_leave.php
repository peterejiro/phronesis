<!DOCTYPE html>
<html lang="en">
<head>

	<?php include(APPPATH.'\views\stylesheet.php');
	$CI =& get_instance();
	$CI->load->model('hr_configurations');

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

					<h1>Employee Leave</h1>

				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-body">
								<a class="btn btn-secondary btn-round" href="<?php echo base_url('new_employee_leave') ?>" aria-haspopup="true" aria-expanded="false" style="margin: 5vh">
									<i class="mdi mdi-new-box "></i>Initiate Leave
								</a>



								<table id="datatable-buttons" class="table table-bordered table-md">
									<thead>



									<tr>
										<th>Name of Employee</th>
										<th>Leave Type </th>
										<th>Leave Start Date</th>
										<th>Leave End Date</th>
										<th> Status </th>
										<th> Action </th>

									</tr>
									</thead>


									<tbody>
									<?php if(!empty($leaves)):
										foreach($leaves as $leave):
											?>
											<tr>
												<td><?php echo $leave->employee_last_name." ".$leave->employee_first_name; ?></td>
												<td><?php echo $leave->leave_name; ?></td>

												<td><?php
													echo $leave->leave_start_date;
													 ?></td>
												<td>
													<?php
													echo $leave->leave_end_date;

														?>

													</td>
												<td><?php if($leave->leave_status == 0){ echo "pending";} if($leave->leave_status == 1){ echo "running";} if($leave->leave_status == 2){ echo "finished";} ?></td>

												<td class="text-center" style="width: 9px">
													<?php if($leave->leave_status == 2):
															echo "No Action";

													else:

													?>
													<div class="dropdown">
														<a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
														<div class="dropdown-menu">
															<a class="dropdown-item has-icon" href="<?php echo site_url('extend_leave').'/'.$leave->employee_leave_id; ?>"><i class="fas fa-cog"></i>Extend Leave</a>

														</div>
													</div>
													<?php endif; ?>
												</td>
											</tr>

										<?php

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

</div>
<!-- END wrapper -->


<?php include(APPPATH.'\views\js.php'); ?>


</body>
</html>
