
<?php 
session_start(); 
if(isset($_SESSION['ulogovan']) && $_SESSION['ulogovan']->IdUloga==2){
require_once "models/functions.php";

?>

<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar">
  <!-- Overlays -->
  <div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>
  <div class="ms-aside-overlay ms-overlay-right ms-toggler" data-target="#ms-recent-activity" data-toggle="slideRight"></div>
  <!-- Sidebar Navigation Left -->
  <aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
    <!-- Logo -->
    <div class="logo-sn ms-d-block-lg">
      <a class="pl-0 ml-0 text-center" href="index-2.html">
        <img src="assets/images/logo.png" alt="logo">
      </a>
    </div>
    <!-- Navigation -->
    <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
      <!-- Dashboard -->
      <?php
    $meni=upitWhereVise("meni","idRod",["11"]);
    $fafa=["dashboard","add","list","info","visibility","list","list","list","people","list","list"];
    $brojac=0;
        foreach($meni as $m):?>
         <li class="menu-item">
        <a  href="index.php?page=Admin%20panel&admin=<?=$m->naziv?>"> <span><i class="material-icons"><?=$fafa[$brojac];?></i><?=$m->naziv?></span>
        </a>
      </li>
    <?php $brojac++; endforeach;?>
    <li class="menu-item">
        <a  href="index.php?"> <span><i class="material-icons">arrow_back</i>Nazad na sajt</span>
        </a>
      </li>
  </aside>
  <!-- Main Content -->
  <main class="body-content">
    <!-- Navigation Bar -->
    <nav class="navbar ms-navbar">
      <div class="ms-aside-toggler ms-toggler pl-0" data-target="#ms-side-nav" data-toggle="slideLeft"> <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
      </div>
      <div class="logo-sn logo-sm ms-d-block-sm">
        <a class="pl-0 ml-0 text-center navbar-brand mr-0" href="index.php?page=Admin panel"><img src="assets/images/logo.png" alt="logo"> </a>
      </div>
      <ul class="ms-nav-list ms-inline mb-0" id="ms-nav-options">
        <!-- <li class="ms-nav-item ms-search-form pb-0 py-0">
          <form class="ms-form" method="post">
            <div class="ms-form-group my-0 mb-0 has-icon fs-14">
              <input type="search" class="ms-form-input" name="search" placeholder="Search here..." value=""> <i class="flaticon-search text-disabled"></i>
            </div>
          </form>
        </li> -->
        </li>
        <li class="ms-nav-item ms-nav-user dropdown">
          <a href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="ms-user-img ms-img-round float-right" src="assets/images/users/<?php echo $_SESSION['ulogovan']->pic;?>" alt="people">
          </a>
          <ul class="dropdown-menu dropdown-menu-right user-dropdown" aria-labelledby="userDropdown">
            <li class="dropdown-menu-header">
              <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Welcome, <?php
              $user=$_SESSION['ulogovan'];
              echo $user->ime." ".$user->prezime;
              ?></span></h6>
            </li>
            <li class="dropdown-divider"></li>
            <li class="ms-dropdown-list">
              <a class="media fs-14 p-2" href="index.php?page=Admin%20panel&admin=profilePage"> <span><i class="flaticon-user mr-2"></i> Profile</span>
              </a>
            <li class="dropdown-menu-footer">
              <a class="media fs-14 p-2 logout" href="#"> <span><i class="flaticon-shut-down mr-2"></i> Logout</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
      <div class="ms-toggler ms-d-block-sm pr-0 ms-nav-toggler" data-toggle="slideDown" data-target="#ms-nav-options"> <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
      </div>
    </nav>
    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> <?php echo $_GET['page']; ?></a></li>
              <?php if(isset($_GET['admin'])): ?>
              <li class="breadcrumb-item active" aria-current="page"><?php echo $_GET['admin']; ?></li>
              <?php endif; ?>
            </ol>
          </nav>

          <!-- <div class="alert alert-success" role="alert">
            <strong>Well done!</strong> You successfully read this important alert message.
          </div> -->
        </div>
    <?php   } else{
        header("Location:404.php");
      }?>