<!DOCTYPE html>
<html lang="en">
<head>



	<?php include(APPPATH.'/views/stylesheet.php'); ?>
	<!-- DataTables -->


</head>


<body class="fixed-left">
<!-- Begin page -->
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>
		<?php include(APPPATH.'/views/topbar.php'); ?>


		<?php include(APPPATH.'/views/sidebar.php'); ?>



		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1> View Payment Definition</h1>
				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-body">

							<div class="modal-content">

									<form class="" method="post" action="<?php echo site_url('update_payment_definition'); ?>">
										<div class="modal-body">

											<div class="form-group row">

												<div class="col-sm-4">
													<label> Payment Code:</label>
													<input  name="payment_definition_code" value="<?php echo $payment_definition->payment_definition; ?>"  data-parsley-type="digits" type="text"
															class="form-control"
															placeholder="Enter Pay Code"/>
												</div>
												<div class="col-sm-4">
													<label> Payment Name:</label>
													<input  name="payment_definition_name"  data-parsley-type="text" type="text"
															class="form-control"
															placeholder="Enter Payment Name"/>
												</div>

												<div class="col-sm-4">


													<label> Payment Variance:</label>
													<select class="selectric form-control mb-3 custom-select" required name="payment_definition_variant" style="width: 100%; height:56px;">
														<option> -- Select -- </option>
														<option value="0"> Standard </option>
														<option value="1"> Variation</option>


													</select>
												</div>

											</div>


											<div class="form-group row">

												<div class="col-sm-6">
													<label> Payment Type:</label>
													<select id="payment_type" class="selectric form-control mb-3 custom-select" onchange="check_taxable()" required name="payment_definition_type" style="width: 100%; height:56px;">
														<option> -- Select -- </option>
														<option value="0"> Deduction </option>
														<option value="1"> Income</option>


													</select>

												</div>
												<div class="col-sm-6" id="taxablediv">
													<label> Taxable:</label>
													<select id="taxable" class="selectric form-control mb-3 custom-select" required name="payment_definition_taxable" style="width: 100%; height:56px;">
														<option value="0"> No </option>
														<option value="1"> Yes</option>


													</select>

												</div>


											</div>




											<div class="form-group row" id="paymentdiv" >

												<div class="col-sm-6">
													<label> Payment Desc:</label>
													<select id="paymentdesc" class="selectric form-control mb-3 custom-select" required name="payment_definition_payment_desc" style="width: 100%; height:56px;">
														<option value="0">  </option>
														<option value="1"> Loan </option>
														<option value="2"> Tax </option>
														<option value="3">Pension </option>
														<option value="4"> HMO </option>


													</select>

												</div>


												<div class="col-sm-6">
													<label> Tie Number:</label>
													<select id="tienumber" class="selectric form-control mb-3 custom-select" required name="payment_definition_tie_number" style="width: 100%; height:56px;">
														<option value="0">  None </option>

														<?php foreach ($tie_numbers as $tie_number): ?>
															<option value="<?php echo $tie_number ?>>"> <?php echo $tie_number; ?> </option>

														<?php endforeach; ?>


													</select>
												</div>

											</div>







											<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
											<div class="modal-footer">
												<button type="submit" class="btn btn-primary">Add Payment Definition</button>
												<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
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


<?php include(APPPATH.'/views/js.php'); ?>
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
