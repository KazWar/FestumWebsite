function LoadComments() {
    fetch("../api/comments.php")                   // fetch HTTP response from the specified URL
       .then(response => response.json())   // Parse the received response as JSON
       .then(articles => {                  // ... and do something with our articles
            DisplayNews(comments)
       });
}


window.addEventListener("load", () => {
   LoadComments()
});