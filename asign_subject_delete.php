
<?php include('db.php'); ?>

<?php 

$id = $_GET['id'];

$del_sql = "DELETE FROM asign_subject WHERE id='$id'";

$res = mysqli_query($con,$del_sql);

if($res){
    echo "<script>window.location.href = 'asign_subject.php'</script>";
}else{
    echo "Failed";
}

?>