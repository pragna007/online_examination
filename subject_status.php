
<?php include('db.php'); ?>

<?php 

    $id = $_GET['id'];
    $status = $_GET['status'];

    $sql_update = "UPDATE subjects SET status='$status' WHERE id='$id'";
    $update_run = mysqli_query($con,$sql_update);

    if($update_run){
        echo "<script>window.location.href = 'subject.php'</script>";
    }

?>