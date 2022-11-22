<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['u_name']) || empty($_POST['password'])) {
$error = "u_name or Password is invalid";
$_SESSION['error']=$error;
}
else{
// Define $u_name and $password
$u_name = $_POST['u_name'];
$password = $_POST['password'];
// mysqli_connect() function opens a new connection to the MySQL server.
$con = mysqli_connect("localhost", "root", "", "examination");
// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT s_name, s_password,id from student where s_email=? AND s_password=? and status=0 LIMIT 1";
// To protect MySQL injection for Security purpose
$stmt = $con->prepare($query);
$stmt->bind_param("ss", $u_name, $password);
$stmt->execute();
$stmt->bind_result($s_name, $s_password,$id);
$stmt->store_result();
 
if($stmt->num_rows()>0) //fetching the contents of the row {
 {
 	  
$stmt->fetch();
$_SESSION['student_name'] = $s_name;
$_SESSION['student_id'] = $id; // Initializing Session

header("location: index.php"); // Redirecting To Profile Page
}
else{
	$error = "Email or Password is invalid";
$_SESSION['error']=$error;
header("location: login.php");
}
}
mysqli_close($con); // Closing Connection
}
?>