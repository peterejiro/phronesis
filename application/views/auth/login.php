<!DOCTYPE html>
<html lang="en">
    <head>

		<?php include(APPPATH.'\views\stylesheet.php'); ?>

    </head>


    <body class="fixed-left">
        <!-- Begin page -->
        <!--<div class="accountbg"></div>-->
        <div id="stars"></div>
        <div id="stars2"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center mt-0">
                        <a href="index.html" class="logo logo-admin">
<!--							<img src="assets/images/logo.png" height="20" alt="logo">-->
							<h3 class="text-center">IHUMANE</h3>
						</a>
                    </h3>

                    <h6 class="text-center">Sign In</h6>

                    <div class="p-3">
                        
                        <form class="form-horizontal" method="post" action="<?php echo site_url('login') ?>">

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" name="username" type="text" required="" autocomplete="username" placeholder="Username">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
									<div class="input-group">
										<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />


										<input class="form-control" name="password" type="password" required="" id="password-field" autocomplete="current-password" placeholder="Password">
										<div class="input-group-addon">
											<span><i id="pass-status" class="fa fa-eye" aria-hidden="true" onClick="viewPassword()"></i></span>

										</div>
									</div>
									      </div>
                            </div>

							<?php if($error != ' '): ?>

							<div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<i class="mdi mdi-close-circle font-32"></i><strong class="pr-1">Error !</strong> <?php echo $error; ?>.
							</div>
							<?php endif; ?>

<!--                            <div class="form-group row">-->
<!--                                <div class="col-12">-->
<!--                                    <div class="custom-control custom-checkbox">-->
<!--                                        <input type="checkbox" class="custom-control-input" id="customCheck1">-->
<!--                                        <label class="custom-control-label" for="customCheck1">Remember me</label>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->

                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button  class="btn btn-danger btn-block waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-sm-7 m-t-20">
                                    <a href="#" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password ?</a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


		<?php include(APPPATH.'\views\js.php'); ?>

	<script>

		function viewPassword() {
			var passwordInput = document.getElementById('password-field');
			var passStatus = document.getElementById('pass-status');
			if (passwordInput.type == 'password')
			{
				passwordInput.type='text';
				passStatus.className='fa fa-eye-slash';
			}
			else
			{
				passwordInput.type='password';
				passStatus.className='fa fa-eye';
			}
		}


	</script>


	</body>
</html>
