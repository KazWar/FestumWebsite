function LoadProducts() {
    // check if filtering by product type, add type to URL
    let type = getQueryParameter("type")
    let url = "../../api/products.php" + (type ? `?type=${type}` : "")
    fetch(url)                   // fetch HTTP response from the specified URL
       .then(response => response.json())   // Parse the received response as JSON
       .then(products => {                  // ... and do something with our articles
            DisplayProducts(products)
       });
}

function LoadItemTypes() {
    fetch("../../api/itemtypes.php")               
       .then(response => response.json())  
       .then(itemtypes => {                 
            DisplayItemTypes(itemtypes)
       });
}


function DisplayProducts(products) {
    let container = document.querySelector(".product-list")
    let template = document.querySelector('#product-template').innerHTML
    if (products) {
        for (let product of products) {
           DisplayProduct(product, container, template)
       }
    }
    document.querySelector('#product-template').innerHTML = '';
}


function DisplayProduct(product, container, template) {
    if (product && container && template) {
        template = template
                    .replaceAll('$productID', product.productID)
                    .replaceAll('$productName', product.name)
                    .replaceAll('$productDescription', product.description)
                    .replaceAll('$productPrice', product.price)
        if (product.imagename)
           template = template.replace('noimage.png', product.imagename)
        let item = document.createElement('div')
        item.className = 'container'
        item.innerHTML = template
        container.appendChild(item)        
    }
}


function DisplayItemTypes(itemtypes) {
    let container = document.querySelector('.list-group')
    if (itemtypes) {
        for (let itemtype of itemtypes) {
            let link = document.createElement('a')
            link.className = 'list-group-item'
            link.setAttribute('href', `products.php?type=${itemtype.id}`)
            link.innerText = itemtype.name
            container.appendChild(link)
        }
    }
}


window.addEventListener("load", () => {
   LoadProducts()
   LoadItemTypes()
});