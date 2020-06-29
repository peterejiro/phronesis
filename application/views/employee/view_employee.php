<?php include(APPPATH.'\views\stylesheet.php'); ?>

<body>
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>
		<?php include(APPPATH.'\views\topbar.php'); ?>
		<?php include(APPPATH.'\views\sidebar.php'); ?>
		<div class="main-content">
			<section class="section">
				<div class="section-header">
          <div class="section-header-back">
            <a href="<?php echo site_url('employee')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
					<h1>View Employee</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="<?php echo site_url('employee')?>">Employees</a></div>
            <div class="breadcrumb-item">View Employee</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">View Employee Details</div>
          <p class="section-lead">You can view details and documents related to a chosen employee here</p>
          <div class="row">
            <div class="col-12">
              <div class="card mb-0">
                <div class="card-body">
                  <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item waves-effect waves-light">
                      <a class="nav-link active" data-toggle="tab" href="#personal-information" role="tab"><i class="fas fa-user"></i> Personal Information</a>
                    </li>
                    <li class="nav-item waves-effect waves-light">
                      <a class="nav-link" data-toggle="tab" href="#job-information" role="tab"><i class="fas fa-id-card-alt"></i> Work Information</a>
                    </li>
                    <li class="nav-item waves-effect waves-light">
                      <a class="nav-link" data-toggle="tab" href="#bank-information" role="tab"><i class="fas fa-university"></i> Bank Information </a>
                    </li>
                    <li class="nav-item waves-effect waves-light">
                      <a class="nav-link" data-toggle="tab" href="#other-information" role="tab"><i class="fas fa-ellipsis-h"></i> Other Information</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h4>Employee Details</h4>
                  <div class="card-header-action">
                    <div class="btn-group">
                      <button type="button" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target=".bd-example-modal-form"><i class="fa fa-file"></i> View Documents</button>
                      <button onclick="location.href='<?php echo site_url('update_employee').'/'.$employee->employee_id;?>'" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-edit"></i> Update Employee</button>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <form enctype="multipart/form-data">
                    <div class="tab-content">
                      <div class="tab-pane active p-3" id="personal-information" role="tabpanel">
                        <div class="modal-body">
                          <figure class="figure">
                            <img src="<?php echo base_url()."/uploads/employee_passports/".$employee->employee_passport; ?>" alt="" class="figure-img img-fluid rounded mx-auto d-block w-80 img-thumbnail">
                            <figcaption class="figure-caption">Most Recent Passport Photograph</figcaption>
                          </figure>
                          <div class="form-group">
                            <label>Employee ID</label>
                            <input type="text" class="form-control" disabled  name="employee_unique_id" value="<?php echo $employee->employee_unique_id; ?>"/>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-4">
                              <label>First Name</label>
                              <input type="text" class="form-control" disabled  name="employee_first_name" value="<?php echo $employee->employee_first_name; ?>"/>
                            </div>
                            <div class="col-sm-4">
                              <label>Last Name</label>
                              <input type="text" class="form-control"  disabled name="employee_last_name" value="<?php echo $employee->employee_last_name; ?>"/>
                            </div>
                            <div class="col-sm-4">
                              <label>Other Name</label>
                              <input type="text" class="form-control" disabled name="employee_other_name"   value="<?php echo $employee->employee_other_name; ?>"/>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-4">
                              <label>Personal Email</label>
                              <input type="email" class="form-control" disabled  name="employee_personal_mail" value="<?php echo $employee->employee_personal_email; ?>"/>
                            </div>
                            <div class="col-sm-4">
                              <label>Official Email</label>
                              <input type="email" class="form-control" disabled name="employee_official_email"  value="<?php echo $employee->employee_official_email; ?>"/>
                            </div>
                            <div class="col-sm-4">
                              <label>Date of Birth</label>
                              <div class="input-group">
                                <input type="date" name="employee_dob" disabled value="<?php echo $employee->employee_dob; ?>" class="form-control">
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-4">
                              <label>Phone Number</label>
                              <input type="text" name="employee_phone_number" disabled value="<?php echo $employee->employee_phone_number ?>" class="form-control">
                            </div>
                            <div class="col-sm-8">
                              <label>Employee Address</label>
                              <textarea id="textarea" class="form-control" disabled name="employee_address" maxlength="225" rows="3"><?php echo $employee->employee_address ?></textarea>
                            </div>
                          </div>
                          <input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
                        </div>
                      </div>
                      <div class="tab-pane p-3" id="job-information" role="tabpanel">
                        <div class="form-group row">
                          <div class="col-sm-6">
                            <label>Current Grade</label>
                            <select class="selectric form-control mb-3 custom-select" name="employee_grade" style="width: 100%; height:36px;">
                              <?php foreach ($grades as $grade): ?>
                                <option disabled value="<?php echo $grade->grade_id; ?>" <?php if($grade->grade_id == $employee->employee_grade_id) { echo "selected"; } ?>> <?php echo $grade->grade_name; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="col-sm-6">
                            <label>Job Role</label>
                            <select class="selectric form-control mb-3 custom-select" name="employee_job_role" style="width: 100%; height:56px;">
                              <?php foreach ($roles as $role): ?>
                                <option disabled value="<?php echo $role->job_role_id; ?>" <?php if($role->job_role_id == $employee->employee_job_role_id) { echo "selected"; } ?>> <?php echo $role->job_name." (".$role->department_name.")"; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-4">
                            <label>Employee Qualification</label>
                            <select class="selectric form-control mb-3 custom-select" name="employee_qualification[]" style="width: 100%" multiple="multiple">
                              <?php foreach ($qualifications as $qualification): ?>
                                <?php $employee_qualifications = json_decode($employee->employee_qualification); ?>
                                <option disabled value="<?php echo $qualification->qualification_id; ?>"
                                <?php foreach ($employee_qualifications as $employee_qualification){
                                  if($employee_qualification == $qualification->qualification_id){
                                    echo "selected";
                                  }
                                }
                                ?>> <?php echo $qualification->qualification_name; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="col-sm-4">
                            <label>SBU (Location)</label>
                            <select class="selectric form-control mb-3 custom-select" name="location" style="width: 100%; height:56px;">
                              <?php foreach ($locations as $location): ?>
                                <option disabled value="<?php echo $location->location_id; ?>" <?php if($location->location_id == $employee->employee_location_id){ echo "selected"; } ?>> <?php echo $location->location_name; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="col-sm-4">
                            <label>Subsidiary</label>
                            <select class="selectric form-control mb-3 custom-select" required name="location" style="width: 100%; height:56px;">
                              <?php foreach ($subsidiarys as $subsidiary): ?>
                                <option disabled value="<?php echo $subsidiary->subsidiary_id; ?>" <?php if($subsidiary->subsidiary_id == $employee->employee_subsidiary_id){ echo "selected"; } ?>> <?php echo $subsidiary->subsidiary_name; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <div id="work_experiences">
                          <label>Work Experiences </label><br>
                          <?php if(empty($work_experiences)){ ?>
                            <p class="form-text text-muted">No Work Experience Found For Employee</p>
                          <?php } else { foreach ($work_experiences as $work_experience){ ?>
                            <div id="work_experience1">
                              <div class="form-group row">
                                <div class="col-sm-12">
                                  <label>Company Name</label>
                                  <input type="text" class="form-control" name="company_name[]"   value="<?php echo $work_experience->company_name;  ?>" disabled/>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="col-sm-12">
                                  <label> Job Description:</label>
                                  <textarea id="textarea" class="form-control" name="job_description[]" disabled maxlength="225" rows="3"><?php echo $work_experience->job_description;  ?></textarea>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="col-sm-6">
                                  <label> Start Date</label>
                                  <input type="date" name="experience_start_date[]" disabled value="<?php echo $work_experience->start_date;  ?>" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                  <label> End Date</label>
                                  <input type="date" name="experience_end_date[]" disabled value="<?php echo $work_experience->end_date;  ?>" class="form-control">
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
                            <label> Account Number</label>
                            <input name="employee_account_number" disabled value="<?php echo $employee->employee_account_number; ?>" type="number" class="form-control"/>
                          </div>
                          <div class="col-sm-6">
                            <label>Bank</label>
                            <select class="selectric form-control mb-3 custom-select" required name="employee_bank" style="width: 100%; height:56px;">
                              <?php foreach ($banks as $bank): ?>
                                <option disabled value="<?php echo $bank->bank_id; ?>"<?php if($bank->bank_id == $employee->employee_bank_id){
                                  echo "Selected";
                                } ?>> <?php echo $bank->bank_name; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-6">
                            <label>HMO ID</label>
                            <input name="employee_hmo_number" disabled value="<?php echo $employee->employee_hmo_number; ?>" type="text" class="form-control"/>
                          </div>
                          <div class="col-sm-6">
                            <label>HMO Provider</label>
                            <select class="selectric form-control mb-3 custom-select"  name="employee_hmo_id" style="width: 100%; height:56px;">
                              <?php foreach ($health_insurances as $health_insurance): ?>
                                <option disbaled value="<?php echo $health_insurance->health_insurance_id; ?>" <?php if($health_insurance->health_insurance_id == $employee->employee_hmo_id){
                                  echo "Selected";
                                } ?>> <?php echo $health_insurance->health_insurance_hmo; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-6">
                            <label> Employee PAYE Number</label>
                            <input name="employee_paye_number" disabled type="text" class="form-control" value="<?php echo $employee->employee_paye_number; ?>"/>
                          </div>
                          <div class="col-sm-6">
                            <label>Pensionable?</label>
                            <select class="selectric form-control mb-3 custom-select" name="employee_pensionable" id="employee_pensionable" style="width: 100%; height:56px;">
                              <option disabled value="0" <?php if($employee->employee_pensionable == 0){ echo "selected"; } ?>> No </option>
                              <option disabled value="1" <?php if($employee->employee_pensionable == 1){ echo "selected"; } ?>> Yes </option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <?php if($employee->employee_pensionable == 1): ?>
                            <div class="col-sm-6">
                              <label> Pension Number</label>
                              <input name="employee_pension_number" disabled value="<?php echo $employee->employee_pension_number ?>" type="text" class="form-control"/>
                            </div>
                            <div class="col-sm-6">
                              <label>Pension Administrator</label>
                              <select class="selectric form-control mb-3 custom-select" name="employee_pension_id" style="width: 100%; height:56px;">
                                <?php foreach ($pensions as $pension): ?>
                                  <option disabled value="<?php echo $pension->pension_id; ?>" <?php if($pension->pension_id == $employee->employee_pension_id){
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
                            <label>NYSC Pass Out Number</label>
                            <input name="nysc_pass_out" disabled type="number" class="form-control" value="<?php echo $employee->employee_nysc_details; ?>"/>
                          </div>
                          <div class="col-sm-6">
                            <label>Employment Status</label>
                            <select class="selectric form-control mb-3 custom-select" required name="employment_status" style="width: 100%; height:56px;">
                              <option disabled value="0" <?php if($employee->employee_status == 0){echo "selected" ;} ?>> Fired </option>
                              <option disabled value="1" <?php if($employee->employee_status == 1){echo "selected" ;} ?>> Probationary </option>
                              <option disabled value="2" <?php if($employee->employee_status == 2){echo "selected" ;} ?>> Confirmed </option>
                              <option disabled value="3" <?php if($employee->employee_status == 3){echo "selected" ;} ?>> Retired</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-6">
                            <label> Employment Start Date</label>
                            <input type="date" name="employment_start_date" value="<?php echo $employee->employee_employment_date; ?>" disabled class="form-control">
                          </div>
                          <div class="col-sm-6">
                            <label>Employment Stop Date</label> <br>
                            <input type="date" name="employment_stop_date" value="<?php echo $employee->employee_stop_date; ?>" disabled class="form-control">
                          </div>
                        </div>
                        <div class="modal-footer"></div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="card-footer bg-whitesmoke"></div>
              </div>
            </div>
          </div>
        </div>
      </section>
		</div>
    <div class="modal fade bd-example-modal-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5>Uploaded Documents</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">x</span>
            </button>
          </div>
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
          <div class="modal-footer bg-whitesmoke">
            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
          </div>
        </div>
      </div>
    </div>
	</div>
</div>
<?php include(APPPATH.'\views\footer.php'); ?>
<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>
