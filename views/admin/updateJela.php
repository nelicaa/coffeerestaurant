<?php
ob_start();
if(isset($_GET['id'])):
$id=$_GET['id'];
$jelo=jelo(" AND jelo.idJelo=$id");
foreach($jelo as $j):
?>


<input type="hidden" value="<?=$id?>" id="id"/>

<div class="col-xl-12 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6><?php echo $_GET['admin']; ?></h6>
            </div>
            <div class="ms-panel-body">
              <form novalidate method="POST" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18">Product Name</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="updateJeloName" value="<?=$j->naziv?>" placeholder="Product Name">
                      <div class="invalid-feedback d-block">
                      <strong id="regupdateJeloName" class="d-none text-danger"></strong>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="validationCustom22">Select main category</label>
                    <div class="input-group">
                    <?php 
                    //  $mainKat=upitWhereVise("kategorije","idRod",[0]);
                    //  $katJela=upitWhere("kategorije","idKat",[$j->idKat]);
                    //  $mainKatjela=upitWhere("kategorije","idKat",[$katJela->idRod]);
                    //  var_dump($mainKatjela);
                    ?>
                      <select class="form-control" id="insertJeloKat1" required>
                          <?php
                         $mainKat=upitWhereVise("kategorije","idRod",[0]);
                          $katJela=upitWhere("kategorije","idKat",[$j->idKat]);
                          $mainKatjela=upitWhere("kategorije","idKat",[$katJela->idRod]);
                          foreach($mainKat as $k):
                          if($k->idKat==$mainKatjela->idKat):
                          $kat=$mainKatjela->idKat;?>
                            <option value="<?=$k->idKat?>" selected><?=$k->naziv?></option>
                          <?php else:?>
                            <option value="<?=$k->idKat?>"><?=$k->naziv?></option>
                        <?php endif; endforeach;  ?>

                      </select>
                      <div class="invalid-feedback d-block">
                      <strong id="regupdateJeloKat1" class="d-none text-danger"></strong>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom22">Select category type</label>
                    <div class="input-group">
                      <select class="form-control" id="insertJeloKat2" >
                      <?php 
        $svePodKat=upitWhereVise("kategorije","idRod",[$kat]);
        foreach($svePodKat as $k):
          if($k->idKat==$katJela->idKat):?>

                            <option value="<?=$k->idKat?>" selected><?=$k->naziv?></option>
                          <?php else:?>
                            <option value="<?=$k->idKat?>"><?=$k->naziv?></option>
                        <?php endif; endforeach;  ?>
                      </select>
                    </div>
                  </div>
                  <label>Tags and ingredients</label>
                                            <br />
                  <div class="col-md-12 mb-3 d-md-flex flex-wrap form-group">
                            <div id="divPodKat">               
                                            
                                <?php
                                $tags=sve("podkategorije");
                                $tagoviJela=upitWhereVise("jelo_podkat","idJelo",[$j->idJelo]);
                                $niz=[];
                                foreach($tagoviJela as $tj){
                                  array_push($niz,$tj->idPodKat);
                                }
                                foreach($tags as $t):
                                if(in_array($t->idPodKat,$niz)):
                                ?>
                                    
                                            <label class="custom-control col-3 custom-checkbox custom-control-inline">
                                                <input type="checkbox" value="<?=$t->idPodKat?>" class="custom-control-input updateJeloTagsChb" name="checkbox"
                                                     data-parsley-errors-container="#error-checkbox" checked>
                                                <span class="custom-control-label"><?=$t->naziv?></span>
                                            </label>
                                            <?php else:?>
                                              <label class="custom-control col-3 custom-checkbox custom-control-inline">
                                                <input type="checkbox" value="<?=$t->idPodKat?>" class="custom-control-input updateJeloTagsChb" name="checkbox"
                                                     data-parsley-errors-container="#error-checkbox">
                                                <span class="custom-control-label"><?=$t->naziv?></span>
                                              </label>
                                             <?php endif; endforeach;?></div>
                       <div class="invalid-feedback d-block">
                      <strong id="regupdateJeloTag" class="d-none text-danger"></strong>
                      </div>
                      <div class="border-top border-bottom p-3 col-md-9 flex-wrap d-flex mx-auto align-items-center justify-content-between">
                      <h6>No option that fits? Insert it  </h6>
            <button type="button" class="btn btn-primary mt-0" data-toggle="modal" data-target="#exampleModal">
            Insert
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Insert tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                    </button>
                </div>
                <div class="modal-body">
                <input type="text" class="form-control" id="insertTagVrednost" placeholder="Tag name">
                      <strong id="reginsertTag" class="d-none text-danger"></strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="insertTag" data-dismiss="modal" class="btn btn-primary">Insert</button>
                </div>
                </div>
            </div>
            </div>
                </div>
                    </div>
                         <label>Quantities available for this food:</label>
                                            <br />
                  <div class="col-md-12 mb-3 d-md-flex flex-wrap form-group">
		<strong id="regupdateJeloCena" class="d-none text-danger"></strong>

                                <?php
                                $kol=sve("kolicina");
                                $kolicineJela=kolicinaCenaJelo([$j->idJelo]);
                                foreach($kolicineJela as $k){
                                    $niz2[]=$k->idKol;
                                    $cene[]=$k->iznos;
                                }
                                $broj=0;
                                foreach($kol as $k):
                                if(in_array($k->idKol,$niz2)):
                                ?>
                                    
                                            <label class="custom-control col-3 custom-checkbox custom-control-inline">
                                                <input type="checkbox" value="<?=$k->idKol?>" id="<?=$k->kolicina?> " class="custom-control-input cenaUpdate updateJeloKolChb" name="updateJeloKolChb[]"
                                                     data-parsley-errors-container="#error-checkbox" checked>
                                                <span class="custom-control-label"><?=$k->kolicina?></span>
                                            </label>
                                            <p id="error-checkbox"></p>
                                            <div class="input-group">
		<input type="text" class="form-control <?=$k->idKol?> updatetJeloCena" value="<?=$cene[$broj]?>" placeholder="Price for <?=$k->kolicina?>">
		<div class="invalid-feedback d-block">
		</div>
		</div>
                                            <?php $broj++; else:?>
                                            
                                              <label class="custom-control col-3 custom-checkbox custom-control-inline">
                                                <input type="checkbox" value="<?=$k->idKol?>" id="<?=$k->kolicina?>" class="custom-control-input cenaUpdate updateJeloKolChb" name="updateJeloKolChb[]"
                                                     data-parsley-errors-container="#error-checkbox">
                                                <span class="custom-control-label"><?=$k->kolicina?></span>
                                            </label>
                                            <p id="error-checkbox"></p>
                                            	<div class="input-group">
		<input type="text" class="form-control <?=$k->idKol?>" value="" placeholder="Price for <?=$k->kolicina?>" disabled>
		<div class="invalid-feedback d-block">
		<!-- <strong id="regupdateJeloCena" class="d-none text-danger"></strong> -->
		</div>
		</div> 
                                           <?php endif; 
                                           
                                                           endforeach;            
                                         
                                            ?>
                                            <div class="invalid-feedback d-block">
                      <strong id="regiupdateJeloKol" class="d-none text-danger"></strong>
                      </div>
                    </div>
                  <!-- <div class="col-md-12 mb-3" id="addPoljeCena">
                    
                  </div> -->
         
                  <div class="col-md-12 mb-3">
                    <label for="validationCustom12">Description</label>
                    <div class="input-group">
                      <textarea rows="5" id="updateJeloDesc" class="form-control" placeholder="Description" ><?=$j->opis?></textarea>
                      <div class="invalid-feedback d-block">
                      <strong id="regupdateJeloDesc" class="d-none text-danger"></strong>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <label for="validationCustom12">Product Image</label><br/>
                    <img class="img" alt="<?=$j->naziv?>" name="<?=$j->src?>" src="assets/images/food_small/small_<?=$j->src?>"/>
                  </div>
                  <div class="col-md-12 mb-3">

                    <br/><label for="validationCustom123">Upload new image</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="updateJeloPic">
                      <label class="custom-file-label" for="validatedCustomFile">Upload Images...</label>
                      <div class="invalid-feedback d-block">
                      <!-- <strong id="regupdateJeloPic" class="d-none text-danger"></strong> -->
                      </div>
                    </div>
                  </div>
                </div>
                <?php endforeach;?>



                <input type="submit" id="updateJeloBtn" class="btn btn-primary" value="Update"/>
              </form>

            </div>
          </div>

        </div>
    
  </main>
<?php 
else:
    http_response_code(404);
    header("Location:404.php");
endif;
?>