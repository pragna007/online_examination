
<?php include('db.php'); ?>

<?php 
session_start();

if(isset($_POST['student_save_btn'])){
    
    $s_name = $_POST['s_name'];
    $s_address = $_POST['s_address'];
    $s_email = $_POST['s_email'];
    $s_password = $_POST['s_password'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $s_image = $_FILES['s_image']['name'];
    $temp = $_FILES['s_image']['tmp_name'];
    $created_at = date('Y-m-d H:i:s');

   
    $sql = "INSERT INTO student (s_name,s_address,s_email,s_password,gender,dob,s_image,created_at)
     values ('$s_name','$s_address','$s_email','$s_password','$gender','$dob','$s_image','$created_at')";

    $result = mysqli_query($con,$sql);
    if($result)
    {
        move_uploaded_file($temp, "uploads/".$s_image);
        $_SESSION['status'] = "Data Added Successfully";
        echo "<script>window.location.href = 'student.php'</script>";
    }
    else {
        echo "Somthing Went Wrong";
    }
}



if(isset($_POST['student_update_btn']))
{
    $stud_id = $_POST['student_edit_id'];
    $s_name = $_POST['s_name'];
    $s_address = $_POST['s_address'];
    $s_email = $_POST['s_email'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];

    $new_image = $_FILES['s_image']['name'];
    $old_image = $_POST['s_image_old'];

    if($new_image != '')
    {
        $update_filename = $_FILES['s_image']['name'];
    }
    else
    {
        $update_filename = $old_image;
    }

    if(file_exists("uploads/".$_FILES['s_image']['name']))
    {
        $filename = $_FILES['s_image']['name'];
        $_SESSION['status'] = "Image Alrady exists".$filename;
        echo "<script>window.location.href = 'student.php'</script>";
    }
    else
    {
        $query = "UPDATE student SET s_name='$s_name',s_address='$s_address',s_email='$s_email',gender='$gender',dob='$dob',s_image='$update_filename' WHERE id='$stud_id'";
        $query_run = mysqli_query($con,$query);
        if($query_run)
        {
            if($_FILES['s_image']['name'] != '')
            {
                move_uploaded_file($_FILES['s_image']['tmp_name'], "uploads/".$_FILES['s_image']['name']);
                unlink("uploads/".$old_image);
            }
            $_SESSION['status'] = "Data Updated Successfully";
            echo "<script>window.location.href = 'student.php'</script>";
        }
        else
        {
            echo "Failed Updated";
        }
    }

}

?>