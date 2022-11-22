
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
              <h2 class="content-header-title float-left mb-0">User</h2>
              <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="class.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="class.php">User</a>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
          <div class="form-group breadcrumb-right">
            <button class="btn btn-primary " data-toggle="modal" data-target="#studentModal">Add New</button>
          </div>
        </div>
      </div>
      <div class="content-body">
        <!-- Basic table -->
        <section id="basic-datatable">
          <div class="row">
            <div class="col-md-12 col-12">
              <div class="card" style="overflow-x: auto;">

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
                     

                  <!-- fetch data -->

                  <?php 
                  $id=$_SESSION['user_id'];
                  $sql = "SELECT * FROM users where id!='$id'";

                  $run = mysqli_query($con,$sql);
            
                  ?>
                  <table class="datatables-basic table" >
                    <thead class="thead thead-dark">
                      <tr role="row">
                     
                        <th >Image</th>
                        <th >User Name</th>
                        <th >User Contact</th>
                        <th >User Email</th>
                        <th >Password</th>
                        <th >Created On</th>
                        <th >Status</th>
                        <th >Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
                      foreach($run as $row)
                        {
                      ?>
                      <tr class="odd">
                      <td>
                            <img src="<?php echo "uploads/user/".$row['image']; ?>" width="50" alt="">
                        </td>
                        <td><?php echo $row['u_name']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td>
                        <?php 
                          if($row['status'] == 1){
                            echo '<a href="user_status.php?id='.$row['id'].'&status=0" class="btn btn-success btn-sm">Enable</a>';
                          }else{
                            echo '<a href="user_status.php?id='.$row['id'].'&status=1" class="btn btn-danger btn-sm">Disable</a>';
                          }
                          ?>
                        </td>
                        <td>
                          <a href="user_update.php?id=<?php echo $row['id'];?>" class="btn btn-warning btn-sm">Edit</a>
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
<div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="user_save.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="">User Name</label>
            <input type="text" name="u_name" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">User Contact</label>
            <input type="text" name="contact" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">User Email</label>
            <input type="text" name="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">User Password</label>
            <input type="text" name="password" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">User Profile</label>
            <input type="file" name="image" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="user_save_btn" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

  <?php include('layouts/footer.php') ?>


  <?php include('layouts/script.php') ?>

