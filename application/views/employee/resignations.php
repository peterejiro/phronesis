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
					<h1> resignations</h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
						<div class="breadcrumb-item">View resignations</div>
					</div>
				</div>
				<div class="section-body">
					<div class="section-title">All About Viewing resignations</div>
					<p class="section-lead">You can view appointment resignation here</p>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h4>All Loans</h4>
									<div class="card-header-action">
										<button onclick="location.href='<?php echo site_url('employee');?>'" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Terminate Employee</button>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="datatable-buttons" class="table table-striped table-bordered table-md">
											<thead>
											<tr>
												<th>Employee ID</th>
												<th>Employee Name</th>
												<th>Resignation Reason</th>
												<th>Effective Date</th>
												<th> Status </th>
												<th>Options</th>

											</tr>
											</thead>
											<tbody>
											<?php if(!empty($resignations)):
												foreach($resignations as $resignation):
													?>
													<tr>
														<td><?php echo $resignation->employee_unique_id; ?></td>
														<td><?php echo $resignation->employee_last_name." ".$resignation->employee_first_name." ".$resignation->employee_other_name; ?></td>
														<td><?php echo $resignation->resignation_reason; ?></td>
														<td><?php echo $resignation->resignation_effective_date; ?></td>
														<td> <?php if($resignation->resignation_status == 0):
																echo "pending";

																endif;
															if($resignation->resignation_status == 1):
																echo "Approved";

															endif;
															if($resignation->resignation_status == 2):
																echo "Discarded";

															endif;


															?></td>

														<td class="text-center" style="width: 9px">
															<div class="dropdown">
																<a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
																<div class="dropdown-menu">
																	<?php if($resignation->resignation_status == 0): ?>
																		<a class="dropdown-item has-icon" href="<?php echo site_url('approve_resignation')."/".$resignation->resignation_id; ?>"><i class="fas fa-edit"></i>Approve</a>
																		<a class="dropdown-item has-icon" href="<?php echo site_url('discard_resignation')."/".$resignation->resignation_id; ?>"><i class="fas fa-eye"></i>Discard</a>

																	<?php else: echo "No action"; endif; ?>
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


<?php include(APPPATH.'\views\footer.php'); ?>
<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>
