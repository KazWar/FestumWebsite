function LoadCart() {
    fetch(`../../api/cart.php`, { credentials: 'include'})  // fetch HTTP response from the specified URL, pass session as well!
       .then(response => response.json())  // Parse the received response as JSON
       .then(cart => {                  // ... and do something with our articles
            if (cart && cart.session) {
                
                // Add products
                AddComponents(
                {
                    tag: "tr",
                    template: "#product-template"
                }, 
                "#Products", cart.products);
                
                // Add footer
                AddComponent(
                {
                    tag: "tfoot",
                    template: "#footer-template",
                    id: "Footer"
                },
                "#CartTable", cart);
                
                cart.hasTickets = cart.products.some(product => product.type === "ticket");
                
                // Reveal the cart                
                document.querySelector("#Cart").style.display = "block";
                // Reveal the camping selector if tickets in cart
                if (cart.hasTickets) {
                    document.querySelector("#campingSelector").style.display = "block";
                }
            }
            else {
                document.querySelector("#NoCart").style.display = "block";
            }
       })
       .catch(error => {
           console.error(error);
       });
}


function ReloadCart() {
    document.querySelector('#Products').innerHTML = '';
    document.querySelector('#Footer').remove();
    LoadCart();
}


function RemoveOrderLine(recordID) {
    let url = `../../api/cart-remove.php?recordID=${recordID}`;
    fetch(url, { credentials: 'include'})
        .then(response => response.json())
        .then(result => {
           if (result.ok) {
               ReloadCart();
           } 
        });
}


function UpdateOrderLine(recordId) {
    let amount = document.querySelector(`#amount${recordId}`).value;
    let url = `../../api/cart-update.php?recordID=${recordId}&amount=${amount}`;
    fetch(url, { credentials: 'include'})
        .then(response => response.json())
        .then(result => {
           if (result.ok) {
                ReloadCart();
           } 
        });
}

function checkOutSelection() {
    let selection = document.querySelector(`#cbCampingReservation`).checked;
    if (selection === true) {
          window.location = '../campingsite/campingsite.php';
    } else {
        
          window.location = '../checkout/checkout.php';
    }
}

window.addEventListener("load", () => {
   // check if camping site was selected
   let campingSite = getSelectedCampingSite()
   console.log(campingSite ? `Camping site ${campingSite} selected` : 'No camping site selected')
   // Load the cart content and render the UI
   LoadCart();
});