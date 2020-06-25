<!DOCTYPE html>
<html lang="en">
    <head>

		<?php include(APPPATH.'\views\stylesheet.php'); ?>

    </head>
	<body>

	<div id="app">
		<section class="section" >
			<div class="d-flex flex-wrap align-items-stretch">
				<div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white" style="height: 100vh">
					<div class="p-4 m-3">

						<img src="<?php echo base_url() ?>/assets/img/stisla-fill.svg" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">

						<h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">Ihumane</span></h4>
						<p class="text-muted">Before you get started, you must login</p>
						<form method="POST" action="<?php echo site_url('login') ?>" class="needs-validation" novalidate="">
							<div class="form-group">
								<label for="email">Username:</label>
								<input class="form-control" name="username" type="text" required="" autocomplete="username" placeholder="Username">

								<div class="invalid-feedback">
									Please fill in your email
								</div>
							</div>

							<div class="form-group">
								<div class="d-block">
									<label for="password" class="control-label">Password</label>
								</div>
								<input class="form-control" name="password" type="password" required="" id="password-field" autocomplete="current-password" placeholder="Password">

								<div class="invalid-feedback">
									please fill in your password
								</div>
							</div>

							<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />


							<?php if($error != ' '): ?>

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
								<a href="#" class="float-left mt-3">
									Forgot Password?
								</a>
								<button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
									Login
								</button>
							</div>


							<div class="text-center mt-5 text-small">
								Copyright &copy; Connexxion Telecom
								<div class="mt-2">
									<a href="#">Privacy Policy</a>
									<div class="bullet"></div>
									<a href="#">Terms of Service</a>
								</div>
							</div>
					</div>
				</div>
				<div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?php echo base_url() ?>assets/img/unsplash/login-bg.jpg" style="height: 100vh;">
					<div class="absolute-bottom-left index-2">
						<div class="text-light p-5 pb-2">
							<div class="mb-5 pb-3">
								<h1 class="mb-2 display-4 font-weight-bold">Good Morning</h1>
								<h5 class="font-weight-normal text-muted-transparent">Abuja, Nigeria</h5>
							</div>

						</div>
					</div>
				</div>
			</div>
		</section>
	</div>




	<?php include(APPPATH.'\views\js.php'); ?>
</body>










</html>
