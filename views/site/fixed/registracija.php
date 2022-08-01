<div id="r">
    <h3 class="mx-auto">Sign up</h3>
    <div class="row">

    <div class="form-group">
            <input type="text" class="form-control" id="regIme" placeholder="Your first name">
            <small id="regImeTekst" class="d-none text-danger"></small>
    </div>
    <div class="form-group">
            <input type="text" class="form-control" id="regPrezime" placeholder="Your last name">
            <small id="regPrezimeTekst" class="d-none text-danger"></small>
    </div></div>
    <div class="form-group">
            <input type="email" class="form-control"  id="regEmail" placeholder="Your email">
            <small id="regEmailTekst" class="d-none text-danger"></small>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="regPass" placeholder="Your password">
            <small id="regPassTekst" class="d-none text-danger"></small>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="regAdress" placeholder="Your address">
            <small id="regAddressTekst" class="d-none text-danger"></small>
        </div>
        <div class="row">
        <div class="form-group ">
            <label for="regPic">Your profile picture</label>
            <input type="file" accept=".jpg, .jpeg, .png" class="form-control" id="regPic" placeholder="Your photo">
            <small id="regPicTekst" class="d-none text-danger"></small>
        </div>
        <div class="form-group">
            <input type="submit" id="reg" value="Sign up" class="btn btn-primary py-3 px-5">
        </div>
        </div>
        <input type="hidden" class="ulogaAddUser" value="1"/>
        
        <span>or if you have an account</span>  
        <a class="scale div" href="index.php">Log in</a></div>