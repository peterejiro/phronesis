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
					<h1>Pension Rate</h1>
				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">


						<div class="card">
							<div class="card-body">
								<?php if(empty($pension_rates)): ?>
									<button class="btn btn-secondary btn-round" type="button"data-toggle="modal" data-target="#add_pension_rate" aria-haspopup="true" aria-expanded="false">
										<i class="mdi mdi-new-box "></i>Add Pension Rate
									</button>

								<?php endif; ?>

								<br> <br> <br>

								<table id="datatable-buttons" class="table table-bordered table-md">

									<thead>



									<tr>
										<th>Pension Rate</th>
										<th>Action</th>

									</tr>
									</thead>


									<tbody>
									<?php if(!empty($pension_rates)):
										foreach($pension_rates as $pension_rate):
											?>
											<tr>
												<td><?php echo $pension_rate->pension_rate." % "; ?></td>
												<td> <button type="button" class="btn btn-primary m-b-10 m-l-10 waves-effect waves-light" data-toggle="modal" data-target="#edit_pension_rate<?php echo $pension_rate->pension_rate_id; ?>">
														<i class="mdi mdi-table-edit "></i>
													</button>


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

<div class="modal fade" id="add_pension_rate" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle2">Add Minimum Tax Rate</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-dark">&times;</span>
				</button>
			</div>
			<form class="" method="post" action="<?php echo site_url('add_pension_rate'); ?>">
				<div class="modal-body">

					<div class="form-group">
						<label>Minimum Tax Rate:</label>

						<input  name="pension_rate"  data-parsley-pattern="^[1-9]\d*(\.\d+)?$" type="text"
								required class="form-control"
								placeholder="Enter Pension Rate"/>

					</div>



					<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />


				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Add Pension Rate </button>
					<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>


<?php if(!empty($pension_rates)):
	foreach($pension_rates as $pension_rate):
		?>
		<div class="modal fade" id="edit_pension_rate<?php echo $pension_rate->pension_rate_id ?>" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle2">Update Pension Rate</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true" class="text-dark">&times;</span>
						</button>
					</div>
					<form class="" method="post" action="<?php echo site_url('update_pension_rate'); ?>">
						<div class="modal-body">

							<div class="form-group">
								<label>Pension Rate:</label>

								<input  name="pension_rate"  data-parsley-pattern="^[1-9]\d*(\.\d+)?$" type="text"
										class="form-control" required value="<?php echo $pension_rate->pension_rate; ?>"
										placeholder="Enter Pension Rate"/>

							</div>

							<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
							<input type="hidden" name="pension_rate_id" value="<?php echo $pension_rate->pension_rate_id; ?>">



						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Update Pension Rate </button>
							<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
						</div>
					</form>	</div>
			</div>
		</div>

	<?php endforeach;
endif;
?>

<!-- End Right content here -->

</div>
<!-- END wrapper -->


<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>


