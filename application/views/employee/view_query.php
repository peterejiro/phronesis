<?php include(APPPATH.'\views\stylesheet.php');
$CI =& get_instance();
$CI->load->model('hr_configurations');
?>

<body>
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>
		<?php include(APPPATH.'\views\topbar.php'); ?>
		<?php include(APPPATH.'\views\sidebar.php'); ?>
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1>View Query</h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
						<div class="breadcrumb-item active"><a href="<?php echo site_url('query_employee').'/'.$employee->employee_id; ?>">Manage Employee Queries</a></div>
						<div class="breadcrumb-item">View Query Activity</div>
					</div>
				</div>

				<div class="section-body">
					<h2 class="section-title">View Query</h2>
					<p class="section-lead">
						You can respond to queries here
					</p>

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4>Queries</h4>
								</div>
								<div class="card-body">
									<a href="#" class="btn btn-primary btn-icon icon-left btn-lg btn-block mb-4 d-md-none" data-toggle-slide="#ticket-items">
										<i class="fas fa-list"></i> All Tickets
									</a>

									<div class="tickets">
										<div class="ticket-items" id="ticket-items">
											<div class="ticket-item active">
												<div class="ticket-title">
													<h4><?php echo $query->query_subject; ?></h4>
												</div>
												<div class="ticket-desc">
													<div><?php echo $employee->employee_first_name." ".$employee->employee_last_name; ?></div>
													<div class="bullet"></div>
													<div><?php echo $query->query_date ?></div>

													<div class="bullet"></div>
													<div><?php if($query->query_status == 1){ echo "Opened"; } if($query->query_status == 0){ echo "Closed"; } ?></div>

												</div>
											</div>

										</div>
										<div class="ticket-content">
											<div class="ticket-header">
												<div class="ticket-sender-picture img-shadow">
													<img src="<?php echo base_url(); ?>uploads/employee_passports/<?php echo $employee->employee_passport; ?>" alt="image">
												</div>
												<div class="ticket-detail">
													<div class="ticket-title">
														<h4><?php echo $query->query_subject; ?></h4>
													</div>
													<div class="ticket-info">
														<div class="font-weight-600"><?php echo $employee->employee_first_name." ".$employee->employee_last_name; ?></div>
														<div class="bullet"></div>
														<div class="text-primary font-weight-600"><?php echo $query->query_date ?></div>
														<div class="bullet"></div>
														<div class="text-primary font-weight-600"><?php if($query->query_status == 1){ echo "Opened"; } if($query->query_status == 0){ echo "Closed"; } ?></div>
														<div class="bullet"></div>
														<?php if($query->query_status == 1):  ?>
														<div class="text-primary font-weight-600">
															<a href="<?php echo site_url('close_query').'/'.$query->query_id ?>"  class="btn btn-icon icon-left btn-primary" style="margin: 5vh">
																<i class="fa fa-trash"></i>Close Query
															</a>

														</div>
														<?php endif; ?>

													</div>
												</div>
											</div>
											<div class="ticket-description">
												<?php echo $query->query_body; ?>



												<div class="ticket-divider"></div>


												<?php
												if(!empty($responses)):

													foreach ($responses as $response): ?>

												<div class="row">
													<?php if($response->query_response_responder_id == 0): ?>
													<div class="col-10 col-md-10 col-lg-10 offset-2">
														<div class="card card-primary">
															<div class="card-header">
																<h4>Your Response - <?php echo $response->query_response_date; ?></h4>
															</div>
															<div class="card-body">
																<p><?php echo $response->query_response_body; ?></p>
															</div>
														</div>
													</div>
													<?php else: ?>
													<div class="col-10 col-md-10 col-lg-10">
														<div class="card card-primary">
															<div class="card-header">
																<h4>Employee Response - <?php echo $response->query_response_date; ?></h4>
															</div>
															<div class="card-body">
																<p><?php echo $response->query_response_body; ?></p>
															</div>
														</div>
													</div>

													<?php endif; ?>

												</div>

												<?php endforeach;
												endif;
												?>



												<?php if($query->query_status == 1):  ?>

												<div class="ticket-form">
													<form action="" id="response_form" method="post">
														<div class="form-group">
															<textarea class="summernote form-control" id="query_response" name="query_response" placeholder="Type a reply ..."></textarea>
															<input type="hidden" name="query_id" id="query_id" value="<?php echo $query->query_id; ?>">
<!--															<input type="hidden" name="--><?php //echo $csrf_name;?><!--"  value="--><?php //echo $csrf_hash;?><!--" />-->
														</div>
														<div class="form-group text-right">
															<button type="button" id="response_button" class="btn btn-primary btn-lg">
																Reply
															</button>
														</div>
													</form>
												</div>

												<?php endif; ?>
											</div>
										</div>
									</div>

							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<?php include(APPPATH.'\views\footer.php'); ?>
<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>

<script>
	$(document).ready(function(){
		$("#response_button").click(function(e){
			e.preventDefault();

			let query_id = $("#query_id").val();
			let query_response = $("#query_response").val();
			let query_responder_id = 0;

			$.ajax({
				type: "GET",
				url: '<?php echo site_url('new_response'); ?>',
				data: {query_id:query_id,query_response:query_response, query_responder_id:query_responder_id},
				success:function(data)
				{
					$("#app").load(location.href + " #app");
				},
				error:function()
				{
					alert(this.error);

					//console.log(this.error);
				}
			});
		});
	});
</script>
