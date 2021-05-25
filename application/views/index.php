<?php
include('stylesheet.php');
$location = 'Abuja';
$key = '4bbd388761052d71725bcd55680d1d0c';
$url = "https://api.openweathermap.org/data/2.5/weather?q=".$location."&appid=".$key."&units=metric";
//"https://api.openweathermap.org/data/2.5/weather?q=Abuja&appid=4bbd388761052d71725bcd55680d1d0c&units=metric"
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
?>
<body>
<div id="app">
  <div class="main-wrapper">
    <div class="navbar-bg"></div>
		<?php include('topbar.php'); ?>
		<?php include('sidebar.php'); ?>
    <div class="main-content">
      <section class="section">
        <div class="section-header">
          <h1>Dashboard</h1>
        </div>
        <div class="section-body">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-md-6 col-12">
              <div class="card pt-3" style="height: 195px; border-radius: 12px">
                <div class="card-body">
                  <h5 class="card-title">Hello, <?php echo $user_data->user_name; ?>!</h5>
                  <p class="card-text">Welcome back. You have <?php echo count($notifications)?> notifications.</p>
									<?php if($employee_management == 1):?>
                    <a href="<?php echo site_url('employee') ?>" class="btn btn-primary">Manage Employees</a>
									<?php elseif($payroll_management == 1):?>
                    <a href="<?php echo site_url('employee_salary_structure') ?>" class="btn btn-primary">Manage Salary Structures</a>
									<?php elseif($user_management == 1):?>
                    <a href="<?php echo site_url('user') ?>" class="btn btn-primary">Manage Users</a>
									<?php endif;?>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-md-6 col-12">
              <div class="card card-statistic-2" style="border-radius: 12px;">
                <div class="card-stats" >
                  <div class="card-stats-title" style="border-radius: 12px; !important;">Company Overview
<!--                    --->
<!--                    <div class="dropdown d-inline">-->
<!--                      <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">App Config</a>-->
<!--                      <ul class="dropdown-menu dropdown-menu-sm">-->
<!--                        <li class="dropdown-title">App Config</li>-->
<!--                        <li><a href="#" class="dropdown-item">Company Settings</a></li>-->
<!--                        <li><a href="#" class="dropdown-item">Manage Subscription</a></li>-->
<!--                      </ul>-->
<!--                    </div>-->
                  </div>
                  <div class="card-stats-items" style="border-radius: 12px;">
                    <div class="card-stats-item">
                      <div class="card-stats-item-count" style="cursor: pointer;" onclick="location.href = '<?php echo site_url('department')?>'"><?php echo count($departments);?></div>
                      <div class="card-stats-item-label">Departments</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count" style="cursor: pointer;" onclick="location.href = '<?php echo site_url('user')?>'"><?php echo count($users); ?></div>
                      <div class="card-stats-item-label">Users</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count" style="cursor: pointer" data-toggle="modal" data-target="#online"><?php echo count($online_users); ?></div>
                      <div class="card-stats-item-label">Online</div>
                    </div>
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Employees</h4>
                  </div>
                  <div class="card-body" style="cursor: pointer;" onclick="location.href = '<?php echo site_url('employee')?>'">
										<?php echo count($employees); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-md-6 col-12">
              <div class="card card-hero" style="height: 195px; border-radius: 12px;">
                <div class="card-header" style="height: 195px; border-radius: 12px; padding-top: 25px !important; padding-left: 30px !important;">
									<?php if($response): $response = json_decode($response); //print_r($response); ?>
                    <div class="media">
                      <div class="media-body">
                        <h4  class="media-title text-white"><?php echo $location?></h4>
                        <small class="text-job text-white"><?php echo $response->weather[0]->description?></small>
                        <h2><?php echo $response->main->temp?>&#176;</h2>
                        <h6 class="text-white" id="timestamp"><?php echo date('D j M, Y g:i:s a', now('Africa/Lagos'));?></h6>
                      </div>
                      <div class="media-right">
                        <a class="text-white" href="javascript:void(0)" data-toggle="modal" data-target="#details"><i class="text-white fa fa-ellipsis-h"></i></a>
                      </div>
                    </div>
									<?php else:?>
                    <h1><?php echo date('D j')?></h1>
                    <h4><?php echo date('F')?></h4>
                    <h6 class="mt-2"><?php echo date('Y')?></h6>
									<?php endif?>
                </div>
              </div>
            </div>
          </div>
					<?php if($payroll_management == 1):?>
            <div class="row">
              <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                <div class="card" style="border-radius: 12px;">
                  <div class="card-header">
                    <h4>Payroll Overview</h4>
                    <div class="card-header-action">
                      <a href="<?php echo site_url('payroll_report') ?>" class="btn btn-primary">Payroll Reports</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <canvas id="myChart1" height="160"></canvas>
                    <div class="statistic-details mt-sm-4">
                      <div class="statistic-details-item">
                        <div class="detail-value"><span class="text-primary"><i class="fas fa-circle" style="font-size: 6px;"></i></span> &#8358;<?php echo number_format($total_income_month)?></div>
                        <div class="detail-name">This Month's Payments</div>
                      </div>
                      <div class="statistic-details-item">
                        <div class="detail-value"><span class="text-danger"><i class="fas fa-circle" style="font-size: 6px;"></i></span> &#8358;<?php echo number_format($total_deduction_month)?></div>
                        <div class="detail-name">This Month's Deductions</div>
                      </div>
                      <div class="statistic-details-item">
                        <div class="detail-value"><span class="text-primary"><i class="fas fa-circle" style="font-size: 6px;"></i></span> &#8358;<?php echo number_format($total_income_year)?></div>
                        <div class="detail-name">This Year's Payments</div>
                      </div>
                      <div class="statistic-details-item">
                        <div class="detail-value"><span class="text-danger"><i class="fas fa-circle" style="font-size: 6px;"></i></span> &#8358;<?php echo number_format($total_deduction_year)?></div>
                        <div class="detail-name">This Year's Deductions</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                <div class="list-group-item flex-column align-items-start p-4 mb-4" style="border-radius: 12px; border: none">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-4">Loan Management</h5>
                    <div class="dropleft">
                      <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item has-icon" href="<?php echo site_url('new_loan') ?>"><i class="fas fa-plus"></i>New Loan</a>
                        <a class="dropdown-item has-icon" href="<?php echo site_url('loans') ?>"><i class="fas fa-edit"></i>Manage Loans</a>
                      </div>
                    </div>
                  </div>
                  <p class="mb-1 font-weight-600"><?php echo $pending_loans?> Pending Loan Requests</p>
                  <small><?php echo $running_loans?> Running Loans </small>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="card" style="border-radius: 12px; cursor: pointer" onclick="location.href = '<?php echo site_url('employee_salary_structure')?>'">
                      <div class="card-body text-center">
                        <h4 class="display-4 mt-2"><?php echo $personalized_employees ?></h4>
                        <h6>Personalized</h6>
                        <small>Salary Structures</small>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="card" style="border-radius: 12px; cursor: pointer" onclick="location.href = '<?php echo site_url('employee_salary_structure')?>'">
                      <div class="card-body text-center">
                        <h4 class="display-4 mt-2"><?php echo $categorized_employees ?></h4>
                        <h6>Categorized</h6>
                        <small>Salary Structures</small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="card" style="border-radius: 12px; cursor: pointer" onclick="location.href = '<?php echo site_url('variational_payment')?>'">
                      <div class="card-body text-center">
                        <h4 class="display-4 mt-2"><?php echo $variational_payments ?></h4>
                        <h6>Variational</h6>
                        <small>Payments</small>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
										<?php if($is_payroll_routine_run): ?>
                      <div class="alert alert-success alert-has-icon" style="border-radius: 12px;">
                        <div class="alert-icon"><i class="far fa-check-circle"></i></div>
                        <div class="alert-body">
                          <div class="alert-title">Routine</div>
                          You have run this month's Payroll Routine. Generate report <a class="font-weight-bold font-italic" href="<?php echo site_url('emolument') ?>">here</a>
                        </div>
                      </div>
										<?php else:?>
                      <div class="alert alert-warning alert-has-icon" style="border-radius: 12px;">
                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                        <div class="alert-body">
                          <div class="alert-title">Routine</div>
                          You have not run this month's Payroll Routine. Run it <a class="font-weight-bold font-italic" href="<?php echo site_url('payroll_routine') ?>">here</a>.
                        </div>
                      </div>
										<?php endif?>
                  </div>
                </div>
              </div>
            </div>
					<?php endif;?>
					<?php if($employee_management == 1):?>
            <div class="row">
              <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                <div class="row">
                  <div class="col-3">
                    <div class="card" style="border-radius: 12px; cursor: pointer" onclick="location.href = '<?php echo site_url('employee_queries')?>'">
                      <div class="card-body text-center">
                        <h4 class="display-4 mt-2"><?php echo $open_queries ?></h4>
                        <h6>Queries</h6>
                        <small>Open</small>
                      </div>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="card" style="border-radius: 12px; cursor: pointer" onclick="location.href = '<?php echo site_url('employee_trainings')?>'">
                      <div class="card-body text-center">
                        <h4 class="display-4 mt-2"><?php echo $pending_trainings ?></h4>
                        <h6>Trainings</h6>
                        <small>Pending</small>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="list-group-item flex-column align-items-start p-4 mb-4" style="border-radius: 12px; border: none">
                      <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-4">Employee Appraisals</h5>
                        <div class="dropleft">
                          <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                          <div class="dropdown-menu">
                            <a class="dropdown-item has-icon" href='<?php echo site_url('new_employee_appraisal')?>'><i class="fas fa-plus"></i>New Appraisal</a>
                            <a class="dropdown-item has-icon" href="<?php echo site_url('employee_appraisal') ?>"><i class="fas fa-edit"></i>Manage Appraisals</a>
                          </div>
                        </div>
                      </div>
                      <p class="mb-1 font-weight-600"><?php echo $running_appraisals?> Running Appraisals</p>
                      <small><?php echo $finished_appraisals?> Finished Appraisals</small>
                    </div>
                  </div>
                </div>
                <form method="post" action="<?php echo site_url('add_memo') ?>" class="needs-validation" novalidate enctype="multipart/form-data">
                  <div class="card" style="border-radius: 12px">
                    <div class="card-header">
                      <h4>New Announcement</h4>
                      <div class="card-header-action">
                        <a href="<?php echo site_url('memo') ?>" class="btn btn-primary">View Announcements</a>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Subject</label><span style="color: red"> *</span>
                        <input type="text" class="form-control" name="memo_subject" required/>
                        <div class="invalid-feedback">
                          please fill in a subject
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Announcement Body</label><span style="color: red"> *</span>
                        <textarea class="summernote form-control" required name="memo_body"></textarea>
                        <div class="invalid-feedback">
                          please fill in a body
                        </div>
                      </div>
                      <input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
                      <div class=" text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </div>
                </form>

              </div>
              <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                <div class="card" style="border-radius: 12px">
                  <div class="card-body">
                    <div class="summary">
                      <div class="summary-info">
                        <h4><?php echo $pending_leaves?> Pending Requests</h4>
                        <div class="text-muted"><?php echo $approved_leaves?> Running and <?php echo $finished_leaves?> Finished.</div>
                        <div class="d-block mt-2">
                          <a href="<?php echo site_url('employee_leave') ?>">View Leaves</a>
                        </div>
                      </div>
                      <div class="summary-item">
                        <h6>Employees on Leave</h6>
                        <ul class="list-unstyled list-unstyled-border">
													<?php if (!empty($upcoming_leaves)):?>
														<?php foreach($upcoming_leaves as $upcoming_leave):?>
                              <li class="media">
                                <a href="#">
                                  <img class="mr-3 rounded" width="50" src="<?php echo base_url().'uploads/employee_passports/'.$upcoming_leave->employee_passport?>" alt="passport">
                                </a>
                                <div class="media-body">
                                  <div class="media-right">
                                    <div class="dropleft">
                                      <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item has-icon" href="<?php echo site_url('extend_leave').'/'.$upcoming_leave->employee_leave_id; ?>"><i class="fas fa-plane-departure"></i>Extend Leave</a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="media-title"><a href="<?php echo site_url('view_employee').'/'.$upcoming_leave->employee_id; ?>"><?php echo $upcoming_leave->employee_first_name.' '.$upcoming_leave->employee_last_name?></a></div>
                                  <div class="text-muted text-small"><a href="<?php echo site_url('leave') ?>"><?php echo $upcoming_leave->leave_name?></a> <div class="bullet"></div> Starts <?php echo date('j/m/Y', strtotime($upcoming_leave->leave_start_date));?></div>
                                </div>
                              </li>
														<?php endforeach;?>
													<?php endif?>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card" style="border-radius: 12px;">
                  <div class="card-header">
                    <h4>Documents</h4>
                    <div class="card-header-action">
                      <a href="<?php echo site_url('hr_documents') ?>" class="btn btn-primary">View All</a>
                    </div>
                  </div>
                  <div class="card-body">
										<?php if(!empty($hr_documents)):?>
                      <div class="owl-carousel owl-theme" id="documents-carousel">
												<?php foreach($hr_documents as $hr_document):
													$img;
													$link = strtolower($hr_document->hr_document_link);
													if (strpos($link, '.docx') !== false || strpos($link, '.doc') !== false):
														$img = base_url().'assets/img/icons/doc.svg';
                          elseif (strpos($link, '.pdf') !== false):
														$img =  base_url().'assets/img/icons/pdf.svg';
                          elseif (strpos($link, '.png') !== false || strpos($link, '.jpg') !== false || strpos($link, '.jpeg') !== false):
														$img =  base_url().'assets/img/icons/img.svg';
													else:
														$img =  base_url().'assets/img/icons/other.svg';
													endif;
													?>
                          <div class="user-item">
                            <img alt="image" src="<?php echo $img; ?>" class="rounded" width="50" height="50">
                            <div class="user-details">
                              <div class="user-name"><?php echo $hr_document->hr_document_name?></div>
                              <div class="text-job text-muted"><?php echo date('M j, Y g:i a', strtotime($hr_document->hr_document_date))?></div>
                              <div class="user-cta">
                                <a href="<?php echo site_url('view_hr_document').'/'.$hr_document->hr_document_id; ?>" class="btn btn-outline-primary btn-sm">View</a>
                              </div>
                            </div>
                          </div>
												<?php endforeach;?>
                      </div>
										<?php endif;?>
                  </div>
                </div>
              </div>
            </div>
					<?php endif;?>
          <div class="row">
            <div class="col-md-6">
              <div class="card" style="border-radius: 12px;">
                <div class="card-body">
                  <div class="summary">
                    <div class="summary-info">
                      <h4><?php echo count($present_employees)?> Employees Clocked In</h4>
                      <div class="text-muted"><?php echo (count($employees) - count($present_employees))?> Employees Absent</div>
                      <div class="d-block mt-2">
                        <a href="<?php echo site_url('today_present') ?>">View Today's Attendance</a>
                      </div>
                    </div>
                    <div class="summary-item">
                      <h6>Recently Clocked In</h6>
                      <ul class="list-unstyled list-unstyled-border">
		                    <?php if (!empty($present_employees)): $count=0; ?>
			                    <?php foreach($present_employees as $present_employee): if($count<=5):?>
                            <li class="media">
                              <a href="#">
                                <img class="mr-3 rounded" width="50" height="50" src="<?php echo base_url(); ?>uploads/employee_passports/<?php echo $present_employee->employee_passport; ?>" alt="passport">
                              </a>
                              <div class="media-body">
                                <div class="media-right">
                                  <small style="font-size: 12px;"><?php echo timespan(strtotime($present_employee->employee_biometrics_login_time), now('Africa/Lagos'), 2)?> ago</small>
                                </div>
                                <div class="media-title"><a href="javascript:void(0)"><?php echo $present_employee->employee_first_name . " " . $present_employee->employee_last_name; ?></a></div>
                                <div class="text-muted text-small"><a href="javascript:void(0)"><?php echo $present_employee->employee_unique_id?></a> <div class="bullet"></div> Clocked in <?php echo date('g:i:s a', strtotime($present_employee->employee_biometrics_login_time)); ?></div>
                              </div>
                            </li>
			                    <?php endif; $count++; endforeach;?>
		                    <?php endif?>
                      </ul>
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
<div class="modal fade" id="details" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle2">Today</h5>
        <a type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-dark">&times;</span>
        </a>
      </div>
      <div class="modal-body">
				<?php if($response):  //print_r($response); ?>
          <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
            <li class="media">
              <div class="media-body">
                <div class="media-title"><?php echo $location?></div>
                <div class="text-job text-muted"><?php echo $response->weather[0]->description?></div>
                <h2><?php echo $response->main->temp?>&#176;</h2>
              </div>
              <div class="media-right pb-3">
                <i class="fa fa-cloud-sun text-muted" style="font-size: 90px"></i>
              </div>
            </li>
            <li class="media text-center">
              <div class="media-body">
                <div class="media-title"><?php echo date('g:i a', $response->sys->sunrise);?></div>
                <div class="text-job text-muted">Sunrise</div>
              </div>
              <div class="media-body">
                <div class="media-title"><?php echo date('g:i a', $response->sys->sunset);?></div>
                <div class="text-job text-muted">Sunset</div>
              </div>
              <div class="media-body">
                <div class="media-title"><?php echo $response->visibility ?> m</div>
                <div class="text-job text-muted">Visibility</div>
              </div>
            </li>
            <li class="media text-center">
              <div class="media-body">
                <div class="media-title"><?php echo $response->main->temp_min?>&#176;</div>
                <div class="text-job text-muted">Min Temp</div>
              </div>
              <div class="media-body">
                <div class="media-title"><?php echo $response->main->temp_max?>&#176;</div>
                <div class="text-job text-muted">Max Temp</div>
              </div>
              <div class="media-body">
                <div class="media-title"><?php echo $response->main->feels_like?>&#176;</div>
                <div class="text-job text-muted">Feels Like</div>
              </div>
            </li>
            <li class="media text-center">
              <div class="media-body">
                <div class="media-title"><?php echo $response->main->pressure?> hPa</div>
                <div class="text-job text-muted">Pressure</div>
              </div>
              <div class="media-body">
                <div class="media-title"><?php echo $response->main->humidity?> %</div>
                <div class="text-job text-muted">Humidity</div>
              </div>
              <div class="media-body">
                <div class="media-title"><?php echo $response->wind->speed?> mps</div>
                <div class="text-job text-muted">Wind Speed</div>
              </div>
            </li>
          </ul>
				<?php endif;?>
      </div>
      <div class="modal-footer bg-whitesmoke">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="online" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle2">Online</h5>
        <a type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-dark">&times;</span>
        </a>
      </div>
      <div class="modal-body p-0">
        <div class="tickets-list">
	        <?php foreach($online_users as $online_user):?>
            <a href="#" class="ticket-item">
              <div class="ticket-title">
                <h4><?php echo $online_user->user_name?></h4>
              </div>
              <div class="ticket-info">
                <div><?php echo $online_user->user_username?></div>
                <div class="bullet"></div>
                <?php if($online_user->user_type == 1): ?>
                <div class="text-primary">administrator</div>
                <?php elseif($online_user->user_type == 2):?>
                <div class="text-info">employee</div>
                <?php else:?>
                <div class="text-warning">moderator</div>
                <?php endif;?>
              </div>
            </a>
	        <?php endforeach;?>
        </div>
      </div>
      <div class="modal-footer bg-whitesmoke">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php include(APPPATH . '/views/footer.php'); ?>
<?php include('js.php'); ?>
<script>
  $('title').html('Dashboard - Phronesis');
  $(document).ready(function() {
    setInterval(timestamp, 1000);
    statistics();

    //$.ajax({
    //  url: '<?php //echo site_url('count_hr_documents')?>//',
    //  success: function(numDocuments) {
    //
    //  }
    //})
    $("#documents-carousel").owlCarousel({
      // items: numDocuments,
      // margin: 20,
      autoplay: true,
      autoplayTimeout: 5000,
      loop: true,
      // responsive: {
      //   0: {
      //     items: 2
      //   },
      //   578: {
      //     items: numDocuments*2
      //   },
      //   768: {
      //     items: numDocuments*2
      //   }
      // }
    });

    function timestamp() {
      $.ajax({
        url: '<?php echo site_url('timestamp') ?>',
        success: function(data) {
          $('#timestamp').html(data);
        }
      })
    }

    function statistics() {
      $.ajax({
        url: '<?php echo site_url('income_stats')?>',
        success: function(income){
          let income_stats = JSON.parse(income);
          let income_amounts = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
          let i;
          for (i = 0; i < income_stats.length; i++) {
            income_amounts[income_stats[i].salary_pay_month - 1] += parseInt(income_stats[i].salary_amount);
          }
          $.ajax({
            url: '<?php echo site_url('deduction_stats')?>',
            success: function(deductions) {
              let deduction_stats = JSON.parse(deductions);
              let deduction_amounts = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
              let i;
              for (i = 0; i < deduction_stats.length; i++) {
                deduction_amounts[deduction_stats[i].salary_pay_month - 1] += parseInt(deduction_stats[i].salary_amount);
              }
              let statistics_chart = $('#myChart1')[0].getContext('2d');
              let chart = new Chart(statistics_chart, {
                type: 'line',
                data: {
                  labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                  datasets: [{
                    label: 'Income Payments',
                    data: income_amounts,
                    borderWidth: 2,
                    borderColor: '#47c363',
                    backgroundColor: 'transparent',
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#47c363',
                    pointRadius: 1
                  },
                    {
                      label: 'Deductions',
                      data: deduction_amounts,
                      borderWidth: 2,
                      borderColor: '#fc544b',
                      backgroundColor: 'transparent',
                      pointBackgroundColor: '#fff',
                      pointBorderColor: '#fc544b',
                      pointRadius: 1
                    }]
                },
                options: {
                  legend: {
                    display: false
                  },
                  scales: {
                    yAxes: [{
                      gridLines: {
                        display: false,
                        drawBorder: false,
                      },
                      ticks: {
                        stepSize: 1000000,
                        beginAtZero: true,
                      }
                    }],
                    xAxes: [{
                      gridLines: {
                        color: '#fbfbfb',
                        lineWidth: 2
                      }
                    }]
                  },
                }
              })
            }
          })
        }
      })
    }
  });
</script>
</body>

</html>
