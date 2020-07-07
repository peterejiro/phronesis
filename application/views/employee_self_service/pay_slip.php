
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

		<!-- Main Content -->

		<!-- Main Content -->
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<div class="section-header-back">
						<a href="<?php echo site_url('payroll_report')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
					</div>
					<h1> Pay Slip</h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="<?php echo base_url('employee_main'); ?>">Dashboard</a></div>

						<div class="breadcrumb-item">Pay Slip</div>
					</div>
				</div>
				<div class="section-body">
					<div class="section-title">All Your Pay Slips</div>
					<p class="section-lead">You can generate your Pay Slip for the selected month and year here</p>
					<div class="row">
						<div class="col-md-7">
							<form method="post" action="<?php echo site_url('pay_slips'); ?>" class="needs-validation" novalidate id="loan_form">
								<div class="card card-primary">
									<div class="card-header">
										<h4>Pay Slip Form</h4>
									</div>
									<div class="card-body">
										<div class="form-group">
											<label>Start Year</label><span style="color: red"> *</span>
											<select class="form-control selectric" id="start_year" required name="year" style="width: 100%; height:56px;">
												<option value=""> -- Select -- </option>
												<option value="<?php echo $min_payroll_year[0]->salary_pay_year; ?>"> <?php echo $min_payroll_year[0]->salary_pay_year; ?> </option>
												<?php
												$_min_payroll_year = $min_payroll_year[0]->salary_pay_year;
												$_year = date("Y");
												$check = $_year - $_min_payroll_year;
												if($check > 0):
													$count = 1;
													while ($count <= $check): ?>
														<option value="<?php echo $_min_payroll_year + $count; ?>"> <?php echo $_min_payroll_year + $count; ?> </option>
														<?php
														$count++;
													endwhile;
												endif;
												?>
											</select>
											<div class="invalid-feedback">
												please select a start year
											</div>
										</div>
										<div class="form-group">
											<label>Start Month</label><span style="color: red"> *</span>
											<select class="form-control selectric" id="start_month" required name="month" style="width: 100%; height:56px;">
												<option value=""> -- Select -- </option>
												<?php
												$month = date('n'); // current month
												for ($x = 0; $x < 12; $x++):
													?>
													<option value="<?php echo date('n', mktime(0,0,0,$month + $x,1)); ?>">
														<?php echo date('F', mktime(0,0,0,$month + $x,1)); ?>
													</option>
												<?php endfor; ?>
											</select>
											<div class="invalid-feedback">
												please select a start month
											</div>
										</div>
										<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
									</div>
									<div class="card-footer text-right bg-whitesmoke">
										<button type="submit" id="loan_button" class="btn btn-primary">Generate Pay Slip</button>
										<button type="button" onclick="location.reload();" class="btn btn-secondary">Reset</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
		</div>

		<?php include(APPPATH.'\views\footer.php'); ?>
	</div>
</div>

<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>











