<?php require('navigation/header.php') ?>
  
    <?php
    
    $articleCode = $_GET['articleCode'];
            
    $resultArticle = mysqli_query($con,"SELECT * FROM articles WHERE articleID=$articleCode");
    
    while($row = mysqli_fetch_assoc($resultArticle)) {
                        $articleTitle = htmlspecialchars($row['title']);
                        $articleDescription = $row['content'];
                        $articleDate = htmlspecialchars($row['articleDate']);
        
    echo"<div class='container'>
            <div class=' bg-faded p-4 my-3'>
              <h2 class='text-center text-lg text-uppercase my-0'>$articleTitle</h2>
              <h3 class='text-center text-lg text-uppercase my-0'>$articleDate</h3>
              <hr class='divider'>
              $articleDescription
             </div>";}

    $resultComments = mysqli_query($con,"SELECT content,full_name from articlecomments 
                                        INNER JOIN persons
                                        ON articlecomments.userID = persons.personID
                                        where articleID=$articleCode;");

    while($row = mysqli_fetch_array($resultComments)) {
        $username = htmlspecialchars($row['full_name']);
        $userComment = $row['content'];
        
    echo "<div class=' bg-faded p-4 my-3'>
              <h2 class='text-center text-lg text-uppercase my-0'>$username</h2>
              <hr class='divider'>
              <p>$userComment</p>
            </div>
          </div>";}?>
    <div>
        <button type='button' class='btn btn-outline-light col-md-2 offset-5 bg-faded p-1 mb-3 rounded'> + </button>
    </div>

<?php require('navigation/footer.php') ?>
