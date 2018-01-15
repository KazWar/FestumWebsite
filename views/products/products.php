<?php 
$PageTitle = "Products";

function ScriptsAndStyles(){ ?>
    <script src="products.js"></script>
    <link rel="stylesheet" href="products.css">
<?php }

include_once('../components/header.php');?>
<!------------------------------------------------------------------------------------ -->

    
<div class="col-md-2 bg-faded p-4 my-4">
    <p class="lead">Categories</p>
    <div class="list-group">
        <a href="products.php" class="list-group-item">All products</a>
        <!-- here item types will be inserted by products.js -->
    </div>
</div>
    
    
<div class="container" style="margin-right: 60px;">
  <div class="bg-faded p-4 my-4">
        <div class="row">
            <div class="col-md-11">
                <div class='row product-list'>
                    <!-- here products will be inserted by products.js -->
                </div>
            </div>
        </div>
  </div>
</div>
    
    <div id="product-template" style="display: none;">
        <div class="col-sm-4 col-lg-4 col-md-4">
            <div class="thumbnail">
                <div class="thumbnail-container" style="height: 150px;">
                    <a href="../product/product.php?productID=${productID}">
                        <img class="thumbnail-image" src="../../img/product/${imagename || 'noimage.png'}" alt="$imagename">
                    </a>
                </div>
                <div class="caption">
                    <h4 class="pull-right">€ ${price}</h4>
                    <h4>
                        <a href="../product/product.php?productID=${productID}">${name}</a>
                    </h4>
                    <div class="product-description thumbnail-text">${description}</div>
                </div>
            </div>
        </div>
    </div>
    
<!------------------------------------------------------------------------------------ -->
<?php include_once('../components/footer.php');?>
