<?php
  include(APPPATH.'/views/stylesheet.php');
  $CI =& get_instance();
  $CI->load->model('hr_configurations');
?>

<body>
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>
		<?php include(APPPATH.'/views/topbar.php'); ?>
		<?php include(APPPATH.'/views/sidebar.php'); ?>
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1>Directives</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Directives</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Directives</div>
          <p class="section-lead">You can manage directive memos here</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>All Directive Memos</h4>
                  <div class="card-header-action">
                    <button type="button" class="btn btn-icon icon-left btn-primary" onclick="location.href='<?php echo site_url('new_specific_memo');?>'">
                      <i class="fa fa-plus"></i> New Directive
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-bordered table-striped table-md">
                      <thead>
                        <tr>
                          <th>Memo Recipient</th>
                          <th>Memo Subject</th>
                          <th>Memo Body</th>
                          <th>Memo Date</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if(!empty($memos)):
                        foreach($memos as $memo):
                          ?>
                          <tr>
							              <td><?php echo $memo->employee_first_name." ".$memo->employee_last_name; ?></td>
                            <td><?php echo $memo->specific_memo_subject; ?></td>
							              <td><?php echo $memo->specific_memo_body; ?></td>
                            <td><?php echo date('F j, Y', strtotime($memo->specific_memo_date));?></td>
                            <td class="text-center" style="width: 9px">
                              <div class="dropdown">
                                <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item has-icon btn btn-icon icon-left" data-toggle="modal" data-target="#edit_memo<?php echo $memo->specific_memo_id; ?>"><i class="fas fa-eye"></i> View Directive</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                        <?php endforeach;
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


<?php if(!empty($memos)):
	foreach($memos as $memo):?>
		<div class="modal fade bd-example-modal-lg" id="edit_memo<?php echo $memo->specific_memo_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="exampleModalLongTitle2">Edit Directive</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true" class="text-dark">&times;</span>
						</button>
					</div>
					<form class="needs-validation" novalidate method="post" action="<?php echo site_url('update_specific_memo'); ?>">
						<div class="modal-body">
							<div class="form-group">
								<label>Subject</label><span style="color: red"> *</span>
								<input type="text" class="form-control" name="memo_subject" required value="<?php echo $memo->specific_memo_subject; ?>"/>
                <div class="invalid-feedback">
                  please fill in a subject
                </div>
							</div>
							<div class="form-group row">
								<div class="col-sm-12">
									<label>Directive Body</label><span style="color: #ff0000"> *</span>
									<textarea class="summernote" required name="memo_body"><?php echo $memo->specific_memo_body ?></textarea>
                  <div class="invalid-feedback">
                    please fill in a body
                  </div>
								</div>
							</div>
							<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
							<input type="hidden" name="memo_id" value="<?php echo $memo->specific_memo_id; ?>">
						</div>
						<div class="modal-footer bg-whitesmoke">
              <button type="submit" class="btn btn-success">Update</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php endforeach;
endif; ?>
