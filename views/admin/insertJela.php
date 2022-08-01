



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
                      <input type="text" class="form-control" id="insertJeloName" placeholder="Product Name">
                      <div class="invalid-feedback d-block">
                      <strong id="reginsertJeloName" class="d-none text-danger"></strong>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="validationCustom22">Select main category</label>
                    <div class="input-group">
                      <select class="form-control" id="insertJeloKat1" required>
                      <option value="0">Choose</option>
                          <?php
                          $kat=upitWhereVise("kategorije","idRod",["0"]);
                          foreach($kat as $k):?>
                            <option value="<?=$k->idKat?>"><?=$k->naziv?></option>
                          }
                        <?php endforeach;  ?>

                      </select>
                      <div class="invalid-feedback d-block">
                      <strong id="reginsertJeloKat1" class="d-none text-danger"></strong>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom22">Select category type</label>
                    <div class="input-group">
                      <select class="form-control" disabled id="insertJeloKat2" >

                      </select>
                    </div>
                  </div>
                  <label>Tags and ingredients</label>
                                            <br />
                  <div class="col-md-12 mb-3 d-md-flex flex-wrap form-group">
                            <div id="divPodKat">               
                                            
                                <?php
                                $tags=sve("podkategorije");
                                foreach($tags as $t):
                                
                                ?>
                                    
                                            <label class="custom-control col-3 custom-checkbox custom-control-inline">
                                                <input type="checkbox" value="<?=$t->idPodKat?>" class="custom-control-input insertJeloTagsChb" name="checkbox"
                                                     data-parsley-errors-container="#error-checkbox">
                                                <span class="custom-control-label"><?=$t->naziv?></span>
                                            </label>
                                            <?php endforeach;?></div>
                       <div class="invalid-feedback d-block">
                      <strong id="reginsertJeloTag" class="d-none text-danger"></strong>
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
                                <?php
                                $kol=sve("kolicina");
                                foreach($kol as $k):
                                
                                ?>
                                    
                                            <label class="custom-control col-3 custom-checkbox custom-control-inline">
                                                <input type="checkbox" value="<?=$k->idKol?>" id="<?=$k->kolicina?>" class="custom-control-input insertJeloKolChb" name="insertJeloKolChb[]"
                                                     data-parsley-errors-container="#error-checkbox">
                                                <span class="custom-control-label"><?=$k->kolicina?></span>
                                            </label>
                                            <p id="error-checkbox"></p>
                                            <?php endforeach;?>
                                            <div class="invalid-feedback d-block">
                      <strong id="reginsertJeloKol" class="d-none text-danger"></strong>
                      </div>
                    </div>
                  <div class="col-md-12 mb-3" id="addPoljeCena">
                    
                  </div>
         
                  <div class="col-md-12 mb-3">
                    <label for="validationCustom12">Description</label>
                    <div class="input-group">
                      <textarea rows="5" id="insertJeloDesc" class="form-control" placeholder="Description" ></textarea>
                      <div class="invalid-feedback d-block">
                      <strong id="reginsertJeloDesc" class="d-none text-danger"></strong>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <label for="validationCustom12">Product Image</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="insertJeloPic">
                      <label class="custom-file-label" for="validatedCustomFile">Upload Images...</label>
                      <div class="invalid-feedback d-block">
                      <strong id="reginsertJeloPic" class="d-none text-danger"></strong>
                      </div>
                    </div>
                  </div>
                </div>



                <input type="submit" id="insertJeloBtn" class="btn btn-primary" value="Insert"/>
              </form>

            </div>
          </div>

        </div>

    
  </main>