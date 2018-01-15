function LoadProducts() {
    // check if filtering by product type, add type to URL
    let type = getQueryParameter("type")
    let url = "../../api/products.php" + (type ? `?type=${type}` : "")
    fetch(url)                   // fetch HTTP response from the specified URL
       .then(response => response.json())   // Parse the received response as JSON
       .then(products => {                  // ... and do something with our articles
            AddComponents(
                    {
                        tag: "div",
                        className: "container",
                        template: "#product-template"
                    },
                    ".product-list",
                    products)
       });
}

function LoadItemTypes() {
    fetch("../../api/itemtypes.php")               
       .then(response => response.json())  
       .then(itemtypes => {                 
            AddComponents({
                tag: "div",
                className: "list-group-item",
                template: "<a href='products.php?type=${id}'>${name}</a>"
            },
            '.list-group',
            itemtypes)
       });
}


window.addEventListener("load", () => {
   LoadProducts()
   LoadItemTypes()
});
