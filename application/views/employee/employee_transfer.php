<!DOCTYPE html>
<html lang="en">
<head>

	<?php include(APPPATH.'\views\stylesheet.php');
	$CI =& get_instance();
	$CI->load->model('hr_configurations');

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

					<h1>Employee Transfer</h1>

				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-body">
								<a class="btn btn-secondary btn-round" href="<?php echo base_url('new_employee_transfer') ?>" aria-haspopup="true" aria-expanded="false" style="margin: 5vh">
									<i class="mdi mdi-new-box "></i>New Transfer
								</a>



								<table id="datatable-buttons" class="table table-bordered table-md">
									<thead>



									<tr>
										<th>Name of Employee</th>
										<th> Transfer Type</th>
										<th>From</th>
										<th>To</th>
										<th> Date </th>

									</tr>
									</thead>


									<tbody>
									<?php if(!empty($transfers)):
										foreach($transfers as $transfer):
											?>
											<tr>
												<td><?php echo $transfer->employee_last_name." ".$transfer->employee_first_name; ?></td>
												<td><?php if($transfer->transfer_type == 0){ echo "Inter Branch Transfer"; } if($transfer->transfer_type == 1){ echo "Inter Subsidiary Transfer"; } ; ?></td>

												<td><?php

													if($transfer->transfer_type == 0){ echo $CI->hr_configurations->view_location($transfer->transfer_from)->location_name; } if($transfer->transfer_type == 1){ echo $CI->hr_configurations->view_subsidiary($transfer->transfer_from)->subsidiary_name; }
													 ?></td>
												<td>
													<?php

													if($transfer->transfer_type == 0){ echo $CI->hr_configurations->view_location($transfer->transfer_to)->location_name; } if($transfer->transfer_type == 1){ echo $CI->hr_configurations->view_subsidiary($transfer->transfer_to)->subsidiary_name; }
													?>

													</td>
												<td><?php echo $transfer->transfer_date; ?></td>


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
