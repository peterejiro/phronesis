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
					<h1>Manage Chart of Accounts</h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
						<div class="breadcrumb-item">Manage Chart of Accounts</div>
					</div>
				</div>
				<div class="section-body">
					<div class="section-title">All About Managing Employees</div>
					<p class="section-lead">You can Manage Chart of Account information here</p>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h4>All Accounts</h4>
									<div class="card-header-action">
										<button onclick="location.href='<?php echo site_url('new_account');?>'" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> New Account</button>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="complex-header" class="table table-bordered table-striped table-md" role="grid" aria-describedby="complex-header_info" style="width: 100%; margin:0px auto;">
											<thead>
											<tr role="row">
												<th class="sorting_asc text-left" tabindex="0" >S/No.</th>
												<th class="sorting_asc text-left" tabindex="0" >ACCOUNT CODE</th>
												<th class="sorting_asc text-left" tabindex="0" >ACCOUNT NAME</th>
												<th class="sorting_asc text-left" tabindex="0" >PARENT</th>
												<th class="sorting_asc text-left" tabindex="0" >TYPE</th>
											</tr>
											</thead>
											<tbody>
											<?php
												$a = 1;
											?>
											<tr role="row" class="bg-success text-white">
												<td class="sorting_1" colspan="3"><strong style="font-size:16px; text-transform:uppercase;">Assets</strong></td>
											</tr>
											<?php foreach ($charts as $report): ?>
												<?php if($report->account_type == 1 ) : ?>
													<?php if($report->glcode != 1) : ?>
														<tr role="row" class="odd <?= $report->type == 0 ? 'bg-info text-white' : '' ?>">
															<td class="text-left"><?= $a++ ?></td>
															<td class="sorting_1 text-left"><?= isset($report->glcode) ? $report->glcode : '' ?></td>
															<td class="text-left"><?= isset($report->account_name) ? $report->account_name : '' ?></td>
															<td class="text-left"><?= isset($report->parent_account) ? $report->parent_account : '' ?></td>
															<td class="text-left"><?= $report->type == 0 ? 'General' : 'Detail' ?></td>
														</tr>
													<?php endif ?>
												<?php endif; ?>
											<?php endforeach; ?>
											<tr role="row" class="bg-success text-white">
												<td class="sorting_1" colspan="3"><strong style="font-size:16px; text-transform:uppercase;">Liability</strong></td>
											</tr>
											<?php
												$b = 1;
											?>
											<?php foreach ($charts as $report): ?>
												<?php if($report->account_type == 2 ) : ?>
													<?php if($report->glcode != 2) : ?>
														<tr role="row" class="odd <?= $report->type == 0 ? 'bg-info text-white' : '' ?>">
															<td class="text-left"><?= $a++ ?></td>
															<td class="sorting_1 text-left"><?= isset($report->glcode) ? $report->glcode : '' ?></td>
															<td class="text-left"><?= isset($report->account_name) ? $report->account_name : '' ?></td>
															<td class="text-left"><?= isset($report->parent_account) ? $report->parent_account : '' ?></td>
															<td class="text-left"><?= $report->type == 0 ? 'General' : 'Detail' ?></td>
														</tr>
													<?php endif ?>
												<?php endif; ?>
											<?php endforeach; ?>
											
											<tr role="row" class="bg-success text-white">
												<td class="sorting_1" colspan="3"><strong style="font-size:16px; text-transform:uppercase;">Equity</strong></td>
											</tr>
											<?php
												$c = 1;
											?>
											<?php foreach ($charts as $report): ?>
												<?php if($report->account_type == 3 ) : ?>
													<?php if($report->glcode != 3) : ?>
														<tr role="row" class="odd <?= $report->type == 0 ? 'bg-info text-white' : '' ?>">
															<td class="text-left"><?= $a++ ?></td>
															<td class="sorting_1 text-left"><?= isset($report->glcode) ? $report->glcode : '' ?></td>
															<td class="text-left"><?= isset($report->account_name) ? $report->account_name : '' ?></td>
															<td class="text-left"><?= isset($report->parent_account) ? $report->parent_account : '' ?></td>
															<td class="text-left"><?= $report->type == 0 ? 'General' : 'Detail' ?></td>
														</tr>
													<?php endif ?>
												<?php endif; ?>
											<?php endforeach; ?>
											<tr role="row" class="bg-success text-white">
												<td class="sorting_1" colspan="3"><strong style="font-size:16px; text-transform:uppercase;">Revenue</strong></td>
											</tr>
											<?php
												$d = 1;
											?>
											<?php foreach ($charts as $report): ?>
												<?php if($report->account_type == 4 ) : ?>
													<?php if($report->glcode != 4) : ?>
														<tr role="row" class="odd <?= $report->type == 0 ? 'bg-info text-white' : '' ?>">
															<td class="text-left"><?= $a++ ?></td>
															<td class="sorting_1 text-left"><?= isset($report->glcode) ? $report->glcode : '' ?></td>
															<td class="text-left"><?= isset($report->account_name) ? $report->account_name : '' ?></td>
															<td class="text-left"><?= isset($report->parent_account) ? $report->parent_account : '' ?></td>
															<td class="text-left"><?= $report->type == 0 ? 'General' : 'Detail' ?></td>
														</tr>
													<?php endif ?>
												<?php endif; ?>
											<?php endforeach; ?>
											
											<tr role="row" class="bg-success text-white">
												<td class="sorting_1" colspan="3"><strong style="font-size:16px; text-transform:uppercase;">Expenses</strong></td>
											</tr>
											<?php
												$e = 1;
											?>
											<?php foreach ($charts as $report): ?>
												<?php if($report->account_type == 5 ) : ?>
													<?php if($report->glcode != 5) : ?>
														<tr role="row" class="odd <?= $report->type == 0 ? 'bg-info text-white' : '' ?>">
															<td class="text-left"><?= $a++ ?></td>
															<td class="sorting_1 text-left"><?= isset($report->glcode) ? $report->glcode : '' ?></td>
															<td class="text-left"><?= isset($report->account_name) ? $report->account_name : '' ?></td>
															<td class="text-left"><?= isset($report->parent_account) ? $report->parent_account : '' ?></td>
															<td class="text-left"><?= $report->type == 0 ? 'General' : 'Detail' ?></td>
														</tr>
													<?php endif ?>
												<?php endif; ?>
											<?php endforeach; ?>
										
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

<script>
	$('title').html('Manage Chart of Accounts - IHUMANE');
</script>
