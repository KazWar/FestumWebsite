<?php
Echo '<meta http-equiv="refresh" content="1;url=home.php">';

require "mysql/connectConfig.php";

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

try {
    $name = mysqli_real_escape_string($con, $_POST["inputName"]);
    $middlename  = mysqli_real_escape_string($con,$_POST["inputMiddleName"]);
    $surname = mysqli_real_escape_string($con, $_POST["inputSurname"]);
    $email  = mysqli_real_escape_string($con, $_POST["inputEmail"]);
    $password  = mysqli_real_escape_string($con, $_POST["inputPassword"]);
    $phonenumber = mysqli_real_escape_string($con, $_POST["inputPhoneNumber"]);

    $stmt = $con->prepare("INSERT INTO persons (first_name, mid_name, last_name, email, password, telephoneNumber) VALUES (?, ?, ?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("sssssi", $name, $middlename, $surname, $email, $password, $phonenumber);
    
        if ($stmt->execute()) {
            echo "Succeeded.";
        }    
        else {
            echo "Failed";
        }
    }
    else {
        echo "Statement preparation failed";
    }
}
catch (Exception $e) {
    echo $e->getMessage();
}

$stmt->close();
$con->close();

?>