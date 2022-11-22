
<?php include('../db.php') ?>


<?php include('student_header.php') ?>

<?php 
$id=$_GET['id'];
$query = "SELECT es.*,s.subject_name,e.exam_dur FROM exam_subject es JOIN exam e  on e.id=es.exam_id JOIN subjects s on s.id=es.subject_id WHERE   e.id='$id'";
$run = mysqli_query($con,$query);
?>

   <div class="row">
     <div class="col-md-12">
       <h3 class="mt-3 mb-3">Exam Shedule Detail</h3>
        <table class="table">
              <thead>
               
                <tr>
                  <th scope="col">Subject Name</th>
                  <th scope="col">Exam Date & Time</th>
                  <th scope="col">Exam Duraion</th>
                  <th scope="col">Total Q.</th>
                  <th scope="col">Correct Ans</th>
                  <th scope="col">Wrong Ans</th>
                  <th scope="col">Status</th>
                  <th scope="col">Result</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach($run as $row)
                {
                ?>
                <tr>
                  <td scope="col"><?php echo $row['subject_name'] ?></td>
                  <td scope="col"><?php echo $row['exam_duraion'] ?></td>
                  <td scope="col"><?php echo $row['exam_dur'] ?></td>
                  <td scope="col"><?php echo $row['tot_q'] ?></td>
                  <td scope="col"><p style="color: green; font-weight: bold;"><?php echo $row['correct_ans'] ?></p></td>
                  <td scope="col"><p style="color: red; font-weight: bold;"><?php echo $row['wrong_ans'] ?></p></td>
                  <td scope="col">
                  <?php 

                          if($row['status'] == 0){
                              $exam_start_time=$row['exam_duraion'];
                              $exam_end_time=date('Y-m-d  H:i:s',strtotime($exam_start_time.'+'.$row['exam_dur']));
                              
                                if(time()>=strtotime($exam_start_time) && time()<=strtotime($exam_end_time)){
                                 
                            echo '<a href="exam_start.php?id='.$row['id'].'" class="btn btn-primary btn-sm">Start</a>';
                                
                                }
                                else if(time()>=strtotime($exam_end_time)){
                              

                                      echo '<a href="" class="btn btn-success btn-sm">Completed</a>';      
                                }               
                                else{
                              echo '<a href="" class="btn btn-warning btn-sm">Pending</a>';
      
                                }          
                          }else{
                            echo '<a href="" class="btn btn-warning btn-sm">Pending</a>';
                          }
                          ?>
                  </td>
                  <td>
                           <?php                           $exam_id=$row['exam_id'];
$check=mysqli_query($con,"select * from result_publish where exam_id='$exam_id'"); 
if(mysqli_num_rows($check)>0){

?>
<a href="answers.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Result</a>
<?php } ?>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
          </table>
     </div>
   </div>

</section>