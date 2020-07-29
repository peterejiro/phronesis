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
					<h1>New Training</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
			      <div class="breadcrumb-item active"><a href="<?php echo base_url('trainings'); ?>">Training Setup</a></div>
            <div class="breadcrumb-item">New Training</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Creating Trainings</div>
          <p class="section-lead">You can complete the form to create a training here</p>
          <div class="row mt-4">
            <div class="col-12">
              <form method="post" action="<?php echo site_url('add_training'); ?>" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>New Training Form</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="employee-id">Training Name</label><span style="color: red"> *</span>
                      <input id="training_name" type="text" class="form-control"  name="training_name" required/>
                      <div class="invalid-feedback">
                        please fill in a training name
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Training Description</label>
                      <textarea class="summernote-simple" name="training_about"></textarea>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label for="test-duration">Test Duration (In Minutes)</label><span style="color: red"> *</span>
                        <input id="test-duration" name="training_exam_duration" type="number" class="form-control" required/>
                        <div class="invalid-feedback">
                          please fill in the test duration
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <div id="myId" class="dropzone">
                          <div class="dz-message needsclick">
                            <i class="hi text-muted dripicons-cloud-upload"></i>
                            <h3>Drop all relevant training documents/videos here...</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                    <input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
                  </div>
                  <div class="card-footer text-right bg-whitesmoke">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button onclick="location.href='<?php echo site_url('trainings');?>'" class="btn btn-danger" type="button">Go Back</button>
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

  <script>
    $('title').html('New Training - IHUMANE')
    $(document).ready(function() {

      Dropzone.autoDiscover = false;
      let name = new Date().getTime();
      let myDropzone = this;
      $("div#myId").dropzone({
        renameFilename: function (file) {
          return name + '_' + file.name;
          //return newName;
        },
        url: '<?php echo site_url('upload_training_materials'); ?>',
        method: 'post',
        addRemoveLinks: 'true',
        dictRemoveFile: 'Remove',

        success: function (file, response) {
          //file.upload.filename =  name + '_' + file.name;
          $('form').append('<input type="hidden" name="training_materials[]" value="'+ response+'">');
          console.log(response);
        },

        error: function(file, response){
          console.log(response);
        },
        removedfile: function (file) {
          file.previewElement.remove();
  //                    var name = '';
  //                    if (typeof file.file_name !== 'undefined') {
  //                        name = file.file_name
  //                    } else {
  //                        name = uploadedDocumentMap[file.name]
  //                    }
          $('form').find('input[name="training_materials[]"][value="' + name + '_' + file.name + '"]').remove()
        }
      });
    });
  </script>
</body>
</html>




