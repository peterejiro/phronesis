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
					<h1>Quantitative Assessments</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="<?php echo site_url('appraisal_setup'); ?>">Appraisal Setup</a></div>
            <div class="breadcrumb-item">Quantitative Assessments</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Quantitative Assessments</div>
          <p class="section-lead">You can manage quantitative assessment questions for each job role here</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>All Job Roles</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered table-md">
                      <thead>
                      <tr>
                        <th>Job Role</th>
                        <th>Department</th>
                        <th>Description</th>
                        <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>
		                  <?php if(!empty($job_roles)):
			                  foreach($job_roles as $job_role):
				                  ?>
                          <tr>
                            <td><?php echo $job_role->job_name; ?></td>
                            <td><?php echo $job_role->department_name; ?></td>
                            <td><?php echo $job_role->job_description; ?></td>
                            <td class="text-center" style="width: 9px">
                              <div class="dropdown">
                                <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item has-icon" href="<?php echo site_url('view_quantitative_assessment')."/".$job_role->job_role_id; ?>"><i class="fas fa-eye"></i>View Questions</a>
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
                  <button onclick="location.href='<?php echo site_url('appraisal_setup');?>'" class="btn btn-danger" type="button">Go Back</button>
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
</body>
</html>
<script>
  $('title').html('Quantitative Assessments - IHUMANE')
</script>