


<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<?php
require 'mysql/connectConfig.php';

$myusername= filter_input(INPUT_POST,'username');
$mypassword= filter_input(INPUT_POST,'password');

$sql="SELECT personID FROM persons WHERE email='$myusername' and password='$mypassword'";
$result=mysqli_query($con,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$count = mysqli_num_rows($result);
if($count == 1){
    session_start();
    
    $sql="SELECT * FROM persons WHERE email='$myusername' and password='$mypassword'";
    $result=mysqli_query($con,$sql);
    
    while($row = mysqli_fetch_array($result)) {
        $name = htmlspecialchars($row['first_name']);
        $middlename = htmlspecialchars($row['mid_name']);
        $surname = htmlspecialchars($row['last_name']);
        $personID = htmlspecialchars($row['personID']);
    }
    
    $_SESSION["welcome"] = $name . ' ' . $middlename . ' ' . $surname;
    $_SESSION["userID"] = $personID;
    $_SESSION["loggedIn"] = TRUE;
    
    header("location:home.php");
} else { ?>
    <!DOCTYPE html>
        <html lang="en">
            <body>
                <div class="jumbotron" style="text-align:center;">
                    <h1>Login failed</h1>
                    Wrong username or password, please try again.
                    <?php
                        header( "Refresh:2; url=home.php");
                    ?>
                </div>
            </body>
        </html>
<?php       
    }
?>
