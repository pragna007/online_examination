
<?php include('db.php'); ?>

<?php 

if(isset($_POST['asign_student_btn'])){
    
    $roll = $_POST['roll_no'];
    $class_id = $_POST['class_id'];
    $student_id = $_POST['student_id'];
    $created_at = date('Y-m-d H:i:s');
   
    $sql = "INSERT INTO asign_student(roll_no,class_id,student_id,created_at) values ('$roll','$class_id','$student_id','$created_at')";

    $result = mysqli_query($con,$sql);
    if($result){
        $_SESSION['status'] = "Data Added Successfully";
        echo "<script>window.location.href = 'asign_student.php'</script>";
    }else {
        echo "Somthing Went Wrong";
    }
}




// update query
if(isset($_POST['asign_student_update_btn'])){

    $update_id = $_POST['asign_student_edit_id'];
    $roll_no = $_POST['roll_no'];
    $class_id = $_POST['class_id'];
    $student_id = $_POST['student_id'];

    $sql_update = "UPDATE asign_student SET roll_no='$roll_no',class_id='$class_id' , student_id='$student_id' WHERE id='$update_id'";
    $update_run = mysqli_query($con,$sql_update);

    if($update_run){
        echo "<script>window.location.href = 'asign_student.php'</script>";
    }else{
        echo "Failed Uupdate";
    }
}

?>