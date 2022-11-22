
<?php include('db.php'); ?>

<?php 

if(isset($_POST['question_btn'])){
    
      
    $exam_subject_id = $_POST['exam_subject_id'];
    $q_title = $_POST['q_title'];
    $option_1 = $_POST['option_1'];
    $option_2 = $_POST['option_2'];
    $option_3 = $_POST['option_3'];
    $option_4 = $_POST['option_4'];
    $ans = $_POST['ans'];
    $created_at = date('Y-m-d H:i:s');
   
    $sql = "INSERT INTO question (exam_subject_id,q_title,option_1,option_2,option_3,option_4,ans,created_at) 
    values ('$exam_subject_id','$q_title','$option_1','$option_2','$option_3','$option_4','$ans','$created_at')";

    $result = mysqli_query($con,$sql);
    if($result){
        echo "<script>window.location.href = 'question.php?id=".$exam_subject_id."'</script>";
    }else {
        echo "Somthing Went Wrong";
    }
}

if(isset($_POST['question_update_btn'])){

    $update_id = $_POST['question_edit_id'];
     $exam_subject_id = $_POST['exam_subject_id'];
  
    $q_title = $_POST['q_title'];
    $option_1 = $_POST['option_1'];
    $option_2 = $_POST['option_2'];
    $option_3 = $_POST['option_3'];
    $option_4 = $_POST['option_4'];
    $ans = $_POST['ans'];

    $sql_update = "UPDATE question SET q_title='$q_title',option_1='$option_1',option_2='$option_2',option_3='$option_3',option_4='$option_4',ans='$ans' WHERE id='$update_id'";
    $update_run = mysqli_query($con,$sql_update);

    if($update_run){
        echo "<script>window.location.href = 'question.php?id=".$exam_subject_id."'</script>";
    }else{
        echo "Failed Uupdate";
    }
}

?>