
<?php
    include('session.php');
    if(!isset($_SESSION['login_user'])){
    header("location: login.php"); // Redirecting To Home Page
    }
    ?>
<?php include('db.php'); ?>
<?php 

    $id = $_GET['id'];
    $status = $_GET['status'];

    $sql_update = "UPDATE users SET status='$status' WHERE id='$id'";
    $update_run = mysqli_query($con,$sql_update);

    if($update_run){
        echo "<script>window.location.href = 'user.php'</script>";
    }

?>