<?php include(APPPATH.'\views\stylesheet.php'); ?>

<body>
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>
		<?php include(APPPATH.'\views\topbar.php'); ?>
		<?php include(APPPATH.'\views\sidebar.php'); ?>
		<div class="main-content">
			<section class="section">
				<div class="section-header">
          <div class="section-header-back">
            <a href="<?php echo site_url('user')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
					<h1>New User</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="<?php echo site_url('user')?>">Manage Users</a></div>
            <div class="breadcrumb-item">New User</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Creating Users</div>
          <p class="section-lead">You can complete the form to create a user here</p>
          <div class="row">
            <div class="col-12">
              <form class="needs-validation" novalidate method="post" action="<?php echo site_url('add_user'); ?>">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>New User Form</h4>
                  </div>
                  <div class="card-body">
			              <?php if($error != ' '): ?>
                      <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="mdi mdi-close-circle font-32"></i><strong class="pr-1">Error !</strong> <?php echo $error; ?>.
                      </div>
			              <?php endif; ?>
                    <div class="form-group">
                      <label>User</label><span style="color: red"> *</span>
                      <input type="text" class="form-control"  name="name" required/>
                      <div class="invalid-feedback">
                        please fill in the user's names
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label>Email</label><span style="color: red"> *</span>
                        <input type="email" class="form-control"  name="email" required/>
                        <div class="invalid-feedback">
                          please fill in a valid email
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <label>Username</label><span style="color: red"> *</span>
                        <input type="text" class="form-control"  name="username" required/>
                        <div class="invalid-feedback">
                          please fill in a username
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
                        <label>Password</label><span style="color: red"> *</span>
                        <div class="input-group">
                          <input class="form-control" name="password" type="password" required id="password-field" autocomplete="current-password">
                          <div class="input-group-append">
                            <a class="btn btn-light" onClick="viewPassword()"><i style="padding-top: 70%" id="pass-status" class="fas fa-eye"></i></a>
                          </div>
                        </div>
                        <div class="invalid-feedback">
                          please fill in a password
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <label>Status</label><span style="color: red"> *</span>
                        <select name="status" class="select2 form-control" required>
                          <option value="">-- Select --</option>
                          <option value="1"> Active </option>
                          <option value="0"> Inactive </option>
                        </select>
                        <div class="invalid-feedback">
                          please select a status
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>User Permissions</label>
                      <div class="selectgroup selectgroup-pills">
                        <label class="selectgroup-item">
                          <input type="checkbox" class="selectgroup-input" value="1" name="employee_management">
                          <span class="selectgroup-button">Employee Management</span>
                        </label>
                        <label class="selectgroup-item">
                          <input type="checkbox" class="selectgroup-input" value="1" name="payroll_management">
                          <span class="selectgroup-button">Payroll Management</span>
                        </label>
                        <label class="selectgroup-item">
                          <input type="checkbox" class="selectgroup-input" value="1" name="biometrics">
                          <span class="selectgroup-button">Biometrics</span>
                        </label>
                        <label class="selectgroup-item">
                          <input type="checkbox" class="selectgroup-input" value="1" name="user_management">
                          <span class="selectgroup-button">User Management</span>
                        </label>
                        <label class="selectgroup-item">
                          <input type="checkbox" class="selectgroup-input" value="1" name="configuration">
                          <span class="selectgroup-button">App Configuration</span>
                        </label>
                        <label class="selectgroup-item">
                          <input type="checkbox" class="selectgroup-input" value="1" name="payroll_configuration">
                          <span class="selectgroup-button">Payroll Configuration</span>
                        </label>
                        <label class="selectgroup-item">
                          <input type="checkbox" class="selectgroup-input" value="1" name="hr_configuration">
                          <span class="selectgroup-button">HR Configuration</span>
                        </label>
                      </div>
                    </div>
                    <input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
                    <input type="hidden" name="user_id" value="" />
                  </div>
                  <div class="card-footer text-right bg-whitesmoke">
                    <button type="submit" class="btn btn-primary">Create User</button>
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
<?php include(APPPATH.'\views\footer.php'); ?>
<?php include(APPPATH.'\views\js.php'); ?>
<script>
  function viewPassword() {
    let passwordInput = document.getElementById('password-field');
    let passStatus = document.getElementById('pass-status');
    if (passwordInput.type === 'password') {
      passwordInput.type='text';
      passStatus.className='fas fa-eye-slash';
    } else {
      passwordInput.type='password';
      passStatus.className='fas fa-eye';
    }
  }

  function enablePassword() {
    let passwordInput = document.getElementById('password-field');
    let passwordActive = document.getElementById('pass-active');
    if(passwordInput.disabled == false) {
      passwordInput.value = null;
      passwordInput.disabled = true;
      passwordActive.className = 'mdi mdi-toggle-switch';
    } else {
      passwordInput.disabled = false;
      passwordActive.className = 'mdi mdi-toggle-switch-off';
    }
  }
</script>
</body>
</html>


