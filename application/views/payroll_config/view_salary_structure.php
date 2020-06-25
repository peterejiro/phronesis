<!DOCTYPE html>
<html lang="en">
<head>



	<?php include(APPPATH.'\views\stylesheet.php'); ?>
	<!-- DataTables -->


</head>


<body class="fixed-left">
<!-- Begin page -->
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>
		<?php include(APPPATH.'\views\topbar.php'); ?>


		<?php include(APPPATH.'\views\sidebar.php'); ?>



		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1> <?php echo $salary_structure_category->salary_structure_category_name." Allowances"; ?></h1>
				</div>


				<div class="row">
					<div class="col-12 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-body">


								<table id="datatable-buttons"  class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


									<thead>



									<tr>
										<th>S/N</th>
										<th>Payment Name</th>

										<th>Pay Code</th>
										<th>Amount</th>


									</tr>
									</thead>


									<tbody>
									<?php if(!empty($allowances)):
										$i = 1;
										foreach($allowances as $allowance):
											?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $allowance->payment_definition_payment_name; ?></td>

												<td><?php echo $allowance->payment_definition_payment_code; ?></td>
												<td><?php echo number_format($allowance->salary_structure_allowance_amount); ?></td>


											</tr>

											<?php
											$i++;

										endforeach;
									endif; ?>

									</tbody>

								</table>





							</div>


						</div>
					</div>


			</section>
		</div>




	</div>
</div>





<!-- End Right content here -->

</div>
<!-- END wrapper -->


<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>







<script>

	window.onload = function(){
		document.getElementById("taxablediv").style.display='none';
		document.getElementById("paymentdiv").style.display='none';
	};

	function check_taxable(){
		var payment_type = document.getElementById('payment_type').value;

		if(payment_type == 1){

			document.getElementById("taxablediv").style.display='block';
			document.getElementById('taxable').selectedIndex = "0";
			document.getElementById('taxable').disabled = false;

			document.getElementById("paymentdiv").style.display='none';
			document.getElementById('paymentdesc').disabled = true;
			document.getElementById('tienumber').disabled = true;
		}

		if( payment_type == 0){
			document.getElementById("taxablediv").style.display='block';
			document.getElementById('taxable').selectedIndex = "0";
			document.getElementById('taxable').disabled = true;

			document.getElementById("paymentdiv").style.display='block';
			document.getElementById('paymentdesc').disabled = false;
			document.getElementById('tienumber').disabled = false;
			document.getElementById('tienumber').selectedIndex = "0";

		}

	}



</script>
