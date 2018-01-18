<?php

include_once '../lib/qrCodeGenerator/qrCode.php';

header('Content-Type: application/json');

$result = array(
    "ok" => false
);

session_start();

if (isset($_SESSION['userID']) == false) {
    $result["session"] = false;
}
else {
    $result["session"] = true;
    $userID = $_SESSION['userID'];
    $filePath = dirname(__FILE__) . "/../tmp/" . $userID . ".png";
    $text = (string)$userID;
    QRcode::png($text, $filePath);
    $result["filepath"] = $filePath;
    $result["ok"] = file_exists($filePath);
    echo json_encode($result);
}

?>

