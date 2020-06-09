<?php 
include 'connections/connection_db.php'; 
session_start();
$offline=mysqli_query($con,"update user set online='0' where name='".$_SESSION['name']."' ");
session_destroy();
header("location:index.php");
?>