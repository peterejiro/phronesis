<!DOCTYPE html>
<html lang="en">
    <head>

		<?php include(APPPATH.'\views\stylesheet.php'); ?>

    </head>


    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->

			<?php include(APPPATH.'\views\sidebar.php'); ?>

            <!-- Left Sidebar End -->

            <!-- Start right Content here -->

            <div class="content-page" id="raps">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
					<?php include(APPPATH.'\views\topbar.php'); ?>
                    <!-- Top Bar End -->

                    <div class="page-content-wrapper">

                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="page-title-box">
                                        <div class="float-right">

                                        </div>
                                        <h4 class="page-title">Payroll Reports </h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title end breadcrumb -->

                            <div class="row">

                                <div class="col-md-12 col-xl-3">
									<a href="<?php echo site_url('emolument'); ?>">
                                    <div class="card mini-stat">
                                        <div class="mini-stat-icon text-right">
                                            <i class="mdi mdi-book-open"></i>
                                        </div>
                                        <div class="p-4">
                                            <h6 class="text-uppercase mb-3">Emolument Report</h6>

                                            <h4 class="mb-0"><?php //echo count($employees); ?><small class="ml-2"> </small></h4>
                                        </div>
                                    </div>
									</a>
                                </div>

								<div class="col-md-12 col-xl-3">
									<a href="<?php echo site_url('deduction'); ?>">
										<div class="card mini-stat">
											<div class="mini-stat-icon text-right">
												<i class="mdi mdi-book-open"></i>
											</div>
											<div class="p-4">
												<h6 class="text-uppercase mb-3">Deduction Report</h6>

												<h4 class="mb-0"><?php //echo count($employees); ?><small class="ml-2"> </small></h4>
											</div>
										</div>
									</a>
								</div>

								<div class="col-md-12 col-xl-3">
									<a href="<?php echo site_url('pay_order'); ?>">
										<div class="card mini-stat">
											<div class="mini-stat-icon text-right">
												<i class="mdi mdi-book-open"></i>
											</div>
											<div class="p-4">
												<h6 class="text-uppercase mb-3">Pay Order</h6>

												<h4 class="mb-0"><?php //echo count($employees); ?><small class="ml-2"> </small></h4>
											</div>
										</div>
									</a>
								</div>
                                <div class="col-md-12 col-xl-3">
                                    <div class="card mini-stat">
                                        <div class="mini-stat-icon text-right">
                                            <i class="mdi mdi-briefcase-check"></i>
                                        </div>
                                        <div class="p-4">
                                            <h6 class="text-uppercase mb-3">Settings</h6>

                                            <h4 class="mb-0">652<small class="ml-2"><i class="mdi mdi-arrow-down text-danger"></i></small></h4>
                                        </div>
                                    </div>

                                </div>                                            
                            </div><!-- end row -->


                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

               <<?php include(APPPATH.'\views\footer.php'); ?>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


      <?php include(APPPATH.'\views\js.php'); ?>

    </body>
</html>
