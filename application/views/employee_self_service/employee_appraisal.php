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

		<!-- Main Content -->

		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1>My Appraisals</h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="<?php echo site_url('employee_main'); ?>">Dashboard</a></div>
						<div class="breadcrumb-item">My Appraisals</div>
					</div>
				</div>
				<div class="section-body">
					<div class="section-title">All About Appraisals</div>
					<p class="section-lead">You can manage appraisals here</p>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h4>Your Appraisals</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="datatable-buttons" class="table table-bordered table-striped table-md">
											<thead>
											<tr>
												<th>Supervisor Name</th>
												<th>Appraisal Period</th>
												<th>Status</th>
												<th>Actions</th>
											</tr>
											</thead>
											<tbody>
											<?php if(!empty($appraisals)):
												foreach($appraisals as $appraisal):
													?>
													<tr>
														<td><?php echo $appraisal->employee_last_name." ".$appraisal->employee_first_name; ?></td>
														<td><?php echo date("M Y", strtotime($appraisal->employee_appraisal_period_from))." - ".date("M Y", strtotime($appraisal->employee_appraisal_period_to)) ; ?></td>
														<td>
															<?php if($appraisal->employee_appraisal_status == 0): ?>
																<div class="badge badge-warning">Running</div>
															<?php else:?>
																<div class="badge badge-dark">Finished</div>
															<?php endif;?>
														</td>
														<td class="text-center" style="width: 9px">
															<?php if($appraisal->employee_appraisal_self == 0 ): ?>
                                <div class="dropdown">
                                  <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item has-icon" href="<?php echo site_url('respond_appraisal_self').'/'.$appraisal->employee_appraisal_id; ?>"><i class="fas fa-edit"></i> Respond</a>
                                  </div>
                                </div>
															<?php	else:?>
																<div class="dropdown">
																	<a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
																	<div class="dropdown-menu">
																		<a class="dropdown-item has-icon" href="<?php echo site_url('appraisal_result').'/'.$appraisal->employee_appraisal_id; ?>"><i class="fas fa-file-prescription"></i> View Appraisal Result</a>
																	</div>
																</div>
															<?php endif; ?>
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
	$('title').html('My Appraisals - Phronesis');
</script>









