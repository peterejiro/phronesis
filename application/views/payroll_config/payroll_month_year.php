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
					<h1>Payroll Month & Year</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Payroll Month & Year</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Payroll Month & Year</div>
          <p class="section-lead">You can manage payroll month & year here</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>All Payroll Months & Years</h4>
	                <?php if(empty($payroll_years)): ?>
                    <div class="card-header-action">
                      <button data-toggle="modal" data-target="#add_payroll" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i>Setup Payroll Month & Year</button>
                    </div>
	                <?php endif; ?>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered table-md">
                      <thead>
                        <tr>
                          <th>Month & Year</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
		                  <?php if(!empty($payroll_years)):
			                  foreach($payroll_years as $payroll_year):
				                  ?>
                          <tr>
                            <td><?php echo $payroll_year->payroll_month_year_year." ".date("F", mktime(0, 0, 0, $payroll_year->payroll_month_year_month, 10)); ?></td>
                            <td class="text-center" style="width: 9px">
                              <div class="dropdown">
                                <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item has-icon" href="#" data-toggle="modal" data-target="#edit_payroll<?php echo $payroll_year->payroll_month_year_id; ?>"><i class="fas fa-edit"></i>Edit Month & Year</a>
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

<div class="modal fade" id="add_payroll" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle2">Add New Month & Year</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-dark">&times;</span>
				</button>
			</div>
			<form class="needs-validation" novalidate method="post" action="<?php echo site_url('add_payroll_month_year'); ?>">
				<div class="modal-body">
					<div class="form-group">
						<label>Payroll Year</label><span style="color: red"> *</span>
						<select class="select2 form-control" id="payment_definition" required name="payroll_month_year_year" style="width: 100%; height:42px !important;">
							<option value=""> -- Select -- </option>
							<option value="<?php echo date("Y"); ?>"> <?php echo date("Y"); ?> </option>
						</select>
            <div class="invalid-feedback">
              please select a payroll year
            </div>
					</div>
					<div class="form-group">
						<label>Payroll Month</label><span style="color: red"> *</span>
						<select class="select2 form-control" id="payment_definition" required name="payroll_month_year_month" style="width: 100%; height:42px !important;">
							<option value=""> -- Select -- </option>
							<option value="<?php echo date('n', strtotime('-1 day', strtotime(date('Y-m-01'))));  ?>"> <?php echo date('F', strtotime('-1 day', strtotime(date('Y-m-01'))));  ?> </option>
							<option value="<?php echo date("n"); ?>"> <?php echo date("F"); ?> </option>
						</select>
            <div class="invalid-feedback">
              please select a payroll month
            </div>
					</div>
					<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
				</div>
				<div class="modal-footer bg-whitesmoke">
					<button type="submit" class="btn btn-primary">Add Month & Year</button>
					<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>


<?php
if(!empty($payroll_years)):
	foreach($payroll_years as $payroll_year): ?>
		<div class="modal fade" id="edit_payroll<?php echo $payroll_year->payroll_month_year_id ?>" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle2">Edit Month & Year</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true" class="text-dark">&times;</span>
						</button>
					</div>
					<form class="needs-validation" novalidate method="post" action="<?php echo site_url('update_payroll_month_year'); ?>">
						<div class="modal-body">
							<div class="form-group">
								<label>Payroll Year</label><span style="color: red"> *</span>
								<select class="select2 form-control" id="payment_definition" required name="payroll_month_year_year" style="width: 100%; height:42px !important;">
									<option value=""> -- Select -- </option>
									<option value="<?php echo date("Y"); ?>"> <?php echo date("Y"); ?> </option>
								</select>
                <div class="invalid-feedback">
                  please select a payroll year
                </div>
							</div>
							<div class="form-group">
								<label>Payroll Month</label><span style="color: red"> *</span>
								<select class="select2 form-control" id="payment_definition" required name="payroll_month_year_month" style="width: 100%; height:42px !important;">
									<option value=""> -- Select -- </option>
									<option value="<?php echo date('n', strtotime('-1 day', strtotime(date('Y-m-01'))));  ?>"> <?php echo date('F', strtotime('-1 day', strtotime(date('Y-m-01'))));  ?> </option>
									<option value="<?php echo date("n"); ?>"> <?php echo date("F"); ?> </option>
								</select>
                <div class="invalid-feedback">
                  please select a payroll month
                </div>
							</div>
							<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
							<input type="hidden" name="payroll_month_year_id" value="<?php echo $payroll_year->payroll_month_year_id; ?>">
						</div>
						<div class="modal-footer bg-whitesmoke">
							<button type="submit" class="btn btn-primary">Edit Month & Year</button>
							<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
						</div>
					</form>
        </div>
			</div>
		</div>
	<?php endforeach;
endif;
?>
<?php include(APPPATH.'/views/footer.php'); ?>
<?php include(APPPATH.'/views/js.php'); ?>
</body>
</html>

