<?php
if(isset($_SESSION['ulogovan'])){
    $email=$_SESSION['ulogovan']->email;
    $disabled="disabled";
}
else{
    $email="";
    $disabled="";
}
// var_dump($email);
 ?>

<section class="ftco-section contact-section">
<div class="container mt-5">
<div class="row block-9">
<div class="col-md-4 contact-info ftco-animate">
<div class="row">
<div class="col-md-12 mb-4">
<h2 class="h4">Contact Information</h2>
</div>
<div class="col-md-12 mb-3">
<p><span>Address: </span> <?php echo prikazTxt("Address","../data/infoRestaurant.txt");?></p>
</div>
<div class="col-md-12 mb-3">
<p><span>Phone: </span><?php echo prikazTxt("Phone","../data/infoRestaurant.txt");?></p>
</div>
<div class="col-md-12 mb-3">
<p><span>Email: </span><?php echo prikazTxt("Email","../data/infoRestaurant.txt");?></span></a></p>
</div>
<div class="col-md-12 mb-3">
<p><span>Website: </span> <a href="<?php echo prikazTxt("Website","../data/infoRestaurant.txt");?>"><?php echo prikazTxt("Website","../data/infoRestaurant.txt");?></a></p>
</div>
</div>
</div>
<div class="col-md-1"></div>
<div class="col-md-6 ftco-animate">
<form action="#" class="contact-form">
<div class="col-md-12">
<div class="form-group">
<input type="text" id="emailContact" class="form-control" value="<?=$email?>" placeholder="Your Email" <?=$disabled?>>
<small id="regPorukaEmail" class="d-none text-danger"></small>
</div>
</div>
<div class="form-group">
<input type="text" class="form-control" id="subject" placeholder="Subject">
<small id="regSubject" class="d-none text-danger"></small>

</div>
<div class="form-group">
<textarea id="message" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
<small id="regMessage" class="d-none text-danger"></small>

</div>
<div class="form-group">
<input type="submit" value="Send Message" id="contact" class="btn btn-primary py-3 px-5">
</div>
</form>
</div>
</div>
</div>
</section>