<?php 
$PageTitle = "Tickets";

function ScriptsAndStyles(){ ?>
<script src="tickets.js" type="text/javascript"></script>
<link href="tickets.css" rel="stylesheet" type="text/css"/>
<?php }

include_once('../components/header.php');?>

<div class="container" style="margin-top: 40px;">
    <div class="row">
        <div class="col-md-12">
            <div class='row product-list'>
                
             </div>
        </div>
    </div>
</div>

<div id="ticket-template" style="display: none;">
    <div class='col-lg-12 bg-faded p-3 my-2'>
        <h2 class='text-center text-lg text-uppercase my-0'><strong>${name}</strong></h2>
        <hr class='divider'>
        <div id="input-group" class="input-group pull-right">
            <input type="text" id="amount${productID}" value="1">
            <span class="input-group-btn">
                <button style='width: 125px; height: 75px;' 
                        class='btn btn-outline-dark  mr-4 d-none d-lg-block' 
                        onclick="AddToCart(${productID})">Buy Ticket</button>
            </span>
        </div>
        <p>${description}</p>
        <p>Price: &euro; ${price}</p>
    </div>
</div>


<?php include_once('../components/footer.php');?>
