<?php require('db.php');

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
    
    header("location:../views/home/home.php");
} 
else { 
    header("location:../views/unauthorized/unauthorized.php");    
}
?>
