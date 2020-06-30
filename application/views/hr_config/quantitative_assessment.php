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

					<h1>Quantitative Assessments</h1>

				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-body">




								<table id="datatable-buttons" class="table table-bordered table-md">
									<thead>



									<tr>
										<th>Name of job role</th>
										<th>Department</th>
										<th>Job Description</th>
										<th>Action</th>

									</tr>
									</thead>


									<tbody>
									<?php if(!empty($job_roles)):
										foreach($job_roles as $job_role):
											?>
											<tr>
												<td><?php echo $job_role->job_name; ?></td>
												<td><?php echo $job_role->department_name; ?></td>
												<td><?php echo $job_role->job_description; ?></td>
												<td> <a class="btn btn-primary m-b-10 m-l-10 waves-effect waves-light" href="<?php echo site_url('view_quantitative_assessment')."/".$job_role->job_role_id; ?>">
														<i class="mdi mdi-table-edit "></i> View
													</a>

											</tr>

										<?php

										endforeach;
									endif; ?>

									</tbody>

								</table>




							</div>


						</div>
					</div>


			</section>
		</div>





	</div>
</div>

</div>
<!-- END wrapper -->


<?php include(APPPATH.'\views\js.php'); ?>


</body>
</html>

