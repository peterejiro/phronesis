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
					<h1>Qualification Setup</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Qualification Setup</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Qualification Setup</div>
          <p class="section-lead">You can manage educational qualification information here</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>All Qualifications</h4>
                  <div class="card-header-action">
                    <button data-toggle="modal" data-target="#add_qualification" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Add Qualification</button>
                  </div>
                </div>
                <div class="card-body">
                 <div class="table-responsive">
                   <table id="datatable-buttons" class="table table-striped table-bordered table-md">
                     <thead>
                       <tr>
                         <th>Qualification</th>
                         <th>Actions</th>
                       </tr>
                     </thead>
                     <tbody>
		                 <?php if(!empty($qualifications)):
			                 foreach($qualifications as $qualification):
				                 ?>
                         <tr>
                           <td><?php echo $qualification->qualification_name; ?></td>
                           <td class="text-center" style="width: 9px">
                             <div class="dropdown">
                               <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                               <div class="dropdown-menu">
                                 <a class="dropdown-item has-icon" href="#" data-toggle="modal" data-target="#edit_qualification<?php echo $qualification->qualification_id ?>"><i class="fas fa-edit"></i>Edit Qualification</a>
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
			<div class="modal fade" id="add_qualification" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle2">Add New Qualification</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true" class="text-dark">&times;</span>
							</button>
						</div>
						<form class="needs-validation" novalidate method="post" action="<?php echo site_url('add_qualification'); ?>">
							<div class="modal-body">
								<div class="form-group">
									<label>Qualification</label><span style="color: red"> *</span>
									<input type="text" class="form-control"  name="qualification_name" required/>
                  <div class="invalid-feedback">
                    please fill in a qualification
                  </div>
								</div>
								<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
							</div>
              <div class="modal-footer bg-whitesmoke">
                <button type="submit" class="btn btn-primary">Add Qualification</button>
                <input type="reset" class="btn btn-secondary">
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
						</form>
					</div>
				</div>
			</div>

			<?php foreach($qualifications as $qualification): ?>
				<div class="modal fade" id="edit_qualification<?php echo $qualification->qualification_id ?>" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle2">Edit Qualification</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true" class="text-dark">&times;</span>
								</button>
							</div>
							<form class="needs-validation" novalidate method="post" action="<?php echo site_url('update_qualification'); ?>">
								<div class="modal-body">
									<div class="form-group">
                    <label>Qualification</label><span style="color: red"> *</span>
                    <input type="text" class="form-control"  name="qualification_name" required value="<?php echo $qualification->qualification_name; ?>"/>
                    <div class="invalid-feedback">
                      please fill in a qualification
                    </div>
									</div>
									<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
									<input type="hidden" name="qualification_id" value="<?php echo $qualification->qualification_id;?>" />
								</div>
                <div class="modal-footer bg-whitesmoke">
                  <button type="submit" class="btn btn-primary">Edit Qualification</button>
                  <input type="reset" class="btn btn-secondary">
                  <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
							</form>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
    </div>
	</div>
</div>
<?php include(APPPATH.'/views/footer.php'); ?>
<?php include(APPPATH.'/views/js.php'); ?>
</body>
</html>
<script>
  $('title').html('Qualification Setup - Phronesis')
</script>
