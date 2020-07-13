<?php include(APPPATH.'\views\stylesheet.php'); ?>

<body class="fixed-left">
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>
		<?php include(APPPATH.'\views\topbar.php'); ?>
		<?php include(APPPATH.'\views\sidebar.php'); ?>
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1>Salary Structure Categories</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Salary Structure Categories</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Salary Structure Categories</div>
          <p class="section-lead">You can manage salary structure categories here</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>All Salary Structure Categories</h4>
                  <div class="card-header-action">
                    <button data-toggle="modal" data-target="#add_salary_structure" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Add Salary Structure Category</button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered table-md">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>Salary Category </th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
		                  <?php if(!empty($salary_structures)):
			                  $i = 1;
			                  foreach($salary_structures as $salary_structure):
				                  ?>
                          <tr>
                            <td style="width: 9px;"><?php echo $i; ?></td>
                            <td><?php echo $salary_structure->salary_structure_category_name; ?></td>
                            <td class="text-center" style="width: 9px">
                              <div class="dropdown">
                                <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item has-icon" href="<?php echo site_url('view_salary_structure')."/".$salary_structure->salary_structure_id;?>"><i class="fas fa-eye"></i>View Category</a>
                                  <a class="dropdown-item has-icon" href="#" data-toggle="modal" data-target="#edit_salary_structure<?php echo $salary_structure->salary_structure_id ?>"><i class="fas fa-edit"></i>Edit Category</a>
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

<div class="modal fade" id="add_salary_structure" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle2">Add New Salary Structure</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-dark">&times;</span>
				</button>
			</div>
			<form class="needs-validation" novalidate method="post" action="<?php echo site_url('add_salary_structure'); ?>">
				<div class="modal-body">
					<div class="form-group">
						<label>Category Name</label><span style="color: red"> *</span>
						<input type="text" class="form-control"  name="salary_structure_name" required />
            <div class="invalid-feedback">
              please fill in a category name
            </div>
					</div>
					<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
				</div>
        <div class="modal-footer bg-whitesmoke">
          <button type="submit" class="btn btn-primary">Add Salary Structure</button>
          <input type="reset" class="btn btn-secondary">
          <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
			</form>
		</div>
	</div>
</div>

<?php foreach($salary_structures as $salary_structure): ?>
	<div class="modal fade" id="edit_salary_structure<?php echo $salary_structure->salary_structure_id ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle2">Edit Salary Structure</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" class="text-dark">&times;</span>
					</button>
				</div>
				<form class="needs-validation" novalidate method="post" action="<?php echo site_url('update_salary_structure'); ?>">
					<div class="modal-body">
						<div class="form-group">
							<label>Category Name</label><span style="color: red"> *</span>
							<input type="text" class="form-control"  name="salary_structure_name" value="<?php echo $salary_structure->salary_structure_category_name; ?>" required/>
              <div class="invalid-feedback">
                please fill in a category name
              </div>
						</div>
						<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
						<input type="hidden" name="salary_structure_id" value="<?php echo $salary_structure->salary_structure_id;?>" />
					</div>
          <div class="modal-footer bg-whitesmoke">
            <button type="submit" class="btn btn-primary">Edit Salary Structure</button>
            <input type="reset" class="btn btn-secondary">
            <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach; ?>
<?php include(APPPATH.'\views\footer.php'); ?>
<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>
