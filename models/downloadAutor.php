<?php
session_start();
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=author.doc"); 
$status=200;
        $ime=$_POST['aboutIme'];
        $prezime=$_POST['aboutPrezime'];
        $datum=$_POST['aboutDatum'];
        $skola=$_POST['aboutSkola'];
 echo "<html>";
 echo "<meta http-equiv=\"ContentType\" content=\"text/html; charset=Windows-1252\">";
 echo "<body>";
 echo "<h6>Ime: $ime</h6>";
 echo "<h6> Prezime: $prezime</h6>";
 echo "<h6>Datum rodjenja: $datum</h6>";
 echo "<h6>Srednja skola: $skola</h6>";


 echo "</body>";
    http_response_code($status);
?>