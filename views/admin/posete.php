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
                                <div class="card-body">
                                    <table id="mainTable" class="table container-fluid table-hover">
                                        <thead>
                                            <tr>
                                                <th>Strana</th>
                                                <th>Deo sajta</th>
                                                <th>IP adresa</th>
                                                <th>Datum</th>



                                            </tr>

                                                <?php
                                               $file=file("data/log.txt");
                                            foreach($file as $f):
                                                list($strana,$deo,$ip,$datum)=explode("\t",$f);
                                               $d=str_replace(["%20","&"],[" "," / "],$deo);
                                            ?>
                                            <tr>
                                                <td><?=$strana?></td>
                                                <td><?= $d?></td> 
                                                <td><?=$ip?></td>
                                                <td><?=$datum?></td>

                                            </tr>
                                                

                                          <?php  endforeach; ?>
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

