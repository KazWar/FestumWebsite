<html>
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    </head>
<body>
    <div class="jumbotron" style="text-align:center;">
        <h1>Log Out Successful</h1>
        <?php
        session_start();
        session_destroy();
        header( "Refresh:0; url=home.php");
        ?>
    </div>
</body>
</html>