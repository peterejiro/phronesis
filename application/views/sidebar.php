<div class="main-sidebar">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="index.html">IHumane</a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="index.html">IH</a>
		</div>
		<ul class="sidebar-menu">
			<li class="menu-header">Dashboard</li>
			<li class="dropdown">
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Home</span></a>
				<ul class="dropdown-menu">
					<li><a class="nav-link" href="<?php echo base_url(); ?>">Home</a></li>

				</ul>
			</li>
			<li class="menu-header">Human Resources</li>
			<li class="dropdown <?php echo $this->uri->segment(2) == 'layout_transparent' ? 'active' : ''; ?>">
			<?php if($employee_management == 1){  ?>
				<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Employee Mgmt</span></a>
				<ul class="dropdown-menu">

					<li><a class="nav-link" href="<?php echo site_url('new_employee') ?>"> New Employee</a></li>
					<li><a class="nav-link" href="<?php echo site_url('employee') ?>"> Manage Employees</a></li>

				</ul>
				<?php } ?>
			</li>

			<li class="menu-header">Finance</li>
			<li class="dropdown <?php echo $this->uri->segment(2) == 'layout_transparent' ? 'active' : ''; ?>">
				<?php if($payroll_management == 1){  ?>
				<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-invoice"></i> <span>Payroll</span></a>
				<ul class="dropdown-menu">

					<li><a class="nav-link" href="<?php //echo site_url('employee_salary_structure') ?>"> Employee Salary Struct </a></li>
					<li><a class="nav-link" href="<?php echo site_url('variational_payment') ?>"> Variational Payment </a></li>
					<li><a class="nav-link" href="<?php echo site_url('approve_variational_payment') ?>"> Approve  Payment </a></li>
					<li><a class="nav-link" href="<?php echo site_url('payroll_routine') ?>"> Payroll Routine </a></li>
					<li><a class="nav-link" href="<?php echo site_url('approve_payroll_routine') ?>"> Approve Routine </a></li>
					<li><a class="nav-link" href="<?php echo site_url('payroll_report') ?>"> Payroll Reports </a></li>

				</ul>
				<?php  } ?>
			</li>
			<li class="dropdown <?php echo $this->uri->segment(2) == 'layout_transparent' ? 'active' : ''; ?>">
			<?php if($payroll_management == 1){  ?>
				<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-invoice"></i> <span>Loans</span></a>
				<ul class="dropdown-menu">

					<li><a class="nav-link" href="<?php echo site_url('new_loan') ?>"> New Loan </a></li>
					<li><a class="nav-link" href="<?php echo site_url('loans') ?>"> Loans </a></li>


				</ul>
			<?php } ?>
			</li>

			<li class="dropdown <?php echo $this->uri->segment(2) == 'layout_transparent' ? 'active' : ''; ?>">
			<?php if($biometrics == 1){  ?>
				<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-invoice"></i> <span>Biometrics</span></a>
				<ul class="dropdown-menu">

<!--					<li><a class="nav-link" href="--><?php ////echo site_url('employee_salary_structure') ?><!--"> Employee Salary Struct </a></li>-->
<!--					<li><a class="nav-link" href="--><?php //echo site_url('variational_payment') ?><!--"> Variational Payment </a></li>-->
<!--					<li><a class="nav-link" href="--><?php //echo site_url('approve_variational_payment') ?><!--"> Approve  Payment </a></li>-->
<!--					<li><a class="nav-link" href="--><?php //echo site_url('payroll_routine') ?><!--"> Payroll Routine </a></li>-->
<!--					<li><a class="nav-link" href="--><?php //echo site_url('approve_payroll_routine') ?><!--"> Approve Routine </a></li>-->
<!--					<li><a class="nav-link" href="--><?php //echo site_url('payroll_report') ?><!--"> Payroll Reports </a></li>-->

				</ul>
				<?php } ?>
			</li>


			<li class="menu-header">Admin Settings</li>
			<li class="dropdown">
				<?php if($user_management == 1){  ?>
				<a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>User Mgmt</span></a>
				<ul class="dropdown-menu">
					<li><a class="nav-link" href="<?php echo site_url('user') ?>">Manage Users</a></li>

				</ul>
				<?php } ?>
			</li>
			<li class="dropdown">
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-exclamation"></i> <span>App Config</span></a>
				<ul class="dropdown-menu">

				</ul>
			</li>
			<li class="dropdown">
			<?php if($hr_configuration == 1){  ?>
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>HR Config</span></a>
				<ul class="dropdown-menu">
					<li><a class="nav-link" href="<?php echo site_url('bank') ?>">Bank Setup</a></li>
					<li><a class="nav-link" href="<?php echo site_url('pension') ?>">Pension Setup</a></li>
					<li><a class="nav-link" href="<?php echo site_url('health_insurance') ?>">HMO Setup</a></li>
					<li><a class="nav-link" href="<?php echo site_url('department') ?>">Department Setup</a></li>
					<li><a class="nav-link" href="<?php echo site_url('grade') ?>">Grade Setup</a></li>
					<li><a class="nav-link" href="<?php echo site_url('job_role') ?>">Job Roles Setup</a></li>
					<li><a class="nav-link" href="<?php echo site_url('location') ?>">Location Setup</a></li>
					<li><a class="nav-link" href="<?php echo site_url('qualification') ?>">Qualification Setup</a></li>
				</ul>
			<?php } ?>
			</li>

			<li class="dropdown">
				<?php if($payroll_configuration == 1){  ?>
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>Payroll Config</span></a>
				<ul class="dropdown-menu">
					<li><a class="nav-link" href="<?php echo site_url('payment_definition') ?>">Payment Definition</a></li>
					<li><a class="nav-link" href="<?php echo site_url('tax_rates') ?>">Tax Rates</a></li>
					<li><a class="nav-link" href="<?php echo site_url('salary_structure') ?>">Salary Structure</a></li>
				<li><a class="nav-link" href="<?php echo site_url('allowance') ?>">Salary Allowances</a></li>
				<li><a class="nav-link" href="<?php echo site_url('payroll_month_year') ?>"> Payroll Month/Year </a></li>
				<li><a class="nav-link" href="<?php echo site_url('min_tax_rate') ?>"> Minimum Tax Rate </a></li>
				<li><a class="nav-link" href="<?php echo site_url('pension_rate') ?>"> Pension Rate </a></li>
				</ul>
				<?php } ?>
			</li>
			<li class="dropdown">
				<?php if($payroll_configuration == 1){  ?>
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Logs</span></a>
				<ul class="dropdown-menu">
												<li><a class="nav-link" href="<?php echo site_url('view_log') ?>">View Logs</a></li>
				</ul>
				<?php } ?>
			</li>

		</ul>

		<div class="mt-4 mb-4 p-3 hide-sidebar-mini">
			<a href="<?php echo base_url('logout'); ?>" class="btn btn-primary btn-lg btn-block btn-icon-split">
				<i class="fas fa-rocket"></i> Logout
			</a>
		</div>
	</aside>
</div>


