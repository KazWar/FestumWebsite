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

$tickets = array();
$result = mysqli_query($con,"SELECT * FROM webshopproducts WHERE type=4");
while($row = mysqli_fetch_array($result)) {
     $ticket = array(
         "productID" => $row['productID'],
         "name" => htmlspecialchars($row['name']),
         "description" => $row['description'],
         "price" => $row['price']
     );
     array_push($tickets, $ticket);
}

echo json_encode($tickets);

?>
