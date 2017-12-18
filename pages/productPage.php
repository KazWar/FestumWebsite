<?php require 'header.php'; 

$code = htmlspecialchars($_GET["productCode"]);
$price = filter_input(INPUT_GET, 'price');

$result = mysqli_query($con,"SELECT * FROM products WHERE code = $code");
                  
    foreach ($result as $row) {
        $productCode = htmlspecialchars($row['code']);
        $productName = htmlspecialchars($row['name']);
        $productDescription = ($row['description']);
        $productPrice = htmlspecialchars($row['price']);
    }

?>
 <link href="../css/shop-item.css" rel="stylesheet" type="text/css"/>
 
 <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="thumbnail">                               
                    <img id="productImage" class="img-responsive" src="<?php echo 'productImages/' .$productCode .'.jpg'?>" alt="<?php echo $productName ?>">       
                    <div class="caption-full">                
                    <hr style="width:80%; ">
                        <table style="width: 100%">
                        <tr>
                            <td>
                                <h4><?php echo $productName ?></h4>
                            </td>
                            <td class="pull-right">
                                <h4 id="price" >&#8364; <?php 
                                if (isset($price)) {
                                    echo $price;
                                    } else {
                                    echo $productPrice;}?> p.p</h4> 
                            </td>
                        </tr>
                    </table>
                    <div id="">
                        <p><?php echo "$productDescription";?></p>  
                    </div>
                    </div>  <hr style="width:80%; ">
                    <div class="text-right productButtons">
                        <a class="btn btn-info" href="addToCart.php?productCode=<?php echo $productCode?>">
                            <span translate="addtocart">Add to wishlist</span>
                        </a>
                        <a class="btn btn-warning" href="addToCart.php?productCode=<?php echo $productCode?>">
                            <span translate="addtocart">Alert when available</span>
                        </a>
                        <a class="btn btn-success" href="addToCart.php?productCode=<?php echo $productCode?>">
                            <span translate="addtocart">Add to cart</span>
                        </a>
                    </div>
                </div>
                
                <div class="well">
                    <div class="text-right">
                        <a class="btn btn-success">
                            <span translate="createreview">Laat een beoordeling achter</span>
                        </a>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">15 days ago</span>
                            <p>I've seen some better than this, but not at this price. I definitely recommend this item.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

  <?php require 'footer.php'; ?>
