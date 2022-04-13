<?php

include_once('server.php');

    $query = 'UPDATE `products`.`profile` SET `'.$row["age"].'age` = "'.$_POST['age'].'" WHERE `UserID` ='.$_COOKIE['UserID']; 
    $con->query($query);
    $query = 'UPDATE `products`.`profile` SET `'.$row["gender"].'gender` = "'.$_POST['gender'].'" WHERE `UserID` ='.$_COOKIE['UserID']; 
    $con->query($query);
    $query = 'UPDATE `products`.`profile` SET `'.$row["country"].'country` = "'.$_POST['country'].'" WHERE `UserID` ='.$_COOKIE['UserID']; 
    $con->query($query);
    $query = 'UPDATE `products`.`profile` SET `'.$row["diet"].'diet` = "'.$_POST['diet'].'" WHERE `UserID` ='.$_COOKIE['UserID']; 
    $con->query($query);
    $query = 'UPDATE `products`.`profile` SET `'.$row["favourite_recipe"].'favourite_recipe` = "'.$_POST['favourite_recipe'].'" WHERE `UserID` ='.$_COOKIE['UserID']; 
    $con->query($query);

?>

<html><body onload="window.location.href='http://localhost:8080/Web-Scripting-Assignment-Three/profile_edit.php'"></body></html>