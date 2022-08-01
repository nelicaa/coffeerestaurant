<?php
session_start();
header('Content-type:application/json');
 require_once $_SERVER['DOCUMENT_ROOT']."/models/functions.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $status=200;
    $ime=$_POST['objIme'];
    $prezime=$_POST['objPrezime'];
    $email=$_POST['objEmail'];
    $pass=$_POST['objPass'];
    $pic=$_FILES['objPic'];
    $tmp=$pic['tmp_name'];
    $name=$pic['name'];
    $size=$pic['size'];
    $ekstenzija=explode("/",$pic['type']);
    $ekstenzija=$ekstenzija[1];
    $putanja=$_SERVER['DOCUMENT_ROOT']."/assets/images/users/";
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
    if(!preg_match($regPass,$pass)){array_push($greske,"Password nije u dobrom formatu");}
    if(!preg_match($regAddress,$address)){array_push($greske,"Adresa nije u dobrom formatu");}
if($uloga==0){array_push($greske,"Uloga nije izabrana");}
    if($size<4000000 && count($greske)==0){ //SREDI OVO KOLIKO TREBA VELIKA SLIKA DA BUDE
    $naziv=resizeSlike(180,$ekstenzija,$tmp,$name,$putanja,"profile");
    $pass=md5($pass);
    $funkcija=insert("korisnik", [null,$ime,$prezime,$email,$pass,$uloga,null,$naziv,$address]);
    if($funkcija){
        $status=201;
        $poruka="Successfully registered!";
    }
    else{
        $status=500;
        $poruka="Email already exists";
    }
    }
    else{
        $status=500;
        if(count($greske)){
            $poruka=$greske;
        }
       else{
        $poruka="Image is too big! Max 4 MB";
       }
    }}
    else{
        $poruka="404";
        $status=404;
    }
    echo json_encode($poruka);
    http_response_code($status);
?>
