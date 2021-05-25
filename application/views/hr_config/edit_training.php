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
					<h1>Update Training</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
			      <div class="breadcrumb-item active"><a href="<?php echo base_url('trainings'); ?>">Training Setup</a></div>
            <div class="breadcrumb-item">Update Training</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Updating Trainings</div>
          <p class="section-lead">You can complete the form to update a training here</p>
          <div class="row mt-4">
            <div class="col-12">
              <form method="post" action="<?php echo site_url('update_training'); ?>" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Update Training Form</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="employee-id">Training Name</label><span style="color: red;"> *</span>
                      <input id="training_name" type="text" class="form-control"  name="training_name" value="<?php echo $training->training_name; ?>" required/>
                      <div class="invalid-feedback">
                        please fill in a training name
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="employee-id">Training Description</label>
                      <textarea class="summernote-simple" name="training_about"><?php echo $training->training_about; ?></textarea>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label for="test-duration">Test Duration (In Minutes)</label><span style="color: red"> *</span>
                        <input id="test-duration" name="training_exam_duration" value="<?php echo $training->training_duration_exam; ?>" type="number" class="form-control" required/>
                        <div class="invalid-feedback">
                          please fill in the test duration
                        </div>
                      </div>
                    </div>
                    <div class="card border-primary" id="uploaded_material">
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
                            <?php if (empty($training_materials)){
                            } else {
                              $i = 0;
                              foreach ($training_materials as $training_material){ ?>
                                <div class="carousel-item <?php if($i == 0){ echo "active"; } ?>">
                                  <embed src="<?php echo base_url()."uploads/trainings/".$training_material->training_material_link; ?>" height="800px" width="100%">
                                  <div class="carousel-caption d-none d-md-block">
                                    <h5>
                                      <button type="button" id="<?php echo $training_material->training_material_id; ?>" onclick="remove_material(<?php echo $training_material->training_material_id; ?>)" class="btn btn-danger btn-lg">
                                        Remove
                                      </button>
                                    </h5>
                                  </div>
                                </div>
                                <?php $i++;
                              }
                            } ?>
<!--                            <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">-->
<!--                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
<!--                              <span class="sr-only">Previous</span>-->
<!--                            </a>-->
<!--                            <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">-->
<!--                              <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
<!--                              <span class="sr-only">Next</span>-->
<!--                            </a>-->
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="show_more">
                      <button type="button" onclick="show_more()" class="btn btn-primary btn-lg">
                        Upload New Materials
                      </button>
                    </div>
                    <div id="new_material" style="display: none;">
                      <div class="form-group row">
                        <div class="col-sm-12">
                          <div id="myId" class="dropzone">
                            <div class="dz-message needsclick">
                              <i class="hi text-muted dripicons-cloud-upload"></i>
                              <h3>Drop all  relevant Training documents/videos here...</h3>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="hide_more" style="display: none;">
                      <button type="button" onclick="hide_more()" class="btn btn-danger btn-lg">
                        Cancel Upload
                      </button>
                    </div>
                    <input type="hidden" name="training_id" value="<?php echo $training->training_id; ?>">
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
    $('title').html('Update Training - Phronesis')

	  // window.onload = function(){
		//   // document.getElementById("new_material").style.display='none';
		//   // document.getElementById("hide_more").style.display='none';
    //
	  // }

	  function show_more() {
		  document.getElementById("new_material").style.display = 'block';
		  document.getElementById("hide_more").style.display = 'block';
		  document.getElementById("show_more").style.display = 'none';
	  }

	  function hide_more(){
		  document.getElementById("new_material").style.display='none';
		  document.getElementById("hide_more").style.display='none';
		  document.getElementById("show_more").style.display='block';
	  }

	  function remove_material(id){
	  	let material_id = id;
		  $.ajax({
			  type: "GET",
			  url: '<?php echo site_url('remove_material'); ?>',
			  data: {material_id:material_id},
			  success:function(data)
			  {
				  $("#uploaded_material").load(location.href + " #uploaded_material");
			  },
			  error:function()
			  {
				  alert(this.error);
			  }
		  });
	  }

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




