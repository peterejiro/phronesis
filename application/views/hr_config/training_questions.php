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
					<h1>Training Questions</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
			  		<div class="breadcrumb-item active"><a href="<?php echo base_url('trainings'); ?>">Training Setup</a></div>
            <div class="breadcrumb-item">Training Questions</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Training Questions For <?php echo ucwords($training->training_name); ?></div>
          <p class="section-lead">You can manage training questions here</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>All Questions For <?php echo ucwords($training->training_name); ?></h4>
                  <div class="card-header-action">
					  				<button data-toggle="modal" data-target="#add_question" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Add Question</button>
				  				</div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered table-md">
                      <thead>
                        <tr>
                          <th>Questions</th>
													<th>Options</th>
                          <th>Correct Answer</th>
													<th>Actions</th>
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
                            <td class="text-center" style="width: 9px">
                              <div class="dropdown">
                                <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                <div class="dropdown-menu">
																	<a class="dropdown-item has-icon" data-toggle="modal" data-target="#edit_question<?php echo $training_question->training_question_id; ?>"><i class="fas fa-edit"></i>Edit Question</a>
																	<a class="dropdown-item has-icon text-danger" href="<?php echo site_url('delete_question')."/".$training_question->training_question_id;?>"><i class="fas fa-trash"></i>Delete Question</a>
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
                <div class="card-footer text-right bg-whitesmoke">
									<button onclick="location.href='<?php echo site_url('trainings');?>'" class="btn btn-danger" type="button">Go Back</button>
								</div>
              </div>
            </div>
          </div>
        </div>
			</section>
    </div>
	</div>
</div>


<div class="modal fade" id="add_question" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle2">Add New Question</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-dark">&times;</span>
				</button>
			</div>
			<form class="needs-validation" novalidate method="post" action="<?php echo site_url('add_question'); ?>">
				<div class="modal-body">
					<div class="form-group">
						<label>Question</label><span style="color: red"> *</span>
						<textarea class="summernote-simple form-control" required name="training_question"></textarea>
						<div class="invalid-feedback">
							please fill in a Question
						</div>
					</div>
					<div class="form-group">
						<label>Option A</label><span style="color: red"> *</span>
						<textarea class="form-control" required name="option_a"></textarea>
						<div class="invalid-feedback">
							please fill in Option A
						</div>
					</div>
					<div class="form-group">
						<label>Option B</label><span style="color: red"> *</span>
						<textarea class="form-control" required name="option_b"></textarea>
						<div class="invalid-feedback">
							please fill in Option B
						</div>
					</div>
					<div class="form-group">
						<label>Option C</label>
						<textarea class="form-control" name="option_c"></textarea>
					</div>
					<div class="form-group">
						<label>Option D</label>
						<textarea class="form-control" name="option_d"></textarea>
					</div>
					<div class="form-group">
						<label class="form-label">Correct Option</label><span style="color: red"> *</span>
						<div class="selectgroup w-100">
							<label class="selectgroup-item">
								<input type="radio" name="correct" value="A" class="selectgroup-input" checked="">
								<span class="selectgroup-button">A</span>
							</label>
							<label class="selectgroup-item">
								<input type="radio" name="correct" value="B" class="selectgroup-input">
								<span class="selectgroup-button">B</span>
							</label>
							<label class="selectgroup-item">
								<input type="radio" name="correct" value="C" class="selectgroup-input">
								<span class="selectgroup-button">C</span>
							</label>
							<label class="selectgroup-item">
								<input type="radio" name="correct" value="D" class="selectgroup-input">
								<span class="selectgroup-button">D</span>
							</label>
						</div>
						<p class="form-text text-muted">Please select a correct option from the available options above</p>
					</div>
					<input hidden name="training_id" value="<?php echo $training->training_id ?>">
					<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
				</div>
				<div class="modal-footer bg-whitesmoke">
					<button type="submit" class="btn btn-primary">Submit</button>
					<input type="reset" class="btn btn-secondary">
					<button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php if(!empty($training_questions)):
foreach($training_questions as $training_question):
?>
	<div class="modal fade" id="edit_question<?php echo $training_question->training_question_id ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle2">Update Question</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" class="text-dark">&times;</span>
					</button>
				</div>
				<form class="needs-validation" novalidate method="post" action="<?php echo site_url('update_question'); ?>">
					<div class="modal-body">
						<div class="form-group">
							<label>Question:</label><span style="color: red"> *</span>
							<textarea class="summernote-simple form-control" required name="training_question"> <?php echo $training_question->training_question_question; ?></textarea>
							<div class="invalid-feedback">
								please fill in a Question
							</div>
						</div>
						<div class="form-group">
							<label>Option A</label><span style="color: red"> *</span>
							<textarea class="form-control" required name="option_a"><?php echo $training_question->training_question_option_a; ?></textarea>
							<div class="invalid-feedback">
								please fill in Option A
							</div>
						</div>
						<div class="form-group">
							<label>Option B</label><span style="color: red"> *</span>
							<textarea class="form-control" required name="option_b"><?php echo $training_question->training_question_option_b; ?></textarea>
							<div class="invalid-feedback">
								please fill in Option B
							</div>
						</div>
						<div class="form-group">
							<label>Option C</label>
							<textarea class="form-control" name="option_c"><?php echo $training_question->training_question_option_c; ?></textarea>
						</div>

						<div class="form-group">
							<label>Option D</label>
							<textarea class="form-control" name="option_d"><?php echo $training_question->training_question_option_d; ?></textarea>
						</div>
						<div class="form-group">
							<label class="form-label">Correct Option</label><span style="color: red"> *</span>
							<div class="selectgroup w-100">
								<label class="selectgroup-item">
									<input type="radio" name="correct" value="A" class="selectgroup-input" <?php echo $training_question->training_question_correct == 'A' ? 'checked' : '' ?>>
									<span class="selectgroup-button">A</span>
								</label>
								<label class="selectgroup-item">
									<input type="radio" name="correct" value="B" class="selectgroup-input" <?php echo $training_question->training_question_correct == 'B' ? 'checked' : '' ?>>
									<span class="selectgroup-button">B</span>
								</label>
								<label class="selectgroup-item">
									<input type="radio" name="correct" value="C" class="selectgroup-input" <?php echo $training_question->training_question_correct == 'C' ? 'checked' : '' ?>>
									<span class="selectgroup-button">C</span>
								</label>
								<label class="selectgroup-item">
									<input type="radio" name="correct" value="D" class="selectgroup-input" <?php echo $training_question->training_question_correct == 'D' ? 'checked' : '' ?>>
									<span class="selectgroup-button">D</span>
								</label>
							</div>
							<p class="form-text text-muted">Please select a correct option from the available options above</p>
						</div>
						<input hidden name="training_id" value="<?php echo $training->training_id; ?>">
						<input hidden name="question_id" value="<?php echo $training_question->training_question_id; ?>">
						<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
					</div>
					<div class="modal-footer bg-whitesmoke">
						<button type="submit" class="btn btn-primary">Submit</button>
						<input type="reset" class="btn btn-secondary">
						<button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php endforeach;
endif;
?>

<?php include(APPPATH.'/views/footer.php'); ?>
<?php include(APPPATH.'/views/js.php'); ?>
</body>
</html>
<script>
	$('title').html('Training Questions - Phronesis')
</script>
