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
						<div class="breadcrumb-item">New Account</div>
					</div>
				</div>
				<div class="section-body">
					<div class="section-title">New Account</div>
					<p class="section-lead">You Can add A New Account</p>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h4>New Account</h4>
									<div class="card-header-action">
										<button onclick="location.href='<?php echo site_url('new_account');?>'" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> New Account</button>
									</div>
								</div>
								<div class="card-body">
									<form id="addNewCoaForm" autocomplete="off" action="<?= site_url('new_account') ?>" method="POST" >
										<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
										<div class="form-group">
											<label for="">GL Code</label>
											<input type="number" placeholder="Enter Unique GL Code" id="gl_code" name="gl_code" class="form-control">
											<div  class="alert alert-danger mt-2 p-2" id="gl_code_error">
											</div>
										</div>
										<div class="form-group">
											<label for="">Account Name</label>
											<input type="text" placeholder="Enter Account Name" id="account_name" name="account_name" class="form-control">
										</div>
										<div class="row">
											<div class="col-md-3">
												<div class="form-group">
													<label for="">Account Type</label>
													<select name="account_type" id="account_type" class="form-control">
														<option disabled selected>Select account type</option>
														<option value="1">Asset</option>
														<option value="2">Liability</option>
														<option value="3">Equity</option>
														<option value="4">Revenue</option>
														<option value="5">Expenses</option>
													</select>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label for="">Type</label>
													<select name="type" id="type" class="form-control">
														<option disabled selected>Select type</option>
														<option value="0">General</option>
														<option value="1">Detail</option>
													</select>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label for="">Bank</label>
													<select name="bank" id="bank" class="form-control">
														<option disabled selected>--Select--</option>
														<option value="1">Yes</option>
														<option value="0">No</option>
													</select>
												</div>
											</div>
											
											<div class="col-md-3">
												<div class="form-group" id="parentAccountWrapper">
													<label for="">Parent Account</label>
													
														<select name="parent_account" id="parent_account" class="form-control">
															<option disabled selected>Select account</option>
															<?php foreach($paccounts as $paccount) : ?>
																<option value="<?= $paccount->glcode ?>"><?= ucfirst($paccount->account_name) ?> - (<?= $paccount->glcode ?>)</option>
															<?php endforeach ?>
														</select>
														
												
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div  class="alert alert-danger mt-2 p-2" id="account_type_error">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label for="">Note</label>
											<textarea name="note" id="note" style="resize:none;" placeholder="Leave note..." class="form-control"></textarea>
										</div>
										<div class="form-group d-flex justify-content-center">
											<div class="btn-group ">
												<a href="" class="btn btn-mini btn-danger"><i class="ti-close mr-2"></i>Cancel</a>
												<button class="btn btn-mini btn-primary" type="submit" id="addNewAccountBtn"><i class="ti-check mr-2"></i> Submit</button>
											</div>
										</div>
									</form>
								
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
	$(document).ready(function(){
		//$('#parentAccountWrapper').hide();
		$('#gl_code_error').hide();
		$('#account_type_error').hide();
		$('#addNewAccountBtn').prop("disabled", true);
		$("#gl_code").blur(function () {
			var gl_code = $(this).val();
			gl_code = String(gl_code);
			var length  = gl_code.length;
			if(length%2 == 0){
				$('#gl_code_error').show();
				$('#gl_code_error').html("Length of account number should be odd");
				$('#addNewAccountBtn').prop("disabled", true);
			}
			else{
				$('#gl_code_error').hide();
				$('#addNewAccountBtn').prop("disabled", false);
			}
			
		});
		//Account type
		$(document).on('change', '#account_type', function(e){
			e.preventDefault();
			var account_type = $(this).val();
			
			switch (account_type) {
				case "1":
					if($('#gl_code').val().toString().charAt(0) != 1){
						$('#account_type_error').show();
						$("#account_type_error").html("Invalid GL code for this account type. Hint: First number should start with <strong>1</strong>");
						$('#addNewAccountBtn').prop("disabled", true);
					}else{
						$('#account_type_error').hide();
						$('#addNewAccountBtn').prop("disabled", false);
					}
					break;
				case "2":
					if($('#gl_code').val().toString().charAt(0) != 2){
						$('#account_type_error').show();
						$("#account_type_error").html("Invalid GL code for this account type. Hint: First number should start with <strong>2</strong>");
						$('#addNewAccountBtn').prop("disabled", true);
					}else{
						$('#account_type_error').hide();
						$('#addNewAccountBtn').prop("disabled", false);
					}
					break;
				case "3":
					if($('#gl_code').val().toString().charAt(0) != 3){
						$('#account_type_error').show();
						$("#account_type_error").html("Invalid GL code for this account type. Hint: First number should start with <strong>3</strong>");
						$('#addNewAccountBtn').prop("disabled", true);
					}else{
						$('#account_type_error').hide();
						$('#addNewAccountBtn').prop("disabled", false);
					}
					break;
				case "4":
					if($('#gl_code').val().toString().charAt(0) != 4){
						$('#account_type_error').show();
						$("#account_type_error").html("Invalid GL code for this account type. Hint: First number should start with <strong>4</strong>");
						$('#addNewAccountBtn').prop("disabled", true);
					}else{
						$('#account_type_error').hide();
						$('#addNewAccountBtn').prop("disabled", false);
					}
					break;
				case "5":
					if($('#gl_code').val().toString().charAt(0) != 5){
						$('#account_type_error').show();
						$("#account_type_error").html("Invalid GL code for this account type. Hint: First number should start with <strong>5</strong>");
						$('#addNewAccountBtn').prop("disabled", true);
					}else{
						$('#account_type_error').hide();
						$('#addNewAccountBtn').prop("disabled", false);
					}
					break;
				
				
			}
			
			$('#type option[value=0]').attr('selected','selected');
			$("#parent_account").empty();
		});
		
		
		})
	
	function check_type(){
		let p_type =  document.getElementById('type').val();
		console.log(p_type)
		if(p_type == 0){
			$('#parentAccountWrapper').hide();
		}
		
		if(p_type == 1){
			$('#parentAccountWrapper').hide();
		}
	}
	
	
		$(document).on('change', '#type', function(e){
			e.preventDefault();
			let p_type =  $('#type').val();
			
			if(p_type == 0){
				$("#parent_account").empty();
				//$('#parentAccountWrapper').hide();
			}
			
			if(p_type == 1){
				
				let account_type = $('#account_type').val();
		
				$.ajax({
					url: '<?php echo site_url('get_parent_account') ?>',
					type: 'post',
					data: {
						'account_type': account_type,
					},
					dataType: 'json',
					success:function(response){
						//console.log(response);
						$('#parentAccountWrapper').show();
						$("#parent_account").empty();
						$("#parent_account").append('<option> -- Select parent Account --</option>');
						for (var i=0; i<response.length; i++) {
							$("#parent_account").append('<option value="' + response[i].glcode + '">' + response[i].account_name + '</option>');
						}
						
					}
				});
				
			}
		});
	
	
	
	
	
</script>
<script>
	$('title').html('Manage Chart of Accounts - IHUMANE');
</script>
