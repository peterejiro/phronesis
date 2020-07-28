<?php include(APPPATH.'/views/stylesheet.php'); ?>

<body>
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>
		<?php include(APPPATH.'/views/topbar.php'); ?>
		<?php include(APPPATH.'/views/sidebar.php'); ?>
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1> Manage Loans</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Manage Loans</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Managing Loans</div>
          <p class="section-lead">You can manage loan applications here</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>All Loans</h4>
                  <div class="card-header-action">
                    <button onclick="location.href='<?php echo site_url('new_loan');?>'" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Add Loan</button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered table-md">
                      <thead>
                        <tr>
                          <th>Employee ID</th>
                          <th>Employee Name</th>
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
				                  ?>
                          <tr>
                            <td><?php echo $loan->employee_unique_id; ?></td>
                            <td><?php echo $loan->employee_last_name." ".$loan->employee_first_name." ".$loan->employee_other_name; ?></td>
                            <td><?php echo $loan->payment_definition_payment_name; ?></td>
                            <td>&#8358; <?php echo number_format($loan->loan_amount); ?></td>
                            <td>&#8358; <?php echo number_format($loan->loan_balance); ?></td>
                            <td>
                              <?php if($loan->loan_status == 0): ?>
                                <div class="badge badge-primary">Running</div>
                              <?php endif;?>
                              <?php if($loan->loan_status == 1):?>
                                <div class="badge badge-success">Paid Off</div>
                              <?php endif;?>
                              <?php if($loan->loan_status == 2):?>
                                <div class="badge badge-warning">Pending</div>
                              <?php endif;?>
                              <?php if($loan->loan_status == 3):?>
                                <div class="badge badge-danger">Discarded</div>
                              <?php endif;?>
                            </td>
                            <td class="text-center" style="width: 9px;">
                              <div class="dropdown">
                                <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item has-icon btn" data-toggle="modal" data-target="#view_loan<?php echo $loan->loan_id ?>"><i class="fas fa-eye"></i>View Loan Details</a>
                                  <?php if($loan->loan_status == 0):?>
                                    <a class="dropdown-item has-icon" href="<?php echo site_url('edit_loan')."/".$loan->loan_id; ?>"><i class="fas fa-edit"></i>Reschedule Loan</a>
                                  <?php endif; ?>
                                </div>
                              </div>
                            </td>
                          </tr>
			                  <?php
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
	</div>
</div>

<?php foreach($loans as $loan): ?>
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
								<input type="text" class="form-control"  name="employee_name" disabled value="<?php echo $loan->employee_unique_id; ?>" placeholder="Enter Name of employee"/>
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
								<input type="text" class="form-control"  name="employee_name" disabled required value="<?php echo $loan->payment_definition_payment_name; ?>"/>
							</div>
							<div class="col-sm-6">
								<label>Balance</label>
								<input type="text" class="form-control"  name="employee_name" disabled required value="&#8358; <?php echo number_format($loan->loan_balance); ?>"/>
							</div>
						</div>
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-normal">Current Status</span>
                </div>
                <input type="text" disabled value="<?php if($loan->loan_status == 0){ echo "Running"; } if($loan->loan_status == 1){ echo "Paid Off"; } if($loan->loan_status == 2){ echo "Pending"; } if($loan->loan_status == 3){ echo "Discarded"; } ?>" class="form-control" aria-label="Normal" aria-describedby="inputGroup-sizing-sm">
              </div>
            </div>
					</div>
					<div class="modal-footer bg-whitesmoke">
            <?php if($loan->loan_status == 2):  ?>
              <button onclick="location.href='<?php echo site_url('approve_loan')."/".$loan->loan_id;;?>'" type="button" class="btn btn-success" data-dismiss="modal">Approve Loan</button>
              <button onclick="location.href='<?php echo site_url('discard_loan')."/".$loan->loan_id;?>'" type="button" class="btn btn-danger" data-dismiss="modal">Discard Loan</button>
            <?php endif; ?>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach; ?>
<?php include(APPPATH.'/views/footer.php'); ?>
<?php include(APPPATH.'/views/js.php'); ?>
</body>
</html>
<script>
  $('title').html('Manage Loans - IHUMANE')
</script>

