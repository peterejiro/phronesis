<!DOCTYPE html>
<html lang="en">
<head>

	<?php include(APPPATH.'/views/stylesheet.php'); ?>

</head>


<body class="fixed-left">
<div id="app">
	<section class="section">
		<div class="container mt-5">
			<div class="page-error">
				<div class="page-inner">
					<h1>Oops</h1>
					<div class="page-description">
						Access Denied.
					</div>
					<div class="page-search">
						<form>
							<div class="form-group floating-addon floating-addon-not-append">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">
											<i class="fas fa-search"></i>
										</div>
									</div>
									<input type="text" class="form-control" placeholder="Search">
									<div class="input-group-append">
										<button class="btn btn-primary btn-lg">
											Search
										</button>
									</div>
								</div>
							</div>
						</form>
						<div class="mt-3">
							<a href="<?php echo base_url() ?>">Back to Home</a>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</section>
</div>


<?php include(APPPATH.'/views/js.php'); ?>




</body>
</html>
