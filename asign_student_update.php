  
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
              <h2 class="content-header-title float-left mb-0">Asign Student Update</h2>
              <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="class.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="class.php">Asign Student Update</a>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
          <div class="form-group breadcrumb-right">
            <a href="asign_student.php" class="btn btn-primary ">All Student</a>
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
          <h4 class="card-title">Asign Student Update</h4>
        </div>

        <?php
  
  $id = $_GET['id'];
  $sql = "SELECT * FROM asign_student WHERE id='$id'";
  $run = mysqli_query($con,$sql);

  if(mysqli_num_rows($run) > 0)
  {
    foreach($run as $row)
    {

      ?>

        <div class="card-body">
          <form action="asign_student_save.php" method="POST" class="form form-vertical">
          <input type="hidden" name="asign_student_edit_id" value="<?php echo $row['id']; ?>" class="form-control">
            <div class="row">
              <div class="col-12">
              <div class="form-group">
                  <label for="">Roll No</label>
                  <input type="text" name="roll_no" value="<?php echo $row['roll_no'] ?>" required class="form-control">
              </div>
              <div class="form-group">
                  <label for="">Asign Class</label>
                  <select class="form-control" name="class_id" required>
                      <option value="">Select</option>
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
                    <label for="">Asign Student</label>
                    <select class="form-control" name="student_id" required>
                        <option value="">Select</option>
                        <?php
                            $query = "SELECT * FROM student";
                            $results=mysqli_query($con, $query);
                            //loop
                            foreach ($results as $student){
                        ?>
                                <option value="<?php echo $student["id"];?>"
                                
                                <?php if($row["student_id"] == $student["id"]){
                                echo "selected";
                                }
                                ?>

                                ><?php echo $student["s_name"];?></option>
                        <?php
                            }
                        ?>
                    </select>
                  </div>
              </div>

              <div class="col-12">
                <button type="submit" name="asign_student_update_btn" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Update</button>
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

