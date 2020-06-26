
<!DOCTYPE html>
<html lang="en">
<head>



	<?php include(APPPATH.'\views\stylesheet.php'); ?>
	<!-- DataTables -->


</head>


<body class="fixed-left">
<!-- Begin page -->
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>
		<?php include(APPPATH.'\views\topbar.php'); ?>


		<?php include(APPPATH.'\views\sidebar.php'); ?>



		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1>Activities</h1>

				</div>
				<div class="section-body">

					<div class="row">


						<div class="col-6">
							<div class="activities">

								<?php $count = 0;

								foreach ($logs as $log):
										if($count > 2):
								?>
									<div class="activity moreBox" style="display: none;">

								<?php else: ?>
										<div class="activity">

										<?php endif; ?>


										<div class="activity-icon bg-primary text-white shadow-primary">
											<i class="fas fa-comment-alt"></i>
										</div>
										<div class="activity-detail">
											<div class="mb-2">
												<span class="text-job text-primary"><?php $dateTime = new DateTime($log->log_date);
													echo $dateTime->format("d F Y H:i:s");  ?></span>
												<span class="bullet"></span>
												<a class="text-job" href="#"><?php echo $log->user_name; ?></a>

											</div>
											<p><?php echo $log->log_description; ?></p>
										</div>
									</div>


								<?php
								$count++;
								endforeach; ?>


							</div>

								<button class="btn btn-primary m-b-10 m-l-10 waves-effect waves-light" id="loadMore">
									Load More
								</button>

<!--								<div id="loadMore" style="">-->
<!--									<a href="#">Load More</a>-->
<!--								</div>-->
						</div>
					</div>



				</div>
			</section>
		</div>



	</div>
</div>





<!-- End Right content here -->

</div>
<!-- END wrapper -->


<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>

<script>

	$( document ).ready(function () {
		//$(".moreBox").slice(0, 3).show();
		if ($(".activity:hidden").length != 0) {
			$("#loadMore").show();
		}
		$("#loadMore").on('click', function (e) {
			e.preventDefault();
			$(".moreBox:hidden").slice(0, 6).slideDown();
			if ($(".moreBox:hidden").length == 0) {
				$("#loadMore").fadeOut('slow');
			}
		});
	});

</script>



