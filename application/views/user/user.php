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
					<h1>Manage Users</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Manage Users</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Managing Users</div>
          <p class="section-lead">You can manage your <b>Phronesis</b> users here</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>All Users</h4>
                  <div class="card-header-action">
                    <button onclick="location.href='<?php echo site_url('new_user');?>'" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Add User</button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-bordered table-striped table-md">
                      <thead>
                      <tr>
                        <th>Username</th>
                        <th>User</th>
						            <th>User Type</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php
                          if(!empty($users)):
                            foreach($users as $user): ?>
                            <tr>
                              <td><?php echo $user->user_username; ?></td>
                              <td><?php echo $user->user_name; ?></td>
                              <td> 
                                <?php 
                                  if($user->user_type == 1){ echo "Administrator"; }
                                  if($user->user_type == 2){ echo "Employee"; }
                                  if($user->user_type == 3){ echo "Moderator"; }
                                ?>
                              </td>
                              <td>
                                <?php $status = $user->user_status;
                                if ($status == 1):?>
                                  <div class="badge badge-success">Active</div>
                                <?php else:?>
                                  <div class="badge badge-danger">Inactive</div>
                                <?php endif;?>
                              </td>
                              <td class="text-center" style="width: 9px">
                                <div class="dropdown">
                                  <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item has-icon btn btn-icon" data-toggle="modal" data-target="#view_user<?php echo $user->user_id ?>"><i class="fas fa-eye"></i>View User</a>
                                    <a class="dropdown-item has-icon" href="<?php echo site_url('manage_user')."/".$user->user_id; ?>"><i class="fas fa-edit"></i>Manage User</a>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <?php
                            endforeach;
                          endif;
                        ?>
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
		<?php foreach($users as $user): ?>
			<div class="modal fade bd-example-modal-lg" id="view_user<?php echo $user->user_id ?>" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="exampleModalLongTitle2">View User</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true" class="text-dark">&times;</span>
							</button>
						</div>
						<form class="" method="post" action="<?php echo site_url('update_user'); ?>">
							<div class="modal-body">
								<div class="form-group">
									<label>User</label>
									<input type="text" class="form-control" disabled name="user_name" value="<?php echo $user->user_name; ?>"/>
								</div>
								<div class="form-group row">
									<div class="col-sm-6">
										<label>Email</label>
										<input type="text" class="form-control" disabled name="user_name" value="<?php echo $user->user_email; ?>"/>
									</div>
									<div class="col-sm-6">
										<label>Username</label>
										<input type="text" class="form-control" disabled name="user_name" value="<?php echo $user->user_username; ?>"/>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-6 input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroup-sizing-normal">Status</span>
										</div>
										<input type="text" disabled value="<?php if($user->user_status == 1){ echo "Active"; } else { echo "Inactive"; } ?>" class="form-control" aria-label="Normal" aria-describedby="inputGroup-sizing-sm">
									</div>
									<div class="col-sm-6 input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroup-sizing-normal">User Type</span>
										</div>
										<input type="text" disabled value="<?php if($user->user_type == 1){ echo "Administrator"; } if($user->user_type == 2){ echo "Employee"; } if($user->user_type == 3){ echo "Moderator"; } ?>" class="form-control" aria-label="Normal" aria-describedby="inputGroup-sizing-sm">
									</div>
								</div>
                <div class="row">
                  <div class="col-12">
                    <div class="jumbotron text-center">
                      <h5>User Permissions</h5>
                      <br>
                      <div>
                        <?php if ($user->employee_management == 1): ?>
                          <div class="badge badge-primary">Employee Management</div>
	                      <?php	endif; ?>
                        <?php if ($user->payroll_management == 1): ?>
                          <div class="badge badge-primary">Payroll Management</div>
                        <?php	endif; ?>
                        <?php if ($user->user_management == 1): ?>
                          <div class="badge badge-primary">User Management</div>
                        <?php	endif; ?>
                        <?php if ($user->biometrics == 1): ?>
                          <div class="badge badge-primary">Biometrics</div>
                        <?php	endif; ?>
                        <?php if ($user->configuration == 1): ?>
                          <div class="badge badge-primary">App Configuration</div>
                        <?php	endif; ?>
                        <?php if ($user->hr_configuration == 1): ?>
                          <div class="badge badge-primary">HR Configuration</div>
                        <?php	endif; ?>
                        <?php if ($user->payroll_configuration == 1): ?>
                          <div class="badge badge-primary">Payroll Configuration</div>
                        <?php	endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
								<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
								<input type="hidden" name="user_id" value="<?php echo $user->user_id;?>" />
							</div>
							<div class="modal-footer bg-whitesmoke">
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
<script>
  $('title').html('Manage Users - Phronesis')
</script>
