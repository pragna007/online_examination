
<?php include('db.php'); ?>

<?php 

 
    $exam_id = $_POST['exam_id'];
    $datetime = $_POST['date'];
   
   
    $sql = "INSERT INTO result_publish(exam_id,publish_date) values ('$exam_id','$datetime' )";

    $result = mysqli_query($con,$sql);
    if($result){
        $_SESSION['status'] = "Result Published Successfully";
        echo "<script>window.location.href = 'exam.php'</script>";
    }else {
        echo "Somthing Went Wrong";
    }
 


?>