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
					<h1>Appraisal Setup</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Appraisal Setup</div>
          </div>
				</div>
				<div class="section-body">
          <div class="section-title">All About Appraisal Setup</div>
          <p class="section-lead">You can select the appraisal assessment you want to setup here</p>
					<div class="row">
						<div class="col-lg-6">
							<div class="card card-large-icons">
								<div class="card-icon bg-primary text-white">
									<i class="fas fa-portrait"></i>
								</div>
								<div class="card-body">
									<h4>Self-Performance Assessment</h4>
                  <p>Setup employee self-assessment questions</p>
									<a href="<?php echo base_url('self_assessment') ?>" class="card-cta">Setup <i class="fas fa-chevron-right"></i></a>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card card-large-icons">
								<div class="card-icon bg-primary text-white">
									<i class="fas fa-balance-scale"></i>
								</div>
								<div class="card-body">
									<h4>Quantitative Assessment</h4>
                  <p>Setup quantitative assessment questions</p>
									<a href="<?php echo base_url('quantitative_assessment'); ?>" class="card-cta">Setup <i class="fas fa-chevron-right"></i></a>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card card-large-icons">
								<div class="card-icon bg-primary text-white">
									<i class="fas fa-percent"></i>
								</div>
								<div class="card-body">
									<h4>Qualitative Assessment</h4>
                  <p>Setup qualitative assessment questions</p>
									<a href="<?php echo base_url('qualitative_assessment'); ?>" class="card-cta">Setup <i class="fas fa-chevron-right"></i></a>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card card-large-icons">
								<div class="card-icon bg-primary text-white">
									<i class="fas fa-search"></i>
								</div>
								<div class="card-body">
									<h4>Supervisor Assessment</h4>
                  <p>Setup supervisor assessment questions</p>
                  <a href="<?php echo base_url('supervisor_assessment'); ?>" class="card-cta">Setup <i class="fas fa-chevron-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<?php include(APPPATH.'\views\footer.php'); ?>
<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>
