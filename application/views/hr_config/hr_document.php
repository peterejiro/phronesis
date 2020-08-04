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
					<h1>Documents Setup</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Documents Setup</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Documents Setup</div>
          <p class="section-lead">You can manage Document information here</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>All Documents</h4>
                  <div class="card-header-action">
                    <button data-toggle="modal" data-target="#add_document" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Add Document</button>
                  </div>
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

											  <a class="dropdown-item has-icon" href="<?php echo site_url('view_hr_document').'/'.$document->hr_document_id; ?>"><i class="fas fa-edit"></i>View Document</a>

											  <div class="dropdown-divider"></div>
											  <a class="dropdown-item has-icon text-danger" href="<?php echo site_url('delete_hr_document').'/'.$document->hr_document_id; ?>"><i class="fas fa-times"></i>Delete Document</a>

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
		<div class="modal fade" id="add_document" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle2">Add New Document</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true" class="text-dark">&times;</span>
						</button>
					</div>
					<form class="needs-validation" novalidate method="post" action="<?php echo site_url('add_hr_document'); ?>" enctype="multipart/form-data">
						<div class="modal-body">


							<div class="form-group">
								<label>Document Name:</label>
								<input id="document_name" name="document_name" type="text" class="form-control" />


							</div>
							<div class="form-group">
								<label>Document</label><span style="color: red"> *</span>
								<div class="custom-file">
									<input id="document" name="hr_document" class="custom-file-input" type="file" required>
									<label for="document" class="custom-file-label">Choose File</label>
								</div>
								<div class="invalid-feedback">
									please upload a document
								</div>
								<p class="form-text text-muted">Upload document as either .docx, .pdf, .doc, .png, .jpeg, .jpg, .gif </p>

							</div>

							<div class="form-group">
								<label>Description</label>
								<textarea id="textarea" name="document_description" class="form-control" maxlength="225" rows="3"></textarea>
							</div>
							<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
						</div>
						<div class="modal-footer bg-whitesmoke">
							<button type="submit" class="btn btn-primary">Add Document</button>
              					<input type="reset" class="btn btn-secondary">
							<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>



	</div>
</div>
<?php include(APPPATH.'/views/footer.php'); ?>
<?php include(APPPATH.'/views/js.php'); ?>
</body>
</html>
<script>
  $('title').html('Documents Setup - IHUMANE')

  $(".custom-file-input").on('change', function() {
	  let fileName = $(this).val().split('//').pop();
	  $(this).siblings('.custom-file-label').addClass('selected').html(fileName);
  });
</script>
