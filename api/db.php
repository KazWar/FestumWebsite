<?php 
$servername = "studmysql01.fhict.local";
$username = "dbi337328";
$password = "Bobaboba2";
$database = "dbi337328";

// Create connection
$con = new mysqli($servername, $username, $password,$database);

// Check connection
if ($con->connect_error) {
}

?>


