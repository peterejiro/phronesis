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
			<li class="dropdown <?php echo $this->uri->segment(1) == '' || $this->uri->segment(1) == 'home' ? 'active' : ''; ?>">
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Home</span></a>
				<ul class="dropdown-menu">
					<li class="<?php echo $this->uri->segment(1) == '' || $this->uri->segment(1) == 'home' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>">Dashboard</a></li>
				</ul>
			</li>
			<li class="menu-header">Human Resources</li>
			<li class="dropdown <?php echo $this->uri->segment(1) == 'new_employee' || $this->uri->segment(1) == 'employee' ? 'active' : ''; ?>">
			<?php if($employee_management == 1){  ?>
				<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Employees</span></a>
				<ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(1) == 'new_employee' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo site_url('new_employee') ?>"> New Employee</a></li>
          <li class="<?php echo $this->uri->segment(1) == 'employee' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo site_url('employee') ?>"> Manage Employees</a></li>
				</ul>
      <?php } ?>
			</li>

			<li class="menu-header">Finance</li>
			<li class="dropdown <?php echo
      $this->uri->segment(1) == 'employee_salary_structure' ||
      $this->uri->segment(1) == 'variational_payment' ||
      $this->uri->segment(1) == 'approve_variational_payment' ||
      $this->uri->segment(1) == 'payroll_routine' ||
      $this->uri->segment(1) == 'approve_payroll_routine' ||
      $this->uri->segment(1) == 'payroll_report'? 'active' : '';
			?>">
				<?php if($payroll_management == 1){  ?>
				<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-money-bill-wave"></i><span>Payroll</span></a>
				<ul class="dropdown-menu">
					<li class="<?php echo $this->uri->segment(1) == 'employee_salary_structure' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo site_url('employee_salary_structure') ?>">Salary Structures </a></li>
					<li class="<?php echo $this->uri->segment(1) == 'variational_payment' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo site_url('variational_payment') ?>">Variational Payment</a></li>
					<li class="<?php echo $this->uri->segment(1) == 'approve_variational_payment' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo site_url('approve_variational_payment') ?>">Approve Payment</a></li>
					<li class="<?php echo $this->uri->segment(1) == 'payroll_routine' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo site_url('payroll_routine') ?>"> Payroll Routine</a></li>
					<li class="<?php echo $this->uri->segment(1) == 'approve_payroll_routine' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo site_url('approve_payroll_routine') ?>"> Approve Routine </a></li>
					<li class="<?php echo $this->uri->segment(1) == 'payroll_report' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo site_url('payroll_report') ?>"> Payroll Reports </a></li>
				</ul>
				<?php  } ?>
			</li>
			<li class="dropdown <?php echo $this->uri->segment(1) == 'new_loan' || $this->uri->segment(1) == 'loans' ? 'active' : ''; ?>">
			<?php if($payroll_management == 1){  ?>
				<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-university"></i> <span>Loans</span></a>
				<ul class="dropdown-menu">
					<li class="<?php echo $this->uri->segment(1) == 'new_loan' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo site_url('new_loan') ?>"> New Loan </a></li>
					<li class="<?php echo $this->uri->segment(1) == 'loans' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo site_url('loans') ?>"> Manage Loans </a></li>
				</ul>
			<?php } ?>
			</li>

			<li class="dropdown <?php echo $this->uri->segment(2) == 'layout_transparent' ? 'active' : ''; ?>">
			<?php if($biometrics == 1){  ?>
				<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-fingerprint"></i> <span>Biometrics</span></a>
				<ul class="dropdown-menu">
				</ul>
				<?php } ?>
			</li>

			<li class="menu-header">Admin Settings</li>
			<li class="dropdown <?php echo $this->uri->segment(1) == 'user' ? 'active' : ''; ?>">
				<?php if($user_management == 1){  ?>
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-user-plus"></i> <span>Users</span></a>
				<ul class="dropdown-menu">
					<li class="<?php echo $this->uri->segment(1) == 'user' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo site_url('user') ?>">Manage Users</a></li>
				</ul>
				<?php } ?>
			</li>

      <li class="dropdown">
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-laptop"></i> <span>App Config</span></a>
				<ul class="dropdown-menu">
				</ul>
			</li>

			<li class="dropdown <?php echo
      $this->uri->segment(1) == 'bank' ||
      $this->uri->segment(1) == 'pension' ||
      $this->uri->segment(1) == 'health_insurance' ||
      $this->uri->segment(1) == 'department' ||
      $this->uri->segment(1) == 'grade' ||
      $this->uri->segment(1) == 'job_role' ||
      $this->uri->segment(1) == 'location' ||
      $this->uri->segment(1) == 'qualification' ? 'active' : '';
			?>">
			<?php if($hr_configuration == 1){  ?>
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-users-cog"></i> <span>HR Config</span></a>
				<ul class="dropdown-menu">
					<li class="<?php echo $this->uri->segment(1) == 'bank' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo site_url('bank') ?>">Bank Setup</a></li>
					<li class="<?php echo $this->uri->segment(1) == 'pension' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo site_url('pension') ?>">Pension Setup</a></li>
					<li class="<?php echo $this->uri->segment(1) == 'health_insurance' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo site_url('health_insurance') ?>">HMO Setup</a></li>
					<li class="<?php echo $this->uri->segment(1) == 'department' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo site_url('department') ?>">Department Setup</a></li>
					<li class="<?php echo $this->uri->segment(1) == 'grade' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo site_url('grade') ?>">Grade Setup</a></li>
					<li class="<?php echo $this->uri->segment(1) == 'job_role' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo site_url('job_role') ?>">Job Roles Setup</a></li>
					<li class="<?php echo $this->uri->segment(1) == 'location' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo site_url('location') ?>">Location Setup</a></li>
					<li class="<?php echo $this->uri->segment(1) == 'qualification' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo site_url('qualification') ?>">Qualification Setup</a></li>
				</ul>
			<?php } ?>
			</li>

			<li class="dropdown <?php echo
      $this->uri->segment(1) == 'payment_definition' ||
      $this->uri->segment(1) == 'tax_rates' ||
      $this->uri->segment(1) == 'salary_structure' ||
      $this->uri->segment(1) == 'allowance' ||
      $this->uri->segment(1) == 'payroll_month_year' ||
      $this->uri->segment(1) == 'min_tax_rate' ||
      $this->uri->segment(1) == 'pension_rate' ? 'active' : '';
      ?>">
      <?php if($payroll_configuration == 1){  ?>
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-check"></i> <span>Payroll Config</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(1) == 'payment_definition' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo site_url('payment_definition') ?>">Payment Definition</a></li>
          <li class="<?php echo $this->uri->segment(1) == 'tax_rates' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo site_url('tax_rates') ?>">Tax Rates</a></li>
          <li class="<?php echo $this->uri->segment(1) == 'salary_structure' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo site_url('salary_structure') ?>">Salary Structure</a></li>
          <li class="<?php echo $this->uri->segment(1) == 'allowance' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo site_url('allowance') ?>">Salary Allowances</a></li>
          <li class="<?php echo $this->uri->segment(1) == 'payroll_month_year' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo site_url('payroll_month_year') ?>"> Payroll Month/Year </a></li>
          <li class="<?php echo $this->uri->segment(1) == 'min_tax_rate' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo site_url('min_tax_rate') ?>"> Minimum Tax Rate </a></li>
          <li class="<?php echo $this->uri->segment(1) == 'pension_rate' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo site_url('pension_rate') ?>"> Pension Rate </a></li>
        </ul>
      <?php } ?>
			</li>

			<li class="dropdown <?php echo $this->uri->segment(1) == 'view_log' ? 'active' : ''?>">
				<?php if($payroll_configuration == 1){  ?>
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-clipboard-list "></i> <span>Logs</span></a>
				<ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(1) == 'view_log' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo site_url('view_log') ?>">View Logs</a></li>
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


