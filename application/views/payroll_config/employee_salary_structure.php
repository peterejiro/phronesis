<!DOCTYPE html>
<html lang="en">
<head>


	<?php include(APPPATH.'\views\stylesheet.php'); ?>
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
								<h4 class="page-title">Employee Salary Structure</h4>
							</div>
						</div>
					</div>
					<!-- end page title end breadcrumb -->


					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">

									<h4 class="mt-0 header-title">Employee Salary Structure</h4>



									<br> <br> <br>

									<table id="datatable-buttons"  class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


										<thead>



										<tr>
											<th>S/N</th>
											<th>Employee ID</th>
											<th>Employee Name</th>
											<th> Employee Department</th>
											<th>Employee Salary Structure </th>

											<th>Action </th>

										</tr>
										</thead>


										<tbody>
										<?php if(!empty($employees)):
											$i = 1;
										foreach($employees as $employee):
										?>
										<tr>
											<td><?php echo $i; ?></td>
											<td> <?php echo $employee->employee_unique_id; ?></td>
											<td><?php echo $employee->employee_last_name." ".$employee->employee_first_name." ".$employee->employee_other_name; ?></td>
											<td><?php echo $employee->job_name."(".$employee->department_name.")"; ?></td>

											<td><?php if($employee->employee_salary_structure_setup == 0 ){ echo "Not Yet Set up";} else{
													if($employee->employee_salary_structure_category == 0){

														echo "Personalized Salary Structure";
													} else{

														echo "Categorised";
													}

												} 	; ?></td>
											<td>
												<a href="<?php echo site_url('view_employee_salary_structure')."/".$employee->employee_id;?>"  class="btn btn-success m-b-10 m-l-10 waves-effect waves-light">
													<i class="mdi mdi-eye"></i>
												</a>
												<a href="<?php echo site_url('setup_salary_structure')."/".$employee->employee_id;?>"  class="btn btn-primary m-b-10 m-l-10 waves-effect waves-light">
													<i class="mdi mdi mdi-settings "></i>
												</a>
												<a href="<?php echo site_url('edit_employee_salary_structure')."/".$employee->employee_id;?>" class="btn btn-warning m-b-10 m-l-10 waves-effect waves-light">
													<i class="mdi mdi-tooltip-edit "></i>
												</a></td>

										</tr>

										<?php
										$i++;

										endforeach;
										endif; ?>

										</tbody>

									</table>

									<div class="modal fade" id="add_allowance" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLongTitle2">Add New Salary Structure</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true" class="text-dark">&times;</span>
													</button>
												</div>
												<form class="" method="post" action="<?php echo site_url('add_allowance'); ?>">
												<div class="modal-body">

														<div class="form-group">
															<label>Category Name:</label>
															<input type="text" class="form-control"  name="allowance_name" required placeholder="Enter Structure Name" />
														</div>



													<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />


												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-primary">Add New Salary Structe</button>
													<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
												</div>
												</form>
											</div>
										</div>
									</div>



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
