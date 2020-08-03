
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
					<h1><?php echo $document->hr_document_name; ?></h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="<?php echo base_url('employee_main'); ?>">Dashboard</a></div>
						<div class="breadcrumb-item active"><a href="<?php echo base_url('documents'); ?>">Documents</a></div>
						<div class="breadcrumb-item"><?php echo $document->hr_document_name; ?></div>
					</div>
				</div>
				<div class="section-body">
					<div class="section-title"><?php echo $document->hr_document_name; ?></div>
					<p class="section-lead">View Document here</p>

					<div class="row mt-4">
						<div class="col-12">
							<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
								<div class="card card-primary">
									<div class="card-header">
										<h4><?php echo $document->hr_document_name; ?> </h4>
									</div>
									<div class="card-body">
										<div class="tab-content">
											<div class="tab-pane active p-3" id="personal-information" role="tabpanel">

												<div class="modal-body">
													<div class="form-group">
														<label for="employee-id">Document:</label>
														<input id="training_name" type="text" class="form-control"  name="training_name" value="<?php echo $document->hr_document_name; ?>" disabled  />

													</div>

													<div class="form-group">
														<label for="employee-id">Date Uploaded:</label>
														<input id="training_name" type="text" class="form-control"  name="training_name" value="<?php echo $document->hr_document_date; ?>" disabled  />

													</div>

													<div class="form-group">
														<label for="employee-id">Training Description</label>
														<p class="section-lead"> <?php echo $document->hr_document_description; ?></p>
													</div>

													<iframe
															src="<?php echo base_url()."/uploads/documents/".$document->hr_document_link; ?>?autoplay=false" height="700px" width="100%">
													</iframe>


												</div>

											</div>


										</div>
									</div>

								</div>
							</form>



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









