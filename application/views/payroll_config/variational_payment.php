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
					<h1> Variational Payments</h1>
				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
							<!--							<div class="card-header">-->
							<!--								<h4>Simple Table</h4>-->
							<!--							</div>-->
							<div class="card-body">
								<div class="table-responsive">
									<a href="<?php echo base_url('new_variational_payment') ?>" class="btn btn-secondary btn-round"  aria-haspopup="true" aria-expanded="false" style="margin: 5vh">
										<i class="mdi mdi-new-box "></i>Add Variational Payment
									</a>

									<table id="datatable-buttons" class="table table-bordered table-md">
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



								</div>
							</div>

						</div>
					</div>


			</section>
		</div>




	</div>
</div>





<!-- End Right content here -->

</div>
<!-- END wrapper -->


<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>
