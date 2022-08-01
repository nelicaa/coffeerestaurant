<?php
session_start();
header('Content-type:application/json');
 require_once $_SERVER['DOCUMENT_ROOT']."/models/functions.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $status=200;
        $tabela=$_POST['tabela'];
        $idK=$_POST['idK'];
        $kolonaUpdate=$_POST['kolonaUpdate'];
        $kolonaWhere=$_POST['kolonaWhere'];
        $value=$_POST['value'];
        // var_dump($kolonaUpdate);
        $update=edit($tabela,[$kolonaUpdate],[$value],$kolonaWhere,$idK);
        if($update){
            $poruka="Updated!";
        }
        else{
            $poruka="Mora da bude unique naziv! Nije uspeo update";
            $status=500;
        }

    }
    else{$poruka="404";
        $status=404;
    }
    echo json_encode($poruka);
    http_response_code($status);
?>

