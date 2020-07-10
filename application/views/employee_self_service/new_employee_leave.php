

<?php include(APPPATH.'\views\stylesheet.php');
$CI =& get_instance();
$CI->load->model('hr_configurations');
$CI->load->model('payroll_configurations');?>

<body class="layout-3">
<div id="app">
	<div class="main-wrapper container">
		<div class="navbar-bg"></div>
		<?php include('header.php'); ?>

		<?php include('menu.php'); ?>

		<!-- Main Content -->

		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<div class="section-header-back">
						<a href="<?php echo site_url()?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
					</div>
					<h1>New Leave</h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
						<div class="breadcrumb-item">New Leave</div>
					</div>
				</div>
				<div class="section-body">
					<div class="section-title">New Leave</div>
					<p class="section-lead">You can fill in the form to start your leave here</p>
				</div>
				<div class="row">
					<div class="col-12">
						<form class="needs-validation" novalidate method="post" action="<?php echo site_url('request_new_leave'); ?>" id="loan_form">
							<div class="card card-primary">
								<div class="card-header">
									<h4>New Leave Form</h4>
								</div>
								<div class="card-body">
									<div class="form-group row">
										<input type="hidden" name="employee_id" value="<?php echo $employee->employee_id; ?>">
										<div class="col-sm-6">
											<label>Leave Type</label><span style="color: red"> *</span>
											<select class="form-control mb-3 custom-select selectric" required name="leave_id">
												<option disabled selected value=""> -- Select -- </option>
												<?php foreach ($leaves as $leave):?>
													<option value="<?php echo $leave->leave_id ?>"> <?php echo $leave->leave_name; ?> </option>
												<?php endforeach; ?>
											</select>
											<div class="invalid-feedback">
												please select a leave type
											</div>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-sm-6">
											<label>Start Date</label><span style="color: red"> *</span>
											<input type="date" class="form-control"  name="start_date" required/>
											<div class="invalid-feedback">
												please fill in a start date
											</div>
										</div>
										<div class="col-sm-6">
											<label>End Date</label><span style="color: red"> *</span>
											<input type="date" class="form-control"  name="end_date" required/>
											<div class="invalid-feedback">
												please fill in an end date
											</div>
										</div>
									</div>
									<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
								</div>
								<div class="card-footer text-right bg-whitesmoke">
									<button type="submit"  class="btn btn-primary">Add Leave</button>
									<button onclick="location.href='<?php echo site_url();?>'" class="btn btn-danger" type="button">Go Back</button>
								</div>
							</div>
						</form>
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
<script>
	$(document).ready(function() {
		setInterval(timestamp, 1000);
		function timestamp() {
			$.ajax({
				url: '<?php echo site_url('timestamp')?>',
				success: function (data) {
					$('#timestamp').html(data);
				}
			})
		}
	});
</script>
