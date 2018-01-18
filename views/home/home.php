<?php 
$PageTitle = "Welcome";

function ScriptsAndStyles(){ ?>

<?php }

include_once('../components/header.php');?>

<div class="container">
  <div class="bg-faded p-4 my-4">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img class="d-block img-fluid w-100" src="../../img/music.jpg" alt="">
          <div class="carousel-caption d-none d-md-block">
            <h3 class="text-shadow">Amazing music</h3>
            <p class="text-shadow">Hear the newest and most popular music of the year.</p>
          </div>
        </div>
        <div class="carousel-item">
            <img class="d-block img-fluid w-100" src="../../img/organization.jpg" alt="">
          <div class="carousel-caption d-none d-md-block">
            <h3 class="text-shadow">Great atmosphere</h3>
            <p class="text-shadow">Lorem Ipsum dolor sit amet.</p>
          </div>
        </div>
        <div class="carousel-item">
            <img class="d-block img-fluid w-100" src="../../img/musician2.jpg" alt="">
          <div class="carousel-caption d-none d-md-block">
            <h3 class="text-shadow">Popular artists</h3>
            <p class="text-shadow">Get to see and meet your most favorite musicians.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <div class="text-center mt-4">
      <div class="text-heading text-muted text-lg">Welcome To</div>
      <h1 class="my-2">Festum's Music Festival</h1>
      <div class="text-heading text-muted text-lg">sponsored by
        <strong> Andre Postma</strong>
      </div>
    </div>
  </div>

  <div class=" bg-faded p-4 my-4">
    <hr class="divider">
    <h2 class="text-center text-lg text-uppercase my-0">A <strong>MUST</strong> visit event!</h2>
    <hr class="divider">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam soluta dolore voluptatem, deleniti dignissimos excepturi veritatis cum hic sunt perferendis ipsum perspiciatis nam officiis sequi atque enim ut! Velit, consectetur.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam pariatur perspiciatis reprehenderit illo et vitae iste provident debitis quos corporis saepe deserunt ad, officia, minima natus molestias assumenda nisi velit?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit totam libero expedita magni est delectus pariatur aut, aperiam eveniet velit cum possimus, autem voluptas. Eum qui ut quasi voluptate blanditiis?</p>
  </div>
</div>

<?php include_once('../components/footer.php');?>
