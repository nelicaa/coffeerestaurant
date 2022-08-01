<?php session_start();
require_once "models/functions.php";

?>
<body><?php
if(isset($_SESSION['ulogovan'])): ?>
    <input type="hidden" id="idUlogovan" value="<?=$_SESSION['ulogovan']->idKor?>"/><?php
endif;?>
    <div class="col-md-10 col-lg-6 col-sm-11" id="log">
    <a href="#"><h2><span class=" d-flex justify-content-end scale icon icon-close"></span></h2></a>
    <form class="d-flex flex-column align-items-center justify-content-around" action="#" enctype="multipart/form-data" method="POST" class="contact-form">
    <?php
    include_once "views/site/fixed/login.php";
    include_once "views/site/fixed/registracija.php";
  ?>
     </form>
    </div>
<div id="layer">
    <nav class="navbar navbar-expand-xl navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.php">Coffee<small>&restaurant</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
    <?php
    if(isset($_SESSION['ulogovan'])){
        $uloga=$_SESSION['ulogovan']->IdUloga;
    }
    else{
        $uloga="3"; //unauthorized
    }

    // $meni=sve("meni");
    $meni=upitWhereVise("meni","idRod",["10"]);
        foreach($meni as $m):
        if($m->naziv=="Admin panel" && $uloga!="2"){continue;}
        if(( $m->naziv=="Shop" || $m->naziv=="Cart") && $uloga=="3"){continue;}
        if($m->naziv=="Cart"):?>
                 <li class="nav-item cart"><a href="index.php?page=<?=$m->naziv?>" class="nav-link"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small id="korpaPlus">0</small></span></a></li>
<?php else: ?>
    <li class="nav-item active"><a href="index.php?page=<?=$m->naziv?>" class="nav-link"><?=$m->naziv?></a></li> 

<?php endif;?>


    <?php endforeach; ?>
    <li class="nav-item active"><a href="dokumentacija.pdf" target="_blank" class="nav-link">Docs</a></li> 
    
    <?php if(isset($_SESSION['ulogovan'])):?>
                 <li class="nav-item logout"><a href="#" class="nav-link pl-3"><span class="icon icon-person"></span>Log out</a></li>
                 <?php else:?>
                    <li class="nav-item log"><a href="#" class="nav-link pl-3"><span class="icon icon-person"></span>Login</a></li>
                 <?php endif;?>
        
            </ul>
        </div>
    </div>
    </nav>
    <section class="home-slider owl-carousel">
<div class="slider-item" style="background-image: url(assets/images/bg_1.jpg);">
<div class="overlay"></div>
<div class="container">
<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
<div class="col-md-8 col-sm-12 text-center ftco-animate">
<span class="subheading">Welcome to the</span>
<h1 class="mb-4"><?php echo prikazTxt("Name",'infoRestaurant.txt');?></h1>
 <p class="mb-4 mb-md-5"><?php echo prikazTxt("About","infoRestaurant.txt"); ?></p>
<p><a href="index.php?page=Shop" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="index.php?page=Menu" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
</div>
</div>
</div>
</div>
</section>
<section class="ftco-intro">
<div class="container-wrap">
<div class="wrap d-flex">
<div class="info container-fluid col-12">
<div class="d-flex flex-xl-row flex-column flex-wrap align-items-center no-gutters">
<div class="col-md-4 d-flex ftco-animate">
<div class="icon"><span class="icon-phone"></span></div>
<div class="text">
<h3>Phone number:</h3>
<p><?php echo prikazTxt("Phone","infoRestaurant.txt"); ?></p>
</div>
</div>
<div class="col-md-4 d-flex ftco-animate">
<div class="icon"><span class="icon-my_location"></span></div>
<div class="text">
<h3>Address</h3>
<p> <?php echo prikazTxt("Address","infoRestaurant.txt"); ?></p>
</div>
</div>
<div class="col-md-4 d-flex ftco-animate">
<div class="icon"><span class="icon-clock-o"></span></div>
<div class="text">
<h3>Open: <?php echo prikazTxt("OpenDays","infoRestaurant.txt"); ?></h3>
<p>from <?php echo prikazTxt("OpenHours","infoRestaurant.txt"); ?></p>
</div>
</div>
</div></div>
        </div>
        </div>
</section>
