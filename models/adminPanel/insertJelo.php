<?php
session_start();
header('Content-type:application/json');
 require_once $_SERVER['DOCUMENT_ROOT']."/models/functions.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // var_dump($_POST);
        $status=200;
        $ime=$_POST['objName'];
        $podKat=$_POST['objpodKat'];
        $tags=explode(",",$_POST['objTags']);
        $cena=explode(",",$_POST['objCena']);
        $desc=$_POST['objDesc'];
        $kol=explode(",",$_POST['objKolicina']);
        $pic=$_FILES['objPic'];
        $tmp=$pic['tmp_name'];
        $name=$pic['name'];
        $size=$pic['size'];
        $desc=$_POST['objDesc'];
        $ekstenzija=explode("/",$pic['type']);
        $ekstenzija=$ekstenzija[1];
        $putanjaOrg=$_SERVER['DOCUMENT_ROOT']."/PraktikumPHP/assets/images/food_original/";
        $naziv=time()."_".$name;
        $putanjaOrg=$putanjaOrg."original_".$naziv;
        $putanjaSmall=$_SERVER['DOCUMENT_ROOT']."/PraktikumPHP/assets/images/food_small/";
        $regIme='/^([A-z](\s)*)+$/';
        $regCena='/^[0-9]{1,}$/';
        $regDesc='/^([A-z][\.\-\,]*(\s)*)+$/';
        $greske=[];
        if(!preg_match($regIme,$ime)){array_push($greske,"Name nije u dobrom formatu");}
        foreach($cena as $c){
            if(!preg_match($regCena,$c)){array_push($greske,"Cena nije u dobrom formatu");}
        }
        if(!preg_match($regDesc,$desc)){array_push($greske,"Description nije u dobrom formatu");}
        // var_dump($greske);
        if($size<4000000 && count($greske)==0){ //SREDI OVO KOLIKO TREBA VELIKA SLIKA DA BUDE
            $move=move_uploaded_file($tmp,$putanjaOrg);
            if($move){
                $slika=resizeSlike(180,$ekstenzija,$putanjaOrg,$name,$putanjaSmall,"small");
                if($slika){
                    global $konekcija;
                        $insertJelo=insert("jelo",[null,$ime,$desc,$podKat,$naziv,0,null]);
                    $idJelo=$konekcija->lastInsertId();
                        if($insertJelo){
                                $brojac=count($kol);

                                for($i=0;$i<$brojac;$i++){
                                    $insertKolicina=insert("kolicina_jelo",[null,$kol[$i],$idJelo]);
                                    $kolId=$konekcija->lastInsertId();
                                    $insertCena=insert("cena",[null,null, $cena[$i],$kolId]); 
                                }
                           
                                if($insertCena){
                                foreach($tags as $t)
                                $insertTags=insert("jelo_podkat",[null,$t,$idJelo]);
                                }
                                if($insertTags){
                                    $poruka="Inserted!";

                                }
                            
                        }
                    }	
                   
                }
                else{
                    $status=422;
                    $poruka="Slika nije uspela da uploduje.";
                }
            }
            else{
                if(count($greske)==0){
                    $poruka="Image is too big! Max 4 MB";
                }
                else{$poruka=$greske;}
                $status=422;
            }
           
       

    }
    else{$poruka="404";
        $status=404;
    }
    echo json_encode($poruka);
    http_response_code($status);
?>
