<?php
	$CI =& get_instance();
	$CI->load->model('salaries');
	$CI->load->model('payroll_configurations');
	$CI->load->model('accountings');
	include(APPPATH.'/views/stylesheet.php'); ?>

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
            <a href="<?php echo site_url('payroll_report')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
					<h1> Profit And Loss Statement  </h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="<?php echo site_url('payroll_report')?>">Payroll Reports</a></div>
            <div class="breadcrumb-item">Profit And Loss Statement </div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Profit And Loss Statement</div>
          <p class="section-lead"> View Profit And Loss Statement  for from <?=$from; ?> to <?=$to; ?> here</p>
          <div class="row">
            <div class="col-md-12">
				<div class="card">
				<div class="card-body">
				<div class="table-responsive">
					<table  class="table table-striped table-bordered table-md">
						<thead>
						<tr>
							<th>S/N</th>
							<th>Account</th>
<!--							<th style="text-align: right">DR</th>-->
<!--							<th  style="text-align: right">CR</th>-->
							<th style="text-align: right"> Amount</th>
			
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
							$deduction_i = 0; ?>
						
						<tr role="row" class="bg-success text-white">
							<td class="sorting_1" colspan="3"><strong style="font-size:16px; text-transform:uppercase;">Revenues/Incomes</strong></td>
						</tr>
						
						
						<?php $i = 0;	foreach ($accounts as $account):
								if($account->account_type == 4 && $account->type == 1):
								?>
								
								<tr>
									<td><?php echo $sn; ?></td>
									<td> <?php echo $account->account_name; ?></td>
									<?php
										$total_credit = 0;
										$total_debit = 0;
										
										$transactions = $CI->accountings->get_credit($account->glcode, $from, $to);
										
										foreach ($transactions as $transaction):
										
											$total_credit = $total_credit + $transaction->cr_amount;
											$total_debit = $total_debit + $transaction->dr_amount;
										
										endforeach;
										
										
										
									?>
<!--									<td style="text-align: right">--><?php //echo number_format($total_credit, 2) ?><!--</td>-->
<!--									<td style="text-align: right"> --><?php //echo number_format($total_debit, 2) ?><!--</td>-->
									<td style="text-align: right"> <?php echo number_format($total_credit - $total_debit, 2) ?></td>
						
									
								</tr>
						<?php
								$income_array[$i] = $total_credit - $total_debit;
								
									$sn++;
									$i++;
								endif; ?>
								
								
								
								<?php
								
							endforeach;
			
						?>
						
						
						<tr>
							<td>
								<?php echo $sn++; ?>
							</td>
							<td>
								<b>Total Income</b>
							</td>
							<td> <?php echo number_format(array_sum($income_array), 2) ?></td>
						</tr>
						
						<tr role="row" class="bg-success text-white">
							<td class="sorting_1" colspan="3"><strong style="font-size:16px; text-transform:uppercase;">Expenses</strong></td>
						</tr>
						<?php $i= 0;	foreach ($accounts as $account):
							if($account->account_type == 5 && $account->type == 1):
								?>
								
								<tr>
									<td><?php echo $sn; ?></td>
									<td> <?php echo $account->account_name; ?></td>
									<?php
										$total_credit = 0;
										$total_debit = 0;
										
										$transactions = $CI->accountings->get_credit($account->glcode, $from, $to);
										
										foreach ($transactions as $transaction):
											
											$total_credit = $total_credit + $transaction->cr_amount;
											$total_debit = $total_debit + $transaction->dr_amount;
										
										endforeach;
									
									
									
									?>
<!--																		<td style="text-align: right">--><?php //echo number_format($total_credit, 2) ?><!--</td>-->
<!--																		<td style="text-align: right"> --><?php //echo number_format($total_debit, 2) ?><!--</td>-->
									<td style="text-align: right"> <?php echo number_format($total_debit - $total_credit, 2) ?></td>
								
								
								</tr>
								<?php
								$deduction_array[$i] = $total_debit - $total_credit;
								$i++;
								$sn++;
							endif;  ?>
							
							
							
							<?php
							
						endforeach;
						
						?>
						
						<tr>
							<td>
								<?php echo $sn++; ?>
							</td>
							<td>
								<b>Total Expenses</b>
							</td>
							<td> <?php echo number_format(array_sum($deduction_array), 2) ?></td>
						</tr>
						<tr role="row" class="bg-success text-white">
							<td class="sorting_1" colspan="3"><strong style="font-size:16px; text-transform:uppercase;">Profit/Loss Amount</strong></td>
						</tr>
						<tr>
							<td>
<!--							--><?php //echo(array_sum($income_array)) ?>
							</td>
							<td>
<!--							--><?php //echo(array_sum($deduction_array)) ?>
							</td>
							
							<td  style="text-align: right">
								<?php echo number_format(array_sum($income_array) - array_sum($deduction_array), 2); ?>
							</td>
						</tr>
						</tbody>
					</table>
					
				</div>
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
  $('title').html('Profit And Loss Statement  - IHUMANE')
</script>
