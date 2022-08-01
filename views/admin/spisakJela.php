<div class=" ms-panel table-responsive">
            <div class="ms-panel-header">
              <h6>Product List</h6>
            </div>
            <div class="ms-panel-body">
              <div class="table-responsive">
              <div class="body d-flex ">
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <table id="mainTable" class="table table-responsive table-hover">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Main category</th>
                                                <th>Category</th>
                                                <th>Image</th>
                                                <th>Amount/price</th>
                                                <th>Tags</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $jela=jelo("");
                                        foreach($jela as $j): 
                                        $kat=upitWhere("kategorije","idKat",[$j->idKat]);
                                        $mainKat=upitWhere("kategorije","idKat",[$kat->idRod]);
                                        $cene=jedinstvenaCena("cena","kolicina_jelo","idCena", "idKJ",[$j->idKJ]);
                                        // $kolicine=spajanjeJedanWhere("kolicina","kolicina_jelo",[$j->idKJ],"idKol","idKol","idKJ");
                                        $kolicinaCena=kolicinaCenaJelo([$j->idJelo]);
                                        $tags=getTags([$j->idJelo]);
                                        // var_dump($tags);
                                        ?>
                                            <tr>
                                                <td><?=$j->idJelo?></td>
                                                <td><?=$j->naziv?></td>
                                                <td><?=$j->opis?></td>
                                               <td><?=$mainKat->naziv?></td>
                                                <td><?=$kat->naziv?></td> 
                                                <td ><img src="assets/images/food_small/small_<?=$j->src?>" alt<?=$j->naziv?> class="img-thumbnail"></td>
                                                <td><?php foreach($kolicinaCena as $kc):?>
                                                <small><?= $kc->kolicina ?></small> <small><?=$kc->iznos?> din</small><br/>
                                                <?php endforeach; ?>
                                                </td>
                                                <td><?php foreach($tags as $t):
                                                    ?>
                                                <small><?= $t->naziv ?></small><br/>
                                                <?php endforeach; ?></td>
                                                <td class="d-flex justify-content-center"><a href="index.php?page=Admin%20panel&admin=Update%20jela&id=<?=$j->idJelo?>"><i class="fas fa-edit"></i></a></td>
                                                <td><a class="deleteJela" href="#" data-id="<?=$j->idJelo?>"><i class="fas fa-trash-alt"></i></a></td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                        <!-- <tfoot>
                                            <tr>
                                                <th><strong>TOTAL</strong></th>
                                                <th>1290</th>
                                                <th>1420</th>
                                                <th>5</th>
                                            </tr>
                                        </tfoot> -->
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- row end-->
                </div>
            </div>

              </div>
            </div>
          </div>

        </div>

      </div>
    </div>



  </main>


