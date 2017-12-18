<?php require('/navigation/header.php') ?>

<div class="container" style="margin-top: 40px;">
        <div class="row">
            <div class="col-md-12">
                <div class='row product-list'>
                    <?php
                        $result = mysqli_query($con,"SELECT * FROM webshopProducts");
                    
                    while($row = mysqli_fetch_array($result)) {
                        $productCode = htmlspecialchars($row['productID']);
                        $productName = htmlspecialchars($row['name']);
                        $productDescription = $row['description'];
                        $productPrice = htmlspecialchars($row['price']);

                        echo "<div class='col-lg-12 bg-faded p-3 my-2'>
                                <h2 class='text-center text-lg text-uppercase my-0'><strong>$productName</strong></h2>
                                <hr class='divider'>
                                <button class='btn btn-outline-dark float-right mr-4 d-none d-lg-block' style='width: 125px; height: 75px;'>Buy Ticket</button>
                                <p>$productDescription</p>
                                <p>Price: &euro; $productPrice</p>
                             </div>";}
                         ?>
                 </div>
            </div>
        </div>
    </div>



<?php require('/navigation/footer.php') ?>
