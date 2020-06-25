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
					<h1> Approve Variational Payments</h1>
				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
							<!--							<div class="card-header">-->
							<!--								<h4>Simple Table</h4>-->
							<!--							</div>-->
							<div class="card-body">
								<div class="table-responsive">

									<form action="<?php echo site_url('approve_variational_payments')?>" method="post">

										<table id="datatable-buttons" class="table table-bordered table-md">

											<thead>



											<tr>
												<th>S/N</th>
												<th>Employee Unique ID</th>
												<th>Employee Name </th>
												<th>Department</th>
												<th>Payment Definition </th>
												<th>Amount</th>
												<th>Approve </th>
												<!--											<th>Delete</th>-->

											</tr>
											</thead>



											<tbody>

											<?php if(!empty($variational_payments)):
												$i = 1;
												foreach($variational_payments as $variational_payment):
													if($variational_payment->variational_confirm == 0):
														?>
														<tr>
															<td><?php echo $i; ?></td>
															<td><?php echo $variational_payment->employee_unique_id; ?></td>
															<td><?php echo $variational_payment->employee_first_name.", ".$variational_payment->employee_last_name; ?></td>
															<td><?php echo $variational_payment->department_name; ?></td>

															<td><?php echo $variational_payment->payment_definition_payment_name; ?></td>
															<td><?php echo $variational_payment->variational_amount; ?></td>
															<td>

																<div class="checkbox my-2">
																	<div class="custom-control custom-checkbox">

																		<input type="checkbox" class="custom-control-input" name="approve[]" value="<?php echo $variational_payment->variational_payment_id; ?>" id="customCheck<?php echo $i; ?>" data-parsley-multiple="groups" data-parsley-mincheck="0">
																		<label class="custom-control-label" for="customCheck<?php echo $i; ?>">Approve</label>
																	</div>
																</div></td>
															<!--											<td>-->
															<!---->
															<!--												<div class="checkbox my-2">-->
															<!--													<div class="custom-control custom-checkbox">-->
															<!---->
															<!--														<input type="checkbox" class="custom-control-input" name="delete[]" value="--><?php //echo $variational_payment->variational_payment_id; ?><!--" id="delete--><?php //echo $i; ?><!--" data-parsley-multiple="groups" data-parsley-mincheck="0">-->
															<!--														<label class="custom-control-label" for="delete--><?php //echo $i; ?><!--">Delete</label>-->
															<!--													</div>-->
															<!--												</div></td>-->

														</tr>

													<?php
													endif;
													$i++;

												endforeach;
											endif; ?>



											</tbody>


										</table>
										<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />

										<button type="submit" class="btn btn-primary btn-block m-b-10 m-l-10 waves-effect waves-light">
											<i class="mdi mdi-plus-circle-outline"></i> Approve
										</button></td>
									</form>




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
