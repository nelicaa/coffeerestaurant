<?php
session_start();
header('Content-type:application/json');
 require_once $_SERVER['DOCUMENT_ROOT']."/models/functions.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $status=200;
    $idJelo=$_POST['idJelo'];
    $idKJ=$_POST['idKJ'];
    // $poruka=spajanjeDvaWhereJedanRed("cena","kolicina_jelo",[$idJelo,$idKol],"idKJ","idKJ","idJelo","idKol");
    $poruka=spajanjeDvaWhereJedanRed("cena","kolicina_jelo",[$idJelo,$idKJ],"idKJ","idKJ","idJelo","idKJ");

    }
    else{$poruka="404";
        $status=404;
    }
    echo json_encode($poruka);
    http_response_code($status);
?>

