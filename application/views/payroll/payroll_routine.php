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
					<h1>Payroll Routine </h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Payroll Routine</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Payroll Routines</div>
          <p class="section-lead">You can run payroll routines here</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Payroll Routines</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped table-md" id="datatable-buttons">
                      <thead>
                        <tr>
                          <th>Month and Year</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(!empty($payroll_year)): ?>
                          <tr>
                            <td><?php echo date("F", mktime(0, 0, 0, $payroll_year->payroll_month_year_month, 10))." ".$payroll_year->payroll_month_year_year; ?></td>
                            <td class="text-center" style="width: 9px">
                              <div class="dropdown">
                                <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item has-icon" href="<?php echo site_url('run_payroll_routine')?>">
                                    <i class="fas fa-chart-line"></i> Run Payroll Routine
                                  </a>
                                </div>
                              </div>
                            </td>
                          </tr>
                        <?php endif; ?>
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
  $('title').html('Payroll Routine - IHUMANE')

</script>
