
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


		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1><?php echo $employee->employee_last_name." ".$employee->employee_first_name; ?> Announcements</h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="<?php echo base_url('employee_main'); ?>">Dashboard</a></div>
						<div class="breadcrumb-item">Announcements</div>
					</div>
				</div>
				<div class="section-body">
					<div class="section-title">All About Announcements</div>
					<p class="section-lead">You can view Announcements</p>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h4>Announcements</h4>
									<div class="card-header-action">


									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="datatable-buttons" class="table table-bordered table-striped table-md">
											<thead>
											<tr>

												<th>Announcement Subject</th>
												<th>Announcement Body </th>
												<th>Announcement Date</th>

											</tr>
											</thead>
											<tbody>
											<?php if(!empty($memos)):
												foreach($memos as $memo):
													?>
													<tr>

														<td><?php echo $memo->memo_subject; ?></td>
														<td><?php echo $memo->memo_body; ?></td>

														<td><?php echo date("Y-m-d", strtotime($memo->memo_date));?></td>

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









