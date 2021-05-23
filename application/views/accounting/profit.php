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
            <a href="<?php echo site_url('payroll_report')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
					<h1> Profit And Loss Report</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="<?php echo site_url('payroll_report')?>">Payroll Reports</a></div>
            <div class="breadcrumb-item">Profit And Loss Report</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Profit And Loss Reports</div>
          <p class="section-lead">You can generate the Profit And Loss sheet for the selected period here</p>
          <div class="row">
            <div class="col-md-7">
              <form method="post" action="" class="needs-validation" novalidate>
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Profit And Loss Report Form</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>From:</label><span style="color: red"> *</span>
                      <input type="date" name="from" class="form-control">
                     
                    </div>
	
					  <div class="form-group">
						  <label>To:</label><span style="color: red"> *</span>
							  <input type="date" name="to" class="form-control">
	
					  </div>
                    
                    <input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
                  </div>
                  <div class="card-footer text-right bg-whitesmoke">
                    <button type="submit" id="loan_button"  class="btn btn-primary">Generate Sheet</button>
                    <button type="button" onclick="location.reload();" class="btn btn-secondary">Reset</button>
                    <button onclick="location.href='<?php echo site_url('accounting_report');?>'" class="btn btn-danger" type="button">Go Back</button>
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
  $('title').html('Profit And Loss Report - Phronesis')
</script>
