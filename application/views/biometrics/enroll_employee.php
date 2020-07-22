<?php include(APPPATH.'\views\stylesheet.php');
$CI =& get_instance();
$CI->load->model('biometric');

?>

<body>
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>
		<?php include(APPPATH.'\views\topbar.php'); ?>
		<?php include(APPPATH.'\views\sidebar.php'); ?>
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1>Manage Employees</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Enroll Employee</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Managing Employees Biometrics</div>
          <p class="section-lead">You can manage employee Biometrics here</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>All Employees</h4>

                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-bordered table-striped table-md">
                      <thead>
                      <tr>
                        <th>Employee Name</th>
                        <th>Employee Unique Id</th>
                        <th>Enrollment Status</th>

                        <th class="text-center">Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php if(!empty($employees)):
                        foreach($employees as $employee):
                          ?>
                          <tr>
                            <td><?php echo $employee->employee_last_name." ".$employee->employee_first_name." ".$employee->employee_other_name; ?></td>
                            <td><?php echo $employee->employee_unique_id; ?></td>
                            <td><?php

								$check_biometrics  = $CI->biometric->get_employee_biometric($employee->employee_id);

								if(empty($check_biometrics)): ?>

									<div class="badge badge-danger">Not Enrolled</div>

						<?php	else: ?>
									<div class="badge badge-success">Enrolled</div>

							<?php	endif;


							?>
								<code id="<?php echo "user_finger_".$employee->employee_id; ?>"> <?php echo count($check_biometrics); ?></code>

								</td>

                            <td class="text-center" style="width: 9px">
                              <div class="dropdown">
                                <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                <div class="dropdown-menu">

                                  <?php if(empty($check_biometrics)): ?>
									 <?php $url_register = base64_encode(site_url('reg').'/'.$employee->employee_id);

									  $register = "<a class=\"dropdown-item has-icon\" href='finspot:FingerspotReg;$url_register' class='btn btn-xs btn-primary' onclick=\"user_register('".$employee->employee_id."','".$employee->employee_unique_id."')\"><i class=\"fas fa-edit\"></i>Enroll Fingerprint</a>";

									 echo $register;


									 else:
										 $url_verification	= base64_encode(site_url('clock_in').'/'.$employee->employee_id);
										 $verification = "<a class=\"dropdown-item has-icon\" href='finspot:FingerspotVer;$url_verification' class='btn btn-xs btn-primary'><i class=\"fas fa-edit\"></i>Clock In</a>";


/*                                    <a class="dropdown-item has-icon" href="<?php echo site_url('clock_in').'/'.$employee->employee_id; ?>"><i class="fas fa-question"></i>Clock In</a>*/
										echo $verification;
                                 endif; ?>
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

<script type="text/javascript">

	$('title').html('User');

	function user_delete(user_id, user_name) {

		var r = confirm("Delete user "+user_name+" ?");

		if (r == true) {

			push('user.php?action=delete&user_id='+user_id);

		}
	}

	function user_register(user_id, user_name) {

		$('body').ajaxMask();

		regStats = 0;
		regCt = -1;
		try
		{
			timer_register.stop();
		}
		catch(err)
		{
			console.log('Registration timer has been init');
		}


		var limit = 4;
		var ct = 1;
		var timeout = 5000;

		timer_register = $.timer(timeout, function() {
			console.log("'"+user_name+"' registration checking...");
			user_checkregister(user_id, $("#user_finger_"+user_id).html());
			if (ct>=limit || regStats===1)
			{
				timer_register.stop();
				console.log("'"+user_name+"' registration checking end");

				if (ct>=limit && regStats===0)
				{
					alert("'"+user_name+"' registration fail!");
					$('body').ajaxMask({ stop: true });
				}
				if (regStats===1)
				{
					$("#user_finger_"+user_id).html(regCt);
					alert("'"+user_name+"' registration success!");
					$('body').ajaxMask({ stop: true });
					//load('user.php?action=index');
				}
			}
			ct++;
		});
	}

	function user_checkregister(user_id, current) {
		$.ajax({
			url			:	"<?php echo site_url('checkreg') ?>",
			//url			:	"user.php?action=checkreg&user_id="+user_id+"&current="+current,
			type		:	"GET",
			data: {username:user_id,current:current},
			success		:	function(data)
			{
				try
				{
					//var res = jQuery.parseJSON(data);
					var res = data;
					if (res.result)
					{
						regStats = 1;
						$.each(res, function(key, value){
							if (key ==='current')
							{
								regCt = value;
							}
						});
					}
				}
				catch(err)
				{
					alert(err.message);
				}
			}
		});
	}

</script>
