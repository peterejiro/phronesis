
<?php include(APPPATH.'\views\stylesheet.php');
$CI =& get_instance();
$CI->load->model('hr_configurations');
$CI->load->model('payroll_configurations');
$CI->load->model('employees');

?>

<body class="layout-3">
<div id="app">
	<div class="main-wrapper container">
		<div class="navbar-bg"></div>
		<?php include('header.php'); ?>
		<?php include('menu.php'); ?>
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1> My Loans</h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="<?php echo site_url('employee_main'); ?>">Dashboard</a></div>
						<div class="breadcrumb-item">Manage Loans</div>
					</div>
				</div>
				<div class="section-body">
					<div class="section-title">All About Managing My Loans</div>
					<p class="section-lead">You can manage Your loan applications here</p>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h4>All Loans</h4>
									<div class="card-header-action">
										<button onclick="location.href='<?php echo site_url('my_new_loan');?>'" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Add Loan</button>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="datatable-buttons" class="table table-striped table-bordered table-md">
											<thead>
											<tr>

												<th>Loan Type</th>
												<th>Amount</th>
												<th>Balance</th>
												<th>Loan Status</th>
												<th>Action</th>
											</tr>
											</thead>
											<tbody>
											<?php if(!empty($loans)):
												foreach($loans as $loan):
											if($loan->employee_id == $employee_id):
													?>
													<tr>

														<td><?php echo $loan->payment_definition_payment_name; ?></td>
														<td>&#8358; <?php echo number_format($loan->loan_amount); ?></td>
														<td>&#8358; <?php echo number_format($loan->loan_balance); ?></td>
														<td>
															<?php if($loan->loan_status == 0): ?>
																<div class="badge badge-warning">Running</div>
															<?php endif;?>
															<?php if($loan->loan_status == 1):?>
																<div class="badge badge-success">Paid Off</div>
															<?php endif;?>
															<?php if($loan->loan_status == 2):?>
																<div class="badge badge-success">Pending</div>
															<?php endif;?>
															<?php if($loan->loan_status == 3):?>
																<div class="badge badge-success">Discarded</div>
															<?php endif;?>
														</td>
														<td class="text-center" style="width: 9px;">
															<div class="dropdown">
																<a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
																<div class="dropdown-menu">
																	<a class="dropdown-item has-icon" data-toggle="modal" data-target="#view_loan<?php echo $loan->loan_id ?>"><i class="fas fa-eye"></i>View Loan Details</a>

																</div>
															</div>
														</td>
													</tr>
												<?php
											endif;
											endforeach;
											endif; ?>
											</tbody>
										</table>
									</div>
								</div>
								<div class="card-footer bg-whitesmoke"></div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
			</section>
		</div>

		<?php include(APPPATH.'\views\footer.php'); ?>
	</div>
</div>

<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>

<?php foreach($loans as $loan):
	if($loan->employee_id == $employee_id):
	?>
	<div class="modal fade bd-example-modal-lg" id="view_loan<?php echo $loan->loan_id ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLongTitle2">View Loan Details</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" class="text-dark">&times;</span>
					</button>
				</div>
				<form class="" method="post" action="<?php echo site_url('update_employee'); ?>">
					<div class="modal-body">
						<div class="form-group">
							<label>Employee</label>
							<input type="text" class="form-control" disabled name="employee_name" required value="<?php echo $loan->employee_last_name." ".$loan->employee_first_name. " ".$loan->employee_other_name; ?>" placeholder="Enter Name of employee"/>
						</div>
						<div class="form-group row">
							<div class="col-sm-6">
								<label>Employee ID</label>
								<input type="text" class="form-control"  name="employee_name" required value="<?php echo $loan->employee_unique_id; ?>" placeholder="Enter Name of employee"/>
							</div>
							<div class="col-sm-6">
								<label>Department</label>
								<input type="text" class="form-control" disabled  name="employee_name" required value="<?php echo $loan->department_name; ?>" placeholder="Enter Name of employee"/>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-6">
								<label>From</label>
								<input type="text" class="form-control"  name="employee_name" disabled required value="<?php echo date("F", mktime(0, 0, 0, $loan->loan_start_month, 10))." ".$loan->loan_start_year; ?>" placeholder="Enter Name of employee"/>
							</div>
							<div class="col-sm-6">
								<label>To</label>
								<input type="text" class="form-control"  name="employee_name" disabled required value="<?php echo date("F", mktime(0, 0, 0, $loan->loan_end_month, 10))." ".$loan->loan_end_year; ?>" placeholder="Enter Name of employee"/>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-6">
								<label>Loan Type</label>
								<input type="text" class="form-control"  name="employee_name" required value="<?php echo $loan->payment_definition_payment_name; ?>" placeholder="Enter Name of employee"/>
							</div>
							<div class="col-sm-6">
								<label>Balance</label>
								<input type="text" class="form-control"  name="employee_name" required value="&#8358; <?php echo number_format($loan->loan_balance); ?>" placeholder="Enter Name of employee"/>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroup-sizing-normal">Current Status</span>
								</div>
								<input type="text" disabled value="<?php if($loan->loan_status == 0){ echo "Running"; } else { echo "Paid Off"; } ?>" class="form-control" aria-label="Normal" aria-describedby="inputGroup-sizing-sm">
							</div>
						</div>
					</div>
					<div class="modal-footer bg-whitesmoke">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php
endif;
endforeach; ?>







