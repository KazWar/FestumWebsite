<!doctype html>

<?php include('../../api/db.php'); 
            session_start();
            if (isset($_SESSION["loggedIn"]) == true && isset($_COOKIE["FestumCookie"]) == false) {
                setcookie("FestumCookie", $_SESSION["userID"], time()+432000);
                //Cookie is set for 5 days.
            }
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Festum Events <?= isset($PageTitle) ? "- " . $PageTitle : "" ?> </title>
    
    <!-- Bootstrap core JavaScript -->
    <script src="../../scripts/jquery.min.js"></script>
    <script src="../../scripts/bootstrap.bundle.min.js"></script>
    <script src="../../scripts/custom.js"></script>
    <script src="../../scripts/cookie.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.9.0/validator.min.js"> </script>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="../../css/business-casual.css" rel="stylesheet">
    <link href="../../css/custom.css" rel="stylesheet" type="text/css"/>  
    
    <!-- Indication for JavaScript code that user is logged in -->
    <script>
        let UserLoggedIn = <?php echo(isset($_SESSION["loggedIn"]) ? "true" : "false"); ?>;
    </script>
    
    <!-- Additional scripts and styles here -->
    <?php if (function_exists('ScriptsAndStyles')){
      ScriptsAndStyles();
    }?>
    
  </head>

  <body>
    <div class="tagline-upper text-center text-heading text-shadow text-white mt-5 d-none d-lg-block">Festum Music Event</div>
    <div class="tagline-lower text-center text-expanded text-shadow text-uppercase text-white mb-5 d-none d-lg-block">Eventstreet 123 | Eindhoven, DH 5533  </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-faded py-lg-4">
      <div class="container">
        <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item active px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="../home/home.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="../articles/articles.php">News</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="../products/products.php">Web shop</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="../tickets/tickets.php">Tickets</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="../contact/contact.php">Contact</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="../about/about.php">About</a>
            </li>
          </ul>
          <ul class="navbar-nav mx-auto">
            <?php if(isset($_SESSION["loggedIn"])) {
                echo "<form action='../../api/logout.php' method='post'>";
                echo "<div class='btn-group'>";
                echo "<button type='submit' class='btn btn-outline-secondary'>Log out</button>";
                echo "<a href='../cart/cart.php' name='cartButton' class='btn btn-outline-secondary'>Cart</a>";
                echo "</div>";
                echo "</form>";
            } else {
                echo '<button type="button" onclick="openLoginForm()" class="btn btn-outline-secondary">Log In</button>';
            }?>
           </ul>
        </div>
      </div>
    </nav>