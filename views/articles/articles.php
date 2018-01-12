<?php 
$PageTitle = "Articles";

function ScriptsAndStyles(){ ?>
    <script src="articles.js"></script>
    <link rel="stylesheet" href="articles.css">
<?php }

include_once('../components/header.php');?>

<div id="ArticleList">
</div>
    
<div id="article-template" style="display: none;">
    <div class='bg-faded p-3 my-4 text-center'>
      <div class='card card-inverse'>
          <img style='height: 200px;' class='card-img img-fluid w-100' src='../../img/newsSlide.jpg' alt=''>
        <div class='card-img-overlay bg-overlay'>
          <h2 class='card-title text-shadow text-white text-uppercase mb-0'>$articleTitle</h2>
          <h4 class='text-shadow text-white'>$articleDate</h4>
          <p class='lead card-text text-shadow text-white w-50 d-none d-lg-block'>$articleDescription</p>
          <a href='article.php?articleCode=$articleCode' class='btn btn-secondary'>Read More</a>
        </div>
      </div>
    </div>
</div>

<?php include_once('../components/footer.php');?>