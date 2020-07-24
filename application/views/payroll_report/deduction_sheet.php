<?php
  $CI =& get_instance();
  $CI->load->model('salaries');
  $CI->load->model('payroll_configurations');
  include(APPPATH.'/views/stylesheet.php');
?>

<body>
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>
		<?php include(APPPATH.'/views/topbar.php'); ?>
		<?php include(APPPATH.'/views/sidebar.php'); ?>
		<div class="main-content">
			<section class="section">
				<div class="section-header">
          <div class="section-header-back">
            <a href="<?php echo site_url('deduction')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
          <h1>Deduction Sheet</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="<?php echo site_url('payroll_report')?>">Payroll Reports</a></div>
            <div class="breadcrumb-item active"><a href="<?php echo site_url('deduction')?>">Deduction Report</a></div>
            <div class="breadcrumb-item">Deduction Sheet</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About <?php echo $payment->payment_definition_payment_name ?> Deductions For <?php echo date("F", mktime(0, 0, 0, $payroll_month, 10)). " ". $payroll_year; ?> </div>
          <p class="section-lead">You can view and export deduction details here</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Employee Deductions</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="datatable-buttons-2" class="table table-striped table-bordered table-md">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>Employee Name</th>
                          <th>Amount</th>
                        </tr>
                      </thead>
                      <tbody>
		                  <?php
		                  if(!empty($deductions)):
			                  $sn = 1;
			                  $total = 0;
			                  foreach($deductions as $deduction): ?>
                          <tr>
                            <td class="text-center" style="width: 9px"><?php echo $sn; ?></td>
                            <td><?php echo $deduction->employee_first_name." ".$deduction->employee_last_name." ".$deduction->employee_other_name; ?></td>
                            <td>&#8358; <?php echo number_format($deduction->salary_amount); ?></td>
					                  <?php $total = $total + $deduction->salary_amount; ?>
                          </tr>
				                  <?php
				                  $sn++;
			                  endforeach; ?>
                        <tr>
                          <td class="text-center" style="width: 9px"><b><?php echo $sn + 1; ?></b></td>
                          <td><b>Total Deductions</b></td>
                          <td><b>&#8358; <?php echo number_format($total); ?></b></td>
                        </tr>
		                  <?php endif; ?>
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

