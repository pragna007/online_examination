
<?php include('../db.php') ?>


<?php include('student_header.php') ?>

<?php 

$query = "SELECT es.*,q.qustion_one,q.qustion_two,q.question_three,q.question_four FROM exam_subject es JOIN question q WHERE es.question_id = q.id";
$run = mysqli_query($con,$query);
?>

   <div class="row">
     <div class="col-md-12">
       <h3 class="mt-3 mb-3">Question</h3>
        <table class="table">
              <tbody>
                <?php
                foreach($run as $row)
                {
                ?>
                <tr>
                  <td><input type="radio" class="form-control"><?php echo $row['qustion_one'] ?></td>
                  <td><input type="radio" class="form-control"><?php echo $row['qustion_two'] ?></td>
                </tr>
                <tr>
                 <td><input type="radio" class="form-control"><?php echo $row['question_three'] ?></td>
                 <td><input type="radio" class="form-control"><?php echo $row['question_four'] ?></td>
                </tr>
                <?php } ?>
              </tbody>
          </table>
          <div class="text-center">
                <a href="student_question.php?id=<?php echo $row['id'] ?>" class="btn btn-warning">previous</a>
                <a href="student_question3.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Next</a>
          </div>
     </div>
   </div>

</section>




