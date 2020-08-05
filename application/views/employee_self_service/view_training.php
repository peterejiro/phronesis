

<?php
	include(APPPATH.'/views/stylesheet.php');
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
					<div class="section-header-back">
						<a href="<?php echo site_url('my_trainings')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
					</div>
					<h1>Take Training</h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="<?php echo base_url('employee_main'); ?>">Dashboard</a></div>
						<div class="breadcrumb-item active"><a href="<?php echo base_url('my_trainings'); ?>">My Trainings</a></div>
						<div class="breadcrumb-item">Take Training</div>
					</div>
				</div>
				<div class="section-body">
					<div class="section-title">All About Taking The <?php echo ucwords($training->training_name); ?>  Training</div>
					<p class="section-lead">You can take and complete assigned trainings tests here</p>
					<div class="row">
						<div class="col-12">
							<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
								<div class="card">
									<div class="card-header">
										<h4><?php echo ucwords($training->training_name); ?> Training Details</h4>
										<div class="card-header-action">
											<button type="button" class="btn btn-primary" id="sa-params"><i class="fa fa-edit"></i> Start Test</button>
										</div>
									</div>
									<div class="card-body">
										<p class="form-text text-muted"><?php echo $training->training_about; ?></p>
										<p class="form-text text-muted">Test Duration: <?php echo $training->training_duration_exam; ?> mins</p>
<!--										<button class="btn btn-primary" id="swal-8">Launch</button>-->
										<div class="card" id="uploaded_material">
											<div class="card-header">
												<h4>Uploaded Materials</h4>
											</div>
											<div class="card-body">
												<div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
													<ol class="carousel-indicators">
														<?php if (empty($training_materials)){
														} else {
															$i = 0;
															foreach ($training_materials as $training_material){ ?>
																<li data-target="#carouselExampleIndicators2" data-slide-to="<?php echo $i?>" class="<?php if($i == 0){ echo "active"; } ?>"></li>
																<?php $i++;
															}
														} ?>
													</ol>
													<div class="carousel-inner">
														<?php if(empty($training_materials)){
														} else{
															$i = 0;
															foreach ($training_materials as $training_material){ ?>
																<div class="carousel-item <?php if($i == 0){ echo "active"; } ?>">
																	<embed src="<?php echo base_url()."uploads/trainings/".$training_material->training_material_link; ?>" height="700px" width="100%">
																</div>
																<?php $i++;	} } ?>
													</div>
<!--													<a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">-->
<!--														<span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
<!--														<span class="sr-only">Previous</span>-->
<!--													</a>-->
<!--													<a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">-->
<!--														<span class="carousel-control-next-icon" aria-hidden="true"></span>-->
<!--														<span class="sr-only">Next</span>-->
<!--													</a>-->
												</div>
											</div>
										</div>
										<input type="hidden" name="training_id" value="<?php echo $training->training_id; ?>">
										<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
									</div>
									<div class="card-footer bg-whitesmoke"></div>
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


<script>
	$('title').html('Take Training - IHUMANE')

	$(document).ready(function () {
		$('#sa-params').click(function () {
			swal({
				title: 'Are you sure?',
				text: 'Your Test Will Begin Immediately!',
				icon: 'warning',
				buttons: true,
				dangerMode: true,
			}).then((willDelete) => {
				if (willDelete) {
					var params = [
						'height='+screen.height,
						'width='+screen.width,
						'fullscreen=yes' // only works in IE, but here for completeness
					].join(',');
					//window.location="<?php //echo site_url('start_test')."/".$training->training_id."/".$employee_training_id; ?>//"
					//window.open('<?php //echo site_url('start_test')."/".$training->training_id."/".$employee_training_id; ?>//','name','width=10000,height=400')
					window.open('<?php echo site_url('start_test')."/".$training->training_id."/".$employee_training_id; ?>','popup_window', params)
				} else {
					swal('Test Canceled!', { icon: 'error' });
				}
			});
		});
	});
</script>



