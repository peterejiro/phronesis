

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
					<h1><?php echo $employee->employee_last_name." ".$employee->employee_first_name; ?> Trainings</h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="<?php echo base_url('employee_main'); ?>">Dashboard</a></div>
						<div class="breadcrumb-item">Trainings</div>
					</div>
				</div>
				<div class="section-body">
					<div class="section-title">All About Your Trainings</div>
					<p class="section-lead">You can view Trainings</p>
					<div class="row">
						<div class="col-12">
							<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
								<div class="card card-primary">
									<div class="card-header">
										<h4><?php echo $training->training_name; ?> </h4>
									</div>

									<div class="card-body">
										<p><?php echo $training->training_about; ?></p>

										<p> Test Duration(In Minutes): <?php echo $training->training_duration_exam; ?> </p>

										<button onclick="location.href='<?php echo site_url('new_employee_training')?>'" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Begin Test</button>
									</div>
									<div class="card-body">
										<div class="tab-content">
											<div class="tab-pane active p-3" id="personal-information" role="tabpanel">

												<div class="modal-body">

													<div class="card" id="uploaded_material">
														<div class="card-header">
															<h4>Uploaded Materials</h4>
														</div>
														<div class="card-body">
															<div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
																<ol class="carousel-indicators">
																	<li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
																	<li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
																	<li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
																</ol>
																<div class="carousel-inner">
																	<?php if(empty($training_materials)){
																	} else{
																		$i = 0;
																		foreach ($training_materials as $training_material){ ?>
																			<div class="carousel-item <?php if($i == 0){ echo "active"; } ?>">
																				<iframe
																					src="<?php echo base_url()."/uploads/trainings/".$training_material->training_material_link; ?>?autoplay=false" height="700px" width="100%">
																				</iframe>
																				<div class="carousel-caption d-none d-md-block">


																				</div>
																			</div>
																			<?php $i++;	} } ?>

																</div>
																<a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
																	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
																	<span class="sr-only">Previous</span>
																</a>
																<a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
																	<span class="carousel-control-next-icon" aria-hidden="true"></span>
																	<span class="sr-only">Next</span>
																</a>
															</div>
														</div>
													</div>


													<input type="hidden" name="training_id" value="<?php echo $training->training_id; ?>">

													<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
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









