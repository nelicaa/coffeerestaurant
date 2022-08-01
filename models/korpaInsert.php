<?php
session_start();
header('Content-type:application/json');
 require_once $_SERVER['DOCUMENT_ROOT']."/models/functions.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $status=200;
        $korpa=$_POST['korpa'];
        $korisnik=$korpa[0]["idK"];
        $insertKorpa=insert("korpa",[null,$korisnik,null,0]);
        if($insertKorpa){
            $idKorpe=$konekcija->lastInsertId();
            for($i=1;$i<count($korpa);$i++){
                $insertProizvoda=insert("korpa_jelo",[null,$korpa[$i]['idKJ'],$korpa[$i]['kolicina'],$idKorpe]);
            }

            $poruka="Done!";
        }
        else{
            $status=500;
        }

    }
    else{$poruka="404";
        $status=404;
    }
    echo json_encode($poruka);
    http_response_code($status);
?>