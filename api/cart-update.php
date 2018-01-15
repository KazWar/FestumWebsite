<?php require('db.php') ?>

<?php

$result = array(
    "ok" => false
);

session_start();

if (isset($_SESSION["userID"])) {

    $recordID = $_GET["recordID"];
    $amount = $_GET["amount"];

    if (isset($recordID) && isset($amount) && $amount > 0) {
        // Check connection
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        } 

        $sql = "UPDATE shoppingcart SET amount=$amount WHERE recordID=$recordID";

        if ($con->query($sql) === TRUE && mysqli_affected_rows($con) == 1) {
            $result["ok"] = true;
        } 

        $con->close();
    }
}

header('Content-Type: application/json');
echo json_encode($result);

?>