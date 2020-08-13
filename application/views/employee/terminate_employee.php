<?php include(APPPATH.'/views/stylesheet.php'); ?>

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
					<h1> Terminate Employee </h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="<?php echo site_url('employee')?>"> Manage Employees</a></div>
            <div class="breadcrumb-item">Terminate Employee</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Terminating Employees</div>
          <p class="section-lead">You can terminate an employee here</p>
          <div class="row">
            <div class="col-md-7">
              <form method="post" data-persist="garlic" action="<?php echo site_url('terminate'); ?>" class="needs-validation" novalidate id="terminate_form">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Termination Form</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
						          <label>Employee</label>
                      <input type="text" class="form-control" readonly value="<?php echo $employee->employee_first_name." ".$employee->employee_last_name; ?>"/>
                    </div>
                    <div class="form-group">
                      <label>Termination Reason</label><span style="color: red"> *</span>
                      <textarea class="form-control summernote-simple" name="termination_reason" autofocus></textarea>
                      <div class="invalid-feedback">
                        please enter a termination reason
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-4">
                        <label for="employee-start-date">Effective Date</label><span style="color: red"> *</span>
                        <input id="employee-start-date" type="date" name="termination_effective_date" required class="form-control" placeholder="mm/dd/yyyy">
                        <div class="invalid-feedback">
                          please fill in an effective date
                        </div>
                      </div>
                      <input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
                      <input type="hidden" name="termination_employee_id" value="<?php echo $employee_id;?>" />
                    </div>
                  </div>
                  <div class="card-footer text-right bg-whitesmoke">
                    <button type="button" class="btn btn-primary" id="sa-paramss">Terminate Employee</button>
                    <button onclick="location.href='<?php echo site_url('employee');?>'" class="btn btn-danger" type="button">Go Back</button>
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
<?php include(APPPATH.'/views/footer.php'); ?>
<?php include(APPPATH.'/views/js.php'); ?>
</body>
</html>
<script>
  $('title').html('Terminate Employee - IHUMANE')

  $(document).ready(function () {

		$('#sa-paramss').click(function () {
			swal({
				title: 'Are you sure?',
				text: 'Action Cannot be reversed!',
				icon: 'warning',
				buttons: true,
				dangerMode: true,
			}).then((willDelete) => {
				if (willDelete) {
					$("#terminate_form").submit();
				} else {
					swal('Action Canceled!', { icon: 'error' });
				}
			});
		});
	});
</script>
