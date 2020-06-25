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
					<h1>Payroll Month and Year</h1>
				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">




						<div class="card">
							<div class="card-body">


								<?php if(empty($payroll_years)): ?>

									<button class="btn btn-secondary btn-round" type="button"data-toggle="modal" data-target="#add_payroll" aria-haspopup="true" aria-expanded="false" style="margin: 5vh">
										<i class="mdi mdi-new-box "></i>Set Up payroll Month Year
									</button>

								<?php endif; ?>



								<table id="datatable-buttons" class="table table-bordered table-md">

									<thead>



									<tr>
										<th>Month and Year</th>
										<th>Action</th>

									</tr>
									</thead>


									<tbody>
									<?php if(!empty($payroll_years)):
										foreach($payroll_years as $payroll_year):
											?>
											<tr>
												<td><?php echo $payroll_year->payroll_month_year_year." ".date("F", mktime(0, 0, 0, $payroll_year->payroll_month_year_month, 10)); ?></td>
												<td> <button type="button" class="btn btn-primary m-b-10 m-l-10 waves-effect waves-light" data-toggle="modal" data-target="#edit_payroll<?php echo $payroll_year->payroll_month_year_id; ?>">
														<i class="mdi mdi-table-edit "></i>
													</button>


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

<div class="modal fade" id="add_payroll" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle2">Add New payroll</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-dark">&times;</span>
				</button>
			</div>
			<form class="" method="post" action="<?php echo site_url('add_payroll_month_year'); ?>">
				<div class="modal-body">

					<div class="form-group">
						<label>Year of payroll:</label>

						<select class="select form-control mb-3 custom-select" id="payment_definition" required name="payroll_month_year_year" style="width: 100%; height:56px;">
							<option> -- Select -- </option>

							<option value="<?php echo date("Y"); ?>"> <?php echo date("Y"); ?> </option>



						</select>
					</div>

					<div class="form-group">
						<label>Month of payroll:</label>


						<select class="select form-control mb-3 custom-select" id="payment_definition" required name="payroll_month_year_month" style="width: 100%; height:56px;">
							<option> -- Select -- </option>

							<option value="<?php echo date('n', strtotime('-1 day', strtotime(date('Y-m-01'))));  ?>"> <?php echo date('F', strtotime('-1 day', strtotime(date('Y-m-01'))));  ?> </option>


							<option value="<?php echo date("n"); ?>"> <?php echo date("F"); ?> </option>



						</select>
					</div>

					<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />


				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Add New Year and Month </button>
					<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>


<?php
if(!empty($payroll_years)):
	foreach($payroll_years as $payroll_year): ?>
		<div class="modal fade" id="edit_payroll<?php echo $payroll_year->payroll_month_year_id ?>" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle2">Update payroll</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true" class="text-dark">&times;</span>
						</button>
					</div>
					<form class="" method="post" action="<?php echo site_url('update_payroll_month_year'); ?>">
						<div class="modal-body">

							<div class="form-group">
								<label>Year of payroll:</label>

								<select class="selectric form-control mb-3 custom-select" id="payment_definition" required name="payroll_month_year_year" style="width: 100%; height:56px;">
									<option> -- Select -- </option>

									<option value="<?php echo date("Y"); ?>"> <?php echo date("Y"); ?> </option>



								</select>
							</div>

							<div class="form-group">
								<label>Month of payroll:</label>


								<select class="selectric form-control mb-3 custom-select" id="payment_definition" required name="payroll_month_year_month" style="width: 100%; height:56px;">
									<option> -- Select -- </option>

									<option value="<?php echo date('n', strtotime('-1 day', strtotime(date('Y-m-01'))));  ?>"> <?php echo date('F', strtotime('-1 day', strtotime(date('Y-m-01'))));  ?> </option>


									<option value="<?php echo date("n"); ?>"> <?php echo date("F"); ?> </option>



								</select>
							</div>





							<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
							<input type="hidden" name="payroll_month_year_id" value="<?php echo $payroll_year->payroll_month_year_id; ?>">



						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Add New Year and Month </button>
							<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
						</div>
					</form>	</div>
			</div>
		</div>

	<?php endforeach;
endif;
?>



<!-- End Right content here -->

</div>
<!-- END wrapper -->


<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>

