
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
                <a href="student_question2.php?id=<?php echo $row['id'] ?>" class="btn btn-warning">previous</a>
                <a href="student_question.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Next</a>
          </div>
     </div>
   </div>

</section>




<!-- script links -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>