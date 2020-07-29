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
            <a href="<?php echo site_url('appraisal_setup')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
					<h1>Self-Assessment Questions</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="<?php echo site_url('appraisal_setup'); ?>">Appraisal Setup</a></div>
            <div class="breadcrumb-item">Self-Assessment Questions</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Self-Assessment Questions</div>
          <p class="section-lead">You can view and add self-assessment questions here</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>All Questions</h4>
                  <div class="card-header-action">
                    <button data-toggle="modal" data-target="#add_question" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Add Question</button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered table-md">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>Questions</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
		                  <?php $sn = 1; if(!empty($questions)):
			                  foreach($questions as $question):
				                  ?>
                          <tr>
                            <td class="text-center" style="width: 9px;"><?php echo $sn; ?></td>
                            <td><?php echo $question->self_appraisee_question; ?></td>
                            <td class="text-center" style="width: 9px">
                              <div class="dropdown">
                                <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item has-icon" href="#" data-toggle="modal" data-target="#edit_question<?php echo $question->self_appraisee_id; ?>"><i class="fas fa-edit"></i>Edit Question</a>
                                </div>
                              </div>
                            </td>
                          </tr>
				                  <?php
				                  $sn++;
			                  endforeach;
		                  endif; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer text-right bg-whitesmoke">
									<button onclick="location.href='<?php echo site_url('appraisal_setup');?>'" class="btn btn-danger" type="button">Go Back</button>
								</div>
              </div>
            </div>
          </div>
        </div>
			</section>
			<div class="modal fade" id="add_question" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle2">Add New Question</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true" class="text-dark">&times;</span>
							</button>
						</div>
						<form class="needs-validation" novalidate method="post" action="<?php echo site_url('add_self_assessment'); ?>">
							<div class="modal-body">
								<div class="form-group">
									<label>Question</label><span style="color: red"> *</span>
									<textarea class="form-control summernote-simple" name="question" required></textarea>
                  <div class="invalid-feedback">
                    please fill in a question
                  </div>
								</div>
								<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
							</div>
							<div class="modal-footer bg-whitesmoke">
								<button type="submit" class="btn btn-primary">Add Question</button>
								<button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<?php foreach($questions as $question): ?>
				<div class="modal fade" id="edit_question<?php echo $question->self_appraisee_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle2">Edit Question</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true" class="text-dark">&times;</span>
								</button>
							</div>
							<form class="needs-validation" novalidate method="post" action="<?php echo site_url('update_self_assessment'); ?>">
								<div class="modal-body">
									<div class="form-group">
										<label>Question</label><span style="color: red"> *</span>
										<textarea class="form-control summernote-simple" name="question" required><?php echo $question->self_appraisee_question; ?></textarea>
                    <div class="invalid-feedback">
                      please fill in a question
                    </div>
									</div>
									<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
									<input type="hidden" name="question_id" value="<?php echo $question->self_appraisee_id;?>" />
								</div>
								<div class="modal-footer bg-whitesmoke">
									<button type="submit" class="btn btn-primary">Edit Question</button>
									<button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
    </div>
  </div>
</div>
<?php include(APPPATH.'/views/footer.php'); ?>
<?php include(APPPATH.'/views/js.php'); ?>
</body>
</html>
<script>
  $('title').html('Self-Assessment Questions - IHUMANE')
</script>