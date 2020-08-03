<?php include(APPPATH.'/views/stylesheet.php'); ?>
<body>
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>
		<?php include(APPPATH.'/views/topbar.php'); ?>
		<?php include(APPPATH.'/views/sidebar.php'); ?>
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<div class="section-header-back">
						<a href="<?php echo site_url('trainings')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
					</div>
					<h1>View Training</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
			  		<div class="breadcrumb-item active"><a href="<?php echo base_url('trainings'); ?>">Training Setup</a></div>
            <div class="breadcrumb-item">View Training</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Viewing <?php echo ucwords($training->training_name); ?> Trainings</div>
          <p class="section-lead">You can view all details about a training here</p>
          <div class="row mt-4">
            <div class="col-12">
              <form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="card card-primary">
                  <div class="card-header">
                    <h4><?php echo ucwords($training->training_name); ?> Training Details</h4>
                  </div>
                  <div class="card-body">
										<div class="form-group">
											<label for="employee-id">Training Name</label>
											<input id="training_name" type="text" class="form-control"  name="training_name" value="<?php echo $training->training_name; ?>" readonly/>
										</div>
										<div class="form-group">
											<label for="employee-id">Training Description</label>
											<textarea class="summernote-simple form-control" readonly name="training_about"> <?php echo $training->training_about; ?></textarea>
										</div>
										<div class="form-group row">
											<div class="col-sm-6">
												<label for="test-duration">Test Duration (In Minutes)</label>
												<input id="test-duration" readonly name="training_exam_duration" value="<?php echo $training->training_duration_exam; ?>" type="number" class="form-control"/>
											</div>
										</div>
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
									<div class="card-footer text-right bg-whitesmoke">
										<button onclick="location.href='<?php echo site_url('trainings');?>'" class="btn btn-danger" type="button">Go Back</button>
									</div>
                </div>
              </form>
							<div class="row">
								<div class="col-12">
									<div class="card">
										<div class="card-header">
											<h4>All Questions for <?php echo ucwords($training->training_name); ?> </h4>
										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table id="datatable-buttons-2" class="table table-striped table-bordered table-md">
													<thead>
													<tr>
														<th>Questions</th>
														<th>Options</th>
														<th>Correct Answer</th>
													</tr>
													</thead>
													<tbody>
													<?php if(!empty($training_questions)):
														foreach($training_questions as $training_question):
															?>
															<tr>
																<td><?php echo $training_question->training_question_question; ?></td>
																<td>
																	<?php echo "A. ". $training_question->training_question_option_a; ?> <br>
																	<?php echo "B. ". $training_question->training_question_option_b; ?> <br>
																	<?php echo "C. ". $training_question->training_question_option_c; ?> <br>
																	<?php echo "D. ". $training_question->training_question_option_d; ?> <br>
																</td>
																<td><?php echo $training_question->training_question_correct; ?></td>
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
          </div>
        </div>
      </section>
		</div>
  </div>
</div>

<?php include(APPPATH.'/views/footer.php'); ?>
<?php include(APPPATH.'/views/js.php'); ?>

  <script>
		$('title').html('View Training - IHUMANE')
  </script>
</body>
</html>




