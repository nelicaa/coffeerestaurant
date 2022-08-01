

<section class="ftco-section contact-section">
<div class="container mt-5">
<div class="row block-9">
<div class="col-md-4 contact-info ftco-animate">
<img class="img-fluid" src="assets/images/autor.jpg" alt="autor"/>
</div>
<div class="col-md-1"></div>
<div class="col-md-6 ftco-animate">
<div class="col-md-12">
<div class="form-group">
    <form action="models/downloadAutor.php" method="POST">
<small>Ime</small>
<p  name="aboutIme" class="form-control">Nelica</p>
<input type="hidden" name="aboutIme" value="Nelica"/>
</div>
<div class="form-group">
<small>Prezime</small>
<p  class="form-control">Stojadinovic</p>
<input type="hidden" name="aboutPrezime" value="Stojadinovic"/>

</div>
<div class="form-group">
<small>Datum rodjenja</small>
<p class="form-control" >30.06.1999.</p>
<input type="hidden"  name="aboutDatum" value="30.06.1999."/>

</div>
<div class="form-group">
<small>Srednja skola</small>
<p   class="form-control">Gimnazija Velika Plana</p>
<input type="hidden"  name="aboutSkola" value="Gimnazija Velika Plana"/>

</div>
</div>
<div class="d-flex flex-row justify-content-center">
<p class="col-9">Download info about author in word doc:</p>
<button type="submit" class="form-control" name="dugme" value="dugme" type="submit"><span class="icon h4 icon-file-word-o"></span></button>

</div>

<!-- <input type="submit" value="Click"/><span class="icon icon-file-word-o"></span> -->
</form>
</div>
</div>
</div>
</section>