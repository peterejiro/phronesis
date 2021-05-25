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
          <div class="section-header-back">
            <a href="<?php echo site_url('payment_definition')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
					<h1> Edit Payment Definition</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="<?php echo site_url('payment_definition'); ?>">Payment Definitions</a></div>
            <div class="breadcrumb-item">Edit Payment Definition</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Editing Payment Definitions</div>
          <p class="section-lead">You can fill in the form to edit a payment definition here</p>
          <div class="row">
            <div class="col-12">
              <form class="needs-validation" novalidate method="post" action="<?php echo site_url('update_payment_definition'); ?>">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Edit Payment Definition Form</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row">
                      <div class="col-sm-4">
                        <label> Payment Code</label><span style="color: red"> *</span>
                        <input name="payment_definition_code" required value="<?php echo $payment_definition->payment_definition_payment_code; ?>" type="number" class="form-control"/>
                        <div class="invalid-feedback">
                          please fill in a payment code
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <label> Payment Name</label><span style="color: red"> *</span>
                        <input name="payment_definition_name" value="<?php echo $payment_definition->payment_definition_payment_name; ?>" required type="text" class="form-control"/>
                        <div class="invalid-feedback">
                          please fill in a payment name
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <label> Payment Variance</label>
                        <select class="select2 form-control" required name="payment_definition_variant" style="width: 100%; height:42px !important;">
                          <option value=""> -- Select -- </option>
                          <option value="0" <?php if($payment_definition->payment_definition_variant == 0){ echo "selected" ;} ?>> Standard </option>
                          <option value="1" <?php if($payment_definition->payment_definition_variant == 1){ echo "selected" ;} ?>> Variation</option>
                        </select>
                        <div class="invalid-feedback">
                          please select a payment variance
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label>Payment Type</label><span style="color: red"> *</span>
                        <select id="payment_type" class="select2 form-control" onchange="check_taxable()" required name="payment_definition_type" style="width: 100%; height:42px !important;">
                          <option value="0" <?php if($payment_definition->payment_definition_type == 0) { echo "selected";} ?>> Deduction </option>
                          <option value="1" <?php if($payment_definition->payment_definition_type == 1) { echo "selected";} ?>> Income</option>
                        </select>
                        <div class="invalid-feedback">
                          please select a payment type
                        </div>
                      </div>
                      <div class="col-sm-3" id="taxablediv">
                        <label>Taxable</label>
                        <select id="taxable" class="select2 form-control" required name="payment_definition_taxable" style="width: 100%; height:42px !important;">
                          <option value="0" <?php if($payment_definition->payment_definition_taxable == 0) { echo "selected";} ?>> No </option>
                          <option value="1" <?php if($payment_definition->payment_definition_taxable == 1) { echo "selected";} ?>> Yes</option>
                        </select>
                      </div>
                      <div class="col-sm-3" id="basicdiv">
                        <label>Basic</label>
                        <select id="basic" class="select2 form-control" required name="payment_definition_basic" style="width: 100%; height:42px !important;">
                          <option value="0" <?php if($payment_definition->payment_definition_basic == 0) { echo "selected";} ?>> No </option>
                          <option value="1" <?php if($payment_definition->payment_definition_basic == 1) { echo "selected";} ?>> Yes</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row" id="paymentdiv" style="display: none">
                      <div class="col-sm-6">
                        <label>Payment Description</label>
                        <select id="paymentdesc" class="select2 form-control" required name="payment_definition_payment_desc" style="width: 100%; height:42px !important;">
                          <option value="0" <?php if($payment_definition->payment_definition_desc == 0) { echo "selected";} ?>> N/A </option>
                          <option value="1" <?php if($payment_definition->payment_definition_desc == 1) { echo "selected";} ?>> Loan </option>
                          <option value="2" <?php if($payment_definition->payment_definition_desc == 2) { echo "selected";} ?>> Tax </option>
                          <option value="3" <?php if($payment_definition->payment_definition_desc == 3) { echo "selected";} ?>>Pension </option>
                          <option value="4" <?php if($payment_definition->payment_definition_desc == 4) { echo "selected";} ?>> HMO </option>
                        </select>
                      </div>
                      <div class="col-sm-6">
                        <label>Tie Number</label>
                        <select id="tienumber" class="select2 form-control" required name="payment_definition_tie_number" style="width: 100%; height:42px !important;">
                          <option value="0">  N/A </option>
				                  <?php foreach ($tie_numbers as $tie_number): ?>
                            <option value="<?php echo $tie_number ?>" <?php if($payment_definition->payment_definition_desc == $tie_number) { echo "selected";} ?>> <?php echo $tie_number; ?> </option>
				                  <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <input type="hidden" name="payment_definition_id" value="<?php echo $payment_definition->payment_definition_id; ?>">
                    <input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
                  </div>
                  <div class="card-footer text-right bg-whitesmoke">
                    <button type="submit" class="btn btn-primary">Edit Payment Definition</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
		</div>
	</div>
</div>
<?php include(APPPATH.'/views/footer.php'); ?>
<?php include(APPPATH.'/views/js.php'); ?>
<script>
	$('title').html('Edit Payment Definition - Phronesis')
	window.onload = function(){
    var payment_type = document.getElementById('payment_type').value;
    if(payment_type == 1){

      document.getElementById("taxablediv").style.display='block';
      document.getElementById('taxable').disabled = false;
      document.getElementById('basic').disabled = false;

      document.getElementById("paymentdiv").style.display='none';
      //document.getElementById('paymentdesc').disabled = true;
      //document.getElementById('tienumber').disabled = true;

    }

    if( payment_type == 0){
      document.getElementById("taxablediv").style.display='block';
      document.getElementById('taxable').disabled = true;
      document.getElementById('basic').disabled = true;

      document.getElementById("paymentdiv").style.display='block';
      document.getElementById("paymentdiv").style.removeProperty('display');

    }


  };

  function check_taxable(){
    var payment_type = document.getElementById('payment_type').value;

    if(payment_type == 1){

      document.getElementById("taxablediv").style.display='block';
      document.getElementById('taxable').selectedIndex = "0";
      document.getElementById('taxable').disabled = false;
      document.getElementById('basic').selectedIndex = "0";
      document.getElementById('basic').disabled = false;

      document.getElementById("paymentdiv").style.display='none';
      document.getElementById('paymentdesc').disabled = true;
      document.getElementById('tienumber').disabled = true;
    }

    if( payment_type == 0){
      document.getElementById("taxablediv").style.display='block';
      document.getElementById('taxable').selectedIndex = "0";
      document.getElementById('taxable').disabled = true;
      document.getElementById('basic').selectedIndex = "0";
      document.getElementById('basic').disabled = true;

      document.getElementById("paymentdiv").style.removeProperty('display');
      document.getElementById('paymentdesc').disabled = false;
      document.getElementById('tienumber').disabled = false;
      document.getElementById('tienumber').selectedIndex = "0";

    }

  }



</script>
</body>
</html>

