<?php require('db.php') ?>

<?php
header('Content-Type: application/json');
    
$result = array(
);
    
session_start();
if (isset($_SESSION['userID']) == false) {
    $result["session"] = false;
}
else {
    $result["session"] = true;
    $personID = $_SESSION['userID'];
    $cartProducts = array();
    $query = mysqli_query($con,"
            SELECT shoppingcart.recordID as recordID,amount,name,price,shoppingcart.productID as productID FROM shoppingcart
            INNER JOIN webshopproducts
            ON shoppingcart.productID = webshopproducts.productID
            WHERE personID = $personID");
    $total = 0;
    while($row = mysqli_fetch_array($query)) {
         $cartProduct = array(
             "recordID" => $row["recordID"],
             "productID" => htmlspecialchars($row['productID']),
             "name" => $row['name'],
             "amount" => $row['amount'],
             "price" => $row['price'],
             "total" => $row['price'] * $row['amount']
         );
         $total = $total + $cartProduct["total"];
         array_push($cartProducts, $cartProduct);
    }

    $result["products"] = $cartProducts;
    $result["total"] = $total;
}

echo json_encode($result);

?>