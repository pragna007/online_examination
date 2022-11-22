    
    <?php
    include('session.php');
    if(!isset($_SESSION['login_user'])){
    header("location: login.php"); // Redirecting To Home Page
    }
    ?>
    
    <?php include('layouts/links.php') ?>
    <!-- BEGIN: Header-->
    <?php include('layouts/header.php') ?>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <?php include('layouts/sidebar.php') ?>
    <!-- END: Main Menu-->

            <!-- BEGIN: Content-->
            <div class="app-content content ">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper container-xxl p-0">
                <div class="content-header row">
                </div>
                <div class="content-body"><!-- Dashboard Ecommerce Starts -->
                        <section id="dashboard-ecommerce">
                        <div class="row match-height">
                            <!-- Medal Card -->
                            <div class="col-xl-12 col-md-12 col-12">
                            <div class="card card-congratulation-medal">
                                <div class="card-body">
                                <h5>Welcome to Dashboard</h5>
                                </div>
                            </div>
                            </div>
                            <!--/ Medal Card -->
                        </section>
                        <!-- Dashboard Ecommerce ends -->
                </div>
            </div>
            </div>
            <!-- END: Content-->
        </div>

    </div>
    <!-- End: Customizer-->

    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

   <?php include('layouts/footer.php') ?>

   <?php include('layouts/script.php') ?>


   