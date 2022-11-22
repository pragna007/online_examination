  
  <?php
    include('session.php');
    if(!isset($_SESSION['login_user'])){
    header("location: login.php"); // Redirecting To Home Page
    }
    ?>
  <?php include('db.php'); ?>
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
        <div class="content-header-left col-md-9 col-12 mb-2">
          <div class="row breadcrumbs-top">
            <div class="col-12">
              <h2 class="content-header-title float-left mb-0">Subject Update</h2>
              <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="class.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="class.php">Subject Update</a>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
          <div class="form-group breadcrumb-right">
            <a href="subject.php" class="btn btn-primary ">All Subjects</a>
          </div>
        </div>
      </div>


    

      <div class="content-body">
        <!-- Basic table -->
        <section id="basic-datatable">
          <div class="row">
            <div class="col-md-12 col-12">
            <div class="card">
        <div class="card-header">
          <h4 class="card-title">Subject Update</h4>
        </div>

        <?php
  
  $id = $_GET['id'];
  $sql = "SELECT * FROM subjects WHERE id='$id'";
  $run = mysqli_query($con,$sql);

  if(mysqli_num_rows($run) > 0)
  {
    while($row = mysqli_fetch_assoc($run))
    {
      //  $row['class_name'];

      ?>

        <div class="card-body">
          <form action="subject_save.php" method="POST" class="form form-vertical">
          <input type="hidden" name="subject_edit_id" value="<?php echo $row['id']; ?>" class="form-control">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="first-name-vertical">Subject Name</label>
                  <input type="text" id="first-name-vertical" value="<?php echo $row['subject_name']; ?>" class="form-control" name="subject_name">
                </div>
              </div>

              <div class="col-12">
                <button type="submit" name="subject_update_btn" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Update</button>
              </div>
            </div>
          </form>
        </div>
        <?php 
}
}
else{
  echo "Data Not Found";
}

?>

      </div>
            </div>
          </div>

        </section>
        <!--/ Basic table -->
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

