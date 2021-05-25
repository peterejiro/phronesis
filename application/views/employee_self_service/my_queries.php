
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
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1>My Queries</h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="<?php echo base_url('employee_main'); ?>">Dashboard</a></div>
						<div class="breadcrumb-item">My Queries</div>
					</div>
				</div>
				<div class="section-body">
					<div class="section-title">All About Queries</div>
					<p class="section-lead">You can manage your queries here</p>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h4>Your Queries</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="datatable-buttons" class="table table-bordered table-striped table-md">
											<thead>
											<tr>
												<th>Query Subject</th>
												<th>Query Type</th>
												<th>Query Date</th>
												<th>Status</th>
												<th>Actions</th>
											</tr>
											</thead>
											<tbody>
											<?php if(!empty($queries)):
												foreach($queries as $query):
													?>
													<tr>
														<td><?php echo $query->query_subject; ?></td>
														<td><?php if($query->query_type == 0) { echo "warning";} if($query->query_type == 1) { echo "query";}  ?></td>
														<td><?php echo date("F j, Y", strtotime($query->query_date));?></td>
														<td>
															<?php if($query->query_status == 1): ?>
																<div class="badge badge-warning">Opened</div>
															<?php elseif ($query->query_status == 0):?>
																<div class="badge badge-success">Closed</div>
															<?php endif;?>
														</td>
														<td class="text-center" style="width: 9px">
															<div class="dropdown">
																<a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
																<div class="dropdown-menu">
																	<a class="dropdown-item has-icon" href="<?php echo site_url('view_my_query').'/'.$query->query_id; ?>"><i class="fas fa-eye"></i>View Query</a>
																</div>
															</div>
														</td>
													</tr>
												<?php endforeach;
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
	$('title').html('My Queries - Phronesis')
</script>









