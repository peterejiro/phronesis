<?php include(APPPATH.'\views\stylesheet.php');
$CI =& get_instance();
$CI->load->model('hr_configurations');
$CI->load->model('payroll_configurations');
$CI->load->model('employees');

?>

<body class="layout-3">
<div id="app">
	<div class="main-wrapper container">
		<div class="navbar-bg"></div>
		<?php include('header.php'); ?>

		<?php include('menu.php'); ?>

		<!-- Main Content -->
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<div class="section-header-back">
						<a href="<?php echo site_url('employee_main')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
					</div>
					<h1> Resign </h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="<?php echo base_url('employee_main'); ?>">Dashboard</a></div>
						<div class="breadcrumb-item">Resign</div>
					</div>
				</div>
				<div class="section-body">
					<div class="section-title">All About Terminating your appointment</div>
					<p class="section-lead">You can terminate your appointment here</p>

					<div class="row">
						<div class="col-md-7">
							<form method="post" action="<?php echo site_url('resignation'); ?>" class="needs-validation" novalidate id="resignation_form">
								<div class="card card-primary">
									<div class="card-header">
										<h4>Termination Form</h4>
									</div>
									<div class="card-body">


										<div class="form-group">
											<label>Resignation Reason</label><span style="color: red"> *</span>
											<textarea class="summernote-simple" name="resignation_reason" required> </textarea>
											<div class="invalid-feedback">
												please enter a reason
											</div>
										</div>

										<div class="form-group row">
											<div class="col-sm-4">
												<label for="employee-start-date">Effective Date</label><span style="color: red"> *</span>
												<input id="employee-start-date" type="date" name="resignation_effective_date" required class="form-control"  placeholder="mm/dd/yyyy">
												<div class="invalid-feedback">
													please fill in an effective date
												</div>
											</div>

											<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
											<input type="hidden" name="resignation_employee_id" value="<?php echo $employee_id;?>" />
										</div>
										<div class="card-footer text-right bg-whitesmoke">
											<button type="button" class="btn btn-primary" id="sa-paramss"><i class="fas fa-check"></i>Resign</button>
											<!--                    <button type="submit" id="loan_button" class="btn btn-primary">Terminate</button>-->
											<!--                    <button type="button" onclick="location.reload();" class="btn btn-secondary">Reset</button>-->
										</div>
									</div>
							</form>

							<div class="card-body">
								<div class="table-responsive">
									<div class="section-title">Resignation Attempts</div>
									<table  class="table table-bordered table-striped table-md">
										<thead>
										<tr>
											<th>#</th>
											<th>Date</th>
											<th> Effective Date</th>
											<th>Status</th>

										</tr>
										</thead>
										<tbody>
										<?php if(!empty($resignations)):
											$count = 1;
											foreach($resignations as $resignation):
												if($resignation->resignation_employee_id == $employee_id):
												?>
												<tr>
													<td><?php echo $count; ?></td>
													<td><?php echo $resignation->resignation_date ; ?></td>
													<td><?php echo $resignation->resignation_effective_date; ?></td>
													<td><?php if($resignation->resignation_status == 2){ echo "Discarded" ;}

														if($resignation->resignation_status == 1){ echo "Approved" ;}
													?></td>


												</tr>
												<?php
													$count++;
												endif;


											endforeach;
										endif; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>


					</div>


				</div>
			</section>
		</div>


	</div>

	<?php include(APPPATH.'\views\footer.php'); ?>
</div>
</div>

<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>



<script>
	$(document).ready(function () {

		$('#sa-paramss').click(function () {
			swal({
				title: 'Are you sure?',
				text: 'Action Cannot be reversed!',
				icon: 'warning',
				buttons: true,
				dangerMode: true,
			}).then((willDelete) => {
				if (willDelete) {
					$("#resignation_form").submit();
				} else {
					swal('Action Canceled!', { icon: 'error' });
				}
			});
		});
	});
</script>
