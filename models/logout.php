<?php
session_start();
header('Content-type:application/json');
    if(isset($_POST['dugme'])){
        $status=200;
   unset($_SESSION['ulogovan']);
   $poruka="ok";
    }
    else{
        $poruka="404";
        $status=404;
    }
    echo json_encode($poruka);
    http_response_code($status);
?>
