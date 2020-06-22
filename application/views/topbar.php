<div class="topbar" >
	<nav class="navbar-custom">
		<ul class="list-inline float-right mb-0">



			<li class="list-inline-item dropdown notification-list">

				<a class="nav-link dropdown-toggle arrow-none waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
				   aria-haspopup="false" aria-expanded="false">
					<img src="assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
				</a>
				<div class="dropdown-menu dropdown-menu-right profile-dropdown ">
					<!-- item-->
					<div class="dropdown-item noti-title">
						<h5>Welcome </h5>
					</div>
					<a class="dropdown-item" href="#"><i class="mdi mdi-account-circle "></i> Profile</a>

					<div class="dropdown-divider"></div>
					<a class="dropdown-item text-danger" href="<?php echo site_url('logout'); ?>"><i class="mdi mdi-power text-danger"></i> Logout</a>
				</div>
			</li>
		</ul>

		<ul class="list-inline menu-left mb-0" id="top-bar">
			<li class="float-left">
				<button class="button-menu-mobile open-left waves-light waves-effect">
					<i class="mdi mdi-menu"></i>
				</button>
			</li>

			<li class="float-left">


				<button type="button" id="opennav" class="btn btn-secondary btn-lg" style="background-color: #2b3a4a" onclick="openNav()">
					<i class="fas fa-bars fa-1x"></i>
				</button>

				<button type="button" id="closenav" class="btn btn-secondary btn-lg" style="background-color: #2b3a4a" onclick="closeNav()">
					<i class="fas fa-bars fa-1x"></i>
				</button>

			</li>
			<li class="hide-phone app-search">

				<form role="search" class="">
					<input type="text" placeholder="Search..." class="form-control">
					<a href=""><i class="fa fa-search"></i></a>
				</form>
			</li>
		</ul>
		<div class="clearfix"></div>
	</nav>
</div>
