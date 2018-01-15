let View = {
    Product: null,
    Loading: null,
    LoadingFailed: null
};

function LoadProduct() {
    ShowLoading();
    let productID = getQueryParameter("productID");
    fetch(`../../api/product.php?productID=${productID}`, { credentials: 'include'})  // fetch HTTP response from the specified URL, pass session as well!
       .then(response => response.json())  // Parse the received response as JSON
       .then(product => {                  // ... and do something with our articles
            if (product) {
                PopulateComponent("#Product", product);
                ShowProduct();
            }
            else {
                ShowFailed();
            }
       })
       .catch(error => {
           console.error(error);
           ShowFailed();
       });
}


function ShowLoading() {
    View.ProductLoading.style.display = "block";
    View.Product.style.display = "none";
    View.ProductLoadingFailed.style.display = "none";
}


function ShowProduct() {
    View.ProductLoading.style.display = "none";
    View.Product.style.display = "block";
    View.ProductLoadingFailed.style.display = "none";
}


function ShowFailed() {
    View.ProductLoading.style.display = "none";
    View.Product.style.display = "none";
    View.ProductLoadingFailed.style.display = "block";
}


function AddToCart(productID) {
    let amount = document.querySelector(`#amount${productID}`).value;
    let url = `../../api/cart-add.php?productID=${productID}&amount=${amount}`;
    fetch(url, { credentials: 'include'})
        .then(response => response.json())
        .then(result => {
           if (result.ok) {
               console.log(`Product ${productID} added to cart`);
           } 
        });
}


window.addEventListener("load", () => {
    View.Product = document.querySelector("#Product");
    View.ProductLoading = document.querySelector("#ProductLoading");
    View.ProductLoadingFailed = document.querySelector("#ProductLoadingFailed");
    LoadProduct();
});