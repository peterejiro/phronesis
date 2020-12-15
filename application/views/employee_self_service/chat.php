
<?php
	include(APPPATH.'/views/stylesheet.php');
	$CI =& get_instance();
	$CI->load->model('hr_configurations');
	$CI->load->model('chats');
	$CI->load->model('employees');
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
					<h1>Chat</h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="<?php echo base_url('employee_main'); ?>">Dashboard</a></div>
						<div class="breadcrumb-item">Chat</div>
					</div>
				</div>
				<div class="section-body">
					<div class="section-title">All About Chat Engagements</div>
					<p class="section-lead">You can chat with your colleagues here</p>
					<div class="row" id="chat-tab">
					<div class="col-12 col-sm-12 col-lg-4" >
						<div class="card">
							<div class="card-header">
								<h4>All Users</h4> <br>

									<input id="search_users" class="form-control" type="search" placeholder="Search Users" aria-label="Search" data-width="250">

							</div>

							<div class="card-body" style="height: 400px; overflow-y: auto;" >
								<ul class="list-unstyled list-unstyled-border" id="user_lists">
									<?php foreach ($users as $user):
									if($user->user_type == 3 || $user->user_type == 2):
									//if(!empty($user->user_token)):
									$employee_details = @$this->employees->get_employee_by_unique($user->user_username);
									if($employee_details->employee_id !== $employee_id):
										if($employee_details->employee_status == 1 || $employee_details->employee_status == 2):
									?>
									<?php if(!empty($user->user_token)): ?>
									<?php if(time() - @$user->user_token < 1800): ?>
								<li class="media">
									<a class="link" href="#" data-rel="<?php echo $employee_details->employee_id; ?>">
                    <div class="media">
                      <img alt="image" class="mr-3 rounded" width="30" height="30" src="<?php echo base_url(); ?>uploads/employee_passports/<?php echo $employee_details->employee_passport; ?>">
                      <div class="media-body">
                        <div class="mt-0 mb-1 font-weight-bold"><?php echo $employee_details->employee_first_name." ". $employee_details->employee_last_name; ?></div> <div class="text-success text-small font-600-bold"><i class="fas fa-circle"></i> Online</div>
                      </div>
                    </div>
									</a>
								</li>
									<?php
												endif;
												endif;
											endif;
										endif;
										//endif;
										endif;
										endforeach; ?>

									<?php foreach ($users as $user):
										if($user->user_type == 3 || $user->user_type == 2):
											//if(!empty($user->user_token)):
											$employee_details = @$this->employees->get_employee_by_unique($user->user_username);
											if($employee_details->employee_id !== $employee_id):
												if($employee_details->employee_status == 1 || $employee_details->employee_status == 2):
													?>
													<?php if(!empty($user->user_token)):
																if(time() - @$user->user_token > 1800): ?>
																	<li class="media">
																		<a class="link" href="#" data-rel="<?php echo $employee_details->employee_id; ?>">
																			<div class="media">
																				<img alt="image" class="mr-3 rounded" width="30" height="30" src="<?php echo base_url(); ?>uploads/employee_passports/<?php echo $employee_details->employee_passport; ?>">
																				<div class="media-body">
																					<div class="mt-0 mb-1 font-weight-bold"><?php echo $employee_details->employee_first_name." ". $employee_details->employee_last_name; ?></div><div class="text-small font-weight-600 text-muted"><i class="fas fa-circle"></i> Offline</div>
																				</div>
																			</div>
																		</a>
																	</li>
																<?php
																endif;
														else: ?>

															<li class="media">
																<a class="link" href="#" data-rel="<?php echo $employee_details->employee_id; ?>">
																	<div class="media">
																		<img alt="image" class="mr-3 rounded" width="30" height="30" src="<?php echo base_url(); ?>uploads/employee_passports/<?php echo $employee_details->employee_passport; ?>">
																		<div class="media-body">
																			<div class="mt-0 mb-1 font-weight-bold"><?php echo $employee_details->employee_first_name." ". $employee_details->employee_last_name; ?></div> <div class="text-success text-small font-600-bold"><div class="text-small font-weight-600 text-muted"><i class="fas fa-circle"></i> Offline</div>
																		</div>
																	</div>
																</a>
															</li>
													<?php	endif;
													endif;
											endif;
											//endif;
										endif;
									endforeach; ?>


								</ul>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-12 col-lg-8">
						<div class="content-container" style="display: none">
							<?php foreach ($users as $user):
								if($user->user_type == 3 || $user->user_type == 2):
										$employee_details = @$CI->employees->get_employee_by_unique($user->user_username);
										?>
									<div id="<?php echo $employee_details->employee_id; ?>">
										<div class="card chat-box" style="height: 470px">
											<div class="card-header">
												<h4>Chat with <?php echo $employee_details->employee_first_name." ". $employee_details->employee_last_name; ?></h4>
												<?php if(!empty($user->user_token)): ?>
												<?php if(time() - @$user->user_token < 1800): ?>
													<div class="text-success text-small font-600-bold"><i class="fas fa-circle"></i> Online</div>
												<?php endif; ?>
												<?php if(time() - @$user->user_token >= 1800): ?>
													<div class="text-small font-weight-600 text-muted"><i class="fas fa-circle"></i> Offline</div>
												<?php endif; ?>

												<?php else: ?>
												<div class="text-small font-weight-600 text-muted"><i class="fas fa-circle"></i> Offline</div>
												<?php endif; ?>
											</div>
											<div class="card-body chat-content" id="chat_contents<?php echo $employee_details->employee_id; ?>"></div>


											<div class="card-footer chat-form">
												<form class="forme"  id="<?php echo $employee_details->employee_id; ?>">
<!--													<textarea class="form-control" id="message--><?php //echo $employee_details->employee_id; ?><!--"  placeholder="Type a message ..."></textarea>-->
<!--													<textarea type="textbox" data-emoji-input="unicode" class="form-control" placeholder="Input field" data-emojiable="true"></textarea>-->
													<p class="lead emoji-picker-container"></p><input type="text" id="message<?php echo $employee_details->employee_id; ?>" class="form-control" data-emoji-input="unicode" data-emojiable="true" placeholder="Type a message">
													<button type="button" onclick="send_message(<?php echo $employee_id; ?>, <?php echo $employee_details->employee_id; ?>)" class="btn btn-primary">
														<i class="far fa-paper-plane"></i>
													</button>
												</form>
											</div>
										</div>
									</div>
									<?php
								endif;
							endforeach; ?>
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
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
</body>
</html>


<script>
	$('title').html('Chat - IHUMANE')

	$(document).ready(function(){

		$("#search_users").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#user_lists li").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});

		$(function() {
			// Initializes and creates emoji set from sprite sheet
			window.emojiPicker = new EmojiPicker({
				emojiable_selector: '[data-emojiable=true]',
				assetsPath: 'http://onesignal.github.io/emoji-picker/lib/img/',
				popupButtonClasses: 'fa fa-smile-o'
			});
			// Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
			// You may want to delay this step if you have dynamically created input fields that appear later in the loading process
			// It can be called as many times as necessary; previously converted input fields will not be converted again
			window.emojiPicker.discover();
		});

		$(".link").click(function(e) {
			e.preventDefault();
			$('.content-container').fadeIn('slow');
			$('#' + $(this).data('rel')).siblings().hide();
			$('#' + $(this).data('rel')).fadeIn('slow');
			$("html, body").animate({ scrollTop: $(document).height() }, 1000);
			var chat_id = $('#chat_contents'+$(this).data('rel'));
			$(chat_id).scrollTop($(chat_id)[0].scrollHeight);


			//window.scrollTo(0,document.getElementById(chat_id).scrollHeight);
		});

		// $(window).keydown(function(event){
		// 	if(event.keyCode === 13) {
		// 		event.preventDefault();
		//
		//
		//
		//
		// 		//return false;
		// 	}
		// });

			$('.forme').submit(function (e){
				e.preventDefault();
				//event.preventDefault();
				var sender = <?php echo $employee_id; ?>;
				var reciever_id = $(this).attr('id');
				send_message(sender, reciever_id);

				// $('.content-container').fadeIn('slow');
				// $('#' + reciever_id).siblings().hide();
				// $('#' + reciever_id).fadeIn('slow');
				// var chat_id = $('#chat_contents'+reciever_id);
				// $(chat_id).scrollTop($(chat_id)[0].scrollHeight);
				//$("html, body").animate({ scrollTop: $(document).height() }, 1000);
				//var chat_id = $('#chat_contents'+reciever_id);
				//$(chat_id).scrollTop($(chat_id)[0].scrollHeight);
			});

		setInterval(timestamp, 1000);
		function timestamp() {
			<?php foreach ($users as $user):
			if($user->user_type == 2 || $user->user_type == 3):
			$employee_details = @$CI->employees->get_employee_by_unique($user->user_username); ?>
			var sender_ids = <?php echo $employee_id; ?>;
			var reciever_ids = <?php echo $employee_details->employee_id; ?>;
			$.ajax({
				type: "GET",
				url: '<?php echo site_url('get_chats'); ?>',
				data: {sender_id:sender_ids, reciever_id:reciever_ids},
				success:function(data)
				{

				$('#chat_contents<?php echo $employee_details->employee_id; ?>').html(data);
					//var chat_id = 'chat_contents'+<?php //echo $employee_details->employee_id; ?>//;
					var chat_id = $('#chat_contents'+reciever_ids);
					$(chat_id).scrollTop($(chat_id)[0].scrollHeight);
					//window.scrollTo(0,document.getElementById(chat_id).scrollHeight);
				},
				error:function()
				{
					//alert(this.error);

				}
			});

			<?php endif;
			endforeach; ?>

			//$("#user_lists").load(location.href + " #user_lists);
		}



	});

	function send_message(sender_id, reciever_id) {


			$(document).ready(function () {
				var message = document.getElementById('message'+reciever_id).value;
				document.getElementById('message'+reciever_id).value = "";
				$.ajax({
					type: "GET",
					url: '<?php echo site_url('send_chat'); ?>',
					data: {sender_id:sender_id, reciever_id:reciever_id, message:message},
					success:function(data)
					{
						document.getElementById('message'+reciever_id).value = "";
						var chat_id = $('#chat_contents'+reciever_id);
						$(chat_id).scrollTop($(chat_id)[0].scrollHeight);
					},
					error:function()
					{
						// alert(this.error);

						//console.log(this.error);
					}
				});

				<?php foreach ($users as $user):
				if($user->user_type == 2 || $user->user_type == 3):

				$employee_details = @$CI->employees->get_employee_by_unique($user->user_username); ?>

				$.ajax({
					type: "GET",
					url: '<?php echo site_url('get_chats'); ?>',
					data: {sender_id:sender_id, reciever_id:reciever_id, message:message},
					success:function(data)
					{

						document.getElementById('chat_contents'+reciever_id).innerHTML = data;
						var chat_id = $('#chat_contents'+reciever_id);
						$(chat_id).scrollTop($(chat_id)[0].scrollHeight);

					},
					error:function()
					{
						// alert(this.error);

						//console.log(this.error);
					}
				});



				<?php endif;
				endforeach; ?>





			})


	}

</script>









