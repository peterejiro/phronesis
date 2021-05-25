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
            <a href="<?php echo site_url('employee_transfer')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
					<h1>New Transfer</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="<?php echo site_url('employee_transfer')?>">Employee Transfers</a></div>
            <div class="breadcrumb-item">New Transfer</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">New Employee Transfer</div>
          <p class="section-lead">You can fill in the form to add a new employee transfer here</p>
          <div class="row">
            <div class="col-md-7">
              <form class="needs-validation" data-persist="garlic" novalidate method="post" action="<?php echo site_url('add_new_employee_transfer'); ?>" id="loan_form">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>New Transfer Form</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Employee</label><span style="color: red"> *</span>
                      <select class="select2 form-control" required name="employee_id" style="width: 100%; height:42px !important;">
                        <option value=""> -- Select -- </option>
                        <?php foreach ($employees as $employee): ?>
                          <option value="<?php echo $employee->employee_id ?>"> <?php echo $employee->employee_unique_id." (".$employee->employee_last_name." ".$employee->employee_first_name.")"; ?> </option>
                        <?php
                        endforeach; ?>
                      </select>
                      <div class="invalid-feedback">
                        please select an employee
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Transfer Type</label><span style="color: red"> *</span>
                      <select class="form-control select2" required name="transfer_type" id="transfer_type" onchange="check_transfer_type()" style="width: 100%; height:42px !important;">
                        <option value=""> -- Select -- </option>
                        <option value="0"> Inter-Branch </option>
                        <option value="1"> Inter-Subsidiary </option>
                      </select>
                      <div class="invalid-feedback">
                        please select a transfer type
                      </div>
                    </div>
                    <div class="form-group" id="subsidiary" style="display: none">
                      <label>New Subsidiary</label><span style="color: red"> *</span>
                      <select class="form-control select2" required disabled name="subsidiary_id" style="width: 100%; height:42px !important;">
                        <option value=""> -- Select -- </option>
                        <?php foreach ($subsidiarys as $subsidiary):?>
                          <option value="<?php echo $subsidiary->subsidiary_id ?>"> <?php echo $subsidiary->subsidiary_name; ?> </option>
                        <?php
                        endforeach; ?>
                      </select>
                      <div class="invalid-feedback">
                        please select a new subsidiary
                      </div>
                    </div>
                    <div class="form-group" id="location" style="display: none">
                      <label> New Branch</label><span style="color: red"> *</span>
                      <select class="form-control select2" required disabled name="location_id" style="width: 100%; height:42px !important;">
                        <option value=""> -- Select -- </option>
                        <?php foreach ($locations as $location):?>
                          <option value="<?php echo $location->location_id ?>"> <?php echo $location->location_name; ?> </option>
                        <?php
                        endforeach; ?>
                      </select>
                      <div class="invalid-feedback">
                        please select a new branch
                      </div>
                    </div>
                    <input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
                  </div>
                  <div class="card-footer text-right bg-whitesmoke">
                    <button type="submit"  class="btn btn-primary">Add Transfer</button>
                    <button onclick="location.href='<?php echo site_url('employee_transfer');?>'" class="btn btn-danger" type="button">Go Back</button>
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
  $('title').html('New Transfer - Phronesis')

  window.onload = function(){
    // document.getElementById("subsidiary").style.display='none';
    // document.getElementById("location").style.display='none';
  };
  function check_transfer_type() {
    let transfer_type = document.getElementById("transfer_type").value;
    var location = document.getElementById('location');
    var subsidiary = document.getElementById('subsidiary');
    var selectsLoc = location.getElementsByTagName('select');
    var selectsSub = subsidiary.getElementsByTagName('select');
    if(transfer_type == 0){
      // type 0, is branch
      document.getElementById("subsidiary").style.display='none';
      document.getElementById("location").style.removeProperty('display');
      selectsLoc[0].removeAttribute('disabled');
      selectsSub[0].setAttribute('disabled', 'disabled');
    }
    if(transfer_type == 1){
      document.getElementById("location").style.display='none';
      document.getElementById("subsidiary").style.removeProperty('display');
      selectsSub[0].removeAttribute('disabled');
      selectsLoc[0].setAttribute('disabled', 'disabled');
    }
  }

  function addMonths(date, months) {
    var d = date.getDate();
    date.setMonth(date.getMonth() + +months);
    if (date.getDate() != d) {
      date.setDate(0);
    }
    return date;
  }

</script>
</body>
</html>


