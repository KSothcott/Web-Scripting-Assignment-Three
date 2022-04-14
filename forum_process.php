<?php

date_default_timezone_set('Europe\London');
include_once('server.php');

    $date = date('Y/m/d H:i:s');
    
    $query = $query = 'INSERT INTO `products`.`forum` (`subject`, `message`, `name`, `post_date`) VALUES ("'.$_POST['subject'].'", "'.$_POST['message'].'", "'.$_POST['name'].'","'.$date.'")';
    $con->query($query);
    
    
?>

<html><body onload="window.location.href='/Web-Scripting-Assignment-Three/forum.php'"></body></html>