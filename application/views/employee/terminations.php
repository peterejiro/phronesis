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
					<h1>Employee Terminations</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Employee Terminations</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Viewing Terminations</div>
          <p class="section-lead">You can view appointment termination here</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>All Terminations</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="datatable-buttons-2" class="table table-striped table-bordered table-md">
                      <thead>
                        <tr>
                          <th>Employee ID</th>
                          <th>Employee Name</th>
                          <th>Termination Reason</th>
                          <th>Effective Date</th>
                        </tr>
                      </thead>
                      <tbody>
		                  <?php if(!empty($terminations)):
			                  foreach($terminations as $termination):
				                  ?>
                          <tr>
                            <td><?php echo $termination->employee_unique_id; ?></td>
                            <td><?php echo $termination->employee_last_name." ".$termination->employee_first_name." ".$termination->employee_other_name; ?></td>
                            <td><?php echo $termination->termination_reason; ?></td>
                            <td><?php echo date('l, j F Y', strtotime($termination->termination_effective_date));?></td>
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
<?php include(APPPATH.'\views\footer.php'); ?>
<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>
