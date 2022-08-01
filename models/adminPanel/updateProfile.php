<?php
session_start();
header('Content-type:application/json');
 require_once $_SERVER['DOCUMENT_ROOT']."/models/functions.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $status=200;
        $id=$_POST['idK'];
$regPass='/^.{5,}$/';

    $ime=$_POST['objIme'];
    $prezime=$_POST['objPrezime'];
    $email=$_POST['objEmail'];
        $stariEmail=$_POST['stariEmail'];

    $pass=$_POST['objPass'];
    if(isset($_FILES['objPic'])){
    $pic=$_FILES['objPic'];
    $tmp=$pic['tmp_name'];
    $name=$pic['name'];
    $size=$pic['size'];

    $ekstenzija=explode("/",$pic['type']);
    $ekstenzija=$ekstenzija[1];
    $putanja=$_SERVER['DOCUMENT_ROOT']."/assets/images/users/";
    if($size<4000000){
          $naziv=resizeSlike(180,$ekstenzija,$tmp,$name,$putanja,"profile");
          $update=edit("korisnik",["pic"],[$naziv],"idKor",$id);

    }
    else{
        $poruka="Slika max 4 MB";
    }
    }
    if($pass!="" && preg_match($regPass,$pass)){
    $pass=md5($pass);
    $update=edit("korisnik",["pass"],[$pass],"idKor",$id);
    }

    $regIme='/^[A-Z][a-z]{2,}$/';
        $regMail='/^[\w\d\.\-]+@[a-z]{2,}(\.[a-z]{2,3})+$/';
        $regPass='/^.{5,}$/';
        $uloga=$_POST['uloga'];
        $regAddress='/^[\w\s.-]+[\dA-z]+,\s*[\w\s.-]+$/';
        $address=$_POST['address'];
        $greske=[];
        if(!preg_match($regIme,$ime)){array_push($greske,"Ime nije u dobrom formatu");}
        if(!preg_match($regIme,$prezime)){array_push($greske,"Prezime nije u dobrom formatu");}
        if(!preg_match($regMail,$email)){array_push($greske,"Email nije u dobrom formatu");}
        if(!preg_match($regAddress,$address)){array_push($greske,"Adresa nije u dobrom formatu");}
if(count($greske)==0){
    $update=edit("korisnik",["ime","prezime","email","address","IdUloga"],[$ime,$prezime,$email,$address,$uloga],"idKor",$id);
     // update tekstualnog
    $blokirani=updateTxt("blokirani.txt",$stariEmail,$email,date("Y-m-d")."\t".date("H:i:s")."\n");
    $neuspeh=updateTxt("neuspeh.txt",$stariEmail,$email,date("Y-m-d")."\t".date("H:i:s")."\t".$_SERVER['REMOTE_ADDR']."\n");
    $ulogovani=updateTxt("ulogovani.txt",$stariEmail,$email,date("Y-m-d")."\n");
    $poruka="Updated!";
}
if(count($greske)){
    $status=500;
                $poruka=$greske;
            }
}
    else{
        $poruka="404";
        $status=404;
    }
    echo json_encode($poruka);
    http_response_code($status);
?>
