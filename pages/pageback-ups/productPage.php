<?php require('/navigation/header.php')?>

<?php
$productID = htmlspecialchars($_GET["productID"]);

$result = mysqli_query($con,"SELECT * FROM webshopproducts WHERE productID = '$productID'");
                  
    foreach ($result as $row)    
    {
        $productID = htmlspecialchars($row['productID']);
        $productName = htmlspecialchars($row['name']);
        $productDescription = $row['description'];
        $productPrice = htmlspecialchars($row['price']);
    }

?>
 <link href="../css/shop-item.css" rel="stylesheet" type="text/css"/>
 
 <div class="container">
     <div class="bg-faded p-3 my-3">
        <div class="row">
            <div class="col-md-9">
                <div class="thumbnail">                               
                    <img id="productImage" class="img-responsive" src="<?php echo 'productImages/' .$productID .'.jpg'?>" alt="<?php echo $productName ?>">       
                    <hr style="width:80%; ">
                    <div class="caption-full"> 
                        <table style="width: 100%">
                            <tr>
                                <td>
                                    <h4><?php echo $productName ?></h4>
                                </td>
                                <td class="pull-right">
                                    <h4 id="price" >&#8364; <?php echo $productPrice ?> p.p</h4> 
                                </td>
                            </tr>
                        </table>
                        <div>
                            <p><?php echo $productDescription?></p>  
                        </div>
                    </div>  
                    
                    <hr style="width:80%; ">
                    <div class="text-right btn-toolbar mb-3" role="toolbar">
                        <?php if (isset($_SESSION['userID']) == false) {
                            echo '<a href="addToCart.php?productID=<?php echo $productID?>" class="btn btn-outline-success disabled" aria-disabled="True"
                                data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                            <span translate="addtocart">Add to cart</span>
                        </a>';
                            
                        } else {
                            echo '<a href="addToCart.php?productID=<?php echo $productID?>" class="btn btn-outline-success ">
                                    <span translate="addtocart">Add to cart</span>
                                </a>';}
                        ?>
                        
                        <div class="input-group">
                            <input type="text"  id="inputAmount">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
 <script src="popper.min.js">
     
$(function () {
  $('[data-toggle="tooltip"]').tooltip(),{
  trigger:"hover"};
});


 </script>

<?php require('/navigation/footer.php') ?>
