<?php
  include(APPPATH.'/views/stylesheet.php');
  $CI =& get_instance();
  $CI->load->model('hr_configurations');
  $CI->load->model('employees');
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
						<a href="<?php echo site_url('employee_trainings')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
					</div>
					<h1>Employee Test Result</h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="<?php echo base_url('') ?>">Dashboard</a></div>
						<div class="breadcrumb-item active"><a href="<?php echo base_url('employee_trainings') ?>">Employee Trainings</a></div>
						<div class="breadcrumb-item">Employee Test Result</div>
					</div>
				</div>
				<div class="section-body">
					<div class="section-title">All About Employee Test Results</div>
					<p class="section-lead">You can view and print employee test results here here</p>
					<div class="invoice">
						<div class="invoice-print" id="results">
							<div class="row">
								<div class="col-lg-12">
									<div class="invoice-title">
										<h3>Test Result</h3>
									</div>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-md-12">
									<div class="section-title">Test Name</div>
									<p class="section-lead"><?php echo $employee_training->training_name; ?></p>
									<hr>
									<div class="section-title">Test Description</div>
									<p class="section-lead"><?php echo $employee_training->training_about; ?></p>
									<hr>
									<div class="section-title">Employee</div>
									<p class="section-lead"><?php echo $employee_training->employee_first_name." ".$employee_training->employee_last_name; ?></p>
									<hr>
									<div class="section-title">Score</div>
									<p class="section-lead"><?php echo $employee_training->employee_training_score."%"; ?></p>
									<hr>
									<div class="section-title">Date</div>
									<p class="section-lead"><?php echo date('F j, Y g:i a', strtotime($employee_training->employee_training_date)); ?></p>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="text-md-right">
						<div class="float-lg-left mb-lg-0 mb-3">
							<button class="btn btn-danger btn-icon icon-left" onclick="location.href='<?php echo site_url('employee_trainings');?>'"><i class="fas fa-times"></i> Cancel</button>
						</div>
						<button class="btn btn-warning btn-icon icon-left" onclick="printDiv()"><i class="fas fa-print"></i> Print</button>
					</div>
				</div>
		</div>
	</div>
</div>
<?php include(APPPATH.'/views/footer.php'); ?>
<?php include(APPPATH.'/views/js.php'); ?>
</body>
</html>
<script>
  $('title').html('Employee Test Result - IHUMANE');
  function printDiv() {

	  $("#results").printThis({

		  header: null,               // prefix to html
		  footer: null,               // postfix to html

	  });
	  // var divContents = document.getElementById("results").innerHTML;
	  // var a = window.open('', '', 'height=500, width=500');
	  // a.document.write('<html>');
	  // a.document.write('<body > <h1>Appraisal Results <br>');
	  // a.document.write(divContents);
	  // a.document.write('</body></html>');
	  // a.document.close();
	  // a.print();
  }

</script>
