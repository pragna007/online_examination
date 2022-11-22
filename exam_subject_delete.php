
<?php include('db.php'); ?>

<?php 

$id = $_GET['id'];

$del_sql = "DELETE FROM exam_subject WHERE id='$id'";

$res = mysqli_query($con,$del_sql);

if($res){
    echo "<script>window.history.go(-1)</script>";
}else{
    echo "Failed";
}

?>