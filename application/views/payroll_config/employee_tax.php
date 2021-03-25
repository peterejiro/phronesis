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
					<h1>Tax Amount</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Tax Amount</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Employee Tax Amount</div>
          <p class="section-lead">You can manage employee Tax Amount here</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Employee Tax Amount</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-bordered table-striped table-md">
                      <thead>
                        <tr>
                          <th class="text-center">S/N</th>
                          <th>Employee ID</th>
                          <th>Employee Name</th>
                          <th>Department</th>
                          <th>Tax Amount</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(!empty($employees)):
                          $i = 1;
                          foreach($employees as $employee):
							  if($employee->employee_status == 1 || $employee->employee_status == 2):
                            ?>
                            <tr>
                              <td class="text-center" style="width: 9px"><?php echo $i; ?></td>
                              <td> <?php echo $employee->employee_unique_id; ?></td>
                              <td><?php echo $employee->employee_last_name." ".$employee->employee_first_name." ".$employee->employee_other_name; ?></td>
                              <td><?php echo $employee->job_name." (".$employee->department_name.")"; ?></td>
                              <td>
                                <?=number_format($employee->employee_tax_amount, 2);?>
                              </td>
                              <td class="text-center" style="width: 9px">
								  <button data-toggle="modal" data-target="#update_tax<?=$employee->employee_id; ?>" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-pen"></i> Update Tax Amount</button>

							  </td>
                            </tr>
                            <?php
							  endif;
                            $i++;
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

	<?php foreach($employees as $employee):
	if($employee->employee_status == 1 || $employee->employee_status == 2): ?>

		<div class="modal fade" id="update_tax<?=$employee->employee_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle2">Update Tax Amount</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true" class="text-dark">&times;</span>
						</button>
					</div>
					<form class="needs-validation" novalidate method="post" action="">
						<div class="modal-body">
							<div class="form-group">
								<label>Employee Name</label><span style="color: red"> *</span>
								<input type="text" class="form-control"  name="bank_name" disabled readonly value="<?php echo $employee->employee_last_name." ".$employee->employee_first_name." ".$employee->employee_other_name; ?>"/>
								<div class="invalid-feedback">
									please fill in a bank name
								</div>
							</div>
							<div class="form-group">
								<label>Tax Amount</label>
								<input type="number" step="any" class="form-control" value="<?=$employee->employee_tax_amount; ?>"  name="employee_tax_amount"/>
							</div>
							<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
							<input type="hidden" name="employee_id" value="<?=$employee->employee_id; ?>">
						</div>
						<div class="modal-footer bg-whitesmoke">
							<button type="submit" class="btn btn-primary">Update Tax Amount</button>
							<input type="reset" class="btn btn-secondary">
							<button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php endif;
			endforeach;

	?>
<?php include(APPPATH.'/views/footer.php'); ?>
<?php include(APPPATH.'/views/js.php'); ?>
</body>
</html>
<script>
  $('title').html('Tax Amount - IHUMANE')
</script>
