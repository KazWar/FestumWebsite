<?php 
include_once('../components/header.php');
$PageTitle = "Checkout";

function ScriptsAndStyles(){ ?> 
    <script src="checkout.js"></script>    
<?php }?>
<!------------------------------------------------------------------------------------ -->

<div id="order-details" class="container">
    <div class="bg-faded p-4 my-4">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Payment Selection
                </h1>
                The total value of your order is ${total} EUR.
            </div>
        </div>
        <button onclick="SubmitOrder()">
            Submit order
        </button>
    </div>
</div>

<div id="mail" style="display:none">
    <style>
        #mail-header {
            font-size: 18px;
        }
        th {
            background-color: #F0F0F0;
            padding: 4px;
            border-bottom: solid gray 1px;
        }
        
        td {
            padding: 4px;
        }
    </style>
    <div id="mail-header">
        Total value: <b>${total}</b> EUR
    </div>

    <table id="mail-products">
        <tr>
            <th>
                Product
            </th>
            <th>
                Amount
            </th>
            <th>
                Price
            </th>
            <th>
                Value
            </th>
        </tr>
        <tr id="mail-product-template" style="display:none">
            <td>
                ${name}
            </td>
            <td>
                ${amount}
            </th>
            <td>
                ${price}
            </td>
            <td>
                ${total}
            </td>
        </tr>
    </table>
    </div>

<?php include_once('../components/footer.php');?>
