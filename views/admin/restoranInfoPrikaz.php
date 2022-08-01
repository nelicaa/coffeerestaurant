<div class="ms-panel col-12">
            <div class="ms-panel-header">
              <h6><?php echo $_GET['admin'];?></h6>
            </div>
            <div class="ms-panel-body">
              <div class="table-responsive">
              <div class="body d-flex ">
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <!-- <div class="card-header">
                                    <h3 class="card-title">Editable Tables <small>You can edit any columns except
                                            header/footer</small></h3>
                                </div> -->
                                <div class="card-body">
                                    <table id="mainTable" class="table container-fluid table-hover">
                                        <thead>
                                                <!-- treba da uhvatim key -->
                                                <?php
                                               $file=file("data/infoRestaurant.txt");
                                            //    var_dump($file);
                                            foreach($file as $f):
                                                list($key,$value)=explode("=",$f);
                                                $value=trim($value);
                                                if($key=="OpenDays"):
                                            ?>
                                            <tr>
                                                <th><?=$key?></th>
                                                <td><?=$value?></td>
                                                <td><a class="btn active mt-0" data-toggle="modal" data-target="#exampleModal">
                                                <i class="fas fa-edit"></i> </a>
                                                

            <!-- Modal -->
            <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content p-4">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update open days</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
               <?php
               $value=trim($value);
               $value=explode(",",$value);
               $dani=["Saturday","Sunday","Monday","Tuseday","Wednesday","Thursday", "Friday"];
               foreach($dani as $d){
                if(in_array($d,$value)):?>
                    <label class="custom-control col-3 custom-checkbox custom-control-inline">
                    <input type="checkbox" value="<?=$d?>" class="custom-control-input daniChb" name="checkbox" checked/>
                    <span class="custom-control-label"><?=$d?></span>
                </label>     
                <?php else:?>
                    <label class="custom-control col-3 custom-checkbox custom-control-inline">
                    <input type="checkbox" value="<?=$d?>" class="custom-control-input daniChb" name="checkbox"/>
                    <span class="custom-control-label"><?=$d?></span>
                </label>     
                <?php   endif; 
               } 
               ?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="updateDaysRestoran"  data-key="<?=$key?>" data-dismiss="modal" class="btn btn-primary">Update open days</button>
                </div>
                </div>
            </div></td>
                                                </tr>

                                            <?php elseif($key=="OpenHours"):?>
                                                <tr>
                                                <th><?=$key?></th>
                                                <td><?=$value?></td>
                                                <td> <a class="btn active mt-0" data-toggle="modal" data-target="#exampleModal2">
                                                <i class="fas fa-edit"></i> </a>
                                                

            <!-- Modal -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update hours</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                    </button>
                </div>
                <p class="pt-2">From</p>

                <div class="input-group mb-3">
                                                    <input type="text" class="form-control time24 from"
                                                        placeholder="Ex: 23:59">
                                                </div>
                <p class="pt-2">To</p>

                                                <div class="input-group mb-3 p-2">
                                                    <input type="text" class="form-control time24 to"
                                                        placeholder="Ex: 23:59">
                                                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="updateTimeRestoran" data-key="<?=$key?>" data-dismiss="modal" class="btn btn-primary">Update open hours</button>
                </div>
                </div>
            </div></div></td>
                                                </tr>
                                            
                                            <?php
                                            else:?>
                                              <tr>
                                                <th><?=$key?></th>
                                                <td class="input-group"><textarea data-key="<?=$key?>" type="text" class="form-control updateRestoranInfo"><?=$value?></textarea></td>
                                                </tr>
                                            
                                            <?php
                                            endif; ?>
                                          
                                          <?php  endforeach; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

              </div>
            </div>
          </div>

        </div>

      </div>
    </div>



  </main>


