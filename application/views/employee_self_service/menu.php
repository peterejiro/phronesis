<nav class="navbar navbar-secondary navbar-expand-lg">
	<div class="container">
		<ul class="navbar-nav">
			<li class="nav-item dropdown <?php echo $this->uri->segment(1) == 'employee_main' || $this->uri->segment(1) == 'personal_information' || $this->uri->segment(1) == 'employee_history' ? 'active' : '' ?>">
				<a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Home</span></a>
				<ul class="dropdown-menu">
					<li class="nav-item <?php echo $this->uri->segment(1) == 'employee_main' ? 'active':'' ?>"><a href="<?php echo base_url('employee_main'); ?>" class="nav-link">Dashboard</a></li>
					<li class="nav-item <?php echo $this->uri->segment(1) == 'personal_information' ? 'active':'' ?>"><a href="<?php echo base_url('personal_information'); ?>" class="nav-link">My Information</a></li>
					<li class="nav-item <?php echo $this->uri->segment(1) == 'employee_history' ? 'active':'' ?>"><a href="<?php echo base_url('employee_history') ?>" class="nav-link">My Activities</a></li>
				</ul>
			</li>
			<li class="nav-item dropdown <?php echo $this->uri->segment(1) == 'my_leave' || $this->uri->segment(1) == 'request_leave' ? 'active':'' ?>">
				<a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-plane-departure"></i><span>Leaves</span></a>
				<ul class="dropdown-menu">
					<li class="nav-item <?php echo $this->uri->segment(1) == 'my_leave' ? 'active':'' ?>"><a href="<?php echo base_url('my_leave') ?>" class="nav-link">My Leaves</a></li>
					<li class="nav-item <?php echo $this->uri->segment(1) == 'request_leave' ? 'active':'' ?>"><a href="<?php echo base_url('request_leave') ?>" class="nav-link">New Leave</a></li>
				</ul>
			</li>
			<li class="nav-item dropdown <?php echo $this->uri->segment(1) == 'pay_slip' || $this->uri->segment(1) == 'pay_slips' || $this->uri->segment(1) == 'my_loan' || $this->uri->segment(1) == 'my_new_loan' ? 'active':'' ?>">
				<a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-money-check"></i><span>Payroll</span></a>
				<ul class="dropdown-menu">
					<li class="nav-item <?php echo $this->uri->segment(1) == 'pay_slip' || $this->uri->segment(1) == 'pay_slips' ? 'active':'' ?>"><a href="<?php echo base_url('pay_slip') ?>" class="nav-link">Pay Slip</a></li>
					<li class="nav-item <?php echo $this->uri->segment(1) == 'my_loan' ? 'active':'' ?>"><a href="<?php echo base_url('my_loan') ?>" class="nav-link">My Loans</a></li>
					<li class="nav-item <?php echo $this->uri->segment(1) == 'my_new_loan' ? 'active':'' ?>"><a href="<?php echo base_url('my_new_loan');?>" class="nav-link">New Loan</a></li>
				</ul>
			</li>
			<li class="nav-item dropdown <?php echo $this->uri->segment(1) == 'appraisals' || $this->uri->segment(1) == 'appraise_employee' || $this->uri->segment(1) == 'employee_resignation' || $this->uri->segment(1) == 'appraisal_result' ? 'active':'' ?>">
				<a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-chart-line"></i><span>Performance</span></a>
				<ul class="dropdown-menu">
					<li class="nav-item <?php echo $this->uri->segment(1) == 'appraisals' ? 'active':'' ?>"><a href="<?php echo base_url('appraisals') ?>" class="nav-link">My Appraisals</a></li>
					<li class="nav-item <?php echo $this->uri->segment(1) == 'appraise_employee' || $this->uri->segment(1) == 'appraisal_result' ? 'active':'' ?>"><a href="<?php echo base_url('appraise_employee') ?>" class="nav-link">Appraise Employee</a></li>
					<li class="nav-item <?php echo $this->uri->segment(1) == 'employee_resignation' ? 'active':'' ?>"><a href="<?php echo base_url('employee_resignation') ?>" class="nav-link">Resign</a></li>
					<li class="nav-item <?php echo $this->uri->segment(1) == 'my_trainings' ? 'active':'' ?>"><a href="<?php echo base_url('my_trainings') ?>" class="nav-link"> Trainings </a></li>

				</ul>
			</li>
			<li class="nav-item dropdown <?php echo $this->uri->segment(1) == 'my_queries' || $this->uri->segment(1) == 'view_my_query' || $this->uri->segment(1) == 'my_memos' || $this->uri->segment(1) == 'my_specific_memos' ? 'active':'' ?>">
				<a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-comments"></i><span>Communications</span></a>
				<ul class="dropdown-menu">
					<li class="nav-item <?php echo $this->uri->segment(1) == 'my_queries' || $this->uri->segment(1) == 'view_my_query' ? 'active':'' ?>"><a href="<?php echo base_url('my_queries'); ?>" class="nav-link">Queries</a></li>
					<li class="nav-item <?php echo $this->uri->segment(1) == 'my_memos' ? 'active':'' ?>"><a href="<?php echo base_url('my_memos'); ?>" class="nav-link">Announcements</a></li>
					<li class="nav-item <?php echo $this->uri->segment(1) == 'my_specific_memos' ? 'active':'' ?>"><a href="<?php echo base_url('my_specific_memos'); ?>" class="nav-link">Memos</a></li>
					<li class="nav-item <?php echo $this->uri->segment(1) == 'my_chat' ? 'active':'' ?>"><a href="<?php echo base_url('my_chat'); ?>" class="nav-link">Chat</a></li>

				</ul>
			</li>
		</ul>
	</div>
</nav>
