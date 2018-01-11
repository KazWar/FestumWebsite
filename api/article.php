<?php require('db.php') ?>

<?php
header('Content-Type: application/json');

$articleID = $_GET['articleID'];

$articleResult = mysqli_query($con,"SELECT * FROM Articles where articleID=$articleID");
while($row = mysqli_fetch_array($articleResult)) {
     $article = array(
         "articleID" => $row['articleID'],
         "title" => htmlspecialchars($row['title']),
         "content" => $row['content'],
         "date" => $row['articleDate'],
         "comments" => array()
     );
}

$result = mysqli_query($con,"
        SELECT content,full_name from articlecomments 
        INNER JOIN persons
        ON articlecomments.userID = persons.personID
        where articleID=$articleID;");
while($row = mysqli_fetch_array($result)) {
     $comment = array(
         "full_name" => htmlspecialchars($row['full_name']),
         "content" =>$row['content']
     );
     array_push($article["comments"], $comment);
}

echo json_encode($article);

?>