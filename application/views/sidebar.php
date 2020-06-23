<div class="left side-menu" id="sidebar">
	<button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left btn btn-light">
		<i class="mdi mdi-responsive "></i>
	</button>



	<!-- LOGO -->
	<div class="topbar-left">
		<div class="text-center">
			<!--<a href="index.html" class="logo"><i class="fa fa-paw"></i> Aplomb</a>-->
<!--			<a href="index.html" class="logo"><img src="assets/images/logo.png" height="14" alt="logo"></a>-->
			<a href="<?php echo site_url(''); ?>" class="logo">iHumane</a>
		</div>
	</div>


	<div class="sidebar-inner slimscrollleft" >





		<div id="sidebar-menu">
			<ul>
				<li class="menu-title">Welcome <?php echo $user_data->user_name; ?> </li>
				<li class="menu-title">Menu</li>

				<li>
					<a href="<?php echo site_url(); ?>" class="waves-effect waves-light"><i class="mdi mdi-view-dashboard"></i><span> Home </span> </a>

				</li>


				<?php if($employee_management == 1){  ?>
				<li class="has_sub">
					<a href="javascript:void(0);" class="waves-effect waves-light"><i class="mdi mdi-google-circles-extended"></i><span> Employee Mgt </span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
					<ul class="list-unstyled">
						<li><a href="<?php echo site_url('new_employee') ?>"> New Employee</a></li>
						<li><a href="<?php echo site_url('employee') ?>"> Manage Employees</a></li>

					</ul>
				</li>
				<?php  } ?>

				<?php if($payroll_management == 1){  ?>

				<li class="has_sub">
					<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cash-multiple "></i><span> Payroll </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
					<ul class="list-unstyled">
						<li><a href="<?php echo site_url('employee_salary_structure') ?>"> Employee Salary Structures </a></li>
						<li><a href="<?php echo site_url('variational_payment') ?>"> Variational Payment </a></li>
						<li><a href="<?php echo site_url('approve_variational_payment') ?>"> Approve Variational Payment </a></li>
						<li><a href="<?php echo site_url('payroll_routine') ?>"> Payroll Routine </a></li>
						<li><a href="<?php echo site_url('approve_payroll_routine') ?>"> Approve Payroll Routine </a></li>
						<li><a href="<?php echo site_url('payroll_report') ?>"> Payroll Reports </a></li>


					</ul>
				</li>
				<?php } ?>

				<?php if($payroll_management == 1){  ?>

					<li class="has_sub">
						<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cash-multiple "></i><span> Loans</span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
						<ul class="list-unstyled">
							<li><a href="<?php echo site_url('new_loan') ?>"> New Loan </a></li>
							<li><a href="<?php echo site_url('loans') ?>"> Loans </a></li>
<!--							<li><a href="--><?php //echo site_url('approve_variational_payment') ?><!--"> Approve Variational Payment </a></li>-->

						</ul>
					</li>
				<?php } ?>

				<?php if($biometrics == 1){  ?>

					<li class="has_sub">
						<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-google-pages"></i><span> Biometrics </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
						<ul class="list-unstyled">
							<li><a href="pages-profile.html">Profile</a></li>
							<li><a href="pages-invoice.html">Invoice</a></li>
							<li><a href="pages-timeline.html">Timeline</a></li>
							<li><a href="pages-contact.html">Contact-List</a></li>
							<li><a href="pages-blank.html">Blank Page</a></li>
						</ul>
					</li>
				<?php } ?>

				<?php if($user_management == 1){  ?>

					<li class="has_sub">
						<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-face"></i><span> User Management </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
						<ul class="list-unstyled">
							<li><a href="<?php echo site_url('user') ?>">Manage Users</a></li>
						</ul>
					</li>
				<?php } ?>


				<?php if($configuration == 1){  ?>

					<li class="has_sub">
						<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-settings"></i><span> App Configuration </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
						<ul class="list-unstyled">
							<li><a href="<?php echo site_url('app_setup') ?>">App Setup</a></li>


						</ul>
					</li>
				<?php } ?>

				<?php if($hr_configuration == 1){  ?>

					<li class="has_sub">
						<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-settings"></i><span> HR Configuration </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
						<ul class="list-unstyled">
							<li><a href="<?php echo site_url('bank') ?>">Bank Setup</a></li>
							<li><a href="<?php echo site_url('pension') ?>">Pension Setup</a></li>
							<li><a href="<?php echo site_url('health_insurance') ?>">HMO Setup</a></li>
							<li><a href="<?php echo site_url('department') ?>">Department Setup</a></li>
							<li><a href="<?php echo site_url('grade') ?>">Grade Setup</a></li>
							<li><a href="<?php echo site_url('job_role') ?>">Job Roles Setup</a></li>
							<li><a href="<?php echo site_url('location') ?>">Location Setup</a></li>
							<li><a href="<?php echo site_url('qualification') ?>">Qualification Setup</a></li>


						</ul>
					</li>
				<?php } ?>

				<?php if($payroll_configuration == 1){  ?>

					<li class="has_sub">
						<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-settings"></i><span> Payroll Config </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
						<ul class="list-unstyled">
							<li><a href="<?php echo site_url('payment_definition') ?>">Payment Definition</a></li>
							<li><a href="<?php echo site_url('tax_rates') ?>">Tax Rates</a></li>
							<li><a href="<?php echo site_url('salary_structure') ?>">Salary Structure</a></li>
							<li><a href="<?php echo site_url('allowance') ?>">Salary Structure Allowances</a></li>
							<li><a href="<?php echo site_url('payroll_month_year') ?>"> Payroll Month/Year </a></li>
							<li><a href="<?php echo site_url('min_tax_rate') ?>"> Minimum Tax Rate </a></li>
							<li><a href="<?php echo site_url('pension_rate') ?>"> Pension Rate </a></li>




						</ul>
					</li>
				<?php } ?>

				<?php if($payroll_configuration == 1){  ?>

					<li class="has_sub">
						<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-settings"></i><span> Logs </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
						<ul class="list-unstyled">
							<li><a href="<?php echo site_url('view_log') ?>">View Logs</a></li>




						</ul>
					</li>
				<?php } ?>


				<li>
					<a href="<?php echo site_url('logout'); ?>" class="waves-effect waves-light"><i class="mdi mdi-power text-danger"></i><span> Logout </span> </a>

				</li>

			</ul>
		</div>
		<div class="clearfix"></div>
	</div> <!-- end sidebarinner -->


</div>

