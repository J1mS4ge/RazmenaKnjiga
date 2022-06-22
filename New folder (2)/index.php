<?php
include_once("controller/Controller.php");
$controller = new Controller();
$controller->invoke();


session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);
$users = getData($con);
$user_images = getDataImg($con);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">hello, <?php echo $user_data['user_name'];?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>

<h1>Index page</h1>

<br>

<section id="users-list">
    <div class="container-fluid">

        <!-- owl carousel -->
            <div class="row">

                    <?php foreach ($users as $item) { ?>
                    <div class="col-md-3 col-sm-1">
                        <div class="card bg-dark text-light" style="width: 18rem;">
                            <img src="<?php echo $item['slika'] ?? "assets/1.jpg"; ?>" class="rounded-circle" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo  $item['user_name'] ?? "Unknown";  ?></h5>
                                <p class="card-text"><?php echo  $item['produzeni_opis'] ?? "Unknown";  ?></p>
                                <p class="card-text"><small class="text-muted"><?php echo  $item['kratak_opis'] ?? "Unknown";  ?></small></p>
                                <div class="owl-carousel owl-theme">
                                    <?php foreach ($user_images as $item1) { if($item1['user_id'] === $item['user_id']){?>
                                        <img src="<?php echo $item1['user_images'] ?? "assets/1.jpg"; ?>" class="card-img-top" alt="...">
                                    <?php }} // closing foreach function ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } // closing foreach function ?>

            </div>


            </div>
            <!-- !owl carousel -->

</section>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>
<script src="index.js"></script>
</body>
</html>
