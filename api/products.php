<?php require('db.php') ?>

<?php

header('Content-Type: application/json');

$products = array();
if (isset($_GET["type"])) {
    $productType = $_GET["type"];
    $result = mysqli_query($con, "SELECT * FROM webshopproducts where type = $productType");
}
else {
    $result = mysqli_query($con,"SELECT * FROM webshopproducts");    
}

while($row = mysqli_fetch_array($result)) {
     $product = array(
         "productID" => $row['productID'],
         "name" => htmlspecialchars($row['name']),
         "description" => $row['description'],
         "price" => $row['price'],
         "type" => $row['type'],
         "imagename" => $row["imagename"]
     );
     array_push($products, $product);
}

echo json_encode($products);

?>
