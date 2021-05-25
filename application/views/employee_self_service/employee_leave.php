

<?php
  include(APPPATH.'/views/stylesheet.php');
  $CI =& get_instance();
  $CI->load->model('hr_configurations');
  $CI->load->model('payroll_configurations');
?>

<body class="layout-3">
<div id="app">
	<div class="main-wrapper container">
		<div class="navbar-bg"></div>
		<?php include('header.php'); ?>
		<?php include('menu.php'); ?>
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1>My Leaves</h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="<?php echo site_url('employee_main'); ?>">Dashboard</a></div>
						<div class="breadcrumb-item">My Leaves</div>
					</div>
				</div>
				<div class="section-body">
					<div class="section-title">All About Leaves</div>
					<p class="section-lead">You can manage your leaves here</p>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h4>My Leaves</h4>
									<div class="card-header-action">
										<button onclick="location.href='<?php echo site_url('request_leave')?>'" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Initiate Leave</button>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="datatable-buttons-2" class="table table-bordered table-striped table-md">
											<thead>
											<tr>
												<th>Leave Type</th>
												<th>Duration</th>
												<th>Start Date</th>
												<th>End Date</th>
												<th>Status</th>
											</tr>
											</thead>
											<tbody>
											<?php if(!empty($leaves)):
												foreach($leaves as $leave):
													?>
													<tr>
														<td><?php echo $leave->leave_name; ?></td>
														<td> <?php
//															$date_diff = strtotime($leave->leave_end_date) - strtotime($leave->leave_start_date);
//															echo round($date_diff/(60*60*24))." days";


															$start = new DateTime($leave->leave_start_date);
															$end = new DateTime($leave->leave_end_date);
															// otherwise the  end date is excluded (bug?)
															$end->modify('+1 day');

															$interval = $end->diff($start);

															// total days
															$days = $interval->days;

															// create an iterateable period of date (P1D equates to 1 day)
															$period = new DatePeriod($start, new DateInterval('P1D'), $end);

															// best stored as array, so you can add more than one
															$holidays = array('2012-09-07');

															foreach($period as $dt) {
																$curr = $dt->format('D');

																// substract if Saturday or Sunday
																if ($curr == 'Sat' || $curr == 'Sun') {
																	$days--;
																}

																// (optional) for the updated question
																elseif (in_array($dt->format('Y-m-d'), $holidays)) {
																	$days--;
																}
															}


															echo $days." days"; // 4


															?></td>

														<td><?php echo date('l, j F Y', strtotime($leave->leave_start_date));?></td>
														<td><?php echo date('l, j F Y', strtotime($leave->leave_end_date));?></td>
														<td>
															<?php if($leave->leave_status == 0): ?>
																<div class="badge badge-warning">Pending</div>
															<?php elseif ($leave->leave_status == 1):?>
																<div class="badge badge-success">Started</div>
															<?php elseif ($leave->leave_status == 2):?>
																<div class="badge badge-success">Finished</div>
															<?php elseif ($leave->leave_status == 3):?>
																<div class="badge badge-danger">Discarded</div>
															<?php endif;?>
														</td>

													</tr>
												<?php
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

		<?php include(APPPATH.'/views/footer.php'); ?>
	</div>
</div>

<?php include(APPPATH.'/views/js.php'); ?>
</body>
</html>
<script>
	$('title').html('My Leave - Phronesis');

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
