
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
              <h2 class="content-header-title float-left mb-0">Exam Subject</h2>
              <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="exam.php">Exam Subject</a>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
          <div class="form-group breadcrumb-right">
            <button class="btn btn-primary " data-toggle="modal" data-target="#asignSubject">Add New</button>
          </div>
        </div>
      </div>
      <div class="content-body">
        <!-- Basic table -->
        <section id="basic-datatable">
          <div class="row">
            <div class="col-md-12 col-12">
              <div class="card" style="overflow-x:auto;">
               
                      <?php 
              if(isset($_SESSION['status']) && $_SESSION != '')
              {
                  ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['status']; ?>
                        <button type="botton" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                  <?php 
                  unset($_SESSION['status']);
              }
              ?> 
                  <?php 
                  $id=$_GET['id'];
                  $sql = "SELECT em.*,e.exam_name,s.subject_name FROM exam_subject em JOIN exam e JOIN subjects s WHERE e.id = em.exam_id AND s.id = em.subject_id and em.exam_id='$id' order by id asc";

                  $run = mysqli_query($con,$sql);

                  ?>
                  <table class="datatables- table  ">
                    <thead class="thead thead-dark">
                      <tr role="row">
                        <th >#</th> 
                        <th >Exam Name</th>
                        <th >Class Name</th>
                        <th >Exam Date&Time</th>
                        <th >Total Question</th>
                        <th >Right Answer</th>
                        <th >Wrong Answer</th>
                        <th >Status</th>
                        <th >Question</th>
                        <th >Created On</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
                      foreach($run as $key=>$row)
                        {
                      ?>
                      <tr class="odd">
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $row['exam_name']; ?></td>
                        <td><?php echo $row['subject_name']; ?></td>
                        <td><?php echo $row['exam_duraion']; ?></td>
                        <td><?php echo $row['tot_q']; ?> Question</td>
                        <td><?php echo $row['correct_ans']; ?> Mark</td>
                        <td><?php echo $row['wrong_ans']; ?> Mark</td>
                        <td>
                        <?php 
                          if($row['status'] == 1){
                            echo '<a href="exam-subject_status.php?id='.$row['id'].'&status=0" class="btn btn-success btn-sm">Enable</a>';
                          }else{
                            echo '<a href="exam-subject_status.php?id='.$row['id'].'&status=1" class="btn btn-danger btn-sm">Disable</a>';
                          }
                          ?>
                        </td>
                        <td>    <a href="question.php?id=<?php echo $row['id']; ?>" class=" ">Add Question</a></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td>
                          <a href="exam_subject_update.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                          <a href="exam_subject_delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure delete this data..?')" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                      </tr>
                      <?php
                     } 
                     ?>
                    </tbody>
                  </table>


                </div>
              </div>
            </div>
          </div>

        </section>
        <!--/ Basic table -->



        <!--/ Row grouping -->



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


  <!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="asignSubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Add Exam Subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="exam_subject_save.php" method="POST">
        <div class="modal-body">
          
 
            <input type="hidden" class="form-control" name="exam_id" value="<?php  echo $id ?>">
               
        

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
                        <option value="<?php echo $class["id"];?>"><?php echo $class["subject_name"];?></option>
                <?php
                    }
                ?>
            </select>
          </div>

          <div class="form-group">
            <label for="">Exam Date & Time</label>
            <input type="datetime-local" name="exam_duraion" required class="form-control">
          </div>

          <div class="form-group">
            <label for="">Total Question</label>
            <select name="tot_q" class="form-control" require>
              <option value="">-- select --</option>
              <option value="5">5 Question</option>
              <option value="10">10 Question</option>
              <option value="25">25 Question</option>
              <option value="50">50 Question</option>
              <option value="100">100 Question</option>
              <option value="200">200 Question</option>
              <option value="300">300 Question</option>
            </select>
          </div>

          <div class="form-group">
            <label for="">Marks for Correct Answer</label>
            <select name="correct_ans" class="form-control" require>
              <option value="" selected disabled>-- select --</option>
              <option value="1">+1 Mark</option>
              <option value="2">+2 Mark</option>
              <option value="3">+3 Mark</option>
              <option value="4">+4 Mark</option>
              <option value="5">+5 Mark</option>
            </select>
          </div>

          <div class="form-group">
            <label for="">Marks for Wrong Answer</label>
            <select name="wrong_ans" class="form-control" require>
              <option value="" selected disabled>-- select --</option>
              <option value="-1">-1 Mark</option>
              <option value="-1.25">-1.25 Mark</option>
              <option value="-1.50">-1.50 Mark</option>
              <option value="-2">-2 Mark</option>
            </select>
          </div>
          
        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="exam_subject_save_btn" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

  <?php include('layouts/footer.php') ?>


  <?php include('layouts/script.php') ?>

