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
								<h4 class="page-title">payment_definitions</h4>
							</div>
						</div>
					</div>
					<!-- end page title end breadcrumb -->


					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">

									<h4 class="mt-0 header-title">Payment Definitions</h4>

									<a href="<?php echo site_url('new_payment_definition'); ?>" class="btn btn-secondary btn-round"  aria-haspopup="true" aria-expanded="false">
										<i class="mdi mdi-new-box "></i> New Payment Definition
									</a>

									<br> <br> <br>

									<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


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
