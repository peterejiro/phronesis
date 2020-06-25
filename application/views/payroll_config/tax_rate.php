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
					<h1> Tax Rates</h1>
				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-body">

								<button class="btn btn-secondary btn-round" type="button"data-toggle="modal" data-target="#add_tax_rate" aria-haspopup="true" aria-expanded="false" style="margin: 5vh">
									<i class="mdi mdi-new-box "></i>Add New tax_rate
								</button>

								<br> <br> <br>

<!--								<table id="datatable-buttons" class="table table-bordered table-md">-->

								<table  class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


									<thead>



									<tr>
										<th>Tax Band</th>
										<th> Tax Rate (%) </th>
										<th>Action</th>

									</tr>
									</thead>


									<tbody>
									<?php if(!empty($tax_rates)):

										$band = array('First', 'Next', 'Next', 'Next', 'Next', 'Above');
										$i = 0;
										foreach($tax_rates as $tax_rate):
											?>
											<tr>
												<td><?php echo $band[$i]." ".number_format($tax_rate->tax_rate_band); ?></td>
												<td><?php echo $tax_rate->tax_rate_rate; ?></td>
												<td> <button type="button" class="btn btn-primary m-b-10 m-l-10 waves-effect waves-light" data-toggle="modal" data-target="#edit_tax_rate<?php echo $tax_rate->tax_rate_id ?>">
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


							</div>


						</div>
					</div>


			</section>
		</div>




	</div>
</div>
<div class="modal fade" id="add_tax_rate" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle2">Add New tax_rate</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-dark">&times;</span>
				</button>
			</div>
			<form class="" method="post" action="<?php echo site_url('add_tax_rate'); ?>">
				<div class="modal-body">

					<div class="form-group">
						<label>Tax Rate Band:</label>
						<input type="number" class="form-control"  name="tax_rate_band" required placeholder="Enter Tax Rate Band"/>
					</div>

					<div class="form-group">
						<label>Tax Rate(%):</label>
						<input type="number" class="form-control"  name="tax_rate_rate" required placeholder="Enter Tax Rate"/>
					</div>


					<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />


				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Add New tax rate</button>
					<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>


<?php foreach($tax_rates as $tax_rate): ?>
	<div class="modal fade" id="edit_tax_rate<?php echo $tax_rate->tax_rate_id ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle2">Update tax_rate</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" class="text-dark">&times;</span>
					</button>
				</div>
				<form class="" method="post" action="<?php echo site_url('update_tax_rate'); ?>">
					<div class="modal-body">

						<div class="form-group">
							<label>Tax Rate Band:</label>
							<input type="number" class="form-control"  name="tax_rate_band" value="<?php echo $tax_rate->tax_rate_band; ?>" required placeholder="Enter Tax Rate Band"/>
						</div>

						<div class="form-group">
							<label>Tax Rate(%):</label>
							<input type="number" class="form-control"  name="tax_rate_rate" value="<?php echo $tax_rate->tax_rate_rate; ?>" required placeholder="Enter Tax Rate"/>
						</div>



						<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />

						<input type="hidden" name="tax_rate_id" value="<?php echo $tax_rate->tax_rate_id;?>" />


					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Update tax_rate</button>
						<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php endforeach; ?>




<!-- End Right content here -->

</div>
<!-- END wrapper -->


<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>
