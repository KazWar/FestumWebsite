function LoadTickets() {
    fetch("../../api/tickets.php", { credentials: 'include'})                   // fetch HTTP response from the specified URL
       .then(response => response.json())   // Parse the received response as JSON
       .then(tickets => {                  // ... and do something with our articles
            AddComponents(
                    {
                        tag: "div",
                        className: "container",
                        template: "#ticket-template"
                    },
                    ".product-list",
                    tickets);
       });
}

function AddToCart(productID) {
    let amount = document.querySelector(`#amount${productID}`).value;
    let url = `../../api/cart-add.php?productID=${productID}&amount=${amount}`;
    fetch(url, { credentials: 'include'})
        .then(response => response.json())
        .then(result => {
           if (result.ok) {
               console.log(`ticket ${productID} added to cart`);
           }; 
        })
        .then(result => {
          window.location = '../tickets/tickets.php';
      });
}

window.addEventListener("load", () => {
   LoadTickets();
});