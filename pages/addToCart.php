<?php require 'mysql/connectConfig.php'; 
            session_start();

$chosenProductID = $_GET["productID"];
$productID = $chosenProductID;
$productAmount  = $_GET["inputAmount"];
$userID = $_SESSION["userID"];


print_r($_SESSION);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$sql = "INSERT INTO shoppingcart (personID, productID, Amount)
VALUES ($userID, $productID, $productAmount)";

if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();

    //header("location:productPage.php?productID=$chosenProductID");
?>
