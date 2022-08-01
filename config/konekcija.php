<?php
require_once "config.php";

zabeleziPristup();

try{
    $konekcija=new PDO('mysql:host='.SERVER.';dbname='.DBNAME.'',USERNAME,PASS);
    $konekcija->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $konekcija->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    
    }
catch(PDOException $e){
        http_response_code(500);
        echo "Nije povezano sa bazom. Greska je: ". $e->getMessage();
    }

//izvrsavanje query upita sa fetch all
function upitSvi($upit){
    global $konekcija;
    try{
        $redovi=$konekcija->query($upit)->fetchAll();
        http_response_code(200);
        return $redovi;
    }
    catch(PDOException $e){
        // echo $e->getMessage();
        http_response_code(500);
    }
}

//izvrsavanje query upita sa fetch
function upitJedan($upit){
    global $konekcija;
    try{
        $red=$konekcija->query($upit)->fetch();
        http_response_code(200);
        return $red;
    }
    catch(PDOException $e){
        // echo $e->getMessage();
        http_response_code(500);
    }
}

//izvrsavanje query upita sa prepare jedan red
function upitPrepare($upit,$parametri){
    global $konekcija;
    try{    
    $rez=$konekcija->prepare($upit);
    $rez->execute($parametri);
    $rez=$rez->fetch();
    http_response_code(200);
    return $rez;

    }
    catch(PDOException $e){
        // echo $e->getMessage();
        http_response_code(500);
    }
}
//izvrsavanje query upita sa prepare vise redova
function upitPrepareVise($upit,$parametri){
    global $konekcija;
    try{    
    $rez=$konekcija->prepare($upit);
    $rez->execute($parametri);
    $rez=$rez->fetchAll();
    http_response_code(200);
    return $rez;

    }
    catch(PDOException $e){
        // echo $e->getMessage();
        http_response_code(500);
    }
}

//delete
function delete($tabela,$kolona,$parametri){
    global $konekcija;
    try{    
        $delete="DELETE FROM $tabela WHERE $kolona=?";
    $rez=$konekcija->prepare($delete);
    $rez->execute($parametri);
    http_response_code(204);
    return $rez;

    }
    catch(PDOException $e){
        // echo $e->getMessage();
        http_response_code(500);
    }
}



//insert
function insert($tabela,$parametri){
    global $konekcija;
    try{ 
        // $konekcija->beginTransaction();
       $insert="INSERT INTO $tabela VALUES (";
       for($i=1;$i<=count($parametri);$i++){
           $insert.="?";
        if(count($parametri)==$i){
            $insert.=")";
        }
        else{
            $insert.=",";
        }
       }
       $insert=$konekcija->prepare($insert);
       $insert->execute($parametri);
    //    $konekcija->commit();
        return $insert;
    }
    catch(PDOException $e){
        // $konekcija->rollBack();
        // echo $e->getMessage();
        http_response_code(500);
    }
}

//update

function edit($tabela,$kolone,$parametri,$kolona,$parametar){
    global $konekcija;
    try{ 
       $update="UPDATE $tabela SET ";
       for($i=0;$i<count($parametri);$i++){
           $update.="$kolone[$i]=?";
        if(count($parametri)!=$i+1){
            $update.=",";
        }
       }
       $update.=" WHERE $kolona=?";
       $update=$konekcija->prepare($update);
       array_push($parametri,$parametar);
       $update->execute($parametri);
        return $update;
    }
    catch(PDOException $e){
        // echo $e->getMessage();
        http_response_code(500);
    }
}


   
//zapis logova na stranici
function zabeleziPristup(){
$fajl=fopen(LOG,"a");
if($fajl){
    fwrite($fajl, "{$_SERVER['PHP_SELF']}\t{$_SERVER['QUERY_STRING']}\t{$_SERVER['REMOTE_ADDR']}\t".date("Y-m-d H:i:s")."\n");
    fclose($fajl);
}
}
?>