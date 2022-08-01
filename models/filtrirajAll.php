<?php
session_start();
header('Content-type:application/json');
 require_once $_SERVER['DOCUMENT_ROOT']."/models/functions.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $status=200;
        $broj=$_POST['broj'];
        $broj=($broj-1)*PAGINACIJA;
        $dodatak=" LIMIT ".PAGINACIJA." OFFSET $broj";
        $parametar=$_POST['parametar'];
        $sort="";
        $order="";
        $cene="";
        $kategorije="";

        $upitTags="";
        if(isset($_POST['tags'])){
            for($i=0;$i<count($_POST['tags']);$i++){
            $upitTags.="jelo_podkat.idPodKat=?";
                if($i+1!=count($_POST['tags'])){
                    $upitTags.=" OR ";}}}

        $vrednost=(int)$parametar;
        if($vrednost){
            $kategorije="idRod";}
        else{
            $kategorije="kategorije.naziv";}
        if(isset($_POST['cene'])){
            $cene=$_POST['cene'];}
        if(isset($_POST['sort'])){
            $sort=$_POST['sort'];
                if($sort!="date" && $sort!="iznos"){
                    $sort="iznos";
                    $order="DESC"; } }

            //FILTRIRANJE SORTIRANJE U ODNOSU NA SVE PROIZVODE SA PAGINACIJOM
        if($parametar=="all"){
            if(isset($_POST['sort']) && empty($_POST['cene']) && empty($_POST['tags'])){
                $paginacija=count(jeloSort($sort,$order, ""));
                $jela=jeloSort($sort,$order, $dodatak);
            }
            else if(isset($_POST['sort']) && isset($_POST['cene']) && empty($_POST['tags'])){
                $paginacija=count(jeloSortPrice($sort,$order,[$cene],""));
                $jela=jeloSortPrice($sort,$order,[$cene],$dodatak);
            }
            else if(isset($_POST['sort']) && isset($_POST['cene']) && isset($_POST['tags'])){
                $paginacija=count(jeloTagsSortPrice("",$upitTags,$_POST['tags'],$sort,$order,$cene));
                $jela=jeloTagsSortPrice($dodatak,$upitTags,$_POST['tags'],$sort,$order,$cene);
            }
            else if(empty($_POST['sort']) && isset($_POST['cene']) && empty($_POST['tags'])){
                $paginacija=count(jeloPrice([$cene],""));
                $jela=jeloPrice([$cene],$dodatak);
            }
            else if(empty($_POST['sort']) && isset($_POST['cene']) && isset($_POST['tags'])){
                $paginacija=count(jeloTagsPrice("",$upitTags,$_POST['tags'],$cene)); 
                $jela=jeloTagsPrice("",$upitTags,$_POST['tags'],$cene);
            }
            else if(empty($_POST['sort']) && empty($_POST['cene']) && isset($_POST['tags'])){
                $paginacija=count(jeloTags("",$upitTags,$_POST['tags']));
                $jela=jeloTags($dodatak,$upitTags,$_POST['tags']);
            }
            else if(isset($_POST['sort']) && empty($_POST['cene']) && isset($_POST['tags'])){
                $paginacija=count(jeloTagsSort("",$upitTags,$_POST['tags'],$sort,$order));
                $jela=jeloTagsSort($dodatak,$upitTags,$_POST['tags'],$sort,$order);
            }
            else{
                $paginacija=count(jelo(""));
                $jela=jelo($dodatak);
            }
        }
        else{

            //FILTRIRANJE SORTIRANJE U ODNOSU NA KATEGORIJU SA PAGINACIJOM
                if(isset($_POST['sort']) && empty($_POST['cene']) && empty($_POST['tags'])){
                    $paginacija=count(jeloKatSort($kategorije,[$parametar],$sort,$order,""));
                    $jela=jeloKatSort($kategorije,[$parametar],$sort,$order,$dodatak);
                }
                else if(isset($_POST['sort']) && isset($_POST['cene']) && empty($_POST['tags'])){
                    $paginacija=count(jeloKatSortPrice($kategorije,[$parametar,$cene],$sort,$order,""));
                    $jela=jeloKatSortPrice($kategorije,[$parametar,$cene],$sort,$order,$dodatak);
                }
                else if(isset($_POST['sort']) && isset($_POST['cene']) && isset($_POST['tags'])){
                    $paginacija=count(jeloKatPriceTagsSort($kategorije,$parametar,$cene,$upitTags,$_POST['tags'],$sort,$order,""));
                    // var_dump($paginacija);
                    $jela=jeloKatPriceTagsSort($kategorije,$parametar,$cene,$upitTags,$_POST['tags'],$sort,$order,$dodatak);
                }
                else if(empty($_POST['sort']) && isset($_POST['cene']) && empty($_POST['tags'])){
                    $paginacija=count(jeloKatPrice($kategorije,[$parametar,$cene],""));
                    $jela=jeloKatPrice($kategorije,[$parametar,$cene],$dodatak);
                }
                else if(empty($_POST['sort']) && isset($_POST['cene']) && isset($_POST['tags'])){
                    $paginacija=count(jeloKatPriceTags($kategorije,$parametar,$cene,$upitTags,$_POST['tags'],""));
                    $jela=jeloKatPriceTags($kategorije,$parametar,$cene,$upitTags,$_POST['tags'],$dodatak);
                }
                else if(empty($_POST['sort']) && empty($_POST['cene']) && isset($_POST['tags'])){
                    $paginacija=count(jeloKatTags($kategorije,$parametar,$upitTags,$_POST['tags'],""));
                    $jela=jeloKatTags($kategorije,$parametar,$upitTags,$_POST['tags'],$dodatak);

                }
                else if(isset($_POST['sort']) && empty($_POST['cene']) && isset($_POST['tags'])){
                    $paginacija=count(jeloKatTagsSort($kategorije,$parametar,$upitTags,$_POST['tags'],$sort,$order,""));
                    $jela=jeloKatTagsSort($kategorije,$parametar,$upitTags,$_POST['tags'],$sort,$order,$dodatak);
                }
                else{
                $paginacija=count(jeloKat($kategorije,[$parametar],""));
                $jela=jeloKat($kategorije,[$parametar],$dodatak);
                }
        }
        $poruka=$jela;
       
    }
    else{
        $poruka="404";
        $status=404;
    }
    echo json_encode(["data"=>$poruka,"paginacija"=>$paginacija]);
    http_response_code($status);
?>
