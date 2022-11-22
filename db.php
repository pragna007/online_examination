<?php 
date_default_timezone_set('America/Los_Angeles');
$con = mysqli_connect('localhost','root','','examination');
if(!$con){
    echo 'Connection Failed';
}

?>