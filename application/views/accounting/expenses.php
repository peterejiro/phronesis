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
					<h1>Phronesis Expenses</h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
						<div class="breadcrumb-item">Phronesis Expenses</div>
					</div>
				</div>
				<div class="section-body">
					<div class="section-title">All About Phronesis Expenses</div>
					<p class="section-lead">You can manage Phronesis Expenses information here</p>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h4>All Phronesis Expenses</h4>
									<div class="card-header-action">
										<button data-toggle="modal" data-target="#add_bank" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Add Bank</button>
									</div>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
									<form action="" id="jvform" method="post">
										
										<div class="row">
											<div class="col-md-6">
												<div class="row">
													<div class="col-md-6 col-sm-6 col-lg-6">
														<div class="form-group">
															<label for="">Date</label>
															<input type="date" placeholder="Date" class="form-control" name="issue_date" required>
															<input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
														</div>
													</div>
													<div class="col-md-6 col-sm-6 col-lg-6">
														<div class="form-group">
															<label for="">Entry #</label>
															<input type="text"  name="entry_no" value="<?php echo "Expenses".time(); ?>" readonly placeholder="Entry #" class="form-control">
														
														</div>
													</div>
												</div>
											</div>
										</div>
										
										<div class="row clearfix">
											<div class="row">
												<div class="col-sm-12">
													
													<div class="card">
														<div class="header">
														
														</div>
														
														<div class="card-body">
															<div id="debits">
																
																<div id="debit1">
																	
																	<button style="margin-bottom: 5%" type="button" onclick="delete_div(this)"  class="btn btn-danger"><i class="fa fa-minus-square"></i></button>
																	
																	<div class="row">
																		
																		<div class="col-lg-4 col-md-4">
																			<div class="form-group">
																				<label  for="application_payroll_group_id"> <b> Account: </b></label>
																				<select name="debit_account[]" id="debit_account1" class="custom-select" required>
																					<option disabled selected>Select account</option>
																					<?php foreach($accounts as $account) :
																						if($account->type == 1 && $account->account_type == 5):
																							?>
																							<option value="<?= $account->glcode ?>"> <?= $account->glcode ?? ''?> - <?= $account->account_name ?? ''?>  </option>
																						<?php endif; endforeach; ?>
																				</select>
																			</div>
																		</div>
																		
																		<div class="col-lg-4 col-md-4">
																			<div class="form-group">
																				<label  for="application_payroll_group_id"> <b> Debit Narration: </b></label>
																				<input type="text" name="debit_narration[]" id="debit_narration1" required class="form-control" placeholder="Narration">
																			
																			</div>
																		</div>
																		
																		<div class="col-lg-4 col-md-4">
																			<div class="form-group">
																				<label  for="application_payroll_group_id"> <b> Debit Amount: </b></label>
																				<input type="text" class="number form-control" id="debit_amount1"  required placeholder="Debit Amount" value="0.00" onkeyup="compute_balance()"  name="debit_amount[]">
																			</div>
																		</div>
																	</div>
																</div>
																
																
																<div class="form-group" id="clone_dr_button" style="float: right">
																	
																	<button type="button" onclick="clone_div_dr(this)"   class="btn btn-success"><i class="fa fa-plus-square"> </i></button>
																
																
																</div>
																
																<div class="form-group" style="margin-top: 10%">
																	<label  for="application_payroll_group_id"> <b> Total Debit Amount: </b></label> <span id="total_debit_amount"> 0.00</span>
																</div>
															</div>
														</div>
													</div>
												
												</div>
												
												
											</div>
										</div>
										
										
										<div class="row">
											<div class="col-sm-4 offset-4">
												<div class="btn-group d-flex justify-content-center">
													
													<a href="" class="btn btn-mini btn-danger"><i class="ti-close mr-2"></i>Cancel</a>
													<button type="submit"   class="btn btn-primary save-entry btn-mini"><i class="ti-check mr-2"> Save</i></button>
												</div>
											</div>
										</div>
									</form>
										</div>
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
	$('title').html('Expenses - Phronesis')
</script>
<script>
	let clones_id = [1];
	let clones_ids = [1];
	
	function clone_div_cr() {
		let elem = document.getElementById('credit1');
		if (elem.style.display === 'none') {
			elem.style.display = 'block';
		}
		else {
			// Create a copy of it
			let clone = elem.cloneNode(true);
			// Update the ID and add a class
			let count_clones = clones_id.length;
			let count_cloness = count_clones + 1;
			
			let n = clones_id.includes(count_cloness);
			
			while(n === true){
				count_cloness = count_cloness + 1;
				n = clones_id.includes(count_cloness);
			}
			
			clone.id = 'credit'+count_cloness;
			// document.getElementById('work_experiences').appendChild(clone);
			let payments = document.getElementById('credits');
			
			let clone_button = document.getElementById('clone_button');
			//clone.insertBefore(work_experience_button);
			payments.insertBefore(clone, clone_button)
			clones_id.push(count_cloness)
			
			let new_elem = document.getElementById('credit'+count_clones);
			// Inject it into the DOM
			
			
			// inputs = elem.getElementsByTagName('textarea');
			// for (index = 0; index < inputs.length; ++index) {
			//     // if(inputs[index].type == 'textarea')
			//     inputs[index].value = '';
			// }
			// var textarea = elem.getElementsByTagName('textarea');
			// textarea.value = '';
			
			// console.log(new_elems);
			elem.after(new_elem);
			
			
			//document.getElementById('temp_id').id = "target"+count_cloness ;
			//document.getElementById('payment_type1').id = "payment_type"+count_cloness ;
			//console.log(clones_id);
			
			
			
			let new_id = 'credit'+count_cloness;
			
			let inputs = $("#" + new_id).find("select, input");
			let index;
			for (index = 0; index < inputs.length; ++index) {
				if (inputs[index].name === 'credit_account') {
					// console.log('i changed target');
					inputs[index].id = "credit_account" + count_cloness;
					inputs[index].value = '';
				}
				
			}
			
			for (index = 0; index < inputs.length; ++index) {
				if (inputs[index].name === 'credit_narration[]') {
					//console.log('i changed payment type');
					inputs[index].id = "credit_narration" + count_cloness;
					inputs[index].value = '';
				}
			}
			
			for (index = 0; index < inputs.length; ++index) {
				if (inputs[index].name === 'credit_amount[]') {
					inputs[index].id = "credit_amount" + count_cloness;
					inputs[index].value = '0.00';
				}
			}
			//
			// for (index = 0; index < inputs.length; ++index) {
			//     if (inputs[index].name === 'credit_account') {
			//         // console.log('i changed target');
			//         inputs[index].id = "credit_account" + count_cloness;
			//         inputs[index].value = '';
			//     }
			//
			// }
			
			
			
		}
		//let master_amount = parseFloat($('#master_amount').val().replace(/,/g, ''));
		//let master_inputs = $("#payments").find("select, input");
		//console.log(master_inputs.length);
		// let index;
		// let payment_amount = 0;
		//  for (index = 0; index < master_inputs.length; ++index) {
		//      if (master_inputs[index].name === 'payment_amount[]') {
		//          // console.log('i changed target');
		//          payment_amount =  parseFloat(master_inputs[index].value.replace(/,/g, '')) + payment_amount;
		//      }
		//  }
		
		
		//console.log(payment_amount);
		
		
		
		
	}
	
	function clone_div_dr() {
		let elem = document.getElementById('debit1');
		if (elem.style.display === 'none') {
			elem.style.display = 'block';
		}
		else {
			// Create a copy of it
			let clone = elem.cloneNode(true);
			// Update the ID and add a class
			let count_clones = clones_ids.length;
			let count_cloness = count_clones + 1;
			
			let n = clones_id.includes(count_cloness);
			
			while(n === true){
				count_cloness = count_cloness + 1;
				n = clones_id.includes(count_cloness);
			}
			
			clone.id = 'debit'+count_cloness;
			// document.getElementById('work_experiences').appendChild(clone);
			let payments = document.getElementById('debits');
			
			let clone_button = document.getElementById('clone_dr_button');
			//clone.insertBefore(work_experience_button);
			payments.insertBefore(clone, clone_button)
			clones_id.push(count_cloness)
			
			let new_elem = document.getElementById('debit'+count_clones);
			// Inject it into the DOM
			
			
			// inputs = elem.getElementsByTagName('textarea');
			// for (index = 0; index < inputs.length; ++index) {
			//     // if(inputs[index].type == 'textarea')
			//     inputs[index].value = '';
			// }
			// var textarea = elem.getElementsByTagName('textarea');
			// textarea.value = '';
			
			// console.log(new_elems);
			elem.after(new_elem);
			
			
			//document.getElementById('temp_id').id = "target"+count_cloness ;
			//document.getElementById('payment_type1').id = "payment_type"+count_cloness ;
			//console.log(clones_id);
			
			
			
			let new_id = 'debit'+count_cloness;
			
			let inputs = $("#" + new_id).find("select, input");
			let index;
			for (index = 0; index < inputs.length; ++index) {
				if (inputs[index].name === 'debit_account') {
					// console.log('i changed target');
					inputs[index].id = "debit_account" + count_cloness;
					inputs[index].value = '';
				}
				
			}
			
			for (index = 0; index < inputs.length; ++index) {
				if (inputs[index].name === 'debit_narration[]') {
					//console.log('i changed payment type');
					inputs[index].id = "debit_narration" + count_cloness;
					inputs[index].value = '';
				}
			}
			
			for (index = 0; index < inputs.length; ++index) {
				if (inputs[index].name === 'debit_amount[]') {
					inputs[index].id = "debit_amount" + count_cloness;
					inputs[index].value = '0.00';
				}
			}
			
			
			
		}
		//let master_amount = parseFloat($('#master_amount').val().replace(/,/g, ''));
		//let master_inputs = $("#payments").find("select, input");
		//console.log(master_inputs.length);
		// let index;
		// let payment_amount = 0;
		//  for (index = 0; index < master_inputs.length; ++index) {
		//      if (master_inputs[index].name === 'payment_amount[]') {
		//          // console.log('i changed target');
		//          payment_amount =  parseFloat(master_inputs[index].value.replace(/,/g, '')) + payment_amount;
		//      }
		//  }
		
		
		//console.log(payment_amount);
		
		
		
		
	}
	
	function delete_div(e) {
		let id = e.parentElement.id;
		if ((id === 'credit1') || (id === 'debit1')) {
			// let elem = document.getElementById('payment_details1');
			// let inputs = elem.getElementsByTagName('input');
			// let index;
			// for (index = 0; index < inputs.length; ++index) {
			//     if (inputs[index].type == 'text')
			//         inputs[index].value = '';
			// }
			// inputs = elem.getElementsByTagName('input');
			// for (index = 0; index < inputs.length; ++index) {
			//     if (inputs[index].type == 'date')
			//         inputs[index].value = '';
			// }
			//
			// inputs = elem.getElementsByTagName('textarea');
			// for (index = 0; index < inputs.length; ++index) {
			//     // if(inputs[index].type == 'textarea')
			//     inputs[index].value = '';
			// }
			// // var textarea = elem.getElementsByTagName('textarea');
			// // textarea.value = '';
			// elem.style.display = 'none';
			
			
			
			alert('cannot remove');
		} else {
			
			let credit_inputs = $("#credits").find("select, input");
			let debit_inputs = $("#debits").find("select, input");
			
			let index;
			let credit_amount = 0;
			let debit_amount = 0;
			for (index = 0; index < credit_inputs.length; ++index) {
				if (credit_inputs[index].name === 'credit_amount[]') {
					var currentVal =  credit_inputs[index].value;
					var testDecimal = testDecimals(currentVal);
					if (testDecimal.length > 1) {
						//console.log("You cannot enter more than one decimal point");
						currentVal = currentVal.slice(0, -1);
					}
					credit_inputs[index].value = replaceCommas(currentVal);
					
					credit_amount = parseFloat(credit_inputs[index].value.replace(/,/g, '')) + credit_amount;
				}
				
			}
			
			
			for (index = 0; index < debit_inputs.length; ++index) {
				if (debit_inputs[index].name === 'debit_amount[]') {
					var cVal =  debit_inputs[index].value;
					var tDecimal = testDecimals(cVal);
					if (tDecimal.length > 1) {
						//console.log("You cannot enter more than one decimal point");
						cVal = cVal.slice(0, -1);
					}
					debit_inputs[index].value = replaceCommas(cVal);
					
					debit_amount = parseFloat(debit_inputs[index].value.replace(/,/g, '')) + debit_amount;
				}
				
			}
			
			if(debit_amount === credit_amount){
				$('.save-entry').attr('disabled', false);
				
			}
			
			if(debit_amount !== credit_amount){
				
				$('.save-entry').attr('disabled', true);
			}
			
			let id_array = id.replace( /^\D+/g, '');
			id_array = parseInt(id_array);
			// alert(id_array)
			const indexs = clones_id.indexOf(id_array);
			if (indexs > -1) {
				clones_id.splice(index, 1);
			}
			//console.log(clones_id);
			e.parentElement.remove();
		}
	}
	
	function compute_balance() {
		let credit_inputs = $("#credits").find("select, input");
		let debit_inputs = $("#debits").find("select, input");
		
		let index;
		let credit_amount = 0;
		let debit_amount = 0;
		for (index = 0; index < debit_inputs.length; ++index) {
			if (debit_inputs[index].name === 'debit_amount[]') {
				var cVal =  debit_inputs[index].value;
				var tDecimal = testDecimals(cVal);
				if (tDecimal.length > 1) {
					//console.log("You cannot enter more than one decimal point");
					cVal = cVal.slice(0, -1);
				}
				debit_inputs[index].value = replaceCommas(cVal);
				
				debit_amount = parseFloat(debit_inputs[index].value.replace(/,/g, '')) + debit_amount;
			}
			
		}
		$("#total_debit_amount").text(debit_amount.toLocaleString());
		
		
		
		
		// // entered_principal = entered_principal.replace(/,/g, '');
		// // entered_principal = parseFloat(entered_principal);
		// let withdraw_amount = parseFloat($(this).val().replace(/,/g, ''));
		// let withdraw_charge = parseFloat($('#withdraw_charge').val());
		// let withdraw_balance = parseFloat($('#withdraw_balance').val());
		// let charge = (withdraw_charge/100)*withdraw_amount;
		// // alert(withdraw_balance);
		// if(withdraw_amount <= withdraw_balance){
		//     $('#withdraw_submit').show();
		//     $('#withdraw_warning').hide();
		//     $('#charge_warning').show();
		//     $("#c_t").empty();
		//     $("#c_t").append('Withdraw Charges: '+' NGN'+charge.toLocaleString());
		//
		//     // alert(withdraw_balance);
		// }
		//
		// if(withdraw_amount > withdraw_balance){
		//     $('#withdraw_submit').hide();
		//     $('#withdraw_warning').show();
		//     $("#c_t").empty();
		//     $('#charge_warning').hide();
		//     //alert(withdraw_balance);
		// }
		//alert('cj');
		
		
		
	}
	
	$(function () {
		
		
		
		
		// $("#jvform").submit(function (e) {
		//
		// 	e.preventDefault();
		//
		// 	let credit_inputs = $("#credits").find("select, input");
		// 	let debit_inputs = $("#debits").find("select, input");
		//
		// 	let index;
		// 	let credit_amount = 0;
		// 	let debit_amount = 0;
		// 	for (index = 0; index < credit_inputs.length; ++index) {
		// 		if (credit_inputs[index].name === 'credit_amount[]') {
		// 			var currentVal =  credit_inputs[index].value;
		// 			var testDecimal = testDecimals(currentVal);
		// 			if (testDecimal.length > 1) {
		// 				//console.log("You cannot enter more than one decimal point");
		// 				currentVal = currentVal.slice(0, -1);
		// 			}
		// 			credit_inputs[index].value = replaceCommas(currentVal);
		//
		// 			credit_amount = parseFloat(credit_inputs[index].value.replace(/,/g, '')) + credit_amount;
		// 		}
		//
		// 	}
		//
		//
		// 	for (index = 0; index < debit_inputs.length; ++index) {
		// 		if (debit_inputs[index].name === 'debit_amount[]') {
		// 			var cVal =  debit_inputs[index].value;
		// 			var tDecimal = testDecimals(cVal);
		// 			if (tDecimal.length > 1) {
		// 				//console.log("You cannot enter more than one decimal point");
		// 				cVal = cVal.slice(0, -1);
		// 			}
		// 			debit_inputs[index].value = replaceCommas(cVal);
		//
		// 			debit_amount = parseFloat(debit_inputs[index].value.replace(/,/g, '')) + debit_amount;
		// 		}
		//
		// 	}
		//
		// 	if(debit_amount === credit_amount){
		// 		document.getElementById("jvform").submit();
		//
		// 	}
		//
		// 	if(debit_amount !== credit_amount){
		//
		// 		alert('debit and credit amount must balance');
		// 	}
		//
		//
		// });
		
		
	});
	
	
	// var debitTotal = 0;
	// var creditTotal = 0;
	// $(document).ready(function(){
	//     $(".select-account").select2({
	//         placeholder: "Select account"
	//     });
	//     //updateStatus();
	//     var grand_total = 0;
	//     var invoice_total = 0;
	//
	//     $('#creditTotal').text(creditTotal);
	//     $('#debitTotal').text(debitTotal);
	//     $(document).on('click', '.add-line', function(e){
	//         e.preventDefault();
	//         var new_selection = $('.item').first().clone();
	//         $('#products').append(new_selection);
	//
	//         $(".select-account").select2({
	//             placeholder: "Select account"
	//         });
	//         $(".select-account").last().next().next().remove();
	//     });
	//
	//     //Remove line
	//     $(document).on('click', '.remove-line', function(e){
	//         e.preventDefault();
	//         $(this).closest('tr').remove();
	//         calculateTotals();
	//     });
	//     $("body").on('focusout', '.debit-amount', function(e) {
	//         var sum = 0;
	//         $(this).closest('tr').find('.credit-amount').val(0);
	//         sumDebit();
	//         sumCredit();
	//     });
	//     $("body").on('focusout', '.credit-amount', function(e) {
	//         var sum = 0;
	//         $(this).closest('tr').find('.debit-amount').val(0);
	//         sumDebit();
	//         sumCredit();
	//     });
	//
	// });
	// function updateStatus(debit, credit){
	//     if(debit != credit && debit <= 0 && credit <= 0){
	//         $('.save-entry').attr('disabled', true);
	//     }else{
	//         $('.save-entry').attr('disabled', false);
	//     }
	// }
	//
	// function sumDebit(){
	//     var sum = 0;
	//     $(".debit-amount").each(function(){
	//         sum += +$(this).val();
	//     });
	//     $(".drTotal").text(sum.toLocaleString());
	//     $('#drTotalHidden').val(sum);
	//     if($('#drTotalHidden').val() != $('#crTotalHidden').val()){
	//         $('.save-entry').attr('disabled', true);
	//     }else{
	//         $('.save-entry').attr('disabled', false);
	//     }
	// }
	// function sumCredit(){
	//     var sum = 0;
	//     $(".credit-amount").each(function(){
	//         sum += +$(this).val();
	//     });
	//     $('#crTotalHidden').val(sum);
	//     $(".crTotal").text(sum.toLocaleString());
	//     if($('#drTotalHidden').val() != $('#crTotalHidden').val()){
	//         $('.save-entry').attr('disabled', true);
	//     }else{
	//         $('.save-entry').attr('disabled', false);
	//     }
	// }
	
	function testDecimals(currentVal) {
		var count;
		currentVal.match(/\./g) === null ? count = 0 : count = currentVal.match(/\./g);
		return count;
	}
	
	function replaceCommas(yourNumber) {
		var components = yourNumber.toString().split(".");
		if (components.length === 1)
			components[0] = yourNumber;
		components[0] = components[0].replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		
		if (components.length === 2)
			components[1] = components[1].replace(/\D/g, "");
		return components.join(".");
	}

</script>
