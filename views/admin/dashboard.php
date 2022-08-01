
<div class="ms-panel col-12 d-flex flex-row">
            
            <div class="ms-panel-body col-5">
            <div class="ms-panel-header">
              <h6><?php if(isset($_GET['admin'])){echo $_GET['admin'];}?></h6>
            </div>
              <div class="table-responsive">
              <div class="body d-flex ">
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                             <strong>Danas ulogovani korisnici</strong><hr/>

                                    <table id="mainTable" class="table container-fluid table-hover">
                               
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Email</th>
                                                <th>Datum</th>



                                            </tr>

                                                <?php
                                                $danasnjiDatum=date("Y-m-d");
                                               $file=file("data/ulogovani.txt");
                                               $broj=0;
                                            foreach($file as $f):
                                                list($email,$datum)=explode("\t",$f);
                                                $korisnik=upitWhere("korisnik","email",[$email]);
                                                $datum=trim($datum);
                                                if($datum===$danasnjiDatum):
                                                     //var_dump($korisnik);
                                                    $broj++;
                                            ?>
                                            <tr>
                                               
                                                <td><img src="assets/images/users/<?=$korisnik->pic?>" alt="<?=$email?>" class="img"></td>
                                                <td><?=$email?></td>
                                                <td><?=$datum?></td>

                                            </tr>
                                                

                                          <?php  endif; endforeach; ?>
                                          <tfoot class="border">
                                            <tr>
                                                <td scope="row">Ukupno poseta danas</td>
                                                <td></td>
                                                <td><strong><?php echo $broj;?></strong></td>
                                            </tr>
                                        </tfoot>
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
            <div class="ms-panel-body col-7">
            <div class="ms-panel-header">
              <h6><?php if(isset($_GET['admin'])){echo $_GET['admin'];}?></h6>
            </div>
              <div class="table-responsive">
              <div class="body d-flex ">
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                            <strong>Blokirani korisnici zbog 3 neuspela pokusaja logina u 5 min</strong><hr/>

                                    <table id="mainTable" class="table container-fluid table-hover">
                               
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Email</th>
                                                <th>Datum</th>
                                                <th>Remove from block list</th>


                                            </tr>

                                                <?php
                                                $danasnjiDatum=date("Y-m-d");
                                               $file=file("data/blokirani.txt");
                                               $broj=0;
                                            foreach($file as $f):
                                                list($email,$datum)=explode("\t",$f);
                                                $korisnik=upitWhere("korisnik","email",[$email]);
                                                //var_dump($korisnik);
                                                if($korisnik):
                                            ?>
                                            <tr>
                                                <td><img src="assets/images/users/<?=$korisnik->pic?>" alt<?=$korisnik->ime?> class="img"></td>
                                                <td><?=$email?></td>
                                                <td><?=$datum?></td>
                                                <td><a class="RemoveBlock" data-email="<?=$korisnik->email?>" href="#">Remove</a></td>
                                            </tr>
                                                <?php endif; if(!$korisnik): ?>
<tr>
                                                <td><img src="assets/images/download.jpg" alt="<?=$email?>" class="img"></td>
                                                <td><?=$email?></td>
                                                <td><?=$datum?></td>
                                                <td><a class="RemoveBlock" data-email="<?=$email?>" href="#">Remove</a></td>
                                            </tr>
                                          <?php endif; endforeach; ?>
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

              <div class="ms-panel col-12">

<!-- PORUKE -->
<h6 class="d-flex justify-content-center">Messages</h6>
<div class="ms-panel-body">
              <div class="table-responsive">
                <table class="table table-hover thead-primary">
                  <thead>
                    <tr>
                      <th scope="col">Message ID</th>
                      <th scope="col">Customer email</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Message</th>

                      <th scope="col">Delete</th>

                    </tr>
                  </thead>
                  <tbody class="poruke">
                  </tbody>
                </table></div></div>


                <h6 class="d-flex justify-content-center">Orders</h6>
            <div class="ms-panel-body">
              <div class="table-responsive">
                <table class="table table-hover thead-primary">
                  <thead>
                    <tr>
                      <th scope="col">Order ID</th>
                      <th scope="col"></th>
                      <th scope="col">Customer Name</th>
                      <th scope="col">Adrress</th>
                      <th scope="col">Order Status</th>
                      <th scope="col">Order Time</th>
                      <th scope="col">See order</th>
                      <th scope="col">Price</th>

                      <th scope="col">Delete</th>

                    </tr>
                  </thead>
                  <tbody class="prikazKorpe">
                  <?php
                  $korpa=sve("korpa");
                  foreach($korpa as $k):
                  $iznos=0;
                  $jela=jeloSve([$k->idKorpa]);
// var_dump($jela);

                  $korisnik=upitWhere("korisnik","idKor",[$k->idK]);
                   ?>
                   <tr>
                <th scope="row"><?=$k->idKorpa?></th>
                   <td><img alt="<?=$korisnik->ime?>" src="assets/images/users/<?=$korisnik->pic?>"/></td>
                       <td><?=$korisnik->ime?> <?=$korisnik->prezime?></td>
                       <td><?=$korisnik->address?></td>
                       <?php if($k->izvrseno==0):?>
                        <td><a href="#" data-idKorpa="<?=$k->idKorpa?>" data-status="1" class="updateStatus"><span class="badge badge-primary">Pending</span></a></td>
                       <?php else:?>
                        <td><a href="#" data-idKorpa="<?=$k->idKorpa?>" data-status="0" class="updateStatus"><span class="badge badge-success">Done</span></a></td>
                        <?php endif;?>
                        <td><?=$k->datum?></td>
                        <td>
                        <button type="button" class="btn btn-primary mt-0" data-toggle="modal" data-target="#exampleModal<?=$k->idKorpa?>">
            See order
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal<?=$k->idKorpa?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?=$k->idKorpa?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel<?=$k->idKorpa?>">Order products</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                    </button>
                </div>
                <div class="modal-body">
                <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                    <th scope="col">Product ID</th>
                      <th scope="col">Food Item</th>
                      <th scope="col">Price</th>
                      <th scope="col">Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
         <?php   foreach($jela as $j):
  $iznos+=$j->kolicina*$j->iznos;
?>

                  <?php
                  ?>
                    <tr>
                    <td><?=$j->idJelo?></td>
                      <td class="ms-table-f-w"> <img src="assets/images/food_small/small_<?=$j->src?>" alt="<?=$j->naziv?>"> <?=$j->naziv?> </td>
                      <td><?=$j->iznos?></td>
                      <td>
                    <?=$j->kolicina?></td>
                    </tr>


<?php endforeach;?>
                         </tbody>
                </table>
              </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>                 
                        
                        </td>
                        <td><?=$iznos?> din</td>

                        <td><a href="#" class="obrisiAdmin" data-parametar="idKorpa"  data-tabela="korpa" data-id="<?=$k->idKorpa?>">Delete</a></td>
                       </tr>
             
                   <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>




<hr/>
<h6 class="d-flex justify-content-center">Statistika poseta sajta</h6>
<hr/>

            <div class="col-12 d-inline-flex">
            <div class="ms-panel-body border mr-2 col-6">
            <p>Prikaz statistike posete stranicama sajta <strong> u poslednja 24h </strong></p>
<hr/>
<?php
$straneSajta=upitWhereVise("meni","idRod",[10]);
foreach($straneSajta as $s):
  $broj=posete("site",$s->naziv);
 // var_dump($broj['rezultat']);
?>
 
              <span class="progress-label"> <strong><?=$s->naziv?></strong> </span>
              <div class="progress">
                <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$broj['rezultat'];?>%" aria-valuenow="<?=$broj['rezultat'];?>" aria-valuemin="0" aria-valuemax="100"><?=$broj['rezultat']?>%</div>
              </div>
              <p class="border p-2"> Broj poseta <?=$broj['broj'];?></p>
              <?php endforeach;
              $product=posete("site","Product");?>
              <span class="progress-label"> <strong>Product</strong> </span>
              <div class="progress">
                <div class="progress-bar bg-primary" role="progressbar" style="width:<?= $product['rezultat']?>%" aria-valuenow="<?= $product['rezultat']?>" aria-valuemin="0" aria-valuemax="100"><?= $product['rezultat']?>%</div>
              </div>
              <p class="border p-2"> Broj poseta <?=$product['broj'];?></p>
            </div>
          
         
            <div class="ms-panel-body border mr-2 mt-0 col-6">
            <p>Prikaz statistike posete <strong>stranicama sajta</strong></p>
<hr/>
<?php
$straneSajta=upitWhereVise("meni","idRod",[10]);
foreach($straneSajta as $s):
  $broj=poseteSve("site",$s->naziv);
 // var_dump($broj['rezultat']);
?>
 
              <span class="progress-label"> <strong><?=$s->naziv?></strong> </span>
              <div class="progress">
                <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$broj['rezultat'];?>%" aria-valuenow="<?=$broj['rezultat'];?>" aria-valuemin="0" aria-valuemax="100"><?=$broj['rezultat']?>%</div>
              </div>
              <p class="border p-2"> Broj poseta <?=$broj['broj'];?></p>
              <?php endforeach;$product=poseteSve("site","Product");?>
              <span class="progress-label"> <strong>Product</strong> </span>
              <div class="progress">
                <div class="progress-bar bg-primary" role="progressbar" style="width:<?= $product['rezultat']?>%" aria-valuenow="<?= $product['rezultat']?>" aria-valuemin="0" aria-valuemax="100"><?= $product['rezultat']?>%</div>
              </div>
              <p class="border p-2"> Broj poseta <?=$product['broj'];?></p>
            </div>

</div>

          <hr/>
<h6 class="d-flex justify-content-center">Statistika poseta admin stranica</h6>
<hr/>

            <div class="col-12 d-inline-flex">
                 <div class="ms-panel-body border mr-2 col-6">
          <p>Prikaz statistike posete admin stranicama <strong>u poslednja 24h</strong></p>
<hr/>
<?php
$straneSajta=upitWhereVise("meni","idRod",[11]);
foreach($straneSajta as $s):
  $broj=posete("admin",$s->naziv);
?>
              <span class="progress-label"> <strong><?=$s->naziv?></strong> </span>
              <div class="progress">
                <div class="progress-bar bg-primary" role="progressbar" style="width:<?=$broj['rezultat'];?>%" aria-valuenow="<?=$broj['rezultat'];?>" aria-valuemin="0" aria-valuemax="100"><?=$broj['rezultat'];?>%</div>
              </div>
              <p class="border p-2"> Broj poseta <?=$broj['broj'];?></p>

              <?php endforeach;
              $adduser=posete("admin","AddUser");
              $updateJela=posete("admin","Update jela");
              $profileUpdate=posete("admin","profilePage");?>
              <span class="progress-label"> <strong>Add user</strong> </span>
              <div class="progress">
                <div class="progress-bar bg-primary" role="progressbar" style="width:<?= $adduser['rezultat']?>%" aria-valuenow="<?= $adduser['rezultat']?>" aria-valuemin="0" aria-valuemax="100"><?= $adduser['rezultat']?>%</div>
              </div>
              <p class="border p-2"> Broj poseta <?=$adduser['broj'];?></p>

              <span class="progress-label"> <strong>Update jela</strong> </span>
              <div class="progress">
                <div class="progress-bar bg-primary" role="progressbar" style="width:<?= $updateJela['rezultat']?>%" aria-valuenow="<?= $updateJela['rezultat']?>" aria-valuemin="0" aria-valuemax="100"><?= $updateJela['rezultat']?>%</div>
              </div>
              <p class="border p-2"> Broj poseta <?=$updateJela['broj'];?></p>

              <span class="progress-label"> <strong>Update profile</strong> </span>
              <div class="progress">
                <div class="progress-bar bg-primary" role="progressbar" style="width:<?= $profileUpdate['rezultat']?>%" aria-valuenow="<?= $profileUpdate['rezultat']?>" aria-valuemin="0" aria-valuemax="100"><?= $profileUpdate['rezultat']?>%</div>
              </div>
              <p class="border p-2"> Broj poseta <?=$profileUpdate['broj'];?></p>

            </div>
                 
          <div class="ms-panel-body border col-6">
          <p>Prikaz statistike posete <strong>admin stranicama</strong></p>
<hr/>
<?php
$straneSajta=upitWhereVise("meni","idRod",[11]);
foreach($straneSajta as $s):
  $broj=poseteSve("admin",$s->naziv);
?>
              <span class="progress-label"> <strong><?=$s->naziv?></strong> </span>
              <div class="progress">
                <div class="progress-bar bg-primary" role="progressbar" style="width:<?=$broj['rezultat'];?>%" aria-valuenow="<?=$broj['rezultat'];?>" aria-valuemin="0" aria-valuemax="100"><?=$broj['rezultat'];?>%</div>
              </div>
              <p class="border p-2"> Broj poseta <?=$broj['broj'];?></p>

              <?php endforeach;
              $adduser=poseteSve("admin","AddUser");
              $updateJela=poseteSve("admin","Update jela");
              $profileUpdate=poseteSve("admin","profilePage");?>
              <span class="progress-label"> <strong>Add user</strong> </span>
              <div class="progress">
                <div class="progress-bar bg-primary" role="progressbar" style="width:<?= $adduser['rezultat']?>%" aria-valuenow="<?= $adduser['rezultat']?>" aria-valuemin="0" aria-valuemax="100"><?= $adduser['rezultat']?>%</div>
              </div>
              <p class="border p-2"> Broj poseta <?=$adduser['broj'];?></p>

              <span class="progress-label"> <strong>Update jela</strong> </span>
              <div class="progress">
                <div class="progress-bar bg-primary" role="progressbar" style="width:<?= $updateJela['rezultat']?>%" aria-valuenow="<?= $updateJela['rezultat']?>" aria-valuemin="0" aria-valuemax="100"><?= $updateJela['rezultat']?>%</div>
              </div>
              <p class="border p-2"> Broj poseta <?=$updateJela['broj'];?></p>

              <span class="progress-label"> <strong>Update profile</strong> </span>
              <div class="progress">
                <div class="progress-bar bg-primary" role="progressbar" style="width:<?= $profileUpdate['rezultat']?>%" aria-valuenow="<?= $profileUpdate['rezultat']?>" aria-valuemin="0" aria-valuemax="100"><?= $profileUpdate['rezultat']?>%</div>
              </div>
              <p class="border p-2"> Broj poseta <?=$profileUpdate['broj'];?></p>

            </div>
          </div>
          </div>
          <!-- </div>
          </div> -->


     
<!--           
          </div>
          </div> -->
          <hr/>
</div>

  </main>
        <!-- </div>

      </div>
    </div> -->



