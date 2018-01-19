<?php require "db.php";

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
session_start();
$userID = $_SESSION['userID'];

try {
    $country = mysqli_real_escape_string($con, $_POST["inputCountry"]);
    $city  = mysqli_real_escape_string($con,$_POST["inputCity"]);
    $street = mysqli_real_escape_string($con, $_POST["inputAddress"]);
    $streetInfo = explode (" ", $street);
    $streetname = $streetInfo[0];
    $streetnr = $streetInfo[1];
    $postalCode  = mysqli_real_escape_string($con, $_POST["inputPostalCode"]);

    $stmt = $con->prepare("INSERT INTO deliveryaddress (personID, country, city, streetname, streetnumber, postalCode) VALUES (?, ?, ?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("isssis", $userID, $country, $city, $streetname, $streetnr, $postalCode);
    
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
    header("location:../views/checkout/checkout.php");
}
else 
{
    header("location:../views/delivery/failed.php");
}

?>