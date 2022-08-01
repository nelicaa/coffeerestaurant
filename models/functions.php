<?php
require_once $_SERVER['DOCUMENT_ROOT']."/PraktikumPHP/config/konekcija.php"; 

define("PAGINACIJA","8");

//dohvatanje svih proizvoda
function sve($tabela){
    $upit="SELECT * FROM $tabela";
    $rez=upitSvi($upit);
    return $rez;
}

//dohvatanje sa where jedan red
function upitWhere($tabela,$kolona,$parametar){
    $upit="SELECT * FROM $tabela WHERE $kolona=?";
    $rez=upitPrepare($upit,$parametar);
    return $rez;
}

//dohvatanje sa where vise redova
function upitWhereVise($tabela,$kolona,$parametar){
    $upit="SELECT * FROM $tabela WHERE $kolona=?";
    $rez=upitPrepareVise($upit,$parametar);
    return $rez;
}

//dohvatanje sa where vise redova
function upitWhereViseZnakVece($tabela,$kolona,$parametar){
    $upit="SELECT * FROM $tabela WHERE $kolona>=?";
    $rez=upitPrepareVise($upit,$parametar);
    return $rez;
}

//where sa 2 parametra, jedan red
function upitWhere2($tabela,$kolona1,$kolona2,$parametar){
    $upit="SELECT * FROM $tabela WHERE $kolona1=? AND $kolona2=?";
    $rez=upitPrepare($upit,$parametar);
    return $rez;
}


//inner join sa 2 tabele - jedan where
function spajanjeJedanWhere($tabela1,$tabela2,$parametar,$parametar1,$parametar2,$kolona){
    $upit="SELECT * from $tabela1 INNER JOIN $tabela2 ON $tabela1.$parametar1=$tabela2.$parametar2 WHERE $tabela2.$kolona=?";
    $rez=upitPrepareVise($upit,$parametar);
    return $rez;
}

//get tags
function getTags($id){
    $upit="SELECT podkategorije.* from jelo_podkat INNER JOIN podkategorije ON podkategorije.idPodKat=jelo_podkat.idPodKat WHERE jelo_podkat.idJelo=?";
    $rez=upitPrepareVise($upit,$id);
    return $rez;
}



//inner join sa 2 tabele - jedan where , jedan red
function spajanjeJedanWhereJedanRed($tabela1,$tabela2,$parametar,$parametar1,$parametar2,$kolona){
    $upit="SELECT * from $tabela1 INNER JOIN $tabela2 ON $tabela1.$parametar1=$tabela2.$parametar2 WHERE $tabela2.$kolona=?";
    $rez=upitPrepare($upit,$parametar);
    return $rez;
}

//inner join sa 3 tabele, jedan where, vise redova
function spajanje3tabele1WhereViseRedova($tabela1,$tabela2,$parametar1,$tabela3,$parametar2,$kolona,$parametar){
    $upit="SELECT * FROM $tabela1 INNER JOIN $tabela2 ON $tabela1.$parametar1=$tabela2.$parametar1 INNER JOIN $tabela3 ON $tabela3.$parametar2=$tabela2.$parametar2 WHERE $tabela1.$kolona=?";
    $rez=upitPrepareVise($upit,$parametar);
    return $rez;
}

//inner join sa 2 tabele - 2 where , jedan red
function spajanjeDvaWhereJedanRed($tabela1,$tabela2,$parametar,$parametar1,$parametar2,$kolona,$kolona2){
    $upit="SELECT * from $tabela1 INNER JOIN $tabela2 ON $tabela1.$parametar1=$tabela2.$parametar2 WHERE $tabela2.$kolona=? AND $tabela2.$kolona2=?";
    $rez=upitPrepare($upit,$parametar);
    return $rez;
}

//inner join sa 4 tabele - 1 where vise redova
function kolicinaCenaJelo($parametar){
    $upit="SELECT kolicina.*,cena.* FROM cena INNER JOIN kolicina_jelo ON cena.idCena=(SELECT idCena FROM cena WHERE idKJ=kolicina_jelo.idKJ ORDER BY datum DESC LIMIT 1) INNER JOIN jelo ON jelo.idJelo=kolicina_jelo.idJelo
     INNER JOIN kolicina ON kolicina_jelo.idKol=kolicina.idKol WHERE jelo.idJelo=? AND jelo.deleted=0 AND kolicina_jelo.active=1";
      $rez=upitPrepareVise($upit,$parametar);
      return $rez;
}

//kolicina i cena za jelo
// function kolicinaCena(){
//     $upit="SELECT * from kolicina INNER JOIN kolicina_jelo ON kolicina_jelo.idKol=kolicina.idKol INNER JOIN cena ON cena.idCena=(SELECT idCena FROM cena WHERE idKJ=kolicina_jelo.idKJ ORDER BY datum DESC LIMIT 1) WHERE kolicina_jelo.active=1";
//     $rez=upitSvi($upit);
//     return $rez;
// }

//inner join - 4 tabele - jedan where (prikaz proizvoda za filtriranje)
// function spajanjeJedanWhere4tabele($tabela1,$parametar1,$tabela2,$tabela3,$parametar3,$tabela4,$parametar4,$tabela5,$parametar5,$kolona,$parametar){
//     $upit="SELECT * from $tabela1 INNER JOIN $tabela2 ON $tabela1.$parametar1=$tabela2.$parametar1 INNER JOIN $tabela3 ON $tabela1.$parametar3=$tabela3.$parametar3 
//     INNER JOIN $tabela4 ON $tabela4.$parametar4=$tabela3.$parametar4 INNER JOIN $tabela5 ON $tabela5.$parametar5=$tabela4.$parametar5  WHERE $tabela2.$kolona=?";
//     // var_dump($upit);
//     $rez=upitPrepareVise($upit,$parametar);
//     return $rez;
// }


//kada ima vise cena uzimanje poslednje dodate cene - za prikaz na meniju
function jedinstvenaCena($tabela1,$tabela2,$parametar1, $kolona,$parametar){
    $upit="SELECT * from $tabela1 INNER JOIN $tabela2 ON $tabela1.$parametar1=(SELECT $parametar1 from $tabela1 WHERE $tabela2.$kolona=$kolona ORDER BY datum DESC LIMIT 1)
    WHERE $tabela1.$kolona=? AND kolicina_jelo.active=1";
    $rez=upitPrepareVise($upit,$parametar);
    return $rez;
}

//prikaz svih proizvoda na stranici za filtriranje
// function filtriraj($tabela1,$tabela2,$parametar1,$parametar2,$tabela3,$parametar3){
//     $upit="SELECT * FROM $tabela1 INNER JOIN $tabela2 ON $tabela2.$parametar1=(SELECT $parametar1 from $tabela2 WHERE idJelo=jelo.idJelo LIMIT 1)
//     INNER JOIN cena ON $tabela3.$parametar3=(SELECT $parametar3 FROM $tabela3 WHERE $parametar1=$tabela2.$parametar1 ORDER BY datum DESC LIMIT 1)";
//     $rez=upitSvi($upit);
//     return $rez;
// }

//dohvatanje svih podataka za jelo za prikaz na dashboardu sa svim cenama
function jeloSve($parametar){
    $upit="SELECT * FROM korpa k INNER JOIN korpa_jelo kj ON k.idKorpa=kj.idKorpa INNER JOIN cena c ON c.idKJ=kj.idKJ 
    INNER JOIN kolicina_jelo ON c.idKJ=kolicina_jelo.idKJ INNER JOIN jelo ON jelo.idJelo=kolicina_jelo.idJelo 
     WHERE k.idKorpa=?";
    $rez=upitPrepareVise($upit,$parametar);
    return $rez;
}

//dohvatanje svih podataka za jelo za prikaz na strani shop
function jelo($dodatak){
    $upit="SELECT * FROM jelo INNER JOIN kolicina_jelo ON kolicina_jelo.idKJ=(SELECT idKJ from kolicina_jelo WHERE idJelo=jelo.idJelo AND kolicina_jelo.active=1 LIMIT 1)
    INNER JOIN cena ON cena.idCena=(SELECT idCena FROM cena WHERE idKJ=kolicina_jelo.idKJ ORDER BY datum DESC LIMIT 1) WHERE jelo.deleted=0 $dodatak ";
    $rez=upitSvi($upit);
    return $rez;
}
//dohvatanje svih podataka za jelo za prikaz na strani shop sa odabranim sortiranjem
function jeloSort($order,$parametar,$dodatak){
    $upit="SELECT * FROM jelo INNER JOIN kolicina_jelo ON kolicina_jelo.idKJ=(SELECT idKJ from kolicina_jelo WHERE idJelo=jelo.idJelo AND kolicina_jelo.active=1  LIMIT 1)
    INNER JOIN cena ON cena.idCena=(SELECT idCena FROM cena WHERE idKJ=kolicina_jelo.idKJ ORDER BY datum DESC LIMIT 1) WHERE jelo.deleted=0 ORDER BY $order $parametar $dodatak";
    $rez=upitSvi($upit);
    return $rez;
}

//dohvatanje svih podataka za jelo za prikaz na strani shop sa odabranim sortiranjem i cenom
function jeloSortPrice($order,$parametar,$cena,$dodatak){
    $upit="SELECT * FROM jelo INNER JOIN kolicina_jelo ON kolicina_jelo.idKJ=(SELECT idKJ from kolicina_jelo WHERE idJelo=jelo.idJelo  AND kolicina_jelo.active=1 LIMIT 1)
    INNER JOIN cena ON cena.idCena=(SELECT idCena FROM cena WHERE idKJ=kolicina_jelo.idKJ ORDER BY datum DESC LIMIT 1) WHERE iznos<? AND jelo.deleted=0 ORDER BY $order $parametar $dodatak";
    $rez=upitPrepareVise($upit,$cena);
    return $rez;
}
//dohvatanje svih podataka za jelo za prikaz na strani shop sa odabranom cenom
function jeloPrice($cena,$dodatak){
    $upit="SELECT * FROM jelo INNER JOIN kolicina_jelo ON kolicina_jelo.idKJ=(SELECT idKJ from kolicina_jelo WHERE idJelo=jelo.idJelo  AND kolicina_jelo.active=1 LIMIT 1)
    INNER JOIN cena ON cena.idCena=(SELECT idCena FROM cena WHERE idKJ=kolicina_jelo.idKJ ORDER BY datum DESC LIMIT 1) WHERE iznos<? AND jelo.deleted=0 $dodatak";
    $rez=upitPrepareVise($upit,$cena);
    return $rez;
}


//dohvatanje svih podataka za jelo za prikaz na strani shop sa odabranom kategorijom
function jeloKat($kolona,$parametar,$dodatak){
    $upit="SELECT jelo.*,cena.* FROM jelo INNER JOIN kolicina_jelo ON kolicina_jelo.idKJ=(SELECT idKJ from kolicina_jelo WHERE idJelo=jelo.idJelo AND kolicina_jelo.active=1 LIMIT 1)
    INNER JOIN cena ON cena.idCena=(SELECT idCena FROM cena WHERE idKJ=kolicina_jelo.idKJ ORDER BY datum DESC LIMIT 1) INNER JOIN kategorije ON kategorije.idKat=jelo.idKat
    WHERE $kolona=? AND jelo.deleted=0 $dodatak";
    $rez=upitPrepareVise($upit,$parametar);
    return $rez;
}

//dohvatanje svih podataka za jelo za prikaz na strani shop sa odabranom kategorijom i tagovima
function jeloKatTags($kolona,$parametar,$upit,$parametri,$dodatak){
    $parametri[]=$parametar;
    $upit="SELECT DISTINCT jelo.*,cena.* FROM jelo INNER JOIN kolicina_jelo ON kolicina_jelo.idKJ=(SELECT idKJ from kolicina_jelo WHERE idJelo=jelo.idJelo  AND kolicina_jelo.active=1 LIMIT 1)
    INNER JOIN cena ON cena.idCena=(SELECT idCena FROM cena WHERE idKJ=kolicina_jelo.idKJ ORDER BY datum DESC LIMIT 1) INNER JOIN kategorije ON kategorije.idKat=jelo.idKat
    INNER JOIN jelo_podkat ON jelo.idJelo=jelo_podkat.idJelo
    WHERE ($upit) AND $kolona=? AND jelo.deleted=0 $dodatak";
    $rez=upitPrepareVise($upit,$parametri);
    return $rez;
}

//dohvatanje svih podataka za jelo za prikaz na strani shop sa odabranom kategorijom i tagovima i sortom
function jeloKatTagsSort($kolona,$parametar,$upit,$parametri,$order,$p,$dodatak){
    $parametri[]=$parametar;
    $upit="SELECT DISTINCT jelo.*,cena.* FROM jelo INNER JOIN kolicina_jelo ON kolicina_jelo.idKJ=(SELECT idKJ from kolicina_jelo WHERE idJelo=jelo.idJelo AND kolicina_jelo.active=1 LIMIT 1)
    INNER JOIN cena ON cena.idCena=(SELECT idCena FROM cena WHERE idKJ=kolicina_jelo.idKJ ORDER BY datum DESC LIMIT 1) INNER JOIN kategorije ON kategorije.idKat=jelo.idKat
    INNER JOIN jelo_podkat ON jelo.idJelo=jelo_podkat.idJelo 
    WHERE ($upit) AND $kolona=? AND jelo.deleted=0  ORDER BY $order $p $dodatak";
    // var_dump($upit);
    $rez=upitPrepareVise($upit,$parametri);
    return $rez;
}

//dohvatanje svih podataka za jelo za prikaz na strani shop sa odabranom kategorijom i sortiranjem
function jeloKatSort($kolona,$parametar,$order,$p,$dodatak){
    $upit="SELECT jelo.*,cena.* FROM jelo INNER JOIN kolicina_jelo ON kolicina_jelo.idKJ=(SELECT idKJ from kolicina_jelo WHERE idJelo=jelo.idJelo AND kolicina_jelo.active=1 LIMIT 1)
    INNER JOIN cena ON cena.idCena=(SELECT idCena FROM cena WHERE idKJ=kolicina_jelo.idKJ ORDER BY datum DESC LIMIT 1) INNER JOIN kategorije ON kategorije.idKat=jelo.idKat
    WHERE $kolona=? AND jelo.deleted=0  ORDER BY $order $p $dodatak";
    $rez=upitPrepareVise($upit,$parametar);
    return $rez;
}
//dohvatanje svih podataka za jelo za prikaz na strani shop sa odabranom kategorijom i sortiranjem i cenom
function jeloKatSortPrice($kolona,$parametar,$order,$p,$dodatak){
    $upit="SELECT jelo.*,cena.* FROM jelo INNER JOIN kolicina_jelo ON kolicina_jelo.idKJ=(SELECT idKJ from kolicina_jelo WHERE idJelo=jelo.idJelo AND kolicina_jelo.active=1 LIMIT 1)
    INNER JOIN cena ON cena.idCena=(SELECT idCena FROM cena WHERE idKJ=kolicina_jelo.idKJ ORDER BY datum DESC LIMIT 1) INNER JOIN kategorije ON kategorije.idKat=jelo.idKat
    WHERE $kolona=? AND iznos<? AND jelo.deleted=0 ORDER BY $order $p $dodatak";
    $rez=upitPrepareVise($upit,$parametar);
    return $rez;
}
//dohvatanje svih podataka za jelo za prikaz na strani shop sa odabranom kategorijom i cenom
function jeloKatPrice($kolona,$parametar,$dodatak){
    $upit="SELECT jelo.*,cena.* FROM jelo INNER JOIN kolicina_jelo ON kolicina_jelo.idKJ=(SELECT idKJ from kolicina_jelo WHERE idJelo=jelo.idJelo AND kolicina_jelo.active=1 LIMIT 1)
    INNER JOIN cena ON cena.idCena=(SELECT idCena FROM cena WHERE idKJ=kolicina_jelo.idKJ ORDER BY datum DESC LIMIT 1) INNER JOIN kategorije ON kategorije.idKat=jelo.idKat
    WHERE $kolona=? AND iznos<?  AND jelo.deleted=0  $dodatak";
    $rez=upitPrepareVise($upit,$parametar);
    return $rez;
}

//dohvatanje svih podataka za jelo za prikaz na strani shop sa odabranom kategorijom i cenom i tagovima
function jeloKatPriceTags($kolona,$parametar,$cene,$upit,$parametri,$dodatak){
$parametri[]=$parametar; //KOLONA
$parametri[]=$cene;
// var_dump($parametri);
    $upit="SELECT DISTINCT jelo.*,cena.* FROM jelo INNER JOIN kolicina_jelo ON kolicina_jelo.idKJ=(SELECT idKJ from kolicina_jelo WHERE idJelo=jelo.idJelo  AND kolicina_jelo.active=1 LIMIT 1)
    INNER JOIN cena ON cena.idCena=(SELECT idCena FROM cena WHERE idKJ=kolicina_jelo.idKJ ORDER BY datum DESC LIMIT 1) INNER JOIN kategorije ON kategorije.idKat=jelo.idKat
    INNER JOIN jelo_podkat ON jelo.idJelo=jelo_podkat.idJelo
    WHERE ($upit) AND $kolona=? AND iznos<?  AND jelo.deleted=0 $dodatak";
    // var_dump($upit);
    $rez=upitPrepareVise($upit,$parametri);
    return $rez;
}

function jeloKatPriceTagsSort($kolona,$parametar,$cene,$upit,$parametri,$order,$p,$dodatak){
    $parametri[]=$parametar; //KOLONA
$parametri[]=$cene;
// var_dump($parametri);
    $upit="SELECT DISTINCT jelo.*,cena.* FROM jelo INNER JOIN kolicina_jelo ON kolicina_jelo.idKJ=(SELECT idKJ from kolicina_jelo WHERE idJelo=jelo.idJelo AND kolicina_jelo.active=1 LIMIT 1)
    INNER JOIN cena ON cena.idCena=(SELECT idCena FROM cena WHERE idKJ=kolicina_jelo.idKJ ORDER BY datum DESC LIMIT 1) INNER JOIN kategorije ON kategorije.idKat=jelo.idKat
    INNER JOIN jelo_podkat ON jelo.idJelo=jelo_podkat.idJelo
    WHERE ($upit) AND $kolona=? AND iznos<?  AND jelo.deleted=0 ORDER BY $order $p $dodatak";
    // var_dump($upit);
    $rez=upitPrepareVise($upit,$parametri);
    return $rez;
}

//dohvatanje svih podataka za jelo za prikaz na strani shop sa odabranim tagovima(podkategorijama)
function jeloTags($dodatak,$tags,$parametri){
    $upit="SELECT DISTINCT jelo.*, cena.* FROM jelo INNER JOIN kolicina_jelo ON kolicina_jelo.idKJ=(SELECT idKJ from kolicina_jelo WHERE idJelo=jelo.idJelo AND kolicina_jelo.active=1 LIMIT 1)
    INNER JOIN cena ON cena.idCena=(SELECT idCena FROM cena WHERE idKJ=kolicina_jelo.idKJ ORDER BY datum DESC LIMIT 1) INNER JOIN jelo_podkat ON
    jelo.idJelo=jelo_podkat.idJelo WHERE jelo.deleted=0  AND ($tags) $dodatak "; 
    $rez=upitPrepareVise($upit,$parametri);
    return $rez;
}

//dohvatanje svih podataka za jelo za prikaz na strani shop sa odabranim tagovima(podkategorijama) i cenom
function jeloTagsPrice($dodatak,$tags,$parametri,$cena){
    $upit="SELECT DISTINCT jelo.*, cena.* FROM jelo INNER JOIN kolicina_jelo ON kolicina_jelo.idKJ=(SELECT idKJ from kolicina_jelo WHERE idJelo=jelo.idJelo AND kolicina_jelo.active=1 LIMIT 1)
    INNER JOIN cena ON cena.idCena=(SELECT idCena FROM cena WHERE idKJ=kolicina_jelo.idKJ ORDER BY datum DESC LIMIT 1) INNER JOIN jelo_podkat ON
    jelo.idJelo=jelo_podkat.idJelo   WHERE jelo.deleted=0 AND ($tags) AND iznos<?  $dodatak "; 
    $parametri[]=$cena;
    $rez=upitPrepareVise($upit,$parametri);
    return $rez;
}

//dohvatanje svih podataka za jelo za prikaz na strani shop sa odabranim tagovima(podkategorijama) i sortom
function jeloTagsSort($dodatak,$tags,$parametri,$order,$p){
    $upit="SELECT DISTINCT jelo.*, cena.* FROM jelo INNER JOIN kolicina_jelo ON kolicina_jelo.idKJ=(SELECT idKJ from kolicina_jelo WHERE idJelo=jelo.idJelo AND kolicina_jelo.active=1 LIMIT 1)
    INNER JOIN cena ON cena.idCena=(SELECT idCena FROM cena WHERE idKJ=kolicina_jelo.idKJ ORDER BY datum DESC LIMIT 1) INNER JOIN jelo_podkat ON
    jelo.idJelo=jelo_podkat.idJelo WHERE jelo.deleted=0 AND ($tags) ORDER BY $order $p $dodatak "; 
    $rez=upitPrepareVise($upit,$parametri);
    return $rez;
}

//dohvatanje svih podataka za jelo za prikaz na strani shop sa odabranim tagovima(podkategorijama) i sortom i cenom
function jeloTagsSortPrice($dodatak,$tags,$parametri,$order,$p,$cene){
    $parametri[]=$cene;
    $upit="SELECT DISTINCT jelo.*, cena.* FROM jelo INNER JOIN kolicina_jelo ON kolicina_jelo.idKJ=(SELECT idKJ from kolicina_jelo WHERE idJelo=jelo.idJelo AND kolicina_jelo.active=1 LIMIT 1)
    INNER JOIN cena ON cena.idCena=(SELECT idCena FROM cena WHERE idKJ=kolicina_jelo.idKJ ORDER BY datum DESC LIMIT 1) INNER JOIN jelo_podkat ON
    jelo.idJelo=jelo_podkat.idJelo WHERE jelo.deleted=0 AND ($tags) AND iznos<? ORDER BY $order $p $dodatak "; 
    $rez=upitPrepareVise($upit,$parametri);
    return $rez;
}

//resize slike
function resizeSlike($sirina,$ekstenzija,$tmp,$name,$putanja,$tip){
    list($originalSirina,$originalVisina)=getimagesize($tmp);
    $visina=$originalVisina*$sirina/$originalSirina;
    $praznaSlika=imagecreatetruecolor($sirina,$visina);
   $naziv=$tip.'_'.time().'_'.$name;
    switch($ekstenzija){
        default:   
         $orgSlika=imagecreatefromjpeg($tmp);
        break;
        case "png":
     $orgSlika=imagecreatefrompng($tmp);
        break; 
}
 imagecopyresized($praznaSlika,$orgSlika,0,0,0,0,$sirina,$visina,$originalSirina,$originalVisina);

    switch($ekstenzija){
        default:
        imagejpeg($praznaSlika,$putanja.$naziv);
        break; 
        case "png":
        imagepng($praznaSlika,$putanja.$naziv);
        break; 
}
imagedestroy($praznaSlika);
return $naziv;
}


//select tekstualnog fajla
function prikazTxt($parametar,$fajl){
    $file=fopen('data/'.$fajl, "r");
    if($file){
    $podaci=file('data/'.$fajl);
    foreach($podaci as $p){
        list($key,$value)=explode("=",$p);
        if($key==$parametar){
            $vrednost=trim($value);
        }
    }
    return $vrednost;
}
    }

//procenat dnevne posete starnicama
function posete($parametar,$tekst){
    $file=file("data/log.txt");
    $broj=0;
    $ukupno=0;
    foreach($file as $f){
    list($strana,$deo,$ip,$datum)=explode("\t",$f);
    // list($datum,$vreme)=explode(" ",$datum);

    $d=str_replace(["%20","&"],[" ","="],$deo);
    $danasnjiDatum=date("Y-m-d H:i:s");
$danasnjiDatum=strtotime($danasnjiDatum);
$datum=strtotime($datum);
    if(strlen($d)==0){
        continue;
 
    }
    else{
        if($danasnjiDatum -$datum < 60*60*24){
            $niz=explode("=",$d);
            if($parametar=="site" && $niz[0]=="page"){
        $ukupno++;
                if($niz[1]==$tekst){
                    $broj++;
                 }
            }
            else if($parametar=="admin" && count($niz)>2 && $niz[2]=="admin"){
                $ukupno++;
                if($niz[3]==$tekst){
                    $broj++;
                 }
            }
            
        }}
        

    }
  
if($broj==0){
 $rezultat=0;   
}
else{
    $rezultat=round($broj/$ukupno*100,2);

}
return ["rezultat"=>$rezultat, "broj"=>$broj];
//return $rezultat;
}


//procenat posete starnicama
function poseteSve($parametar,$tekst){
    $file=file("data/log.txt");
    $broj=0;
    $ukupno=0;
    foreach($file as $f){
    list($strana,$deo,$ip,$datum)=explode("\t",$f);
    // list($datum,$vreme)=explode(" ",$datum);

    $d=str_replace(["%20","&"],[" ","="],$deo);
    if(strlen($d)==0){
        continue;
 
    }
    else{
        $niz=explode("=",$d);

            $niz=explode("=",$d);
            if($parametar=="site" && $niz[0]=="page" && count($niz)>=0){
                //var_dump($niz[0]);
                //var_dump($niz[1]);
                //var_dump($tekst);
        $ukupno++;
                if($niz[1]==$tekst){
                    $broj++;
                 }
                }
            if($parametar=="admin" && count($niz)>2 && $niz[2]=="admin"){
                //var_dump($niz);
                $ukupno++;
                if($niz[3]==$tekst){
                    $broj++;
                 }
            }
            
}

    }      
 // var_dump($ukupno);
if($broj==0){
 $rezultat=0;   
}
else{
    $rezultat=round($broj/$ukupno*100,2);

}
return ["rezultat"=>$rezultat, "broj"=>$broj];
}



function brisanjeBlockList($email){
    $file=file('../../data/blokirani.txt');
    
    $sadrzaj="";
    foreach($file as $f){
        list($emailTxt,$datum,$vreme)=explode("\t",$f);
        if($emailTxt==$email){
            continue;
        }
        else{
            $sadrzaj.=$emailTxt."\t".$datum."\t".$vreme;
        }
    }
    $text=fopen("../../data/blokirani.txt","w");
fwrite($text,$sadrzaj);
 fclose($text);
 return true;
// var_dump($file);
}


//template = date("").
//update tekstualnog fajla
function updateTxt($txt,$stariEmail,$noviEmail,$template){
$file=file("../../data/".$txt);
$sadrzaj="";
foreach($file as $f){
    list($email)=explode("\t",$f);
    if($stariEmail==$email){
        $sadrzaj.=$noviEmail."\t".$template;
    }
    else{
        $sadrzaj.=$email."\t".$template;
    }
}
$open=fopen("../../data/".$txt,"w");
fwrite($open,$sadrzaj);
fclose($open);
}



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//mail
function slanjeMail($email){
require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';

    
    $mail = new PHPMailer;
    $mail->IsSMTP(); 
    $mail->SMTPDebug = 0; 
    $mail->Host = "smtp.gmail.com"; 
    $mail->Port = '587'; // typically 587 
    $mail->SMTPSecure = 'tls'; // ssl is depracated
    $mail->SMTPAuth = true;
    $mail->Username = 'nelica.stojadinovic1@gmail.com';
    $mail->Password = 'neca3006';
    $mail->setFrom('nelica.stojadinovic1@gmail.com', 'Coffee&restaurant');
    $mail->addAddress($email, '');
    $mail->Subject = "Neuspeli login na sajtu coffee&restaurant";
    $mail->Body ="Neko je pokusao da se uloguje na vas profil. Profil je zakljucan. Kontaktirajte admina sajta.";
    $mail=$mail->send();
  if($mail){
    return $poruka="Message sent!";
}
}


?>