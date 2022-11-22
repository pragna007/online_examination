<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['u_name']) || empty($_POST['password'])) {
$error = "u_name or Password is invalid";
}
else{
// Define $u_name and $password
$u_name = $_POST['u_name'];
$password = $_POST['password'];
// mysqli_connect() function opens a new connection to the MySQL server.
$con = mysqli_connect("localhost", "root", "", "examination");
// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT u_name, password,id from users where u_name=? AND password=? and status=0 LIMIT 1";
// To protect MySQL injection for Security purpose
$stmt = $con->prepare($query);
$stmt->bind_param("ss", $u_name, $password);
$stmt->execute();
$stmt->bind_result($u_name, $password,$id);
$stmt->store_result();

if($stmt->fetch()) //fetching the contents of the row {
$_SESSION['login_user'] = $u_name;
$_SESSION['user_id'] = $id; // Initializing Session
header("location: index.php"); // Redirecting To Profile Page
}
mysqli_close($con); // Closing Connection
}
?>