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
					<h1>Payment Definitions</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Payment Definitions</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Payment Definitions</div>
          <p class="section-lead">You can manage educational qualification information here</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>All Payment Definitions</h4>
                  <div class="card-header-action">
                    <button onclick="location.href='<?php echo site_url('new_payment_definition');?>'" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Add Payment Definition</button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered table-md">
                      <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Pay Code</th>
                        <th>Payment Name </th>
                        <th>Taxable?</th>
                        <th>Payment Type</th>
                        <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>
		                  <?php if(!empty($payment_definitions)):
			                  $i = 1;
			                  foreach($payment_definitions as $payment_definition):
				                  ?>
                          <tr>
                            <td class="text-center" style="width: 9px;"><?php echo $i; ?></td>
                            <td><?php echo $payment_definition->payment_definition_payment_code; ?></td>
                            <td><?php echo $payment_definition->payment_definition_payment_name; ?></td>
                            <td><?php if($payment_definition->payment_definition_taxable == 1){ echo "Yes" ;}if($payment_definition->payment_definition_taxable == 0){ echo "No" ;} ?></td>
                            <td><?php if($payment_definition->payment_definition_type == 1){ echo "Income" ;}if($payment_definition->payment_definition_type == 0){ echo "Deduction" ;} ?></td>
                            <td class="text-center" style="width: 9px">
                              <div class="dropdown">
                                <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item has-icon" href="<?php echo site_url('edit_payment_definition')."/".$payment_definition->payment_definition_id; ?>"><i class="fas fa-edit"></i>Edit Payment</a>
                                </div>
                              </div>
                            </td>
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
<?php include(APPPATH.'\views\footer.php'); ?>
<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>
