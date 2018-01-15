<?php 
$PageTitle = "Product";

function ScriptsAndStyles(){ ?>
    <link href="product.css" rel="stylesheet" type="text/css"/>
    <script src="product.js"></script>
<?php }

include_once('../components/header.php');?>
    

<div id="ProductLoading" class="jumbotron" style="text-align:center;">
    <h2>Loading product ...</h2>
</div>

<div id="ProductLoadingFailed" class="jumbotron" style="text-align:center;">
    <h2>Cannot load the product.</h2>
</div>

    
 <div id="Product" class="container">
     <div class="bg-faded p-3 my-3">
        <div class="row">
            <div class="col-md-9">
                <div class="thumbnail">                               
                    <img id="productImage" class="img-responsive ${imagename ? '' : 'image-hidden'}" 
                         src="${imagename ? '../../img/product' + imagename : ''}" 
                         alt="${name}">       
                    <hr style="width:80%; ">
                    <div class="caption-full"> 
                        <table style="width: 100%">
                            <tr>
                                <td>
                                    <h4>${name}</h4>
                                </td>
                                <td class="pull-right">
                                    <h4 id="price" >&#8364; ${price} p.p</h4> 
                                </td>
                            </tr>
                        </table>
                        <div>
                            <p>${description}</p>  
                        </div>
                    </div>  
                    
                    <hr style="width:80%; ">
                    <div class="text-right btn-toolbar mb-3" role="toolbar">
                        <button 
                            onclick="AddToCart(${productID})"
                            class="btn btn-outline-success" aria-disabled="True"
                            data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                            <span translate="addtocart">Add to cart</span>
                        </button>
                        <div class="input-group">
                            <input type="text" id="amount${productID}" value="1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include_once('../components/footer.php');?>
