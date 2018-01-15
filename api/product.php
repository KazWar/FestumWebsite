<?php require('db.php') ?>

<?php

header('Content-Type: application/json');

$productID = $_GET['productID'];
$result = mysqli_query($con,"SELECT * FROM webshopproducts WHERE productID = '$productID'");
while($row = mysqli_fetch_array($result)) {
     $product = array(
         "productID" => $row['productID'],
         "name" => htmlspecialchars($row['name']),
         "description" => htmlspecialchars($row['description']),
         "price" => $row['price'],
         "type" => $row['type'],
         "imagename" => $row["imagename"]
     );
}

if (isset($product)) {
    echo json_encode($product);
}
?>
