
<?php include('db.php'); ?>

<?php 
session_start();

if(isset($_POST['user_save_btn'])){
    
    $u_name = $_POST['u_name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $image = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];
    $created_at = date('Y-m-d H:i:s');

   
    $sql = "INSERT INTO users (u_name,contact,email,password,image,created_at)
     values ('$u_name','$contact','$email','$password','$image','$created_at')";

    $result = mysqli_query($con,$sql);
    if($result)
    {
        move_uploaded_file($temp, "uploads/user/".$image);
        $_SESSION['status'] = "Data Added Successfully";
        echo "<script>window.location.href = 'user.php'</script>";
    }
    else {
        echo "Somthing Went Wrong";
    }
}


//update query
if(isset($_POST['user_update_btn']))
{
    $user_id = $_POST['user_edit_id'];
    $u_name = $_POST['u_name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['image_old'];

    if($new_image != '')
    {
        $update_filename = $_FILES['image']['name'];
    }
    else
    {
        $update_filename = $old_image;
    }

    if(file_exists("uploads/user/".$_FILES['image']['name']))
    {
        $filename = $_FILES['image']['name'];
        $_SESSION['status'] = "Image Alrady exists".$filename;
        echo "<script>window.location.href = 'user.php'</script>";
    }
    else
    {
        $query = "UPDATE users SET u_name='$u_name',contact='$contact',email='$email',image='$update_filename' WHERE id='$user_id'";
        $query_run = mysqli_query($con,$query);
        if($query_run)
        {
            if($_FILES['image']['name'] != '')
            {
                move_uploaded_file($_FILES['image']['tmp_name'], "uploads/user/".$_FILES['image']['name']);
                unlink("uploads/user/".$old_image);
            }
            $_SESSION['status'] = "Data Updated Successfully";
            echo "<script>window.location.href = 'user.php'</script>";
        }
        else
        {
            echo "Failed Updated";
        }
    }

}

?>