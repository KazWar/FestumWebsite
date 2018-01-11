<?php 
$PageTitle = "Camping Site Selection";

function ScriptsAndStyles(){ ?>
    <link href="../../css/webshopcart.css" rel="stylesheet" type="text/css"/>
    <script src="../campingsite/campingsite.js"></script>    
    <script src="cart.js"></script>    
<?php }

include_once('../components/header.php');?>
<!------------------------------------------------------------------------------------ -->

<div class="container bg-faded my-3">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
<?php
    if (isset($_SESSION['userID']) == false) {
        echo "<tbody>
            <tr>
                <td data-th='Product'>
                    <div class='row'>
                        <div class='col-sm-10'>
                            <h4 class='nomargin'></h4>
                            <p>Please log in to view your cart or you cart is empty.</p>
                        </div>
                    </div>
                </td>
                <td data-th='Price'></td>
                <td data-th='Quantity'></td>
                <td data-th='Subtotal' class='text-center'></td>
            </tr>
        </tbody>";
    } else {   
        $userID = $_SESSION['userID'];
    
    $result = mysqli_query($con,"
        SELECT amount,name,price,shoppingcart.productID FROM shoppingcart
        INNER JOIN webshopproducts
        ON shoppingcart.productID = webshopproducts.productID
        WHERE personID = $userID;");
    $orderPriceTotal = 0;
            
    while($row = mysqli_fetch_array($result)) {
        $productID = htmlspecialchars($row['productID']);
        $productName = htmlspecialchars($row['name']);
        $productAmount = $row['amount'];
        $productPrice = htmlspecialchars($row['price']);
        
        $productPriceTotal = ($productAmount * $productPrice);
        $orderPriceTotal = $orderPriceTotal + $productPriceTotal;

    echo "<tbody>
            <tr>
                <td data-th='Product'>
                    <div class='row'>
                        <div class='col-sm-2 hidden-xs'><img src='http://placehold.it/100x100' alt='...' class='img-responsive'/></div>
                        <div class='col-sm-10'>
                            <h4 class='nomargin'>$productName</h4>
                            <p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </td>
                <td data-th='Price'>$productPrice</td>
                <td data-th='Quantity'>
                    <input id='productAmount' type='number' class='form-control text-center' value='$productAmount'>
                </td>
                <td data-th='Subtotal' class='text-center'>&#8364; $productPriceTotal</td>
                <td class='actions' data-th=''>
                    <button onclick='updateProduct()'class='btn btn-info btn-sm'><i class='fa fa-refresh'></i></button>
                    <button onclick='removeProduct()' class='btn btn-danger btn-sm'><i class='fa fa-trash-o'></i></button>								
                </td>
            </tr>
        </tbody>";}
        }
        
        echo"
        <tfoot>
            <tr class='visible-xs'>
                <td class='text-center'><strong>Total price &#8364;$orderPriceTotal</strong></td>
            </tr>
            <tr>
                <td><a href='products.php' class='btn btn-warning'><i class='fa fa-angle-left'></i> Continue Shopping</a></td>
                <td colspan='2' class='hidden-xs'></td>
                <td class='hidden-xs text-center'></td>
                <td><a href='confirmDeliveryPage.php' class='btn btn-success btn-block'>Checkout <i class='fa fa-angle-right'></i></a></td>
            </tr>
        </tfoot>
    </table>
</div>";?>


<!------------------------------------------------------------------------------------ -->
<?php include_once('../components/footer.php');?>
