<nav class="navbar navbar-secondary navbar-expand-lg">
	<div class="container">
		<ul class="navbar-nav">
			<li class="nav-item dropdown">
				<a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
				<ul class="dropdown-menu">
					<li class="nav-item"><a href="<?php echo base_url(); ?>" class="nav-link">Personal Information</a></li>
					<li class="nav-item"><a href="<?php echo base_url('employee_history') ?>" class="nav-link">Employee History</a></li>

				</ul>
			</li>

			<li class="nav-item dropdown">
				<a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Leaves</span></a>
				<ul class="dropdown-menu">
					<li class="nav-item"><a href="<?php echo base_url('my_leave') ?>" class="nav-link">Leave History</a></li>
					<li class="nav-item"><a href="<?php echo base_url('request_leave') ?>" class="nav-link">Request Leave</a></li>


				</ul>
			</li>

			<li class="nav-item dropdown">
				<a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Finance</span></a>
				<ul class="dropdown-menu">
					<li class="nav-item"><a href="<?php echo base_url('pay_slip') ?>" class="nav-link">Pay Slip</a></li>
					<li class="nav-item"><a href="<?php echo base_url('my_loan') ?>" class="nav-link">Loan History</a></li>
					<li class="nav-item"><a href="<?php echo base_url('my_new_loan');?>" class="nav-link">Request Loan</a></li>


				</ul>
			</li>

			<li class="nav-item dropdown">
				<a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Performance</span></a>
				<ul class="dropdown-menu">
					<li class="nav-item"><a href="<?php echo base_url('appraisals') ?>" class="nav-link">View Appraisals</a></li>
					<li class="nav-item"><a href="<?php echo base_url('appraise_employee') ?>" class="nav-link">Appraise Employee</a></li>
					<li class="nav-item"><a href="<?php echo base_url('employee_resignation') ?>" class="nav-link">Resign</a></li>
				</ul>
			</li>

			<li class="nav-item dropdown">
				<a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Queries</span></a>
				<ul class="dropdown-menu">
					<li class="nav-item"><a href="<?php echo base_url('my_queries'); ?>" class="nav-link">View Queries</a></li>

				</ul>
			</li>


		</ul>
	</div>
</nav>
