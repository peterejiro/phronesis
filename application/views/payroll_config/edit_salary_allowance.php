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
            <a href="<?php echo site_url('allowance')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
					<h1>Edit Salary Allowance</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="<?php echo site_url('allowance'); ?>">Salary Allowances</a></div>
            <div class="breadcrumb-item">Edit Salary Allowance</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Editing Salary Allowances</div>
          <p class="section-lead">You can fill in the form to edit a salary allowance here</p>
          <div class="row">
            <div class="col-12">
              <form class="needs-validation" novalidate method="post" action="<?php echo site_url('update_salary_allowance'); ?>">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Salary Allowance Form</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label> Salary Structure Category</label><span style="color: red"> *</span>
                        <select id="payment_type" class="select2 form-control" required name="salary_structure_category" style="width: 100%; height:42px !important;">
                          <option value=""> -- Select -- </option>
				                  <?php foreach ($salary_structures as $salary_structure): ?>
                            <option value="<?php echo $salary_structure->salary_structure_id; ?>>" <?php if($allowance->salary_structure_category_id == $salary_structure->salary_structure_id) { echo "selected"; } ?>> <?php echo $salary_structure->salary_structure_category_name; ?> </option>
				                  <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                          please select a salary structure category
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label>Payment Definition</label><span style="color: red"> *</span>
                        <select class="select2 form-control" required name="payment_definition" style="width: 100%; height:42px !important;">
                          <option value=""> -- Select -- </option>
			                    <?php foreach ($payment_definitions as $payment_definition):
				                    if($payment_definition->payment_definition_type == 1):?>
                              <option value="<?php echo $payment_definition->payment_definition_id ?>" <?php if($allowance->payment_definition_id == $payment_definition->payment_definition_id) { echo "selected"; } ?>> <?php echo $payment_definition->payment_definition_payment_name." (".$payment_definition->payment_definition_payment_code.")"; ?> </option>
				                    <?php
				                    endif;
			                    endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                          please select a payment definition
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <label> Amount:</label><span style="color: red"> *</span>
                        <input name="allowance_amount" type="number" required class="form-control" value="<?php echo $allowance->salary_structure_allowance_amount; ?>"/>
                        <div class="invalid-feedback">
                          please fill in an amount
                        </div>
                      </div>
                    </div>
                    <input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
                    <input type="hidden" name="salary_structure_allowance_id" value="<?php echo $allowance->salary_structure_allowance_id ?>">
                  </div>
                  <div class="card-footer text-right bg-whitesmoke">
                    <button type="submit" class="btn btn-primary">Update Salary Allowance</button>
                  </div>
                </div>
              </form>
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
