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
            <a href="<?php echo site_url('payroll_journal')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
          <h1>Payroll Journal Sheet</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="<?php echo site_url('payroll_report')?>">Payroll Reports</a></div>
            <div class="breadcrumb-item active"><a href="<?php echo site_url('payroll_journal')?>">Payroll Journal</a></div>
            <div class="breadcrumb-item">Payroll Journal Sheet</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About the Payroll Journal For <?php echo date("F", mktime(0, 0, 0, $payroll_month, 10))." ".$payroll_year; ?> </div>
          <p class="section-lead">You can view and export pay order details here</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Employee Payroll Journal</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table  class="table table-striped table-bordered table-md">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>Account</th>
                          <th style="text-align: right">DR</th>
                          <th  style="text-align: right">CR</th>
                         
                        </tr>
                      </thead>
                      <tbody>
		                  <?php
		                    $sn = 1;
		                    $total_income = 0;
		                    $total_deduction = 0;
		                    $income_array = array();
		                    $deduction_array = array();
		                    $income_i = 0;
		                    $deduction_i = 0;
		                    foreach ($payment_definitions as $payment_definition): ?>
								<tr>
								<td><?php echo $sn; ?></td>
								<td> <?php echo $payment_definition->payment_definition_payment_code." - ".$payment_definition->payment_definition_payment_name ?></td>
								<?php $total_amount = $CI->salaries->get_total_payment($payroll_month, $payroll_year, $payment_definition->payment_definition_id);
								$total_amount = $total_amount[0]->salary_amount;
								?>
								
								
							<?php	if($payment_definition->payment_definition_type == 1):
								$total_income = $total_income + $total_amount;
							
								$income_array[$income_i] = array(
										'payment_code' => $payment_definition->payment_definition_payment_code,
										'amount' => $total_amount
								);
								$income_i++;
								
								?>
								
									<td style="text-align: right"><?php echo number_format($total_amount, 2) ?></td>
									<td style="text-align: right"> 0.00</td>
								
								
							<?php	endif;
			
								if($payment_definition->payment_definition_type == 0):
									$total_deduction = $total_deduction + $total_amount;
									$deduction_array[$deduction_i] = array(
											'payment_code' => $payment_definition->payment_definition_payment_code,
											'amount' => $total_amount
									);
									$deduction_i++;
									?>
									
									<td style="text-align: right"> 0.00</td>
									<td style="text-align: right"><?php echo number_format($total_amount, 2) ?></td>
								
			
							<?php	endif;
							?>
									</tr>
									<?php
								$sn++;
							  endforeach;
		                    
		                     ?>
					  <tr>
						  <td> <?php echo $sn; ?></td>
						  <td>Net Salary </td>
						  <td style="text-align: right"> 0.00</td>
						  <td style="text-align: right"> <?php echo number_format($total_income - $total_deduction, 2) ?></td>
						  
					  </tr>
		
						  <tr>
							  <td> <?php echo $sn +1; ?></td>
							  <td>Total </td>
							  <td style="text-align: right"> <?php echo number_format($total_income, 2); ?></td>
							  <td style="text-align: right"> <?php echo number_format($total_deduction+ ($total_income - $total_deduction), 2); ?></td>
		
						  </tr>
                      </tbody>
                    </table>
					  <form action="<?php echo site_url('post_journal') ?>" method="post">
						  <input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
						  <input type="hidden" name="income" value="<?php echo ($total_income - $total_deduction); ?>">
						  <input type="hidden" name="deduction_array" value='<?php echo json_encode($deduction_array); ?>'>
						  <input type="hidden" name="narration" value="salary for <?php echo date("F", mktime(0, 0, 0, $payroll_month, 10))." ".$payroll_year; ?>">
						  <input type="hidden" name="month" value="<?=$payroll_month ?>">
						  <input type="hidden" name="year" value="<?=$payroll_year ?>">
		
						  <button class="btn btn-info btn-block" type="submit">Post To General Ledger</button>
	
					  </form>
                  </div>
                </div>
				 
				 
                <div class="card-footer text-right bg-whitesmoke">
                  <button onclick="location.href='<?php echo site_url('payroll_journal');?>'" class="btn btn-danger" type="button">Go Back</button>
                </div>
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
  $('title').html('Payroll Journal - Phronesis')
</script>
