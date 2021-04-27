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
					<h1>Phronesis Bank Setup</h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
						<div class="breadcrumb-item">Phronesis Bank Setup</div>
					</div>
				</div>
				<div class="section-body">
					<div class="section-title">All About Phronesis Bank Setup</div>
					<p class="section-lead">You can manage Phronesis Bank information here</p>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h4>All Phronesis Banks</h4>
									<div class="card-header-action">
										<button data-toggle="modal" data-target="#add_bank" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Add Bank</button>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="datatable-buttons" class="table table-striped table-bordered table-md">
											<thead>
											<tr>
												<th>Bank Name</th>
												<th>Bank Branch</th>
												<th>Account Number</th>
												<th>Description</th>
												<th>Gl Code</th>
												<th>Actions</th>
											</tr>
											</thead>
											<tbody>
											<?php if(!empty($pbanks)):
												foreach($pbanks as $pbank): ?>
													<tr>
														<td><?php echo $pbank->bank_name; ?></td>
														<td><?php echo $pbank->branch; ?></td>
														<td><?php echo $pbank->account_no; ?></td>
														<td><?php echo $pbank->description; ?></td>
														<td><?php echo $pbank->glcode; ?></td>
														
														<td class="text-center" style="width: 9px">
															<div class="dropdown">
																<a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
																<div class="dropdown-menu">
																	<a class="dropdown-item has-icon" href="#" data-toggle="modal" data-target="#edit_bank<?php echo $pbank->phronesis_bank_id ?>"><i class="fas fa-edit"></i>Edit Bank</a>
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
		<div class="modal fade" id="add_bank" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle2">Add New Phronesis Bank</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true" class="text-dark">&times;</span>
						</button>
					</div>
					<form class="needs-validation" novalidate method="post" action="<?php echo site_url('phronesis_banks'); ?>">
						<div class="modal-body">
							<div class="form-group">
								<label for="bank">Bank</label><span style="color: red"> *</span>
								<select  class="select2 form-control" required name="bank_id" style="width: 100%; height:42px !important;">
									<option value="">Select</option>
									<?php foreach ($banks as $bank) : ?>
										<option value="<?php echo $bank->bank_id; ?>"> <?php echo $bank->bank_name; ?></option>
									<?php endforeach; ?>
								</select>
								<div class="invalid-feedback">
									please select a bank
								</div>
							</div>
							<div class="form-group">
								<label>Account Number</label><span style="color: red"> *</span>
								<input type="text" class="form-control"  name="bank_account_number" required/>
								<div class="invalid-feedback">
									please fill in a bank name
								</div>
							</div>
							<div class="form-group">
								<label>Bank Branch</label><span style="color: red"> *</span>
								<input type="text" class="form-control"  name="bank_branch" required/>
								<div class="invalid-feedback">
									please fill in a bank name
								</div>
							</div>
							<div class="form-group">
								<label>Gl Code</label>
								<select class="select2 form-control" required name="bank_gl_code" style="width: 100%; height:42px !important;">
									<option value="">Select</option>
									<?php foreach($coas as $coa) :
												if($coa->type == 1):
										?>
										
										<option value="<?= $coa->glcode ?>"><?= isset($coa->glcode) ? $coa->glcode : '' ?> - <?= $coa->account_name ?></option>
									<?php endif; endforeach ?>
								</select>
								<div class="invalid-feedback">
									please select a Glcode
								</div>
							</div>
							
							<div class="form-group">
								<label>Bank Description</label>
								<textarea id="textarea" class="form-control" name="bank_description" maxlength="225" rows="3"></textarea>
								<div class="invalid-feedback">
									please enter a description
								</div>
							</div>
							<input type="hidden" name="type" value="1">
							
							<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
						</div>
						<div class="modal-footer bg-whitesmoke">
							<button type="submit" class="btn btn-primary">Add Bank</button>
							<input type="reset" class="btn btn-secondary">
							<button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<?php foreach($pbanks as $pbank): ?>
			<div class="modal fade" id="edit_bank<?php echo $pbank->phronesis_bank_id ?>" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle2">Edit Bank</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true" class="text-dark">&times;</span>
							</button>
						</div>
						
						<form class="needs-validation" novalidate method="post" action="<?php echo site_url('phronesis_banks'); ?>">
							<input type="hidden" name="type" value="2">
							<div class="modal-body">
								<div class="form-group">
									<label for="bank">Bank</label><span style="color: red"> *</span>
									<select  class="select2 form-control" required name="bank_id" style="width: 100%; height:42px !important;">
										<option value="">Select</option>
										<?php foreach ($banks as $bank) : ?>
											<option value="<?php echo $bank->bank_id; ?>" <?php if($bank->bank_id == $pbank->bank_id): echo 'selected'; endif; ?>> <?php echo $bank->bank_name; ?></option>
										<?php endforeach; ?>
									</select>
									<div class="invalid-feedback">
										please select a bank
									</div>
								</div>
								<div class="form-group">
									<label>Account Number</label><span style="color: red"> *</span>
									<input type="text" class="form-control"  name="bank_account_number" value="<?php echo $pbank->account_no ?>" required/>
									<div class="invalid-feedback">
										please fill in a bank name
									</div>
								</div>
								<div class="form-group">
									<label>Bank Branch</label><span style="color: red"> *</span>
									<input type="text" class="form-control"  name="bank_branch" value="<?php echo $pbank->branch ?>" required/>
									<div class="invalid-feedback">
										please fill in a bank branhc
									</div>
								</div>
								<div class="form-group">
									<label>Gl Code</label>
									<select class="select2 form-control" required name="bank_gl_code" style="width: 100%; height:42px !important;">
										<option value="">Select</option>
										<?php foreach($coas as $coa) :
											if($coa->type == 1):
												?>
												
												<option value="<?= $coa->glcode ?>" <?php if($pbank->glcode == $coa->glcode): echo 'selected'; endif; ?>><?= isset($coa->glcode) ? $coa->glcode : '' ?> - <?= $coa->account_name ?></option>
											<?php endif; endforeach ?>
									</select>
									<div class="invalid-feedback">
										please select a Glcode
									</div>
								</div>
								
								<div class="form-group">
									<label>Bank Description</label>
									<textarea id="textarea" class="form-control" name="bank_description" maxlength="225" rows="3"> <?php echo $pbank->description ?></textarea>
									<div class="invalid-feedback">
										please enter a description
									</div>
								</div>
								<input type="hidden" name="pbank_id" value="<?php echo $pbank->phronesis_bank_id;?>" />
								
								<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
							</div>
							<div class="modal-footer bg-whitesmoke">
								<button type="submit" class="btn btn-primary">Edit Bank</button>
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
<?php include(APPPATH.'/views/footer.php'); ?>
<?php include(APPPATH.'/views/js.php'); ?>
</body>
</html>
<script>
	$('title').html('Bank Setup - IHUMANE')
</script>
