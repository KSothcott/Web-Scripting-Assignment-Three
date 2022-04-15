<?php

include_once('server.php');
include_once('cookiecheck.php');
    
    
    $id = $_GET['id'];
    
    $query = $query = 'INSERT INTO `products`.`order_contents` (`RecipeID`, `UserID`) VALUES ("'.$id.'","'.$_COOKIE['UserID'].'")';
    $con->query($query);
       
?>

<html><body onload="window.location.href='/Web-Scripting-Assignment-Three/cart.php'"></body></html>