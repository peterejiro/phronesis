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
					<h1>Payment Definitions</h1>
				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-body">



									<a href="<?php echo site_url('new_payment_definition'); ?>" class="btn btn-secondary btn-round"  aria-haspopup="true" aria-expanded="false" style="margin: 5vh">
										<i class="mdi mdi-new-box "></i> New Payment Definition
									</a>





								<table id="datatable-buttons" class="table table-bordered table-md">

									<thead>



									<tr>
										<th>S/N</th>
										<th>Pay Code</th>
										<th>Payment Name </th>
										<th>Taxable </th>
										<th>Payment Type</th>
										<th>Action</th>

									</tr>
									</thead>


									<tbody>
									<?php if(!empty($payment_definitions)):


										$i = 1;
										foreach($payment_definitions as $payment_definition):
											?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $payment_definition->payment_definition_payment_code; ?></td>
												<td><?php echo $payment_definition->payment_definition_payment_name; ?></td>
												<td><?php if($payment_definition->payment_definition_taxable == 1){ echo "Yes" ;}if($payment_definition->payment_definition_taxable == 0){ echo "No" ;} ?></td>
												<td><?php if($payment_definition->payment_definition_type == 1){ echo "Income" ;}if($payment_definition->payment_definition_type == 0){ echo "Deduction" ;} ?></td>

												<td> <a class="btn btn-primary m-b-10 m-l-10 waves-effect waves-light"  href="<?php echo site_url('edit_payment_definition')."/".$payment_definition->payment_definition_id; ?>">
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


			</section>
		</div>




	</div>
</div>

<div class="modal fade" id="add_minimum_tax_rate" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle2">Add Minimum Tax Rate</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-dark">&times;</span>
				</button>
			</div>
			<form class="" method="post" action="<?php echo site_url('add_min_tax_rate'); ?>">
				<div class="modal-body">

					<div class="form-group">
						<label>Minimum Tax Rate:</label>

						<input  name="minimum_tax_rate"  data-parsley-pattern="^[1-9]\d*(\.\d+)?$" type="text"
								class="form-control"
								placeholder="Enter Minimum Tax Rate"/>

					</div>



					<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />


				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Add Min Tax Rate </button>
					<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>


<?php if(!empty($minimum_tax_rates)):
	foreach($minimum_tax_rates as $minimum_tax_rate):
		?>
		<div class="modal fade" id="edit_minimum_tax_rate<?php echo $minimum_tax_rate->minimum_tax_rate_id ?>" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle2">Update Min Tax Rate</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true" class="text-dark">&times;</span>
						</button>
					</div>
					<form class="" method="post" action="<?php echo site_url('update_min_tax_rate'); ?>">
						<div class="modal-body">

							<div class="form-group">
								<label>Minimum Tax Rate:</label>

								<input  name="minimum_tax_rate"  data-parsley-pattern="^[1-9]\d*(\.\d+)?$" type="text"
										class="form-control" value="<?php echo $minimum_tax_rate->minimum_tax_rate; ?>"
										placeholder="Enter Minimum Tax Rate"/>

							</div>

							<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
							<input type="hidden" name="minimum_tax_rate_id" value="<?php echo $minimum_tax_rate->minimum_tax_rate_id; ?>">



						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Update Min Tax Rate </button>
							<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
						</div>
					</form>	</div>
			</div>
		</div>

	<?php endforeach;
endif; ?>



<!-- End Right content here -->

</div>
<!-- END wrapper -->


<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>
