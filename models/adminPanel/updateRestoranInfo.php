<?php
session_start();
header('Content-type:application/json');
 require_once $_SERVER['DOCUMENT_ROOT']."/models/functions.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $status=200;
        $valueForm=$_POST['value'];
        $keyForm=$_POST['key'];
        $sadrzaj="";
        $file=file("../../data/infoRestaurant.txt");
        foreach($file as $f){
            list($key,$value)=explode("=",$f);
            $value=trim($value);
            if($key==$keyForm){
               $sadrzaj.=$keyForm."=".$valueForm."\n";
            }
            else{
                $sadrzaj.=$key."=".$value."\n";
            }
        }
        $upis=fopen("../../data/infoRestaurant.txt","w");
        fwrite($upis,$sadrzaj);
        if(fclose($upis)){
            $poruka="Updated!";
        }
    }
    else{$poruka="404";
        $status=404;
    }
    echo json_encode($poruka);
    http_response_code($status);
?>