<?php
session_start();
header('Content-type:application/json');
 require_once $_SERVER['DOCUMENT_ROOT']."/models/functions.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $status=200;
        $tabela=$_POST['tabela'];
if(isset($_POST['idRod'])){
    if($_POST['idRod']==0){
        $poruka=upitWhereVise($tabela,"idRod",[$_POST['idRod']]);
    }
    else{
        $poruka=upitWhereViseZnakVece($tabela,"idRod",[$_POST['idRod']]);
    }
}
else{
    $poruka=sve($tabela);
}

    }
    else{$poruka="404";
        $status=404;
    }
    echo json_encode($poruka);
    http_response_code($status);
?>
