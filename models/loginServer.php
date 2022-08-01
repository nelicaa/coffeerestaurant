<?php
session_start();
header('Content-type:application/json');
 require_once $_SERVER['DOCUMENT_ROOT']."/models/functions.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $status=200;
        $email=$_POST['objEmail'];
        $pass=$_POST['objPass'];
        $regMail='/^[\w\d\.\-]+@[a-z]{2,}(\.[a-z]{2,3})+$/';
        $regPass='/^.{5,}$/';
        $greske=[];
        if(!preg_match($regMail,$email)){array_push($greske,"Email nije u dobrom formatu");}
        if(!preg_match($regPass,$pass)){array_push($greske,"Password nije u dobrom formatu");}
        if(count($greske)==0){
            $pass=md5($pass);
            $blok=file("../data/blokirani.txt");
            $emailBlok=[];
            foreach($blok as $b){
                list($e,$datum,$vreme)=explode("\t",$b);
            $emailBlok[]=$e;
            }
            // var_dump($emailBlok);
            // var_dump($email);
            if(!in_array($email,$emailBlok)){
                $korisnik=upitWhere2("korisnik","email","pass",[$email,$pass]);
                if($korisnik){
                    $file=fopen("../data/ulogovani.txt","a");
                    $sadrzaj=$email."\t".date("Y-m-d")."\n";
                    fwrite($file,$sadrzaj);
                    if(fclose($file)){
                        $poruka="ok";
                        $_SESSION['ulogovan']=$korisnik;
                    }
                    else{
                        $status=500;
                    }
                }
                else{
                    $status=422;
                    $okEmail=upitWhere("korisnik","email",[$email]);
                    if($okEmail){
                        $file=fopen("../data/neuspeh.txt","a");
                        $sadrzaj=$email."\t".date("Y-m-d")."\t".date("H:i:s")."\t".$_SERVER['REMOTE_ADDR']."\n";
                        fwrite($file,$sadrzaj);
                        fclose($file);
                        $fileNeuspeli=file("../data/neuspeh.txt");
                        $broj=0;
                        foreach($fileNeuspeli as $n){
                            list($emailNeuspeh,$datum,$vreme,$ip)=explode("\t",$n);
                            $danasnjiDatum=date("Y-m-d");
                            $trenutnoVreme=date("H:i:s");
                            $trenutnoVreme = strtotime($trenutnoVreme);
                        $vreme= strtotime($vreme);
                        $razlikaMinuti = round(abs($trenutnoVreme - $vreme) / 60,2);
                            if($danasnjiDatum==$datum && $razlikaMinuti<=5 && $email==$emailNeuspeh){
                                $broj++;
                            }
                        }              
                        if($broj>3){
                            $file=fopen("../data/blokirani.txt","a");
                            $sadrzaj=$email."\t".date("Y-m-d")."\t".date("H:i:s")."\n";
                            fwrite($file,$sadrzaj);
                            fclose($file);
                            $mail=slanjeMail($email);
                            if($mail){
                                $status=403;
                            $poruka="Account blocked.More than 3 failed login attempts.";}
                        }
                        else{
                            $status= 401;
                            $poruka="Password is incorrect";
    
                        }
    
                    }
                   else{
                       $status= 401;
                    $poruka="Email is incorrect";
                   }
                }

            }
            else{
                $poruka="This account is on block list.";
                // var_dump($poruka);
                $status=403;
            }
            

        }
    }
    else{
        $poruka="404";
        $status=404;
    }
    echo json_encode($poruka);
    http_response_code($status);
?>
