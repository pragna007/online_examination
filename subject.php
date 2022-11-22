  
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
              <h2 class="content-header-title float-left mb-0">Subject</h2>
              <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="class.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="class.php">Subject</a>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
          <div class="form-group breadcrumb-right">
            <button class="btn btn-primary " data-toggle="modal" data-target="#subjectModal">Add New</button>
          </div>
        </div>
      </div>
      <div class="content-body">
        <!-- Basic table -->
        <section id="basic-datatable">
          <div class="row">
            <div class="col-md-12 col-12">
              <div class="card ">
                
                   
                  <!-- fetch data -->

                  <?php 
                  
                  $sql = "SELECT * FROM subjects";

                  $run = mysqli_query($con,$sql);
               

                  ?>
                  <table class="table datatables-basic " id="DataTables_Table_0" >
                    <thead class="thead thead-dark">
                      <tr role="row">
                        
                        <th >#</th>
                        <th >Name</th>
                        <th >Created At</th>
                        <th >Status</th>
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
                        <td><?php echo $row['subject_name']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td>
                        <?php 
                          if($row['status'] == 1){
                            echo '<a href="subject_status.php?id='.$row['id'].'&status=0" class="btn btn-success btn-sm">Enable</a>';
                          }else{
                            echo '<a href="subject_status.php?id='.$row['id'].'&status=1" class="btn btn-danger btn-sm">Disable</a>';
                          }
                          ?>
                        </td>
                        <td>
                          <a href="subject_update.php?id=<?php echo $row['id'];?>" class="btn btn-warning btn-sm">Edit</a>
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
<div class="modal fade" id="subjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="subject_save.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="">Add Subject</label>
            <input type="text" name="name" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="subject_save_btn" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

  <?php include('layouts/footer.php') ?>


  <?php include('layouts/script.php') ?>

