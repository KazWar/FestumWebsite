<?php 
include_once('../components/header.php');
$PageTitle = "Camping Site Selection";

function ScriptsAndStyles(){ ?>
    <link href="../../css/webshopcart.css" rel="stylesheet" type="text/css"/>
    <script src="../campingsite/campingsite.js"></script>    
    <script src="cart.js"></script>    
<?php }?>
<!------------------------------------------------------------------------------------ -->

<div id="NoCart" class="jumbotron" style="text-align:center; display: none;">
    <h2>You are not logged in.</h2>
</div>

<div id="Cart" class="container bg-faded my-3" style="display: none;">
    <table id="CartTable" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        
        <tbody id="Products">
        </tbody>
        
    </table>
</div>

<table style="display:none;">  
    <tr id="product-template">
        <td data-th='Product'>
            <div class='row'>
                <div class='col-sm-2 hidden-xs'><img src='http://placehold.it/100x100' alt='...' class='img-responsive'/></div>
                <div class='col-sm-10'>
                    <h4 class='nomargin'>${name}</h4>
                    <h5>${ownerName}</h5>
                </div>
            </div>
        </td>
        <td data-th='Price'>${price}</td>
        <td data-th='Quantity'>
            <input id='amount${recordID}' type='number' class='form-control text-center' value='${amount}'>
        </td>
        <td data-th='Subtotal' class='text-center'>&#8364; ${total}</td>
        <td class='actions' data-th=''>
            <button onclick='UpdateOrderLine(${recordID})'class='btn btn-info btn-sm'><i class='fa fa-refresh'></i></button>
            <button onclick='RemoveOrderLine(${recordID})' class='btn btn-danger btn-sm'><i class='fa fa-trash-o'></i></button>								
        </td>
    </tr>
</table>

<table style="display:none">
    <tfoot id="footer-template">
        <tr class='visible-xs'>
            <td class='text-center'><strong>${products.length} product(s) in the cart</strong></td>
        </tr>
        <tr class='visible-xs'>
            <td class='text-center'><strong>Total price &#8364;${total}</strong></td>
            <td colspan='4' class='text-right' style="display:none" id="campingSelector">
                <label>
                    <strong>camping reservation?</strong>
                </label>
            </td>
            <td>
                <input class="form-check-input" type="checkbox" value="yes" id="cbCampingReservation">
            </td>
        </tr>
        <tr>
            <td><a href='products.php' class='btn btn-warning'><i class='fa fa-angle-left'></i> Continue Shopping</a></td>
            <td colspan='2' class='hidden-xs'></td>
            <td class='hidden-xs text-center'></td>
            <td>
                <button id="checkOutButton" onclick="checkOutSelection()" class='btn btn-success btn-block'>Checkout <i class='fa fa-angle-right'></i></button>
            </td>
        </tr>
    </tfoot>
</table>

<!------------------------------------------------------------------------------------ -->
<?php include_once('../components/footer.php');?>
