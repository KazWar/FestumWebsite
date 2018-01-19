<?php require('db.php') ?>

<?php

$result = array(
    "ok" => false
);

session_start();

if (isset($_SESSION["userID"])) {

    $userID = $_SESSION["userID"];
    
    $cartProducts = array();
    $query = mysqli_query($con,"
            SELECT shoppingcart.recordID as recordID,amount,name,itemtypes.typeName as typename,price,shoppingcart.productID as productID FROM shoppingcart
            INNER JOIN webshopproducts
            ON shoppingcart.productID = webshopproducts.productID
            INNER JOIN itemtypes
            ON webshopproducts.type = itemtypes.recordID
            WHERE personID = $personID");
    
    //Select entire contents of Cart where userID matches sessionUserID
    //Put 
    

        if ($con->query($query) === TRUE) {
            $result["ok"] = true;
        } 
    

    if (isset($productID) && $amount > 0) {
        // Check connection
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        } 
        
        $sql = "INSERT INTO orders (orderID, deliveryID, productID, amount, orderTotal)
        VALUES ($userID, $productID, $amount)";

        if ($con->query($sql) === TRUE) {
            $result["ok"] = true;
        } 

        $con->close();
    }
}

header('Content-Type: application/json');
echo json_encode($result);

?>

`orderID`, `deliveryID`, `productID`, `amount`, `orderTotal`