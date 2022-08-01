<?php
session_start();

 require_once $_SERVER['DOCUMENT_ROOT']."/models/functions.php";
    if(isset($_POST['dugme'])){
        $status=200;
        $ispis="";
        $uloge=sve("uloge");
        if(count($uloge)>0){
$ispis.='<table class="excelTable">
<thead>
<tr>
<td>Id</td><td>Uloga</td></tr>
</thead>
<tbody>';
foreach($uloge as $u){
    $ispis.='<tr><td>'.$u->idUloga.'</td><td>'.$u->naziv.'</td></tr>';
}
$ispis.='</tbody></table>';

        }
        header("Content-type: application/xls");
        header("Content-Disposition: attachment;Filename=uloge.xls"); 
        echo $ispis;


    }
    else{$poruka="404";
        $status=404;
    }
    http_response_code($status);
?>