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
					<h1>Change password</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>

            <div class="breadcrumb-item">Change Password</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">Change Password</div>
          <p class="section-lead">Change Password Here</p>

			<div class="card-body">
				<p class="text-muted">We will send a link to reset your password</p>
				<form method="POST">
					<div class="form-group">
						<label for="email">Email</label>
						<input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
					</div>

					<div class="form-group">
						<label for="password">New Password</label>
						<input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" tabindex="2" required>
						<div id="pwindicator" class="pwindicator">
							<div class="bar"></div>
							<div class="label"></div>
						</div>
					</div>

					<div class="form-group">
						<label for="password-confirm">Confirm Password</label>
						<input id="password-confirm" type="password" class="form-control" name="confirm-password" tabindex="2" required>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
							Reset Password
						</button>
					</div>
				</form>
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




