<?php
// mysqli_connect() function opens a new connection to the MySQL server.
$con = mysqli_connect("localhost", "root", "", "examination");
session_start();// Starting Session
// Storing Session
$user_check = $_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$query = "SELECT u_name from users where u_name = '$user_check'";
$ses_sql = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['u_name'];
?>