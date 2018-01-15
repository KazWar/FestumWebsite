function LoadArticles() {
    fetch("../../api/articles.php", { credentials: 'include'}) // fetch HTTP response from the specified URL, pass session as well!
       .then(response => response.json())   // Parse the received response as JSON
       .then(articles => {                  // ... and do something with our articles
                AddComponents(
                   {
                       tag: "div",
                       className: "container",
                       template: "#article-template"
                   }, 
                   "#ArticleList",
                   articles)
       });
}


window.addEventListener("load", () => {
   LoadArticles()
});