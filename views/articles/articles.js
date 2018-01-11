function LoadArticles() {
    fetch("../../api/articles.php")         // fetch HTTP response from the specified URL
       .then(response => response.json())   // Parse the received response as JSON
       .then(articles => {                  // ... and do something with our articles
            DisplayArticles(articles)
       });
}


function DisplayArticles(articles) {
    let container = document.querySelector("#ArticleList")
    let template = document.querySelector('#article-template').innerHTML
    if (articles) {
        for (let article of articles) {
            DisplayArticle(article, container, template)
        }
    }
    document.querySelector('#article-template').innerHTML = ''
}


function DisplayArticle(article, container, template) {
    if (article && container && template) {
        template = template
                    .replace('$articleTitle', article.title)
                    .replace('$articleDate', article.date.substring(0,10))
                    .replace('$articleDescription', article.content)
        let item = document.createElement('div')
        item.className = 'container'
        item.innerHTML = template
        container.appendChild(item)        
    }
}

window.addEventListener("load", () => {
   LoadArticles()
});