<!DOCTYPE html>
<html lang="en">
<head>


	<?php include(APPPATH.'\views\stylesheet.php'); ?>
	<!-- DataTables -->


</head>


<body class="fixed-left">
<!-- Begin page -->
<div id="wrapper">

	<!-- ========== Left Sidebar Start ========== -->
	<?php include(APPPATH.'\views\sidebar.php'); ?>
	<!-- Left Sidebar End -->

	<!-- Start right Content here -->

	<div class="content-page" id="raps">
		<!-- Start content -->
		<div class="content">

			<!-- Top Bar Start -->
			<?php include(APPPATH.'\views\topbar.php'); ?>
			<!-- Top Bar End -->

			<div class="page-content-wrapper">

				<div class="container-fluid">

					<div class="row">
						<div class="col-sm-12">
							<div class="page-title-box">
								<div class="float-right">

								</div>
								<h4 class="page-title">Update Salary Allowance</h4>
							</div>
						</div>
					</div>
					<!-- end page title end breadcrumb -->


					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">

									<h4 class="mt-0 header-title"> Update Salary Allowance</h4>


									<br> <br> <br>





											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLongTitle2">Update Salary Allowance</h5>

												</div>
												<form class="" method="post" action="<?php echo site_url('update_salary_allowance'); ?>">
												<div class="modal-body">

													<div class="form-group row">

														<div class="col-sm-6">
															<label> Salary Structure Category:</label>
															<select id="payment_type" class="select2 form-control mb-3 custom-select" required name="salary_structure_category" style="width: 100%; height:56px;">
																<option> -- Select -- </option>
																<?php foreach ($salary_structures as $salary_structure): ?>
																	<option value="<?php echo $salary_structure->salary_structure_id; ?>>" <?php if($allowance->salary_structure_category_id == $salary_structure->salary_structure_id) { echo "selected"; } ?>> <?php echo $salary_structure->salary_structure_category_name; ?> </option>

																<?php endforeach; ?>

															</select>

														</div>

														<div class="col-sm-6">


															<label> Payment Definition:</label>
															<select class="select2 form-control mb-3 custom-select" required name="payment_definition" style="width: 100%; height:56px;">
																<option> -- Select -- </option>
																<?php foreach ($payment_definitions as $payment_definition): ?>
																	<option value="<?php echo $payment_definition->payment_definition_id ?>" <?php if($allowance->payment_definition_id == $payment_definition->payment_definition_id) { echo "selected"; } ?>> <?php echo $payment_definition->payment_definition_payment_name." (".$payment_definition->payment_definition_payment_code.")"; ?> </option>

																<?php endforeach; ?>


															</select>
														</div>

											</div>


													<div class="form-group row">

														<div class="col-sm-3">
														</div>

														<div class="col-sm-6">
															<label> Amount:</label>
															<input  name="allowance_amount"  data-parsley-type="digits" type="text"
																	class="form-control"
																	placeholder="Enter allowance amount" value="<?php echo $allowance->salary_structure_allowance_amount; ?>"/>
														</div>
														<div class="col-sm-3">
														</div>
													</div>












													<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
													<input type="hidden" name="salary_structure_allowance_id" value="<?php echo $allowance->salary_structure_allowance_id ?>">
												<div class="modal-footer">
													<button type="submit" class="btn btn-primary">Update Salary Allowance</button>
													<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
												</div>


												</form>
											</div>




								</div>


								</div>
							</div>
						</div> <!-- end col -->
					</div> <!-- end row -->

				</div><!-- container -->

			</div> <!-- Page content Wrapper -->

		</div> <!-- content -->

	<?php include(APPPATH.'\views\footer.php'); ?>

	</div>
	<!-- End Right content here -->

</div>
<!-- END wrapper -->


<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>

<script>

	window.onload = function(){
		document.getElementById("taxablediv").style.display='none';
		document.getElementById("paymentdiv").style.display='none';
	};

	function check_taxable(){
		var payment_type = document.getElementById('payment_type').value;

		if(payment_type == 1){

			document.getElementById("taxablediv").style.display='block';
			document.getElementById('taxable').selectedIndex = "0";
			document.getElementById('taxable').disabled = false;

			document.getElementById("paymentdiv").style.display='none';
			document.getElementById('paymentdesc').disabled = true;
			document.getElementById('tienumber').disabled = true;
		}

		if( payment_type == 0){
			document.getElementById("taxablediv").style.display='block';
			document.getElementById('taxable').selectedIndex = "0";
			document.getElementById('taxable').disabled = true;

			document.getElementById("paymentdiv").style.display='block';
			document.getElementById('paymentdesc').disabled = false;
			document.getElementById('tienumber').disabled = false;
			document.getElementById('tienumber').selectedIndex = "0";

		}

	}



</script>