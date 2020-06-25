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
					<h1> Setup Employee Salary Structure</h1>
				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-body">
							<div class="modal-content">

									<form class="" method="post" action="<?php echo site_url('add_employee_salary_structure'); ?>">
										<div class="modal-body">


											<div class="form-group row">

												<div class="col-sm-6">
													<label>Employee ID:</label>
													<input type="text" class="form-control"  name="employee_unique_id" required disabled value="<?php echo $employee->employee_unique_id; ?>" placeholder="Enter Name of employee"/>


												</div>

												<div class="col-sm-6">
													<label>Employee Name:</label>
													<input type="text" class="form-control"  name="employee_unique_id" required disabled value="<?php echo $employee->employee_last_name." ".$employee->employee_first_name." ".$employee->employee_other_name; ?>" placeholder="Enter Name of employee"/>


												</div>



											</div>


											<div class="form-group row">

												<div class="col-sm-6">
													<label> Salary Structure Type:</label>
													<select id="salary_structure_type" class="selectric form-control mb-3 custom-select" required onchange="check_salary_structure_type()" name="salary_structure_type" style="width: 100%; height:200px;">
														<option value="2"> -- Select -- </option>

														<option value="0"> Personalized </option>
														<option value="1"> Categorised </option>



													</select>

												</div>


											</div>


											<div class="form-group row" id="salary_structure_category">

												<div class="col-sm-6">
													<label> Salary Structure Category:</label>
													<select id="payment_type" class="selectric form-control mb-3 custom-select"  required name="salary_structure_category" style="width: 100%; height:56px;">
														<option> -- Select -- </option>
														<?php foreach ($salary_structures as $salary_structure): ?>
															<option value="<?php echo $salary_structure->salary_structure_id ?>>"> <?php echo $salary_structure->salary_structure_category_name; ?> </option>

														<?php endforeach; ?>

													</select>

												</div>

											</div>





											<div id="allowances">

												<div class="form-group row" id="allowance">
													<button type="button" onclick="delete_div(this)"  class="btn btn-youtube btn-round m-b-10 m-l-10 waves-effect waves-light">
														<i class="mdi mdi-delete "></i>
													</button> <br>

													<div class="col-sm-6" >


														<label> Payment Definition:</label>
														<select class="select form-control mb-3 custom-select" id="payment_definition" required name="payment_definition[]" style="width: 100%; height:56px;">
															<option> -- Select -- </option>
															<?php foreach ($payment_definitions as $payment_definition): ?>
																<option value="<?php echo $payment_definition->payment_definition_id ?>"> <?php echo $payment_definition->payment_definition_payment_name." (".$payment_definition->payment_definition_payment_code.")"; ?> </option>

															<?php endforeach; ?>


														</select>
													</div>


													<div class="col-sm-6">
														<label> Amount:</label>
														<input  name="allowance_amount[]"  data-parsley-type="digits" type="text"
																class="form-control"
																placeholder="Enter allowance amount"/>
													</div>

												</div>

												<button id="allowance_button" type="button" onclick="clone_div()"  class="btn btn-skype btn-round m-b-10 m-l-10 waves-effect waves-light">
													<i class="mdi mdi-plus-circle-outline"></i>
												</button>

											</div>












											<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
											<input type="hidden" name="employee_id" value="<?php echo $employee->employee_id; ?>">
											<div class="modal-footer">
												<button type="submit" class="btn btn-primary">Add Salary Allowance</button>
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


<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>


<script>
	window.onload = function(){
		document.getElementById("allowances").style.display='none';
		document.getElementById("salary_structure_category").style.display = 'none';

	};

	var count = 1;

	function clone_div() {
		var elem = document.getElementById('allowance');



		if(elem.style.display == 'none'){
			elem.style.display = 'block';
		} else{




			// Create a copy of it
			var clone = elem.cloneNode(true);
			// Update the ID and add a class
			clone.id = 'allowance'+count;


			var allowances = document.getElementById('allowances');

			var allowance_button = document.getElementById('allowance_button');
			//clone.insertBefore(work_experience_button);
			allowances.insertBefore(clone,allowance_button)

			// Inject it into the DOM
			elem.after(clone);

			var test_id = 'payment_definition'+count;

			$('#'+clone.id).find('select').attr('id', 'payment_definition'+count );

			count ++;

		}
	}

	function delete_div(e){
		var id = e.parentElement.id;
		if(id == 'allowance' ){
			var elem = document.getElementById('allowance');
			var inputs = elem.getElementsByTagName('input');
			var index;
			for(index = 0; index < inputs.length; ++index){
				if(inputs[index].type == 'text')
					inputs[index].value = '';
			}


			// var textarea = elem.getElementsByTagName('textarea');
			// textarea.value = '';
			elem.style.display = 'none';
		} else{
			e.parentElement.remove();

		}

	}

	function check_salary_structure_type(){
		var salary_structure_type = document.getElementById('salary_structure_type').value;



		if(salary_structure_type == 1){

			//alert(salary_structure_type);

			document.getElementById("allowances").style.display='none';
			document.getElementById("salary_structure_category").style.display='block';

		}

		if(salary_structure_type == 0){
			//alert(salary_structure_type);
			document.getElementById("salary_structure_category").style.display = 'none';
			document.getElementById("allowances").style.display='block';

		}

	}






</script>


<script>

	// window.onload = function(){
	// 	document.getElementById("taxablediv").style.display='none';
	// 	document.getElementById("paymentdiv").style.display='none';
	// };
	//
	// function check_taxable(){
	// 	var payment_type = document.getElementById('payment_type').value;
	//
	// 	if(payment_type == 1){
	//
	// 		document.getElementById("taxablediv").style.display='block';
	// 		document.getElementById('taxable').selectedIndex = "0";
	// 		document.getElementById('taxable').disabled = false;
	//
	// 		document.getElementById("paymentdiv").style.display='none';
	// 		document.getElementById('paymentdesc').disabled = true;
	// 		document.getElementById('tienumber').disabled = true;
	// 	}
	//
	// 	if( payment_type == 0){
	// 		document.getElementById("taxablediv").style.display='block';
	// 		document.getElementById('taxable').selectedIndex = "0";
	// 		document.getElementById('taxable').disabled = true;
	//
	// 		document.getElementById("paymentdiv").style.display='block';
	// 		document.getElementById('paymentdesc').disabled = false;
	// 		document.getElementById('tienumber').disabled = false;
	// 		document.getElementById('tienumber').selectedIndex = "0";
	//
	// 	}
	//
	// }



</script>
