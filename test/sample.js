let sampleArticles = [
    {
        "recordID": 1,
        "articleID": 2,
        "title": "Yo!",
        "content": "Wasup?",
        "date": "2017-01-19 11:22:22"
    },
    {
        "recordID": 2,
        "articleID": 21,
        "title": "Hi!",
        "content": "What is your favourite color?",
        "date": "2017-01-19 11:22:22"
    }
];

function LoadArticles() {
    DisplayArticles(sampleArticles)
}


function DisplayArticles(articles) {
    AddComponents(
        {
            tag: "div",
            className: "container",
            template: '#article-template'
            //template: '<div>${title}</div>'
        },
        "#ArticleList", articles);
}

window.addEventListener("load", () => {
   LoadArticles()
});