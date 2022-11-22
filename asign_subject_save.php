
<?php include('db.php'); ?>

<?php 

if(isset($_POST['asign_subject_btn'])){
    
    $class_id = $_POST['class_id'];
    $subject_id = $_POST['subject_id'];
    $created_at = date('Y-m-d H:i:s');
   
    $sql = "INSERT INTO asign_subject(class_id,subject_id,created_at) values ('$class_id','$subject_id','$created_at')";

    $result = mysqli_query($con,$sql);
    if($result){
        echo "<script>window.location.href = 'asign_subject.php'</script>";
    }else {
        echo "Somthing Went Wrong";
    }
}




// update query
if(isset($_POST['asign_subject_update_btn'])){

    $update_id = $_POST['asign_subject_edit_id'];
    $class_id = $_POST['class_id'];
    $subject_id = $_POST['subject_id'];

    $sql_update = "UPDATE asign_subject SET class_id='$class_id', subject_id='$subject_id' WHERE id='$update_id'";
    $update_run = mysqli_query($con,$sql_update);

    if($update_run){
        echo "<script>window.location.href = 'asign_subject.php'</script>";
    }else{
        echo "Failed Uupdate";
    }
}

?>