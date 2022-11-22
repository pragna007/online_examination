
<?php include('db.php'); ?>

<?php 

if(isset($_POST['subject_save_btn'])){
    
    $subject_name = $_POST['name'];
    $created_at = date('Y-m-d H:i:s');
   
    $sql = "INSERT INTO subjects(subject_name,created_at) values ('$subject_name','$created_at')";

    $result = mysqli_query($con,$sql);
    if($result){
        echo "<script>window.location.href = 'subject.php'</script>";
    }else {
        echo "Somthing Went Wrong";
    }
}

if(isset($_POST['subject_update_btn'])){


    $subject_update_id = $_POST['subject_edit_id'];
    $s_name = $_POST['subject_name'];

    $sql_update = "UPDATE subjects SET subject_name='$s_name' WHERE id='$subject_update_id'";
    $update_run = mysqli_query($con,$sql_update);

    if($update_run){
        echo "<script>window.location.href = 'subject.php'</script>";
    }else{
        echo "Failed Uupdate";
    }
}

?>