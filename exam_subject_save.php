
<?php include('db.php'); ?>

<?php 

if(isset($_POST['exam_subject_save_btn'])){
    
    $exam_id = $_POST['exam_id'];
    $subject_id = $_POST['subject_id'];
    $exam_duraion = $_POST['exam_duraion'];
    $tot_q = $_POST['tot_q'];
    $correct_ans = $_POST['correct_ans'];
    $wrong_ans = $_POST['wrong_ans'];
    $created_at = date('Y-m-d H:i:s');
   
    $sql = "INSERT INTO exam_subject(exam_id,subject_id,exam_duraion,tot_q,correct_ans,wrong_ans,created_at) values ('$exam_id','$subject_id','$exam_duraion','$tot_q','$correct_ans','$wrong_ans','$created_at')";

    $result = mysqli_query($con,$sql);
    if($result){
        $_SESSION['status'] = "Data Added Successfully";
        echo "<script>window.location.href = 'exam_subject.php?id=".$exam_id."'</script>";
    }else {
        echo "Somthing Went Wrong";
    }
}




// update query
if(isset($_POST['exam_subject_update_btn'])){

    $update_id = $_POST['exam_subject_edit_id'];
    $exam_id = $_POST['exam_id'];
    $subject_id = $_POST['subject_id'];
    $exam_duraion = $_POST['exam_duraion'];
    $tot_q = $_POST['tot_q'];
    $correct_ans = $_POST['correct_ans'];
    $wrong_ans = $_POST['wrong_ans'];
    $sql_update = "UPDATE exam_subject SET exam_id='$exam_id',subject_id='$subject_id',exam_duraion='$exam_duraion',tot_q='$tot_q',correct_ans='$correct_ans',wrong_ans='$wrong_ans' WHERE id='$update_id'";
    $update_run = mysqli_query($con,$sql_update);

    if($update_run){
        echo "<script>window.location.href = 'exam_subject.php?id=".$exam_id."'</script>";
    }else{
        echo "Failed Uupdate";
    }
}

?>