  
  <?php
    include('session.php');
    if(!isset($_SESSION['login_user'])){
    header("location: login.php"); // Redirecting To Home Page
    }
    ?>
  <?php 
  include('db.php'); 
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
        <div class="content-header-left col-md-9 col-12 mb-2">
          <div class="row breadcrumbs-top">
            <div class="col-12">
              <h2 class="content-header-title float-left mb-0">Exam Update</h2>
              <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="exam.php">Exam Update</a>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
          <div class="form-group breadcrumb-right">
            <a href="exam.php" class="btn btn-primary ">All Exam Detail</a>
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
          <h4 class="card-title">Exam Update</h4>
        </div>

        <?php
  
  $id = $_GET['id'];
  $sql = "SELECT * FROM exam WHERE id='$id'";
  $run = mysqli_query($con,$sql);

  if(mysqli_num_rows($run) > 0)
  {
    foreach($run as $row)
    {

      ?>

        <div class="card-body">
          <form action="exam_save.php" method="POST" class="form form-vertical">
          <input type="hidden" name="exam_edit_id" value="<?php echo $row['id']; ?>" class="form-control">
            <div class="row">
              <div class="col-12">
              <div class="form-group">
                  <label for="">Exam Name</label>
                  <input type="text" name="exam_name" value="<?php echo $row['exam_name'] ?>" required class="form-control">
              </div>
              <div class="form-group">
                  <label for="">Class</label>
                  <select class="form-control" name="class_id" required>
                      <option value="">-- select --</option>
                      <?php
                          $query = "SELECT * FROM class";
                          $results=mysqli_query($con, $query);
                          //loop
                          foreach ($results as $class){
                      ?>
                              <option value="<?php echo $class["id"];?>"
                              
                              <?php if($row["class_id"] == $class["id"]){
                                echo "selected";
                              } ?>
                              
                              ><?php echo $class["class_name"];?></option>
                      <?php
                          }
                      ?>
                  </select>
                </div>
                <div class="form-group">
                  <select name="exam_dur" class="form-control" require>
                    <option value="">-- select --</option>
                    <option value="5 Minute"
                    <?php if($row['exam_dur'] == "5 Minute"){echo "selected";} ?>
                    >5 Minute</option>
                    <option value="30 Minute"
                    <?php if($row['exam_dur'] == "30 Minute"){echo "selected";} ?>
                    >30 Minute</option>
                    <option value="1 Hour"
                    <?php if($row['exam_dur'] == "1 Hour"){echo "selected";} ?>
                    >1 Hour</option>
                    <option value="2 Hour"
                    <?php if($row['exam_dur'] == "2 Hour"){echo "selected";} ?>
                    >2 Hour</option>
                    <option value="3 Hour"
                    <?php if($row['exam_dur'] == "3 Hour"){echo "selected";} ?>
                    >3 Hour</option>
                  </select>
                </div>

                <div class="form-group">
                  <select name="status" class="form-control" require>
                    <option value="">-- select --</option>
                    <option value="0"
                    <?php if($row['status'] == "0"){echo "selected";} ?>
                    >Pending</option>
         
                    <option value="2"
                    <?php if($row['status'] == "2"){echo "selected";} ?>
                    >Created</option>
                  </select>
                </div>
              </div>

              <div class="col-12">
                <button type="submit" name="exam_update_btn" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Update</button>
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

