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
					<h1>Training Setup</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Training Setup</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Training Setup</div>
          <p class="section-lead">You can manage training information here</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>All Trainings</h4>
                  <div class="card-header-action">
					          <button onclick="location.href='<?php echo site_url('new_training');?>'" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> New Training</button>
				          </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered table-md">
                      <thead>
                        <tr>
                          <th>Training</th>
							            <th>Training Description</th>
                          <th>Test Duration</th>
							            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
		                  <?php if(!empty($trainings)):
			                  foreach($trainings as $training):
				                  ?>
                          <tr>
                            <td><?php echo $training->training_name; ?></td>
                            <td> <?php echo $training->training_about; ?></td>
                            <td><?php echo $training->training_duration_exam; ?> mins</td>
                            <td class="text-center" style="width: 9px">
                              <div class="dropdown">
                                <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item has-icon" href="<?php echo site_url('edit_training')."/".$training->training_id;?>"><i class="fas fa-edit"></i>Edit Training</a>
																	<a class="dropdown-item has-icon" href="<?php echo site_url('view_training')."/".$training->training_id;?>"><i class="fas fa-eye"></i>View Training</a>
																	<a class="dropdown-item has-icon" href="<?php echo site_url('training_questions')."/".$training->training_id;?>"><i class="fas fa-question"></i>Training Questions</a>
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
<?php include(APPPATH.'/views/footer.php'); ?>
<?php include(APPPATH.'/views/js.php'); ?>
</body>
</html>
<script>
  $('title').html('Training Setup - IHUMANE')
</script>
