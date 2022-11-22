
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
              <h2 class="content-header-title float-left mb-0">Exam</h2>
              <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="class.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="class.php">Exam</a>
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
                <div >
                 
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
                  
                  $sql = "SELECT e.*,c.class_name,(select exam_duraion from exam_subject where exam_id=e.id order by id asc limit 1) as first_exam_time,(select exam_duraion from exam_subject where exam_id=e.id order by id desc limit 1) as last_exam_time FROM exam e JOIN class c WHERE c.id = e.class_id";

                  $run = mysqli_query($con,$sql);

                  ?>
                  <table class="datatables-basic table">
                    <thead class="thead thead-dark">
                      <tr role="row">
                        
                        <th >Exam Name</th>
                        <th >Class Name</th>
                        <th >Exam Duration</th>
                        <th >Subject</th>
                        <th >Status</th>
                        <th >Created On</th>
                        <th >Actions</th>
                      </tr>
                    </thead>
                    <tbody id="showdata">
                      <?php
                      
                      foreach($run as $row)
                        {
                          $last_time=strtotime(date('Y-m-d H:i:s',strtotime($row['last_exam_time'].'+'.$row['exam_dur'])));
                      ?>
                      <tr class="odd">
                        <td><?php echo $row['exam_name']; ?></td>
                        <td><?php echo $row['class_name']; ?></td>
                        <td><?php echo $row['exam_dur']; ?></td>
                         <td><a href="exam_subject.php?id=<?php echo $row['id'] ?>">Assign Subject</a></td>
                        <td>
                        <?php 
                          if($row['status'] == 0){
                            echo '<span class="btn btn-warning btn-sm">pending</span>';
                          }else if($row['status'] == 2){
                                      if(time() >= strtotime($row['first_exam_time']) && time() <= $last_time)
        {
   echo "<span class='btn btn-success btn-sm'>Started</span>";
        }
        elseif(time() > $last_time)
                  {
                        echo "<span class='btn btn-dark btn-sm'>Completed</span>";
                  }
                  else{

                              echo "<span class='btn btn-success btn-sm'>created</span>";
                              
                       }   } 


                          ?>
                        </td>
                        <td><?php echo $row['created_at']; ?></td>

                        <td>
                        <?php 
    


                              if($row['status'] == 0){
                            echo "
                                      <a href='exam_update.php?id=".$row['id']."' class='btn btn-success btn-sm'>Edit</a>
                                      <a href='exam_delete.php?id=".$row['id']."' class='btn btn-danger btn-sm'>Delete</a>
                                  ";
                          }
                          if(time() > $last_time && $row['status']!=0){
                            $exam_id=$row['id'];
$check=mysqli_query($con,"select * from result_publish where exam_id='$exam_id'");
if(mysqli_num_rows($check)==0){
?>

  <a   data="<?php echo $row['id']?>" class='btn btn-success btnPublish btn-sm'>Publish Result</a>

  <?php
}
                              echo "
                                    
                                      <a href='view-result.php?id=".$row['id']."' class='btn btn-dark btn-sm'>View Result</a>
                                  ";
                          }
                          ?>
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
<div class="modal fade" id="PublishModal" tabindex="-1" role="dialog" aria-labelledby="PublishModal1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="PublishModal1"> Publish Result On</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="publish_result.php" method="POST">
        <div class="modal-body">
          <input type="hidden" name="exam_id" id="exam_id" value="">
          <div class="form-group">
            <label for="">Date</label>
            <input type="datetime-local" name="date" required class="form-control">
          </div>
         
        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
  </div>
  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>

<!-- Modal -->

  <!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="asignSubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Add Exam Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="exam_save.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="">Exam Name</label>
            <input type="text" name="exam_name" required class="form-control">
          </div>
          <div class="form-group">
            <label for="">Class</label>
            <select class="form-control" name="class_id" required>
                <option value=""> --select-- </option>
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
            <select name="exam_dur" class="form-control" require>
              <option value="">-- select --</option>
              <option value="5 Minute">5 Minute</option>
              <option value="30 Minute">30 Minute</option>
              <option value="1">1 Hour</option>
              <option value="2 Hour">2 Hour</option>
              <option value="3 Hour">3 Hour</option>
            </select>
          </div>
          
        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="exam_save_btn" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>



  <?php include('layouts/footer.php') ?>


  <?php include('layouts/script.php') ?>
<script type="text/javascript">
  $(function(){
    $('#showdata').on('click','.btnPublish',function(){
      $('#PublishModal').modal('show')
      $('#exam_id').val($(this).attr('data'))
    })
  })
</script>
