<?php
session_start();
header('Content-type:application/json');
 require_once $_SERVER['DOCUMENT_ROOT']."/models/functions.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // var_dump($_POST);
        $status=200;
        $id=$_POST['id'];
        $ime=$_POST['objName'];
        $podKat=$_POST['objpodKat'];
        $tags=explode(",",$_POST['objTags']);
        $cena=explode(",",$_POST['objCena']);
        $desc=$_POST['objDesc'];
        $kol=explode(",",$_POST['objKolicina']);
        if(isset($_FILES['objPic'])){
            $pic=$_FILES['objPic'];
            $tmp=$pic['tmp_name'];
            $name=$pic['name'];
            $size=$pic['size'];
            $ekstenzija=explode("/",$pic['type']);
            $ekstenzija=$ekstenzija[1];
            $putanjaOrg=$_SERVER['DOCUMENT_ROOT']."/assets/images/food_original/";
            $naziv=time()."_".$name;
            $putanjaOrg=$putanjaOrg."original_".$naziv;
            $putanjaSmall=$_SERVER['DOCUMENT_ROOT']."/assets/images/food_small/";
            if($size<4000000){ //SREDI OVO KOLIKO TREBA VELIKA SLIKA DA BUDE
                $move=move_uploaded_file($tmp,$putanjaOrg);
                if($move){
                    $slika=resizeSlike(180,$ekstenzija,$putanjaOrg,$name,$putanjaSmall,"small");
                    if($slika){
                        $update=edit("jelo",["src"],[$naziv],"idJelo",$id);
                    }
                }

        }}
      
        $desc=$_POST['objDesc'];

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
        if(count($greske)==0){ //SREDI OVO KOLIKO TREBA VELIKA SLIKA DA BUDE
            // $move=move_uploaded_file($tmp,$putanjaOrg);
            // if($move){
                // $slika=resizeSlike(180,$ekstenzija,$putanjaOrg,$name,$putanjaSmall,"small");
                // if($slika){
                    global $konekcija;
                        $updateJelo=edit("jelo",["naziv","opis","idKat"],[$ime,$desc,$podKat],"idJelo",$id);
                    // $idJelo=$konekcija->lastInsertId();
        // var_dump($kol);

                        // if($updateJelo){
                                $brojac=count($kol);
                                $update=edit("kolicina_jelo",["active"],[0],"idJelo",$id);
                                // if($update){
                                    for($i=0;$i<$brojac;$i++){
                                        // var_dump($kol[$i]);
                                        $insertKolicina=insert("kolicina_jelo",[null,$kol[$i],$id,1]);
                                        // var_dump($insertKolicina);
                                        // var_dump($id);
                                        // var_dump($kol[$i]);
                                        $kolId=$konekcija->lastInsertId();
                                        // var_dump($kolId);
                                        $insertCena=insert("cena",[null,null, $cena[$i],$kolId]); 
                                    // }
                                }
                                
                           
                                $delete=delete("jelo_podkat","idJelo",[$id]);
                                if($delete){
                                    foreach($tags as $t)
                                    $insertTags=insert("jelo_podkat",[null,$t,$id]);
                                }
                                // if($insertCena){
                              
                                // }
                                // if($insertTags){
                                    $poruka="Updated!";

                                // }
                            
                        // }
                    // }	
                   
                // }
                // else{
                //     $status=422;
                //     $poruka="Slika nije uspela da uploduje.";
                // }
            }
            // else{
            //     if(count($greske)==0){
            //         $poruka="Image is too big! Max 4 MB";
            //     }
            //     else{$poruka=$greske;}
            //     $status=422;
            // }
           
       

    }
    else{$poruka="404";
        $status=404;
    }
    echo json_encode($poruka);
    http_response_code($status);
?>
