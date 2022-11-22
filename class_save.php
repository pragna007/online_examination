
<?php include('db.php'); ?>

<?php 

if(isset($_POST['save_btn'])){
    
    $class_name = $_POST['name'];
    $created_at = date('Y-m-d H:i:s');
   
    $sql = "INSERT INTO class(class_name,created_at) values ('$class_name','$created_at')";

    $result = mysqli_query($con,$sql);
    if($result){
        echo "<script>window.location.href = 'class.php'</script>";
    }else {
        echo "Somthing Went Wrong";
    }
}

if(isset($_POST['update_btn'])){

    $update_id = $_POST['edit_id'];
    $class_name = $_POST['name'];

    $sql_update = "UPDATE class SET class_name='$class_name' WHERE id='$update_id'";
    $update_run = mysqli_query($con,$sql_update);

    if($update_run){
        echo "<script>window.location.href = 'class.php'</script>";
    }else{
        echo "Failed Uupdate";
    }
}

?>