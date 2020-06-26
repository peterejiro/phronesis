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
					<h1> New Transfer</h1>
				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-body">

								<div class="modal-content">
									<form class="" method="post" action="<?php echo site_url('add_new_employee_transfer'); ?>" id="loan_form">
										<div class="modal-body">

											<div class="form-group row">

												<div class="col-sm-6">
													<label> Employee:</label>
													<select class="form-control mb-3 custom-select selectric" required name="employee_id" style="width: 100%; height:56px;">
														<option value="0"> -- Select -- </option>
														<?php foreach ($employees as $employee):

															?>
															<option value="<?php echo $employee->employee_id ?>"> <?php echo $employee->employee_unique_id." (".$employee->employee_last_name." ".$employee->employee_first_name.")"; ?> </option>
														<?php

														endforeach; ?>


													</select>
												</div>
												<div class="col-sm-6">
													<label> Transfer Type:</label>
													<select class="form-control mb-3 custom-select selectric" required name="transfer_type" id="transfer_type" onchange="check_transfer_type()" style="width: 100%; height:56px;">
														<option> --select-- </option>
														<option value="0"> Inter Branch </option>
														<option value="1"> Inter Subsidiary </option>


													</select>
												</div>



											</div>

											<div class="form-group row">

												<div class="col-sm-6" id="subsidiary">
													<label> New Subsidiary:</label>
													<select class="form-control mb-3 custom-select selectric"  required name="subsidiary_id" style="width: 100%; height:56px;">
														<option value="0"> -- Select -- </option>
														<?php foreach ($subsidiarys as $subsidiary):

															?>
															<option value="<?php echo $subsidiary->subsidiary_id ?>"> <?php echo $subsidiary->subsidiary_name; ?> </option>
														<?php

														endforeach; ?>


													</select>
												</div>
												<div class="col-sm-6" id="location">
													<label> New Branch:</label>
													<select class="form-control mb-3 custom-select selectric" required name="location_id" style="width: 100%; height:56px;">
														<option value="0"> -- Select -- </option>
														<?php foreach ($locations as $location):

															?>
															<option value="<?php echo $location->location_id ?>"> <?php echo $location->location_name; ?> </option>
														<?php

														endforeach; ?>


													</select>
												</div>

											</div>

											<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
											<div class="modal-footer">
												<button type="submit"  class="btn btn-primary">Add</button>
											</div>
									</form>
								</div>




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

	window.onload = function(){
		document.getElementById("subsidiary").style.display='none';
		document.getElementById("location").style.display='none';
	};
	function check_transfer_type() {

		var transfer_type = document.getElementById("transfer_type").value;

		if(transfer_type == 0){
			document.getElementById("subsidiary").style.display='none';
			document.getElementById("location").style.display='block';
		}

		if(transfer_type == 1){

			document.getElementById("subsidiary").style.display='block';
			document.getElementById("location").style.display='none';
		}


	}

	function addMonths(date, months) {
		var d = date.getDate();
		date.setMonth(date.getMonth() + +months);
		if (date.getDate() != d) {
			date.setDate(0);
		}
		return date;
	}




</script>
