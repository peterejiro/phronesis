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
								<h4 class="page-title">Minimum Tax Rate</h4>
							</div>
						</div>
					</div>
					<!-- end page title end breadcrumb -->


					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">

									<h4 class="mt-0 header-title">Minimum Tax Rate</h4>
									<?php if(empty($minimum_tax_rates)): ?>

										<button class="btn btn-secondary btn-round" type="button"data-toggle="modal" data-target="#add_minimum_tax_rate" aria-haspopup="true" aria-expanded="false">
											<i class="mdi mdi-new-box "></i>Add Minimum Tax Rate
										</button>

									<?php endif; ?>

									<br> <br> <br>

									<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


										<thead>



										<tr>
											<th>Minimum Tax Rate</th>
											<th>Action</th>

										</tr>
										</thead>


										<tbody>
										<?php if(!empty($minimum_tax_rates)):
											foreach($minimum_tax_rates as $minimum_tax_rate):
												?>
												<tr>
													<td><?php echo $minimum_tax_rate->minimum_tax_rate." % "; ?></td>
													<td> <button type="button" class="btn btn-primary m-b-10 m-l-10 waves-effect waves-light" data-toggle="modal" data-target="#edit_minimum_tax_rate<?php echo $minimum_tax_rate->minimum_tax_rate_id; ?>">
															<i class="mdi mdi-table-edit "></i>
														</button>


												</tr>

											<?php

											endforeach;
										endif; ?>

										</tbody>

									</table>

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
									endif;
									?>
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
