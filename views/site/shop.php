<section class="ftco-menu">
<div class="container">
<div class="row d-md-flex">
<div class="form-group container-fluid d-flex justify-content-end product-details pl-md-5 ftco-animate">
<div class="select-wrap">
<select name="" id="sort" class="form-control ">
<option value="0">Order by</option>
<option value="date">Order by newest</option>
<option value="iznos">Order by price(low to high)</option>
<option value="iznos_DESC">Order by price(high to low)</option>

</select>
</div></div>
<div class="col-lg-12 m-auto ftco-animate p-md-5">
    
<div class="row">


<!-- GLAVNE KATEGROIJE -->
<div class="container-fluid d-flex flex-column nav-link-wrap mb-5">
    
<div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    
<a class="nav-link filterKat" href="index.php?index.php?page=Shop" data-kat="all" data-toggle="pill" role="tab"  aria-controls="v-pills-0"  aria-selected="true">All</a>
<?php 
    $glavneKat= upitWhereVise("kategorije","idRod",["0"]);
    foreach($glavneKat as $k):
?>
<a class="nav-link filterKat" href="#" data-kat="<?=$k->idKat?>" data-toggle="pill" role="tab"  aria-controls="v-pills-0"  aria-selected="true"><?=$k->naziv?></a>
<?php endforeach;?>

</div>

<div class="nav ftco-animate nav-pills justify-content-center mt-2"role="tablist" aria-orientation="vertical">

    <ul id="idRoditelj">
        <!-- <li class="nav-link"><a href="#">Klik</a></li> -->
    </ul>
    
</div>

</div>



<div class="d-flex flex-column flex-lg-row">
<div class="sidebar-box ftco-animate fadeInUp ftco-animated">
<div class="mb-1">
<label for="customRange1" class="form-control-range"><h3>Price</h3></label>
<input type="range" max="5000" min="0" class="custom-range" id="customRange1">
<p class="justify-content-center d-flex" id="range"></p>
</div>
<h3 class="mt-2">Tags</h3>
<div class="tagcloud col-12 d-flex flex-column">

<?php 
$tags=sve("podkategorije");
foreach($tags as $t):
?>
<a href="#" data-form="podKat<?=$t->idPodKat?>" class="tag-cloud-link"><?=$t->naziv?></a>
<?php endforeach;?>
</div>
</div>



<div class="col-lg-9 col-xl-11 d-flex">
<div class="tab-content ftco-animate" id="v-pills-tabContent">
<div class="tab-pane fade show active" id="v-pills-0" role="tabpanel" aria-labelledby="v-pills-0-tab">
<div class="row flex-wrap d-flex" id="jela">

</div>
</div>
<div class="container-fluid col-10 m-auto">
        <ul id="pagination" class="pagination d-flex  justify-content-center m-5">
        </ul>
</div>
</div>

</div>

</section>
