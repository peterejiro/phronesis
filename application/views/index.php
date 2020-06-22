<!DOCTYPE html>
<html lang="en">
    <head>

        <?php include('stylesheet.php'); ?>

    </head>


    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->

			<?php include('sidebar.php'); ?>

            <!-- Left Sidebar End -->

            <!-- Start right Content here -->

            <div class="content-page" id="raps">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                   <?php include('topbar.php'); ?>
                    <!-- Top Bar End -->

                    <div class="page-content-wrapper">

                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="page-title-box">
                                        <div class="float-right">

                                        </div>
                                        <h4 class="page-title">Welcome <?php echo $user_data->user_name; ?> </h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title end breadcrumb -->

                            <div class="row">
                                <div class="col-md-12 col-xl-3">
                                    <div class="card mini-stat">
                                        <div class="mini-stat-icon text-right">
                                            <i class="mdi mdi-cube-outline"></i>
                                        </div>
                                        <div class="p-4">
                                            <h6 class="text-uppercase mb-3">Number of Employees</h6>

                                            <h4 class="mb-0"><?php echo count($employees); ?><small class="ml-2"> </small></h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-xl-3">
                                    <div class="card mini-stat">
                                        <div class="mini-stat-icon text-right">
                                            <i class="mdi mdi-buffer"></i>
                                        </div>
                                        <div class="p-4">
                                            <h6 class="text-uppercase mb-3">Number of Departments</h6>

                                            <h4 class="mb-0"><?php echo count($departments); ?><small class="ml-2"></small></h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-xl-3">
                                    <div class="card mini-stat">
                                        <div class="mini-stat-icon text-right">
                                            <i class="mdi mdi-tag-text-outline"></i>
                                        </div>
                                        <div class="p-4">
                                            <h6 class="text-uppercase mb-3">Number of Users</h6>

                                            <h4 class="mb-0"><?php echo count($users); ?><small class="ml-2"></small></h4>
                                        </div>
                                    </div>
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

               <?php include('footer.php'); ?>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


      <?php include('js.php'); ?>

    </body>
</html>
