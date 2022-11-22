  
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
  <?php include('layouts/sidebar.php') ;
    $id = $_GET['id'];
  $sql = "SELECT * FROM exam_subject WHERE id='$id'";
  $run = mysqli_query($con,$sql);
  $row=mysqli_fetch_array($run);
  ?>
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
                  <li class="breadcrumb-item"><a href="exam_subject.php?id=<?php echo $row['exam_id'] ?>">Exam Update</a>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
          <div class="form-group breadcrumb-right">
            <a href="exam_subject.php" class="btn btn-primary ">All Exam Subject</a>
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
          <h4 class="card-title">Exam Subject Update</h4>
        </div>

        <?php
  


   

      ?>

        <div class="card-body">
        <form action="exam_subject_save.php" method="POST">
          <input type="hidden" name="exam_subject_edit_id" value="<?php echo $row["id"];?>">
        <div class="modal-body">
       
            <input type="hidden"  class="form-control" name="exam_id" value="<?php echo $row['exam_id'] ?>">
               

          <div class="form-group">
            <label for="">Subject</label>
            <select class="form-control" name="subject_id" required>
                <option value=""> --select-- </option>
                <?php
                    $query = "SELECT * FROM subjects";
                    $results=mysqli_query($con, $query);
                    //loop
                    foreach ($results as $class){
                ?>
                        <option value="<?php echo $class["id"];?>"
                        <?php if($row["subject_id"] == $class["id"]){echo "selected";}?>
                        ><?php echo $class["subject_name"];?></option>
                <?php
                    }
                ?>
            </select>
          </div>

          <div class="form-group">
            <label for="">Exam Date & Time</label>
           <?php $first_date= date("Y-m-d", strtotime($row['exam_duraion']));$sec_date= date("H:i", strtotime($row['exam_duraion']));    ?>
            <input type="datetime-local" name="exam_duraion" value="<?php echo   $first_date.'T'.$sec_date   ?>" required class="form-control">
          </div>

          <div class="form-group">
            <label for="">Total Question</label>
            <select name="tot_q" class="form-control" require>
              <option value="" selected disabled>-- select --</option>
              <option value="5"
              <?php if($row['tot_q'] == "5"){echo "selected";} ?>
              >5</option>
              <option value="10"
              <?php if($row['tot_q'] == "10"){echo "selected";} ?>
              >10</option>
              <option value="25"
              <?php if($row['tot_q'] == "25"){echo "selected";} ?>
              >25</option>
              <option value="50"
              <?php if($row['tot_q'] == "50"){echo "selected";} ?>
              >50</option>
              <option value="100"
              <?php if($row['tot_q'] == "100"){echo "selected";} ?>
              >100</option>
              <option value="200"
              <?php if($row['tot_q'] == "200"){echo "selected";} ?>
              >200</option>
              <option value="300"
              <?php if($row['tot_q'] == "300"){echo "selected";} ?>
              >300</option>
            </select>
          </div>

          <div class="form-group">
            <label for="">Marks for Correct Answer</label>
            <select name="correct_ans" class="form-control" require>
              <option value="" selected disabled>-- select --</option>
              <option value="1"
              <?php if($row['correct_ans'] == "1"){echo "selected";} ?>
              >+1</option>
              <option value="2"
              <?php if($row['correct_ans'] == "2"){echo "selected";} ?>
              >+2</option>
              <option value="3"
              <?php if($row['correct_ans'] == "3"){echo "selected";} ?>
              >+3</option>
              <option value="4"
              <?php if($row['correct_ans'] == "4"){echo "selected";} ?>
              >+4</option>
              <option value="5"
              <?php if($row['correct_ans'] == "5"){echo "selected";} ?>
              >+5</option>
            </select>
          </div>

          <div class="form-group">
            <label for="">Marks for Wrong Answer</label>
            <select name="wrong_ans" class="form-control" require>
              <option value="" selected disabled>-- select --</option>
              <option value="-1"
              <?php if($row['wrong_ans'] == "-1"){echo "selected";} ?>
              >-1</option>
              <option value="-1.25"
              <?php if($row['wrong_ans'] == "-1.25"){echo "selected";} ?>
              >-1.25</option>
              <option value="-1.50"
              <?php if($row['wrong_ans'] == "-1.50"){echo "selected";} ?>
              >-1.50</option>
              <option value="-2"
              <?php if($row['wrong_ans'] == "-2"){echo "selected";} ?>
              >-2</option>
            </select>
          </div>
          
        <div class="modal-footer">
          <button type="submit" name="exam_subject_update_btn" class="btn btn-primary">Update</button>
        </div>
      </form>
        </div>
       
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

