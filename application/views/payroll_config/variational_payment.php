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
								<h4 class="page-title">Variational Payment Setup</h4>
							</div>
						</div>
					</div>
					<!-- end page title end breadcrumb -->


					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">

									<h4 class="mt-0 header-title">Variational Payment</h4>

									<a href="<?php echo site_url('new_variational_payment') ?>" class="btn btn-secondary btn-round"  aria-haspopup="true" aria-expanded="false">
										<i class="mdi mdi-new-box "></i>Add Variational Payment
									</a>

									<br> <br> <br>
									<font size="0.5">

									<table id="datatable-buttons"  class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


										<thead>



										<tr>
											<th>S/N</th>
											<th>Employee Unique ID</th>
											<th>Employee Name </th>
											<th>Department</th>
											<th>Payment Definition </th>
											<th>Amount</th>
											<th>Status</th>
											<th>Action </th>

										</tr>
										</thead>


										<tbody>
										<?php if(!empty($variational_payments)):
											$i = 1;
										foreach($variational_payments as $variational_payment):
										?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $variational_payment->employee_unique_id; ?></td>
											<td><?php echo $variational_payment->employee_first_name.", ".$variational_payment->employee_last_name; ?></td>
											<td><?php echo $variational_payment->department_name; ?></td>

											<td><?php echo $variational_payment->payment_definition_payment_name; ?></td>
											<td><?php echo $variational_payment->variational_amount; ?></td>
											<td><?php echo $variational_payment->variational_confirm; ?></td>
											<td>
												<a href="<?php echo site_url('edit_salary_allowance');?>"  class="btn btn-primary m-b-10 m-l-10 waves-effect waves-light">
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
									</font>





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
