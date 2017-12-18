<?php require('/navigation/header.php') ?>

<link href="/css/shop-homepage.css" rel="stylesheet" type="text/css"/>

<div class="container" style="margin-top: 40px;">
  <div class="bg-faded p-4 my-4">
        <div class="row">
            <div class="col-md-9">
                <div class='row product-list'>
                    <?php
                        $result = mysqli_query($con,"SELECT * FROM webshopProducts");
                    
                    while($row = mysqli_fetch_array($result)) {
                        $productCode = htmlspecialchars($row['productID']);
                        $productName = htmlspecialchars($row['name']);
                        $productDescription = $row['description'];
                        $productPrice = htmlspecialchars($row['price']);

                        echo      "<div class='col-sm-4 col-lg-4 col-md-4'>
                                    <div class='thumbnail'>
                                        <div class='thumbnail-container'>";
                                        if (file_exists(getcwd() . '/productImages/' . $productCode .'.jpg')) {
                                            echo "<a href='productPage.php?productCode=$productCode'>
                                                    <img class='thumbnail-image' src='productImages/". $productCode .".jpg' alt='$productName'>
                                                  </a></div>";
                                        } else {
                                            echo "<a href='productPage.php?productCode=$productCode'>
                                                    <img class='thumbnail-image' src='productImages/noproduct.jpg' alt='$productName'>
                                                  </a></div>";
                                        }

                        echo      "<div class='caption'>
                                        <h4 class='pull-right'>&#8364; $productPrice</h4>
                                        <h4><a class='product-name' href='productPage.php?productCode=$productCode'> $productName</a></h4>
                                       <div class='product-description thumbnail-text'>$productDescription</div>
                                           <a href='productPage.php?productCode=$productCode' class='readmore'>Read more &raquo;</a>
                                    </div>
                                </div>
                            </div>";}
                         ?>
                 </div>
            </div>
        </div>
    </div>
</div>

<?php require('/navigation/footer.php') ?>
