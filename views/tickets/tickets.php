<?php 
$PageTitle = "Tickets";

function ScriptsAndStyles(){ ?>
<script src="tickets.js" type="text/javascript"></script>
<link href="tickets.css" rel="stylesheet" type="text/css"/>
<?php }

include_once('../components/header.php');?>

<div class="container" style="margin-top: 40px;">
    <!--<div class="row">-->
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
            <span class="input-group-btn pull-right">
                <button id="modal_trigger" onclick="openTicketForm('${name}', ${productID})" style='width: 125px; height: 75px;' 
                        class='btn btn-outline-dark mr-4 d-none d-lg-block' >Buy Ticket</button>
            </span>
        <p>${description}</p>
        <p>Price: &euro; ${price}</p>
    </div>
</div>
        
<div class="container">
    <div id="ticketDialog" class="popupContainer">
        <div class="user_login">
            <h2>Ticket: ${ticketName}</h2>
            <div class="checkbox">
                <input name="isOtherOwner" type="checkbox"/>
                <label for="isOtherOwner">This ticket is for someone else</label>
            </div>

            <div class="inputs">
                <label>First Name</label>
                <input name="firstName" type="text"/>
                <br/>

                <label>Last Name</label>
                <input name="lastName" type="text"/>
                <br/>

                <label>Email</label>
                <input name="email" type="email"/>
                <br/>
            </div>


            <div class="action_btns">
                <div class="one_half last">
                    <button onclick="addToCart(${ticketID})" class="btn">
                        Add ticket
                    </button>
                    <button onclick="closeTicketForm()" class="btn">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div id="ticketAddedDialog" class="popupContainer">
        <div class="user_login">
            <h2>Ticket has been added to cart</h2>
        </div>
    </div>
</div>

<div id="lean_overlay"></div>


<?php include_once('../components/footer.php');?>
