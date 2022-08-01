<?php
session_start();
header('Content-type:application/json');
 require_once $_SERVER['DOCUMENT_ROOT']."/models/functions.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $status=200;
        $email=$_POST['email'];
        $brisi=brisanjeBlockList($email);
        if($brisi){
           $poruka="Deeleted!";

        }
        // $file=file('../data/infoRestaurant.txt');
        // $blokirani=file("../../data/log.txt");
//  var_dump($blokirani);
        // $file=posete()
        //     $sadrzaj="";
        //     foreach($file as $f){
        //         list($emailTxt,$datum,$vreme)=explode("\t",$f);
        //         if($emailTxt==$email){
        //             continue;
        //         }
        //         else{
        //             $sadrzaj.=$emailTxt."\t".$datum."\t".$vreme;
        //         }
        //     }
        //     $text=fopen("data/blokirani.txt","a");
        // fwrite($text,$sadrzaj);
        // if(fclose($text)){
        //     $poruka="Deeleted!";
        // }
    }
    else{$poruka="404";
        $status=404;
    }
    echo json_encode($poruka);
    http_response_code($status);
?>

