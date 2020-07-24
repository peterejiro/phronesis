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
					<h1>Pension Rate</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Pension Rate</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Pension Rate</div>
          <p class="section-lead">You can manage the pension rate here</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Pension Rate</h4>
	                <?php if(empty($pension_rates)): ?>
                    <div class="card-header-action">
                      <button data-toggle="modal" data-target="#add_pension_rate" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i>Setup Pension Rate</button>
                    </div>
	                <?php endif; ?>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-bordered table-md">
                      <thead>
                        <tr>
                          <th>Pension Rate (%)</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
		                  <?php if(!empty($pension_rates)):
			                  foreach($pension_rates as $pension_rate):
				                  ?>
                          <tr>
                            <td><?php echo $pension_rate->pension_rate; ?></td>
                            <td class="text-center" style="width: 9px">
                              <div class="dropdown">
                                <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item has-icon" href="#" data-toggle="modal" data-target="#edit_pension_rate<?php echo $pension_rate->pension_rate_id; ?>"><i class="fas fa-edit"></i>Update Pension Rate</a>
                                </div>
                              </div>
                            </td>
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

<div class="modal fade" id="add_pension_rate" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle2">Add Pension Rate</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-dark">&times;</span>
				</button>
			</div>
			<form class="needs-validation" novalidate method="post" action="<?php echo site_url('add_pension_rate'); ?>">
				<div class="modal-body">
					<div class="form-group">
            <label>Pension Rate (%)</label><span style="color: red"> *</span>
            <input name="pension_rate" type="number" required class="form-control"/>
            <div class="invalid-feedback">
              please fill in a pension rate
            </div>
					</div>
					<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
				</div>
				<div class="modal-footer bg-whitesmoke">
					<button type="submit" class="btn btn-primary">Add Pension Rate</button>
					<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>


<?php if(!empty($pension_rates)):
	foreach($pension_rates as $pension_rate):
		?>
		<div class="modal fade" id="edit_pension_rate<?php echo $pension_rate->pension_rate_id ?>" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle2">Update Pension Rate</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true" class="text-dark">&times;</span>
						</button>
					</div>
					<form class="needs-validate" novalidate method="post" action="<?php echo site_url('update_pension_rate'); ?>">
						<div class="modal-body">
							<div class="form-group">
								<label>Pension Rate (%)</label><span style="color: red"> *</span>
								<input name="pension_rate" type="number" class="form-control" required value="<?php echo $pension_rate->pension_rate; ?>"/>
                <div class="invalid-feedback">
                  please fill in a pension rate
                </div>
							</div>
							<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
							<input type="hidden" name="pension_rate_id" value="<?php echo $pension_rate->pension_rate_id; ?>">
						</div>
						<div class="modal-footer bg-whitesmoke">
							<button type="submit" class="btn btn-primary">Update Pension Rate</button>
							<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
						</div>
					</form>
        </div>
			</div>
		</div>
	<?php endforeach;
endif;
?>
<?php include(APPPATH.'/views/footer.php'); ?>
<?php include(APPPATH.'/views/js.php'); ?>
</body>
</html>


