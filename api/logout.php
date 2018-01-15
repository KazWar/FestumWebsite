<?php require('db.php');

 session_start();
 session_destroy();
 header("location:../views/home/home.php");

?>