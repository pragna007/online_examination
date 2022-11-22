  
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
              <h2 class="content-header-title float-left mb-0">Asign Subject</h2>
              <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="class.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="class.php">Asign Subject</a>
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
              <div class="card">
                <div>
                   

                  <!-- fetch data -->

                  <?php 
                  
                  $sql = "SELECT a.*,c.class_name,s.subject_name FROM asign_subject a JOIN class c JOIN subjects s WHERE a.class_id = c.id AND a.subject_id = s.id";

                  $run = mysqli_query($con,$sql);
                  
                  

                  ?>
                  <table class="datatables-basic table ">
                    <thead class="thead thead-dark">
                      <tr role="row">
                      
                        <th >#</th>
                        <th >Class Name</th>
                        <th >Subject Name</th>
                        <th >Created On</th>
                        <th >Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
                      while($row = mysqli_fetch_assoc($run))
                        {
                      ?>
                      <tr class="odd">
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['class_name']; ?></td>
                        <td><?php echo $row['subject_name']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td>
                          <a href="asign_subject_update.php?id=<?php echo $row['id'];?>" class="btn btn-warning btn-sm">Edit</a>
                          <a href="asign_subject_delete.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure delete this data..?')" class="btn btn-danger btn-sm">Delete</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="asign_subject_save.php" method="POST">
        <div class="modal-body">
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
                        <option value="<?php echo $class["id"];?>"><?php echo $class["class_name"];?></option>
                <?php
                    }
                ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Asign Subject</label>
            <select class="form-control" name="subject_id" required>
                <option value="">Select</option>
                <?php
                    $query = "SELECT * FROM subjects";
                    $results=mysqli_query($con, $query);
                    //loop
                    foreach ($results as $subject){
                ?>
                        <option value="<?php echo $subject["id"];?>"><?php echo $subject["subject_name"];?></option>
                <?php
                    }
                ?>
            </select>
          </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="asign_subject_btn" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

  <?php include('layouts/footer.php') ?>


  <?php include('layouts/script.php') ?>

