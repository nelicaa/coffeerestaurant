<div class="ms-panel col-9 m-auto">
<div class="ms-panel-header">
              <h6><?php  echo $_GET['admin'];?></h6>
            </div>
    <div class="form-group">
            <input type="text" class="form-control" id="regIme" placeholder="First name">
            <small id="regImeTekst" class="d-none text-danger"></small>
    </div>
    <div class="form-group">
            <input type="text" class="form-control" id="regPrezime" placeholder="Last name">
            <small id="regPrezimeTekst" class="d-none text-danger"></small>
    </div>
    <div class="form-group">
            <input type="email" class="form-control"  id="regEmail" placeholder="Email">
            <small id="regEmailTekst" class="d-none text-danger"></small>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="regPass" placeholder="Password">
            <small id="regPassTekst" class="d-none text-danger"></small>
        </div>
          <div class="form-group">
            <input type="text" class="form-control" id="regAdress" placeholder="Your address">
            <small id="regAddressTekst" class="d-none text-danger"></small>
        </div>
        <div class="form-group ">
            <label for="regPic">Profile picture</label>
            <input type="file" accept=".jpg, .jpeg, .png" class="form-control" id="regPic" placeholder="Your photo">
            <small id="regPicTekst" class="d-none text-danger"></small>
        </div>
        <div class="form-group ">
            <label for="regUloga">Uloga</label>
            <select id="regUloga" class="ulogaAddUser form-control"><option value="0">Odaberi ulogu</option>
            <?php
            $upit=sve("uloge");
            foreach($upit as $u):
            ?>
            <option value="<?=$u->idUloga?>"><?=$u->naziv?></option>
            <?php endforeach;?>
            </select>
            <small id="regUloga" class="d-none text-danger"></small>
        </div>

        <div class="form-group">
            <input type="submit" id="insertKorisnika" value="Sign up" class="btn btn-primary py-3 px-5">
        </div>
</div>