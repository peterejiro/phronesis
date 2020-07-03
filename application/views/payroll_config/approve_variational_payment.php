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
					<h1> Approve Variational Payments</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Approve Variational Payments</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">Approve Variational Payment</div>
          <p class="section-lead">Select variational payments to approve and confirm here</p>
          <div class="row">
            <div class="col-12">
              <form method="post" action="<?php echo site_url('approve_variational_payments')?>">
                <div class="card">
                  <div class="card-header">
                    <h4>Employee Variational Payments</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped table-md" id="datatable-buttons-2">
                        <thead>
                        <tr>
                          <?php if(!empty($variational_payments)):
                            $unconfirmed_payments = false;
                            foreach ($variational_payments as $variational_payment):
                              if($variational_payment->variational_confirm == 0){
                                $unconfirmed_payments = true;
                                break;
		                          }
                            endforeach;
                          endif;?>
                          <?php if($unconfirmed_payments):?>
                            <th>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input master-check" name="approve" id="master-check">
                                <label class="custom-control-label" for="master-check"></label>
                              </div>
                            </th>
                          <?php endif;?>
                          <th class="text-center">S/N</th>
                          <th>Employee Unique ID</th>
                          <th>Employee Name </th>
                          <th>Department</th>
                          <th>Payment Definition</th>
                          <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($variational_payments)):
	                        $i = 1;
	                        foreach($variational_payments as $variational_payment):
		                        if($variational_payment->variational_confirm == 0):
			                        ?>
                              <tr>
                                <td class="p-0 text-center" style="width: 9px">
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input child-check" name="approve[]" value="<?php echo $variational_payment->variational_payment_id; ?>" id="customCheck<?php echo $i; ?>">
                                    <label class="custom-control-label" for="customCheck<?php echo $i; ?>"></label>
                                  </div>
                                </td>
                                <td class="text-center" style="width: 9px"><?php echo $i; ?></td>
                                <td><?php echo $variational_payment->employee_unique_id; ?></td>
                                <td><?php echo $variational_payment->employee_first_name.", ".$variational_payment->employee_last_name; ?></td>
                                <td><?php echo $variational_payment->department_name; ?></td>
                                <td><?php echo $variational_payment->payment_definition_payment_name; ?></td>
                                <td>&#8358; <?php echo number_format($variational_payment->variational_amount);?></td>
                                <!--											<td>-->
                                <!---->
                                <!--												<div class="checkbox my-2">-->
                                <!--													<div class="custom-control custom-checkbox">-->
                                <!---->
                                <!--														<input type="checkbox" class="custom-control-input" name="delete[]" value="--><?php //echo $variational_payment->variational_payment_id; ?><!--" id="delete--><?php //echo $i; ?><!--" data-parsley-multiple="groups" data-parsley-mincheck="0">-->
                                <!--														<label class="custom-control-label" for="delete--><?php //echo $i; ?><!--">Delete</label>-->
                                <!--													</div>-->
                                <!--												</div></td>-->

                              </tr>

		                        <?php
		                        endif;
		                        $i++;

	                        endforeach;
                        endif; ?>

                        </tbody>
                      </table>
                    </div>
                    <input type="hidden" name="<?php echo $csrf_name;?>" value="<?php echo $csrf_hash;?>" />
                  </div>
                  <div class="card-footer text-right bg-whitesmoke">
                    <button type="submit" class="btn btn-primary">Approve Selected Payments</button>
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
<?php include(APPPATH.'\views\footer.php'); ?>
<?php include(APPPATH.'\views\js.php'); ?>
<script>
  $(document).ready(function () {
    // clicking the master checkbox, checks all the children in the table
    $('.master-check').click(function () {
      if ($(this).is(':checked')) {
        $('input:checkbox').prop('checked', true);
      } else {
        $('input:checkbox').prop('checked', false);
      }
    });

    // only keep the master checkbox checked if all the children are checked
    $('input[type="checkbox"].child-check').change(function () {
      let childCheckBoxes = $('input[type="checkbox"].child-check');
      if(childCheckBoxes.length === childCheckBoxes.filter(":checked").length){
        $('.master-check').prop('checked', true);
      } else {
        $('.master-check').prop('checked', false);
      }
    });
  });
</script>
</body>
</html>
