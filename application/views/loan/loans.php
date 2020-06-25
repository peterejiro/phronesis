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
					<h1> Loans</h1>
				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-body">

								<table id="datatable-buttons" class="table table-bordered table-md">
									<thead>



									<tr>

										<th>Name of employee</th>
										<th>Employee Id</th>
										<th>Loan Type</th>
										<th>Amount</th>
										<th>Loan Status</th>
										<th>Action</th>

									</tr>
									</thead>


									<tbody>
									<?php if(!empty($loans)):
										foreach($loans as $loan):
											?>
											<tr>
												<td><?php echo $loan->employee_last_name." ".$loan->employee_first_name." ".$loan->employee_other_name; ?></td>
												<td><?php echo $loan->employee_unique_id; ?></td>
												<td><?php echo $loan->payment_definition_payment_name; ?></td>
												<td><?php echo number_format($loan->loan_amount); ?></td>
												<td><?php if($loan->loan_status == 0){echo "Running";} else{ echo "Paid Off"; } ?></td>

												<td><a type="button" class="btn btn-primary m-b-10 m-l-10 waves-effect waves-light" data-toggle="modal" data-target="#view_loan<?php echo $loan->loan_id ?>">
														<i class="mdi mdi-eye"></i>
													</a>
													<a type="button" class="btn btn-primary m-b-10 m-l-10 waves-effect waves-light" href="<?php echo site_url('edit_loan')."/".$loan->loan_id; ?>">
														<i class="mdi mdi-table-edit "></i>
													</a>
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




	</div>
</div>



<?php foreach($loans as $loan): ?>
	<div class="modal fade bd-example-modal-lg" id="view_loan<?php echo $loan->loan_id ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle2">View Loan Details</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" class="text-dark">&times;</span>
					</button>
				</div>
				<form class="" method="post" action="<?php echo site_url('update_employee'); ?>">
					<div class="modal-body">

						<div class="form-group">
							<label>Name of Employee:</label>
							<input type="text" class="form-control" disabled name="employee_name" required value="<?php echo $loan->employee_last_name." ".$loan->employee_first_name. " ".$loan->employee_other_name; ?>" placeholder="Enter Name of employee"/>
						</div>





						<div class="form-group row">

							<div class="col-sm-6">
								<label>Employee ID:</label>
								<input type="text" class="form-control"  name="employee_name" required value="<?php echo $loan->employee_unique_id; ?>" placeholder="Enter Name of employee"/>
							</div>
							<div class="col-sm-6">
								<label>Department:</label>
								<input type="text" class="form-control" disabled  name="employee_name" required value="<?php echo $loan->department_name; ?>" placeholder="Enter Name of employee"/>
							</div>

						</div>

						<div class="form-group row">

							<div class="col-sm-6">
								<label>From:</label>
								<input type="text" class="form-control"  name="employee_name" disabled required value="<?php echo date("F", mktime(0, 0, 0, $loan->loan_start_month, 10))." ".$loan->loan_start_year; ?>" placeholder="Enter Name of employee"/>
							</div>
							<div class="col-sm-6">
								<label>To:</label>
								<input type="text" class="form-control"  name="employee_name" disabled required value="<?php echo date("F", mktime(0, 0, 0, $loan->loan_end_month, 10))." ".$loan->loan_end_year; ?>" placeholder="Enter Name of employee"/>
							</div>
						</div>

						<div class="form-group row">

							<div class="col-sm-4">
								<label>Loan Type:</label>
								<input type="text" class="form-control"  name="employee_name" required value="<?php echo $loan->payment_definition_payment_name; ?>" placeholder="Enter Name of employee"/>
							</div>
							<div class="col-sm-4">
								<label>Balance:</label>
								<input type="text" class="form-control"  name="employee_name" required value="<?php echo number_format($loan->loan_balance); ?>" placeholder="Enter Name of employee"/>
							</div>
							<div class="col-sm-4 ml-auto input-group mt-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroup-sizing-normal">Status</span>
								</div>
								<input type="text" disabled value="<?php if($loan->loan_status == 0){ echo "Running"; } else { echo "Paid Off"; } ?>" class="form-control" aria-label="Normal" aria-describedby="inputGroup-sizing-sm">
							</div>


						</div>







					</div>
					<div class="modal-footer">

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
