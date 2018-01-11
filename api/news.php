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

$articles = array();
$result = mysqli_query($con,"SELECT * FROM Articles");
while($row = mysqli_fetch_array($result)) {
     $article = array(
         "articleID" => $row['articleID'],
         "title" => htmlspecialchars($row['title']),
         "content" => $row['content'],
         "date" => $row['articleDate']
     );
     array_push($articles, $article);
}

echo json_encode($articles);

?>