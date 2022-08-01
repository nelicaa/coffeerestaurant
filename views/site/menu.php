<section class="ftco-section">
<div class="container">
<div class="row">
<?php
$mainKat=upitWhereVise("kategorije","idRod",["0"]);
foreach($mainKat as $k):?>
<div class="col-md-6 mb-5 pb-3">
<h3 class="mb-1 heading-pricing ftco-animate"><?=$k->naziv?></h3>
<?php
$id=$k->idKat;
$parentId=upitWhereVise("kategorije","idRod",[$id]);
foreach($parentId as $p):
?>
<p class="ftco-animate">- <?=$p->naziv?></p></br>
<?php
$jela=jeloKat("jelo.idKat",[$p->idKat],"");
foreach($jela as $j):
    // var_dump($j);
if($j->deleted==1){continue;}
?>
<div class="pricing-entry d-flex ftco-animate">
<div class="img" style="background-image: url(assets/images/food_small/small_<?=$j->src?>);"></div>
<div class="desc pl-3">
<div class="d-flex text align-items-center">
<h3><span><?=$j->naziv?></span></h3>
</div>
<?php 
$cenaKolicina=kolicinaCenaJelo([$j->idJelo]);
foreach($cenaKolicina as $kc):
?>
<p class="price"><?= $kc->kolicina ?> <?=$kc->iznos?> din</p>
<?php  endforeach;?>
<div class="d-block">

</div>
</div>
</div>
<?php  endforeach; endforeach;?>
</div>
<?php endforeach;?>

</div>
</section> 
