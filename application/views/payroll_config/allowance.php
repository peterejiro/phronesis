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

					<h1>Allowances</h1>

				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-body">
								<a href="<?php echo site_url('new_salary_allowance') ?>" class="btn btn-secondary btn-round"  aria-haspopup="true" aria-expanded="false">
									<i class="mdi mdi-new-box "></i>Add New Allowance
								</a>

								<br> <br> <br>

								<table id="datatable-buttons" class="table table-bordered table-md">
									<thead>
									<tr>
										<th>S/N</th>
										<th>Payment Name</th>
										<th>Category </th>
										<th>Pay Code</th>
										<th>Amount</th>
										<th>Action </th>

									</tr>
									</thead>


									<tbody>
									<?php if(!empty($allowances)):
										$i = 1;
										foreach($allowances as $allowance):
											?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $allowance->payment_definition_payment_name; ?></td>
												<td><?php echo $allowance->salary_structure_category_name; ?></td>
												<td><?php echo $allowance->payment_definition_payment_code; ?></td>
												<td><?php echo $allowance->salary_structure_allowance_amount 	; ?></td>
												<td>
													<a href="<?php echo site_url('edit_salary_allowance')."/".$allowance->salary_structure_allowance_id;?>"  class="btn btn-primary m-b-10 m-l-10 waves-effect waves-light">
														<i class="mdi mdi-table-edit "></i>
													</a>
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





							</div>


						</div>
					</div>




				</div>

			</section>
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
	<!-- END wrapper -->


	<?php include(APPPATH.'\views\js.php'); ?>


</body>
</html>

