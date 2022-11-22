
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
              <h2 class="content-header-title float-left mb-0">Asign Student</h2>
              <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="class.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="class.php">Asign Student</a>
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
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                 
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
                  
                  $sql = "SELECT a.*,c.class_name,s.s_name FROM asign_student a JOIN class c JOIN student s WHERE a.class_id = c.id AND a.student_id = s.id";

                  $run = mysqli_query($con,$sql);

                  ?>
                  <table class="datatables-basic table ">
                    <thead class="thead thead-dark">
                      <tr role="row">
                      
                        <th >Roll No</th>
                        <th >Class Name</th>
                        <th >Student Name</th>
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
                        <td><?php echo $row['roll_no']; ?></td>
                        <td><?php echo $row['class_name']; ?></td>
                        <td><?php echo $row['s_name']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td>
                          <a href="asign_student_update.php?id=<?php echo $row['id'];?>" class="btn btn-warning btn-sm">Edit</a>
                          <a href="asign_student_delete.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure delete this data..?')" class="btn btn-danger btn-sm">Delete</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Asign Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="asign_student_save.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="">Roll No</label>
            <input type="text" name="roll_no" required class="form-control">
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
                        <option value="<?php echo $class["id"];?>"><?php echo $class["class_name"];?></option>
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
                        <option value="<?php echo $student["id"];?>"><?php echo $student["s_name"];?></option>
                <?php
                    }
                ?>
            </select>
          </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="asign_student_btn" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

  <?php include('layouts/footer.php') ?>


  <?php include('layouts/script.php') ?>

