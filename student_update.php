  
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
          <h4 class="card-title">Student Update</h4>
        </div>

        <?php
  
  $id = $_GET['id'];
  $sql = "SELECT * FROM student WHERE id='$id'";
  $run = mysqli_query($con,$sql);

  if(mysqli_num_rows($run) > 0)
  {
    foreach($run as $row)
    {

      ?>

        <div class="card-body">
          <form action="student_save.php" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="student_edit_id" value="<?php echo $row['id']; ?>" class="form-control">
              
            <div class="modal-body">
                  <div class="form-group">
                    <label for="">Student Name</label>
                    <input type="text" name="s_name" value="<?php echo $row['s_name']; ?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="">Student Address</label>
                    <input type="text" name="s_address" value="<?php echo $row['s_address']; ?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="">Student Email</label>
                    <input type="text" name="s_email" value="<?php echo $row['s_email']; ?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="">Gender</label>
                    <select name="gender" class="form-control" required>
                        <option value="" selected disabled>-- select --</option>
                        <option value="Male" <?php if($row['gender'] == "Male"){echo "selected";} ?>>Male</option>
                        <option value="Female" <?php if($row['gender'] == "Female"){echo "selected";} ?>>Female</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Date of Birth</label>
                    <input type="date" name="dob" value="<?php echo $row['dob']; ?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="">Student Image</label>
                    <input type="file" name="s_image" class="form-control">
                    <input type="hidden" name="s_image_old" value="<?php echo $row['s_image']; ?>" class="form-control">
                  </div>
                  <img src="<?php echo "uploads/". $row['s_image'] ?>" width="50">
                </div>
                <div class="modal-footer">
                  <button type="submit" name="student_update_btn" class="btn btn-primary">Update</button>
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

