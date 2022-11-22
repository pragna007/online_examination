  
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
  <?php include('layouts/sidebar.php');

    $id = $_GET['id'];
  $sql = "SELECT * FROM question WHERE id='$id'";
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
              <h2 class="content-header-title float-left mb-0">Question Update</h2>
              <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="question.php?id=<?php echo $row['exam_subject_id']; ?>">Question Update</a>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
          <div class="form-group breadcrumb-right">
            <a href="question.php?id=<?php echo $row['exam_subject_id']; ?>" class="btn btn-primary ">All Question</a>
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
          <h4 class="card-title">Question Update</h4>
        </div>

        <?php
  

 
      ?>

        <div class="card-body">
          <form action="question_save.php" method="POST">
          <input type="hidden" name="question_edit_id" value="<?php echo $row['id']; ?>" class="form-control">
             <input type="hidden" name="exam_subject_id" value="<?php echo $row['exam_subject_id']; ?>" class="form-control">
        <div class="modal-body">
 


          <div class="form-group">
            <label for="">Question Title</label>
            <input type="text" name="q_title" value="<?php echo $row['q_title'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Option 1</label>
            <input type="text" name="option_1" value="<?php echo $row['option_1'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Option 2</label>
            <input type="text" name="option_2" value="<?php echo $row['option_2'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Option 3</label>
            <input type="text" name="option_3" value="<?php echo $row['option_3'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Option 4</label>
            <input type="text" name="option_4" value="<?php echo $row['option_4'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Answer</label>
            <select name="ans" class="form-control" required>
              <option value="" selected disabled>select</option>
              <option value="1"
              <?php if($row['ans'] == "1"){echo "selected";} ?>
              >1 Option</option>
              <option value="2"
              <?php if($row['ans'] == "2"){echo "selected";} ?>
              >2 Option</option>
              <option value="3"
              <?php if($row['ans'] == "3"){echo "selected";} ?>
              >3 Option</option>
              <option value="4"
              <?php if($row['ans'] == "4"){echo "selected";} ?>
              >4 Option</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="question_update_btn" class="btn btn-primary">Update</button>
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

