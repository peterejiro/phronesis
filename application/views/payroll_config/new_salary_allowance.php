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
            <a href="<?php echo site_url('allowance')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
					<h1>Add Salary Allowance</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="<?php echo site_url('allowance'); ?>">Salary Allowances</a></div>
            <div class="breadcrumb-item">Add Salary Allowance</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Adding Salary Allowances</div>
          <p class="section-lead">You can fill in the form to add a salary allowance here</p>
          <div class="row">
            <div class="col-12">
              <form class="needs-validation" novalidate method="post" action="<?php echo site_url('add_salary_allowance'); ?>">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>New Salary Allowance Form</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label>Salary Structure Category</label><span style="color: red"> *</span>
                        <select id="payment_type" class="select2 form-control" required name="salary_structure_category" style="width: 100%; height:42px !important;">
                          <option value=""> -- Select -- </option>
				                  <?php foreach ($salary_structures as $salary_structure): ?>
                            <option value="<?php echo $salary_structure->salary_structure_id ?>>"> <?php echo $salary_structure->salary_structure_category_name; ?></option>
				                  <?php endforeach; ?>
                        </select>
                        <p class="form-text text-muted">Add a payment definition and it's corresponding amount for the selected salary structure</p>
                        <div class="invalid-feedback">
                          please select a salary structure category
                        </div>
                      </div>
                    </div>
                    <div id="allowances">
                      <div class="form-group row" id="allowance" style="display: none">
                        <div class="col-sm-5">
                          <label>Payment Definition</label><span style="color: red"> *</span>
                          <select class="form-control" id="payment_definition" required name="payment_definition[]" style="width: 100%; height:42px !important;">
                            <option value=""> -- Select -- </option>
					                  <?php foreach ($payment_definitions as $payment_definition):
						                  if( ($payment_definition->payment_definition_desc == 0) && ($payment_definition->payment_definition_variant == 0)):?>
                                <option value="<?php echo $payment_definition->payment_definition_id ?>"> <?php echo $payment_definition->payment_definition_payment_name." (".$payment_definition->payment_definition_payment_code.")"; ?> </option>
						                  <?php
						                  endif;
					                  endforeach; ?>
                          </select>
                          <div class="invalid-feedback">
                            please select a payment definition
                          </div>
                        </div>
                        <div class="col-sm-5">
                          <label>Amount</label><span style="color: red"> *</span>
                          <input name="allowance_amount[]" type="number" required class="form-control"/>
                          <div class="invalid-feedback">
                            please fill in an amount
                          </div>
                        </div>
                        <button type="button" onclick="delete_div(this)" class="btn btn-round btn-sm btn-danger btn-round" style="margin: 30px 0">
                          <i class="fa fa-minus"></i>
                        </button>
                      </div>
                      <button id="allowance_button" type="button" onclick="clone_div()"  class="btn btn-round btn-sm btn-primary btn-round">
                        <i class="fa fa-plus"></i>
                      </button>
                    </div>
                    <input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
                  </div>
                  <div class="card-footer text-right bg-whitesmoke">
                    <button type="submit" class="btn btn-primary">Add Salary Allowance</button>
                  </div>
                </div>
              </form>
          </div>
        </div>
      </section>
		</div>
	</div>
</div>
<?php include(APPPATH.'/views/footer.php'); ?>
<?php include(APPPATH.'/views/js.php'); ?>
<script>
  window.onload = function(){
    // document.getElementById("allowance").style.display='none';
  };

  var count = 1;

  function clone_div() {
    var elem = document.getElementById('allowance');
    if(elem.style.display == 'none'){
      // elem.style.display = 'block';
      let inputs = elem.getElementsByTagName('input');
      let selects = elem.getElementsByTagName('select');
      elem.style.removeProperty('display');
    } else{
      // Create a copy of it
      var clone = elem.cloneNode(true);
      // Update the ID and add a class
      clone.id = 'allowance'+count;
      var allowances = document.getElementById('allowances');
      var allowance_button = document.getElementById('allowance_button');
      //clone.insertBefore(work_experience_button);
      allowances.insertBefore(clone,allowance_button)
      // Inject it into the DOM
      elem.after(clone);
      var test_id = 'payment_definition'+count;
      $('#'+clone.id).find('select').attr('id', 'payment_definition'+count );
      count ++;
    }
  }

  function delete_div(e){
    var id = e.parentElement.id;
    if(id == 'allowance' ){
      let inputs = e.parentElement.getElementsByTagName('input');
      let selects = e.parentElement.getElementsByTagName('select');
      e.parentElement.style.display = 'none';

      // var elem = document.getElementById('allowance');
      // var inputs = elem.getElementsByTagName('input');
      // var index;
      // for(index = 0; index < inputs.length; ++index){
      // 	if(inputs[index].type == 'text')
      // 		inputs[index].value = '';
      // }


      // var textarea = elem.getElementsByTagName('textarea');
      // textarea.value = '';
      // elem.style.display = 'none';
    } else{
      e.parentElement.remove();

    }

  }






</script>
</body>
</html>






