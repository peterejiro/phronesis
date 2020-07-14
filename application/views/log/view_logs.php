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
					<h1>View Logs</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">View Logs</div>
          </div>
				</div>
				<div class="section-body">
          <div class="section-title">All About User Activities</div>
          <p class="section-lead">You can view user activities here</p>
					<div class="row">
						<div class="col-md-7">
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
												<a class="text-job" href="<?php echo site_url('user');?>"><?php echo $log->user_name; ?></a>
											</div>
											<p><?php echo $log->log_description; ?></p>
										</div>
									</div>
								<?php
								$count++;
								endforeach; ?>
							</div>
								<button class="btn btn-icon icon-left btn-primary" id="loadMore">
                  <i class="fa fa-caret-down"></i> Load More
								</button>
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
</body>
</html>





