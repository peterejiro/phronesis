<!DOCTYPE html>
<html lang="en">
<head>


	<?php include(APPPATH.'\views\stylesheet.php'); ?>
	<!-- DataTables -->


</head>


<body class="fixed-left">
<!-- Begin page -->
<div id="wrapper">

	<!-- ========== Left Sidebar Start ========== -->
	<?php include(APPPATH.'\views\sidebar.php'); ?>
	<!-- Left Sidebar End -->

	<!-- Start right Content here -->

	<div class="content-page" id="raps">
		<!-- Start content -->
		<div class="content">

			<!-- Top Bar Start -->
			<?php include(APPPATH.'\views\topbar.php'); ?>
			<!-- Top Bar End -->

			<div class="page-content-wrapper">

				<div class="container-fluid">

					<div class="row">
						<div class="col-sm-12">
							<div class="page-title-box">
								<div class="float-right">

								</div>
								<h4 class="page-title">Activity Logs</h4>
							</div>
						</div>
					</div>
					<!-- end page title end breadcrumb -->


					<div class="row">
						<div class="col-md-12 col-xl-12">
							<div class="card">
								<div class="card-body">
									<div class="main-timeline mt-3">

										<?php foreach ($logs as $log):  ?>



										<div class="timeline">
											<span class="timeline-icon"></span>
<!--											<span class="year" style="float: right;">--><?php //$dateTime = new DateTime($log->log_date);
//												echo $dateTime->format("d F Y H:i:s");  ?><!--</span>-->
											<div class="timeline-content">
												<h5 class="title"><?php echo $log->user_name; ?></h5>
												<span class="post"><?php $dateTime = new DateTime($log->log_date);
													echo $dateTime->format("d F Y H:i:s");  ?></span>
												<p class="description">
													<?php echo $log->log_description; ?></p>
											</div>
										</div>

										<?php endforeach; ?>


									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end col -->
				</div> <!-- end row -->

			</div><!-- container -->

		</div> <!-- Page content Wrapper -->

	</div> <!-- content -->

	<?php include(APPPATH.'\views\footer.php'); ?>

</div>
<!-- End Right content here -->

</div>
<!-- END wrapper -->


<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>


<script>

	window.onload = function(){
		document.getElementById("loan_button").style.display='none';
	};
	function reset_form() {
		document.getElementById("loan_form").reset();
		document.getElementById("loan_button").style.display='none';
		document.getElementById("compute_loan").style.display='block';
	}

	function addMonths(date, months) {
		var d = date.getDate();
		date.setMonth(date.getMonth() + +months);
		if (date.getDate() != d) {
			date.setDate(0);
		}
		return date;
	}

	function add_months(){
		var start_month = document.getElementById('start_month').value;
		var start_year = document.getElementById('start_year').value;
		var payroll_month = document.getElementById('payroll_month').value;
		var payroll_year = document.getElementById('payroll_year').value;
		var amount = document.getElementById('amount').value;
		var repayment_amount = document.getElementById('repayment_amount').value;

		var installments = amount/repayment_amount;

		var start_date = new Date(start_year, start_month-1);
		var payroll_date = new Date(payroll_year, payroll_month-1);
		if(start_date <= payroll_date){

			alert("Start date cannot be equal or less than current payroll date");

		} else {
			var date = addMonths(start_date, installments-1);
			var end_year = date.getFullYear();
			var end_month = date.getMonth() + 1;
			const monthNames = ["January", "February", "March", "April", "May", "June",
				"July", "August", "September", "October", "November", "December"
			];
			 var end_month_name = monthNames[date.getMonth()];
			 document.getElementById('end_month').value = end_month;
			 document.getElementById('end_year').value = end_year;
			 document.getElementById('end_year_name').value = end_year;
			 document.getElementById('end_month_name').value = end_month_name;
			 document.getElementById("loan_button").style.display='block';
			 document.getElementById("compute_loan").style.display='none';
	  	}
	}


</script>
