let Cart = null;

function LoadCart() {
    fetch(`../../api/cart.php`, { credentials: 'include'})  // fetch HTTP response from the specified URL, pass session as well!
       .then(response => response.json())  // Parse the received response as JSON
       .then(cart => {                  // ... and do something with our articles
            if (cart && cart.session) {
                Cart = cart;
                
                // Populate the screen with cart details
                PopulateComponent("#order-details", Cart)
                
                // Populate the e-mail template with cart details
                PopulateComponent("#mail-header", Cart)
                AddComponents({
                        tag: "tr",
                        template: "#mail-product-template"
                }, 
                "#mail-products",
                Cart.products)
                }
       })
       .catch(error => {
           console.error(error);
       });
}


function SubmitOrder() {
    if (Cart) {
        // generate QR code
        fetch('../../api/user-qrcode.php', { credentials: 'include' })
            .then(response => response.json())
            .then(result => {
                if (result && result.ok) {
                    MailOrder(result.filepath);
                }
            })
    }    
}


function MailOrder(qrcodefile) {
  let body = document.querySelector("#mail").innerHTML;
  let form = new FormData();
  form.set("subject", "Order details");
  form.set("body", body);
  form.set("attachment", qrcodefile);
  fetch('../../api/mail-send.php', { method: 'POST', body: form, credentials: 'include' })
      .then(response => response.json())
      .then(result => {
          window.location = 'ordersubmitted.php';
      });    
}



window.addEventListener("load", () => {
   // Load the cart content and render the UI
   LoadCart();
});