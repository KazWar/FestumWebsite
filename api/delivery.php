<?php require "db.php";

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
session_start();
$userID = $_SESSION['userID'];

try {
    $name = mysqli_real_escape_string($con, $_POST["inputCountry"]);
    $middlename  = mysqli_real_escape_string($con,$_POST["inputCity"]);
    $surname = mysqli_real_escape_string($con, $_POST["inputAddress"]);
    $email  = mysqli_real_escape_string($con, $_POST["inputPostalCode"]);

    $stmt = $con->prepare("INSERT INTO persons (first_name, mid_name, last_name, email, password, telephoneNumber) VALUES (?, ?, ?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("sssssi", $name, $middlename, $surname, $email, $password, $phonenumber);
    
        if ($stmt->execute()) {
            $registered = true;
        }    
    }
}
catch (Exception $e) {
    echo $e->getMessage();
}

$stmt->close();
$con->close();

if ($registered) {
    header("location:../views/register/ok.php");
}
else 
{
    header("location:../views/register/failed.php");
}

?>