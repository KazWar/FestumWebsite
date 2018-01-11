<?php require('db.php') ?>

<?php

header('Content-Type: application/json');


$itemtypes = array();
$result = mysqli_query($con,"SELECT * FROM itemtypes");
while($row = mysqli_fetch_array($result)) {
     $itemtype = array(
         "id" => $row['recordID'],
         "name" => htmlspecialchars($row['typeName'])
     );
     array_push($itemtypes, $itemtype);
}

echo json_encode($itemtypes);

?>
