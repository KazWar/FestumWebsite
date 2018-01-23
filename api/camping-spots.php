<?php require('db.php') ?>

<?php

header('Content-Type: application/json');

$campingSpots = array();
$result = mysqli_query($con,"SELECT * FROM campingspots");
while($row = mysqli_fetch_array($result)) {
     $spot = array(
         "campingSpotID" => $row['campingSpotID'],
         "isTaken" => $row['isTaken'] == 1
     );
     array_push($campingSpots, $spot);
}

echo json_encode($campingSpots);

?>