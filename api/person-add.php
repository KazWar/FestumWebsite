<?php require('db.php') ?>

<?php

$result = array(
    "ok" => false
);

session_start();

if (isset($_SESSION["userID"])) {

    $userID = $_SESSION["userID"];
    $firstName = isset($_GET["firstName"]) ? $_GET["firstName"] : null;
    $lastName = isset($_GET["lastName"]) ? $_GET["lastName"] : null;
    $email = isset($_GET["email"]) ? $_GET["email"] : null;


    if (isset($firstName) && isset($lastName) && isset($email)) {
        // Check connection
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        } 
        
        $personID = null;
        $sql = mysqli_query($con, "select personID from persons where email = '$email'");
        while($row = mysqli_fetch_array($sql)) {
            $personID = $row["personID"];
        }
          
        if (isset($personID)) {
            $result["personID"] = $personID;
        }
        else {
            $sql = "INSERT INTO persons (first_name, last_name, email) VALUES ('$firstName', '$lastName', '$email')";
            if ($con->query($sql) === TRUE && mysqli_affected_rows($con) == 1) {
                $result["ok"] = true;
                $sql = mysqli_query($con, "select personID from persons where email = '$email'");
                while($row = mysqli_fetch_array($sql)) {
                    $result["personID"] = $row["personID"];
                }
            } 
        }

        $con->close();
   
    }
    else {
        $result["personID"] = $userID;
    }
}

header('Content-Type: application/json');
echo json_encode($result);

?>