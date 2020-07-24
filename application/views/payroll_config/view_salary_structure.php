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
            <a href="<?php echo site_url('salary_structure')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
          <h1>Salary Structure Allowances</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="<?php echo site_url('salary_structure'); ?>">Salary Structure Categories</a></div>
            <div class="breadcrumb-item">Salary Structure Allowances</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About <?php echo $salary_structure_category->salary_structure_category_name." Allowances"; ?></div>
          <p class="section-lead">You can view allowances for this salary structure here</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Salary Structure Allowances</h4>
                  <div class="card-header-action">
                    <button onclick="location.href='<?php echo site_url('allowance');?>'" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-list"></i> All Allowances</button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="datatable-buttons-2"  class="table table-striped table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>Payment Name</th>
                          <th>Pay Code</th>
                          <th>Amount</th>
                        </tr>
                      </thead>
                      <tbody>
		                  <?php if(!empty($allowances)):
			                  $i = 1;
			                  foreach($allowances as $allowance):
				                  ?>
                          <tr>
                            <td class="text-center" style="width: 9px;"><?php echo $i; ?></td>
                            <td><?php echo $allowance->payment_definition_payment_name; ?></td>
                            <td><?php echo $allowance->payment_definition_payment_code; ?></td>
                            <td>&#8358; <?php echo number_format($allowance->salary_structure_allowance_amount); ?></td>
                          </tr>
				                  <?php
				                  $i++;
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
