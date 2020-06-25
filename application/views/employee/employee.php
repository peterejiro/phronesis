<!DOCTYPE html>
<html lang="en">
<head>



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
					<h1> Employees</h1>
				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
<!--							<div class="card-header">-->
<!--								<h4>Simple Table</h4>-->
<!--							</div>-->
							<div class="card-body">
								<div class="table-responsive">

										<table id="datatable-buttons" class="table table-bordered table-md">
										<thead>



										<tr>

											<th>Name of employee</th>
											<th>Department</th>
											<th>Job Role</th>
											<th>Employment Status</th>
											<th>Action</th>

										</tr>
										</thead>


										<tbody>
										<?php if(!empty($employees)):
											foreach($employees as $employee):
												?>
												<tr>
													<td><?php echo $employee->employee_last_name." ".$employee->employee_first_name." ".$employee->employee_other_name; ?></td>
													<td><?php echo $employee->department_name; ?></td>
													<td><?php echo $employee->job_name; ?></td>
													<td><?php $status = $employee->employee_status; if ($status == 0) { echo "Fired";} if ($status == 1) { echo "Probationary";} if ($status == 2) { echo "Confirmed";} if ($status == 3) { echo "Retired";} ?></td>
													<td><a type="button" class="btn btn-primary m-b-10 m-l-10 waves-effect waves-light"  href="<?php echo site_url('view_employee')."/".$employee->employee_id; ?>">
															<i class="mdi mdi-eye"></i>
														</a>
														<a type="button" class="btn btn-primary m-b-10 m-l-10 waves-effect waves-light" href="<?php echo site_url('update_employee')."/".$employee->employee_id; ?>">
															<i class="mdi mdi-table-edit "></i>
														</a>
														<button type="button" class="btn btn-danger m-b-10 m-l-10 waves-effect waves-light">
															<i class="mdi mdi-delete-forever "></i>
														</button></td>

												</tr>

											<?php

											endforeach;
										endif; ?>



										</tbody>

									</table>


								</div>
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
