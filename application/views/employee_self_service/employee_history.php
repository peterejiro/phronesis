
<?php
  include(APPPATH.'/views/stylesheet.php');
  $CI =& get_instance();
  $CI->load->model('hr_configurations');
  $CI->load->model('payroll_configurations');
?>

<body class="layout-3">
<div id="app">
	<div class="main-wrapper container">
		<div class="navbar-bg"></div>
		<?php include('header.php'); ?>
		<?php include('menu.php'); ?>
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1>My Activities</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo site_url('employee_main'); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">My Activities</div>
          </div>
				</div>
				<div class="section-body">
					<div class="row">
						<div class="col-6">
							<div class="activities">
								<?php $count = 0;
								if(!empty($histories)):
								foreach ($histories as $history):
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
												<span class="text-job text-primary"><?php $dateTime = new DateTime($history->employee_history_date);
													echo $dateTime->format("d F Y H:i:s");  ?></span>
											</div>
											<p><?php echo $history->employee_history_details; ?></p>
										</div>
									</div>


									<?php
									$count++;
									endforeach; ?>
									<button class="btn btn-primary m-b-10 m-l-10 waves-effect waves-light" id="loadMore">
										Load More
									</button>

								<?php	else:
									 echo "No Activity Yet";

								endif;
									?>
								</div>
							</div>
						</div>
					</div>
			</section>
		</div>
		<?php include(APPPATH.'/views/footer.php'); ?>
	</div>
</div>

<?php include(APPPATH.'/views/js.php'); ?>
</body>
</html>

<script>
	$('title').html('My Activities - Phronesis');

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
