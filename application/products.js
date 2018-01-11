function LoadProducts() {
    fetch("../api/products.php")                   // fetch HTTP response from the specified URL
       .then(response => response.json())   // Parse the received response as JSON
       .then(products => {                  // ... and do something with our articles
            DisplayProducts(products)
       });
}

window.addEventListener("load", () => {
   LoadProducts();
});