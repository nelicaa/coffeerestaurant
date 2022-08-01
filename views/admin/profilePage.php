 
            <div class="ms-panel-body col-12">
            <div class="ms-panel-header">
              <h6><?php if(isset($_GET['admin'])){echo $_GET['admin'];}?></h6>
            </div>
              <div class="table-responsive">
              <div class="body d-flex ">
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body d-flex flex-column ">
                            <?php $korisnik=upitWhere("korisnik","idKor",[$_SESSION['ulogovan']->idKor]);
                        //    var_dump($korisnik); ?>
 <div class="form-group col-9 row d-flex justify-content-around">
<img class="img" src="assets/images/users/<?=$korisnik->pic?>" alt="<?=$korisnik->ime?>"/>
<div class="form-group ">
            <label for="regPic">Update pic</label>
            <input type="file" accept=".jpg, .jpeg, .png" class="form-control" id="upPic" placeholder="Your photo">
            <small id="upPicTekst" class="d-none text-danger"></small>
        </div>
</div>

<div class="form-group">
            <input type="text" class="form-control" id="upIme" value="<?=$korisnik->ime?>" placeholder="First name">
            <small id="upImeTekst" class="d-none text-danger"></small>
    </div>
    <div class="form-group">
            <input type="text" class="form-control" id="upPrezime" value="<?=$korisnik->prezime?>" placeholder="Last name">
            <small id="upPrezimeTekst" class="d-none text-danger"></small>
    </div>
    <div class="form-group">
            <input type="email" class="form-control"  id="upEmail" value="<?=$korisnik->email?>" placeholder="Email">
            <small id="upEmailTekst" class="d-none text-danger"></small>
                        <input type="hidden" id="stariEmail" value="<?=$korisnik->email?>"/>

        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="upPass" placeholder="New password">
            <small id="upPassTekst" class="d-none text-danger"></small>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="upAdress" value="<?=$korisnik->address?>" placeholder="Your address">
            <small id="upAddressTekst" class="d-none text-danger"></small>
        </div>

        <div class="form-group ">
            <label for="upUloga">Update uloge</label>
            <select id="upUloga" class="ulogaAddUser form-control">
            <?php
            $upit=sve("uloge");
            foreach($upit as $u):
                if($u->idUloga==$korisnik->IdUloga):
            ?>
             <option value="<?=$u->idUloga?>" selected><?=$u->naziv?></option>
            <?php else:?>
            <option value="<?=$u->idUloga?>"><?=$u->naziv?></option>
            <?php endif; endforeach;?>
            </select>
            <small id="upUloga" class="d-none text-danger"></small>
        </div>
        <div class="form-group">
        <input type="hidden" id="idK" value="<?=$korisnik->idKor?>"/>
        <input class="btn btn-primary" type="submit" id="updateProfile" value="Update"/>
        </div>

                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
