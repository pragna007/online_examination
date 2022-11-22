  
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
              <h2 class="content-header-title float-left mb-0">Student Update</h2>
              <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="class.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="class.php">Student Update</a>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
          <div class="form-group breadcrumb-right">
            <a href="class.php" class="btn btn-primary ">All Student</a>
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
          <h4 class="card-title">User Update</h4>
        </div>

        <?php
  
  $id = $_GET['id'];
  $sql = "SELECT * FROM users WHERE id='$id'";
  $run = mysqli_query($con,$sql);

  if(mysqli_num_rows($run) > 0)
  {
    while($row = mysqli_fetch_assoc($run))
    {

      ?>

        <div class="card-body">
          <form action="user_save.php" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="user_edit_id" value="<?php echo $row['id']; ?>" class="form-control">
              
            <div class="modal-body">
                  <div class="form-group">
                    <label for="">User Name</label>
                    <input type="text" name="u_name" value="<?php echo $row['u_name'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">User Contact</label>
                    <input type="text" name="contact" value="<?php echo $row['contact'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">User Email</label>
                    <input type="text" name="email" value="<?php echo $row['email'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">User Password</label>
                    <input type="text" name="password" value="<?php echo $row['password'] ?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="">User Image</label>
                    <input type="file" name="image" class="form-control">
                    <input type="hidden" name="image_old" value="<?php echo $row['image']; ?>" class="form-control">
                  </div>
                  <img src="<?php echo "uploads/user/". $row['image'] ?>" width="50">
                </div>
                <div class="modal-footer">
                  <button type="submit" name="user_update_btn" class="btn btn-primary">Update</button>
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

