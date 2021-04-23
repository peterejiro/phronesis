<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<meta content="Phronesis Foods" name="description" />
	<meta content="Phronesis Foods" name="author" />

	<title>PHRONESIS</title>
	<!-- General CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/offline/css/offline-language-english.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/offline/css/offline-theme-slide.css">
	<!-- Template CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">
  <style>
    .login-bg-2 { background-image: url("<?php echo base_url() ?>assets/img/unsplash/login-bg-2.jpg"); }
    .login-bg-3 { background-image: url("<?php echo base_url() ?>assets/img/unsplash/login-bg-3.jpg"); }
    .login-bg-4 { background-image: url("<?php echo base_url() ?>assets/img/unsplash/login-bg-4.jpg"); }
    .login-bg-5 { background-image: url("<?php echo base_url() ?>assets/img/unsplash/login-bg-5.jpg"); }
    .login-bg-6 { background-image: url("<?php echo base_url() ?>assets/img/unsplash/login-bg-6.jpg"); }
  </style>
</head>

<body>

	
	
	<div id="app">
		<section class="section">
			<div class="container mt-5">
				<div class="row">
					<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
						<div class="login-brand">
							<img src="<?php echo base_url() ?>/assets/img/phronesis-logo.png" alt="logo" width="100" class="shadow-light rounded-circle">
						</div>
						
						<div class="card card-primary">
							<div class="card-header"><h4>Login</h4></div>
							
							<div class="card-body">
								<form method="POST" action="<?php echo site_url('login') ?>" class="needs-validation" novalidate="">
									<div class="form-group">
										<label for="username">Username</label>
										<input class="form-control" name="username" type="text" required="" autocomplete="username" placeholder="Username" id="username">
										<div class="invalid-feedback">
											Please fill in your username
										</div>
									</div>
									<div class="form-group">
										<div class="d-block">
											<label for="password-field" class="control-label">Password</label>
										</div>
										<input class="form-control" name="password" type="password" required="" id="password-field" autocomplete="current-password" placeholder="Password">
										<div class="invalid-feedback">
											please fill in your password
										</div>
									</div>
									<input type="hidden" name="<?php echo $csrf_name; ?>" value="<?php echo $csrf_hash; ?>" />
									<?php if ($error != ' ') : ?>
										<div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											<i class="mdi mdi-close-circle font-32"></i><strong class="pr-1">Error !</strong> <?php echo $error; ?>.
										</div>
									<?php endif; ?>
									<div class="form-group">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
											<label class="custom-control-label" for="remember-me">Remember Me</label>
										</div>
									</div>
									
									<div class="form-group text-right">
										<a href="<?php echo site_url('forgot_password'); ?>" class="float-left mt-3">
											Forgot Password?
										</a>
										<button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
											Login
										</button>
									</div>
								</form>
								<div class="text-center mt-5 text-muted">
									Copyright &copy; <a href="https://phronesisfoods.ng" target="_blank">Phronesis Foods</a>
									<div class="mt-2">
										<!--									<a href="#">Privacy Policy</a>-->
										<!--									<div class="bullet"></div>-->
										<!--									<a href="#">Terms of Service</a>-->
										<!--									<div class="bullet"></div>-->
										<a href="<?php echo site_url('clock_attendance');?>" target="_blank">Clock In</a>
										<div class="bullet"></div>
										<a href="<?php echo site_url('clockout_attendance');?>" target="_blank">Clock Out</a>
									</div>
								</div>
							
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- General JS Scripts -->
	<script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/modules/popper.js"></script>
	<script src="<?php echo base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/modules/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/stisla.js"></script>
	<script src="<?php echo base_url(); ?>assets/modules/offline/js/offline.min.js"></script>

	<!-- Template JS File -->
	<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
	<script>
		$('title').html('Welcome - Phronesis');

		$(document).ready(function() {
			setInterval(timestamp, 1000);
			let today = new Date();
			let curHr = today.getHours();
      let bgImages = [ 'login-bg-2', 'login-bg-3', 'login-bg-4', 'login-bg-5', 'login-bg-6' ];
      let randomNumber = Math.floor(Math.random() * bgImages.length);
      let randomImage = bgImages[randomNumber];
      $('.bg').addClass(randomImage);
      if (curHr < 12) {
				$('.greeting').html('Good Morning')
			} else if (curHr < 18) {
				$('.greeting').html('Good Afternoon')
			} else {
				$('.greeting').html('Good Evening')
			}
		});

		function timestamp() {
			$.ajax({
				url: '<?php echo site_url('timestamp') ?>',
				success: function(data) {
					$('#timestamp').html(data);
				}
			})
		}
	</script>

</body>

</html>
