<?php require('db.php');

include_once '../lib/mailer/PHPMailer.php';
include_once '../lib/mailer/SMTP.php';
include_once '../lib/mailer/Exception.php';

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


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
    
    $query = "SELECT email, full_name FROM persons WHERE personID=$userID";
    $queryResult = mysqli_query($con, $query);
    $row = mysqli_fetch_array($queryResult, MYSQLI_ASSOC);
    $user = array(
        "fullname" => $row["full_name"],
        "email" => $row["email"]
    );

    $subject = isset($_POST["subject"]) ? $_POST["subject"] : null;
    $body = isset($_POST["body"]) ? $_POST["body"] : null;
    $attachment = isset($_POST["attachment"]) ? $_POST["attachment"] : null;
    
    if (isset($subject) && isset($body)) {
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            // Server settings
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'send.one.com;';                        // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'kazik@waraksa.net';                // SMTP username
            $mail->Password = 'BobaBoba2@';                       // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('kazik@waraksa.net', 'Mailer');
            $mail->addAddress($user["email"], $user["fullname"]);  

            if (isset($attachment) && file_exists($attachment)) {
                $mail->AddAttachment($attachment, basename($attachment));
            }


            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;

            $mail->send();
            $result["ok"] = true;
        } 
        catch (Exception $e) {
            $result["error"] = $mail->ErrorInfo;
        }
    }

}

echo json_encode($result);
