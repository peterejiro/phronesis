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
					<h1>Minimum Tax Rate</h1>
					<div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Minimum Tax Rate</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Minimum Tax Rate</div>
          <p class="section-lead">You can manage the minimum tax rate here</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Minimum Tax Rate</h4>
	                <?php if(empty($minimum_tax_rates)): ?>
                    <div class="card-header-action">
                      <button data-toggle="modal" data-target="#add_minimum_tax_rate" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i>Setup Minimum Tax Rate</button>
                    </div>
	                <?php endif; ?>
                </div>
                <div class="card-body">
					        <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered table-md">
                      <thead>
                        <tr>
                          <th>Tax Rate (%)</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
							        <?php if(!empty($minimum_tax_rates)):
								        foreach($minimum_tax_rates as $minimum_tax_rate):
									        ?>
                          <tr>
                            <td><?php echo $minimum_tax_rate->minimum_tax_rate; ?></td>
                            <td class="text-center" style="width: 9px">
                              <div class="dropdown">
                                <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item has-icon" href="#" data-toggle="modal" data-target="#edit_minimum_tax_rate<?php echo $minimum_tax_rate->minimum_tax_rate_id; ?>"><i class="fas fa-edit"></i>Edit Tax Rate</a>
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

<div class="modal fade" id="add_minimum_tax_rate" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle2">Add Minimum Tax Rate</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-dark">&times;</span>
				</button>
			</div>
			<form class="needs-validation" novalidate method="post" action="<?php echo site_url('add_min_tax_rate'); ?>">
				<div class="modal-body">
					<div class="form-group">
						<label>Minimum Tax Rate (%)</label><span style="color: red"> *</span>
						<input  name="minimum_tax_rate" required type="number"	class="form-control"/>
            <div class="invalid-feedback">
              please fill in a minimum tax rate
            </div>
					</div>
					<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
				</div>
				<div class="modal-footer bg-whitesmoke">
					<button type="submit" class="btn btn-primary">Add Tax Rate</button>
					<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>


<?php if(!empty($minimum_tax_rates)):
	foreach($minimum_tax_rates as $minimum_tax_rate):
		?>
		<div class="modal fade" id="edit_minimum_tax_rate<?php echo $minimum_tax_rate->minimum_tax_rate_id ?>" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle2">Edit Tax Rate</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true" class="text-dark">&times;</span>
						</button>
					</div>
					<form class="needs-validation" novalidate method="post" action="<?php echo site_url('update_min_tax_rate'); ?>">
						<div class="modal-body">
							<div class="form-group">
								<label>Minimum Tax Rate (%)</label><span style="color: red"> *</span>
								<input  name="minimum_tax_rate" required type="number" class="form-control" value="<?php echo $minimum_tax_rate->minimum_tax_rate; ?>"/>
                <div class="invalid-feedback">
                  please fill in a minimum tax rate
                </div>
							</div>
							<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
							<input type="hidden" name="minimum_tax_rate_id" value="<?php echo $minimum_tax_rate->minimum_tax_rate_id; ?>">
						</div>
						<div class="modal-footer bg-whitesmoke">
							<button type="submit" class="btn btn-primary">Edit Tax Rate</button>
							<button type="reset" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
						</div>
					</form>
        </div>
			</div>
		</div>
	<?php endforeach;
endif; ?>
<?php include(APPPATH.'/views/footer.php'); ?>
<?php include(APPPATH.'/views/js.php'); ?>
</body>
</html>
<script>
	$('title').html('Minimum Tax Rate - IHUMANE')
</script>
