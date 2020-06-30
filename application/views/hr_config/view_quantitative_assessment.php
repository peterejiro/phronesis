<!DOCTYPE html>
<html lang="en">
<head>

	<?php include(APPPATH.'\views\stylesheet.php');

	?>
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

					<h1><?php echo $job_role->job_name." (".$job_role->department_name.")"."Quantitative Assessment Questions " ?></h1>

				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-body">
								<button class="btn btn-secondary btn-round" type="button"data-toggle="modal" data-target="#add_question" aria-haspopup="true" aria-expanded="false" style="margin: 5vh">
									<i class="mdi mdi-new-box "></i>Add New Question
								</button>



								<table id="datatable-buttons" class="table table-bordered table-md">
									<thead>



									<tr>
										<th>S/N</th>
										<th>Questions</th>
										<th>Action</th>

									</tr>
									</thead>


									<tbody>
									<?php $sn = 1; if(!empty($questions)):
										foreach($questions as $question):
											?>
											<tr>
												<td><?php echo $sn; ?></td>
												<td><?php echo $question->quantitative_question; ?></td>

												<td> <button type="button" class="btn btn-primary m-b-10 m-l-10 waves-effect waves-light" data-toggle="modal" data-target="#edit_question<?php echo $question->quantitative_id; ?>">
														<i class="mdi mdi-table-edit "></i>
													</button>
													<button type="button" class="btn btn-danger m-b-10 m-l-10 waves-effect waves-light">
														<i class="mdi mdi-delete-forever "></i>
													</button></td>

											</tr>

										<?php
										$sn++;
										endforeach;
									endif; ?>

									</tbody>

								</table>




							</div>


						</div>
					</div>




		</div>

			</section>
			<div class="modal fade" id="add_question" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle2">Add New question</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true" class="text-dark">&times;</span>
							</button>
						</div>
						<form class="" method="post" action="<?php echo site_url('add_quantitative_assessment'); ?>">
							<div class="modal-body">

								<div class="form-group">
									<label>Question:</label>
									<textarea class="summernote-simple" name="question"> </textarea>

								</div>
								<input type="hidden" name="job_role_id" value="<?php echo $job_role->job_role_id; ?>">

								<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash; ?>">


							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary">Add Question</button>
								<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
							</div>
						</form>
					</div>
				</div>
			</div>


			<?php foreach($questions as $question): ?>
				<div class="modal fade" id="edit_question<?php echo $question->quantitative_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle2">Update question</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true" class="text-dark">&times;</span>
								</button>
							</div>
							<form class="" method="post" action="<?php echo site_url('update_quantitative_assessment'); ?>">
								<div class="modal-body">

									<div class="form-group">
										<label> Question:</label>
										<textarea class="summernote-simple" name="question"> <?php echo $question->quantitative_question; ?></textarea>
									</div>


									<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />

									<input type="hidden" name="question_id" value="<?php echo $question->quantitative_id;?>" />
									<input type="hidden" name="job_role_id" value="<?php echo $question->quantitative_job_role_id; ?>">

								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary">Update question</button>
									<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
								</div>
							</form>
						</div>
					</div>
				</div>

			<?php endforeach; ?>

	</div>
</div>

</div>
<!-- END wrapper -->


<?php include(APPPATH.'\views\js.php'); ?>


</body>
</html>
