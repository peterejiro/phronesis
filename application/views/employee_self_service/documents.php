
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
					<h1>Documents</h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="<?php echo base_url('employee_main'); ?>">Dashboard</a></div>
						<div class="breadcrumb-item">Documents</div>
					</div>
				</div>
				<div class="section-body">
					<div class="section-title">All About Documents</div>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h4>All Documents</h4>

								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="datatable-buttons" class="table table-striped table-bordered table-md">
											<thead>
											<tr>
												<th>Document</th>
												<th>Description</th>
												<th> Date Uploaded</th>
												<th>Actions</th>
											</tr>
											</thead>
											<tbody>
											<?php if(!empty($documents)):
												foreach($documents as $document):
													?>
													<tr>
														<td><?php echo $document->hr_document_name; ?></td>
														<td><?php echo $document->hr_document_description; ?></td>
														<td> <?php echo $document->hr_document_date; ?></td>
														<td class="text-center" style="width: 9px">
															<div class="dropdown">
																<a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
																<div class="dropdown-menu">

																	<a class="dropdown-item has-icon" href="<?php echo site_url('view_document').'/'.$document->hr_document_id; ?>"><i class="fas fa-edit"></i>View Document</a>


																</div>
															</div>
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









