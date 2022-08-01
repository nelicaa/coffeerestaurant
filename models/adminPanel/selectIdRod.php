<?php
session_start();
header('Content-type:application/json');
 require_once $_SERVER['DOCUMENT_ROOT']."/models/functions.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $status=200;
        $tabela=$_POST["tabela"];
        $idKat=$_POST["objKat"];
        $kat=upitWhereVise($tabela,"idRod",[$idKat]);
        $poruka=$kat;

    }
    else{  
    $poruka="404";
        $status=404;
    }
    echo json_encode($poruka);
    http_response_code($status);
?>
