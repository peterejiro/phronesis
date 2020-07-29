
<?php include(APPPATH.'/views/stylesheet.php');
$CI =& get_instance();
$CI->load->model('hr_configurations');
$CI->load->model('payroll_configurations');
$CI->load->model('employees');

?>

<body class="layout-3">
<div id="app">
	<div class="main-wrapper container">
		<div class="navbar-bg"></div>
<!--		--><?php //include('header.php'); ?>
<!---->
<!--		--><?php //include('menu.php'); ?>

		<!-- Main Content -->
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1><?php echo $training->training_name; ?> Assessment </h1>

				</div>
				<div class="section-body">

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h4>Questions</h4>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-12 col-sm-12 col-md-4">
<!--											<div class="countdown-bar" id="countdownID">-->
<!--												<div></div>-->
<!--												<div></div>-->
<!--											</div>-->

											<p id="countdown-a"></p>

											<form action="<?php echo site_url('score_test'); ?>" id="assessment_form" method="post">
											<ul class="nav nav-pills flex-column" id="myTab4" role="tablist">

												<?php $count = 1; foreach ($questions as $question): ?>
												<li class="nav-item">
													<a class="nav-link <?php if($count == 1){ echo "active"; } ?>"  id="question-tab<?php echo $count; ?>" data-toggle="tab" href="#question<?php echo $count; ?>" role="tab" aria-controls="home" aria-selected="true">QUESTION <?php echo $count; ?></a>
												</li>


												<?php $count++; endforeach; ?>
											</ul>
										</div>
										<div class="col-12 col-sm-12 col-md-8">
											<div class="tab-content no-padding" id="myTab2Content">
												<?php $count = 1; $count_questions = count($questions); foreach ($questions as $question): ?>
												<div class="tab-pane fade <?php if($count == 1){ echo "fade show active"; } ?>" id="question<?php echo $count; ?>" role="tabpanel" aria-labelledby="question-tab<?php echo $count; ?>">
													<?php echo $question->training_question_question; ?>

													<div class="form-group">
														<label class="d-block">Select One Option</label>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="<?php echo $question->training_question_id ?>" value="A" required >
															<label class="form-check-label" >
																<?php echo $question->training_question_option_a; ?>
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="<?php echo $question->training_question_id ?>" value="B" >
															<label class="form-check-label">
																<?php echo $question->training_question_option_b; ?>
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="<?php echo $question->training_question_id ?>" value="C" >
															<label class="form-check-label" >
																<?php  echo $question->training_question_option_c; ?>
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="<?php echo $question->training_question_id ?>" value="D" >
															<label class="form-check-label" >
															<?php  echo  $question->training_question_option_d; ?>
															</label>
														</div>

													</div>
													<div style="display: <?php if($count == count($questions)){ echo "block";} else{ echo "none"; } ?>; float: right; ">
														<input type="hidden" value="<?php echo $employee_training_id; ?>" name="employee_training_id">
														<input type="hidden" value="<?php echo $training->training_id; ?>" name="training_id">
														<button type="button" id="submit_test" onclick="check()"  class="btn btn-primary">Submit</button>

													</div>


												</div>






													<?php $count++; endforeach; ?>




											</div>
										</div>
										<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />

									</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>


<!--		--><?php //include(APPPATH.'/views/footer.php'); ?>
	</div>
</div>

<?php include(APPPATH.'/views/js.php'); ?>
</body>
</html>

<script>


	function check(){
		swal({
			title: 'Are you sure you want to submit?',
			text: 'Kindly Check to confirm you have answered all questions. All Unanswered Questions would be Scored 0',
			icon: 'warning',
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$('#assessment_form').submit()
			} else {
				swal('Submit Test Canceled!', { icon: 'error' });
			}
		});

	}






</script>




<script>
	var countDownDate = <?php echo $exam_time; ?>;
	var seconds = countDownDate * 60;
	var x = setInterval(function() {
		seconds = seconds - 1;

		document.getElementById("countdown-a").innerHTML =  seconds + "s ";

		var minutes = seconds/60;

		$.ajax({
			type: "GET",
			url: '<?php echo site_url('update_time'); ?>',
			data: {minutes:minutes},
			success:function(data)
			{

			},
			error:function()
			{

			}
		});



		if(seconds == 0){

			alert("i finished");
			clearInterval(x);
		}
	}, 1000);
</script>






