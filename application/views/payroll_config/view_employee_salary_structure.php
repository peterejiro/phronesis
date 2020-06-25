
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
					<h1> View Employee Salary Structure</h1>
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


											<?php if($employee->employee_salary_structure_category > 0) : ?>

												<div class="form-group row" id="salary_structure_category">

													<div class="col-sm-6">
														<label> <?php echo $employee->salary_structure_category_name; ?>:</label>
													</div>

													<div class="col-sm-6">
														<?php foreach ($allowances as $allowance): ?>
															<label> <?php echo $allowance->payment_definition_payment_name; ?> :</label>

															<label> <?php echo number_format($allowance->salary_structure_allowance_amount); ?></label>
															<hr>


														<?php endforeach; ?>

													</div>


												</div>

											<?php endif; ?>



											<?php if($employee->employee_salary_structure_category == 0) : ?>



												<div class="form-group row" id="allowance">
													<div class="col-sm-6">
														<label> Personalized :</label>


													</div>

													<div class="col-sm-6">
														<?php foreach ($personalized_allowances as $personalized_allowance): ?>
															<label> <?php echo $personalized_allowance->payment_definition_payment_name; ?> :</label>

															<label> <?php echo number_format($personalized_allowance->personalized_amount); ?></label>
															<hr>


														<?php endforeach; ?>

													</div>
												</div>





											<?php endif; ?>













											<div class="modal-footer">
												<a href="<?php echo site_url('edit_employee_salary_structure')."/".$employee->employee_id;?>" class="btn btn-primary">Edit Employee Salary Structure </a>

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

