<?php
session_start();
header('Content-type:application/json');
 require_once $_SERVER['DOCUMENT_ROOT']."/models/functions.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $status=200;
        $naziv=$_POST['objPodKat'];
    $sveKat=sve("podkategorije");
    foreach($sveKat as $k){
        if($k->naziv==$naziv){
            $status=500;
            $poruka="Already exist";
            break;
        }
    }
    if($status!=500){
        $insert=insert("podkategorije",[null,$naziv]);
        if($insert){
            $poruka=sve("podkategorije");
        }
        }
    }
    
    else{$poruka="404";
        $status=404;
    }
    echo json_encode($poruka);
    http_response_code($status);
?>
