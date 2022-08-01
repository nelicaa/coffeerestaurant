<?php
// define("BASE_URL", NE ZNAM)
define("ABSOLUTE_PATH", $_SERVER['DOCUMENT_ROOT']."/PraktikumPHP");

define("ENV", ABSOLUTE_PATH."/config/.env");
define("LOG", ABSOLUTE_PATH."/data/log.txt");
define("SEPARATOR", "&");

define("SERVER", funkEnv("SERVER"));
define("DBNAME", funkEnv("DBNAME"));
define("USERNAME", funkEnv("USERNAME"));
define("PASS", funkEnv("PASSWORD"));

function funkEnv($parametar){
    $fajl=fopen(ENV,"r");
    $podaci=file(ENV);
    $vr="";
    foreach($podaci as $p){
        $vrednost=explode("=",$p);
        if($vrednost[0]==$parametar){
            $vr=trim($vrednost[1]);
            break;
        }
    }
    return $vr;
}




?>