<?php
session_start();
header('Content-type:application/json');
 require_once $_SERVER['DOCUMENT_ROOT']."/models/functions.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $status=200;
        $value=$_POST['value'];
        $tabela=$_POST['tabela'];
        $idRod=0;
        $greske=[];
        $textGreske=[];
        if(isset($_POST['dropdownCat'])){
            if($_POST['dropdownCat']==0){
                $greske[]=false;
                $textGreske[]="Mora da se izabere vrednost iz dropdown liste";
            }
            else{
            $idRod=$_POST['dropdownCat'];
            }
        }
$reg='/^[A-z(\s)*]+$/';
if(!preg_match($reg,$value)){
$$textGreske[]="Vrednost nije u dobrom formatu";
$greske[]=false;
}
if(!in_array(false,$greske)){
    if($tabela=="kategorije" || $tabela=="meni"){
        $uspeh=insert($tabela,[null,$value,$idRod]);
    }
    else{
        $uspeh=insert($tabela,[null,$value]);
    }
    if($uspeh){
        $poruka="Inserted!";
    }
    else{
                    $poruka="Mora da bude unique naziv! Nije uspeo update";

        $status=500;
    }
}
else{
    $poruka="Greska";
    var_dump($textGreske);
    $status=406;
}

   
    }
    else{$poruka="404";
        $status=404;
    }
    echo json_encode($poruka);
    http_response_code($status);
?>

