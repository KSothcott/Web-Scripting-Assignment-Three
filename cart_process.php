<?php

date_default_timezone_set('Europe\London');
include_once('server.php');
include_once('cookiecheck.php');

    $total = $_GET['price']/100;

    $date = date('Y/m/d H:i:s');         

    $query = 'INSERT INTO `products`.`orders` (`total`,`order_date`,`UserID`) VALUES ("'.$total.'","'.$date.'","'.$_COOKIE['UserID'].'")';

    $con->query($query);

?>

<html><body onload="window.location.href='/Web-Scripting-Assignment-Three/order_complete.php'"></body></html>