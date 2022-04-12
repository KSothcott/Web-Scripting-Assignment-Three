<?php

include_once('server.php');

    setcookie('cookievalue',$cookievalue,$row['time']+0); 
    
    setcookie('SessionID',$sessionid,$row['time']+0);
    
    setcookie('UserID',$userid,$row['time']+0);
    
    $con=NULL;
    
?>

<html><body onload="window.location.href='http://localhost:8080/Web-Scripting-Assignment-Three/login.php'"></body></body></html>