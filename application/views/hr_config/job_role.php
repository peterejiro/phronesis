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
					<h1>Job Roles Setup</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Job Roles Setup</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Job Roles Setup</div>
          <p class="section-lead">You can manage job role information here</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>All Job Roles</h4>
                  <div class="card-header-action">
                    <button data-toggle="modal" data-target="#add_job_role" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Add Job Role</button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered table-md">
                      <thead>
                      <tr>
                        <th>Job Role</th>
                        <th>Department</th>
                        <th>Job Description</th>
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
                                  <a class="dropdown-item has-icon" href="#" data-toggle="modal" data-target="#edit_job_role<?php echo $job_role->job_role_id ?>"><i class="fas fa-edit"></i>Edit Job Role</a>
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
		<div class="modal fade" id="add_job_role" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle2">Add New Job Role</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true" class="text-dark">&times;</span>
						</button>
					</div>
					<form class="needs-validation" novalidate method="post" action="<?php echo site_url('add_job_role'); ?>">
						<div class="modal-body">
							<div class="form-group">
								<label>Job Role</label><span style="color: red"> *</span>
								<input type="text" class="form-control"  name="job_role_name" required/>
                <div class="invalid-feedback">
                  please fill in a job role
                </div>
							</div>
							<div class="form-group">
								<label>Department</label><span style="color: red"> *</span>
								<select name="department_id" class="select2 form-control" required style="width: 100%; height:42px !important;">
									<option value="">-- Select --</option>
									<?php foreach($departments as $department): ?>
										<option value="<?php echo $department->department_id; ?>"> <?php echo $department->department_name; ?></option>
									<?php endforeach; ?>
								</select>
                <div class="invalid-feedback">
                  please select a department
                </div>
							</div>
							<div class="form-group">
								<label>Description</label>
								<textarea id="textarea" name="job_description" class="form-control" maxlength="225" rows="3"></textarea>
							</div>
							<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
						</div>
						<div class="modal-footer bg-whitesmoke">
							<button type="submit" class="btn btn-primary">Add Job Role</button>
              <input type="reset" class="btn btn-secondary">
							<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>


		<?php foreach($job_roles as $job_role): ?>
			<div class="modal fade" id="edit_job_role<?php echo $job_role->job_role_id ?>" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle2">Edit Job Role</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true" class="text-dark">&times;</span>
							</button>
						</div>
						<form class="needs-validation" novalidate method="post" action="<?php echo site_url('update_job_role'); ?>">
							<div class="modal-body">
								<div class="form-group">
									<label>Job Role</label><span style="color: red"> *</span>
									<input type="text" class="form-control"  name="job_role_name" required value="<?php echo $job_role->job_name; ?>"/>
                  <div class="invalid-feedback">
                    please fill in a job role
                  </div>
								</div>
								<div class="form-group">
									<label>Department</label><span style="color: red"> *</span>
									<select name="department_id" class="select2 form-control" required style="width: 100%; height:42px !important;">
										<option value="">-- Select --</option>
										<?php foreach($departments as $department): ?>
											<option value="<?php echo $department->department_id; ?>" <?php if($job_role->department_id == $department->department_id){ echo "selected"; } ?>> <?php echo $department->department_name; ?></option>
										<?php endforeach; ?>
									</select>
                  <div class="invalid-feedback">
                    please select a department
                  </div>
								</div>
								<div class="form-group">
									<label>Description</label>
									<textarea id="textarea" name="job_description" class="form-control" maxlength="225" rows="3"> <?php echo $job_role->job_description; ?></textarea>
								</div>
								<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
								<input type="hidden" name="job_role_id" value="<?php echo $job_role->job_role_id;?>" />
							</div>
							<div class="modal-footer bg-whitesmoke">
								<button type="submit" class="btn btn-primary">Edit Job Role</button>
                <input type="reset" class="btn btn-secondary">
								<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<?php include(APPPATH.'/views/footer.php'); ?>
<?php include(APPPATH.'/views/js.php'); ?>
</body>
</html>

