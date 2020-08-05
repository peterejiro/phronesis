<?php
  include(APPPATH.'/views/stylesheet.php');
  $CI =& get_instance();
  $CI->load->model('hr_configurations');
  $CI->load->model('employees');
?>

<body>
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>
		<?php include(APPPATH.'/views/topbar.php'); ?>
		<?php include(APPPATH.'/views/sidebar.php'); ?>
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1>Employee Trainings</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Employee Trainings</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Employee Trainings</div>
          <p class="section-lead">You can manage employee trainings here</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>All Trainings</h4>
                  <div class="card-header-action">
                    <button onclick="location.href='<?php echo site_url('new_employee_training')?>'" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Initiate Training</button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-bordered table-striped table-md">
                      <thead>
                      <tr>
                        <th>Employee Name</th>
												<th> Training </th>
                        <th>Training Period</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php if(!empty($trainings)):
                        foreach($trainings as $training):
                          ?>
                          <tr>
                            <td><?php echo $training->employee_last_name." ".$training->employee_first_name; ?></td>
							  						<td><?php echo $training->training_name; ?></td>
                            <td><?php echo date("j M Y", strtotime($training->employee_training_start_date))." - ".date("j M Y", strtotime($training->employee_training_end_date)) ; ?></td>
                            <td>
                              <?php if($training->employee_training_status == 0): ?>
                                <div class="badge badge-warning">Pending</div>
                              <?php endif;
							  							if($training->employee_training_status == 1):?>
                                <div class="badge badge-dark">Completed</div>
                              <?php endif;
															if($training->employee_training_status == 2):?>
																<div class="badge badge-dark">Abandoned</div>
															<?php endif;?>
                            </td>
                            <td class="text-center" style="width: 9px">
                              <?php if($training->employee_training_status == 0):
                                echo "No Actions";
                              else:?>
                                <div class="dropdown">
                                  <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item has-icon" href="<?php echo site_url('view_training_result').'/'.$training->employee_training_id; ?>"><i class="fa fa-eye"></i>View Test Result</a>
                                  </div>
                                </div>
                              <?php endif; ?>
                            </td>
                          </tr>
                        <?php
                        endforeach;
                      endif; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer bg-whitesmoke"></div>
              </div>
            </div>
          </div>
        </div>
      </section>
		</div>
	</div>
</div>
<?php include(APPPATH.'/views/footer.php'); ?>
<?php include(APPPATH.'/views/js.php'); ?>
</body>
</html>
<script>
	$('title').html('Employee Trainings - IHUMANE')
</script>
