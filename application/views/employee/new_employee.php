
<?php include(APPPATH.'\views\stylesheet.php'); ?>


<body>
<!-- Begin page -->
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>
		<?php include(APPPATH.'\views\topbar.php'); ?>
		<?php include(APPPATH.'\views\sidebar.php'); ?>
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1>New Employee</h1>
				</div>
				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
							<!--							<div class="card-header">-->
							<!--								<h4>Simple Table</h4>-->
							<!--							</div>-->


							<div class="card-body">


								<form class="" method="post" action="<?php echo site_url('add_employee'); ?>" enctype="multipart/form-data">
									<!-- Nav tabs -->

										<ul class="nav nav-pills nav-justified" role="tablist">
											<li class="nav-item waves-effect waves-light">

												<a class="nav-link active" data-toggle="tab" href="#personal-information" role="tab">Personal Information</a>
											</li>
											<li class="nav-item waves-effect waves-light">


																								<a class="nav-link" data-toggle="tab" href="#job-information" role="tab">Work Information</a>
											</li>
											<li class="nav-item waves-effect waves-light">


																								<a class="nav-link" data-toggle="tab" href="#bank-information" role="tab">Bank Information </a>
											</li>
											<li class="nav-item waves-effect waves-light">


																								<a class="nav-link" data-toggle="tab" href="#other-information" role="tab">Other Information</a>
											</li>
										</ul>



									<!-- Tab panes -->
									<div class="tab-content">
										<div class="tab-pane active p-3" id="personal-information" role="tabpanel">
											<?php if($error != ' '): ?>

												<div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
													<i class="mdi mdi-close-circle font-32"></i><strong class="pr-1">Error !</strong> <?php echo $error; ?>.
												</div>
											<?php endif; ?>

											<div class="modal-body">

												<div class="form-group">
													<label>Employee ID:</label>
													<input type="text" class="form-control"  name="employee_unique_id" required readonly value="<?php echo $unique_id; ?>" placeholder="Enter Name of employee"/>
												</div>


												<div class="form-group row">

													<div class="col-sm-4">
														<label>Employee First Name:</label>
														<input type="text" class="form-control"  name="employee_first_name" required value="" placeholder="Enter Name of employee first name"/>
													</div>
													<div class="col-sm-4">
														<label>Employee Last Name:</label>
														<input type="text" class="form-control"  name="employee_last_name" required value="" placeholder="Enter employee last name"/>
													</div>

													<div class="col-sm-4">
														<label>Employee Other Name:</label>
														<input type="text" class="form-control" name="employee_other_name"  value="" placeholder="Enter employee other name"/>
													</div>

												</div>


												<div class="form-group row">

													<div class="col-sm-4">
														<label> Employee Personal Email:</label>
														<input type="email" class="form-control"  name="employee_personal_email" required value="" placeholder="Enter employee personal email"/>
													</div>
													<div class="col-sm-4">
														<label>Employee Official Email:</label>
														<input type="email" class="form-control"  name="employee_official_email"  value="" placeholder="Enter employee official email"/>
													</div>

													<div class="col-sm-4">

														<label>Employee Date of Birth:</label>
														<div class="input-group">
															<input type="date" name="employee_dob" required class="form-control" placeholder="mm/dd/yyyy">

															<div class="input-group-addon">
																<span><i class="mdi mdi-calendar" aria-hidden="true"></i></span>

															</div>
														</div>

													</div>

												</div>

												<div class="form-group row">

													<div class="col-sm-4">
														<label>Employee Phone Number</label>
														<input type="text" placeholder="" name="employee_phone_number" data-mask="(999) 9999-9999" class="form-control">
													</div>

													<div class="col-sm-8">
														<label> Employee Address:</label>
														<textarea id="textarea" class="form-control" required name="employee_address" maxlength="225" rows="3" placeholder="Employee Address."></textarea>
													</div>


												</div>







												<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />


											</div>
										</div>

										<div class="tab-pane p-3" id="job-information" role="tabpanel">
											<div class="form-group row">
												<div class="col-sm-6">





													<label>Current Grade</label>
													<select class="selectric form-control mb-3 custom-select" required name="employee_grade" style="width: 100%; height:36px;">
														<option>Select</option>
														<?php foreach ($grades as $grade): ?>

															<option value="<?php echo $grade->grade_id; ?>"> <?php echo $grade->grade_name; ?></option>


														<?php endforeach; ?>
													</select>




												</div>


												<div class="col-sm-6">
													<label>Job Role</label>

													<select class="selectric form-control mb-3 custom-select" required  name="employee_job_role" style="width: 100%; height:56px;">
														<option>Select</option>
														<?php foreach ($roles as $role): ?>

															<option value="<?php echo $role->job_role_id; ?>"> <?php echo $role->job_name." (".$role->department_name.")"; ?></option>


														<?php endforeach; ?>
													</select>

												</div>
											</div>

											<div class="form-group row">
												<div class="col-sm-6">
													<label>Employee Qualification</label>
													<select class="selectric form-control mb-3 custom-select" required name="employee_qualification[]" style="width: 100%" multiple="multiple" data-placeholder="Choose">
														<option>Select</option>
														<?php foreach ($qualifications as $qualification): ?>

															<option value="<?php echo $qualification->qualification_id; ?>"> <?php echo $qualification->qualification_name; ?></option>


														<?php endforeach; ?>
													</select>

												</div>

												<div class="col-sm-6">
													<label>SBU (Location)</label>
													<select class="selectric form-control mb-3 custom-select" required name="location" style="width: 100%; height:56px;">		<option>Select</option>
														<?php foreach ($locations as $location): ?>

															<option value="<?php echo $location->location_id; ?>"> <?php echo $location->location_name; ?></option>


														<?php endforeach; ?>
													</select>



												</div>

											</div>

											<div class="form-group row">


												<div class="col-sm-12">
													<label>Work Experience</label>
<!--													<select class="select2 mb-3 select2-multiple" id="check_experience" required name="check_experience" style="width: 100%"  data-placeholder="Choose" onchange="work_experience()">-->
<!--													-->
													<select class="selectric form-control mb-3 custom-select" id="check_experience"  name="check_experience" style="width: 100%"  onchange="work_experience()">

													<option>Select</option>


														<option value="0"> Entry Level</option>
														<option value="1"> Experienced</option>



													</select>



												</div>

											</div>

											<div id="work_experiences">


												<div id="work_experience1">
													<button type="button" onclick="delete_div(this)"  class="btn btn-youtube btn-round m-b-10 m-l-10 waves-effect waves-light">
														<i class="mdi mdi-delete "></i>
													</button>

													<div class="form-group row">

														<div class="col-sm-12">
															<label>Company Name</label>

															<input type="text" class="form-control" name="company_name[]"  value="" placeholder="Enter company name"/>


														</div>
													</div>

													<div class="form-group row">

														<div class="col-sm-12">
															<label> Job Description:</label>
															<textarea id="textarea" class="form-control" name="job_description[]" maxlength="225" rows="3" placeholder="Job Description."></textarea>
														</div>

													</div>

													<div class="form-group row">

														<div class="col-sm-6">
															<label> Start Date:</label>
															<input type="date" name="experience_start_date[]" class="form-control" placeholder="mm/dd/yyyy">
														</div>

														<div class="col-sm-6">
															<label> End Date:</label>
															<input type="date" name="experience_end_date[]" class="form-control" placeholder="mm/dd/yyyy">
														</div>

													</div>

												</div>

												<button id="work_experience_button" type="button" onclick="clone_div()"  class="btn btn-skype btn-round m-b-10 m-l-10 waves-effect waves-light">
													<i class="mdi mdi-plus-circle-outline"></i>
												</button>
											</div>

										</div>
										<div class="tab-pane p-3" id="bank-information" role="tabpanel">
											<div class="form-group row">

												<div class="col-sm-6">
													<label> Account Number:</label>
													<input data-parsley-type="digits" name="employee_account_number" type="text"
														   class="form-control" required
														   placeholder="Enter only digits"/>
												</div>

												<div class="col-sm-6">
													<label>Bank</label>
													<select class="selectric form-control mb-3 custom-select" required name="employee_bank" style="width: 100%; height:56px;">		<option>Select</option>
														<?php foreach ($banks as $bank): ?>

															<option value="<?php echo $bank->bank_id; ?>"> <?php echo $bank->bank_name; ?></option>

														<?php endforeach; ?>
													</select>

												</div>

											</div>

											<div class="form-group row">

												<div class="col-sm-6">
													<label> HMO ID:</label>
													<input  name="employee_hmo_number" type="text"
															class="form-control"
															placeholder="Enter id"/>
												</div>

												<div class="col-sm-6">
													<label>HMO Provider</label>
													<select class="selectric form-control mb-3 custom-select" required name="employee_hmo_id" style="width: 100%; height:56px;">		<option>Select</option>

														<option value="0"> N/A </option>
														<?php foreach ($health_insurances as $health_insurance): ?>

															<option value="<?php echo $health_insurance->health_insurance_id; ?>"> <?php echo $health_insurance->health_insurance_hmo; ?></option>

														<?php endforeach; ?>
													</select>

												</div>

											</div>

											<div class="form-group row">
												<div class="col-sm-6">
													<label> Employee PAYE Number:</label>
													<input  name="employee_paye_number" type="text"
															class="form-control"
															placeholder="Enter PAYE Number"/>
												</div>
												<div class="col-sm-6">

													<label>Pensionable? </label>
													<select class="selectric form-control mb-3 custom-select" required name="employee_pensionable" onchange="pensionable()" id="employee_pensionable" style="width: 100%; height:56px;">		<option>Select</option>

														<option value="0"> No </option>
														<option value="1"> Yes </option>

													</select>

												</div>






											</div>

											<div id="pension_div">

												<div class="form-group row" >

													<div class="col-sm-6">
														<label> Pension Number:</label>
														<input  name="employee_pension_number" type="text"
																class="form-control"
																placeholder="Enter Pension Number"/>
													</div>

													<div class="col-sm-6">
														<label>Pension Administrator</label>
														<select class="selectric form-control mb-3 custom-select" required name="employee_pension_id" style="width: 100%; height:56px;">		<option>Select</option>

															<option value="0"> N/A </option>
															<?php foreach ($pensions as $pension): ?>

																<option value="<?php echo $pension->pension_id; ?>"> <?php echo $pension->pension_provider; ?></option>

															<?php endforeach; ?>
														</select>

													</div>

												</div>





											</div>
										</div>
										<div class="tab-pane p-3" id="other-information" role="tabpanel">

											<div class="form-group row">

												<div class="col-sm-6">
													<label> NYSC Pass Out Number:</label>

													<div>
														<input data-parsley-type="alphanum" name="nysc_pass_out" type="text"
															   class="form-control" required
															   placeholder="Enter alphanumeric value"/>
													</div>
												</div>

												<div class="col-sm-6">
													<label>NYSC Document</label> <br>
													<input name="employee_nysc" class="form-group" type="file" multiple="multiple">

												</div>
											</div>

											<div class="form-group row">

												<div class="col-sm-6">
													<label> Employment Start Date:</label>
													<input type="date" name="employment_start_date" required class="form-control" placeholder="mm/dd/yyyy">
												</div>

												<div class="col-sm-6">
													<label>Employment Stop Date</label> <br>
													<input type="date" name="employment_stop_date" class="form-control" placeholder="mm/dd/yyyy">

												</div>
											</div>

											<div class="form-group row">
												<div class="col-sm-6">
													<label>Employment Status</label>
													<select class="selectric form-control mb-3 custom-select" required name="employment_status" style="width: 100%; height:56px;">		<option>Select</option>


														<option value="0"> Fired </option>
														<option value="1"> Probationary </option>
														<option value="2"> Confirmed  </option>
														<option value="3">Retired</option>


													</select>
												</div>

												<div class="col-sm-6">
													<div class="col-sm-6">
														<label>Passport</label> <br>
														<input name="employee_passport" class="form-group" type="file" multiple="multiple">

													</div>
												</div>
											</div>

											<div class="form-group row">

												<div class="col-sm-12">
													<div id="myId" class="dropzone">
														<div class="dz-message needsclick">
															<i class="hi text-muted dripicons-cloud-upload"></i>
															<h3>Drop all other documents here</h3>
														</div>
													</div>
												</div>


											</div>




											<div class="modal-footer">
												<button type="submit" class="btn btn-primary">Create employee</button>
												<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>



								</form>

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

<script>


	$(document).ready(function() {

		Dropzone.autoDiscover = false;
		var name = new Date().getTime();
		var myDropzone = this;
		$("div#myId").dropzone(
				{
					renameFilename: function (file) {
						return name + '_' + file.name;
						//return newName;
					},
					url: '<?php echo site_url('employee_upload_others'); ?>',
					method: 'post',
					addRemoveLinks: 'true',
					dictRemoveFile: 'Remove',

					success: function (file, response) {
						//file.upload.filename =  name + '_' + file.name;
						$('form').append('<input type="hidden" name="employee_others[]" value="'+ response+'">');
						console.log(response);
					},

					error: function(file, response){

						console.log(response);
					},

					removedfile: function (file) {
						file.previewElement.remove();
//                    var name = '';
//                    if (typeof file.file_name !== 'undefined') {
//                        name = file.file_name
//                    } else {
//                        name = uploadedDocumentMap[file.name]
//                    }
						$('form').find('input[name="employee_others[]"][value="' + name + '_' + file.name + '"]').remove()
					}

				});



	});



</script>
</body>
</html>

<script>
	window.onload = function(){
		document.getElementById("work_experiences").style.display='none';
		document.getElementById("pension_div").style.display='none';
	};

	function pensionable(){
		var pensionable = document.getElementById('employee_pensionable').value

		if(pensionable == 0){
			document.getElementById("pension_div").style.display='none';
		}

		if(pensionable == 1){
			document.getElementById("pension_div").style.display='block';
		}

	}

	function work_experience(){
		var work_experience = document.getElementById("work_experiences");
		var work_experience_value = document.getElementById("check_experience").value

		if(work_experience_value == 0){
			work_experience.style.display = 'none';
		}
		else{
			work_experience.style.display = 'block';
		}

	}

	function clone_div() {
		var elem = document.getElementById('work_experience1');
		if(elem.style.display == 'none'){


			elem.style.display = 'block';
		} else{
			// Create a copy of it
			var clone = elem.cloneNode(true);
			// Update the ID and add a class
			clone.id = 'work_experience2';
			// document.getElementById('work_experiences').appendChild(clone);
			var work_experiences = document.getElementById('work_experiences');

			var work_experience_button = document.getElementById('work_experience_button');
			//clone.insertBefore(work_experience_button);
			work_experiences.insertBefore(clone,work_experience_button)
			// Inject it into the DOM
			elem.after(clone);
		}
	}

	function delete_div(e){
		var id = e.parentElement.id;
		if(id == 'work_experience1' ){
			var elem = document.getElementById('work_experience1');
			var inputs = elem.getElementsByTagName('input');
			var index;
			for(index = 0; index < inputs.length; ++index){
				if(inputs[index].type == 'text')
					inputs[index].value = '';
			}
			inputs = elem.getElementsByTagName('input');
			for(index = 0; index < inputs.length; ++index){
				if(inputs[index].type == 'date')
					inputs[index].value = '';
			}

			inputs = elem.getElementsByTagName('textarea');
			for(index = 0; index < inputs.length; ++index){
				// if(inputs[index].type == 'textarea')
				inputs[index].value = '';
			}

			// var textarea = elem.getElementsByTagName('textarea');
			// textarea.value = '';
			elem.style.display = 'none';
		} else{
			e.parentElement.remove();

		}

	}
</script>



