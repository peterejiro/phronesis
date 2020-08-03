
<?php include(APPPATH.'/views/stylesheet.php');
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
					<h1>Appraisal Result</h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="<?php echo base_url('employee_main') ?>">Dashboard</a></div>
						<div class="breadcrumb-item active"><a href="<?php echo base_url('my_trainings') ?>"> Trainings</a></div>
						<div class="breadcrumb-item">Test Result</div>
					</div>
				</div>


				<div class="section-body">
					<div class="invoice">
						<div class="invoice-print" id="results">
							<div class="row mt-4">
								<div class="col-md-12">
									<div class="section-title">Test Name: <?php echo $employee_training->training_name; ?></div>
									<hr>

									<p class="section-lead">About Test: <?php echo $employee_training->training_about; ?></p>
									<hr>
									<p class="section-lead">Employee Name: <?php echo $employee_training->employee_first_name." ".$employee_training->employee_last_name; ?></p>
									<hr>
									<p class="section-lead">Score: <?php echo $employee_training->employee_training_score."%"; ?></p>
									<hr>
									<p class="section-lead">Date: <?php echo $employee_training->employee_training_date; ?></p>



								</div>





								</div>
							</div>



						</div>
						<hr>
						<div class="text-md-right">
							<div class="float-lg-left mb-lg-0 mb-3">

								<button class="btn btn-danger btn-icon icon-left" onclick="location.href='<?php echo site_url('my_trainings');?>'"><i class="fas fa-times"></i> Cancel</button>
							</div>
							<button class="btn btn-warning btn-icon icon-left" onclick="printDiv()"><i class="fas fa-print"></i> Print</button>
						</div>
					</div>
				</div>
			</section>
		</div>

		<?php include(APPPATH.'/views/footer.php'); ?>
	</div>
</div>

<?php include(APPPATH.'/views/js.php'); ?>
</body>
</html>


<script>
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









