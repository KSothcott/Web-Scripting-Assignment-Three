<?php

include_once('server.php');
include_once('cookiecheck.php');

    $query = 'DELETE FROM `products`.`order_contents` WHERE `UserID` = '.$_COOKIE['UserID'].'';
    
    $con->query($query);
    
?>

<html><body onload="window.location.href='/Web-Scripting-Assignment-Three/shop.php'"></body></html>