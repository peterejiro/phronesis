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
            <a href="<?php echo site_url('biometrics_report')?>"  class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
					<h1> Present Employees</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="<?php echo site_url('biometrics_report')?>">Attendance Reports</a></div>
            <div class="breadcrumb-item">Present Employees</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Present Employees</div>
          <p class="section-lead">You can generate a report of the employees present on a specific date here</p>
          <div class="row">
            <div class="col-md-7">
              <form method="post"  data-persist="garlic" action="<?php echo site_url('present_employeee'); ?>" class="needs-validation" novalidate>
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Present Employees Form</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Date</label><span style="color: red"> *</span>
						          <input type="text" name="date" class="form-control datepicker" required>
                      <div class="invalid-feedback">
                        please select a date
                      </div>
                    </div>
                    <input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
                  </div>
                  <div class="card-footer text-right bg-whitesmoke">
                    <button type="submit" class="btn btn-primary">Generate Sheet</button>
                    <button type="button" onclick="location.reload();" class="btn btn-secondary">Reset</button>
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
  $('title').html('Present Employees - IHUMANE');
</script>
