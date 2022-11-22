
<?php include('db.php'); ?>

<?php 

if(isset($_POST['exam_save_btn'])){
    
    $exam_name = $_POST['exam_name'];
    $class_id = $_POST['class_id'];
    $exam_dur = $_POST['exam_dur'];
    $status = 0;
    $created_at = date('Y-m-d H:i:s');
   
    $sql = "INSERT INTO exam(exam_name,class_id,exam_dur,status,created_at) values ('$exam_name','$class_id','$exam_dur','$status','$created_at')";

    $result = mysqli_query($con,$sql);
    if($result){
        $_SESSION['status'] = "Data Added Successfully";
        echo "<script>window.location.href = 'exam.php'</script>";
    }else {
        echo "Somthing Went Wrong";
    }
}




// update query
if(isset($_POST['exam_update_btn'])){

    $update_id = $_POST['exam_edit_id'];
    $exam_name = $_POST['exam_name'];
    $class_id = $_POST['class_id'];
    $exam_dur = $_POST['exam_dur'];
    $status = $_POST['status'];

    $sql_update = "UPDATE exam SET exam_name='$exam_name',class_id='$class_id',status='$status',exam_dur='$exam_dur' WHERE id='$update_id'";
    $update_run = mysqli_query($con,$sql_update);

    if($update_run){
        echo "<script>window.location.href = 'exam.php'</script>";
    }else{
        echo "Failed Uupdate";
    }
}

?>