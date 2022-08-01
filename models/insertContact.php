<?php
session_start();
header('Content-type:application/json');
 require_once $_SERVER['DOCUMENT_ROOT']."/models/functions.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $status=200;
        $email=$_POST['email'];
        $message=$_POST['message'];
        $subject=$_POST['subject'];
        $regEmail='/^[\w\d\.\-]+@[a-z]{2,}(\.[a-z]{2,3})+$/';
        $regSubject='/^[A-z(\s)*]{4,}$/';
        $regMess='/^([A-z][\.\-\,]*(\s)*)+$/';
        $greske=[];
        if(!preg_match($regEmail,$email)){array_push($greske,"Email nije u dobrom formatu");}
        if(!preg_match($regSubject,$subject)){array_push($greske,"Subject nije u dobrom formatu");}
        if(!preg_match($regMess,$message)){array_push($greske,"Message nije u dobrom formatu");}
        if(count($greske)==0){
            $insert=insert("poruke",[null,$email,$subject,$message]);
            if($insert){
                $poruka="Thanks for your feedback!";
            }
            else{
                $status=500;
            }
        }
    }
    else{$poruka="404";
        $status=404;
    }
    echo json_encode($poruka);
    http_response_code($status);
?>