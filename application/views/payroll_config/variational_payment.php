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
					<h1>Variational Payments</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Variational Payments</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Employee Variational Payments</div>
          <p class="section-lead">You can manage employee variational payments here</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Employee Variational Payments</h4>
                  <div class="card-header-action">
                    <button onclick="location.href='<?php echo site_url('new_variational_payment');?>'" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Add Variational Payment</button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="datatable-buttons-2" class="table table-bordered table-striped table-md">
                      <thead>
                        <tr>
                          <th class="text-center">S/N</th>
                          <th>Employee Unique ID</th>
                          <th>Employee Name </th>
                          <th>Department</th>
                          <th>Payment Definition</th>
                          <th>Amount</th>
                          <th>Status</th>
                        </tr>
                      </thead>

                      <tbody>
		                  <?php if(!empty($variational_payments)):
			                  $i = 1;
			                  foreach($variational_payments as $variational_payment):
				                  ?>
                          <tr>
                            <td class="text-center" style="width: 9px"><?php echo $i; ?></td>
                            <td><?php echo $variational_payment->employee_unique_id; ?></td>
                            <td><?php echo $variational_payment->employee_first_name.", ".$variational_payment->employee_last_name; ?></td>
                            <td><?php echo $variational_payment->department_name; ?></td>
                            <td><?php echo $variational_payment->payment_definition_payment_name; ?></td>
                            <td>&#8358; <?php echo number_format($variational_payment->variational_amount); ?></td>
                            <td>
                              <?php if($variational_payment->variational_confirm == 0): ?>
                                <div class="badge badge-danger">Unconfirmed</div>
                              <?php else: ?>
                                <div class="badge badge-success">Confirmed</div>
                              <?php endif;?>
                            </td>
                          </tr>
				                  <?php
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
<?php include(APPPATH.'/views/footer.php'); ?>
<?php include(APPPATH.'/views/js.php'); ?>
</body>
</html>
<script>
  $('title').html('Variational Payments - Phronesis')
</script>
