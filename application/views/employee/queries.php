<?php
  include(APPPATH.'/views/stylesheet.php');
  $CI =& get_instance();
  $CI->load->model('hr_configurations');
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
          <div class="section-header-back">
            <a href="<?php echo site_url('employee')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
          <h1>Employee Queries</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
			      <div class="breadcrumb-item active"><a href="<?php echo base_url('employees'); ?>">Manage Employees</a></div>
            <div class="breadcrumb-item">Employee Queries</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About <?php echo $employee->employee_last_name." ".$employee->employee_first_name; ?> Queries</div>
          <p class="section-lead">You can manage employee queries here</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>All Employee Queries</h4>
                  <div class="card-header-action">
                    <button type="button" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#new_query"><i class="fa fa-plus"></i> Start Query</button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-bordered table-striped table-md">
                      <thead>
                        <tr>
                          <th>Query Subject</th>
                          <th>Query Type</th>
                          <th>Query Date</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if(!empty($queries)):
                        foreach($queries as $query):
                          ?>
                          <tr>
                            <td><?php echo $query->query_subject; ?></td>
                            <td><b><?php if($query->query_type == 0) { echo "Warning";} if($query->query_type == 1) { echo "Query";}?></b></td>
                            <td><?php echo date("Y-m-d", strtotime($query->query_date));?></td>
                            <td>
                              <?php if($query->query_status == 1): ?>
                                <div class="badge badge-warning">Opened</div>
                              <?php elseif ($query->query_status == 0):?>
                                <div class="badge badge-danger">Closed</div>
                              <?php endif;?>
                            </td>
                            <td class="text-center" style="width: 9px">
                              <div class="dropdown">
                                <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item has-icon" href="<?php echo site_url('view_query').'/'.$query->query_id; ?>"><i class="fas fa-eye"></i>View Query</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                        <?php endforeach;
                      endif; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer text-right bg-whitesmoke">
                  <button onclick="location.href='<?php echo site_url('employee');?>'" class="btn btn-danger" type="button">Go Back</button>
                </div>
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
  $('title').html('Employee Queries - IHUMANE');
</script>

<div class="modal fade bd-example-modal-lg" id="new_query" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLongTitle2">Start Query</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-dark">&times;</span>
				</button>
			</div>
			<form class="needs-validation" novalidate method="post" action="<?php echo site_url('new_query'); ?>">
				<div class="modal-body">
					<div class="form-group">
						<label>Subject</label><span style="color: red"> *</span>
						<input type="text" class="form-control" name="query_subject" required/>
            <div class="invalid-feedback">
              please fill in a subject
            </div>
					</div>
					<div class="form-group">
						<label>Query Type</label><span style="color: red"> *</span>
						<select class="select2 form-control"  required name="query_type" style="width: 100%; height:42px !important;">
              <option value="">-- Select --</option>
              <option value="0"> Warning </option>
							<option value="1"> Query </option>
						</select>
						<div class="invalid-feedback">
							please select a query type
						</div>
					</div>
					<div class="form-group">
            <label>Query Body</label><span style="color: red"> *</span>
            <textarea class="summernote-simple" required name="query_body"></textarea>
            <div class="invalid-feedback">
              please fill in a query body
            </div>
					</div>
          <input type="hidden" name="employee_id" value="<?php echo $employee->employee_id; ?>">
					<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
				</div>
				<div class="modal-footer bg-whitesmoke">
          <button type="submit" class="btn btn-success">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
