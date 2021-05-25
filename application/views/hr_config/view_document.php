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
						<a href="<?php echo site_url('hr_documents')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
					</div>
					<h1>View Document</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
						<div class="breadcrumb-item active"><a href="<?php echo base_url('hr_documents'); ?>">Documents Setup</a></div>
            <div class="breadcrumb-item">View Document</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Viewing <?php echo ucwords($document->hr_document_name); ?> Document</div>
          <p class="section-lead">You can view document details here</p>
          <div class="row mt-4">
            <div class="col-12">
              <form>
                <div class="card">
                  <div class="card-header">
                    <h4><?php echo $document->hr_document_name; ?> Document Details</h4>
                  </div>
                  <div class="card-body">
										<div class="form-group">
											<label for="employee-id">Name</label>
											<input id="training_name" type="text" class="form-control"  name="training_name" value="<?php echo $document->hr_document_name; ?>" disabled/>
										</div>
										<div class="form-group">
											<label for="employee-id">Date Uploaded</label>
											<input id="training_name" type="text" class="form-control"  name="training_name" value="<?php echo date('F j, Y g:i a', strtotime($document->hr_document_date));?>" disabled/>
										</div>
										<div class="form-group">
											<label for="employee-id">Description</label>
											<textarea class="form-control" readonly><?php echo $document->hr_document_description; ?></textarea>
										</div>
										<div class="form-group">
											<label>Document</label>
											<embed src="<?php echo base_url()."/uploads/documents/".$document->hr_document_link; ?>" height="700px" width="100%">
										</div>
                  </div>
									<div class="card-footer text-right bg-whitesmoke">
										<button onclick="location.href='<?php echo site_url('hr_documents');?>'" class="btn btn-danger" type="button">Go Back</button>
									</div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
		</div>
  </div>
</div>
<?php include(APPPATH.'/views/footer.php'); ?>
<?php include(APPPATH.'/views/js.php'); ?>
</body>
</html>
<script>
	$('title').html('View Document - Phronesis')
</script>




