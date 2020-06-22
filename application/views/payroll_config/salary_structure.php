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
								<h4 class="page-title">Salary Structure Categories</h4>
							</div>
						</div>
					</div>
					<!-- end page title end breadcrumb -->


					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">

									<h4 class="mt-0 header-title">Salary Structure Categories</h4>

									<button class="btn btn-secondary btn-round" type="button"data-toggle="modal" data-target="#add_salary_structure" aria-haspopup="true" aria-expanded="false">
										<i class="mdi mdi-new-box "></i>Add New Salary Structure Category
									</button>

									<br> <br> <br>

									<table id="datatable-buttons"  class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


										<thead>



										<tr>
											<th>S/N</th>
											<th>Salary Category </th>
											<th>Action</th>

										</tr>
										</thead>


										<tbody>
										<?php if(!empty($salary_structures)):
											$i = 1;
										foreach($salary_structures as $salary_structure):
										?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $salary_structure->salary_structure_category_name; ?></td>
											<td><a href="<?php echo site_url('view_salary_structure')."/".$salary_structure->salary_structure_id;?>" class="btn btn-primary m-b-10 m-l-10 waves-effect waves-light" >
													<i class="mdi mdi-eye"></i>
												</a>
												<button type="button" class="btn btn-primary m-b-10 m-l-10 waves-effect waves-light" data-toggle="modal" data-target="#edit_salary_structure<?php echo $salary_structure->salary_structure_id ?>">
													<i class="mdi mdi-table-edit "></i>
												</button>
												<button type="button" class="btn btn-danger m-b-10 m-l-10 waves-effect waves-light">
													<i class="mdi mdi-delete-forever "></i>
												</button></td>

										</tr>

										<?php
										$i++;

										endforeach;
										endif; ?>

										</tbody>

									</table>

									<div class="modal fade" id="add_salary_structure" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLongTitle2">Add New Salary Structure</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true" class="text-dark">&times;</span>
													</button>
												</div>
												<form class="" method="post" action="<?php echo site_url('add_salary_structure'); ?>">
												<div class="modal-body">

														<div class="form-group">
															<label>Category Name:</label>
															<input type="text" class="form-control"  name="salary_structure_name" required placeholder="Enter Structure Name" />
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


									<?php foreach($salary_structures as $salary_structure): ?>
									<div class="modal fade" id="edit_salary_structure<?php echo $salary_structure->salary_structure_id ?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLongTitle2">Update salary_structure</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true" class="text-dark">&times;</span>
													</button>
												</div>
												<form class="" method="post" action="<?php echo site_url('update_salary_structure'); ?>">
													<div class="modal-body">



														<div class="form-group">
															<label>Salary Structure Name:</label>
															<input type="text" class="form-control"  name="salary_structure_name" value="<?php echo $salary_structure->salary_structure_category_name; ?>" required placeholder="Enter Salary Structure Name"/>
														</div>





														<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />

														<input type="hidden" name="salary_structure_id" value="<?php echo $salary_structure->salary_structure_id;?>" />


													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-primary">Update salary_structure</button>
														<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
													</div>
												</form>
											</div>
										</div>
									</div>

									<?php endforeach; ?>
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
