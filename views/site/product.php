
<section class="ftco-section">
<?php 
$id=$_GET['id'];
$jelo=jeloKat("jelo.idJelo",[$id],"");
foreach($jelo as $j):

?>
<div class="container">
<div class="row">
<div class="col-lg-6 mb-5 ftco-animate">
<a href="#" class="image-popup"><img src="assets/images/food_original/original_<?=$j->src?>" class="img-fluid" alt="<?=$j->naziv?>"></a>
</div>
<div class="col-lg-6 product-details pl-md-5 ftco-animate">
<h3><?=$j->naziv?></h3>
<p class="price" id="iznos"><span ><?=$j->iznos?> din</span></p>
<input type="hidden" value="<?=$j->iznos?>" class="cenaKorpa"/>
<p><?=$j->opis?></p>
<div class="row mt-4">
<div class="col-md-6">
<div class="form-group d-flex">
<div class="select-wrap">
<div class="icon"><span class="ion-ios-arrow-down"></span></div>

<select name="" data-id="<?=$j->idJelo?>" id="prikazCeneZaKolicinu" class="idKJ form-control">


<?php
// $kolicina=spajanjeJedanWhereJedanRed("kolicina","kolicina_jelo",[$j->idKJ],"idKol","idKol","idKJ");
// $sveKolicine=spajanje3tabele1WhereViseRedova("jelo","kolicina_jelo","idJelo","kolicina","idKol","idJelo",[$j->idJelo]);
$sveKolicine=kolicinaCenaJelo([$j->idJelo]);
if(count($sveKolicine)==0){ echo "No product";}
foreach($sveKolicine as $k):
if($k->kolicina==$kolicina->kolicina):
?>
<option value="<?=$k->idKJ?>" selected><?=$k->kolicina?></option>
 <?php else:?>
<option value="<?=$k->idKJ?>"><?=$k->kolicina?></option>
  <?php
endif; endforeach; ?>
</select>
</div>
</div>
</div>
<div class="w-100"></div>
<div class="input-group col-md-6 d-flex mb-3">
<span class="input-group-btn mr-2">
<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
<i class="icon-minus"></i>
</button>
</span>
<input type="text" id="quantity" name="quantity" class="form-control input-number quantity" value="1" min="1" max="100">
<span class="input-group-btn ml-2">
<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
<i class="icon-plus"></i>
</button>
</span>
</div>
</div>
<p><a href="#" data-jedan="true" data-slika="<?=$j->src?>" data-naziv="<?=$j->naziv?>" class="btn btn-primary py-3 px-5 korpa">Add to Cart</a></p>
</div>
</div>
</div>
<?php endforeach; ?>
</section>
