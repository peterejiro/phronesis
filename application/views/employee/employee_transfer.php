<?php include(APPPATH.'\views\stylesheet.php');
$CI =& get_instance();
$CI->load->model('hr_configurations');
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
					<h1>Employee Transfers</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Employee Transfers</div>
          </div>
				</div>
        <div class="section-body">
          <div class="section-title">All About Employee Transfers</div>
          <p class="section-lead">You can manage employee transfers here</p>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Employee Transfers</h4>
                  <div class="card-header-action">
                    <button onclick="location.href='<?php echo site_url('new_employee_transfer')?>'" type="button" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> New Transfer</button>
                  </div>
                </div>
                <div class="card-body">
                  <table id="datatable-buttons-2" class="table table-bordered table-striped table-md">
                    <thead>
                      <tr>
                        <th>Employee Name</th>
                        <th>Transfer Type</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($transfers)):
                      foreach($transfers as $transfer):
                        ?>
                        <tr>
                          <td><?php echo $transfer->employee_last_name." ".$transfer->employee_first_name; ?></td>
                          <td><?php if($transfer->transfer_type == 0){ echo "Inter Branch Transfer"; } if($transfer->transfer_type == 1){ echo "Inter Subsidiary Transfer"; } ; ?></td>
                          <td><?php
                            if($transfer->transfer_type == 0){ echo $CI->hr_configurations->view_location($transfer->transfer_from)->location_name; } if($transfer->transfer_type == 1){ echo $CI->hr_configurations->view_subsidiary($transfer->transfer_from)->subsidiary_name; }
                            ?></td>
                          <td>
                            <?php
                            if($transfer->transfer_type == 0){ echo $CI->hr_configurations->view_location($transfer->transfer_to)->location_name; } if($transfer->transfer_type == 1){ echo $CI->hr_configurations->view_subsidiary($transfer->transfer_to)->subsidiary_name; }
                            ?>
                          </td>
                          <td><?php echo $transfer->transfer_date; ?></td>
                        </tr>
                      <?php
                      endforeach;
                    endif; ?>
                    </tbody>
                  </table>
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
<?php include(APPPATH.'\views\js.php'); ?>
</body>
</html>
