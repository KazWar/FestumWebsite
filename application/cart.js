function LoadCartProducts() {
    fetch("../api/cart.php")                   // fetch HTTP response from the specified URL
       .then(response => response.json())   // Parse the received response as JSON
       .then(products => {                  // ... and do something with our articles
            DisplayCartProducts(products)
       });
}

window.addEventListener("load", () => {
   LoadCartProducts()
});