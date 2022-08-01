<?php
session_start();
header('Content-type:application/json');
 require_once $_SERVER['DOCUMENT_ROOT']."/models/functions.php";
    if(isset($_POST['id'])){
        $status=200;
        $id=$_POST['id'];
        $obrisi=edit("jelo",["deleted"],[1],"idJelo",$id);
        if($obrisi){
            $poruka="Deleted!";
        }
        else{
            $status=500;
        }
    }
    else{
        header("Location:404.php");
        $poruka="404";
        $status=404;
    }
    echo json_encode($poruka);
    http_response_code($status);
?>
