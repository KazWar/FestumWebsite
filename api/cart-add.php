<?php require('db.php') ?>

<?php

$result = array(
    "ok" => false
);

session_start();

if (isset($_SESSION["userID"])) {

    $userID = $_SESSION["userID"];
    $productID = $_GET["productID"];
    $amount = isset($_GET["amount"]) ? $_GET["amount"] : 1;
    $ownerID = isset($_GET["ownerID"]) ? $_GET["ownerID"] : $userID;

    if (isset($productID) && $amount > 0) {
        // Check connection
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        } 
       
        
        $sql = "INSERT INTO shoppingcart (personID, ownerID, productID, Amount)
        VALUES ($userID, $ownerID, $productID, $amount)";

        if ($con->query($sql) === TRUE) {
            $result["ok"] = true;
        } 

        $con->close();
    }
}

header('Content-Type: application/json');
echo json_encode($result);

?>