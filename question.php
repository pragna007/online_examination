  
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
              <h2 class="content-header-title float-left mb-0">Question</h2>
              <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href=" ">Question</a>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
          <div class="form-group breadcrumb-right">
            <button class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">Add New</button>
          </div>
        </div>
      </div>
      <div class="content-body">
        <!-- Basic table -->
        <section id="basic-datatable">
          <div class="row">
            <div class="col-md-12 col-12">
              <div class="card">
                <div i   >
                   

                  <!-- fetch data -->

                  <?php 
                    $id=$_GET['id'];
                  $sql = "SELECT q.*,e.exam_name,s.subject_name FROM question q join exam_subject as es on es.id=q.exam_subject_id join exam as e on e.id=es.exam_id join subjects as s on s.id=es.subject_id     where q.exam_subject_id='$id'";

                  $run = mysqli_query($con,$sql);
                  
                

                  ?>
                  <table class="datatables-basic table " >
                    <thead class="thead thead-dark">
                      <tr role="row">
               
                        <th  >Exam Name</th>
                        <th  >Subject</th>
                        <th  >Question</th>
                        <th  >Option 1</th>
                        <th  >Option 2</th>
                        <th  >Option 3</th>
                        <th  >Option 4</th>
                        <th  >Answer</th>
                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 117px;" aria-label="Actions">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
                      foreach($run as $row)
                        {
                      ?>
                      <tr class="odd">
                        <td><?php echo $row['exam_name']; ?></td>
                        <td><?php echo $row['subject_name']; ?></td>
                        <td><?php echo $row['q_title']; ?></td>
                        <td><?php echo $row['option_1']; ?></td>
                        <td><?php echo $row['option_2']; ?></td>
                        <td><?php echo $row['option_3']; ?></td>
                        <td><?php echo $row['option_4']; ?></td>
                        <td><?php echo $row['ans']; ?></td>
                        <td>
                          <a href="question_update.php?id=<?php echo $row['id'];?>" class="btn btn-warning btn-sm">Edit</a>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Questions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="question_save.php" method="POST">
        <div class="modal-body">
       <input type="hidden" name="exam_subject_id" value="<?php echo $_GET['id'] ?>">
          <div class="form-group">
            <label for="">Question Title</label>
            <input type="text" name="q_title" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Option 1</label>
            <input type="text" name="option_1" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Option 2</label>
            <input type="text" name="option_2" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Option 3</label>
            <input type="text" name="option_3" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Option 4</label>
            <input type="text" name="option_4" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Answer</label>
            <select name="ans" class="form-control" require>
              <option value="" selected disabled>select</option>
              <option value="1">1 Option</option>
              <option value="2">2 Option</option>
              <option value="3">3 Option</option>
              <option value="4">4 Option</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="question_btn" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

  <?php include('layouts/footer.php') ?>


  <?php include('layouts/script.php') ?>

