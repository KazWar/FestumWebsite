function LoadProduct() {
    fetch("../api/product.php")                   // fetch HTTP response from the specified URL
       .then(response => response.json())   // Parse the received response as JSON
       .then(product => {                  // ... and do something with our articles
            DisplayNews(product)
       });
}

window.addEventListener("load", () => {
   LoadProduct()
});