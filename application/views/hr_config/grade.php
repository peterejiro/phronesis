<!DOCTYPE html>
<html lang="en">
<head>

	<?php include(APPPATH.'\views\stylesheet.php');

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

					<h1>Grade Setup</h1>

				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-body">
								<button class="btn btn-secondary btn-round" type="button"data-toggle="modal" data-target="#add_grade" aria-haspopup="true" aria-expanded="false" style="margin: 5vh">
									<i class="mdi mdi-new-box "></i>Add New Grade
								</button>



								<table id="datatable-buttons" class="table table-bordered table-md">
									<thead>



									<tr>
										<th>Name of grade</th>
										<th>Action</th>

									</tr>
									</thead>


									<tbody>
									<?php if(!empty($grades)):
										foreach($grades as $grade):
											?>
											<tr>
												<td><?php echo $grade->grade_name; ?></td>
												<td> <button type="button" class="btn btn-primary m-b-10 m-l-10 waves-effect waves-light" data-toggle="modal" data-target="#edit_grade<?php echo $grade->grade_id ?>">
														<i class="mdi mdi-table-edit "></i>
													</button>
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


			</section>
		</div>
		<div class="modal fade" id="add_grade" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle2">Add New grade</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true" class="text-dark">&times;</span>
						</button>
					</div>
					<form class="" method="post" action="<?php echo site_url('add_grade'); ?>">
						<div class="modal-body">

							<div class="form-group">
								<label>Name of grade:</label>
								<input type="text" class="form-control"  name="grade_name" required placeholder="Enter Name of grade"/>
							</div>


							<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />


						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Add New grade</button>
							<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>


		<?php foreach($grades as $grade): ?>
			<div class="modal fade" id="edit_grade<?php echo $grade->grade_id ?>" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle2">Update grade</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true" class="text-dark">&times;</span>
							</button>
						</div>
						<form class="" method="post" action="<?php echo site_url('update_grade'); ?>">
							<div class="modal-body">

								<div class="form-group">
									<label>Name of grade:</label>
									<input type="text" class="form-control"  name="grade_name" required value="<?php echo $grade->grade_name; ?>" placeholder="Enter Name of grade"/>
								</div>


								<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />

								<input type="hidden" name="grade_id" value="<?php echo $grade->grade_id;?>" />


							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary">Update grade</button>
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
<!-- END wrapper -->


<?php include(APPPATH.'\views\js.php'); ?>


</body>
</html>
