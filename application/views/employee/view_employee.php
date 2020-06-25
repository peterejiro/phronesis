<!DOCTYPE html>
<html lang="en">
<head>
	<script>
		function resizeIframe(obj){
			obj.style.height = obj.contentWindow.document.Element.scrollHeight + 'px';


		}
	</script>


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
					<h1> View Employee</h1>
				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
							<!--							<div class="card-header">-->
							<!--								<h4>Simple Table</h4>-->
							<!--							</div>-->

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

												<img src="<?php echo base_url()."/uploads/employee_passports/".$employee->employee_passport; ?>" alt="" class="rounded-circle  mx-auto d-block w-80">

												<div class="form-group">
													<label>Employee ID:</label>
													<input type="text" class="form-control" disabled  name="employee_unique_id" required  value="<?php echo $employee->employee_unique_id; ?>" placeholder="Enter Name of employee"/>
												</div>


												<div class="form-group row">

													<div class="col-sm-4">
														<label>Employee First Name:</label>
														<input type="text" class="form-control" disabled  name="employee_first_name" required  value="<?php echo $employee->employee_first_name; ?>" placeholder="Enter Name of employee first name"/>
													</div>
													<div class="col-sm-4">
														<label>Employee Last Name:</label>
														<input type="text" class="form-control"  disabled name="employee_last_name" required  value="<?php echo $employee->employee_last_name; ?>" placeholder="Enter employee last name"/>
													</div>

													<div class="col-sm-4">
														<label>Employee Other Name:</label>
														<input type="text" class="form-control" disabled name="employee_other_name"   value="<?php echo $employee->employee_other_name; ?>" placeholder="Enter employee other name"/>
													</div>

												</div>


												<div class="form-group row">

													<div class="col-sm-4">
														<label> Employee Personal Email:</label>
														<input type="email" class="form-control" disabled  name="employee_personal_mail" required value="<?php echo $employee->employee_personal_email; ?>" placeholder="Enter employee personal email"/>
													</div>
													<div class="col-sm-4">
														<label>Employee Official Email:</label>
														<input type="email" class="form-control" disabled name="employee_official_email"  value="<?php echo $employee->employee_official_email; ?>" placeholder="Enter employee official email"/>
													</div>

													<div class="col-sm-4">

														<label>Employee Date of Birth:</label>
														<div class="input-group">
															<input type="date" name="employee_dob" disabled value="<?php echo $employee->employee_dob; ?>" required class="form-control" placeholder="mm/dd/yyyy">

															<div class="input-group-addon">
																<span><i class="mdi mdi-calendar" aria-hidden="true"></i></span>

															</div>
														</div>

													</div>

												</div>

												<div class="form-group row">

													<div class="col-sm-4">
														<label>Employee Phone Number</label>
														<input type="text" placeholder="" disabled name="employee_phone_number" data-mask="(999) 9999-9999" value="<?php echo $employee->employee_phone_number ?>" class="form-control">
													</div>

													<div class="col-sm-8">
														<label> Employee Address:</label>
														<textarea id="textarea" class="form-control" disabled required name="employee_address" maxlength="225" rows="3" placeholder="Employee Address."><?php echo $employee->employee_address ?></textarea>
													</div>


												</div>







												<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />


											</div>
										</div>

										<div class="tab-pane p-3" id="job-information" role="tabpanel">
											<div class="form-group row">
												<div class="col-sm-6">





													<label>Current Grade</label>
													<select class="select2 form-control mb-3 custom-select" required name="employee_grade" style="width: 100%; height:36px;" disabled>
														<option>Select</option>
														<?php foreach ($grades as $grade): ?>

															<option value="<?php echo $grade->grade_id; ?>" <?php if($grade->grade_id == $employee->employee_grade_id) { echo "selected"; } ?>> <?php echo $grade->grade_name; ?></option>


														<?php endforeach; ?>
													</select>




												</div>
												<div class="col-sm-6">
													<label>Job Role</label>

													<select class="select2 form-control mb-3 custom-select" required  name="employee_job_role" style="width: 100%; height:56px;" disabled>
														<option>Select</option>
														<?php foreach ($roles as $role): ?>

															<option value="<?php echo $role->job_role_id; ?>" <?php if($role->job_role_id == $employee->employee_job_role_id) { echo "selected"; } ?>> <?php echo $role->job_name." (".$role->department_name.")"; ?></option>


														<?php endforeach; ?>
													</select>

												</div>
											</div>

											<div class="form-group row">
												<div class="col-sm-6">
													<label>Employee Qualification</label>
													<select class="select2 mb-3 select2-multiple"  required name="employee_qualification[]" style="width: 100%" multiple="multiple" data-placeholder="Choose" disabled>
														<option>Select</option>
														<?php foreach ($qualifications as $qualification): ?>

															<?php $employee_qualifications = json_decode($employee->employee_qualification); ?>

															<option value="<?php echo $qualification->qualification_id; ?>" <?php foreach ($employee_qualifications as $employee_qualification){
																if($employee_qualification == $qualification->qualification_id){
																	echo "selected";
																}
															} ?>> <?php echo $qualification->qualification_name; ?></option>


														<?php endforeach; ?>
													</select>

												</div>

												<div class="col-sm-6">
													<label>SBU (Location)</label>
													<select class="select2 form-control mb-3 custom-select" required name="location" style="width: 100%; height:56px;" disabled>
														<option>Select</option>
														<?php foreach ($locations as $location): ?>

															<option value="<?php echo $location->location_id; ?>" <?php if($location->location_id == $employee->employee_location_id){ echo "selected"; } ?>> <?php echo $location->location_name; ?></option>


														<?php endforeach; ?>
													</select>



												</div>

											</div>


											<div id="work_experiences">
												<label>Work Experiences </label><br>

												<?php if(empty($work_experiences)){

													echo "No work experience";
												} else{ foreach ($work_experiences as $work_experience){ ?>
													<div id="work_experience1">


														<div class="form-group row">

															<div class="col-sm-12">
																<label>Company Name</label>

																<input type="text" class="form-control" name="company_name[]"   value="<?php echo $work_experience->company_name;  ?>" disabled placeholder="Enter company name"/>


															</div>
														</div>

														<div class="form-group row">

															<div class="col-sm-12">
																<label> Job Description:</label>
																<textarea id="textarea" class="form-control" name="job_description[]" disabled maxlength="225" rows="3" placeholder="Job Description."><?php echo $work_experience->job_description;  ?></textarea>
															</div>

														</div>

														<div class="form-group row">

															<div class="col-sm-6">
																<label> Start Date:</label>
																<input type="date" name="experience_start_date[]" disabled value="<?php echo $work_experience->start_date;  ?>" class="form-control" placeholder="mm/dd/yyyy">
															</div>

															<div class="col-sm-6">
																<label> End Date:</label>
																<input type="date" name="experience_end_date[]" disabled value="<?php echo $work_experience->end_date;  ?>" class="form-control" placeholder="mm/dd/yyyy">
															</div>

														</div>

													</div>

													<hr>


												<?php		}
												} ?>




											</div>

										</div>
										<div class="tab-pane p-3" id="bank-information" role="tabpanel">
											<div class="form-group row">

												<div class="col-sm-6">
													<label> Account Number:</label>
													<input data-parsley-type="digits" name="employee_account_number" disabled value="<?php echo $employee->employee_account_number; ?>" type="text"
														   class="form-control" required
														   placeholder="Enter only digits"/>
												</div>

												<div class="col-sm-6">
													<label>Bank</label>
													<select class="select2 form-control mb-3 custom-select" required disabled name="employee_bank" style="width: 100%; height:56px;">		<option>Select</option>
														<?php foreach ($banks as $bank): ?>

															<option value="<?php echo $bank->bank_id; ?>"<?php if($bank->bank_id == $employee->employee_bank_id){
																echo "Selected";
															} ?>> <?php echo $bank->bank_name; ?></option>

														<?php endforeach; ?>
													</select>

												</div>

											</div>

											<div class="form-group row">

												<div class="col-sm-6">
													<label> HMO ID:</label>
													<input  name="employee_hmo_number" disabled value="<?php echo $employee->employee_hmo_number; ?>" type="text"
															class="form-control"
															placeholder="Enter id"/>
												</div>

												<div class="col-sm-6">
													<label>HMO Provider</label>
													<select class="select2 form-control mb-3 custom-select" disabled required name="employee_hmo_id" style="width: 100%; height:56px;">

														<option value="0" selected> N/A </option>
														<?php foreach ($health_insurances as $health_insurance): ?>

															<option value="<?php echo $health_insurance->health_insurance_id; ?>" <?php if($health_insurance->health_insurance_id == $employee->employee_hmo_id){
																echo "Selected";
															} ?>> <?php echo $health_insurance->health_insurance_hmo; ?></option>

														<?php endforeach; ?>
													</select>

												</div>

											</div>

											<div class="form-group row">


												<div class="col-sm-6">
													<label> Employee PAYE Number:</label>
													<input  name="employee_paye_number" disabled type="text"
															class="form-control" value="<?php echo $employee->employee_paye_number; ?>"
															placeholder="Enter PAYE Number"/>
												</div>

												<div class="col-sm-6">

													<label>Pensionable? </label>
													<select class="select2 form-control mb-3 custom-select" disabled required name="employee_pensionable" onchange="pensionable()" id="employee_pensionable" style="width: 100%; height:56px;">		<option>Select</option>

														<option value="0" <?php if($employee->employee_pensionable == 0){ echo "selected"; } ?>> No </option>
														<option value="1" <?php if($employee->employee_pensionable == 1){ echo "selected"; } ?>> Yes </option>

													</select>

												</div>



											</div>



											<div class="form-group row">

												<?php if($employee->employee_pensionable == 1): ?>

													<div class="col-sm-6">
														<label> Pension Number:</label>
														<input  name="employee_pension_number"  disabled value="<?php echo $employee->employee_pension_number ?>" type="text"
																class="form-control"
																placeholder="Enter Pension Number"/>
													</div>

													<div class="col-sm-6">
														<label>Pension Administrator</label>
														<select class="select2 form-control mb-3 custom-select" disabled name="employee_pension_id" style="width: 100%; height:56px;">

															<option value="0" selected> N/A </option>
															<?php foreach ($pensions as $pension): ?>

																<option value="<?php echo $pension->pension_id; ?>" <?php if($pension->pension_id == $employee->employee_pension_id){
																	echo "Selected";
																} ?>> <?php echo $pension->pension_provider; ?></option>

															<?php endforeach; ?>
														</select>

													</div>

												<?php

												endif; ?>

											</div>




										</div>
										<div class="tab-pane p-3" id="other-information" role="tabpanel">

											<div class="form-group row">

												<div class="col-sm-6">
													<label> NYSC Pass Out Number:</label>

													<div>
														<input data-parsley-type="alphanum" name="nysc_pass_out" disabled type="text"
															   class="form-control" required value="<?php echo $employee->employee_nysc_details; ?>"
															   placeholder="Enter alphanumeric value"/>
													</div>
												</div>

												<div class="col-sm-6">
													<div style="margin-top: 28px">
														<button type="button" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-form">View Uploaded Documents</button>

													</div>
												</div>

											</div>



											<div class="form-group row">

												<div class="col-sm-6">
													<label> Employment Start Date:</label>
													<input type="date" name="employment_start_date" value="<?php echo $employee->employee_employment_date; ?>" disabled required class="form-control" placeholder="mm/dd/yyyy">
												</div>

												<div class="col-sm-6">
													<label>Employment Stop Date</label> <br>
													<input type="date" name="employment_stop_date" value="<?php echo $employee->employee_stop_date; ?>" disabled class="form-control" placeholder="mm/dd/yyyy">

												</div>
											</div>

											<div class="form-group row">
												<div class="col-sm-3">

												</div>

												<div class="col-sm-6">
													<label>Employment Status</label>
													<select class="select2 form-control mb-3 custom-select" required disabled name="employment_status" style="width: 100%; height:56px;">		<option>Select</option>


														<option value="0" <?php if($employee->employee_status == 0){echo "selected" ;} ?>> Fired </option>
														<option value="1"  <?php if($employee->employee_status == 1){echo "selected" ;} ?>> Probationary </option>
														<option value="2"  <?php if($employee->employee_status == 2){echo "selected" ;} ?>> Confirmed  </option>
														<option value="3"  <?php if($employee->employee_status == 3){echo "selected" ;} ?>>Retired</option>


													</select>
												</div>
												<div class="col-sm-3">

												</div>



											</div>






											<div class="modal-footer">
												<a href="<?php echo site_url('update_employee')."/".$employee->employee_id; ?>" class="btn btn-warning">Edit employee</a>

											</div>
										</div>
									</div>



								</form>



							<div class="modal fade bd-example-modal-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-body">
											<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
												<div class="carousel-inner" role="listbox">
													<div class="carousel-item active">
														<iframe
																src="<?php echo base_url()."/uploads/employee_passports/".$employee->employee_passport; ?>" scrolling="no" frameborder="no" height="700px" onload="resizeIframe(this)" width="100%">
														</iframe>

													</div>
													<div class="carousel-item">
														<iframe
																src="<?php echo base_url()."/uploads/employee_nysc/".$employee->employee_nysc_document; ?>" scrolling="no" frameborder="no" height="700px" width="100%">
														</iframe>
													</div>

													<?php if(empty($other_documents)){


													} else{ foreach ($other_documents as $other_document){ ?>
														<div class="carousel-item">

															<iframe
																	src="<?php echo base_url()."/uploads/employee_others/".$other_document->other_document_name; ?>" height="700px" width="100%">
															</iframe>
														</div>

													<?php	} } ?>

												</div>
												<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
													<span class="carousel-control-prev-icon" aria-hidden="true"></span>
													<span class="sr-only">Previous</span>
												</a>
												<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
													<span class="carousel-control-next-icon" aria-hidden="true"></span>
													<span class="sr-only">Next</span>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>


			</section>
		</div>




	</div>
</div>





<!-- End Right content here -->


<!-- END wrapper -->


<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>
