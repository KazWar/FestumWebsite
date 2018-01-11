function LoadNews() {
    fetch("../api/news.php")                   // fetch HTTP response from the specified URL
       .then(response => response.json())   // Parse the received response as JSON
       .then(articles => {                  // ... and do something with our articles
            DisplayNews(articles)
       });
}


function DisplayNews(articles) {
    let container = document.querySelector("#ArticleList")
    if (articles) {
        for (let article of articles) {
            DisplayArticle(article, container)
        }
    }
}


function DisplayArticle(article, container) {
    if (article && container) {
        let item = document.createElement('li')
        let title = document.createElement('span')
        let date = document.createElement('span')
        let content = document.createElement('span')
        
        item.className = "article"
        
        title.className = "title"
        title.innerText = article.title
        
        date.className = "date"
        date.innerText = article.date.substring(0, 10)
        
        content.className = "content"
        content.innerText = article.content
        
        item.appendChild(title)
        item.appendChild(date)
        item.appendChild(content)
        container.appendChild(item)        
    }
}

window.addEventListener("load", () => {
   LoadNews()
});