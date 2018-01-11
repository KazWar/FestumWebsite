<?php require('db.php') ?>

<?php
header('Content-Type: application/json');

/* Fake articles 
$articles = array(
    array("recordID" => 1, "articleID" => 2, "title" => "Yo!", "content" => "Wasup?", "date" => "2017-01-19 11:22:22"),
    array("recordID" => 2, "articleID" => 21, "title" => "Hi!", "content" => "What is your favourite color?", "date" => "2017-01-19 11:22:22"),
    array("recordID" => 3, "articleID" => 22, "title" => "How are you?!", "content" => "Good?", "date" => "2017-01-19 11:22:22"),
    array("recordID" => 4, "articleID" => 23, "title" => "Life is good!", "content" => "Or not?", "date" => "2017-01-19 11:22:22")
);
*/
$cartProducts = array();
$result = mysqli_query($con,"
        SELECT amount,name,price,shoppingcart.productID as productID FROM shoppingcart
        INNER JOIN webshopproducts
        ON shoppingcart.productID = webshopproducts.productID
        WHERE personID = $userID;");
while($row = mysqli_fetch_array($result)) {
     $cartProduct = array(
         "productID" => htmlspecialchars($row['productID']),
         "name" => $row['name'],
         "amount" => $row['amount'],
         "price" => $row['price']
     );
     array_push($cartProducts, $cartProduct);
}

echo json_encode($cartProducts);

?>