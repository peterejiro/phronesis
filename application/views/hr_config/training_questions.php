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
					<h1>Questions Setup</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Questions Setup for <?php echo $training->training_name; ?></div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Training Questions Setup</div>
          <p class="section-lead">You can manage Training Questions here</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>All Questions for <?php echo $training->training_name; ?> </h4>
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
							<th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
		                  <?php if(!empty($training_questions)):
			                  foreach($training_questions as $training_question):
				                  ?>
                          <tr>
                            <td><?php echo $training_question->training_question_question; ?></td>

							  <td> <?php echo "A ->". $training_question->training_question_option_a; ?> <br>
								  <?php echo "B ->". $training_question->training_question_option_b; ?> <br>
								  <?php echo "C ->". $training_question->training_question_option_c; ?> <br>
								  <?php echo "D ->". $training_question->training_question_option_d; ?> <br>



							  </td>
							  <td><?php echo $training_question->training_question_correct; ?></td>
                            <td class="text-center" style="width: 9px">
                              <div class="dropdown">
                                <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                <div class="dropdown-menu">

									<a class="dropdown-item has-icon" data-toggle="modal" data-target="#edit_question<?php echo $training_question->training_question_id; ?>"><i class="fas fa-edit"></i>Edit Question</a>
									<a class="dropdown-item has-icon" href="<?php echo site_url('delete_question')."/".$training_question->training_question_id;?>"><i class="fas fa-edit"></i>Delete Question</a>
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
						<label>Question:</label><span style="color: red"> *</span>
						<textarea class="summernote-simple" required name="training_question"> </textarea>

						<div class="invalid-feedback">
							please fill in a Question
						</div>
					</div>
					<div class="form-group">
						<label>Option A:</label><span style="color: red"> *</span>
						<textarea class="summernote-simple" required name="option_a"> </textarea>

						<div class="invalid-feedback">
							please fill in Option A
						</div>
					</div>
					<div class="form-group">
						<label>Option B:</label><span style="color: red"> *</span>
						<textarea class="summernote-simple" required name="option_b"> </textarea>

						<div class="invalid-feedback">
							please fill in Option B
						</div>
					</div>

					<div class="form-group">
						<label>Option C:</label><span style="color: red"> *</span>
						<textarea class="summernote-simple" required name="option_c"> </textarea>

						<div class="invalid-feedback">
							please fill in Option C
						</div>
					</div>

					<div class="form-group">
						<label>Option D:</label><span style="color: red"> *</span>
						<textarea class="summernote-simple" required name="option_d"> </textarea>

						<div class="invalid-feedback">
							please fill in Option D
						</div>
					</div>

					<div class="form-group">
						<label>Correct Option (Please enter Either A, B, C, or D):</label><span style="color: red"> *</span>
						<input id="correct" type="text" class="form-control"  name="correct" required  />


						<div class="invalid-feedback">
							please fill in Option D
						</div>
					</div>

					<input hidden name="training_id" value="<?php echo $training->training_id ?>">

					<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
				</div>
				<div class="modal-footer bg-whitesmoke">
					<button type="submit" class="btn btn-primary">Add Question</button>
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
							<textarea class="summernote-simple" required name="training_question"> <?php echo $training_question->training_question_question; ?> </textarea>

							<div class="invalid-feedback">
								please fill in a Question
							</div>
						</div>
						<div class="form-group">
							<label>Option A:</label><span style="color: red"> *</span>
							<textarea class="summernote-simple" required name="option_a">  <?php echo $training_question->training_question_option_a; ?> </textarea>

							<div class="invalid-feedback">
								please fill in Option A
							</div>
						</div>
						<div class="form-group">
							<label>Option B:</label><span style="color: red"> *</span>
							<textarea class="summernote-simple" required name="option_b"> <?php echo $training_question->training_question_option_b; ?> </textarea>

							<div class="invalid-feedback">
								please fill in Option B
							</div>
						</div>

						<div class="form-group">
							<label>Option C:</label><span style="color: red"> *</span>
							<textarea class="summernote-simple" required name="option_c"> <?php echo $training_question->training_question_option_c; ?> </textarea>

							<div class="invalid-feedback">
								please fill in Option C
							</div>
						</div>

						<div class="form-group">
							<label>Option D:</label><span style="color: red"> *</span>
							<textarea class="summernote-simple" required name="option_d"> <?php echo $training_question->training_question_option_b; ?> </textarea>

							<div class="invalid-feedback">
								please fill in Option D
							</div>
						</div>

						<div class="form-group">
							<label>Correct Option (Please enter Either A, B, C, or D):</label><span style="color: red"> *</span>
							<input id="correct" type="text" class="form-control" value="<?php echo $training_question->training_question_correct; ?>"  name="correct" required  />


							<div class="invalid-feedback">
								please fill in the correct answer
							</div>
						</div>

						<input hidden name="training_id" value="<?php echo $training->training_id; ?>">
						<input hidden name="question_id" value="<?php echo $training_question->training_question_id; ?>">

						<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
					</div>
					<div class="modal-footer bg-whitesmoke">
						<button type="submit" class="btn btn-primary">Update Question</button>
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
