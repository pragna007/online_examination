
<?php include('../db.php') ?>

 
<?php include('student_header.php') ?>

<?php 

$id=$_SESSION['student_id'];
$query = "SELECT * FROM asign_student WHERE student_id='$id'";
$run = mysqli_query($con,$query);
$row=mysqli_fetch_array($run);
$class_id=$row['class_id'];
 
$query = "SELECT *,(select exam_duraion from exam_subject where exam_id=e.id order by id asc limit 1) as first_exam_time,(select exam_duraion from exam_subject where exam_id=e.id order by id desc limit 1) as last_exam_time  FROM exam as e WHERE e.status='2' and e.class_id='$class_id'";
$run = mysqli_query($con,$query);
?>

   <div class="row">
     <div class="col-md-12">
       <h3 class="mt-3 mb-3">Exam Managment</h3>
        <table class="table">
              <thead>
               
                <tr>
                  <th scope="col">Exam Name</th>
                  <th scope="col">Exam Duraion</th>
                  <th scope="col">Result Date & Time</th>
                  <th scope="col">Status</th>
                  <th scope="col">Time Table</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach($run as $row)
                {
                      $last_time=strtotime(date('Y-m-d H:i:s',strtotime($row['last_exam_time'].'+'.$row['exam_dur'])));
                ?>
                <tr>
                  <td scope="col"><?php echo $row['exam_name'] ?></td>
                  <td scope="col"><?php echo $row['exam_dur'] ?></td>
                  <td scope="col"><?php echo $row['created_at'] ?></td>
                  <td scope="col">
                  <?php    if($row['status'] == 0){
                            echo '<span class="btn btn-warning btn-sm">pending</span>';
                          }else if($row['status'] == 2){
                                      if(time() >= strtotime($row['first_exam_time']) && time() <= $last_time)
        {
   echo "<span class='btn btn-warning btn-sm'>Started</span>";
        }
        elseif(time() > $last_time)
                  {
                        echo "<span class='btn btn-dark btn-sm'>Completed</span>";
                  }
                  else{
                         echo "<span class='btn btn-success btn-sm'>created</span>";
                  }
                }
                  else{
                          
                            echo "<span class='btn btn-success btn-sm'>created</span>";
                          }
                          ?>
                  </td>
                  <td scope="col"><a href="exam_shedule_detail.php?id=<?php echo $row['id'] ?>">View</a></td>
                  <td scope="col">
                    
                      <?php                           $exam_id=$row['id'];
$check=mysqli_query($con,"select * from result_publish where exam_id='$exam_id'"); 
if(mysqli_num_rows($check)>0){

?>
<a href="result.php?id=<?php echo $exam_id ?>" class="btn btn-primary">Result</a>
<?php } ?>

                  </td>
                </tr>
                <?php } ?>
              </tbody>
          </table>
     </div>
   </div>

</section>




